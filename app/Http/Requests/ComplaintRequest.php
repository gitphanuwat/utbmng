<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ComplaintRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name'=>'required',
          'type'=>'required',
          'detail'=>'required'
        ];
    }
    public function messages()
    {
    	return [
        'name.required'=>'กรุณาป้อนหัวข้อ',
        'type.required'=>'กรุณาเลือกประเภท',
        'detail.required'=>'กรุณาป้อนรายละเอียด'
    	];
    }
}
