<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResearchRequest extends Request
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
          'title_th'=>'required',
          'title_eng'=>'required',
          'propose'=>'required',
          'keyword'=>'required',
          'abstract'=>'required',
          'createyear'=>'required'
        ];
    }
    public function messages()
    {
    	return [
              'taggroup_id.required'=>'ต้องเลือกกลุ่มงานวิจัย',
              'isced_id.required'=>'ต้องเลือกสาขางานวิจัย',
              'researcher_id.required'=>'ต้องเลือกผู้วิจัยในระบบ',
              'title_th.required'=>'ต้องป้อนชื่องานวิจัย(ภาษาไทย)',
              'title_eng.required'=>'ต้องป้อนชื่องานวิจัย(ภาษาอังกฤษ)',
              'propose.required'=>'ต้องป้อนวัตถุประสงค์นักวิจัย',
              'keyword.required'=>'ต้องป้อนคำสำคัญ',
              'abstract.required'=>'ต้องป้อนบทคัดย่อ',
              'createyear.required'=>'ต้องป้อนปีที่ดำเนินการวิจัย'
    	];
    }
}
