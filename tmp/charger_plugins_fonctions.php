<?php
if (defined('_ECRIRE_INC_VERSION')) {
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once _DIR_PLUGINS.'cfg/cfg_fonctions.php';
include_once _DIR_PLUGINS.'couteau_suisse/cout_fonctions.php';
include_once _DIR_PLUGINS.'spip-bonux/public/spip_bonux_criteres.php';
include_once _DIR_PLUGINS.'spip-bonux/public/spip_bonux_balises.php';
include_once _DIR_PLUGINS.'spip-bonux/spip_bonux_fonctions.php';
include_once _DIR_PLUGINS.'acces_restreint_3_0/acces_restreint_fonctions.php';
include_once _DIR_PLUGINS.'acces_restreint_3_0/public/acces_restreint.php';
include_once _DIR_PLUGINS.'acces_restreint_3_0/inc/acces_restreint.php';
error_reporting(SPIP_ERREUR_REPORT);
}
?>