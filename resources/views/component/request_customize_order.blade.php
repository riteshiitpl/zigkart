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
        @if(Auth::guest())
          <p>Please Login First</p>
          <a href="{{ URL::to('/login') }}"><button type="button" value="login" class="btn btn-primary">Login</button> </a>
        @else
          <form id="customize_order_form" method="post" action="{{ route('customize.order.store') }}"  enctype="multipart/form-data">
              @csrf
            <label>Quantity</label>
            <input type="text" name="quantity" value="" class="form-control" placeholder="Enter Quantity" required>
            <br/>
            <label>Nogotiate Price</label>
            <input type="text" name="negotiate_price" value="" class="form-control" placeholder="Enter negotiate price if you want">
            <br/>
          @if(count($attributer['display']) != 0)
           @foreach($attributer['display'] as $attribute)
              <label>{{ $attribute->attribute_name }}</label>
              <select name="product_attribute[]" class="form-control" required>
                 <option value="" data-price-effect="0">Select {{$attribute->attribute_name}}</option>
                 @foreach($attribute->attributeagain as $product_value)
                 @if(in_array($product_value->attribute_value_id,$product_attr))
                 <option value="{{ $product_value->attribute_value_id }}_{{ $attribute->attribute_name }} - {{ $product_value->attribute_value }}" data-price-effect="{{ $product_value->attribute_value_price }}">{{ $product_value->attribute_value }}</option>@endif
                 @endforeach
             </select>
             <br>
           @endforeach
           @endif
          
          <label>Comment</label>
          <textarea name="message" class="form-control" id="" cols="45" rows="3" placeholder="{{ Helper::translation(2928,$translate) }}" data-bvalidator="required" placeholder="Enter comment.."></textarea><br>
          
          <input type="hidden" name="product_id" value="{{ $shop->product_id }}">
          <input type="hidden" name="receiver_id" id="seller_id" value="{{ $seller->id }}">
          <input type="hidden" name="sender_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="inbox_id" value="new">
          
           <input type="submit" value="Send a request" class="btn button-color btn-sm px-4 py-2"> 


           </form>
         @endif
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
  //       url:"{{ url('signupProcess') }}",
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
</script>