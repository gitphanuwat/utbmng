<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Download;
use App\Http\Requests\DownloadRequest;

class DownloadController extends Controller
{
  public function __construct()
  {
      //$this->middleware('organize');
  }

    public function index()
    {
      $data = Download::get();
      return view('download',compact('data'));
    }

    public function create()
    {
      $data = Download::get();
      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th>ลำดับ</th>
          <th>ชื่อเอกสาร</th>
          <th>ไฟล์เอกสาร</th>
          <th>ประเภท</th>
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
          <td>";
          if($key->file){
            $display .= "<i class='ion ion-android-attach'></i> <a href='../files/download/".$key->file."'>".$key->file."</a>";
          }
          $display .= "</td>
          <td>";
          if($key->type==1){$display .= "หนังสือราชการ";}
          if($key->type==2){$display .= "มาตรฐานต่างๆ";}
          if($key->type==3){$display .= "แบบฟอร์มต่างๆ";}
          if($key->type==4){$display .= "เอกสารอื่นๆ";}
            $display .= "</td>
        </tr>
        ";
      }
      $display .= "
        </tbody>
      </table>
      ";
      return $display;
    }

    public function store(DownloadRequest $request)
    {


    }

    public function show($id)
    {
      $arrtype=array('','หนังสือราชการ','มาตรฐานต่างๆ','แบบฟอร์มต่างๆ','เอกสารอื่นๆ');
      $data = Download::find($id);
      $display="
      <div class='pull-right box-tools'>
        <button type='button' class='btn btn-default btn-sm btncancel' title='ปิดหน้าต่าง'>
        <i class='fa fa-times'></i></button>
      </div>
      <div class='row'>
      <div class='col-md-12'>
      <blockquote>
        <p>".$data->title."</p>
        <small>".$arrtype[$data->type]."</small>
        <small>".$data->detail."</small>
      </blockquote>
      <blockquote>
        ";
        if($data->file){
          $display .= "<i class='ion ion-android-attach'></i> <a href='../files/download/".$data->file."'>".$data->file."</a>";
        }
        $display .="
      </blockquote>
      ";
      return $display;
    }

    public function edit($id)
    {
    }

    public function downloadupdate(DownloadRequest $request, $id)
    {


    }

    public function destroy($id)
    {

    }
}
