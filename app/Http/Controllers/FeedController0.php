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


    public function create()
    {

      $token = "1496188763803694|13ca95b19789a800190bc4fe50eea910";
      //$token = "229042934292145|b25bd4a29377bbdc160078dbc621bc5b";
      //$pagearr = array('nakhamWebPage');
      //$pagearr = array('124932747956251','nakhamWebPage','242613159231997');
      $pagearr = array('124932747956251','nakhamWebPage','242613159231997','1422870801289919','1105326852944805'
    ,'T.Phajuk','1086571854691776');
      // Ngewngamuttaradit
        //$pageDetails = $this->getFacebookId($pageID,$token);
        //$get_data = $this->feedExtract($pageID,$token);

        $display ='';
        $ic=0;
        foreach ($pagearr as $key => $value) {
          //@$pageDetails = $this->getFacebookId($value,$token);
          @$get_data = $this->feedExtract($value,$token);
          ?>
          <div class="box box-widget">
            <div class="box-body">
                <div class="pull-left image">
                  <img class='img-thumbnail' src="<?php echo $get_data['data'][$ic]['picture'];?>" style="width:110px"  alt="Attachment Image">
                </div>
                <div class="pull-right info">
                  <?php
                  $date = date_create($get_data['data'][$ic]['created_time']);
                  $newDate = date_format($date,'Y-m-d H:i:s');
                  ?>
                  <span class="description"><?php echo $newDate;?></span>
                </div>
                <div class="attachment-block clearfix">
                <div class="attachment-pushed">
                  <h5 class="attachment-heading"><a href="<?php //echo $pageDetails->link; ?>"><?php //echo $pageDetails->name; ?></a></h5>
                  <div class="attachment-text">
                    <?php
                    @$story = $get_data['data'][$ic]['message'];
                    if(!isset($story))@$story = $get_data['data'][$ic]['story'];
                    $story=substr($story, 0, 515);
                    echo $story;?>... <a href="<?php echo "https://www.facebook.com/".$get_data['data'][$ic]['id'];?>" target="_blank">อ่านต่อ</a>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share <?php echo @$get_data['data'][$ic]['shares']['count'];?></button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like <?php echo @$get_data['data'][$ic]['likes']['summary']['total_count'];?></button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> Comment <?php echo @$get_data['data'][$ic]['comments']['summary']['total_count'];?></button>
            </div>
          </div>
          <?php
        }
        //return $display;
    }

    function getFacebookId($pageID,$token) // This function return facebook page details by its url
    {
       $json = file_get_contents('https://graph.facebook.com/'.$pageID.'?fields=picture,phone,fan_count,talking_about_count,name,about,link,website&access_token='.$token);
       $json = json_decode($json);
       return $json;
    }

    function feedExtract($pageFBID,$token)
    {
     $response = file_get_contents("https://graph.facebook.com/$pageFBID/feed?fields=feed.limit(1),picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)&access_token=".$token);
     $json = json_decode($response,true);
     return $json;
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
