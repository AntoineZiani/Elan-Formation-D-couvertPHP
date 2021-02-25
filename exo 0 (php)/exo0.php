<?php

// CAMEL CASE (1eree lettre en minuscule, puis premiere lettre de chaque mots en majuscule)

$chaineDeCaracteres = "mon texte ma ouéé";
$entier = 20; // integer
$flottant = 29.99; // float
$booleen = true; // ou false - boolean peut etre faux ou vrai
$tableau1 = array   ("valleur1","valeur2","valeur3");
$tableau2 = ["valeur1","valeur2","valeur3"]; // array
$date = new DateTime(); // ici on declare un objet de la classe DateTime(classe native de PHP permetant de manipler des dates)

//premiere methode =
echo $chaineDeCaracteres."<br/>"; // . = concaténation 
echo $entier."<br/>";
echo $flottant."<br/>";
echo $booleen."<br/>";

// 2 methode =
// echo "$chaineDeCaracteres<br/>$entier";

// var_dump($tableau1); // sers a debug et le client doit pas voir ca 
echo mb_strtoupper($chaineDeCaracteres)."<br/>"; // mettre en maj meme les accents


$texte = "mon autre texte";
echo str_word_count($texte)."<br/>"; //compte les mots 
echo strlen($texte)."<br/>"; // compte les caractere, les espaces aussi 
echo "il y a ".count($tableau2)." éléments dans le tableau"."<br/>";
echo $date->format("d/m/Y")."<br/>";

echo gettype($entier)."<br/>"; // type de la variable

$prixTTC = 9.99;
$quantite = 5;
$cost = "Mon article coûte";
echo $cost." ".$prixTTC." €"."<br/>";
echo "Le total est de ". $prixTTC * $quantite . "€"."<br/>";

$pi = pi();
echo $pi."<br/>";
echo round($pi, 2)."<br/>";

// CONDITIONNELLES
$prenom = "John";
$age = 17;

if ($age >= 18){
    echo "$prenom est majeur"."<br/>";
} else { // ou elseif en sachant que la boucle doit ce finir part else 
    echo "$prenom est mineur"."<br/>";
};

// Ternaire
$reponse = ($age >= 18) ? "majeur" : "mineur";
echo "$prenom est $reponse"."<br/>";
echo "$prenom est ". ($age >= 18 ? "majeur" : "mineur")."<br/>";

// Jours de congés:
//  3 jours de congés pour les femmes qui ont 2 enfats ou plus
//  2 jours pour toutes les autres personnes
$sexe = "F";
$nbEnfant = 2;

//  "normal"
if($sexe == "F" && $nbEnfant >= 2){
    $nbJours = 3;
} else {
    $nbJours = 2;
}
echo "Le nombre de jours de congés est de  $nbJours jours"."<br/>";

echo "Nombre de jours : ". ($sexe == "F" && $nbEnfant >= 2 ? 3 : 2)."<br/>"; // ternaires 

//  verifie si la personne vis a vis de son age et trop jeune ou pas
$age = 15;
switch($age){
    case 1: echo "Trop jeune"."<br/>"; break;
    case 2: echo "Toujours trop jeune"."<br/>"; break;
    default : echo "Age ok"."<br/>";
}

if($age == 2){
    echo "Trop jeune"."<br/>";
}elseif($age == 2){
    echo "Toujours trop jeune"."<br/>";
}else{
    echo "Age ok"."<br/>";
}

// BOUCLES
// for : pour
// while : tant que 
// foreach : pour chaque élément

// Afficher les chiffres de 1 à 10
for($i = 1; $i <= 10; $i++){        // $i++ = $i +1
    echo $i." ";
}
echo "<br/>";

$i = 1;
while($i <= 10){
    echo $i." ";
    $i ++;
}
echo "<br/>";


foreach(range (1,10) as $nb){
    echo $nb." ";
}
echo "<br/>";

$tableauClient = ["Hemza", "Mohamed", "Ali", "Janine"]; // un tableau commence toujours à 0 donc pour afficher Mohamed il faudras faire 1

arsort($tableauClient); // trie le tableau du + au -
for($i =0; $i < count($tableauClient); $i++){
    echo $tableauClient[$i]."<br/>";
}
echo "<br/>";


$j = 0;
asort($tableauClient); // trie le tableau du - au +
while($j < count($tableauClient)){
    echo $tableauClient[$j]."<br/>";
    $j++;
}
echo "<br/>";


asort($tableauClient); // trie le tableau du - au +
foreach($tableauClient as $client){
    echo $client." "."<br/>";
}
echo "<br/>";

// Tableau associatif : clé => valeur
$tabAssociatif = [
    "Virgile" => "Strasbourg",
    "Stephane" => "Paris",
    "Micka" => "Strasbourg"
];

foreach($tabAssociatif as $element => $ville){
    echo ucfirst($element) ." habite ". mb_strtoupper($ville)."<br/>";
}

// Afficher une ville en particulier
echo $tabAssociatif["Stephane"]."<br>";

$clients = [
    "Virgile" => [
        "adresse" => "10 rue de la gare",
        "cp" => "67000",
        "Ville" => "Strasbourg",
        
    ],

    "Micka" => [
        "adresse" => "11 rue de la gare",
        "cp" => "67000",
        "Ville" => "Strasbourg",

    ],

];

echo $clients["Virgile"]["adresse"]."<br/>";

foreach($clients as $clients ){
    echo $clients["adresse"];
    echo "<br/>";
};

//  FONCTIONS

echo afficherMessage();
function afficherMessage(){
    $message = "Voicie mon message <br/>";
    return $message;
}

echo "Le carré de 3 est : ".calculeCarre(3);
function calculeCarre($number){
    $carre = pow($number, 2);
    return $carre;
}
echo "<br/>";

$prixHT = 115;
$tva = 0.20; //20% tva
echo "le prix ttc de cet article est de : ".calculerPrixTTC($prixHT, $tva). " €"."<br/>";
function calculerPrixTTC($prixHT, $tva){
    $prixTTC = $prixHT + $prixHT * $tva;
    return number_format($prixTTC, 2);
}

$phrase = "Ma formation est top";
echo compterMotsEtLettres($phrase)."<br/>";
function compterMotsEtLettres($phrase){
    $mots = str_word_count($phrase); //compte les mots 
    $lettres = strlen($phrase) - substr_count($phrase, " "); // compte les caractere, les espaces aussi
    return " Il y a $mots mots est de $lettres lettre";
}

$nombre = 6;
echo "Le nombre est ". pairOuImpaire($nombre)."<br/>";
function pairOuImpaire($nombre){
    $reponse= ($nombre % 2 == 0) ? "pair" : "impaire";
    return $reponse;
}

function pairOuImpaireV2($nombre){
    if($nombre % 2 == 0){
        $reponse = "pair";
    } else {
        $reponse = "impaire";
    }
    return $reponse;
}

echo repeterMot("Hourra", 5)."<br/>";
function repeterMot($mot, $nb){
    $resultat = "";
    for($i=1; $i <= $nb; $i++){
        $resultat .= $mot. " ";
    }
    return $resultat;
}

echo repeterMotV2("Hello <br/>");
function repeterMotV2($mot, $nb){
    return str_repeat($mot." ", $nb);
}



?>