
<form class="container" action="<?php echo base_url('product/add_action') ?>" method="POST">
<div class="row">&nbsp;</div>
<div class="row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="name" class="form-control" id="inputCity">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Price</label>
      <input type="text" name = "price" class="form-control" id="inputCity">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputCity">Category</label>
      <input type="text"  name = "category" class="form-control" id="inputCity">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <br/>
  <?php
  if($err == 'exists') {
      echo "Product already exist";
    } else if($err) {
      echo "Product name, price and category is required";
  } ?>
</form>

