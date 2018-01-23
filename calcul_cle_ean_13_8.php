<h1>Calcul d'une clé EAN</h1>
<?php

/*
    Calcul d'une clé EAN
*/

// $key_base="7654321";
$key_base=303792016200;
$total=0;
$cle = 0;
$longueur_key_base=strlen ( $key_base );

if (! is_int($key_base)) {
    echo "La clé fournie est invalide !";
    exit;
}


if ( ($longueur_key_base != 12) && ($longueur_key_base != 7) ) {
    echo "La clé fournie doit comporter 7 ou 12 chiffres ";
    exit;
}

echo "Calcul de la clé de $key_base ayant pour longueur $longueur_key_base chiffres...<br />";
for ($i=0;$i < $longueur_key_base;$i++) {
    $cur_chiffre=substr($key_base,$i,1);
    if ($i % 2 == 0) {
        $nb=$cur_chiffre;
        echo "-".$cur_chiffre."     = ".$nb."<br />";
    } else {
        $nb=$cur_chiffre*3;    
        echo "-".$cur_chiffre." * 3 = ".$nb."<br />";
    }
    $total+=$nb;
}

if ( ! $total % 10 == 0 ) {
    $cle = 10 - $total % 10;
}
echo $cle;

?>
