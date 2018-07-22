<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsefulRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'area_id'=>'required',
          'problem_id'=>'required',
          'title'=>'required',
          'detail'=>'required'
        ];
    }
    public function messages()
    {
    	return [
        'area_id.required'=>'กรุณาเลือกชุมชนเป้าหมาย',
        'problem_id.required'=>'กรุณาเลือกปัญหาที่ดำเนินการ',
        'title.required'=>'กรุณาหัวเรื่อง',
        'detail.required'=>'กรุณาป้อนรายละเอียด'
    	];
    }
}
