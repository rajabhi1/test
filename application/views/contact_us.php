<div class="container p-4">
	<div class="row">
		<div class="col-lg-6">
			<h1 class="text-center">Location Map</h1>
			<div class="">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.479664014119!2d72.8544433144309!3d19.17424098703161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b844876b10e3%3A0xd2698dd103be2822!2seBrandz+Solutions!5e0!3m2!1sen!2sin!4v1554785440639!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col-lg-6">
			<h1 class="text-center text-success">get in touch</h1>
			
				<?php echo form_open('admin/enquery'); ?>

				<div class="form-group">
					<label for="username" class="text-primary">UserName:</label>
				    <div class="input-group mb-3">
				      <div class="input-group-prepend">
				        <span class="input-group-text">@</span>
				      </div>
				      <input type="text" class="form-control" placeholder="Username" id="usr" name="username" value="<?php echo set_value('username'); ?>">
				      <span class="error"><?php echo form_error('username'); ?></span>
				    </div>
				</div>	
			    <div class="form-group">
			    	<label class="text-primary">Email:</label>
			    	<div class="input-group mb-3">
				      <input type="text" class="form-control" placeholder="Your Email" name="email" value="<?php echo set_value('email'); ?>">
				      <div class="input-group-append">
				        <span class="input-group-text">@gmail.com</span>
				        <span class="error"><?php echo form_error('email'); ?></span>
				      </div>
				    </div>
			    </div>
			    <div class="form-group">
			    	<label for="phone" class="text-primary">Phone:</label>
				    <div class="input-group mb-3">
				      <div class="input-group-prepend">
				        <span class="input-group-text"><i class="fa fa-phone"></i></span>
				      </div>
				      <input type="text" class="form-control" placeholder="phone" name="phone" value="<?php echo set_value('phone'); ?>">
				      <span class="error"><?php echo form_error('phone'); ?></span>
				    </div>
			    </div>
		    	<div class="form-group">
			    	<label for="message" class="text-primary">Message:</label>
				    <div class="input-group mb-3">
	  				      <textarea type="text" class="form-control" name="message" placeholder="write your message"></textarea>
	  				      <span class="error"><?php echo form_error('message'); ?></span>
				    </div>
			    </div>
			    <div class="btn-group">
			    	<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'submit']); ?>
			    </div>																	
		 <?php echo form_close(); ?>
		</div>      
	</div>
</div>