<?php

//control is the file that connect model and view,select, edit, update, delete..

include_once 'model/model.php';

class Controller
{
  private $dish;
  private $ingredientModel;
  private $supplierModel;
  private $dishIngredientModel;

  public function __construct($connection)
  {
    // $this->dishModel = new dishModel($connection);
    // $this->ingredientModel = new ingredientModel($connection);
    $this->supplierModel = new supplierModel($connection);
  }


//static table: supplier

public function showSuppliers()
  {
    $suppliers = $this->supplierModel->selectSuppliers();
    include 'views/supplier.php';
  }

  public function showSupplierForm()
  {
    include 'views/supplierform.php';
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
    $supplierID = $_POST['supplierID'];
    $supplier = $this->supplierModel->getSupplierById($supplierID); 
    include 'views/editSupplier.php';
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


  public function showMenu()
  {
    include 'view/menu.php';
  }






}

include_once 'control/connection.php';
$connection = new connectionObject($host, $username, $password, $database);
$controller = new Controller($connection);
// if (isset($_POST['submit'])) {
//   $controller->add();
// } else {
//   $controller->showForm();
// }
$controller->showMenu();


  ?>