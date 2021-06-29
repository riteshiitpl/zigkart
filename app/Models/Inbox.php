<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZigKart\Models\User;
use Auth;

use Illuminate\Support\Facades\DB;

class Inbox extends Model
{
    use HasFactory;

    protected $table ='inbox';

    protected $fillable = [
        'user_id',
        'vendor_id',
        'conversation_type',
        'customize_request_order_id',
    ];

    /*
        Get All vendor or user chat listing person like one user can talk mul vendor 
    */

    public static function has_all_data(){
        
        if(Auth::user()->user_type == 'vendor')
            $all_data  =  Self::where('vendor_id',Auth::id())->get();
        else
            $all_data  =  Self::where('user_id',Auth::id())->get();

        $all_data = $all_data->map(function($data){
            $data->user_info = Self::user_details($data->user_id);
            $data->vendor_info = Self::user_details($data->vendor_id);
            $data->last_msg = DB::table('inbox_message')->where('inbox_id',$data->id)->orderBy('id','DESC')->limit(1)->get();
            return $data;
        }); 

        return $all_data;

    }

    /*
        Get Single chat message between usern and vendor with their all dinfo details
    */

    public static function getInboxMessage($inbox_id){
        
        $all_data = DB::table('inbox')->where('id',$inbox_id)->get();

        $all_data = $all_data->map(function($data){
            $data->user_info = Self::user_details($data->user_id);
            $data->vendor_info = Self::user_details($data->vendor_id);
            $data->message = Self::allInboxMsg($data->id);
            return $data;
        });
        return $all_data;
    }

    /*
        Get All chat message between usern and vendor with their all dinfo details
    */


    public static function allInboxMsg($inbox_id){
        $all_data =  DB::table('inbox_message')->where('inbox_id',$inbox_id)->get();
        $all_data = $all_data->map(function($data){
            $data->receiver_info = Self::user_details($data->receiver_id);
            $data->sender_info = Self::user_details($data->sender_id);
            return $data;
        });
        // dd($all_data);
        return $all_data;
    }

    /*
        Get All unread message count from current user
    */

    public static function all_unread_msg()
    {
        $where = [
            'receiver_id'=>Auth::id(),
            'is_receiver_read'=>0,
        ]; 
        return DB::table('inbox_message')->where($where)->count();
    }

    /*
        Get All unread message count from current user
    */

    public static function message_store($column){
        return DB::table('inbox_message')->insertGetId($column);
    } 
    
    /*
        Get All user destilas in object
    */


    public static function user_details($user_id){

        return DB::table('users')->where('id',$user_id)->get()[0];
    
    }

    public static function update_is_read($inbox_id){
        DB::table('inbox_message')->where('inbox_id',$inbox_id)->where('receiver_id',Auth::id())->update([
            'is_receiver_read'=>1,
        ]);
        
        return 'true';
    }


}
