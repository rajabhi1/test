<div class="container">
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
	    	if(count($searchquery)):
	    	$num=1;
	    	foreach ($searchquery as $key => $value):
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
		<?php $num++; endforeach; else: ?>
		<tr>
			<td class="text-center">no record found</td>
		</tr>
	<?php endif;?>
		</tbody>
	</table>
	
</div>