<?php
spl_autoload_register(function ($class) {
    if(file_exists('./core/' . $class . '.php')):
        include './core/' . $class . '.php';
    elseif(file_exists('./models/' . $class . '.php')):
        include './models/' . $class . '.php';
    endif;

});



$root = new Rooting();
var_dump($root->getController());





//$dao_user = new DAOUser();
//$usr = new User(3,"titi","tata","ti@sjdlsqkdj");
//$dao_user->create($usr);
//$dao_user->delete(5);
//$dao_user->update($usr);
//var_dump($dao_user->getAll());
//$dao_carte = new DAOCarte();
//$card = new Carte(1,1,"cardNameeeeeee","superCard");
//var_dump($dao_user->getAll());


//var_dump($_SERVER['REQUEST_METHOD']);
//$uri = explode('/',$_SERVER['REQUEST_URI']);
//$dao = null;
//
//if($uri[1] === 'users'){
//
//    $dao = new DAOUser();
//}elseif ($uri[1] === "plats"){
//
//    $dao = new DAOPlats();
//}
//
//$result=null;
//
//switch (($_SERVER['REQUEST_METHOD'])):
//
//    case "GET":
//        if (isset($uri[2])){
//
//            $result=$dao->retrieve($uri[2]);
//        }else{
//
//            $result=$dao->getAll();
//        }
//
//        break;
//        endswitch;
//
//        var_dump($result);