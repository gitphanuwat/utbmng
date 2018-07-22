<?php
namespace App\Http\Controllers\Organize;
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

      return view('organize.event');
    }

    public function create()
    {
      $idu = session('sess_org');
      $data = Event::where('organize_id',$idu)->get();
      //$data = Event::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ปัญหาชุมชน</th>
        <th>พื้นที่ชุมชน</th>
        <th width='130' data-sortable='false'>ดำเนินการ</th>
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
          <td>$key->title</td>
          <td> ".$key->address."</td>
          <td><a data-id='$key->id' href='#j' class='btn btn-primary btn-xs edit'>แก้ไข</a> <a data-id='$key->id' href='#' class='btn btn-danger btn-xs delete'>ลบข้อมูล</a></td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      $dataobj = array();
      $colors = array('','#0073b7','#f39c12','#00c0ef','#00a65a','#3c8dbc','#D79AE6');
      $ido = session('sess_org');
      $obj = Event::where('organize_id',$ido)->get();
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
      if($fileobj = $request->file('picture')){
        $extension = $fileobj->getClientOriginalExtension();
        $filename = $fileobj->getFilename().'.'.$extension;
        $destinationPath = 'images/event';
        $fileobj->move($destinationPath,$filename);
      }else{
        $filename='';
      }
      $entry = new Event();
      $entry->organize_id = $request->input('organize_id');
      $entry->user_id = $request->input('user_id');
      $entry->title = $request->input('title');
      $entry->type = $request->input('type');
      $entry->detail = $request->input('detail');
      $entry->address = $request->input('address');
      $entry->startdate = $request->input('startdate');
      $entry->enddate = $request->input('enddate');
      $entry->repeat = $request->input('repeat');
      $entry->contact = $request->input('contact');
      $entry->picture = $filename;
      $check = $entry->save();
  $data['file'] = $filename;
  $data['check'] = $check;
  return $data;
    }

    public function show($id)
    {
        $data = Event::find($id);
        return view('organize.eventshow',compact('data'));
    }

    public function edit($id)
    {
      $data = Event::find($id);
      if($data->organize_id == session('sess_org')){
        header("Content-type: text/x-json");
        echo json_encode($data);
        exit();
      }
      abort(0);
    }
    public function update(EventRequest $request, $id)
    {}

    public function eventupdate(EventRequest $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
