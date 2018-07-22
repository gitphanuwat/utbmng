<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
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
      $ido = session('sess_org');
      $data = Group::where('organize_id',$ido)->get();
      return view('organize.group',compact('data'));
    }

    public function create()
    {
      $idu = session('sess_org');
      $data = Group::where('organize_id',$idu)->get();
      //$data = Group::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>ชื่อชุมชน</th>
        <th>ระดับกลุ่ม</th>
        <th>ที่อยู่</th>
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

    public function store(GroupRequest $request)
    {

    }

    public function show($id)
    {

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
