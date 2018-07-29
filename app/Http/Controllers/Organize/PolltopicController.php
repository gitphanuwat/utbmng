<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Polltopic;
use App\Pollanswer;
use App\Organize;

use App\Http\Requests\PolltopicRequest;

class PolltopicController extends Controller
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
      $data = Polltopic::where('organize_id',$ido)->get();
      //$data = Polltopic::where('organize_id',$ido)->get();
      return view('organize.polltopic',compact('data'));
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

    }

    public function edit($id)
    {
      $ido = session('sess_org');
      $data = Polltopic::where('organize_id',$ido)->orderby('id','dece')->first();
      //$data = Group::get();
      $display="
        <p>".$data->title."</p>";
        foreach ($data->pollanswer as $key) {
          $display.="<label><input type='radio' name='answer' value='".$key->id."' class='minimal'> ".$key->title."</label><br>";
        }
        $display.='<input type="hidden" id="idpoll" value="'.$data->id.'">';
        $display.='['.$data->organize->name.']';
      return $display;

    }

    public function update(Request $request, $id)
    {
      $ansid = $request['answer'];
      $data = Pollanswer::find($ansid);
      $data->score = $data->score+1;;
      $check = $data->save();
      if($check>0){return "- ส่งข้อมูลเรียบร้อบ -";}else{return "- Error -";}
    }

    public function destroy($id)
    {

    }
}
