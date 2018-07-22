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
          'taggroup_id'=>'required',
          'title'=>'required',
          'detail'=>'required',
          'usearea'=>'required',
          'keyman'=>'required',
        ];
    }
    public function messages()
    {
    	return [
        'taggroup_id.required'=>'กรุณาเลือกกลุ่มปัญหา',
        'title.required'=>'กรุณาหัวเรื่อง',
        'detail.required'=>'กรุณาป้อนรายละเอียด',
        'usearea.required'=>'กรุณาป้อนพื้นที่ดำเนินการ',
        'keyman.required'=>'กรุณาป้อนผู้ประสานงาน',
    	];
    }
}
