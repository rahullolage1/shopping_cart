<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-md-4 col-md-offset-4">
    <h2 class="text-primary text-center">Registration Page</h2>
    <hr />
    <form method="post" action="<?php echo base_url('login/signup_action') ?>">
    <?= csrf_field(); ?>
      <?php if(!empty(session()->getFlashdata('fail'))) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
      <?php endif ?>
      
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>"/>
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
      </div>
     
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>" />
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input
          type="password"
          name="password"
          id="password"
          class="form-control"
          value="<?= set_value('password'); ?>"
          
        />
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input
          type="password"
          name="cpassword"
          id="cpassword"
          class="form-control"
          value=""
          
        />
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
      </div>
      <button class="btn btn-primary" name="submit">Submit</button>
      <br>
      <br>
      <p>Already have an account <a href ="<?= base_url('login/loginpage'); ?>">Login here</a></p>
    </form>
  </div>
</div>
</div>
