<?php

class ViewController extends Controller{

    public function getHome(){
        $this->get;
    }

public function listeUtilisateur(){

        $dao = new DAOUser();
        $result = $dao->getAll();
        $datas = array(

        "users" => $result
        );

        $this->render("liste_des_utilisateurs",$datas);
}
}