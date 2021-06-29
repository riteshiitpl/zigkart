<h5>Quotation : #<?php echo e($all_info->quote_id); ?></h5>
<span><b>Product name :</b> <?php echo e($all_info->customize_request_order_info->product_info->product_name); ?></span>
<br/>
<span><b>Final quantity :</b> <?php echo e($all_info->final_quantity); ?></span>
<br/>
<span><b>Final price :</b> $<?php echo e($all_info->final_sub_total); ?></span>
<br/>
<span><b>Term & condition :</b> <?php echo e($all_info->comment); ?></span>
<br/>
<br/>
<a href="<?php echo e(route('quote_accept_or_reject',['quote'=>$all_info->quote_id, 'response'=>'accept'])); ?>" class="btn btn-success btn-sm">Accept</a>
<a href="<?php echo e(route('quote_accept_or_reject',['quote'=>$all_info->quote_id, 'response'=>'reject'])); ?>" class="btn btn-danger btn-sm">Reject</a>

<?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/component/quotation_message.blade.php ENDPATH**/ ?>