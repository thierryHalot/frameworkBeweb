<?php

class DAOCarte extends Dao {

    public function create($carte) {

        $pdo = "INSERT INTO CARTE (id_resto,card_name,description) VALUE ('".$carte->getId_resto()."','".$carte->getCard_name()."','".$carte->getDescription()."')";

        var_dump($pdo);
        var_dump($this->pdo->exec($pdo));
}
public function retrieve($id) {
 $sql = "SELECT * FROM CARTE WHERE id=".$id;
 $statement = $this->pdo->query($sql);
 $result = $statement->fetch(PDO::FETCH_ASSOC);
 $card = new Carte();
 $card->setId($result['id']);
 $card->setCard_name($result['card_name']);
 $card->setId_resto($result['id_resto']);
 $card->setDescription($result['description']);
 return $card;
}
public function update($carte) {
 $pdo = "UPDATE CARTE SET id_resto = '".$carte->getId_resto()."', card_name = '".$carte->getCard_name()."', description = '".$carte->getDescription()."' WHERE id=".$carte->getId();
 var_dump($pdo);
 var_dump($this->pdo->exec($pdo));
}
public function delete($id) {
    $sql = "DELETE FROM CARTE WHERE id=".$id;

    $this->pdo->exec($sql);
}
public function getAll() {

    $sql = "SELECT * FROM CARTE";
    $statement = $this->pdo->query($sql);
    $results = $statement->fetchAll();
    $cards = array();

    foreach ($results as $result){

        $card = new Carte();
        $card->setId(($result['id']));
        $card->setId_resto($result['id_resto']);
        $card->setCard_name($result['card_name']);
        $card->setDescription($result['description']);
        array_push($cards,$card);
    }
    return $cards;
}
public function getAllBy($filter) {
 // TODO: Implement getAllBy() method.
}

}