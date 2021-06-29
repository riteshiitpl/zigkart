<!-- ---------------modal customize order ------------------ -->

<div class="modal fade" id="vendor_quotation" tabindex="-1" role="dialog" aria-labelledby="vendor_quotation"
  aria-hidden="true">
  <div class="modal-dialog" role="vendor_quotation">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create quotation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="customize_order_form" method="post" action="<?php echo e(route('vendor_quotation')); ?>"  enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
        
          <label>Final Quantity</label>
          <input type="text" name="final_quantity" value="" class="form-control" placeholder="Enter Final Quantity" required>
          <br/>
          <label>Final price</label>
          <input type="text" name="final_price" value="" class="form-control" style="width:80%" placeholder="Enter Final">
          
          <select name="final_price_type" class="form-control" style="width:20%;float: right;margin-top: -38px;">
            <option value="fixed">Fixed</option>
            <option value="per">Per</option>
          </select>
          <br/>
        
          <label>Term & condition</label>
          <textarea name="message" class="form-control" id="" cols="45" rows="3" placeholder="<?php echo e(Helper::translation(2928,$translate)); ?>" data-bvalidator="required" placeholder="Enter comment.."></textarea><br>
          
          <input type="hidden" name="sender_id" value="<?php echo e(Auth::user()->id); ?>">
          <input type="hidden" name="inbox_id" value="<?php echo e($messageList[0]->id); ?>">
          <?php if(Auth::user()->user_type == 'customer'): ?>
              <input type="hidden" name="receiver_id" value="<?php echo e($messageList[0]->vendor_id); ?>">
          <?php else: ?>
              <input type="hidden" name="receiver_id" value="<?php echo e($messageList[0]->user_id); ?>">
          <?php endif; ?>

          <input type="hidden" name="vendor_id" value="<?php echo e(Auth::user()->id); ?>">
          <input type="hidden" name="customize_request_order_id" value="<?php echo e($messageList[0]->customize_request_order_id); ?>">

          
           <input type="submit" value="Create quotation and send to customer" class="btn button-color btn-sm px-4 py-2"> 


           </form>
      </div>
      
    </div>
  </div>
</div>
<?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/component/vendor_quotation.blade.php ENDPATH**/ ?>