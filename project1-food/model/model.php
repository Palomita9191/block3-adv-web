<?php

class connectionObject
{
  public function __construct(public $host, public $username, public $password, public $database)
  {
  }
}

// model for the ingredientType, table independent
class ingredientTypeModel
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

  public function selectIngredientType()
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM ingredientTypes");

      while ($row = $result->fetch_assoc()) {
        $results[] = $row;
      }
      $mysqli->close();
      return $results;
    } else {
      return false;
    }
  }

  public function insertIngredientTypes($ingredientTypeName)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("INSERT INTO ingredientTypes (ingredientTypeName) VALUES ('$ingredientTypeName')");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }


  public function getIngredientTypeById($ingredientTypeID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM ingredientTypes WHERE ingredientTypeID = '$ingredientTypeID'");
      $dishes = $result->fetch_assoc();
      $mysqli->close();
      return $dishes;
    } else {
      return false;
    }
  }

  public function deleteIngredientType($ingredientTypeID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("DELETE FROM ingredientTypes WHERE ingredientTypeID = '$ingredientTypeID'");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }

  public function updateIngredientType($ingredientTypeID, $ingredientTypeName)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("UPDATE ingredientTypes 
                                SET ingredientTypeName = '$ingredientTypeName'
                                WHERE ingredientTypeID = '$ingredientTypeID'");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }
}


// model for the supplier

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

//model for the ingredient (relate table)
class ingredientModel
{
  //for connect to the database
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
        throw new Exception('Could not connect: ' . $mysqli->connect_error);
      }
      return $mysqli;
    } catch (Exception $e) {
      // Log the exception or echo a detailed error message for debugging.
      error_log($e->getMessage());
      return false;
    }
  }

  //select the data from the related tables
  public function selectSupplier()
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

  public function selectIngredientType()
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM ingredientTypes");
      while ($row = $result->fetch_assoc()) {
        $results[] = $row;
      }
      $mysqli->close();
      return $results;
    } else {
      return false;
    }
  }

  //fetch the record of ingredients from database
  public function selectIngredients()
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT ingredient.*, suppliers.SupplierName, ingredientTypes.ingredientTypeName
                                            FROM ingredient
                                            NATURAL JOIN suppliers
                                            NATURAL JOIN ingredientTypes
                                            ORDER BY ingredientID ASC
                                          ;");

      while ($row = $result->fetch_assoc()) {
        $results[] = $row;
      }
      $mysqli->close();
      return $results;
    } else {
      return false;
    }
  }

  //insert ingredient function 
  public function insertIngredient($ingredientName, $ingredientTypeID, $ingredientPrice, $supplierID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("INSERT INTO ingredient (ingredientName, ingredientTypeID, ingredientPrice, SupplierID, ) VALUES ('$ingredientName', '$ingredientTypeID', '$ingredientPrice', '$supplierID')");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }

  public function deleteIngredient($ingredientID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("DELETE FROM ingredient WHERE ingredientID = '$ingredientID'");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }

  //for edit form fetch
  public function getIngredientById($ingredientID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM ingredient WHERE ingredientID = '$ingredientID'");
      $ingredient = $result->fetch_assoc();
      $mysqli->close();
      return $ingredient;
    } else {
      return false;
    }
  }

//   update ingredient

  public function updateIngredient($ingredientID, $ingredientName, $ingredientTypeID, $ingredientPrice, $supplierID)
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $mysqli->query("UPDATE ingredient 
                      SET ingredientName = '$ingredientName', ingredientTypeID = '$ingredientTypeID', ingredientPrice = '$ingredientPrice', SupplierID = '$supplierID', 
                        
                        WHERE ingredientID = '$ingredientID'");
      $mysqli->close();
      return true;
    } else {
      return false;
    }
  }

//   public function updateIngredient($ingredientID, $ingredientName, $ingredientPrice, $supplierID, $ingredientTypeID)
//   {
//     $mysqli = $this->connect();
//     if ($mysqli) {
//       // Use a prepared statement
//       $stmt = $mysqli->prepare("UPDATE ingredient 
//                                   SET ingredientName = ?, ingredientPrice = ?, supplierID = ?, ingredientTypeID = ?
//                                   WHERE ingredientID = ?");

//       // Bind parameters
//       $stmt->bind_param("ssiii", $ingredientName, $ingredientPrice, $supplierID, $ingredientTypeID, $ingredientID);

//       // Execute the statement
//       if ($stmt->execute()) {
//         // Update successful
//         $stmt->close();
//         $mysqli->close();
//         return true;
//       } else {
//         // Update failed
//         echo "Error: " . $stmt->error;
//         $stmt->close();
//         $mysqli->close();
//         return false;
//       }
//     } else {
//       return false;
//     }
//   }


}

//class for the supplier 

?>

