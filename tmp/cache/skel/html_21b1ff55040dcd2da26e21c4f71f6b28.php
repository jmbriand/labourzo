<?php
/*
 * Squelette : ../plugins/spip-bonux/style_prive_formulaires.html
 * Date :      Sat, 06 Apr 2013 14:08:03 GMT
 * Compile :   Sat, 06 Apr 2013 14:11:58 GMT (6.4ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/spip-bonux/style_prive_formulaires.html.
//
function html_21b1ff55040dcd2da26e21c4f71f6b28($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars']['claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_claire'],'edf3fe'),true)))) .
vide($Pile['vars']['foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_foncee'],'3874b0'),true)))) .
vide($Pile['vars']['left'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','left','right'))) .
vide($Pile['vars']['right'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','right','left'))) .
'
textarea {
	width: 97%;
	font-size:1em;
	margin:0;
}
.entete-formulaire{
	background:white;
	border:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	border-bottom:0;
	padding:0.5em;
	overflow:auto;
	zoom:1; /* correction IE6 */
}
.formulaire_spip .cadre{border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';}

.entete-formulaire p {margin:0 0 0.5em;}

/*
	Note sur ecran large et etroit, en [11846]
		large = 540px (ou 600px!)
		etroit = 505px
*/

/* Style des formulaires d\'edition
----------------------------------------------- */
.formulaire_spip {
	font-size:11px;
	line-height: 1.4em;
	padding:0;
	clear:both;

	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	color: #333;
	background: #fff ' .
(($t1 = strval(interdire_scripts(extraire_attribut(filtrer('image_graver', filtrer('image_aplatir',filtrer('image_sepia',find_in_path('images/formulaire-editer.jpg'),(	'#' .
	filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : "")))),'jpg')),'src'))))!=='' ?
		('url(' . $t1 . ') repeat-x bottom') :
		'') .
';
}


/*
.cadre-formulaire{background:white;padding:0;}
.entete-formulaire{padding:0.5em;}
*/

/* ul li */
.formulaire_spip ul {
	margin: 0;
	padding: 0;
	list-style: none;
}
.formulaire_spip li {
	margin: 0;
	padding: 10px 10px 10px 10px;
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':130px;
	clear:both;
	overflow:hidden;
	border-top: 1px solid #' .
filtrer('couleur_eclaircir',filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['foncee'] : ""))) .
';
}
/* Pour les cases à cocher */
.formulaire_spip li.choix,
.formulaire_spip li.editer_groupe_mots_associer,
.formulaire_spip li.editer_groupe_mots_reglage_avance,
.formulaire_spip li.editer_groupe_mots_editeur{
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':10px;
}
.formulaire_spip li fieldset li {border:0; padding-top:5px; padding-bottom:5px;}

/* elements du formulaire */
.formulaire_spip input.text,
.formulaire_spip input.password,
.formulaire_spip textarea,
.formulaire_spip select {
	width: 97%;
	font-size:1em;
	margin:0;
}
.formulaire_spip input.submit, 
.formulaire_spip input.reset, 
.formulaire_spip input.button {
	width: auto;
}

/* intitules (label) */
.formulaire_spip li label {
	width: 120px;
	float:' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':-125px; 
	text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	vertical-align: top;
	color:#555;
	font-weight:bold;
	/* pour IE6 */
	position:relative;
	display:inline;
}
/* pour les autres */
.formulaire_spip ul>li label {
	display:block;
	position:static;
}

.formulaire_spip li p {
	margin-top:0;
	margin-bottom:0;
}

/* fieldset */
.formulaire_spip li.fieldset {padding:0;}
.formulaire_spip fieldset {
	margin:0;
	padding:0 0 5px 0;
	border:0;
}
.formulaire_spip li fieldset {
	border-top:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	border-bottom:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	background:transparent;
}
.formulaire_spip fieldset legend {
	padding:0.5em;
	font-weight:bold;
	font-style:italic;
	font-size:1.2em;
}
.formulaire_spip li fieldset legend {
	font-style:normal;
	font-size:1em;
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':0px;
	line-height:0.6em;
	background:#fff; /* ie 6*/
}
.formulaire_spip li fieldset >legend {
	background:none; /* others */
}
.formulaire_spip li fieldset h3.legend {
	font-size:1.1em;
	color:#333;
	margin-top:0;
	background:' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	padding:2px 5px;
}

/* champ des radio/checkbox
*  on annule les decalages de label/champs
*  lorsqu\'ils sont inclus dans une class .champ
*
*  La liste par defaut est verticale
*  pour l\'avoir horizontale, il faut specifier :
*  .formulaire_spip .formulaire_editer .editer_qqc .champ{display:inline;}
*/
.formulaire_spip .choix label {float:none; margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':5px; display:inline;font-weight:normal;width:auto;}
.formulaire_spip .choix label input {vertical-align:middle;}
.formulaire_spip .choix input.radio,
.formulaire_spip .choix input.checkbox {width:auto;}

/* icone d\'aide */
/*.formulaire_spip li em.aide { float:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';margin-' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
':-10px;}*/

/* boutons */
.formulaire_spip .boutons,.boutons_formulaire {
	margin:0; clear:both;
	text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';
	font-size: 1.2em;
	padding: 7px 1em;
	margin:0;
}
#navigation .formulaire_spip .boutons,.boutons_formulaire,#extra .formulaire_spip .boutons,.boutons_formulaire {
	padding: 5px;
}

.boutons_formulaire {font-size:1em;}
.formulaire_spip .boutons input.submit,.boutons_formulaire input.submit {
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 1em;
	padding: 0 1em;
	font-weight:normal;
}


/* obligatoire */
.formulaire_spip li.obligatoire {
	background-color:' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		(' #' . $t1) :
		'') .
';
}
.formulaire_spip li.obligatoire label {
	font-weight: bold;
	color:#000;
}


/* erreur */
.formulaire_spip .erreur input.text,
.formulaire_spip .erreur textarea {
	background-color: #FFCCCC;
	border-style: solid;
	border-color: #C30;
}
.formulaire_spip .erreur .erreur_message,
.formulaire_spip em.attention,
.formulaire_spip .reponse_formulaire_erreur{
	color: #C30;
	font-weight: bold;
}
.formulaire_spip .erreur_message{
	display:block;
}

.formulaire_spip .reponse_formulaire_erreur{
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':0.5em;
}
/* message reussite ? */
.formulaire_spip .reponse_formulaire_ok{
	color: #53AD20;
	font-weight: bold;
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':0.5em;
}

/* commentaires */
.formulaire_spip .explication{	font-size:10px;	padding:10px;}
.formulaire_spip li >.explication{ padding:0;}

/* remarques importantes */
.formulaire_spip em.attention{
	display:block;
	margin:0.5em;
	font-weight:normal;
}


/* barre d\'outil */
.formulaire_spip table.spip_barre{
	background:#aaa;
	border: 1px solid #666;
	width:90%; /* pour mettre a la meme taille que les champs de formulaire */
	background:none; border:0; margin:0; padding:0;/**/
}
.formulaire_spip table.spip_barre a img { 
	background-color:#ccc;
	padding: 2px;
	border: 1px solid #666;
	margin-right:1px;
}
.formulaire_spip table.spip_barre a:hover img{
	background:white;
}

/*
 * Formulaires compactes
 */
.formulaire_spip_compact li,#navigation .formulaire_spip li,#extra .formulaire_spip li {padding:2px 5px;border:none;}
.formulaire_spip_compact li label,#navigation .formulaire_spip li label,#extra .formulaire_spip li label {float:none;margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':0;width:auto;}
.formulaire_spip .editer_date select {width:auto;}



/*
 * Cas particuliers
 */

/* annuler les f@@@@ div de sa majeste */
div.edition, div.label {display:inline;}

/* accepter la classe \'haut\' pour mettre les blocs
   sur toute la largeur du formulaire comme la css du core... */
.formulaire_spip li.haut {padding-left:5px;}
.formulaire_spip li.haut label {margin-left:0px;margin-bottom:5px; display:block; float:none;width:auto;}
.formulaire_spip li.haut textarea {width:98%;}


.formulaire_editer .editer_parent {background:#eee;}
.formulaire_editer .editer_parent #choix_parent {}
.formulaire_editer .editer_parent #choix_parent_principal,
.formulaire_editer .editer_parent #choix_parent_selection {margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':-120px;}

.formulaire_editer .editer_titre input,
.formulaire_editer .editer_nom input{font-size:1.2em; font-weight:bold;}
.formulaire_editer .editer_chapo textarea{height:12em;}

/* le brouteur de rubrique en cas de petit ecran doit etre aussi plus petit ! */
.etroit .formulaire_editer .editer_parent #titreparent{width:50% !important;}

/* pour mettre les text-area en grand...*/
.formulaire_editer .editer_texte,
.formulaire_editer .editer_chapo,
.formulaire_editer .editer_descriptif {padding-left:5px;}
.formulaire_editer .editer_texte label,
.formulaire_editer .editer_chapo label,
.formulaire_editer .editer_descriptif label {margin-left:0px;margin-bottom:5px; display:block; float:none;width:auto;}
.formulaire_editer .editer_texte textarea,
.formulaire_editer .editer_chapo textarea,
.formulaire_editer .editer_descriptif textarea {width:98%;}
.formulaire_editer .editer_texte table.spip_barre {width:98%;}
/* */


/* auteur */
.formulaire_editer_auteur .editer_statut ul{margin:0; }
.formulaire_editer_auteur .editer_statut li{list-style-position:inside; padding:0;}
.formulaire_editer_auteur .editer_statut input[type=submit]{width:auto;}

.formulaire_editer_auteur li.editer_statut .instituer_auteur {margin-top:15px;margin-left:-125px;}

.formulaire_editer .editer_redacteurs_connectes p.explication{margin:0.5em;}

/* si on enleve le: ul fieldset{margin-left:-125px;} il faut remettre ceci : * /
.formulaire_editer .editer_identification{padding-left:5px;}
.formulaire_editer .editer_redacteurs_connectes{padding-left:5px;}
.formulaire_editer .editer_referencement_automatise {padding-left:5px;}
.formulaire_editer .editer_syndications {padding-left:5px;}
.formulaire_editer .editer_liens_sites {padding-left:5px;}
/* */

/* sites */
.formulaire_editer .editer_referencement_automatise label {margin-left:0px;}
.formulaire_editer .editer_referencement_automatise li {padding-left:5px;}
.formulaire_editer .editer_referencement_automatise li label {display:block; float:none; width:auto;}


/* breves */
.formulaire_editer_breve .editer_statut{padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':250px;}
.formulaire_editer_breve .editer_statut label{width:240px;margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':-245px;}


/* navigateur de rubrique */
.confirmer_deplacement input {
	float: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': -20px;	
}

/* barre typo */

table.spip_barre {
	background-color: ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	border-left: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	border-right: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	padding: 3px;
	padding-bottom: 0px;
}

table.spip_barre a img {padding: 3px; border: 1px outset ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
'; }
table.spip_barre a:hover img { background: #FFF; border: 1px solid #CC9; }
table.spip_barre input.barre { width: 99%; background: transparent; border: 0; color: #F57900; }

/* retablir les ul.spip dans les explications */

.formulaire_spip ul.spip {
	margin:10px 0;
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;
	list-style-type: disc;
	list-style-position: outside;
}
.formulaire_spip ul.spip li {
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;
	padding: 0;
	overflow:visible;
}

.formulaire_spip a {color:' .
(($t1 = strval(filtrer('couleur_foncer',(is_array($a = ($Pile["vars"])) ? $a['foncee'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';text-decoration:underline;}


/* Style des formulaires de configuration
----------------------------------------------- */
.formulaire_configurer {margin:2em 0;}

');

	return analyse_resultat_skel('html_21b1ff55040dcd2da26e21c4f71f6b28', $Cache, $page, '../plugins/spip-bonux/style_prive_formulaires.html');
}

?>