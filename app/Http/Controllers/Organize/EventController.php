<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\Organize;

use App\Http\Requests\EventRequest;

class EventController extends Controller
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
      $ido = session('sess_org');
      $obj = Event::where('organize_id',$ido)->get();
      foreach ($obj as $key) {
        $url=url($key->id.'/event/'.$key->id);
        $dataobj[] = array(
                     'id' => $key->id,
                     'title'=> $key->title,
                     'start'=> $key->startdate,
                     'end'=> $key->enddate,
                     'url'=> $url,
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
        return view('organize.eventshow',compact('data'));
    }

    public function edit($id)
    {

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
