<h2>Edit Supplier</h2>

<div class="container d-flex justify-content-center">
  <form method="POST" action="?action=showSuppliers" style="width: 50%; margin-bottom:30px;">

    <div class="mb-3">
      <input type="hidden" class="form-control" name="SupplierID" value="<?php echo $supplier['SupplierID']; ?>">
    </div>

    <div class="mb-3">
      <label for="supplierName" class="form-label">Name:</label>
      <input type="text" class="form-control" name="SupplierName" value="<?php echo $supplier['SupplierName']; ?>">
    </div>

    <div class="mb-3">
      <label for="supplierLocation" class="form-label">Location:</label>
      <input type="text" class="form-control" name="SupplierLocation"
        value="<?php echo $supplier['SupplierLocation']; ?>">
    </div>

    <div class="mb-3">
      <input class="form-control btn btn-success" type="submit" name="updateSupplier" value="Update">
    </div>
  </form>
</div>