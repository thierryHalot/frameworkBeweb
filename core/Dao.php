<?php

//dao est abstrait ,l'obligation de faire les fonctions dans le crud_interface est déporter sur les enfant
abstract class Dao implements Crud_interface,Repository_interface {

    //cette propriéte ne peut pas etre accsible a l'exterieur(la porté des variable/visibilité des propriété)
protected $pdo;



public function __construct(){

    //on crée directement l'objet ici
$this->pdo = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', '');


}


}
