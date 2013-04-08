<?php
/*
 * Squelette : prive/formulaires/login.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:40 GMT (5.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette prive/formulaires/login.html.
//
function html_e53d9ed2b7e1ba4fbec99b074db0706b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'Cache-Control: no-store, no-cache, must-revalidate' . '"); ?'.'>' .
'<'.'?php header("' . 'Pragma: no-cache' . '"); ?'.'>' .
'<div class=\'formulaire_spip formulaire_login\'>
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['_deja_loge']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class=\'reponse_formulaire reponse_formulaire_erreur\'>' . $t1 . '</p>') :
		'') .
'

	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['echec_cookie']),true))))!=='' ?
		($t1 . (	'
	<fieldset class=\'reponse_formulaire reponse_formulaire_erreur\'>
		<h2>' .
	_T('public/spip/ecrire:avis_erreur_cookie',array()) .
	'</h2>
		<p class="erreur_message">' .
	_T('public/spip/ecrire:login_cookie_oblige',array()) .
	'<br />' .
	_T('public/spip/ecrire:login_cookie_accepte',array()) .
	'</p>
	</fieldset>')) :
		'') .
'

	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['editable']),true))))!=='' ?
		($t1 . (	'
	<form id=\'formulaire_login\' method=\'post\' action=\'' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'\' enctype=\'multipart/form-data\'>
	
	' .
	'<div>' . (form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true)))). '<input type=\'hidden\' name=\'formulaire_action\' value=\'' . 'login' . '\' />'. '<input type=\'hidden\' name=\'formulaire_action_args\' value=\'' . @$Pile[0]['formulaire_args']. '\' />'. (@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') . '</div><fieldset>
		<legend>' .
	_T('public/spip/ecrire:form_forum_identifiants',array()) .
	'</legend>
		<span id="spip_logo_auteur">' .
	interdire_scripts(sinon(@$Pile[0]['_logo'],'')) .
	'</span>
		<ul>
			<li class="editer_login obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'var_login'))  ?
			(' ' . 'erreur') :
			'') .
	'">
				<label for="var_login">' .
	_T('public/spip/ecrire:login_login2',array()) .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'var_login')))!=='' ?
			('
				<span class="erreur_message">' . $t2 . '</span>
				') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'var_login\' id=\'var_login\' value="' .
	(@$Pile[0]['var_login']) .
	'" size=\'40\' />
			</li>
			<li class="editer_password obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'password'))  ?
			(' ' . 'erreur') :
			'') .
	'">
				<label for="password">' .
	_T('public/spip/ecrire:login_pass2',array()) .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'password')))!=='' ?
			('
				<span class="erreur_message">' . $t2 . '</span>
				') :
			'') .
	'<input type=\'password\' class=\'password\' name=\'password\' id=\'password\' value="" size=\'40\' />
				<span class=\'details\'>&#91;<a href="' .
	interdire_scripts(generer_url_public('spip_pass')) .
	'" id=\'spip_pass\'>' .
	_T('public/spip/ecrire:login_motpasseoublie',array()) .
	'</a>&#93;</span>
			</li>
			' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['rester_connecte']),true))))!=='' ?
			($t2 . (	'
			<li class="editer_session"><div class=\'choix\'>
				<input type="checkbox" class="checkbox" name="session_remember" id="session_remember" value="oui" ' .
		((@$Pile[0]['cnx'])  ?
				(' ' . 'checked="checked"') :
				'') .
		' onchange="jQuery(this).addClass(\'modifie\');" />
				<label class=\'nofx\' for="session_remember">' .
		_T('public/spip/ecrire:login_rester_identifie',array()) .
		'</label>
			</div></li>')) :
			'') .
	'
		</ul>
	</fieldset>
	<p class="boutons"><input type="submit" class="submit" value="' .
	_T('public/spip/ecrire:bouton_valider',array()) .
	'" /></p>
	</form>
	')) :
		'') .
'
	
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['auth_http']),true))))!=='' ?
		('<form action="' . $t1 . (	'" method="get">' .
	(($t2 = strval(interdire_scripts(form_hidden(entites_html((@$Pile[0]['auth_http']),true)))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	'
	<fieldset>
		<legend>' .
	_T('public/spip/ecrire:login_sans_cookiie',array()) .
	'</legend>
		' .
	_T('public/spip/ecrire:login_preferez_refuser',array()) .
	'
		<input type="hidden" name="essai_auth_http" value="oui"/>
		' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['url']),true))))!=='' ?
			('<input type="hidden" name="url" value="' . $t2 . '"/>') :
			'') .
	'
		<p class="boutons"><input type="submit" class="submit" value="' .
	_T('public/spip/ecrire:login_sans_cookiie',array()) .
	'"/></p>
	</fieldset>
	</form>
	')) :
		'') .
'
</div>

<script type="text/javascript" src="' .
interdire_scripts(eval('return '.'_DIR_JAVASCRIPT'.';')) .
'md5.js"></script>
<script type="text/javascript" src="' .
interdire_scripts(eval('return '.'_DIR_JAVASCRIPT'.';')) .
'login.js"></script>
<script type=\'text/javascript\'>/*<!' .
interdire_scripts(eval('return '.'chr(91)'.';')) .
'CDATA' .
interdire_scripts(eval('return '.'chr(91)'.';')) .
'*/
	var alea_actuel=\'' .
interdire_scripts(entites_html((@$Pile[0]['_alea_actuel']),true)) .
'\';
	var alea_futur=\'' .
interdire_scripts(entites_html((@$Pile[0]['_alea_futur']),true)) .
'\';
	var login=\'' .
interdire_scripts(entites_html(sinon(@$Pile[0]['var_login'],''),true)) .
'\';
	var page_auteur = \'' .
interdire_scripts(generer_url_public('informer_auteur')) .
'\';
	var informe_auteur_en_cours = false;
	var attente_informe = 0;
	
	(function($){
		$(\'#password\')
			.after("<em id=\'pass_securise\'><img src=\'' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'securise.gif\' width=\'16\' height=\'16\' alt=\'' .
_T('public/spip/ecrire:login_securise',array()) .
'\' title=\'' .
_T('public/spip/ecrire:login_securise',array()) .
'\' \\/><\\/em>");
		affiche_login_secure();
		$(\'#var_login\').change(actualise_auteur);
		$(\'form#formulaire_login\').submit(login_submit);
	}(jQuery));
	
/*' .
interdire_scripts(eval('return '.'chr(93)'.';')) .
interdire_scripts(eval('return '.'chr(93)'.';')) .
'>*/</script>');

	return analyse_resultat_skel('html_e53d9ed2b7e1ba4fbec99b074db0706b', $Cache, $page, 'prive/formulaires/login.html');
}

?>