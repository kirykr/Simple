<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ComputerRequest extends Request
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
            //
           'name' => 'required|max:30',
           'sellprice' => 'required|numeric|min:1',
           'ppprice' => 'required|numeric|min:1',
           'provprice' => 'required|numeric|min:1',
           'status' => 'required|numeric|min:1',
           'brand_id' => 'required'
        ];
    }
}
