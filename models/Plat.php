<?php

//je definie les propriété de mon objet
class Plat
{

    private $id;
    private $id_menu;
    private $id_type;
    private $prix;
    private $nom;


    //je definie le constructeur

    public function __construct($id = null, $id_menus = null, $id_type = null, $prix = null, $nom = null)
    {

        $this->id = $id;
        $this->id_menu = $id_menus;
        $this->id_type = $id_type;
        $this->prix = $prix;
        $this->nom = $nom;

        if ($id !== null) {

            if ($prix === null & $nom === null) {


                $this->get($id);
            }

        }
    }

    private function get($id)
    {

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
        //j'envoie une requete pour récupérer l'id des plats
        $request = "SELECT * FROM plat WHERE id=" . $id;

        //j'envoi la requete
        $statement = $dbh->query($request);
        //je recupere un plat
        $plat = $statement->fetch(PDO::FETCH_ASSOC);

        //j'affecte les valeurs correspondants a ce plats
        $this->id = $plat['id'];
        $this->id_menu = $plat['id_menu'];
        $this->id_type = $plat['id_type'];
        $this->prix = $plat['prix'];
        $this->nom = $plat['nom'];

    }
    /**
     * creation d'une nouvelle entré en db avec les propriété de l'objet courant
     * recuperation de l'id crée par le sgbd afin de peupler la propriété de l'objet courant
     * @return retourne vrai si l'objet a été inséré sinon faux
     */
    //methode nous permetant de sauvegarder nos donné dans la base de donné
    public function create()
    {

        //on se connecte a la base de donné
        $pdo = new PDO("mysql:host=localhost;dbname=RESTO_DB_BWB", "root", "");

        //la methode prepare retourne un objet statement et permet de preparer la requete
        $prepareStatement = $pdo->prepare("INSERT INTO plat (prix,nom) VALUES (?,?)");

        $status = $prepareStatement->execute(
            array(
                $this->prix,
                $this->nom)
        );
        $this->id = $pdo->lastInsertId();
        return $status;

    }

    //methode qui retourne un tableau associatifs
    public function to_array()
    {
        $array = array(
            "id" => $this->id,
            "id_menu" => $this->id_menu,
            "id_type" => $this->id_type,
            "prix" => $this->prix,
            "nom" => $this->nom
        );
        return $array;
    }

    //methode qui retourne un tableau au format json
    public function to_json(){

        return json_encode($this->to_array());

    }
}