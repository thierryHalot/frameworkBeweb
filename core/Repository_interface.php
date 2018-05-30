<?php
namespace BWB\framework\mvc;
interface Repository_interface{

    public function getAll();

    public function getAllBy($filter);

}