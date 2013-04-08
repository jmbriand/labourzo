<?php
// Configuration de controle pour le plugin 'Couteau Suisse'

// Tous les outils et leurs variables
$liste_outils = array(
	// Dossier du squelette
	'dossier_squelettes' => 'dossier_squelettes',
	// Supprime le num&eacute;ro
	'supprimer_numero' => '',
	// Paragrapher
	'paragrapher2' => 'paragrapher',
	// Force la langue
	'forcer_langue' => '',
	// Liste des webmestres
	'webmestres' => 'webmestres',
	// Balise #INSERT_HEAD
	'insert_head' => '',
	// Balise #INTRODUCTION
	'introduction' => 'lgr_introduction|suite_introduction|lien_introduction',
	// Type d'interface priv&eacute;e
	'set_options' => 'radio_set_options4',
	// Gestion du JavaScript
	'filtrer_javascript' => 'radio_filtrer_javascript3',
	// Taille des forums
	'forum_lgrmaxi' => 'forum_lgrmaxi',
	// Limites m&eacute;moire
	'SPIP_tailles' => 'img_Hmax|img_Wmax|img_Smax|logo_Hmax|logo_Wmax|logo_Smax|doc_Smax|copie_Smax|img_GDmax',
	// Pr&eacute;visualisation des articles
	'previsualisation' => '',
	// Pas de forums anonymes
	'auteur_forum' => 'auteur_forum_nom|auteur_forum_email|auteur_forum_deux',
	// Suivi des forums publics
	'suivi_forums' => 'radio_suivi_forums3',
	// Lutte contre le SPAM
	'spam' => 'spam_mots|spam_ips',
	// Pas de stockage IP
	'no_IP' => '',
	// Pas de verrouillage de fichiers
	'flock' => '',
	// Comportements du Couteau Suisse
	'cs_comportement' => 'log_couteau_suisse|spip_options_on|distant_off|distant_outils_off',
	// Validateur XML
	'xml' => '',
	// D&eacute;sactive jQuery
	'f_jQuery' => '',
	// Site en travaux
	'en_travaux' => 'message_travaux|titre_travaux|admin_travaux|avertir_travaux|prive_travaux',
	// Bo&icirc;tes priv&eacute;es
	'boites_privees' => 'cs_rss|format_spip|stat_auteurs|qui_webmasters|bp_urls_propres|bp_tri_auteurs',
	// Page des auteurs
	'auteurs' => 'max_auteurs_page|auteurs_tout_voir|auteurs_0|auteurs_1|auteurs_5|auteurs_6|auteurs_n',
	// Version texte
	'verstexte' => '',
	// Orientation des images
	'orientation' => '',
	// D&eacute;coupe en pages et onglets
	'decoupe' => 'balise_decoupe',
	// Sommaire automatique
	'sommaire' => 'prof_sommaire|lgr_sommaire|jolies_ancres|auto_sommaire|balise_sommaire',
	// Intertitres en image
	'titres_typo' => 'i_taille|i_couleur|i_police|i_largeur|i_hauteur|i_padding|i_align',
	// D&eacute;sactive les objets flash
	'desactiver_flash' => '',
	// SPIP hag al liammo&ugrave;... diavaez
	'SPIP_liens' => 'radio_target_blank3|url_glossaire_externe2|enveloppe_mails',
	// Visiteurs connect&eacute;s
	'visiteurs_connectes' => '',
	// Blocs multilingues
	'toutmulti' => '',
	// Belles puces
	'pucesli' => 'puceSPIP',
	// Citations bien balis&eacute;es
	'citations_bb' => '',
	// D&eacute;coration
	'decoration' => 'decoration_styles',
	// Tout en couleurs
	'couleurs' => 'couleurs_fonds|set_couleurs|couleurs_perso',
	// Exposants typographiques
	'typo_exposants' => 'expo_bofbof',
	// Guillemets typographiques
	'guillemets' => '',
	// Belles URLs
	'liens_orphelins' => 'liens_interrogation|liens_orphelins',
	// Filets de S&eacute;paration
	'filets_sep' => '',
	// Smileys
	'smileys' => '',
	// Chatons
	'chatons' => '',
	// Glossaire interne
	'glossaire' => 'glossaire_groupes|glossaire_limite|glossaire_js',
	// MailCrypt
	'mailcrypt' => '',
	// Liens en clair
	'liens_en_clair' => '',
	// Ancres douces
	'soft_scroller' => 'scrollTo|LocalScroll',
	// Jolis Coins
	'jcorner' => 'jcorner_classes|jcorner_plugin',
	// Corrections automatiques
	'insertions' => 'insertions',
	// Mod&eacute;ration mod&eacute;r&eacute;e
	'moderation_moderee' => 'moderation_admin|moderation_redac|moderation_visit',
	// Balises #TITRE_PARENT/OBJET
	'titre_parent' => 'titres_etendus',
	// La corbeille
	'corbeille' => 'arret_optimisation',
	// Trousse &agrave; balises
	'trousse_balises' => '',
	// Horloge
	'horloge' => '',
	// Mises &agrave; jour automatiques
	'maj_auto' => '',
	// R&eacute;glage du s&eacute;lecteur de rubrique
	'brouteur' => 'rubrique_brouteur',
	// Les tris de SPIP
	'tri_articles' => 'tri_articles|tri_perso|tri_groupes|tri_perso_groupes',
	// Largeur d'&eacute;cran
	'spip_ecran' => 'spip_ecran',
	// All&egrave;gement de l'interface priv&eacute;e
	'simpl_interface' => '',
	// Bouton &laquo;&nbsp;Visiter&nbsp;&raquo;
	'icone_visiter' => '',
	// Blocs D&eacute;pliables
	'blocs' => 'bloc_unique|blocs_cookie|bloc_h4|blocs_slide|blocs_millisec',
	// SPIP et ses raccourcis&hellip;
	'class_spip' => 'racc_hr|puce|racc_h1|racc_h2|racc_g1|racc_g2|racc_i1|racc_i2|ouvre_ref|ferme_ref|ouvre_note|ferme_note|style_p|style_h',
	// SPIP et le cache&hellip;
	'spip_cache' => 'radio_desactive_cache4|quota_cache|derniere_modif_invalide|duree_cache|duree_cache_mutu',
	// Format des URLs
	'type_urls' => 'radio_type_urls3|terminaison_urls_page|separateur_urls_page|terminaison_urls_propres|debut_urls_propres|marqueurs_urls_propres|url_max_propres|debut_urls_propres2|marqueurs_urls_propres2|url_max_propres2|terminaison_urls_libres|debut_urls_libres|url_max_libres|url_arbo_minuscules|urls_arbo_sans_type|url_arbo_sep_id|terminaison_urls_arbo|url_max_arbo|terminaison_urls_propres_qs|url_max_propres_qs|terminaison_urls_propres_qs|marqueurs_urls_propres_qs|url_max_propres_qs|spip_script|urls_minuscules|urls_avec_id|urls_avec_id2|urls_id_3_chiffres|urls_id_sauf_rubriques'
);

// Outils actifs
$outils_actifs =
	'supprimer_numero';

// Variables actives
$variables_actives =
	'';

// Valeurs validees en metas
$valeurs_validees = array(

);

######## PACK ACTUEL DE CONFIGURATION DU COUTEAU SUISSE #########

// Attention, les surcharges sur les define(), les autorisations spécifiques ou les globales ne sont pas spécifiées ici

$GLOBALS['cs_installer']['Pack 15/04/10'] = array(

	// Installation des outils par défaut
	'outils' =>
		'supprimer_numero',

	// Installation des variables par défaut
	'variables' => array(
	
	)
); # Pack 15/04/10 #
?>