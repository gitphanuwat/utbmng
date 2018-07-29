<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organize;
use App\Group;


use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
     public function __construct()
     {
       //$this->middleware('organize');
     }

    public function index()
    {
      //$ido = session('sess_org');
      $data = Group::get();
      return view('group',compact('data'));
    }

    public function create()
    {
      //$idu = session('sess_org');
      $data = Group::get();
      //$data = Group::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ชื่อชุมชน</th>
        <th>ระดับกลุ่ม</th>
        <th>หน่วยงาน</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      $arrtype=array('','ระดับจังหวัด','ระดับอำเภอ','ระดับตำบล','ระดับชุมชน');
      foreach ($data as $key) {
        $i++;
        $display .= "
        <tr>
          <td>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->name."</a></td>
          <td>".$arrtype[$key->type]."</td>
          <td> ".$key->organize->name."</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(GroupRequest $request)
    {

    }

    public function show($id)
    {
      $arrtype=array('','ระดับจังหวัด','ระดับอำเภอ','ระดับตำบล','ระดับชุมชน');
      $data = Group::find($id);
      //$data = Group::get();
      $display="
      <blockquote>
        <p>ชื่อกลุ่ม</p>
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
        <small>".$data->contact."</small>
        <small>".$data->tel."</small>
      </blockquote>
      <a href='#i' class='btn btn-warning  btncancel'>  ปิด  </a>
      ";
      return $display;
    }

    public function edit($id)
    {

    }

    public function update(GroupRequest $request, $id)
    {



    }

    public function destroy($id)
    {

    }
}
