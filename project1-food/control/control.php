<?php

//control is the file that connect model and view,select, edit, update, delete..

include_once 'model/model.php';

class Controller
{

  private $ingredientTypeModel;
  private $supplierModel;

  private $ingredientModel;
//   private $dishIngredientModel;

  public function __construct($connection)
  {
    $this->ingredientTypeModel = new ingredientTypeModel($connection);
    $this->ingredientModel = new ingredientModel($connection);
    $this->supplierModel = new supplierModel($connection);
  }


//static table: supplier

public function showSuppliers()
  {
    $suppliers = $this->supplierModel->selectSuppliers();
    include 'view/supplier.php';
  }

  public function showSupplierForm()
  {
    include 'view/supplierForm.php';
  }

  public function addSuppliers()
  {
    $supplierName = $_POST['SupplierName'];
    $supplierLocation = $_POST['SupplierLocation'];
    if (!$supplierName) {
      echo "<p>Missing information</p>";
      $this->showSupplierForm();
      return;
    } else if ($this->supplierModel->insertSupplier($supplierName, $supplierLocation)) {
      echo "<p>Added dish: $supplierName</p>";
    } else {
      echo "<p>Could not add supplier</p>";
    }

  }

  public function deleteSupplier()
  {
    if (isset($_POST['deleteSupplier'])) {
      $supplierID = $_POST['SupplierID'];
      if ($this->supplierModel->deleteSupplier($supplierID)) {
        echo "<p style='color:white; font-size:14px; width: 80%; margin: 0 auto;'>Successfully deleted supplier ID: $supplierID</p>";
      } else {
        echo "<p style='color:white; font-size:14px; width: 80%; margin: 0 auto;'>Failed to delete supplier ID: $supplierID</p>";
      }
    }

  }
  public function updateSupplierForm()
  {
    $supplierID = $_POST['SupplierID'];
    $supplier = $this->supplierModel->getSupplierById($supplierID); 
    include 'view/supplierEdit.php';
  }

  public function updateSupplier()
  {
    if (isset($_POST['updateSupplier'])) {
      $supplierID = $_POST['SupplierID'];
      $supplierName = $_POST['SupplierName'];
      $supplierLocation = $_POST['SupplierLocation'];
      if ($this->supplierModel->updateSupplier($supplierID, $supplierName, $supplierLocation)) {
        echo "<p>Successfully updated supplier with ID: $supplierID</p>";
      } else {
        echo "<p>Failed to update supplier with ID: $supplierID</p>";
      }
    }
  }

//   end of supplier


//static table: ingredientType

public function showIngredientType()
  {
    $ingredientTypes = $this->ingredientTypeModel->selectIngredientType();
    include 'view/ingredientType.php';
  }

  public function showIngredientTypeForm()
  {
    include 'view/ingredientTypeForm.php';
  }

  public function addIngredientType()
  {
    $ingredientTypeName = $_POST['ingredientTypeName'];

    if (!$ingredientTypeName) {
      echo "<p>Missing information</p>";
      $this->showIngredientTypeForm();
      return;
    } else if ($this->ingredientTypeModel->insertIngredientTypes($ingredientTypeName)) {
      echo "<p>Added ingredient Type: $ingredientTypeName</p>";
    } else {
      echo "<p>Could not add ingredient type</p>";
    }

  }

  public function deleteIngredientType()
  {
    if (isset($_POST['deleteIngredientType'])) {
      $ingredientTypeID = $_POST['ingredientTypeID'];
      if ($this->ingredientTypeModel->deleteIngredientType($ingredientTypeID)) {
        echo "<p style='color:white; font-size:14px; width: 80%; margin: 0 auto;'>Successfully deleted ingredient Type ID: $ingredientTypeID</p>";
      } else {
        echo "<p style='color:white; font-size:14px; width: 80%; margin: 0 auto;'>Failed to delete ingredient Type ID: $ingredientTypeID</p>";
      }
    }

  }
  public function updateIngredientTypeForm()
  {
    $ingredientTypeID = $_POST['ingredientTypeID'];
    $ingredientType = $this->ingredientTypeModel->getIngredientTypeById($ingredientTypeID); 
    include 'view/ingredientTypeEdit.php';
  }

  public function updateIngredientType()
  {
    if (isset($_POST['updateIngredientType'])) {
      $ingredientTypeID = $_POST['ingredientTypeID'];
      $ingredientTypeName = $_POST['ingredientTypeName'];
 
      if ($this->ingredientTypeModel->updateingredientType($ingredientTypeID, $ingredientTypeName)) {
        echo "<p>Successfully updated ingredient type with ID: $ingredientTypeID</p>";
      } else {
        echo "<p>Failed to update ingredient type with ID: $ingredientTypeID</p>";
      }
    }
  }

//   end of the type

  public function showIngredient()
  {
    $ingredients = $this->ingredientModel->selectIngredients();
    include 'view/ingredient.php';
  }


  //function of showing the form of adding the ingredients
  public function showFormIngredient()
  {
    $suppliers = $this->ingredientModel->selectSupplier();
    $ingredientTypes = $this->ingredientModel->selectIngredientType();

    include 'view/ingredientForm.php';
  }

  public function addIngredient()
  {
    $ingredientName = $_POST['ingredientName'];
    $ingredientTypeID = $_POST['ingredientTypeID'];
    $ingredientPrice = $_POST['ingredientPrice'];
    $supplierID = $_POST['SupplierID'];

    if ($this->ingredientModel->insertIngredient($ingredientName, $ingredientTypeID, $ingredientPrice, $supplierID)) {
      echo "<p>Successfully added: $ingredientName, $ingredientTypeID, $ingredientPrice, $supplierID!</p>";
    } else {
      echo "<p>Failed to add!</p>";
    }
  }

  public function deleteIngredient()
  {
    if (isset($_POST['deleteIngredient'])) {
      $ingredientID = $_POST['ingredientID'];
      if ($this->ingredientModel->deleteIngredient($ingredientID)) {
        echo "<p style='color:white; font-size:14px; width: 80%; margin: 0 auto;'>Successfully deleted ingredient ID: $ingredientID</p>";
      } else {
        echo "<p style='color:white; font-size:14px; width: 80%; margin: 0 auto;'>Failed to delete ingredient ID: $ingredientID</p>";
      }
    }

  }

  public function updateIngredient()
  {
    if (isset($_POST['updateIngredient'])) {
      $ingredientID = $_POST['ingredientID'];
      $ingredientName = $_POST['ingredientName'];
      $ingredientTypeID = $_POST['ingredientTypeID'];
      $ingredientPrice = $_POST['ingredientPrice'];
      $supplierID = $_POST['SupplierID'];
    

      if ($this->ingredientModel->updateIngredient($ingredientID, $ingredientName, $ingredientTypeID, $ingredientPrice, $supplierID)) {
        echo "<p>Successfully updated ingredient with ID: $ingredientID</p>";
      } else {
        echo "<p>Failed to update ingredient with ID: $ingredientID</p>";
      }
    }
  }

  public function updateingredientForm()
  {
    $ingredientID = $_POST['ingredientID'];
    $ingredient = $this->ingredientModel->getIngredientById($ingredientID); // Add a method to fetch a ingredient by ID
    $suppliers = $this->ingredientModel->selectSupplier(); //fetch suppliers fpr the dropdown in the edit form
    $ingredientTypes = $this->ingredientModel->selectIngredientType(); //fetch types for the dropdown in the edit form
    include 'view/ingredientEdit.php';
  }


// end of the controller ingredient

  public function showMenu()
  {
    include 'view/menu.php';
  }

}

include_once 'control/connection.php';
$connection = new connectionObject($host, $username, $password, $database);
$controller = new Controller($connection);
$controller->showMenu();

if (isset($_POST['submitSupplier'])) {
    $controller->addSuppliers();}
    elseif (isset($_POST['editSupplier'])) {
        $controller->updateSupplierForm();
      } elseif (isset($_POST['deleteSupplier'])) {
        $controller->deleteSupplier();}
        elseif (isset($_POST['updateSupplier'])) {
            $controller->updateSupplier();}
            elseif (isset($_POST['submitIngredientType'])) {
                $controller->addIngredientType();}
            elseif (isset($_POST['editIngredientType'])) {
                $controller->updateIngredientTypeForm();
              } elseif (isset($_POST['deleteIngredientType'])) {
                $controller->deleteIngredientType();}
                elseif (isset($_POST['updateIngredientType'])) {
                    $controller->updateIngredientType();}
                    elseif (isset($_POST['submitIngredient'])) {
                        $controller->addIngredient();}
                    elseif (isset($_POST['editIngredient'])) {
                        $controller->updateIngredientForm();
                      } elseif (isset($_POST['deleteIngredient'])) {
                        $controller->deleteIngredient();}
                        elseif (isset($_POST['updateIngredient'])) {
                            $controller->updateIngredient();}
                            
        


            

  if (isset($_GET['page'])) {
    if ($_GET['page'] == 'suppliers') {
      $controller->showSuppliers();
    } elseif ($_GET['page'] == 'addsupplier') {
      $controller->showSupplierForm();}
      elseif ($_GET['page'] == 'ingredientTypes') {
          $controller->showIngredientType();
        } elseif ($_GET['page'] == 'addIngredientType') {
          $controller->showIngredientTypeForm();
        }
    elseif ($_GET['page'] == 'addingredient') {
      $controller->showFormIngredient();
    } elseif ($_GET['page'] == 'ingredients') {
      $controller->showIngredient();
    } }


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'showSuppliers') {
      $controller->showSuppliers();
    } elseif ($_GET['action'] == 'showIngredients') {
      $controller->showIngredient();
    } elseif ($_GET['action'] == 'showIngredientType') {
      $controller->showIngredientType();
    }
    }



  ?>