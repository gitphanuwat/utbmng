<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PolltopicRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'title'=>'required',
          'detail'=>'required'
        ];
    }
    public function messages()
    {
    	return [
        'title.required'=>'กรุณาป้อนหัวข้อ',
        'detail.required'=>'กรุณาป้อนรายละเอียด'
    	];
    }
}
