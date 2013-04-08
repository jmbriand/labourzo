<?php
/*
 * Squelette : squelettes/inc-gmkey.html
 * Date :      Mon, 08 Apr 2013 17:05:01 GMT
 * Compile :   Mon, 08 Apr 2013 17:13:57 GMT (1.3ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inc-gmkey.html.
//
function html_b50dd91ac4482371db2ab6f465834958($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAMtgWgGrxSURGMhAj8oP_DRRTVFqp99vW1_OEtpSKEUcvVDEMMRQMt51JsPzh1tSt3ZnVmMMfHVUIwQ&sensor=false"
        type="text/javascript">
</script>
';

	return analyse_resultat_skel('html_b50dd91ac4482371db2ab6f465834958', $Cache, $page, 'squelettes/inc-gmkey.html');
}

?>