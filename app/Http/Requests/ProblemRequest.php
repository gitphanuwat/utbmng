<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProblemRequest extends Request
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
        'name.required'=>'กรุณาป้อนหัวข้อปัญหา',
        'type.required'=>'กรุณาระบบกลุ่มปัญหา',
        'detail.required'=>'กรุณาป้อนรายละเอียดปัญหา'
    	];
    }
}
