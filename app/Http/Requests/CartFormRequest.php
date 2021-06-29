<?php

namespace ZigKart\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ZigKart\Rules\Pincodeverify;

class CartFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bill_postcode'=>['required','numeric',new Pincodeverify ],  
        ];
    }
}
