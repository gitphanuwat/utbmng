<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\Request;

class ChangePasswordRequest extends Request {


    public function authorize() {
        Session::put('profile_tab', 'password');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6'
        ];
    }
    public function messages()
    {
    	return [
              'old_password.required'=>'กรุณาป้อนรหัสผ่านเดิม',
              'new_password.confirmed'=>'รหัสผ่านใหม่ไม่ตรงกัน',
              'new_password.required'=>'กรุณาป้อนรหัสผ่านใหม่',
              'new_password_confirmation.required'=>'กรุณายืนยันรหัสผ่านใหม่'
    	];
    }
}
