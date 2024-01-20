<h2>Edit ingredient Type</h2>

<div class="container d-flex justify-content-center">
  <form method="POST" action="?action=showIngredientType" style="width: 50%; margin-bottom:30px;">

    <div class="mb-3">
      <input type="hidden" class="form-control" name="ingredientTypeID" value="<?php echo $ingredientType['ingredientTypeID']; ?>">
    </div>

    <div class="mb-3">
      <label for="ingredientTypeName" class="form-label">Name:</label>
      <input type="text" class="form-control" name="ingredientTypeName" value="<?php echo $ingredientType['ingredientTypeName']; ?>">
    </div>

    <div class="mb-3">
      <input class="form-control btn btn-success" type="submit" name="updateIngredientType" value="Update">
    </div>
  </form>
</div>