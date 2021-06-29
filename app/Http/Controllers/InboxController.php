<?php
namespace ZigKart\Http\Controllers;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;
use Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;

use ZigKart\Models\Coupon;
use ZigKart\Models\Settings;
use ZigKart\Models\Inbox;
use ZigKart\Models\Product;
use ZigKart\Models\CustomOrderRequest;
use ZigKart\Models\VendorQuotation;

use Carbon\Carbon;
use View;

use ZigKart\Helpers\Helper;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }

    public function index(){
        
        $data = array('list_data' => Inbox::has_all_data());
        return view('inbox')->with($data);
    }
    public function show(Request $request,$inbox_id){

        Inbox::update_is_read($inbox_id);

        $data = array('messageList' => Inbox::getInboxMessage($inbox_id));
        return view('inbox_message')->with($data);

    }  
    public function store(Request $request){
        $inbox_id = '';

        if($request->inbox_id =='new'){
            $where = [
                'user_id'=>$request->sender_id,
                'vendor_id'=>$request->receiver_id,
                'conversation_type'=>0,
                'customize_request_order_id'=>0,
            ];
            $res = Inbox::where($where)->get();
            if(sizeof($res)>0){
                $inbox_id = $res[0]->id;
            }else{
                $inbox_res = Inbox::create($where);
                // dd($inbox_res->id);
                $inbox_id = $inbox_res->id;
            }
        }else{
            $inbox_id = $request->inbox_id;
        }

        // dd($inbox_id);

        $column = $request->only('sender_id','receiver_id','message');
        $column['inbox_id'] = $inbox_id;
        $column['created_at'] = date('Y-m-d h:s');
        $column['is_receiver_read'] = 0;


        $res = Inbox::message_store($column);
        return redirect()->back()->with('success','Message Sent');
    } 

    public function customize_order_store(Request $request){
        
        // dd($request->all());

        /*
            store custom order request for cart future transaction if quote accepted
        */
        
        $customize_request_order_id =time();

        $CustomOrderRequest_data = [
            'customize_request_order_id'=>$customize_request_order_id,
            'user_id'=>$request->sender_id,
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'negotiate_price'=>$request->negotiate_price,
            'all_attribute'=>json_encode($request->product_attribute),
            'buyer_comment'=>$request->message,
            'extra_info'=>'',
            'status'=>'open',
        ];
        $custom = CustomOrderRequest::create($CustomOrderRequest_data);


        $inbox_id = '';
        if($request->inbox_id =='new'){
            $where = ['user_id'=>$request->sender_id,'vendor_id'=>$request->receiver_id,
            'conversation_type'=>1,'customize_request_order_id'=>$custom->id ];
            $res = Inbox::where($where)->get();
            if(sizeof($res)>0){
                $inbox_id = $res[0]->id;
            }else{
                // dd($where);
                $inbox_res = Inbox::create($where);
                $inbox_id = $inbox_res->id;
            }
        }else{
            $inbox_id = $request->inbox_id;
        }

        // view bind to message //
        $custom_data = $request->all();
        $custom_data['product_info'] = Product::where('product_id',$request->product_id)->first();
        $custom_data['customize_request_order_id'] = $customize_request_order_id;
        $message = View::make('component.customise_order_info',compact('custom_data'));

        $column = $request->only('sender_id','receiver_id');
        $column['inbox_id'] = $inbox_id;
        $column['message'] = $message->render();
        $column['created_at'] = date('Y-m-d h:s');
        $column['is_receiver_read'] = 0;
        Inbox::message_store($column);
        
        /*
            store custom order request for cart future transaction if quote accepted
        */
        
        $last_id = CustomOrderRequest::customer_customize_request_to_inbox([
            'customize_order_request_id'=>$custom->id,
            'inbox_id'=>$inbox_id,
            'user_id'=>$request->sender_id,
            'vendor_id'=>$request->receiver_id
        ]);

        return redirect()->back()->with('success','Customize order request sent successfully, please check your inbox to see seller reply');




    }

    public function vendor_quotation(Request $request){
        
        $quote_id = time();
        $quotation_data = $request->only('final_quantity','vendor_id');
        $quotation_data['comment'] = $request->message;
        $quotation_data['quote_id'] = $quote_id;
        $quotation_data['customize_request_order_id'] = $request->customize_request_order_id;
        $quotation_data['user_id'] = $request->message;
        $final_product_price = $final_sub_total =  0;

        if($request->final_price_type == 'fixed'){
            $final_product_price = (int)$request->final_quantity/(float)$request->final_price;
            $final_sub_total = (float)$request->final_price;
        }else{
            $final_sub_total = (int)$request->final_quantity*(float)$request->final_price;
            $final_product_price = (float)$request->final_price;
        }

        $quotation_data['final_price'] = $final_product_price;
        $quotation_data['final_sub_total'] = $final_sub_total;
        
        $quotation = VendorQuotation::create($quotation_data);

        $all_info = VendorQuotation::get_single_quote($quotation->id);
        $message = View::make('component.quotation_message',compact('all_info'));

        $column = $request->only('sender_id','receiver_id');
        $column['inbox_id'] = $request->inbox_id;
        $column['message'] = $message->render();
        $column['created_at'] = date('Y-m-d h:s');
        $column['is_receiver_read'] = 0;
        Inbox::message_store($column);

        return redirect()->back()->with('success','Quotation sent !');

    }
    public function quote_accept_or_reject(Request $request,$quote_id,$response){
        
        /* Only customer can accept or reject */

        if(Auth::user()->user_type != 'customer'){
            return redirect()->back()->with('success','Oops. You are not allowed to accept or reject any quote. you are not a customer.');
        }
        
        /* end Only customer can accept or reject */


        $alert_msg = '';
        $message = '<h5>Quote id: #'.$quote_id.'</h5>';

        $quote_d = VendorQuotation::where('quote_id',$quote_id)->first();
        $quote_details = VendorQuotation::get_single_quote($quote_d->id);
        $inbox_details = Inbox::where('customize_request_order_id',$quote_d->customize_request_order_id)->first();
        

        if($response == 'accept'){

            
            $array_data['quotation_status'] = 'accept';
            VendorQuotation::update_quote_status($array_data,$quote_d->id);

            /* store data to cart after accept */

            $response = Self::add_product_to_cart($quote_details);
            if($response == 'false'){
                return redirect()->back()->with('error','product quantity out of stock');
            }
            /* store car data */

            $message .= '<span><b>Quote Status: <span class="badge badge-success">Accepted</span></b></span>';
            $alert_msg = 'You accepted <b> quote id: #'.$quote_id.'</b>. Please check your cart accepted product added to your cart.';
        
        }else{

            $array_data['quotation_status'] = 'reject';
            VendorQuotation::update_quote_status($array_data,$quote_d->id);
            $message .= '<span><b>Quote Status: <span class="badge badge-warning">Rejected </span> </b></span>';
            $alert_msg = 'You rejected <b> quote id: #'.$quote_id.'</b>';

        }



        /*
            Send notification in chat. for vendor 

        */
        $column['sender_id'] = $inbox_details->user_id;
        $column['receiver_id'] = $inbox_details->vendor_id;
        $column['inbox_id'] = $inbox_details->id;
        $column['message'] = $message;
        $column['created_at'] = date('Y-m-d h:s');
        $column['is_receiver_read'] = 0;
        Inbox::message_store($column);

        return redirect()->back()->with('success',$alert_msg);


    }

    public static function add_product_to_cart($quote_details)
    {

        $request_order = $quote_details->customize_request_order_info;
        $product_info = $quote_details->customize_request_order_info->product_info;

        $allsettings = Settings::allSettings();
        $product_quantity = $quote_details->final_quantity;
        $token = Session::getId();
        
        if(!empty($request_order->all_attribute))
          {
              
              $attribute_id = "";
              $attribute_values = "";
              
              foreach(json_decode($request_order->all_attribute) as $prod_attribute)
              {
                 $split = explode("_", $prod_attribute);
                 $attribute_id .= $split[0].',';
                 $attribute_values .= $split[1].', ';
              }
              $product_attribute = rtrim($attribute_id,",");
              $product_attribute_values = rtrim($attribute_values,", ");
              
          }
      else
      {
         $product_attribute = "";
         $product_attribute_values = "";
      }

      $product_token = $product_info->product_token;
      $product_id = $product_info->product_id;
      
      $product_price = $quote_details->final_price; 

      $product_user_id = $quote_details->vendor_id; 
      
      $session_id = Session::getId();
      $product_stock = $product_info->product_stock;

      $order_status = 'pending';
      
      $savedata = array('session_id' => $session_id, 'product_id' => $product_id, 'product_user_id' => $product_user_id, 'product_token' => $product_token, 'token' => $token, 'quantity' => $product_quantity, 'product_attribute' => $product_attribute, 'product_attribute_values' => $product_attribute_values, 'price' => $product_price, 'order_status' => $order_status); 
      
      $updata = array('quantity' => $product_quantity, 'product_attribute' => $product_attribute, 'product_attribute_values' => $product_attribute_values, 'price' => $product_price);
      // dd($savedata);
      if($product_stock >= $product_quantity && $product_quantity > 0)
      {
         $check_order = Product::checkOrder($session_id,$product_token);
         if($check_order == 0)
         {
            Product::saveOrder($savedata);
            return 'true';
         }
         else
         {
            Product::updateOrder($session_id,$order_status,$product_token,$updata);
            return 'true';
         }
         
      }
      else
      {
         return 'false';
      }



    }






}