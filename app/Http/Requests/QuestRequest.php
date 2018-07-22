<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'topic'=>'required',
          'detail'=>'required',
          'sender'=>'required',
          'email'=>'required|email',
          'check_users'=>'required',
        ];
    }
    public function messages()
    {
    	return [
              'topic.required'=>'กรุณาป้อนหัวข้อ',
              'detail.required'=>'กรุณาป้อนรายละเอียด',
              'sender.required'=>'กรุณาป้อนชื่อผู้ส่ง',
              'email.required'=>'กรุณาป้อนอีเมล์',
              'email.email'=>'ที่อยู่อีเมล์ไม่ถูกต้อง',
              'check_users.required'=>'กรุณาเลือกผู้รับข้อความ',
    	];
    }
}
