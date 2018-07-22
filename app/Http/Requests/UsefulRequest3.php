<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResearcherRequest extends Request
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
          'university_id'=>'required',
          'headname'=>'required',
          'firstname'=>'required',
          'lastname'=>'required'
        ];
    }
    public function messages()
    {
    	return [
              'university_id.required'=>'ต้องเลือกมหาวิทยาลัย',
              'headname.required'=>'ต้องป้อนคำนำหน้าชื่อ',
              'firstname.required'=>'ต้องป้อนชื่อนักวิจัย',
              'lastname.required'=>'ต้องป้อนสกุลนักวิจัย'
    	];
    }
}
