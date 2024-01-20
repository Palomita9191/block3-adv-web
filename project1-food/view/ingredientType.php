<h2>Check all Type of Ingredient</h2>
<section class="record py-5">
  <div class="container">
    <div class="presentcards">
      <?php

      if ($ingredientTypes) {
        foreach ($ingredientTypes as $ingredientType) {
          echo "
    
              <div class='card text-dark bg-light mb-3  h-100'>
 
   <div class='card-body text-dark'>
   <h3 class='card-title'>" . $ingredientType['ingredientTypeID'] . ' ' . $ingredientType['ingredientTypeName'] . "</h3>
 </div>
  <div class='card-header'><form method='POST'>
                                <input type='hidden' name='ingredientTypeID' value='" . $ingredientType['ingredientTypeID'] . "'>
                                <div class='button-container'>
                                    <input type='submit' name='editIngredientType' value='Edit' class='btn btn-warning'>
                                    <input type='submit' name='deleteIngredientType' value='Delete' class='btn btn-danger'>
                                </div>
                            </form></div>
 </div>
      ";
        }
      } else {
        echo 'No ingredient Type found';
      }
      ?>
    </div>

  </div>
</section>