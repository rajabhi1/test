<?php include('header.php'); ?>
	<div class="container">
	<h3 class="text-center">Reset Password</h3>
		<?php echo form_open('admin/sentmail'); ?>
		<div class="form-group">
		    <label class="text-primary"><b>Email:</b></label>
		    <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter your email','value'=>set_value('email')]) ?>
		    <span class="error"><?php echo form_error('email'); ?></span>
		 </div>
        
		<div class="btn">
			<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'submit']) ?>
		</div>
		<?php echo form_close(); ?>
	</div>
<?php include('footer.php'); ?>