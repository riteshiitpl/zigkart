<!-- ---------------modal customize order ------------------ -->

<div class="modal fade" id="customizeOrderModal" tabindex="-1" role="dialog" aria-labelledby="customizeOrderModal"
  aria-hidden="true">
  <div class="modal-dialog" role="customizeOrderModal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send a customize order request to seller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(Auth::guest()): ?>
          <p>Please Login First</p>
          <a href="<?php echo e(URL::to('/login')); ?>"><button type="button" value="login" class="btn btn-primary">Login</button> </a>
        <?php else: ?>
          <form id="customize_order_form" method="post" action="<?php echo e(route('customize.order.store')); ?>"  enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
            <label>Quantity</label>
            <input type="text" name="quantity" value="" class="form-control" placeholder="Enter Quantity" required>
            <br/>
            <label>Nogotiate Price</label>
            <input type="text" name="negotiate_price" value="" class="form-control" placeholder="Enter negotiate price if you want">
            <br/>
          <?php if(count($attributer['display']) != 0): ?>
           <?php $__currentLoopData = $attributer['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <label><?php echo e($attribute->attribute_name); ?></label>
              <select name="product_attribute[]" class="form-control" required>
                 <option value="" data-price-effect="0">Select <?php echo e($attribute->attribute_name); ?></option>
                 <?php $__currentLoopData = $attribute->attributeagain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if(in_array($product_value->attribute_value_id,$product_attr)): ?>
                 <option value="<?php echo e($product_value->attribute_value_id); ?>_<?php echo e($attribute->attribute_name); ?> - <?php echo e($product_value->attribute_value); ?>" data-price-effect="<?php echo e($product_value->attribute_value_price); ?>"><?php echo e($product_value->attribute_value); ?></option><?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
             <br>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
          
          <label>Comment</label>
          <textarea name="message" class="form-control" id="" cols="45" rows="3" placeholder="<?php echo e(Helper::translation(2928,$translate)); ?>" data-bvalidator="required" placeholder="Enter comment.."></textarea><br>
          
          <input type="hidden" name="product_id" value="<?php echo e($shop->product_id); ?>">
          <input type="hidden" name="receiver_id" id="seller_id" value="<?php echo e($seller->id); ?>">
          <input type="hidden" name="sender_id" value="<?php echo e(Auth::user()->id); ?>">
          <input type="hidden" name="inbox_id" value="new">
          
           <input type="submit" value="Send a request" class="btn button-color btn-sm px-4 py-2"> 


           </form>
         <?php endif; ?>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<script type="text/javascript">
  // $('#customize_order_form').on('submit', function(event){
  //   // event.preventDefault();

  //   $.ajax({
  //       url:"<?php echo e(url('signupProcess')); ?>",
  //       method:"POST",
  //       data:new FormData(this),
  //       dataType:'JSON',
  //       contentType: false,
  //       cache: false,
  //       processData: false,
  //       success:function(data)
  //       {
  //         console.log(data);
  //       },
  //       error:function(error){

  //       }
  //   })

  // });
</script><?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/component/request_customize_order.blade.php ENDPATH**/ ?>