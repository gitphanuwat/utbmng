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
      $data = Polltopic::get();
      //$data = Polltopic::where('organize_id',$ido)->get();
      return view('polltopic',compact('data'));
    }

    public function create()
    {
      $data = Polltopic::get();
      //$data = Polltopic::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ชื่อแบบสำรวจ</th>
        <th>หมวดหมู่</th>
        <th width='130'>หัวข้อคำถาม</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      $arrstatus=array('','การพัฒนาและส่งเสริม','การดูแลและป้องกัน','การให้บริการชุมชน','ด้านความเดือดร้อน','ด้านอื่นๆ');
      foreach ($data as $key) {
          //$ans = Pollanswer::where('polltopic_id',$key->id)->get();
        $i++;
        $display .= "
        <tr>
          <td>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->title."</a></td>
          <td>".$arrtype[$key->type]."</td>
            <td></td>
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
