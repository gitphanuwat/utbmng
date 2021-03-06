<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
use App\Problem;



use App\Http\Requests\ProblemRequest;

class ProblemController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {
      $data = Problem::get();
      return view('problem',compact('data'));
    }

    public function create()
    {
      $data = Problem::get();
      //$data = Problem::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ปัญหาชุมชน</th>
        <th>กลุ่มปัญหา</th>
        <th>พื้นที่ชุมชน</th>
        <th>สถานะ</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      $arrtype=array('','โครงสร้างพื้นฐานชุมชน','อาชีพและการมีงานทำ','สุขภาพและความปลอดภัย','ความรู้และการศึกษา','ความเข้มแข็งของชุมชน','ทรัพยากรธรรมชาติและสิ่งแวดล้อม','เรื่องอื่นๆ');
      $arrstatus=array('','นำเข้าระบบ','กำลังดำเนินการ','ดำเนินการแล้วเสร็จ');
      foreach ($data as $key) {
        $i++;
        $display .= "
        <tr>
          <td>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->name."</a></td>
          <td>".$arrtype[$key->type]."</td>
          <td> ".$key->organize->name."</td>
          <td>".$arrstatus[$key->status]."</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(ProblemRequest $request)
    {
      $obj = new Problem();
      $obj->organize_id = $request['organize_id'];
      $obj->name = $request['name'];
      $obj->type = '7';
      $obj->detail = $request['detail'];
      $obj->sender = $request['sender'];
      $obj->status = '1';
      $check = $obj->save();
      if($check>0){return "<div class='alert alert-success'>- ส่งข้อมูลเรียบร้อย -</div><br><br>";}else{return "- Error -";}
    }

    public function show($id)
    {
      $arrtype=array('','โครงสร้างพื้นฐานชุมชน','อาชีพและการมีงานทำ','สุขภาพและความปลอดภัย','ความรู้และการศึกษา','ความเข้มแข็งของชุมชน','ทรัพยากรธรรมชาติและสิ่งแวดล้อม','เรื่องอื่นๆ');
      $arrstatus=array('','นำเข้าระบบ','กำลังดำเนินการ','ดำเนินการแล้วเสร็จ');
      $data = Problem::find($id);
      //$data = Group::get();
      $display="
      <div class='pull-right box-tools'>
        <button type='button' class='btn btn-default btn-sm btncancel' title='ปิดหน้าต่าง'>
        <i class='fa fa-times'></i></button>
      </div>

      <blockquote>
        <p>ชื่อเรื่อง</p>
        <small>".$data->name."</small>
        <small>".$arrtype[$data->type]."</small>
      </blockquote>
      <blockquote>
        <p>รายละเอียด</p>
        <small>".$data->detail."</small>
      </blockquote>
      <blockquote>
        <p>ที่อยู่</p>
        <small>".$data->address."</small>
      </blockquote>
      <blockquote>
        <p>สถานะ</p>
        <small>".$arrstatus[$data->status]."</small>
      </blockquote>
      ";
      return $display;
    }

    public function edit($id)
    {
    }

    public function update(ProblemRequest $request, $id)
    {
    }

    public function destroy($id)
    {

    }
}
