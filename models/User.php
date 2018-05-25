<?php
//Entité User

class User {

    private $id;
    private $username;
    private $password;
    private $email;

    public function __construct($id=null,$username=null,$password=null,$email=null) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
//        if($id !== null){
//            if($username === null && $password === null && $email === null){
//                $this->load($id);
//        }
//    }
    }

//    private function load($id){
//
//        $db = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', "root", "");
//
//        $req = "SELECT * FROM USER WHERE id=".$id;
//
//        $statement = $db->query($req);
//
//        $retour = $statement->fetchAll();
//
//        foreach($retour as $entry){
//            $this->id = $entry['id'];
//            $this->username = $entry['username'];
//            $this->password = $entry['password'];
//            $this->email = $entry["email"];
//        }
//        echo "test";
//        return;
//    }

    /* création d'une nouvelle entrée en DB avec les propriétés de l'objet courant */
//
//    public function create(){
//
//        $pdo = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', "root", "");
//
//       $preparedStatement = $pdo->prepare('insert into USERS (username,password,email) VALUES(?,?,?)');
//
//        $status = $preparedStatement->execute(
//            array(
//                $this->username,
//                $this->password,
//                $this->email)
//            );
//
//
//        $this->id = $pdo->lastInsertId();
//
//        return $status;
//    }
//
//
//
//


    public function to_array(){
        return array(
            "id"=> $this->id,
            "username"=> $this->username,
            "password"=> $this->password,
            "email"=> $this->email
        );
    }

    public function to_json(){

        return json_encode($this->to_array());
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }



};