<?php
use App\Organize;
$org = Organize::where('facebook','!=','')->where('id','<=',15)->get();
$strFileName = "datajson.json";

$token = "1496188763803694|13ca95b19789a800190bc4fe50eea910";

$jsontest = @file_get_contents('https://graph.facebook.com/124932747956251?access_token='.$token);
$jsontest = json_decode($jsontest);
$check = @$jsontest->name;
if (isset($check)) {
    $objFopen = fopen($strFileName, 'w');
    $text = "{";
//foreach ($organize as $key) {
    foreach ($org as $key) {
      $json = @file_get_contents('https://graph.facebook.com/'.$key->facebook.'/?fields=name,website,link,posts.limit(1){picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)}&access_token='.$token);
    	$json = json_decode($json);

      $msg = iconv_substr(@$json->posts->data[0]->message, 0, 300,"UTF-8");
      $msg = preg_replace('/[[:space:]]+/', ' ', trim($msg));
      $msg = preg_replace('/"+/', ' ', trim($msg));

      $text .='"'.@$json->id.'":[
        "'.@$json->name.'",
        "'.@$json->website.'",
        "'.@$json->link.'",
        "'.@$json->posts->data[0]->id.'",
        "'.@$json->posts->data[0]->picture.'",
        "'.$msg.'",
        "'.@$json->posts->data[0]->story.'",
        "'.@$json->posts->data[0]->shares->count.'",
        "'.@$json->posts->data[0]->likes->summary->total_count.'",
        "'.@$json->posts->data[0]->comments->summary->total_count.'",
        "'.@$json->posts->data[0]->created_time.'"],';

    }
    $text = rtrim($text,",");
    $text .= '}';
    fwrite($objFopen, $text);
    fclose($objFopen);
}
?>
