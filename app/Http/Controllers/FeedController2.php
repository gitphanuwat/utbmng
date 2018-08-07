<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Organize;

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

    public function create()
    {

    }

    public function store(Request $request)
    {


    }

    public function show($id)
    {

      if($id==1){
        $file = file_get_contents('datajson.json');
        if(!function_exists('json_decode')) die('Your host does not support json');
        $feed = json_decode($file);
      }else{
        if(!session('sess_fb')){
          $idend=$id*10;
          $idstart = $idend-9;
          //$idend = $id*10;
          $org = Organize::where('facebook','!=','')
                  ->where('id','>=',$idstart)
                  ->where('id','<=',$idend)
                  ->get();
          $strFileName = "datajsonfeed.json";
          $objFopen = fopen($strFileName, 'w');

          $token = "1496188763803694|13ca95b19789a800190bc4fe50eea910";
          $text = "{";
          //foreach ($organize as $key) {
          foreach ($org as $key) {
            $json = file_get_contents('https://graph.facebook.com/'.$key->facebook.'/?fields=name,website,link,feed.limit(1){picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)}&access_token='.$token);
          	$json = json_decode($json);

              $msg = iconv_substr(@$json->feed->data[0]->message, 0, 300,"UTF-8");
              $msg = preg_replace('/[[:space:]]+/', ' ', trim($msg));
              $msg = preg_replace('/"+/', ' ', trim($msg));

              $text .='"'.@$json->id.'":[
                "'.@$json->name.'",
                "'.@$json->website.'",
                "'.@$json->link.'",
                "'.@$json->feed->data[0]->id.'",
                "'.@$json->feed->data[0]->picture.'",
                "'.$msg.'",
                "'.@$json->feed->data[0]->story.'",
                "'.@$json->feed->data[0]->shares->count.'",
                "'.@$json->feed->data[0]->likes->summary->total_count.'",
                "'.@$json->feed->data[0]->comments->summary->total_count.'",
                "'.@$json->feed->data[0]->created_time.'"],';
          }
          $text = rtrim($text,",");
          $text .= '}';
          fwrite($objFopen, $text);
          fclose($objFopen);
        }
        $file = file_get_contents('datajsonfeed.json');
        if(!function_exists('json_decode')) die('Your host does not support json');
        $feed = json_decode($file);
      }

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
                  //$message=substr($message, 0, 515);
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
      //return $id;
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
