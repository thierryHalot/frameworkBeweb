<?php

abstract class Controller{

    //Le mot-clé private permet de déclarer des attributs et
    // des méthodes qui ne seront visibles et accessibles directement que depuis
    // l'intérieur même de la classe
    protected $get;
    protected $post;


    /*
     * initialisation des propriétés
     */

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;

    }

    /**
     * PHP 5 dispose du mot-clé "final", qui empêche les classes filles de surcharger
     * une méthode, lorsque la définition de cette dernière
     * est préfixée par le mot-clé "final"
     * Si la classe elle-même est définie comme finale, elle ne pourra pas être étendue.
     */
    final protected function render($viewPath,$datas=null){
//le premier dollar contient'$users'
        foreach ($datas as $key => $value){

            $$key = $value;
        }

        include "./vue/".$viewPath.".php";

    }

}