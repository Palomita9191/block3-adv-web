<?php
// model.php

class Model {
    private $dbConnection;

    public function __construct() {
        // Establish a database connection (update with your credentials)
        $this->dbConnection = new mysqli("localhost", "username", "password", "food_vendor_db");
    }

    public function getDishes() {
        $query = "SELECT * FROM dishes";
        $result = $this->dbConnection->query($query);
        $dishes = [];

        while ($row = $result->fetch_assoc()) {
            $dishes[] = $row;
        }

        return $dishes;
    }
}
?>
