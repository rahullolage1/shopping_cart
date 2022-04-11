<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-md-6 col-md-offset-3">
    <h2 class="text-primary text-center">Profile Page</h2>
    <hr />
    <form method="post" action="#">
     
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?= session('name') ?>" />
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" readonly value="<?= session('email') ?>" />
      </div>
      <div class="form-group">
        <label>Mobile No</label>
        <input type="text" name="mobile" class="form-control" value="" />
      </div>
      <div class="form-group">
        <label>DOB</label>
        <input type="date" name="dob" class="form-control" value="" />
      </div>
      <br>
      <button class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
</div>
</div>


