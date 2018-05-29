<?php
class Restaurant{

private $id;
private $nom;
private $adresse;
private $tel;
private $email;


public function __construct($id=null,$nom=null,$adresse=null,$tel=null,$email=null)
{

    $this->id = $id;
    $this->nom = $nom;
    $this->adresse = $adresse;
    $this->tel = $tel;
    $this->email = $email;

//    if($id !== null){
//
//        if($nom=== null && $adresse === null && $tel === null && $email === null){
//
//            $this->get($id);
//        }
//    }
}
//methode qui retourne un tableau associatifs
    public function to_array(){
        $array = array(
            "id"=> $this->id,
            "nom"=>$this->nom,
            "adresse"=>$this->adresse,
            "tel"=>$this->tel,
            "email"=>$this->email
        );

        return $array;
    }

    //methode qui retourne un tableau au format json
    public function to_json(){

        return json_encode($this->to_array());

    }

    function getId(){

    return $this->id;
    }

    function getNom(){

    return $this->nom;
    }

    function getAdresse(){

    return $this->adresse;
    }

    function getTel(){

    return $this->tel;
    }

    function getEmail(){

    return $this->email;
    }

    function setId($id){

    return $this->id = $id;
    }

    function setNom($nom){

    return $this->nom = $nom;
    }

    function setAdresse($adresse){

    return $this->adresse = $adresse;
    }

    function setTel($tel){

    return $this->tel = $tel;
    }

    function setEmail($email){

    return $this->email = $email;
    }

//    private function get($id){
//
//        /**
//         *
//         * Se connecter a la base de donné
//         * ecrire la requete d'insertion des données
//         * executer la requete
//         * peupler les propriété de l'objet courant avec les valeurs reçuent
//         *
//         */
//
//        //je me connecte a la base de donné
//        $dbh = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', "");
//        //j'envoie une requete pour récupérer l'id des restaurants
//        $request = "SELECT * FROM restaurants WHERE id=".$id;
//
//        //j'envoi la requete
//        $statement = $dbh->query($request);
//        //je recupere un restaurant
//        $restaurant = $statement->fetch(PDO::FETCH_ASSOC);
//        //je lui affecte ses valeurs
//        $this->id = $restaurant['id'];
//        $this->nom = $restaurant['nom'];
//        $this->adresse = $restaurant['adresse'];
//        $this->tel = $restaurant['tel'];
//        $this->email = $restaurant['email'];
//
//
//    }

    /**
     * creation d'une nouvelle entré en db avec les propriété de l'objet courant
     * recuperation de l'id crée par le sgbd afin de peupler la propriété de l'objet courant
     * @return retourne vrai si l'objet a été inséré sinon faux
     */
    //methode nous permetant de sauvegarder nos donné dans la base de donné
//    public function create(){
//
//        //on se connecte a la base de donné
//        $pdo = new PDO("mysql:host=localhost;dbname=RESTO_DB_BWB", "root", "");
//
//        //la methode prepare retourne un objet statement et permet de preparer la requete
//        $prepareStatement = $pdo->prepare("INSERT INTO restaurants (nom,adresse,tel,email) VALUES (?,?,?,?)");
//
//        $status = $prepareStatement->execute(
//            array(
//                $this->nom,
//                $this->adresse,
//                $this->tel,
//                $this->email)
//        );
//        $this->id = $pdo->lastInsertId();
//        return $status;
//
//    }
}