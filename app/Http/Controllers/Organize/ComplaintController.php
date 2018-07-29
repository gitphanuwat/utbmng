<?php
namespace App\Http\Controllers\Organize;
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

     public function index($title)
     {
       $data = Organize::where('title',$title)->first();
       session(['sess_org' => $data->id]);
       session(['sess_orgname' => $data->name]);

      $ido = session('sess_org');
      $data = Complaint::where('organize_id',$ido)->where('permit','1')->get();
      return view('organize.complaint',compact('data'));
    }

    public function create()
    {
      $idu = session('sess_org');
      $data = Complaint::where('organize_id',$idu)->where('permit','1')->orderby('name')->get();
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
