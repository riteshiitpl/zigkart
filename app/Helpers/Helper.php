<?php

namespace ZigKart\Helpers;
use Cookie;
use Illuminate\Support\Facades\Crypt;
use ZigKart\Models\Languages;

use USPS\RatePackage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use ZigKart\Models\Product;

class Helper {
    
    public static function translation($id,$code) 
    {
	
	    if($code == 'en')
		{
		   $tran_value['view'] = Languages::en_Translate($id,$code);
		}
		else
		{
		  $tran_value['view'] = Languages::other_Translate($id,$code);
		}
		return $tran_value['view']->keyword_text;
        
    }
    public static function usps_domestic_shipping_price($ship_info=[])
    {
    	
    	$rate = new \USPS\Rate('772WOOWH5341');
		// During test mode this seems not to always work as expected
		//$rate->setTestMode(true);
		// Create new package object and assign the properties
		// apartently the order you assign them is important so make sure
		// to set them as the example below
		// set the RatePackage for more info about the constants
		$package = new RatePackage();
		$package->setService(RatePackage::SERVICE_PARCEL);
		$package->setFirstClassMailType(RatePackage::MAIL_TYPE_PARCEL);
		$package->setZipOrigination($ship_info['origination_zip']);
		$package->setZipDestination($ship_info['destination_zip']);
		$package->setPounds($ship_info['weight_pound']);
		$package->setOunces(0);
		$package->setContainer('');
		$package->setSize(RatePackage::SIZE_REGULAR);
		$package->setField('Machinable', true);

		// add the package to the rate stack
		$rate->addPackage($package);

		// Perform the request and print out the result
		$rate->getRate();
		
		if ($rate->isSuccess()) {
		    return $rate->getArrayResponse();
		} else {
		    return ['error'=>$rate->getErrorMessage()];
		}

    }
    public static function humanReadDate($date){
    	$today = Carbon::create(date('Y-m-d h:s'));
        $ago = $today->diffForHumans($date);
    	return $ago; 
    }

    public static function getProductPrice($quantity,$product_id){
    	$return_data = [];

    	$single_details = Product::where('product_status','=',1)
    						->where('product_id','=',$product_id)->first();
    	if($single_details){
    		if($single_details->product_price_type =='bulk_price'){
    			
    			$amount_array = $qnty_key =  []; $bulk_price=0;

    			for ($i=1; $i <= 6 ; $i++) { 
    				$product_price = 'product_price_'.$i;
    				$product_qty = 'product_qty_'.$i;
    				$amount_array[$single_details->$product_qty] = $single_details->$product_price;
    				$qnty_key[$i] = $single_details->$product_qty;
    			}
    			$key_match = 0;
    			foreach($amount_array as $key=>$amount){
    				if($key >= $quantity){
    					$bulk_price = $amount;
    					break;
    				}
    			}
    			if($bulk_price == 0){
    				$bulk_price = $amount_array[max($qnty_key)];
    			}

    			$return_data['single_product_price'] = (float)$bulk_price;
				$return_data['total_product_price'] = (int)$quantity*(float)$bulk_price;

    		}else{

    			$return_data['single_product_price'] = (float)$single_details->product_price;
				$return_data['total_product_price'] = (int)$quantity*(float)$single_details->product_price;
    			

    		}
    	}
    	return $return_data;
    }


}