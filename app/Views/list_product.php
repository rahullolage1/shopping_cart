
<?php
//  echo "Product list";
//  echo "<pre>";
//  print_r($products);
?>


<div class="container text-center">    
  <h3>What We Do</h3><br>
  <a class="btn btn-primary" href="<?php echo base_url() ?>/product/add" role="button">Add Product</a>
  <div class="row">
    <?php 
      foreach ($products as $row) { ?>
        <div class="col-sm-4">
          <h3><a href="<?php echo base_url('product/view/'.$row['id'])?>"><?php echo $row['name'] ?></a></h3>
          <p>₹<?= $row['price'] ?></p>
          <p><?= $row['category'] ?></p>
        </div>
    <?php  }
    ?>
    
  </div>
</div><br>