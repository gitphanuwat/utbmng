<?php

$strFileName = "datajson.json";
$objFopen = fopen($strFileName, 'w');

$token = "1496188763803694|13ca95b19789a800190bc4fe50eea910";
//$organize = Organize::get();

$pagearr = array('124932747956251','nakhamWebPage','1422870801289919','1105326852944805'
,'T.Phajuk','1086571854691776','ThesbalTablTron');

//$pageband='242613159231997';
$text = "{";
//foreach ($organize as $key) {
foreach ($pagearr as $key => $value) {
  $json = file_get_contents('https://graph.facebook.com/'.$value.'/?fields=name,website,link,feed.limit(1){picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)}&access_token='.$token);
	$json = json_decode($json);

    $text .='"'.@$json->id.'":[
      "'.@$json->name.'",
      "'.@$json->website.'",
      "'.@$json->link.'",
      "'.@$json->feed->data[0]->id.'",
      "'.@$json->feed->data[0]->picture.'",
      "'.@$json->feed->data[0]->message.'",
      "'.@$json->feed->data[0]->story.'",
      "'.@$json->feed->data[0]->shares->count.'",
      "'.@$json->feed->data[0]->likes->summary->total_count.'",
      "'.@$json->feed->data[0]->comments->summary->total_count.'",
      "'.@$json->feed->data[0]->created_time.'"],';

}
//$text .= $datacent->toJson();
//dd($datacent->toArray());
$text .= '"final": ["","","","","","","","","","",""]}';
fwrite($objFopen, $text);
fclose($objFopen);
?>
