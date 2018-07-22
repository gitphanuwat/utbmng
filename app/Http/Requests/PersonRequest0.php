<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonRequest extends Request
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
        'headname'=>'required',
        'firstname'=>'required',
        'lastname'=>'required'
      ];
    }
    public function messages()
    {
    	return [
        'headname.required'=>'ต้องป้อนคำนำหน้าชื่อ',
        'firstname.required'=>'ต้องป้อนชื่อ',
        'lastname.required'=>'ต้องป้อนสกุล'
    	];
    }
}
