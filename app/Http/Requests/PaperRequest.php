<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaperRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'researcher_id'=>'required',
          'title'=>'required',
          'keyword'=>'required',
          'abstract'=>'required',
        ];
    }
    public function messages()
    {
    	return [
              'researcher_id.required'=>'ต้องเลือกผู้วิจัยในระบบ',
              'title.required'=>'กรุณาป้อนชื่อบทความวิชาการ',
              'keyword.required'=>'กรุณาป้อนคำสำคัญ',
              'abstract.required'=>'กรุณาป้อนบทคัยย่อ',
    	];
    }
}
