<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
use App\Activity;


use App\Http\Requests\ActivityRequest;

class ActivityController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {
      $data = Activity::get();
      return view('activity',compact('data'));
    }

    public function create()
    {
      $data = Activity::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>เรื่องเด่น</th>
        <th>กลุ่ม</th>
        <th>ที่อยู่</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      $arrtype=array('','โครงการเด่น','สถานที่สำคัญ','ผลิตภัณฑ์ชุมชน','เรื่องอื่นๆ');
      foreach ($data as $key) {
        $i++;
        $display .= "
        <tr>
          <td>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->name."</a></td>
          <td>".$arrtype[$key->type]."</td>
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

    public function store(ActivityRequest $request)
    {

    }

    public function show($id)
    {
      $arrtype=array('','โครงการเด่น','สถานที่สำคัญ','ผลิตภัณฑ์ชุมชน','เรื่องอื่นๆ');
      $data = Activity::find($id);
      //$data = Group::get();
      $display="
      <blockquote>
        <p>ชื่อเรื่อง</p>
        <small>".$data->name."</small>
        <small>".$arrtype[$data->type]."</small>
      </blockquote>
      <blockquote>
        <p>รายละเอียด</p>
        <small>".$data->detail."</small>
      </blockquote>
      <blockquote>
        <p>ที่อยู่</p>
        <small>".$data->address."</small>
      </blockquote>
      <blockquote>
        <p>ข้อมูลติดต่อ</p>
        <small>".$data->leader."</small>
        <small>".$data->tel."</small>
      </blockquote>
      <a href='#i' class='btn btn-warning  btncancel'>  ปิด  </a>
      ";
      return $display;
    }

    public function edit($id)
    {
    }

    public function update(ActivityRequest $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
