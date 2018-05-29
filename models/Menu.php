<?php

class Menu{
//je définis les propriété de mon objet
 private $id;
 private $id_carte;
 private $menu_name;
 private $description;
 private $url_image;

 //je definie le constructeur de mon objet
 public function __construct($id=null,$id_carte=null,$menu_name=null,$description=null,$url_image=null)
 {
     $this->id = $id;
     $this->url_image = $url_image;
     $this->menu_name = $menu_name;
     $this->description = $description;
     $this->id_carte = $id_carte;
//     if ($id !== null) {
//
////
//         if ($nom === null && $description === null && $url_image === null) {
//
//             $this->get($id);
//         }
//     }
 }
//     private function get($id){
//
//     /**
//      *
//      * Se connecter a la base de donné
//      * ecrire la requete d'insertion des données
//      * executer la requete
//      * peupler les propriété de l'objet courant avec les valeurs reçuent
//      *
//      */
//
//     //je me connecte a la base de donné
//     $dbh = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', "");
//     //j'envoie une requete pour récupérer l'id des menus
//     $request = "SELECT * FROM menus WHERE id=".$id;
//
//     //j'envoi la requete
//     $statement = $dbh->query($request);
//     //je recupere tous
//     $menu = $statement->fetchAll();
//
////j'affecte les valeurs quand correspondant a l'id
//     foreach ($menu as $value){
//
//
//         $this->id = $value['id'];
//         $this->nom = $value['nom'];
//         $this->description = $value['description'];
//         $this->url_image = $value['url_image'];
//
//
//     };
//     return;
//
// }

function getId(){

     return $this->id;
}

function getId_carte(){

     return $this->id_carte;
}

function getMenu_name(){

     return $this->getMenu_name;
}

function getDescription(){

     return $this->description;
}

function getUrl_image(){

     return $this->url_image;
}

function setId($id){

     return $this->id = $id;
}

function setId_carte($id_carte){

     return $this->id_carte = $id_carte;
}

function setMenu_name($menu_name){

     return $this->menu_name;
}

function setDescription($description){

     return $this->description = $description;
}

function setUrl_image($url_image){

     return $this->url_image = $url_image;
}
//methode qui retourne un tableau associatifs
    public function to_array(){
        $array = array(
            "id"=> $this->id,
            "id_carte"=>$this->id_carte,
            "menu_name"=>$this->menu_name,
            "description"=>$this->description,
            "url_image"=>$this->url_image
        );

        return $array;
    }

    //methode qui retourne un tableau au format json
    public function to_json(){

        return json_encode($this->to_array());

    }

//    //methode nous permetant de sauvegarder nos donné dans la base de donné
//    public function create(){
//
//        //on se connecte a la base de donné
//        $pdo = new PDO("mysql:host=localhost;dbname=RESTO_DB_BWB", "root", "");
//
//        //la methode prepare retourne un objet statement et permet de preparer la requete
//        $prepareStatement = $pdo->prepare("INSERT INTO menus (nom,description,url_image) VALUES (?,?,?)");
//
//        $status = $prepareStatement->execute(
//            array(
//                $this->nom,
//                $this->description,
//                $this->url_image)
//        );
//        $this->id = $pdo->lastInsertId();
//        return $status;
//
//    }

}