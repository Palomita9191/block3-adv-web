<?php
// controller.php

require_once 'model.php';
require_once 'home.php';

class Controller {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function invoke() {
        $dishes = $this->model->getDishes();
        include 'home.php';
    }
}
?>
