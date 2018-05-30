<?php
//sert a importer
require __DIR__.'/vendor/autoload.php';

spl_autoload_register(function ($class) {
    if(file_exists('./core/' . $class . '.php')):
        include './core/' . $class . '.php';
    elseif(file_exists('./models/' . $class . '.php')):
        include './models/' . $class . '.php';
    elseif(file_exists('./controller/' . $class . '.php')):
        include './controller/' . $class . '.php';
    endif;

});




//$root = new Routing();
//$root->getController();

$secu = new SecurityMiddleware();

echo "Generation du token suite a une connexion d'un uttilisateur <br>";

$token = $secu->getToken();

echo $token."<br>";

echo "le client envoi le token pour s'identifier sur le systeme <br>";
echo" le system decrypte le token et traite le resultat<br>";

var_dump($secu->checkToken($token));



