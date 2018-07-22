<?php
use App\Researcher;
use App\Expert;
use App\Research;
use App\Creative;
use App\Area;
use App\Problem;
use App\Taggroup;

$strFileName = "data.php";
$objFopen = fopen($strFileName, 'w');

$text = "<?php ";
$text .= '$cresearcher = '.Researcher::count().'; ';
$text .= '$cexpert = '.Expert::count().'; ';
$text .= '$cresearch = '.Research::count().'; ';
$text .= '$ccreative = '.Creative::count().'; ';
$text .= '$carea = '.Area::count().'; ';
$text .= '$cproblem = '.Problem::count().'; ';

$text .= '$sumtag = array(';
$sumtag = Taggroup::get();
foreach ($sumtag as $key) {
  $idtag = $key->id;
  $pro = Problem::where('taggroup_id',$idtag)->get();
    $text .= '"'.mb_substr($key->groupname,0,15,'UTF-8').'"=>"'.count($pro).'",';
}
$text .= ');';

$text .= " ?>";
fwrite($objFopen, $text);
fclose($objFopen);
?>
