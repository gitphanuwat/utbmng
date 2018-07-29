<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
use App\Complaint;



use App\Http\Requests\ComplaintRequest;

class ComplaintController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {
      $data = Complaint::where('permit','1')->get();
      return view('complaint',compact('data'));
    }

    public function create()
    {
      $data = Complaint::where('permit','1')->get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>เรื่องร้องเรียน</th>
        <th>ผู้ส่งข้อมูล</th>
        <th>สถานะ</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      foreach ($data as $key) {
        $i++;
        $display .= "
        <tr>
          <td>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->name."</a></td>
          <td> ".$key->sender."</td>
          <td>";
          if($key->status==1){$display .= "นำเข้าระบบ";}
          if($key->status==2){$display .= "กำลังดำเนินการ";}
          if($key->status==3){$display .= "ดำเนินการเสร็จสิ้น";}
            $display .= "</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(ComplaintRequest $request)
    {

    }

    public function show($id)
    {
      $arrtype=array('','ด้านการบริหารชุมชน','ด้านสวัสดิการ','ด้านสิ่งแวดล้อม','ด้านอื่นๆ');
      $arrstatus=array('','นำเข้าระบบ','กำลังดำเนินการ','ดำเนินการเสร็จสิ้น');
      $data = Complaint::find($id);
      //$data = Group::get();

      $display="
      <div class='pull-right box-tools'>
        <button type='button' class='btn btn-default btn-sm btncancel' title='ปิดหน้าต่าง'>
        <i class='fa fa-times'></i></button>
      </div>

      <blockquote>
        <p>เรื่องร้องเรียน</p>
        <small>".$data->name."</small>
        <small>".$arrtype[$data->type]."</small>
      </blockquote>
      <blockquote>
        <p>รายละเอียด</p>
        <small>".$data->detail."</small>
      </blockquote>
      <blockquote>
        <p>ข้อมูลติดต่อ</p>
        <small>".$data->sender."</small>
        <small>".$data->contact."</small>
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

    public function update(ComplaintRequest $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
