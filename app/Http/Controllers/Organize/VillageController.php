<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
use App\Village;


use App\Http\Requests\VillageRequest;

class VillageController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {
      $ido = session('sess_org');
      $data = Village::where('organize_id',$ido)->get();
      return view('organize.village',compact('data'));
    }

    public function create()
    {
      $ido = session('sess_org');
      $data = Village::where('organize_id',$ido)->get();
      //$data = Village::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ชื่อชุมชน</th>
        <th>ที่อยู่</th>
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
          <td>$key->name</td>
          <td> ".$key->address."</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(VillageRequest $request)
    {

    }

    public function show($id)
    {
        //$obj = Village::find($id);
        //dd($obj);
    }

    public function edit($id)
    {
      $data = Village::find($id);
        header("Content-type: text/x-json");
        echo json_encode($data);
        exit();
    }

    public function update(VillageRequest $request, $id)
    {


    }

    public function destroy($id)
    {
    }
}
