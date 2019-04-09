<?php include('header.php'); ?>
 	<div class="container">
 	<?= form_open('admin/login'); ?>
  <fieldset>
    <legend class="text-center text-primary"><strong>login</strong></legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <?= form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter email','value'=>set_value('email')]); ?>
       <span class="error"><?= form_error('email'); ?></span>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password','value'=>set_value('email')]); ?>
      <span class="error"><?= form_error('password'); ?></span>
      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    </div>
    	<div class="row">
    		<div class="col-lg-6">
    		<div></div>
    			<?= form_submit(['name'=>'Submit','class'=>'btn btn-primary','value'=>'submit']); ?> 
    			
    		</div>
    		<div class="col-lg-6">
    			<a href="<?= base_url('admin/forgetpass');?>" class="ml-auto">forget password?</a>
    		</div>
    	 	
			
		</div>
          
      	
  </fieldset>
<?= form_close(); ?>

 	</div> 
<?php include('footer.php'); ?>