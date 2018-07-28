<?php
$config['App_ID'] = '1496188763803694';
$config['App_Secret'] = '13ca95b19789a800190bc4fe50eea910';
$pageID = '262013900603203';
$pageID2 = '582857498471447';
$pageID3 = 'ILikeURU';

$token = $config['App_ID']."|".$config['App_Secret'];

if($_GET["action"]=="loadfeed"){
    $pageDetails = getFacebookId($pageID);
    $get_data = feedExtract("",$pageDetails->id,$token);
    echo '<div class="row">';
    echo '<div class="col-md-4">';
    //for($ic=0;$ic<count($get_data['data']);$ic++)
    echo '
    <div class="box-header with-border">
      <div class="pull-left image">
          <img src="'.$pageDetails->picture->data->url.'" class="img-circle"/><br>
      </div>
      <div style="font-size:14px">'.
          '<a href="'.$pageDetails->link.'">'.$pageDetails->name.'</a><br>'.
          $pageDetails->fan_count.' Likes<br>'.
          $pageDetails->website.'<br>'.
      '</div>'.
    '</div>';

    for($ic=0;$ic<5;$ic++)
    {
?>
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-body">
                    <div class="pull-left image">
                      <img class="attachment-img" src="<?php echo $get_data['data'][$ic]['picture'];?>" height="80" alt="Attachment Image">
                    </div>
                    <div class="pull-right info">
                      <?php
                      $date = date_create($get_data['data'][$ic]['created_time']);
                      $newDate = date_format($date,'Y-m-d H:i:s');
                      ?>
                      <span class="description"><?php echo $newDate;?></span>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- post text -->
                  <!-- Attachment -->
                  <div class="attachment-block clearfix">

                    <div class="attachment-pushed">
                      <h4 class="attachment-heading"><a href="#"><?php echo $get_data['data'][$ic]['name'];?></a></h4>
                      <div class="attachment-text">
                        <?php
                        $story = $get_data['data'][$ic]['message'];
                        if(!isset($story))$story = $get_data['data'][$ic]['story'];
                        $story=substr($story, 0, 400);
                        echo $story;?>... <a href="<?php echo "https://www.facebook.com/".$get_data['data'][$ic]['id'];?>" target="_blank">more</a>
                      </div>
                      <!-- /.attachment-text -->
                    </div>
                    <!-- /.attachment-pushed -->
                  </div>
                  <!-- /.attachment-block -->

                  <!-- Social sharing buttons -->
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share <?php echo $get_data['data'][$ic]['shares']['count'];?></button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like <?php echo $get_data['data'][$ic]['likes']['summary']['total_count'];?></button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> Comment <?php echo $get_data['data'][$ic]['comments']['summary']['total_count'];?></button>
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
                <!-- /.box-footer -->
              </div>
              <!-- /.box -->

<?php
    }
    echo  '</div>';

    $pageDetails = getFacebookId($pageID2);
    $get_data = feedExtract("",$pageDetails->id,$token);
    echo '<div class="row">';
    echo '<div class="col-md-4">';
    //for($ic=0;$ic<count($get_data['data']);$ic++)
    echo '
    <div class="box-header with-border">
      <div class="pull-left image">
          <img src="'.$pageDetails->picture->data->url.'" class="img-circle"/><br>
      </div>
      <div style="font-size:14px">'.
          '<a href="'.$pageDetails->link.'">'.$pageDetails->name.'</a><br>'.
          $pageDetails->fan_count.' Likes<br>'.
          $pageDetails->website.'<br>'.
      '</div>'.
    '</div>';

    for($ic=0;$ic<5;$ic++)
    {
?>
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-body">
                    <div class="pull-left image">
                      <img class="attachment-img" src="<?php echo $get_data['data'][$ic]['picture'];?>" height="80" alt="Attachment Image">
                    </div>
                    <div class="pull-right info">
                      <?php
                      $date = date_create($get_data['data'][$ic]['created_time']);
                      $newDate = date_format($date,'Y-m-d H:i:s');
                      ?>
                      <span class="description"><?php echo $newDate;?></span>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- post text -->
                  <!-- Attachment -->
                  <div class="attachment-block clearfix">

                    <div class="attachment-pushed">
                      <h4 class="attachment-heading"><a href="#"><?php echo $get_data['data'][$ic]['name'];?></a></h4>
                      <div class="attachment-text">
                        <?php
                        $story = $get_data['data'][$ic]['message'];
                        if(!isset($story))$story = $get_data['data'][$ic]['story'];
                        $story=substr($story, 0, 400);
                        echo $story;?>... <a href="<?php echo "https://www.facebook.com/".$get_data['data'][$ic]['id'];?>" target="_blank">more</a>
                      </div>
                      <!-- /.attachment-text -->
                    </div>
                    <!-- /.attachment-pushed -->
                  </div>
                  <!-- /.attachment-block -->

                  <!-- Social sharing buttons -->
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share <?php echo $get_data['data'][$ic]['shares']['count'];?></button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like <?php echo $get_data['data'][$ic]['likes']['summary']['total_count'];?></button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> Comment <?php echo $get_data['data'][$ic]['comments']['summary']['total_count'];?></button>
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
                <!-- /.box-footer -->
              </div>
              <!-- /.box -->

<?php
    }
    echo  '</div>';

    $pageDetails = getFacebookId($pageID3);
    $get_data = feedExtract("",$pageDetails->id,$token);
    echo '<div class="row">';
    echo '<div class="col-md-4">';
    //for($ic=0;$ic<count($get_data['data']);$ic++)
    echo '
    <div class="box-header with-border">
      <div class="pull-left image">
          <img src="'.$pageDetails->picture->data->url.'" class="img-circle"/><br>
      </div>
      <div style="font-size:14px">'.
          '<a href="'.$pageDetails->link.'">'.$pageDetails->name.'</a><br>'.
          $pageDetails->fan_count.' Likes<br>'.
          $pageDetails->website.'<br>'.
      '</div>'.
    '</div>';

    for($ic=0;$ic<5;$ic++)
    {
?>
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-body">
                    <div class="pull-left image">
                      <img class="attachment-img" src="<?php echo $get_data['data'][$ic]['picture'];?>" height="80" alt="Attachment Image">
                    </div>
                    <div class="pull-right info">
                      <?php
                      $date = date_create($get_data['data'][$ic]['created_time']);
                      $newDate = date_format($date,'Y-m-d H:i:s');
                      ?>
                      <span class="description"><?php echo $newDate;?></span>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- post text -->
                  <!-- Attachment -->
                  <div class="attachment-block clearfix">

                    <div class="attachment-pushed">
                      <h4 class="attachment-heading"><a href="#"><?php echo $get_data['data'][$ic]['name'];?></a></h4>
                      <div class="attachment-text">
                        <?php
                        $story = $get_data['data'][$ic]['message'];
                        if(!isset($story))$story = $get_data['data'][$ic]['story'];
                        $story=substr($story, 0, 400);
                        echo $story;?>... <a href="<?php echo "https://www.facebook.com/".$get_data['data'][$ic]['id'];?>" target="_blank">more</a>
                      </div>
                      <!-- /.attachment-text -->
                    </div>
                    <!-- /.attachment-pushed -->
                  </div>
                  <!-- /.attachment-block -->

                  <!-- Social sharing buttons -->
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share <?php echo $get_data['data'][$ic]['shares']['count'];?></button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like <?php echo $get_data['data'][$ic]['likes']['summary']['total_count'];?></button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> Comment <?php echo $get_data['data'][$ic]['comments']['summary']['total_count'];?></button>
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
                <!-- /.box-footer -->
              </div>
              <!-- /.box -->

<?php
    }
    echo  '</div></div>';
    exit();
}

function getFacebookId($pageID) // This function return facebook page details by its url
{
   global $token;
   $json = file_get_contents('https://graph.facebook.com/'.$pageID.'?fields=picture,phone,fan_count,talking_about_count,name,about,link,website&access_token='.$token);
   $json = json_decode($json);
   return $json;
}

function feedExtract($url="",$pageFBID)
{
 global $token;
 $response = file_get_contents("https://graph.facebook.com/v2.6/$pageFBID/feed?fields=picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)&access_token=".$token);
 $get_data = json_decode($response,true);
 return $get_data;
}
?>
