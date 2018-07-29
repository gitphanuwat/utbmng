<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;



use App\Http\Requests\EventRequest;

class EventController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {

      return view('event');
    }

    public function create()
    {
      $data = Event::orderby('startdate','desc')->get();
      //$data = Event::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>กิจกรรม</th>
        <th>วันที่</th>
        <th>พื้นที่ชุมชน</th>
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
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->title."</a></td>
          <td>".$key->startdate.'-'.$key->enddate."</td>
          <td> ".$key->organize->name."</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      $dataobj = array();
      $colors = array('','#0073b7','#f39c12','#00c0ef','#00a65a','#3c8dbc','#D79AE6');
      $obj = Event::get();
      foreach ($obj as $key) {
        $dataobj[] = array(
                     'id' => $key->id,
                     'title'=> $key->title,
                     'start'=> $key->startdate,
                     'end'=> $key->enddate,
                     'url'=> "event/$key->id",
                     'color'=> $colors[$key->type]
                     );
      }

      $data['display'] = $display;
      $data['data'] = $dataobj;
      return $data;
      return $display;
    }

    public function store(EventRequest $request)
    {

    }

    public function show($id)
    {
        $data = Event::find($id);
        return view('eventshow',compact('data'));
    }

    public function edit($id)
    {
      $type=array('','งานประจำปี','งานบริการชุมชน','ส่งเสริมท่องเที่ยว','งานประเพณี','ทำนุบำรุงศิลปะวัฒนธรรม','อื่นๆ');
      $data = Event::find($id);
      //$data = Group::get();
      $display="
      <div class='box-body'>
      <div class='pull-right box-tools'>
        <button type='button' class='btn btn-default btn-sm btncancel' title='ปิดหน้าต่าง'>
        <i class='fa fa-times'></i></button>
      </div>
        <div class='form-group'>
          <h3>".$data->title."</h3>
        </div>
        <div class='form-group'>";
        if($data->picture){
          $display.="<img class='img-responsive img-squar' src='".url("/images/event/".$data->picture)."' width='250'>";
        }
        $display.="</div>
        <div class='form-group'>
        </div>
        <div class='form-group'>
          <h5>ประเภท:".$type[$data->type]."</h5>
        </div>
        <div class='form-group' >
          <label>รายละเอียด</label>
          <blockquote>
            <p>".$data->detail."</p>
            <small>Someone famous in <cite title='Source Title'>Source Title</cite></small>
          </blockquote>
        </div>
        <div class='form-group'>
          <label>สถานที่จัด</label>
          <label>".$data->address."</label>
        </div>
        <div class='form-group'>
          <label>วันเริ่มต้น:</label>
          <label>".$data->startdate."</label>
        </div>
        <div class='form-group'>
          <label>วันสิ้นสุด:</label>
          <label>".$data->enddate."</label>
        </div>
        <div class='form-group'>
          <label>ข้อมูลติดต่อ</label>
          <label>".$data->contact."</label>
        </div>
      </div>
      ";
      return $display;
    }

    public function active()
    {
      $now = date('Y-m-d H:i:s');
      $data = Event::where('startdate','>',$now)->limit(5)->get();
      $display='';
      foreach ($data as $key) {
        $dd = date('d-m-Y', strtotime($key->startdate));
        $display.='
        <div class="clearfix">
          <span class="pull-left">'.$key->organize->name.'</span>
          <span class="pull-right">'.$dd.'</span>
        </div>
        <div>
          <a href="#">'.$key->title.'</a>
        </div>';
      }

      return $display;
    }

    public function update(EventRequest $request, $id)
    {}

    public function destroy($id)
    {}
}
