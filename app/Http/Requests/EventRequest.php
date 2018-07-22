<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'title'=>'required',
          'type'=>'required',
          'detail'=>'required'
        ];
    }
    public function messages()
    {
    	return [
        'title.required'=>'กรุณาป้อนหัวข้อ',
        'type.required'=>'กรุณาระบบกลุ่ม',
        'detail.required'=>'กรุณาป้อนรายละเอียด'
    	];
    }
}
