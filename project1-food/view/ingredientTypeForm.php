<h2>Add Ingredient Type</h2>

<div class="container d-flex justify-content-center">
  <form method="POST" action="?action=showIngredientType" style="width: 50%; margin-bottom:30px;">
    <div class="mb-3">
      <label for="ingredientTypeName" class="form-label">Name</label>
      <input type="text" class="form-control" name="ingredientTypeName" placeholder="Ingredient Type" required>
    </div>

    <div class="mb-3">
      <input class="form-control btn btn-success" type="submit" name="submitIngredientType" value="Add">
    </div>
  </form>
</div>