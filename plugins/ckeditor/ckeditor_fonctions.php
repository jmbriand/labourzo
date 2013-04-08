<?php

/* This code is release under the term of the GPVv2 Licence
 * You can find the text of the license here : http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Copyright : Frédéric Bonnaud <fred@lea-linux.org>
 */

/* synchronisation du plugin spip pour ckeditor ... très complexe */

function recurse_copy($src,$dst) {
	$dir = opendir($src);
	@mkdir($dst);
	while(false !== ( $file = readdir($dir)) ) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) ) {
				recurse_copy($src . '/' . $file,$dst . '/' . $file);
			} else {
				copy($src . '/' . $file,$dst . '/' . $file);
			}
		}
	}
	closedir($dir);
}

$cp_ckplug = true ;

if (is_dir(_DIR_RACINE."lib/ckeditor/plugins/spip")) {
	$v = unserialize($GLOBALS['meta']['plugin']) ;
   $ckversion = $v['CKEDITOR']['version'] ;
	if ($ckversion) {
		$file_inst_ckversion = @fopen(_DIR_RACINE."lib/ckeditor/plugins/spip/ckplug-version.txt") ;
		if ($file_inst_ckversion) {
			$inst_ckversion = trim(@fread($file_inst_ckversion,1024)) ;
			if ($inst_ckversion == $ckversion) {
				$cp_ckplug = false ;
			}
		}
	}
}

if ($cp_ckplug) {
	@mkdir(_DIR_RACINE."lib/ckeditor/plugins/spip") ;
	recurse_copy(_DIR_PLUGIN_CKEDITOR."ckeditor-plugin/spip", _DIR_RACINE."lib/ckeditor/plugins/spip") ;
	if ($ckversion) {
		$file_ckversion = fopen(_DIR_RACINE."lib/ckeditor/plugins/spip/ckplug-version.txt",'w') ;
		if ($file_ckversion) {
			fwrite($file_ckversion, $ckversion) ;
			fclose($file_ckversion) ;
		}
	}
}

if ($protectedtags = lire_config("ckeditor/protectedtags")) {
	define('PROTECTED_SPIP_TAGS', "(?:".join("|",preg_split("/\s*;\s*/", preg_replace("~X{2,}~", "\d+", preg_quote(trim($protectedtags), "#" )))).")" ) ;

} else {
	define('PROTECTED_SPIP_TAGS', "(?:img\d+|emb\d+|doc\d+)") ;
}

function ckeditor_dump(& $var) { // pour afficher le contenu d'une variable (pour débuggage)
	ob_start() ;
	var_dump($var);
	$content = ob_get_contents() ;
	ob_end_clean() ;
	return "<pre>".htmlentities($content)."</pre>" ;
}

function ckeditor_canonize_path($path) {
	$path = preg_replace("~/{2,}~","/", $path) ;
	$path = preg_replace(
		array(
			"~/[^/]+/\.\./~",
			"~^[^/]+/\.\./~",
			"~/[^/]+/\.\.$~"
		),
		array(
			"/",
			"",
			"/",
		),
		$path) ;
	$path = preg_replace(
		array(
			"~/\./~",
			"~^\./~",
			"~/\.$~"
		),
		array(
			"/",
			"",
			"/"
		),
		$path);
	return ($path?$path:'.') ;
}

function ckeditor_add_pointtexte($s) {
	return ".texte $s" ;
}

function ckeditor_get_css() {
	return '' ;
}

function ckeditor_insert_head($flux) {

	return $flux ; // ."<style type='text/css'>\n/* FCKEditor's CSS */\n".ckeditor_get_css()."\n</style>" ;
}

function ckeditor_header_prive($flux) {
	if (($_GET['editmode'] == 'ckeditor') ||
		 ((lire_config('ckeditor/editmode') == 'ckeditor') && ($_GET['editmode'] != 'spip' ))
	) {
		return $flux."<style type='text/css'>\n/* CKEditor's CSS */\n.spip_barre { display:none ; }\n.explication { display: none ; }\n</style>" ;
	} else {
		return $flux ;
	}
}

function ckeditor_getUrlSite() {
	$url_site = lire_meta('adresse_site') ;
// conversion un peu complexe, dûe au fait que ckeditor convertit les url qui lui sont passé...
// à voir s'il n'est pas possible de plutôt patcher ckeditor... ou autre
	if (preg_match("~^(https?://[^/]*/?)(.*)$~", $url_site, $match)) {
		$server = $match[1] ;
		$url_site = $server . join("/", array_map('urlencode', preg_split("~/~",$match[2]) ) ) ;
	}
	return $url_site ;
}

function ckeditor_pre_edition($flux) {
	if (($flux['args']['action'] === 'modifier') && ($flux['args']['type'] === 'article')) {

		$url_site = ckeditor_getUrlSite() ;
		$url_site2= preg_quote(lire_meta('adresse_site'),"~") ;

		// on translate les url absolues de CKeditor en url relative pour la DB spip
		$search[] = "~(<img[^>]*src=)(['\"])(?:$url_site|$url_site2)(.*?)\\2~" ;
		$replace[] = "$1$2$3$2" ;

		$search[] = "~(<a[^>]href=)(['\"])(?:$url_site|$url_site2)(.*?)\\2~" ; 
		$replace[] = "$1$2$3$2" ;
		/*
		$search[] = "~<table\s~" ;
		$replace[] = "<table class='spip' " ;
		*/
		$editexclu = lire_config("ckeditor/editexclu") ;
		($editmode = $_GET['editmode']) || ($editmode = lire_config('ckeditor/editmode')) || ($editmode = 'spip') ;

		if (($editmode != 'spip') && PROTECTED_SPIP_TAGS) {
			$spiptags = PROTECTED_SPIP_TAGS ;
			$search[] = "#&lt;(${spiptags}.*?)&gt;#" ;
			$replace[] = "<$1>" ;
		}

		if (lire_config("ckeditor/spiplinks")) {
			$search[] = "#(\[.*?-)&gt;(.*?\])#" ;
			$replace[] = "$1>$2" ;
		}
	

		$flux['data']['texte'] = preg_replace($search, $replace, $flux['data']['texte']) ;
	}
	return $flux ;
}


function ckeditor_pre_liens($flux) {
	// on translate les url relatives de la DB spip en url absolues
	$url_site = lire_meta('adresse_site') ;
	$flux = preg_replace(
		array(
				  "~(<img[^>]*src=)(['\"])(/.*?)\\2~",
				  "~(<a[^>]href=)(['\"])(/.*?)\\2~"
			),
		array(
				  "$1$2${url_site}$3$2",
				  "$1$2${url_site}$3$2"
			),
		$flux) ;
	return $flux ;
}

function ckeditor_editer_contenu_objet($flux){
	if(preg_match("~^(article|rubrique|breve|mot)s_edit$~", $_GET['exec'], $match) && ($objet = $match[1]) /* && lire_config("ckeditor/fck_".$objet)*/) {
		$request = 'exec='.$objet.'s_edit&id_'.$objet.'='.$_GET['id_'.$objet] ;
		$select_images = '../spip.php?page=select_images&type&'.$objet.'='.$_GET['id_'.$objet] ;
		$select_flash = '../spip.php?page=select_flash&'.$objet.'='.$_GET['id_'.$objet] ;
		$contexte = 'id_'.$objet.'='.$_GET['id_'.$objet] ;
	} else {
		return $flux ;
	}

	$editexclu = lire_config("ckeditor/editexclu") ;
	if ($editexclu) {
		$editmode = lire_config('ckeditor/editmode') ;
	} else {
		($editmode = $_GET['editmode']) || ($editmode = lire_config('ckeditor/editmode')) || ($editmode = 'spip') ;
	}

	// on translate les url relatives stockées dans la DB spip en url absolues :
	$search[] = "#(&lt;a\s.*href=&quot;)(/.*?&quot;)#" ;
	$replace[] = "$1".ckeditor_getUrlSite()."$2" ;

	$search[] = "#(&lt;img\s.*src=&quot;)(/.*?&quot;)#" ;
	$replace[] = "$1".ckeditor_getUrlSite()."$2" ;

	if (($editmode != 'spip') && PROTECTED_SPIP_TAGS) {
		$spiptags = PROTECTED_SPIP_TAGS ;
		$search[] = "#&lt;(${spiptags}.*?)&gt;#" ;
		$replace[] = "&amp;lt;$1&amp;gt;" ;
	}
	if (lire_config("ckeditor/spiplinks")) {
		$search[] = "#(\[.*?-)&gt;(.*?\])#" ;
		$replace[] = "$1&amp;gt;$2" ;
	}

	$flux['data'] = preg_replace($search, $replace, $flux['data']) ;

	if ($editmode == 'spip') {
		if (!$editexclu) {// peut-on utiliser autre chose que le mode d'édition actuel ?
			$htmlchoose = '<div style="padding-left:125px; padding-top:5px;">Mode d\\\'édition : <strong>[SPIP]</strong> | <a href="'.$_SERVER['SCRIPT_NAME'].'?'.$request."&editmode=ckeditor\" onclick=\"javascript:return ChangeMode();\">visuel</a></div>" ;
		} else {
			$htmlchoose = '' ;
		}
	} else {
		if (!$editexclu) {// peut-on utiliser autre chose que le mode d'édition actuel ?
			$htmlchoose = '<div style="padding-left:125px; padding-top:5px;">Mode d\\\'édition : <a href="'.$_SERVER['SCRIPT_NAME'].'?'.$request.'&editmode=spip" onclick="javascript:return ChangeMode();">SPIP</a> | <strong>[visuel]</strong></div>' ;
		} else {
			$htmlchoose = '' ;
		}
		$barre_outils = "" ;
		#include(_DIR_PLUGIN_CKEDITOR."toolbars.php") ;
		global $toolbars ;
		include_spip("toolbars") ;
		
		if (is_array($toolbars)) {
		 foreach($toolbars as $toolbar) {
			$tb = '' ;
			//if ((is_array($toolbar)) {
			 foreach($toolbar as $tool) {
				if (lire_config("ckeditor/tool_$tool")) {
					$tb=($tb?$tb.", ":"")."'$tool'" ;
				}
			 }
			//}
			if ($tb) {
				$barre_outils = ($barre_outils?$barre_outils.",\n\t\t[":"\t[\n\t\t[").$tb."]" ;
			}
		 } 
		}
		if ($barre_outils) {
			$barre_outils .= "\n\t]" ;
		} else {
			$barre_outils = "\t[ ['About'] ]" ;
		}
		$cklanguage = lire_config("ckeditor/cklanguage") ;

		(($cklanguage == 'auto') || ($cklanguage == '')) && ($cklanguage = lire_meta("langue_site")) ;
	
		$script = "	<script type=\"text/javascript\" src=\""._DIR_RACINE."lib/ckeditor/ckeditor.js\"></script>
	<script id=\"headscript\" type=\"text/javascript\">
//<![CDATA[
				 
$(document).ready(function() {
							 
	CKEDITOR.spip_absolutepath = '".(lire_config("ckeditor/siteurl")?lire_config("ckeditor/siteurl"):lire_meta("adresse_site"))."',
	CKEDITOR._scaytParams = {sLang : '".lire_config('ckeditor/spellchecklang')."'};
	editor = CKEDITOR.replace( 'text_area',
		{
			language : '".$cklanguage."',
			height : ".lire_config('ckeditor/taille').",
			scayt_autoStartup : ".(lire_config('ckeditor/startspellcheck')?'true':'false').",
			filebrowserImageBrowseUrl : '".$select_images."',
			filebrowserFlashBrowseUrl : '".$select_flash."',
			filebrowserWindowWidth : '300',
			filebrowserWindowHeight : '100',
			extraPlugins : 'spip',
			toolbar :
".$barre_outils."
		} );
	editor.config.stylesCombo_stylesSet = 'spip-styles:"._DIR_PLUGIN_CKEDITOR."spip-styles.js' ;
});	
//]]>
	</script>\n" ;

		$flux['data'] .= $script ;
	}
	$flux['data'] .= "<script type=\"text/javascript\">
//<![CDATA[
	function ChangeMode() {
		return confirm('Vous voulez changer de mode d\\'édition.\\n\\nSi vous n\\'avez pas enregistré vos modifications, elles seront perdues.\\n\\nÊtes-vous sûr de vouloir changer de mode d\\'édition ?') ;
	}
	$('#text_area').before('".$htmlchoose."') ;
//]]>
</script>" ;
	return $flux ;

 }

?>
