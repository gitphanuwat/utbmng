<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DocRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'title'=>'required',
          'filefield'=>'required',
          //'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
    public function messages()
    {
    	return [
              'title.required'=>'กรุณาป้อนชื่อไฟล์',
              'filefield.required'=>'กรุณาเลือกไฟล์เอกสาร',
    	];
    }
}
