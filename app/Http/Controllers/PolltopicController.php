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
        <th>หน่วยงาน</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      $arrtype=array('','การพัฒนาและส่งเสริม','การดูแลและป้องกัน','การให้บริการชุมชน','ด้านความเดือดร้อน','ด้านอื่นๆ');
      foreach ($data as $key) {
          //$ans = Pollanswer::where('polltopic_id',$key->id)->get();
        $i++;
        $display .= "
        <tr>
          <td>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->title." (".$key->pollanswer->count()." หัวข้อ)</a></td>
          <td>".$arrtype[$key->type]."</td>
            <td>".$key->organize->name."</a></td>
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
      $arrtype=array('','การพัฒนาและส่งเสริม','การดูแลและป้องกัน','การให้บริการชุมชน','ด้านความเดือดร้อน','ด้านอื่นๆ');
      $data = Polltopic::find($id);
      //$data = Group::get();
      $display="
      <div class='pull-right box-tools'>
        <button type='button' class='btn btn-default btn-sm btncancel' title='ปิดหน้าต่าง'>
        <i class='fa fa-times'></i></button>
      </div>

      <blockquote>
        <p>".$data->title."</p>
        <small>".$arrtype[$data->type]."</small>
        <small>".$data->detail."</small>
      <ul>";
      foreach ($data->pollanswer as $key) {
        $display.="<li>".$key->title."(".$key->score." คะแนน)</li>";
      }
        $display.="</ul>
      </blockquote>
      ";
      return $display;
    }

    public function bntopic($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(PolltopicRequest $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
