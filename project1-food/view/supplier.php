<h2>Check all the Suppliers</h2>
<section class="record py-5">
  <div class="container">
    <div class="presentcards">
      <?php

      if ($suppliers) {
        foreach ($suppliers as $supplier) {
          echo "
    
              <div class='card text-dark bg-light mb-3  h-100'>
 
   <div class='card-body text-dark'>
   <h3 class='card-title'>" . $supplier['SupplierID'] . ' ' . $supplier['SupplierName'] . "</h3>
    <ul class='list-group list-group-flush'>
  <li class='list-group-item bg-light text-dark'>Location:" . $supplier['SupplierLocation'] . "</li>
</ul>
 </div>
  <div class='card-header'><form method='POST'>
                                <input type='hidden' name='SupplierID' value='" . $supplier['SupplierID'] . "'>
                                <div class='button-container'>
                                    <input type='submit' name='editSupplier' value='Edit' class='btn btn-info'>
                                    <input type='submit' name='deleteSupplier' value='Delete' class='btn btn-danger'>
                                </div>
                            </form></div>
 </div>
      ";
        }
      } else {
        echo 'No supplier found';
      }
      ?>
    </div>

  </div>
</section>