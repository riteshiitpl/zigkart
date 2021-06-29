<h5>Customize order request : #<?php echo e($custom_data['customize_request_order_id']); ?></h5>
<span><b>Product name :</b> <?php echo e($custom_data['product_info']->product_name); ?></span>
<br/>
<span><b>Want bulk quantity :</b> <?php echo e($custom_data['quantity']); ?></span>

<?php if(!empty($custom_data['negotiate_price'])): ?>
<br/><span><b>Negotiate price range:</b> <?php echo e($custom_data['negotiate_price']); ?> </span>
<?php endif; ?>

<?php if(!empty($custom_data['message'])): ?>
<br/><span><b>Buyer comment:</b> <?php echo e($custom_data['message']); ?> </span>
<?php endif; ?><?php /**PATH E:\ritesh\htdocs\Office\office\office\zigkart\zigkart\resources\views/component/customise_order_info.blade.php ENDPATH**/ ?>