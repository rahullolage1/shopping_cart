<div class="container text-center">    
  <?php if($empty == false) { ?><h3>Top categories</h3><br>
  <a class="btn btn-primary" href="<?php echo base_url('category/add') ?>" role="button">Add Category</a>
  <div class="row">
    <?php 
      foreach ($categories as $row) { ?>
        <div class="col-sm-4">
          <h3><a href="<?php echo base_url('category/view/'.$row['id'])?>"><?php echo $row['name'] ?></a></h3>
          <p><?= $row['description'] ?></p>
        </div>
    <?php  }
    ?>
  </div>
  <?php } else { ?>
    No records found
     <?php } ?>
</div><br>