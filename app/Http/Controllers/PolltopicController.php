<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Polltopic;
use App\Pollanswer;

use App\Http\Requests\PolltopicRequest;

class PolltopicController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {
      $ido = session('sess_org');
      $data = Polltopic::where('organize_id',$ido)->get();
      //$data = Polltopic::where('organize_id',$ido)->get();
      return view('polltopic',compact('data'));
    }

    public function create()
    {
      $idu = session('sess_org');
      $data = Polltopic::where('organize_id',$idu)->get();
      //$data = Polltopic::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ชื่อแบบสำรวจ</th>
        <th>หมวดหมู่</th>
        <th width='130'>หัวข้อคำถาม</th>
        <th width='130' data-sortable='false'>ดำเนินการ</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      foreach ($data as $key) {
          $ans = Pollanswer::where('polltopic_id',$key->id)->get();
        $i++;
        $display .= "
        <tr>
          <td>$i</td>
          <td>$key->title</td>
          <td>";
          if($key->type==1){$display .= "ด้านการพัฒนาและส่งเสริม";}
          if($key->type==2){$display .= "การดูแลและป้องกัน";}
          if($key->type==3){$display .= "ด้านการให้บริการ";}
          if($key->type==4){$display .= "ด้านอื่นๆ";}
            $display .= "</td>
            <td><a data-id='$key->id' href='#k' class='btn btn-success btn-xs bntopic'>".count($ans)." หัวข้อ</a></td>
          <td><a data-id='$key->id' href='#j' class='btn btn-primary btn-xs edit'>แก้ไข</a> <a data-id='$key->id' href='#' class='btn btn-danger btn-xs delete'>ลบข้อมูล</a></td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(PolltopicRequest $request)
    {

    }

    public function show($id)
    {
        //$obj = Polltopic::find($id);
        //dd($obj);
    }

    public function bntopic($id)
    {
      $data = Pollanswer::find($id);
        header("Content-type: text/x-json");
        echo json_encode($data);
        exit();
    }

    public function edit($id)
    {

      $data = Polltopic::find($id);
        header("Content-type: text/x-json");
        echo json_encode($data);
        exit();

    }

    public function update(PolltopicRequest $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
