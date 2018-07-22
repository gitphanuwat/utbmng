<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PollanswerRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'titletopic'=>'required',
          'detailtopic'=>'required'
        ];
    }
    public function messages()
    {
    	return [
        'titletopic.required'=>'กรุณาป้อนหัวข้อ2',
        'detailtopic.required'=>'กรุณาป้อนรายละเอียด2'
    	];
    }
}
