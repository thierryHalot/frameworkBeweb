<?php

include './models/User.php';

$uri = $_SERVER['REQUEST_URI'];

$tab_uri = explode("/",$uri);


//création d'une instance de l' objet User

$loic = new User();

//invocation de la methode to_array sur l'objet loic
//var_dump($loic->to_array());

//invocation de la méthode to_json sur l'objet loic
//avec echo car c'est une chaine de caractere
//echo $loic->to_json();


//par default les valeurs d'un objet est égale à null
//$loic2 = new User("loic2");
//var_dump($loic2->to_array());
//$loic3 = new User(null,"toto");
//var_dump($loic3->to_array());
//$loic4 = new User(null,"loic3","password","lo@laposte.net");
//var_dump($loic4->to_array());

//if($loic4->create()){

    //echo "cool";
//}else{

    //echo "pas cool";
//}

$test = new User(3);

$test-> delete(3);
