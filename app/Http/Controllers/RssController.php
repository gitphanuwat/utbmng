<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class RssController extends Controller
{
  public function __construct()
  {
      //$this->middleware('organize');
  }

    public function index()
    {
      return view('rss');
    }

    public function create()
    {
      $mysongs = simplexml_load_file('http://www.dla.go.th/servlet/RssServlet');

      $display="
      <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th>ลำดับ</th>
          <th>ชื่อเอกสาร</th>
          <th width='30%'>ไฟล์เอกสาร</th>
        </tr>
        </thead>
        <tbody>
      ";
      $i=0;
      foreach ($mysongs as $key) {
        $i++;
        $display .= "
        <tr>
          <td width='50'>$i</td>
          <td>".$key->DOCUMENT_TOPIC."</td>
          <td>";
          if($key->UPLOAD_FILE1){
            $display .= " <a href='".$key->UPLOAD_FILE1."'>"."PDF"."</a>,";
          }
          if($key->UPLOAD_FILE2){
            $display .= " <a href='".$key->UPLOAD_FILE2."'>".$key->UPLOAD_DESC2."</a>,";
          }
          if($key->UPLOAD_FILE3){
            $display .= " <a href='".$key->UPLOAD_FILE3."'>".$key->UPLOAD_DESC3."</a>";
          }
          if($key->UPLOAD_FILE4){
            $display .= " <a href='".$key->UPLOAD_FILE4."'>".$key->UPLOAD_DESC4."</a>";
          }
          if($key->UPLOAD_FILE5){
            $display .= " <a href='".$key->UPLOAD_FILE5."'>".$key->UPLOAD_DESC5."</a>";
          }
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

    public function store(Request $request)
    {


    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {


    }

    public function destroy($id)
    {

    }
}
