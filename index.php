<?php
require './models/User.php';
require './core/Dao.php';

if($_SERVER["REQUEST_URI"] === "/create/User"){
    echo "<pre>";
    $usr = new User(1);
    var_dump($usr);
    Dao::get_instance()->retrieve($usr);
    var_dump($usr);
    echo "/<pre>";
}




