<h1>Calcul d'une clé EAN 13</h1>
<form name="leformulaire" action="/calcul_cle_ean.php" method="POST">
    <input type="text" maxlength="12" name="code2calcul" value="<?php echo (isset($_POST["code2calcul"])) ? $_POST["code2calcul"] :'303792016200'; ?>">
    <input type="submit" value="Calculer">
</form>
<?php

// La clé de base de l'exercice
$key_base=303792016200;
// Le total de la somme servant a calculer la clé
$total=0;
// La clé
$cle = 0;

// On récupère la valeur du champ texte "code2calcul"
if ( isset($_POST["code2calcul"]) ) {
    $key_base=$_POST["code2calcul"];
// On vérifie que c'est bien un entier et on le converti
    if ( ctype_digit($key_base) ) {
        $key_base=(int) $key_base;
    }
}

// Teste si on a bien un entier en entrée et sort sinon.
if (! is_int($key_base)) {
    echo "Le code fourni est invalide !";
    exit;
}

// Calcul de la longueur de la chaine
$longueur_key_base=strlen ( $key_base );
//  Test la longueur de la chaine on sort si elle ne correspond pas au spécifications
if ($longueur_key_base != 12) {
    echo "Le code fourni doit comporter 12 chiffres ";
    exit;
}

/*
    L'algorithme de calcul de la clé
*/
for ($i=0;$i < $longueur_key_base;$i++) {
    $cur_chiffre=substr($key_base,$i,1);
    if ($i % 2 == 0) {
        $nb=$cur_chiffre;
//         echo "-".$cur_chiffre."     = ".$nb."<br />";
    } else {
        $nb=$cur_chiffre*3;    
//         echo "-".$cur_chiffre." * 3 = ".$nb."<br />";
    }
    $total+=$nb;
}

if ( ! $total % 10 == 0 ) {
    $cle = 10 - $total % 10;
}

echo "La clé du code <strong>$key_base</strong> est <strong>$cle</strong>";
// Et voila !
?>
