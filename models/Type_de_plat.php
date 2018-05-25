<?php
class Type_de_plat{

private $id;
private $nom;

public function __construct($id=null,$nom=null)
{

    $this->id = $id;
    $this->nom = $nom;
    if($id !== null){


        if($nom===null){

            $this->get($id);
        }
    }
}

    private function get($id){

        /**
         *
         * Se connecter a la base de donné
         * ecrire la requete d'insertion des données
         * executer la requete
         * peupler les propriété de l'objet courant avec les valeurs reçuent
         *
         */

        //je me connecte a la base de donné
        $dbh = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', "");
        //j'envoie une requete pour récupérer l'id des type de plats
        $request = "SELECT * FROM TYPE_DE_PLAT WHERE id=".$id;

        //j'envoi la requete
        $statement = $dbh->query($request);
        //je recupere un plat
        $type_de_plat = $statement->fetch(PDO::FETCH_ASSOC);
        //je definis son contenus
        $this->id = $type_de_plat['id'];
        $this->nom = $type_de_plat['nom'];




    }
    //fonction qui permet de crée un type de plat
    public function create(){

        //on se connecte a la base de donné
        $pdo = new PDO("mysql:host=localhost;dbname=RESTO_DB_BWB", "root", "");

        //la methode prepare retourne un objet statement et permet de preparer la requete
        $prepareStatement = $pdo->prepare("INSERT INTO TYPE_DE_PLAT (nom) VALUES (?)");

        $status = $prepareStatement->execute(
            array(
                $this->nom
                )
        );
        $this->id = $pdo->lastInsertId();
        return $status;

    }

    //methode qui retourne un tableau associatifs
    public function to_array(){
        $array = array(
            "id"=> $this->id,
            "nom"=>$this->nom

        );

        return $array;
    }

    //methode qui retourne un tableau au format json
    public function to_json(){

        return json_encode($this->to_array());

    }
}