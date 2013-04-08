<?php

/*
UTILISATION :
[(#TITRE|titre_cap|image_typo{police=ZagBold.ttf,taille=16,couleur=ffffff})]
--------------------------------------------------------------------------- */

function titre_cap($titre) {
 if (!strlen($titre)) {
   return '';
 }
 else
 return mb_strtoupper($titre, 'utf-8');
}
?>