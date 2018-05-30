<?php
// exemple une Entité User

class User {

    private $id;
    private $username;
    private $password;
    private $email;

    public function __construct($id=null,$username=null,$password=null,$email=null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }


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