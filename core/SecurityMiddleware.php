<?php
//on imorte firebase
use Firebase\JWT\JWT;
/**
 * Created by PhpStorm.
 * User: thierry
 * Date: 30/05/18
 * Time: 12:02
 */

//une class dedier pour la sécurité
//filtre la connexion aux besoin
class SecurityMiddleware{

    private $keypass;



    function __construct()
    {

        $this->keypass = "Bonjour tous le monde";

    }

    public function  getToken(){


    //on crée un token auquel on ajoute un TimeStamp de 2 min
    $token = array(


    "exp" => time() + 60 *60,
    "username"=> "loic"

    );

    //genere la clé public et priver
    return JWT::encode($token, $this->keypass);
}



    public function checkToken($token){

        return JWT::decode($token,$this->keypass,array('HS256'));
    }
}

