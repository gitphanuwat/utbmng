<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Info;
use App\Http\Requests\InfoRequest;

class InfoController extends Controller
{
  public function __construct()
  {
      //$this->middleware('organize');
  }

    public function index()
    {
        return view('info');
    }

    public function create()
    {
      $data = Info::orderby('day', 'desc')->get();
      //$data = Info::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th>ลำดับ</th>
          <th>ชื่อเรื่อง</th>
          <th>หน่วยงาน</th>
          <th>วันที่</th>
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
          <td><a data-id='$key->id' href='#j' class='bndetail'>".$key->title."</a></td>
          <td>".$key->organize->name."</td>
          <td>$key->day</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(InfoRequest $request)
    {
    }

    public function show($id)
    {
      $data = Info::find($id);
      $display="
      <div class='pull-right box-tools'>
        <button type='button' class='btn btn-default btn-sm btncancel' title='ปิดหน้าต่าง'>
        <i class='fa fa-times'></i></button>
      </div>
      <div class='row'>
      <div class='col-md-4'>
        <img class='img-thumbnail' src='http://localhost/utb/public_html/images/info/".$data->file."'>
        <p class='text-muted text-center'>".$data->organize->name."</p>
      </div>
      <div class='col-md-8'>
      <blockquote>
        <p>".$data->title."</p>
        <small>วันที่ ".$data->day."</small>
        <small>".$data->detail."</small>
      </blockquote>
      ";
      return $display;
    }

    public function edit($id)
    {

    }

    public function infoupdate(InfoRequest $request, $id)
    {


    }

    public function destroy($id)
    {

    }
}
