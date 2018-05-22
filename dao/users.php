<?php
//fonction qui recupere une listes d'uttilisateur sous forme de tableau associatif
function get_users()
{
    //
    $dbh = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', "");
    $request = "SELECT * FROM users";
    $statement = $dbh->query($request);
    $users = $statement->fetchAll();
    return $users;
}
 var_dump(get_users());

function get_user($id){

    $dbh = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', "");
    $request = "SELECT * FROM users WHERE id=".$id;
    $statement = $dbh->query($request);
    $user = $statement->fetchAll();
    return $user;


}