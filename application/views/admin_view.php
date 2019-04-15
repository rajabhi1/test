<div class="container p-5">
<div class="row">
	<div class="col-lg-6">
		<h1 class="text-center">All Records</h1> 
	</div>
	<div class="col-lg-6">
		<?php echo form_open('admin/search',['class'=>'form-inline']); ?>
          <input class="form-control" type="text" name="query" placeholder="Search">
          <button class="btn btn-secondary" type="submit" name="search">Search</button>
        <?php form_close(); ?>
        <span class="error"><?= form_error('query') ?></span>
	</div>
	
</div>
<div class="row">
 	<div class="tabel-responsive">
 		<table class="table table-hover">
	    <thead>
		    <tr>
		      <th scope="col">SrNo.</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Gender</th>
		      <th scope="col">Image</th>
		      <th scope="col">Publish on</th>
  		    </tr>
		</thead>
	    <tbody>
	    	<?php 
	    	$num=1;
	    	foreach ($alluser as $key => $value):
	    	?>
		    <tr>		    	
			    <th scope="row"><?php echo $num; ?></th>
			    <th><?php echo $value['name'] ;?></th>
			    <th><?php echo $value['email'] ;?></th>
			    <th><?php echo $value['phone'] ;?></th>
			    <th><?php echo $value['gender'] ;?></th>
			    <th><img src="<?php echo $value['image']; ?>" width="100px" hight="100px" class="rounded-circle" ></th>
			    <th><?php echo $value['created_on'] ;?></th>
  			</tr>
		<?php $num++; endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
 	</div>
 </div>
</div>
<div class="container p-1">
	<div class="row">
		<div class="btn-group">
			<a href="<?php echo base_url('admin/uptodate'); ?>" class="btn btn-secondary">Calender</a>
		</div>
		<div class="btn-group">
			<a href="<?php echo base_url('admin/calculator'); ?>" class="btn btn-info">Affiliate Calculator</a>
		</div>
	</div>
</div>
	<div class="footer p-3 text-center">
		<div class="btn-group footer">
	  	   <a href="<?php echo base_url('comments/login'); ?>" class="btn btn-outline-primary">User login</a>
	    </div>
	</div>