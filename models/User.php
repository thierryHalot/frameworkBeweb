<?php
/**
 * Entité User.
 * User: thierry
 * Date: 22/05/18
 * Time: 14:00
 */
//Définition :les entitées sont des objet que l'on peut persister

//on définie les propriétées de l'objet User
class User{

    private $id;
    private $username;
    private $password;
    private $email;

    //on definie le constructeur de l'objet User
    //en php on affecte des valeur par default(obligatoire)
    //les valeurs par défault seront egal a null dans le cas présent

    public function  __construct($id=null,$username=null,$password=null,$email=null)
    {
      //on affecte les variables aux propriété de l'objet courant
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        if($id !== null){


            if($username === null && $password===null && $email===null){

                $this->get($id);
            }
        }


    }

    //methode qui retourne un tableau associatifs
    public function to_array(){
    $array = array(
        "id"=> $this->id,
        "email"=>$this->email,
        "password"=>$this->password,
        "username"=>$this->username
    );

    return $array;
    }

    //methode qui retourne un tableau au format json
    public function to_json(){

        return json_encode($this->to_array());

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
        $prepareStatement = $pdo->prepare("INSERT INTO users (username,password,email) VALUES (?,?,?)");

        $status = $prepareStatement->execute(
            array(
                $this->username,
                $this->password,
                $this->email)
        );
        $this->id = $pdo->lastInsertId();
        return $status;

    }

    /**
     * recupere les donné issue de la db pour peupler l'objet courant
     */
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
        $request = "SELECT * FROM users WHERE id=".$id;

        //j'envoi la requete
        $statement = $dbh->query($request);
        //je recupere tous
        $user = $statement->fetch(PDO::FETCH_ASSOC);

                $this->id = $user['id'];
                $this->username = $user['username'];
                $this->password = $user['password'];
                $this->email = $user['email'];



    }

    private function delete($id){



        //je me connecte a la base de donné
        $dbh = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', 'root', "");
        //j'envoie une requete pour récupérer l'id des user
        $request = "DELETE from users WHERE id=".$id;

        //j'envoi la requete
        $statement = $dbh->prepare($request);
        $status = $statement->execute();

        return $status;


    }
}