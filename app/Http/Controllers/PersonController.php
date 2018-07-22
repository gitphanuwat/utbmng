<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Person;
use App\Organize;

use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{
  public function __construct()
  {
      //$this->middleware('organize');
  }

    public function index()
    {
        return view('person');
    }

    public function create()
    {
      $data = Organize::get();
      //$data = Person::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th>ลำดับ</th>
          <th>หน่วยงาน</th>
          <th>ประเภท</th>
          <th>อำเภอ</th>
          <th>จำนวนบุคลากร</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      $arrtype=array('','องค์การบริหารส่วนจังหวัด','เทศบาลเมือง','เทศบาลตำบล','องค์การบริหารส่วนตำบล','การปกครองพิเศษ','อื่นๆ');
      foreach ($data as $key) {
        $i++;
        $display .= "
        <tr>
          <td width='50'>$i</td>
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->name."</a></td>
          <td>".$arrtype[$key->type]."</td>
          <td>".$key->amphur->name."</td>
          <td>".$key->person->count()."</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(PersonRequest $request)
    {

    }

    public function show($id)
    {
      $data = Person::where('organize_id',$id)->get();
      //$data = Person::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th data-sortable='false'>ลำดับ</th>
          <th data-sortable='false'>ชื่อ-สกุล</th>
          <th data-sortable='false'>ตำแหน่ง</th>
          <th data-sortable='false'>วันดำรงตำแหน่ง</th>
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
          <td><a data-id='$key->id' href='#k' class='bnprofile'>".$key->headname.$key->firstname.' '.$key->lastname."</a></td>
          <td>$key->position</td>
          <td>$key->duedate</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function edit($id)
    {
      $data = Person::find($id);
      //$data = Group::get();
      $display="
      <div class='row'>
      <div class='col-md-4'>
        <img class='profile-user-img img-responsive img-circle' src='http://localhost/utb/public_html/images/person/".$data->picture."'>
        <h3 class='profile-username text-center'>".$data->headname.$data->firstname.' '.$data->lastname."</h3>
        <p class='text-muted text-center'>".$data->position."</p>
      </div>
      <div class='col-md-8'>
        <blockquote>
          <p>ตำแหน่ง</p>
          <small>".$data->position."</small>
          <small>วันดำรงตำแหน่ง ".$data->duedate."</small>
        </blockquote>
      </div>
      </div>


      <blockquote>
        <p>ที่อยู่</p>
        <small>".$data->address."</small>
      </blockquote>
      <blockquote>
        <p>ข้อมูลติดต่อ</p>
        <small>".$data->email."</small>
        <small>".$data->tel."</small>
      </blockquote>
      <a href='#i' class='btn btn-warning  btncancel'>  ปิด  </a>
      ";
      return $display;
    }

    public function update(PersonRequest $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
