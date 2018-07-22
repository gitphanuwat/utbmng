<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrganizeRequest extends Request
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
          //'university_id'=>'required',
          'title'=>'required',
          'name'=>'required'
          //'address'=>'required'
        ];
    }
    public function messages()
    {
    	return [
              //'university_id.required'=>'ต้องเลือกหน่วยงานมหาวิทยาลัย',
              'title.required'=>'ต้องป้อนชื่อหน่วยงานภาษาอังกฤษ',
              'name.required'=>'ต้องป้อนข้อมูลชื่อหน่วยงาน'
              //'address.required'=>'ต้องป้อนที่อยู่ศูนย์จัดการเครือข่าย'
    	];
    }
}
