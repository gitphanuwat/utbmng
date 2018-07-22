<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\Request;

class TouristRequest extends Request
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
          //'organize_id'=>'required',
          'name'=>'required',
          'address'=>'required'
        ];
    }
    public function messages()
    {
    	return [
              //'organize_id.required'=>'ต้องเลือกหน่วยงาน',
              'name.required'=>'ต้องป้อนชื่อ',
              'address.required'=>'ต้องป้อนที่อยู่'
    	];
    }
}
