<h5>Customize order request : #{{$custom_data['customize_request_order_id']}}</h5>
<span><b>Product name :</b> {{ $custom_data['product_info']->product_name }}</span>
<br/>
<span><b>Want bulk quantity :</b> {{ $custom_data['quantity'] }}</span>

@if(!empty($custom_data['negotiate_price']))
<br/><span><b>Negotiate price range:</b> {{ $custom_data['negotiate_price'] }} </span>
@endif

@if(!empty($custom_data['message']))
<br/><span><b>Buyer comment:</b> {{ $custom_data['message'] }} </span>
@endif