# frameworkBeweb
--------------------------------------------------------------------------------------------------------------


framework BEWEB version 1.0

--------------------------------------------------------------------------------------------------------------


Presentation:

Ce framework s'appuie sur un models 3 tiers,et propose des objets pour
gerer la connexion entre la base de donné et la couche Dao,ainsi que la possibilité
de choisir le traitement que l'on souhaite effectuer sur l'uri que l'on souhaite 
 

l'application se decompose en plusieur couche :

-Couche d'acces aux donné :


ce framework permet de gerer la connexion entre la base de donné et la couche dao

Il propose deux interface :

-l'interface crud (create,retrieve,update,delete) dans core/Crud_interface

-l'interface repository(getAll,getAll(filter))



Ces interfaces sont implémenter dans l'objet Dao core/Dao.php



Cette objet offre une méthode qui permet de se connecter directement avec la base de donner en appellant l'objet pdo,

il faut en revanche indiqué les bonnes information dans le fichier de config "database.json()"(conf/database.json)



C'est un objet abstrait,il est donc impératif de crée des class Enfants(exemple : DAOUser) ou il faudra écrire les méthodes correspondant aux interface a l'intérieur de ceux-ci !!!,ainsi que le model des objet que l'on souhaite persisté.

Il faut également uttilisé le mot clé "extends DAO" à chaque class qui souhaite hériter de des méthodes de l'objet Dao . 
pour les entité a persisté en base de donnée,il est important que le nom de propriété soit identique au table ,il faut également implementer leur getter et setter(exemple dans le dossier model) 



Couche Rooting :



Dans le dossier conf,il y a un fichier rooting.json, ce fichier permet d'effectuer un traitement sur l'uri, suivant la requete voulue :



contenus du fichier :

{



  "/": "ViewController:listeUtilisateur",



  "/les_cartes":{



    "GET":"DAOCarte:getAll"



  },



  "/api/users":{



    "GET":"DAOUser:getAll",



    "DELETE":"UserController:deleteAll",



    "POST":"UserController:create"



  },



  "/api/users/:1":{



    "GET":"UserController:getById",



    "PUT":"UserController:update",



    "DELETE":"UserController:delete"



  }



}



Il faut d'abord spécifier l'uri qui nous interresse,sachant que '/' correspond à la racine de notre application,
il faut indiquer le verbe http qui correspond à la clé de notre tableau ,puis la méthode de l'objet que l'on desire employé pour la valeur de ce meme tableau.


Dans le dossier Core il y a l'objet Rooting qui possede plusieur méthode,cette objet traite le fichier json,c'est lui qui permet de faire les rédirections au bonne endroit

l'objet Controller quand à lui,sert à implementer une action a travers deux propriété get et post. 

couche securité :

ce framework possede un objet SecurityMiddleware qui uttilise Composer

qui sert a crypter les données 


