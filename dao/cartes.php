<?php
//fonction qui retourne une liste de carte sous forme de tableau associatif
function get_cartes()
{
    //on se connecte a notre bdd
    $dbh = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', "");
    //on recupere tous ce qu'il y a dans la tables carte
    $request = "SELECT * FROM cartes";
    //on effectue la requete
    $statement = $dbh->query($request);
    //on recupere tous ce qu'il y a dans le tableaux
    $cartes = $statement->fetchAll();
    return $cartes;
}

