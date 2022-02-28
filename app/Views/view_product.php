<div class="container text-center"><br>
  <a class="btn btn-primary" href="<?php echo base_url() ?>/product" role="button">Back</a>
    <div class="row">
      <div class="col-sm-12">
        <h3><?php echo $result['name'] ?></h3>
        <p>₹<?= $result['price'] ?></p>
        <p><?= $result['category'] ?></p>
      </div>
    </div>
</div>