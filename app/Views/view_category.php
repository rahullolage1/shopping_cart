<div class="container text-center"><br>
  <a class="btn btn-primary" href="<?php echo base_url('category/edit/' . $id)?>" role="button">Edit</a>
    <div class="row">
      <div class="col-sm-12">
        <h3><?php echo $result['name'] ?></h3>
        <p><?= $result['description'] ?></p>
      </div>
    </div>
    <br>
    <a class="btn btn-primary" href="<?php echo base_url() ?>/category" role="button">Back</a>
</div>