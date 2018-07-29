<?php
namespace App\Http\Controllers\Organize;
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

    public function index($title)
    {
      $data = Organize::where('title',$title)->first();
      session(['sess_org' => $data->id]);
      session(['sess_orgname' => $data->name]);
        return view('organize.person');
        //return session('sess_orgname');
    }

    public function create1($name)
    {
      return $name;
    }
    public function create()
    {
      $id =session('sess_org');
      $data = Person::where('organize_id',$id)->get();
      //$data = Person::get();
      $i=1;
      $display="<div class='row'>";
      foreach ($data as $key) {
        if($i>3){$display.="</div><div class='row'>";$i=1;}
        $display.="
        <div class='col-md-4'>
          <img class='profile-user-img pull-right' src='http://localhost/utb/public_html/images/person/".$key->picture."'>
          <h4 class='profile-username text-center'>".$key->headname.$key->firstname.' '.$key->lastname."</h4>
          <p class='text-muted text-center'>".$key->position."</p>
          <blockquote>
            <p>ตำแหน่ง</p>
            <small>".$key->position."</small>
            <small>วันดำรงตำแหน่ง ".$key->duedate."</small>
            <p>ที่อยู่</p>
            <small>".$key->address."</small>
            <p>ข้อมูลติดต่อ</p>
            <small>".$key->email."</small>
            <small>".$key->tel."</small>
          </blockquote>
        </div>
        ";
        //if($i>3){$display.="</div";$i=1;}
        $i++;
      }
        $display.="</div>";

      return $display;
    }

    public function store(PersonRequest $request)
    {

    }

    public function show($id)
    {
      $data = Person::find($id);
      //$data = Group::get();
      $display="
      <blockquote>
        <p>ข้อมูลส่วนบุคคล</p>
        <small>".$data->firstname."</small>
      </blockquote>
      <blockquote>
        <p>ตำแหน่ง</p>
        <small>".$data->position."</small>
      </blockquote>
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

    public function edit($id)
    {

    }

    public function update(PersonRequest $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
