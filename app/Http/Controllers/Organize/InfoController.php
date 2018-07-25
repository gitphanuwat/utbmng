<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Info;
use App\Organize;
use App\Http\Requests\InfoRequest;

class InfoController extends Controller
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

        return view('organize.info');
    }

    public function create()
    {
      $id = session('sess_org');
      $data = Info::where('organize_id',$id)->orderby('day', 'desc')->get();
      //$data = Info::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th>ลำดับ</th>
          <th>ชื่อเรื่อง</th>
          <th>หน่วยงาน</th>
          <th>วันที่</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      foreach ($data as $key) {
        $i++;
        $display .= "
        <tr>
          <td width='50'>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->title."</a></td>
          <td>".$key->organize->name."</td>
          <td>$key->day</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(InfoRequest $request)
    {
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    }

    public function infoupdate(InfoRequest $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
