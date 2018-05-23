<?php

class Carte{


    private $id;
    private $id_resto;
    private $nom;
    private $description;


public function __construct($id=null,$id_resto=null,$nom=null,$description=null)
{
    $this->id = $id;
    $this->id_resto = $id_resto;
    $this->nom = $nom;
    $this->description = $description;

    if($id !== null){

        if($nom===null && $description===null){

            $this->get($id);
        }


    }

}

public function to_array(){

    $array = array(
        "id"=> $this->id,
        "id_resto"=>$this-> id_resto,
        "nom"=>$this->nom,
        "description"=>$this->description
    );

    return $array;

}
    public function to_json(){

        return json_encode($this->to_array());

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
        //j'envoie une requete pour récupérer l'id des user
        $request = "SELECT * FROM cartes WHERE id=".$id;

        //j'envoi la requete
        $statement = $dbh->query($request);
        //je recupere une carte
        $carte = $statement->fetch(PDO::FETCH_ASSOC);

        //je definis son contenue
        $this->id = $carte['id'];
        $this->nom = $carte['nom'];
        $this->description = $carte['description'];

    }

    /**
     * creation d'une nouvelle entré en db avec les propriété de l'objet courant
     * recuperation de l'id crée par le sgbd afin de peupler la propriété de l'objet courant
     * @return retourne vrai si l'objet a été inséré sinon faux
     */
    //methode nous permetant de sauvegarder nos donné dans la base de donné
    public function create(){

        //on se connecte a la base de donné
        $pdo = new PDO("mysql:host=localhost;dbname=RESTO_DB_BWB", "root", "");

        //la methode prepare retourne un objet statement et permet de preparer la requete
        $prepareStatement = $pdo->prepare("INSERT INTO cartes (nom,description) VALUES (?,?)");

        $status = $prepareStatement->execute(
            array(
                $this->nom,
                $this->description,
                )
        );
        $this->id = $pdo->lastInsertId();
        return $status;

    }
}