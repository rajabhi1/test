`<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
     </div>
</section>
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                   <?php echo form_open('admin/update_cart'); ?>
                       <table class="table table-striped">
                             <thead>
                                <tr>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col" class="text-right">Item Price</th>
                                        <th scope="col" class="text-right">Sub-Total</th>
                                        <th scope="col"></th>
                                </tr>   
                             </thead>
                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>
                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                        <tr>
                                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>                                     
                                </td>
                                <td>
                                        <?php echo $items['name']; ?>
                                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                                <p>
                                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br/>
                                                        <?php endforeach; ?>
                                                </p>

                                        <?php endif; ?>
                                </td>
                                <td class="text-right">Rs. <?php echo $this->cart->format_number($items['price']); ?></td>
                                <td class="text-right">Rs. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                <td class="text-right"><a href="<?php echo base_url('admin/remove_cart');?>/<?php echo $items['rowid'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>

                <?php $i++; ?>

                <?php endforeach; ?>
                <div class="p-1">
                <tr>
                    <td colspan="2">
                        <?php echo form_submit('', 'Update your Cart',['class'=>'btn btn-outline-info']); ?>     
                    </td>
                    <td class="text-right"><strong>Total</strong></td>
                    <td class="text-right">Rs.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    <td></td>
                </tr>
                </div>
                </table>
                    </div>
                </div> 
        </div>  
        <div class="container">
                <div class="row">
                        <div class="col-lg-12">
                             <div class="btn-group d-flex">
                            <a href="javascript:window.history.go(-1);" class="btn btn-outline-secondary flex-fill">Continue Shopping</a>
                            <button class="btn  btn-success  flex-fill">Checkout</button>
                           </div>   
                        </div>
                </div>
        </div>
