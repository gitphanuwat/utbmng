<?php
namespace App\Http\Controllers;
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

    public function index()
    {
      $data = Tourist::get();
      return view('tourist',compact('data'));
    }

    public function create()
    {
      $data = Tourist::get();
      //$data = Tourist::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th width='70'>ลำดับ</th>
        <th>แหล่งท่องเที่ยว</th>
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
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->name."</a></td>
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

    public function store(TouristRequest $request)
    {

    }

    public function show($id)
    {
      $data = Tourist::find($id);
      //$data = Group::get();
      $display="
      <div class='row'>
      <div class='col-md-4'>
        <img class='img-thumbnail' src='http://localhost/utb/public_html/images/tourist/".$data->picture."'>
        <h3 class='profile-username text-center'>".$data->name."</h3>
        <p class='text-muted text-center'>".$data->organize->name."</p>
      </div>
      <div class='col-md-8'>
        <blockquote>
          <p>ที่อยู่</p>
          <small>".$data->address."</small>
          <small><a href='".$data->website."'>".$data->website."</a></small>
        </blockquote>
        <blockquote>
          <p>ข้อมูลติดต่อ</p>
          <small>".$data->contact."</small>
          <small>".$data->tel."</small>
        </blockquote>
      </div>
      </div>
      <blockquote>
        <p>รายละเอียด</p>
        <small>".$data->detail."</small>
      </blockquote>
      <a href='#i' class='btn btn-warning  btncancel'>  ปิด  </a>
      ";
      return $display;
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
