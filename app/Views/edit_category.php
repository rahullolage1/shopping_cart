<form class="container" action="<?php echo base_url('category/edit_action/'.$id) ?>" method="POST">
<div class="row">&nbsp;</div>
<div class="row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="name" class="form-control" id="inputCity" value=<?= $result['name'] ?>>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Description</label>
      <input type="text" name="description" class="form-control" id="inputCity" value=<?= $result['description'] ?>>
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>