<?php
if (defined('_ECRIRE_INC_VERSION')) {
define('_DIR_PLUGIN_CFG',_DIR_PLUGINS.'cfg/');
_chemin(_DIR_PLUGIN_CFG);
define('_DIR_PLUGIN_COUTEAU_SUISSE',_DIR_PLUGINS.'couteau_suisse/');
_chemin(_DIR_PLUGIN_COUTEAU_SUISSE);
define('_DIR_PLUGIN_SAVEAUTO',_DIR_PLUGINS.'saveauto_2_0/');
if (!_DIR_RESTREINT) _chemin(_DIR_PLUGIN_SAVEAUTO);
define('_DIR_PLUGIN_SPIP_BONUX',_DIR_PLUGINS.'spip-bonux/');
_chemin(_DIR_PLUGIN_SPIP_BONUX);
define('_DIR_PLUGIN_TABLEDATA',_DIR_PLUGINS.'tabledata-v2-2-1/');
_chemin(_DIR_PLUGIN_TABLEDATA);
define('_DIR_PLUGIN_ACCESRESTREINT',_DIR_PLUGINS.'acces_restreint_3_0/');
_chemin(_DIR_PLUGIN_ACCESRESTREINT);
define('_DIR_PLUGIN_CONTACT',_DIR_PLUGINS.'contact100312/');
_chemin(_DIR_PLUGIN_CONTACT);
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once _DIR_PLUGINS.'cfg/cfg_options.php';
include_once _DIR_PLUGINS.'couteau_suisse/cout_options.php';
include_once _DIR_PLUGINS.'acces_restreint_3_0/acces_restreint_options.php';
include_once _DIR_PLUGINS.'contact100312/contact_options.php';
error_reporting(SPIP_ERREUR_REPORT);
function boutons_plugins(){return unserialize('a:0:{}');}
function onglets_plugins(){return unserialize('a:0:{}');}
}
?>