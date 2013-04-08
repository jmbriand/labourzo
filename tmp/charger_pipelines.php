<?php
if (defined('_ECRIRE_INC_VERSION')) {
// Pipeline accueil_encours 
function execute_pipeline_accueil_encours(&$val){
return $val;
}

// Pipeline accueil_gadgets 
function execute_pipeline_accueil_gadgets(&$val){
return $val;
}

// Pipeline accueil_informations 
function execute_pipeline_accueil_informations(&$val){
return $val;
}

// Pipeline affichage_final 
function execute_pipeline_affichage_final(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('f_surligne', $val);
$val = minipipe('f_tidy', $val);
$val = minipipe('f_admin', $val);
$val = minipipe('f_msie', $val);
$val = minipipe('couteau_suisse_affichage_final', $val);
return $val;
}

// Pipeline affiche_droite 
function execute_pipeline_affiche_droite(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_affiche_droite', $val);
return $val;
}

// Pipeline affiche_gauche 
function execute_pipeline_affiche_gauche(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('cfg_affiche_gauche', $val);
$val = minipipe('couteau_suisse_affiche_gauche', $val);
return $val;
}

// Pipeline affiche_milieu 
function execute_pipeline_affiche_milieu(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
include_once(_DIR_PLUGINS.'acces_restreint_3_0/acces_restreint_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_affiche_milieu', $val);
$val = minipipe('accesrestreint_affiche_milieu', $val);
return $val;
}

// Pipeline affiche_enfants 
function execute_pipeline_affiche_enfants(&$val){
return $val;
}

// Pipeline affiche_hierarchie 
function execute_pipeline_affiche_hierarchie(&$val){
return $val;
}

// Pipeline boite_infos 
function execute_pipeline_boite_infos(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('f_boite_infos', $val);
$val = minipipe('couteau_suisse_boite_infos', $val);
return $val;
}

// Pipeline ajouter_boutons 
function execute_pipeline_ajouter_boutons(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
include_once(_DIR_PLUGINS.'tabledata-v2-2-1/tabledata_pipelines.php');
include_once(_DIR_PLUGINS.'acces_restreint_3_0/acces_restreint_pipelines.php');
include_once(_DIR_PLUGINS.'contact100312/contact_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('cfg_ajouter_boutons', $val);
$val = minipipe('tabledata_ajouterBoutons', $val);
$val = minipipe('accesrestreint_ajouter_boutons', $val);
$val = minipipe('contact_ajouter_boutons', $val);
return $val;
}

// Pipeline ajouter_onglets 
function execute_pipeline_ajouter_onglets(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_ajouter_onglets', $val);
return $val;
}

// Pipeline body_prive 
function execute_pipeline_body_prive(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'saveauto_2_0/saveauto_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('saveauto_body_prive', $val);
return $val;
}

// Pipeline declarer_tables_interfaces 
function execute_pipeline_declarer_tables_interfaces(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'acces_restreint_3_0/base/acces_restreint.php');
include_once(_DIR_PLUGINS.'contact100312/base/contact_tables.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('accesrestreint_declarer_tables_interfaces', $val);
$val = minipipe('contact_declarer_tables_interfaces', $val);
return $val;
}

// Pipeline declarer_tables_principales 
function execute_pipeline_declarer_tables_principales(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'acces_restreint_3_0/base/acces_restreint.php');
include_once(_DIR_PLUGINS.'contact100312/base/contact_tables.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('accesrestreint_declarer_tables_principales', $val);
$val = minipipe('contact_declarer_tables_principales', $val);
return $val;
}

// Pipeline declarer_tables_auxiliaires 
function execute_pipeline_declarer_tables_auxiliaires(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'acces_restreint_3_0/base/acces_restreint.php');
include_once(_DIR_PLUGINS.'contact100312/base/contact_tables.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('accesrestreint_declarer_tables_auxiliaires', $val);
$val = minipipe('contact_declarer_tables_auxiliaires', $val);
return $val;
}

// Pipeline declarer_tables_objets_surnoms 
function execute_pipeline_declarer_tables_objets_surnoms(&$val){
return $val;
}

// Pipeline definir_session 
function execute_pipeline_definir_session(&$val){
return $val;
}

// Pipeline delete_all 
function execute_pipeline_delete_all(&$val){
return $val;
}

// Pipeline delete_statistiques 
function execute_pipeline_delete_statistiques(&$val){
return $val;
}

// Pipeline exec_init 
function execute_pipeline_exec_init(&$val){
return $val;
}

// Pipeline formulaire_charger 
function execute_pipeline_formulaire_charger(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('cfg_formulaire_charger', $val);
return $val;
}

// Pipeline formulaire_verifier 
function execute_pipeline_formulaire_verifier(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('cfg_formulaire_verifier', $val);
return $val;
}

// Pipeline formulaire_traiter 
function execute_pipeline_formulaire_traiter(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('cfg_formulaire_traiter', $val);
return $val;
}

// Pipeline header_prive 
function execute_pipeline_header_prive(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
include_once(_DIR_PLUGINS.'contact100312/contact_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('f_jQuery', $val);
$val = minipipe('cfg_header_prive', $val);
$val = minipipe('couteau_suisse_header_prive', $val);
$val = minipipe('contact_header_prive', $val);
$val = minipipe('compacte_head', $val);
return $val;
}

// Pipeline insert_head 
function execute_pipeline_insert_head(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('f_jQuery', $val);
$val = minipipe('cfg_insert_head', $val);
$val = minipipe('couteau_suisse_insert_head', $val);
return $val;
}

// Pipeline jquery_plugins 
function execute_pipeline_jquery_plugins(&$val){
return $val;
}

// Pipeline lister_tables_noexport 
function execute_pipeline_lister_tables_noexport(&$val){
return $val;
}

// Pipeline libelle_association_mots 
function execute_pipeline_libelle_association_mots(&$val){
return $val;
}

// Pipeline mots_indexation 
function execute_pipeline_mots_indexation(&$val){
return $val;
}

// Pipeline nettoyer_raccourcis_typo 
function execute_pipeline_nettoyer_raccourcis_typo(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_nettoyer_raccourcis_typo', $val);
return $val;
}

// Pipeline pre_boucle 
function execute_pipeline_pre_boucle(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
include_once(_DIR_PLUGINS.'acces_restreint_3_0/public/acces_restreint.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_pre_boucle', $val);
$val = minipipe('accesrestreint_pre_boucle', $val);
return $val;
}

// Pipeline post_boucle 
function execute_pipeline_post_boucle(&$val){
return $val;
}

// Pipeline pre_propre 
function execute_pipeline_pre_propre(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('extraire_multi', $val);
$val = minipipe('traiter_poesie', $val);
$val = minipipe('traiter_retours_chariots', $val);
$val = minipipe('couteau_suisse_pre_propre', $val);
return $val;
}

// Pipeline pre_liens 
function execute_pipeline_pre_liens(&$val){
$val = minipipe('traiter_raccourci_liens', $val);
$val = minipipe('traiter_raccourci_glossaire', $val);
$val = minipipe('traiter_raccourci_ancre', $val);
return $val;
}

// Pipeline post_propre 
function execute_pipeline_post_propre(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_post_propre', $val);
return $val;
}

// Pipeline pre_typo 
function execute_pipeline_pre_typo(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('extraire_multi', $val);
$val = minipipe('couteau_suisse_pre_typo', $val);
return $val;
}

// Pipeline post_typo 
function execute_pipeline_post_typo(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('quote_amp', $val);
$val = minipipe('couteau_suisse_post_typo', $val);
return $val;
}

// Pipeline pre_edition 
function execute_pipeline_pre_edition(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('premiere_revision', $val);
$val = minipipe('couteau_suisse_pre_edition', $val);
return $val;
}

// Pipeline post_edition 
function execute_pipeline_post_edition(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('nouvelle_revision', $val);
$val = minipipe('couteau_suisse_post_edition', $val);
return $val;
}

// Pipeline pre_syndication 
function execute_pipeline_pre_syndication(&$val){
return $val;
}

// Pipeline post_syndication 
function execute_pipeline_post_syndication(&$val){
return $val;
}

// Pipeline pre_indexation 
function execute_pipeline_pre_indexation(&$val){
return $val;
}

// Pipeline requete_dico 
function execute_pipeline_requete_dico(&$val){
return $val;
}

// Pipeline agenda_rendu_evenement 
function execute_pipeline_agenda_rendu_evenement(&$val){
return $val;
}

// Pipeline taches_generales_cron 
function execute_pipeline_taches_generales_cron(&$val){
return $val;
}

// Pipeline calculer_rubriques 
function execute_pipeline_calculer_rubriques(&$val){
return $val;
}

// Pipeline autoriser 
function execute_pipeline_autoriser(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'acces_restreint_3_0/inc/acces_restreint_autoriser.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('accesrestreint_autoriser', $val);
return $val;
}

// Pipeline notifications 
function execute_pipeline_notifications(&$val){
return $val;
}

// Pipeline afficher_contenu_objet 
function execute_pipeline_afficher_contenu_objet(&$val){
return $val;
}

// Pipeline afficher_revision_objet 
function execute_pipeline_afficher_revision_objet(&$val){
return $val;
}

// Pipeline editer_contenu_objet 
function execute_pipeline_editer_contenu_objet(&$val){
return $val;
}

// Pipeline creer_chaine_url 
function execute_pipeline_creer_chaine_url(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('creer_chaine_url', $val);
$val = minipipe('couteau_suisse_creer_chaine_url', $val);
return $val;
}

// Pipeline rechercher_liste_des_champs 
function execute_pipeline_rechercher_liste_des_champs(&$val){
return $val;
}

// Pipeline rechercher_liste_des_jointures 
function execute_pipeline_rechercher_liste_des_jointures(&$val){
return $val;
}

// Pipeline recuperer_fond 
function execute_pipeline_recuperer_fond(&$val){
return $val;
}

// Pipeline styliser 
function execute_pipeline_styliser(&$val){
return $val;
}

// Pipeline trig_calculer_prochain_postdate 
function execute_pipeline_trig_calculer_prochain_postdate(&$val){
return $val;
}

// Pipeline trig_propager_les_secteurs 
function execute_pipeline_trig_propager_les_secteurs(&$val){
return $val;
}

// Pipeline cfg_post_edition 
function execute_pipeline_cfg_post_edition(&$val){
return $val;
}

// Pipeline editer_contenu_formulaire_cfg 
function execute_pipeline_editer_contenu_formulaire_cfg(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'cfg/cfg_pipeline.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('cfg_editer_contenu_formulaire_cfg', $val);
return $val;
}

// Pipeline pre_description_outil 
function execute_pipeline_pre_description_outil(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_pre_description_outil', $val);
return $val;
}

// Pipeline porte_plume_cs_pre_charger 
function execute_pipeline_porte_plume_cs_pre_charger(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_porte_plume_cs_pre_charger', $val);
return $val;
}

// Pipeline accesrestreint_liste_zones_autorisees 
function execute_pipeline_accesrestreint_liste_zones_autorisees(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'acces_restreint_3_0/inc/acces_restreint.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('accesrestreint_liste_zones_autorisees', $val);
return $val;
}

// Pipeline contact_infos_supplementaires 
function execute_pipeline_contact_infos_supplementaires(&$val){
return $val;
}

// Pipeline bt_gadgets 
function execute_pipeline_bt_gadgets(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_bt_gadgets', $val);
return $val;
}

// Pipeline bt_toolbox 
function execute_pipeline_bt_toolbox(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_bt_toolbox', $val);
return $val;
}

// Pipeline porte_plume_barre_pre_charger 
function execute_pipeline_porte_plume_barre_pre_charger(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_porte_plume_barre_pre_charger', $val);
return $val;
}

// Pipeline porte_plume_lien_classe_vers_icone 
function execute_pipeline_porte_plume_lien_classe_vers_icone(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'couteau_suisse/cout_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('couteau_suisse_porte_plume_lien_classe_vers_icone', $val);
return $val;
}

// Pipeline mes_fichiers_a_sauver 
function execute_pipeline_mes_fichiers_a_sauver(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'saveauto_2_0/saveauto_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('saveauto_mes_fichiers_a_sauver', $val);
return $val;
}

// Pipeline page_indisponible 
function execute_pipeline_page_indisponible(&$val){
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once(_DIR_PLUGINS.'acces_restreint_3_0/acces_restreint_pipelines.php');
error_reporting(SPIP_ERREUR_REPORT);
$val = minipipe('accesrestreint_page_indisponible', $val);
return $val;
}

}
?>