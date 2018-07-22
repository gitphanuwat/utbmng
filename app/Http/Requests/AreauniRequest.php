<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\Request;

class AreauniRequest extends Request
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
          'center_id'=>'required',
          'name'=>'required',
          'tambon'=>'required',
          'amphur'=>'required',
          'province'=>'required',
          'lat'=>'required',
          'lng'=>'required'
        ];
    }
    public function messages()
    {
    	return [
              'center_id.required'=>'ต้องเลือกศูนย์จัดการเครือข่าย',
              'name.required'=>'ต้องป้อนชื่อชุมชน',
              'tambon.required'=>'ต้องป้อนตำบล',
              'amphur.required'=>'ต้องป้อนอำเภอ',
              'province.required'=>'ต้องป้อนจังหวัด',
              'lat.required'=>'ต้องป้อนพิกัดละติจูด',
              'lng.required'=>'ต้องป้อนพิกัดลองจิจูด'
    	];
    }
}
