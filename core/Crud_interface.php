<?php
/**
 * Created by PhpStorm.
 * User: thierry
 * Date: 23/05/18
 * Time: 11:41
 */
//une interface,c'est que des signatures de méthode
interface Crud_interface{

    /*
     * @param Une reference vers l'objet a récupérer
     */

    public function create($entity);

    public function retrieve($entity);

    public function update($entity);

    public function delete($entity);

}