<!DOCTYPE html>
<html lang="en">
<head>
  <title>user login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>
<body>
		<div class="container">
			  <a href = "<?php echo base_url('admin/index'); ?>" class="ml-auto">Back to records page</a>
		 	<?= form_open('comments/loginform'); ?>
		  <fieldset>
		    <legend class="text-center text-primary"><strong>User login</strong></legend>
		    <div class="form-group">
		      <label for="exampleInputEmail1">User Email address:</label>
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
				</div>	
		  </fieldset>
		<?= form_close(); ?>
 	</div> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>