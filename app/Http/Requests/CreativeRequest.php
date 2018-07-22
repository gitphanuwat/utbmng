<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreativeRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'taggroup_id'=>'required',
          'isced_id'=>'required',
          'researcher_id'=>'required',
          'title'=>'required',
          'keyword'=>'required',
          'abstract'=>'required',
          'createyear'=>'required'
        ];
    }
    public function messages()
    {
    	return [
        'taggroup_id.required'=>'ต้องเลือกกลุ่มผลงาน',
        'isced_id.required'=>'ต้องเลือกสาขาวิชาการ',
        'researcher_id.required'=>'ต้องเลือกนักวิจัยในระบบ',
              'title.required'=>'กรุณาป้อนชื่อผลงานสร้างสรรค์',
              'keyword.required'=>'กรุณาป้อนคำสำคัญ',
              'abstract.required'=>'กรุณาป้อนบทคัยย่อ',
              'createyear.required'=>'ต้องป้อนปีที่ดำเนินการ'
    	];
    }
}
