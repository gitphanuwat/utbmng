<?php
namespace App\Http\Controllers;
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
      $data = Village::get();
      return view('village',compact('data'));
    }

    public function create()
    {
      $data = Village::get();
      //$data = Village::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ชื่อชุมชน</th>
        <th>ผู้นำชุมชน</th>
        <th>สังกัดหน่วยงาน</th>
        <th>ประชากร</th>
        <th>พิกัด</th>
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
          <td>$key->leader</td>
          <td>".$key->organize->name."</td>
          <td>$key->people</td>
          <td>";
          if($key->lat and $key->lng){
            $display .="<a class='btn btn-default btn-xs bndetail' data-id='$key->id' href='#i'><i class='fa fa-map-marker'></i></a>";
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

    public function store(VillageRequest $request)
    {

    }

    public function show($id)
    {
        $data = Village::find($id);
        return $data;
    }

    public function edit($id)
    {
    }

    public function update(VillageRequest $request, $id)
    {


    }

    public function destroy($id)
    {
    }
}
