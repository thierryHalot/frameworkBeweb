
<?php

require 'Crud_interface.php';
/*
 * le dao est un objet servant de couche intermediare entre la couche metier et la db
 * cet objet ne doit exister qu'en un seul exemplaire
 */

final class Dao implements Crud_interface {

    //objet Dao
    private static $instance;
    //objet PDO (connecteur BDD)
    private $pdo;

    /**
     * Constructeur privé pour s'assure que seul
     *  cette classe puisse créer un nouvel objet
     */
    private function __construct() {

        $this->pdo = new PDO('mysql:host=localhost;dbname=RESTO_DB_BWB', "root", "");
    }

    /** créé une nouvelle instance Dao si elle n'existe pas
     *  permet de s'assure d'avoir un seul exemplaire de l'objet Dao
     *  return l'instance courante Dao
     */
    public static function get_instance() {
        if (is_null(Dao::$instance)) {
            Dao::$instance = new Dao();
        }
        return Dao::$instance;
    }

    public function create($entity) {


        $reflexEntity = new ReflectionClass(get_class($entity));
        $props = $reflexEntity->getProperties(ReflectionProperty::IS_PRIVATE);
        $methods = $reflexEntity->getMethods();
        //initialisation de deux array pour faciliter le traitement des elements à insérer dans la requête SQL
        $tri = array();
        $tro = array();
        foreach ($props as $prop) {
            $name = $prop->name;
            if ($name !== "id") {
                //push des nom des propriétées dans l'array sauf pour l'ID car l'id est setup par la BDD
                array_push($tri, $name);
            }
            //mise en forme du nom des propriete de l'objet sous forme d'accesseur
            $val = "get" . ucfirst($name);

            foreach ($methods as $method) {
                //si la methode courrante correspond à ma variable alors j'invoke la méthode et je push le résultat dans la seconde array
                if ($method->name === $val) {
                    if ($val !== "getId") {
                        $temp = $method->invokeArgs($entity, array(''));
                        array_push($tro, $temp);
                    }
                }
            }
        }
        //$imploded correspond aux noms des propriété intercalé par des virgules pour avoir une chaine de caratere
        //ex : prop1,prop2,prop3...
        $imploded = implode(',', $tri);
        //$val reprend le même schéma que pour $imploded sauf que j'ajoute des simple quote pour délimiter les valeurs comme voulu pour les requete SQL
        $val = implode("','", $tro);

        //traitement de la chaine de car pour la requête sql
        $sql = "insert into " . $this->getClassName($entity) . " (" . $imploded . ") VALUES('" . $val . "')";

        //condition pour vérifier si la requête a bien été effectué (la méthode exec retourne le nombre de ligne modifié, ou 0 si échec
        if ($this->pdo->exec($sql) !== 0) {
            echo "Entrée ajoutée à la base de données.";
        } else {
            echo "La création de la nouvelle entrée à échoué, assurez vous d'avoir laisser le champ dédié à l'id à null.";
        }
    }

    public function retrieve($entity) {
        $reflexEntity = new ReflectionClass(get_class($entity));
        $sql = "SELECT * FROM " . $this->getClassName($entity) . " WHERE id=" . $entity->getId();
        $statement = $this->pdo->query($sql);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $methods = $reflexEntity->getMethods();
        foreach ($result as $key => $value) {
            $methodName = "set" . ucfirst($key);
            foreach ($methods as $method) {
                if ($method->name === $methodName) {
                    $method->invokeArgs($entity, array($value));
                }
            }
        }
    }

    public function update($entity) {

        $reflexEntity = new ReflectionClass(get_class($entity));
        $props = $reflexEntity->getProperties(ReflectionProperty::IS_PRIVATE);
        $methods = $reflexEntity->getMethods();
        $id = "";
        //on boucle dans la liste des propriétés de $entity
        foreach ($props as $prop) {
            $name = $prop->name;
            if ($name === "id") {
                $id = $prop->name;
            }
            //mise en forme du nom des propriete de l'objet sous forme d'accesseur
            $val = "get" . ucfirst($name);

            foreach ($methods as $method) {
                //si la methode courrante correspond à ma variable alors j'invoke la méthode et j'ajoute la valeur obtenu dans ma chaine de caractère
                if ($method->name === $val) {
                    if ($val !== "getId") {
                        $temp = $method->invokeArgs($entity, array(''));
                        $top .= " ".$name."= '".$temp."',";
                    }
                }
            }

        }


        //traitement de la chaine de car pour la requête sql
        $sql = "UPDATE " . $this->getClassName($entity) . " SET " . substr($top, 0, -1) . " WHERE " . $id . " = " . $entity->getId();

        //condition pour vérifier si la requête a bien été effectué (la méthode exec retourne le nombre de ligne modifié, ou 0 si échec
        //  if ($this->pdo->exec($sql) !== 0) {
        //      echo "Updated successfully";
        // } else {
        //     echo "fail";
        // }
        $config = file_get_contents('./config/database.json');
        var_dump($config);
        $pdoval = "";
        foreach($config as $value){
            echo $value;
        }
    }

    public function delete($entity) {
        $sql = "DELETE FROM " . $this->getClassName($entity) . " WHERE id=" . $entity->getId();
        $statement = $this->pdo->query($sql);
        echo $sql;
        //$this->pdo->exec($sql) !== 0;
        $count = $this->pdo->query($sql);
        $check = $count->rowCount();
        var_dump($check);
        echo "<hr>";
        echo $check;
        if ($count !== 0) {
            echo "entrées effacées : ".$count;
        } else {
            echo "fail";
        }
    }

    private function getClassName($entity) {
        $reflexEntity = new ReflectionClass(get_class($entity));
        return strtoupper($reflexEntity->getName());
    }

    public function reflexivite($entity) {
        $reflexEntity = new ReflectionClass(get_class($entity));
        //une liste de ReflectionProperty
        $props = $reflexEntity->getProperties(ReflectionProperty::IS_PRIVATE);
        $methods = $reflexEntity->getMethods();

        foreach ($props as $prop) {
            $name = $prop->name;
            $name = "set" . ucfirst($name);
            foreach ($methods as $method) {
                if ($method->name === $name) {
                    $method->invokeArgs($entity, array('bonjour'));
                }
            }
        }

        var_dump($props);
        echo'<hr><hr>';
        var_dump($methods);
        echo'<hr><hr>';
        var_dump($entity);
    }

}


