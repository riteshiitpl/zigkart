<?php

namespace ZigKart\Rules;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Support\Facades\Http;

class Pincodeverify implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $url = 'https://api.worldpostallocations.com/pincode?postalcode='.$value.'&countrycode=US';

        
        $response = Http::get($url);
        $body = json_decode($response->body());

        if($body->status){
            if(!empty($body->result)){
                if($body->result[0]->country == 'US')
                    return true;
                else
                    return false;
            }
        }else{
            return false;
        }
        



        // return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The post code must be US, currently we delivery only in US.';
    }
}
