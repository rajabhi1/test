<?php if(!is_null($this->session->userdata('id'))){ ?>
	<div class="container">
		<div class="row">
			<div class="p-5">
				<?= anchor("admin/add_user",'Add User',['class'=>'btn btn-outline-primary btn-lg']); ?>
			</div>
		
		</div>
		
			<?php 
			if($feedback=$this->session->flashdata('feedback'));
				$feedback_class=$this->session->flashdata('feedback_class');
		?>
		<div class="alert alert-dismissible <?php echo $feedback_class; ?>">
		  <strong><?php echo $feedback; ?></strong>
		</div>
		<div class="">
			<h3>All Records</h3>
			<?php echo form_open('admin/multi_checkbox');?>
			<table class="table table-hover">
				
			  <thead>

			    <tr>
			    <th scope="col"><input type="checkbox" id="allcheck" >checkall</th>
			      <th scope="col">SrNo.</th>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Phone</th>
			      <th scope="col">Gender</th>
			      <th scope="col">Image</th>    
			       <th scope="col">Publish on</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  		
			  <?php  $num=1; foreach ($allrecords as $key => $value): ?>
			    <tr>
			    <td>
			    	<input type="checkbox" name="checkbox[]" class="checkbox" value="<?php echo $value['id']; ?>">
			    </td>
			      <th scope="row"><?php  echo $num; ?></th>
			      <td><?php echo $value['name']; ?></td>
			      <td><?php echo $value['email']; ?></td>
			      <td><?php echo $value['phone']; ?></td>
			      <td><?php echo $value['gender']; ?></td>
			      <td>
			      	<img src="<?= $value['image']; ?>" alt="" width="100" hight="100" class="rounded-circle" >
			      </td>
			      <td><?php echo date('d M y',strtotime($value['created_on'])); ?></td>
			      <td>
					<a href="<?php echo base_url('admin/edit_data');?>/<?php echo $value['id']; ?>">Edit</a>&nbsp;
					<a href="<?php echo base_url('admin/delete');?>/<?php echo $value['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			    </tr>
			    <?php $num++; endforeach; ?>
			  </tbody>
			 
  			</table> 
  			<button type="submit" name="del" id="multidel" class="btn btn-danger" onclick="confirm('are you sure to delete this data?')">Delete</button>
  			<?PHP echo form_close(); ?>
		</div>
	</div>
	<?php include('footer.php'); ?>
<script type="text/javascript">
	 $(document).ready(function() {

        $('#multidel').hide();
        $('#allcheck').click(function () {
            if ($(this).is(':checked'))
            {
                $(".checkbox").prop('checked', true);
            }
            else{
                $(".checkbox").prop('checked', false);
            }
            show_submit();
        });
        
        $('.checkbox').click(function(){
        	show_submit();
        });

        function show_submit(){
        	
        	var hold_array = [];

        	$('.checkbox').each(function(index, value)
        	{
        		if ($(this).is(':checked'))
        		{
        			hold_array.push(index);
        		}
        		
        	});
        	
        	$('#multidel').hide();
        	if(hold_array.length>0)
        	{
        	 $('#multidel').show();	
        	}
        	hold_array = [];
        }
        
    });
</script>
<?php
	 }else{
	 	redirect('admin/login');
	} 
?>