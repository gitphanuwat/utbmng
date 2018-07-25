<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
use App\Tourist;


use App\Http\Requests\TouristRequest;

class TouristController extends Controller
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
      $data = Tourist::where('organize_id',$ido)->get();
      return view('organize.tourist',compact('data'));
    }

    public function create()
    {
      $idu = session('sess_org');
      $data = Tourist::where('organize_id',$idu)->get();
      //$data = Tourist::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>แหล่งท่องเที่ยว</th>
        <th>ที่อยู่</th>
        <th data-sortable='false' width='110'></th>
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
          <td> ".$key->address."</td>
          <td>";
          if($key->lat and $key->lng){
            $display .="<a class='btn btn-default bnmap' data-id='$key->id' href='#i' title='แสดงพิกัด'><i class='fa fa-map-marker'></i></a>";
          }
          if($key->website){
            $display .="<a class='btn btn-default' href='http://".$key->website."' title='เปิดเว็บไซต์'><i class='fa fa-internet-explorer'></i></a>";
          }
          $display .="</td>

        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(TouristRequest $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(TouristRequest $request, $id)
    {



    }

    public function destroy($id)
    {

    }
}
