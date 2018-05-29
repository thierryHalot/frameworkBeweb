<?php
class Rooting
{

    private $config;


    public function __construct()
    {

        $this->config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/conf/rooting.json"), true);


    }

    private function compare($tab, $tab1)
    {


//        $tab = array();
//        $tab1 = array();

        for ($i = 0; $i < count($tab); $i++) {


            if ($tab[$i] === $tab1[$i]) {

                
                return true;
            }
                return false;
        }

    }

//fonction qui retourne le fichier de rooting sous forme de tableau associatif
//    public function test(){
//
//        return $this->config;
//    }

//recuperer l'uri que le client envoi
//checker pour voir si l'uri correspond
//si elle correspond retourné le texte correspondant
//cette fonction compare l'uri avec chaque clé du tableau de rootage
//si une clé correspond on uttilise rquestmethode pour retourner la valeur
//prendre en compte les variable de l'uri ,reourner en plus du texte les variables dans un tableaux
    public function getController()
    {

//je supprime les "/" de l'uri
        $uri = explode("/", $_SERVER['REQUEST_URI']);
        //je recupere mon fichier décoder
        $file = $this->config;
        //$tab = array();

    //var_dump($file);
//je boucle dans mon tableau

        foreach ($file as $key => $value) {

            //je supprime les "/" de mes clée
            $tabKey = explode("/", $key);
            //array_push($tab, $explosion);

            if ($this->isEqual($uri, $tabKey)) {

                if ($this->compare($uri, $tabKey)) {


                    if (is_array($value)) {
                        //var_dump($uri);
                        //var_dump($tabKey);

                        return $value[$_SERVER['REQUEST_METHOD']];


                    } else {
                        //var_dump($uri);
                        //var_dump($tabKey);
                        return $value;

                    }


                }

            }


        }


         print_r($uri);
        print_r($tabKey);

    }

//fonction pour comparer la taille de deux tableaux
    private function isEqual($tab1,$tab2){

        //si mes deux tableaux ont la meme taille je retourne vrai sinon faux
        return (count($tab1)===count($tab2))?true:false;
    }



//    $id = 1;
//
//        if($uri[1] === ""){
//
//            echo "ViewController:getHome <br/>";
//            var_dump($file);
//
//        }elseif ($uri[1] === "les_cartes"){
//
//            echo "ViewController:getCartes";
//
//
//        }elseif ($uri[1]=== "api" && $uri[2]=== "users" && $uri[3]=== "null"){
//
//
//            echo "GET":"DAOUser:getAll";
//
//             echo "DELETE":"UserController:deleteAll",
//
//            "POST":"UserController:create";
//
//        }elseif ($uri[1] === "api" && $uri[2] === "users" && $uri[3]=== ":".$id) {
//
//            echo "cool";
//
//        }
//
//        //var_dump($uri);
//
//    }





}