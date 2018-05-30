<?php
class UserController extends Controller{
    /**
     * Il ne faut jamais mettre de mot clé return dans un controller
     */

    public function getUser($id){
        //creer un Daouser
        //invoque la methode retrieve sur le dao
        //retourne le resultat

        $daoUser = new DAOUser();
         $daoUser->retrieve($id);



    }
    public function create(){

        $daoUser = new DAOUser();

        $user = new User();
        $user->setUsername($this->post['username']);
        $user->setPassword($this->post['password']);
        $user->setEmail($this->post['email']);
        $daoUser->create($user);
    }

    public function updateUser($user){

        $daoUser = new DAOUser();
        $daoUser->update($user);

    }

    public function deleteUser($id){


        $daoUser = new DAOUser();
        $daoUser->delete($id);

    }

    public function getAll(){
        $daoUser = new DAOUser();

        $daoUser->getAll();
    }


}