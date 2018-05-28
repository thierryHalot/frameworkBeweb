<?php
//extend permet de récupérer les propriété de dao ,daouser herite des propriéte de dao
class DAOUser extends Dao{


    public function create($user)
    {
        $sql = "INSERT INTO USER (username, password, email) VALUE('".$user->getUsername()."','".$user->getPassword()."','".$user->getEmail()."')";


        var_dump($sql);

     var_dump($this->pdo->exec($sql));
    }

    public function retrieve($id)
    {

        $sql = "SELECT * FROM USER WHERE id=".$id;
        $statement = $this->pdo->query($sql);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        $user->setId(($result['id']));
        $user->setEmail($result['email']);
        $user->setPassword($result['password']);
        $user->setUsername(($result['username']));
        return $user;
    }

    public function update($user)
    {
        $sql = "UPDATE USER SET username = '".$user->getUsername()."', password='".$user->getPassword()."', email='".$user->getEmail()."' WHERE id=".$user->getID();
        var_dump($sql);

        var_dump($this->pdo->exec($sql));
    }

    //méthode qui permet de supprimer un uttilisateur par son id
    public function delete($id)
    {
    $sql = "DELETE FROM USER WHERE id=".$id;

    $this->pdo->exec($sql);
    }


    public function getAll()
    {
        $sql = "SELECT * FROM USER";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        $users = array();
        foreach ($results as $result){

            $user = new User();
            $user->setId(($result['id']));
            $user->setEmail($result['email']);
            $user->setPassword($result['password']);
            $user->setUsername(($result['username']));
            array_push($users,$user);
        }
        return $users;
    }

    public function getAllBy($filter)
    {
        $request ="SELECT * FROM USER";
        $i=0;

        foreach ($filter as $key => $value){

            if($i==0){

                $request .= " WHERE ";

            }else{

                $request.= " AND ";
            }

            $request .= $key."='".$value."'";


        }
        $statement = $this->pdo->query($request);
        $results = $statement->fetchAll();
        $users = array();
        foreach ($results as $result){

            $user = new User();
            $user->setId(($result['id']));
            $user->setEmail($result['email']);
            $user->setPassword($result['password']);
            $user->setUsername(($result['username']));
            array_push($users,$user);
        }
        return $users;

    }
}