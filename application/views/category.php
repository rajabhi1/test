<div class="container p-5">
	<div class="row">
		<?php foreach ($allproduct as $key => $value): ?>
			<div class="col-lg-3">
				<div class="card">
			        <img class="card-img-top" src="https://www.cybertransactiongateway.com/wp-content/uploads/2015/08/shopping-supermarket-cart-vector_MyLxIlPd-300x300.jpg" alt="Card image cap">
			        <div class="card-body">
			            <h4 class="card-title"><a href="" title="View Product"><?php echo $value['name']; ?></a></h4>
			            <p class="card-text"><?php echo ellipsize($value['desc'],10, .4); ?></p>
			            <label class="card-text text-success">Rs.<?php echo $value['price']; ?></label>
			          
			            <div class="btn-group d-flex">
		            		<button class="btn btn-secondary flex-fill">Buy Now</button>
		            		<a href="<?php echo base_url('admin/add_to_cart');?>/<?php echo $value['id']; ?>" class="btn btn-primary flex-fill" onclick="alert('successfullly Added to Cart')">Add to cart</a>
						</div>
			        </div>
			    </div>
			</div>
		<?php endforeach; ?>	
	</div>	
</div>
