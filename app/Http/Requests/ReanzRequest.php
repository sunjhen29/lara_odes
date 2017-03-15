<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReanzRequest extends Request
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
            'listing_id' =>'required|numeric|unique:reanzs,listing_id',
            //'property_id' => 'required|alpha_num',
            'list_date' => 'required|date_format:d/m/Y',
            'site_area' => 'required|regex:/^[(SALE)(RENT)]+$/u',
            'property_address' => 'required',
            'auction_date' => 'date_format:d/m/Y',
        ];
    }
}
