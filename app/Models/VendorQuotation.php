<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZigKart\Models\User;
use ZigKart\Models\CustomOrderRequest;
use Auth;

use Illuminate\Support\Facades\DB;

class VendorQuotation extends Model
{
    use HasFactory;

    protected $table ='vendor_quotation';

    protected $fillable = [
        'quote_id',
        'user_id',
        'vendor_id',
        'customize_request_order_id',
        'final_quantity',
        'final_price',
        'final_sub_total',
        'comment',
        'quotation_status',
    ];

    public static function get_single_quote($quote_id){
        $quote = Self::find($quote_id);
        if($quote !== null){
            $quote->customize_request_order_info = CustomOrderRequest::get_custom_order_details($quote->customize_request_order_id);
        }
        return $quote;

    }

    public static function update_quote_status($array_data = [],$updated_id){
        return Self::where('id',$updated_id)->update($array_data);
    }




}
