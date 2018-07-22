<?php
use App\Expert;

$strFileName = "datajsonexp.json";
$objFopen = fopen($strFileName, 'w');

$datacent = Expert::all();
//$datacent = Researcher::lists('firstname','id');
//$objson = $datacent->toJson();

$text = "[";
foreach ($datacent as $key) {
    $text .='{ "value": '.$key->id.' , "text": "'.$key->firstname.' '.$key->lastname.'"},';
}
//$text .= $datacent->toJson();
//dd($datacent->toArray());

$text .= "{}]";
fwrite($objFopen, $text);
fclose($objFopen);
?>
