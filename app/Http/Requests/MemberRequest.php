<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MemberRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'role_id'=>'required',
          'amphur_id'=>'required',
          'organize_id'=>'required',
          'village_id'=>'required',
          'headname'=>'required',
          'firstname'=>'required',
          'lastname'=>'required',
          'email'=>'required|email',
          'password'=>'required',
        ];
    }
    public function messages()
    {
    	return [
        'role_id.required'=>'กรุณาเลือกสิทธ์',
        'amphur_id.required'=>'กรุณาเลือกอำเภอ',
        'organize_id.required'=>'กรุณาเลือกหน่วยงาน',
        'village_id.required'=>'กรุณาเลือกชุมชน',
              'headname.required'=>'กรุณาป้อนคำนำหน้าชื่อ',
              'firstname.required'=>'กรุณาป้อนชื่อสมาชิก',
              'lastname.required'=>'กรุณาป้อนสกุลสมาชิก',
              'email.required'=>'กรุณาป้อนอีเมล์',
              'email.email'=>'กรุณาป้อนอีเมล์ในรูปแบบที่ถูกต้อง',
              'password.required'=>'กรุณาป้อนรหัสผ่าน',
    	];
    }
}
