<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
//use App\Area;

use App\Http\Requests\OrganizeRequest;

class OrganizeController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {
      //$idc = session('sess_org');
      $data = Organize::get();
      return view('organize',compact('data'));
    }

    public function create()
    {
      $data = Organize::get();
      //$data = Village::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ชื่อหน่วยงาน</th>
        <th>เขตอำเภอ</th>
        <th data-sortable='false' width='140'><i class='fa fa-map-marker'></i><i class='fa fa-internet-explorer'></i><i class='fa fa-facebook-square'></i></th>
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
          <td><a href='".url($key->title)."'>$key->name</a></td>
          <td> ".$key->amphur->name."</td>
          <td>";
          if($key->lat and $key->lng){
            $display .="<a class='btn btn-default bnmap' data-id='$key->id' href='#i' title='แสดงพิกัด'><i class='fa fa-map-marker'></i></a>";
          }
          if($key->website){
            $display .="<a class='btn btn-default' href='http://".$key->website."' title='เปิดเว็บไซต์'><i class='fa fa-internet-explorer'></i></a>";
          }
          if($key->facebook){
            $display .="<a class='btn btn-default' href='https://www.facebook.com/".$key->facebook."' title='เปิดเฟสบุ๊ค'><i class='fa fa-facebook-official'></i></a>";
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

    public function store(OrganizeRequest $request)
    {

    }

    public function show($id)
    {
      $data = Organize::find($id);
      return $data;
    }

    public function edit($id)
    {

    }

    public function update(OrganizeRequest $request, $id)
    {

    }

    public function updatevision(Request $request, $id)
    {

    }

    public function destroy($id)
    {


    }
}
