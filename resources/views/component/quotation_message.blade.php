<h5>Quotation : #{{ $all_info->quote_id }}</h5>
<span><b>Product name :</b> {{ $all_info->customize_request_order_info->product_info->product_name }}</span>
<br/>
<span><b>Final quantity :</b> {{ $all_info->final_quantity }}</span>
<br/>
<span><b>Final price :</b> ${{ $all_info->final_sub_total }}</span>
<br/>
<span><b>Term & condition :</b> {{ $all_info->comment }}</span>
<br/>
<br/>
<a href="{{ route('quote_accept_or_reject',['quote'=>$all_info->quote_id, 'response'=>'accept'])}}" class="btn btn-success btn-sm">Accept</a>
<a href="{{ route('quote_accept_or_reject',['quote'=>$all_info->quote_id, 'response'=>'reject'])}}" class="btn btn-danger btn-sm">Reject</a>

