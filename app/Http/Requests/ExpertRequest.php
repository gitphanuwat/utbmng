<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExpertRequest extends Request
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
          'area_id'=>'required',
          'headname'=>'required',
          'firstname'=>'required',
          'lastname'=>'required'
        ];
    }
    public function messages()
    {
    	return [
              'area_id.required'=>'ต้องเลือกพื้นที่ชุมชน',
              'headname.required'=>'ต้องป้อนคำนำหน้าชื่อ',
              'firstname.required'=>'ต้องป้อนชื่อผู้เชี่ยวชาญ',
              'lastname.required'=>'ต้องป้อนสกุลผู้เชี่ยวชาญ'
    	];
    }
}
