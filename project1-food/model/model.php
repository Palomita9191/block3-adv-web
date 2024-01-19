<?php

class connectionObject
{
  public function __construct(public $host, public $username, public $password, public $database)
  {
  }
}


class supplierModel
{
  private $mysqli;
  private $connectionObject;

  public function __construct($connectionObject)
  {
    $this->connectionObject = $connectionObject;
  }

  public function connect()
  {
    try {
      $mysqli = new mysqli($this->connectionObject->host, $this->connectionObject->username, $this->connectionObject->password, $this->connectionObject->database);
      if ($mysqli->connect_error) {
        throw new Exception('Could not connect');
      }
      return $mysqli;
    } catch (Exception $e) {
      // Log the exception or echo a detailed error message for debugging.
      error_log($e->getMessage());
      return false;
    }
  }
  //the list
  public function selectSuppliers()
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM suppliers");

      while ($row = $result->fetch_assoc()) {
        $results[] = $row;
      }
      $mysqli->close();
      return $results;
    } else {
      return false;
    }
  }

  public function insertSupplier($supplierName, $supplierLocation)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("INSERT INTO suppliers (SupplierName, SupplierLocation) VALUES ('$supplierName', '$supplierLocation')");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }


  public function getSupplierById($supplierID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM suppliers WHERE SupplierID = '$supplierID'");
      $supplier = $result->fetch_assoc();
      $mysqli->close();
      return $supplier;
    } else {
      return false;
    }
  }

  public function deleteSupplier($supplierID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("DELETE FROM suppliers WHERE SupplierID = '$supplierID'");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }

  // update ingredient

  public function updateSupplier($supplierID, $supplierName, $supplierLocation)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("UPDATE suppliers 
                      SET SupplierName = '$supplierName', SupplierLocation = '$supplierLocation'
                        WHERE SupplierID = '$supplierID'");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }
}

?>

