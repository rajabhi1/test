<?php include('header.php'); ?>

<div class="container">
<div class="row">
	<div class="col-lg-9">
		<h1 class="text-center">All Records</h1> 
	</div>
	<div class="col-lg-3">
		<?php echo form_open('admin/search',['class'=>'form-inline']); ?>
          <input class="form-control" type="text" name="query" placeholder="Search">
          <button class="btn btn-secondary" type="submit" name="search">Search</button>
        <?php form_close(); ?>
        <span class="error"><?= form_error('query') ?></span>
	</div>
	
</div>
 
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
<?php include('footer.php'); ?>