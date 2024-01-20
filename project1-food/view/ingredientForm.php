<h2>Add a Ingredient</h2>

<div class="container d-flex justify-content-center">

  <form method="POST" action="?action=showIngredients" style="width: 50%; margin-bottom:30px;">
    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" name="ingredientName" placeholder="Name" required>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Ingredient Type:</label>
      <?php
      if ($ingredientTypes) {
        echo "<select name='ingredientTypeID' style='width:100%; height: 41px; border-radius: 6px;'>";
        echo "<option value=''>Select ingredient type</option>";
        foreach ($ingredientTypes as $ingredientType) {
          echo "<option value='" . $ingredientType['ingredientTypeID'] . "'>" . $ingredientType['ingredientTypeName'] . "</option>";
        }
        echo "</select>";
      } else {
        echo 'No ingredients found';
      }
      ?>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Price:</label>
      <input type="decimal" class="form-control" name="ingredientPrice" placeholder="Price" required>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Supplier Name:</label>
      <?php
      if ($suppliers) {
        echo "<select name='SupplierID' style='width:100%; height: 41px;
    border-radius: 6px;'>";
        echo "<option value=''>Select supplier</option>";
        foreach ($suppliers as $supplier) {
          echo "<option value='" . $supplier['SupplierID'] . "'>" . $supplier['SupplierName'] . "</option>";
        }
        echo "</select>";
      } else {
        echo 'No suppliers found';
      }
      ?>
    </div>

   

    <div class="mb-3">

      <input class="form-control btn btn-success" type="submit" name="submitIngredient" value="Submit">
    </div>

  </form>
</div>