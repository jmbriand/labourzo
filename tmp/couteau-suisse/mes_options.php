<?php
// Code d'inclusion pour le plugin 'Couteau Suisse'
++$GLOBALS['cs_options'];
$GLOBALS['cs_verif']=3;

// Table des traitements
$GLOBALS['table_des_traitements']['TITRE'][]='typo(supprimer_numero(%s),"TYPO",$connect)';
$GLOBALS['table_des_traitements']['TITRE']['mots']='typo(supprimer_numero(%s),"TYPO",$connect)';
$GLOBALS['table_des_traitements']['NOM'][]='typo(supprimer_numero(%s),"TYPO",$connect)';
$GLOBALS['table_des_traitements']['TYPE']['mots']='typo(supprimer_numero(%s),"TYPO",$connect)';
?>