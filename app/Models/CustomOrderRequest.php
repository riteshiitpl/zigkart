<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZigKart\Models\User;
use Auth;

use Illuminate\Support\Facades\DB;

class CustomOrderRequest extends Model
{
    use HasFactory;

    protected $table ='customize_order_request';

    protected $fillable = [
        'customize_request_order_id',
        'user_id',
        'product_id',
        'quantity',
        'negotiate_price',
        'all_attribute',
        'buyer_comment',
        'extra_info',
        'status',
    ];

    /*
        Get All vendor or user chat listing person like one user can talk mul vendor 
    */

    public static function customer_customize_request_to_inbox($data){
        return DB::table('customer_customize_request_to_inbox')->insertGetId($data);
    }

    public static function get_custom_order_details($custom_request_id){
        $custom = Self::find($custom_request_id);
        if($custom !== null){
            $custom->product_info = Product::where('product_id',$custom->product_id)->first();
        }
        return $custom;
    }


}
