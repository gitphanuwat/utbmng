<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DownloadRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'title'=>'required',
          'detail'=>'required'
        ];
    }
    public function messages()
    {
    	return [
        'title.required'=>'กรุณาป้อนหัวเรื่อง',
        'detail.required'=>'กรุณาป้อนรายละเอียด'
    	];
    }
}
