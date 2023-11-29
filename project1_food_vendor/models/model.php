<?php
// model.php

class Model {
    private $dbConnection;

    public function __construct() {
        // Update the database credentials as per your setup
        $this->dbConnection = new mysqli("localhost", "your_username", "your_password", "food_vendor_db");

        // Check connection
        if ($this->dbConnection->connect_error) {
            die("Connection failed: " . $this->dbConnection->connect_error);
        }
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

