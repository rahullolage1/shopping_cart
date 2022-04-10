<div class="container">
  <div class="row" style="margin-top:25px">
    <div class="col-md-4 col-md-offset-4">
    <h2 class="text-primary text-center">Login Page</h2>
    <hr />
    <form method="post" action="<?php echo base_url('login/auth') ?>">
    
      <?php if(session()->getFlashdata('msg')) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
      <?php endif ?>
     
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
          value=""
          
        />
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
      </div>
      <button class="btn btn-primary" name="submit">Login</button>
      <br>
      <br>
      <p>Have no account? <a href ="<?= base_url('login/'); ?>">Register here</a></p>
    </form>
  </div>
</div>
</div>


