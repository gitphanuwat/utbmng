<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExpertlistRequest extends Request
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
          'taggroup_id'=>'required',
          'isced_id'=>'required',
          'title_th'=>'required',
          'title_eng'=>'required',
        ];
    }
    public function messages()
    {
    	return [
              'taggroup_id.required'=>'ต้องเลือกกลุ่มความเชี่ยวชาญ',
              'isced_id.required'=>'ต้องเลือกสาขาความเชี่ยวชาญ',
              'title_th.required'=>'ต้องป้อนความเชี่ยวชาญเป็นภาษาไทย',
              'title_eng.required'=>'ต้องป้อนความเชี่ยวชาญเป็นภาษาอังกฤษ',
    	];
    }
}
