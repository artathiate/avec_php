<?php
header('Content-Type: application/json');
try {
    $connexion = new PDO('mysql:host=localhost;dbname=basseapi;charset=utf8','root','');
    $retour["success"] = true;
    $retour["message"] = "Connexion à la base de données réussie";
}
catch(Exception $ex) {
    $retour["success"] = false;
    $retour["message"] = "Erreur de connexion à la base de données";
}
$request = $connexion->prepare("SELECT * FROM vols");
$request->execute();
$resultat = $request->fetchAll();
$retour["message"] = "Voici les vols";
$retour["resultats"]["vols"] = $resultat;
echo json_encode($retour);