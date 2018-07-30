<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FeedController extends Controller
{
  public function __construct()
  {
      //$this->middleware('organize');
  }

    public function index()
    {
      return view('rss');
    }

    public function create1()
    {
        $f = file_get_contents('datajson.json');
        if(!function_exists('json_decode')) die('Your host does not support json');
        	$feed = json_decode($f);
          foreach($feed as $key => $val){
          echo $key." : ";
          echo "Name = ".$val[0];
          echo "  Website = ".$val[1];
          echo "<br/>";
          //query เองน๊ะจ๊ะ
        }
    }
    public function create()
    {
        $file = file_get_contents('datajson.json');
        if(!function_exists('json_decode')) die('Your host does not support json');
        $feed = json_decode($file);

        foreach($feed as $key => $val){
          ?>
          <div class="box box-widget">
            <div class="box-body">
                <div class="pull-left image">
                  <img class='img-thumbnail' src="<?php echo $val[4];?>" style="width:110px"  alt="Attachment Image">
                </div>
                <div class="pull-right info">
                  <?php
                  $date = date_create($val[10]);
                  $newDate = date_format($date,'Y-m-d H:i:s');
                  ?>
                  <span class="description"><?php echo $newDate;?></span>
                </div>
                <div class="attachment-block clearfix">
                <div class="attachment-pushed">
                  <h5 class="attachment-heading"><a href="<?php echo $val[2];?>"><?php echo $val[0];?></a></h5>
                  <div class="attachment-text">
                    <?php
                    $message = $val[5];
                    $message=substr($message, 0, 515);
                    echo $val[6].'<br>'.$message;?>...
                    <a href="<?php echo "https://www.facebook.com/".$val[3];?>" target="_blank">อ่านต่อ</a>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share <?php echo $val[7];?></button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like <?php echo $val[8];?></button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> Comment <?php echo $val[9];?></button>
            </div>
          </div>
          <?php
        }
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
