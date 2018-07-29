<?php
namespace App\Http\Controllers\Organize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Counterorg;
use App\Log;

use App\Organize;
use App\Person;
use App\Village;
use App\Activity;
use App\Tourist;

class HomeController extends Controller
{
    public function __construct()
    {
      //$this->middleware('auth');
      //$this->middleware('logger');
    }
    public function index($org)
    {
      $data = Organize::where('title',$org)->first();
      session(['sess_org' => $data->id]);
      session(['sess_orgname' => $data->name]);
      $ido = $data->id;
      $person = Person::where('organize_id',$ido)->get();
      $village = Village::where('organize_id',$ido)->get();
      $activity = Activity::where('organize_id',$ido)->get();
      $tourist = Tourist::where('organize_id',$ido)->get();
      return view('homepage',compact('data','person','village','activity','tourist'));
    }

    public function stat()
    {
      $ido = session('sess_org');
      $objcou = Counterorg::where('organize_id',$ido)->get();
      return view('organize.stat',compact('$objcou'));
    }

    public function loadstat(Request $request){
      $ido = session('sess_org');
      $startdate = $request['startdate'];
      $enddate = $request['enddate'];
      $date=date("Y-m-d",strtotime("$startdate"));
      $end_date = date("Y-m-d",strtotime("$enddate"));
          $data = "<script>";
          $data .= "var line = new Morris.Line({";
          $data .= "element: 'line-chart',";
          $data .= "resize: true,";
          $data .= "data: [";
          while (strtotime($date) <= strtotime($end_date)) {
            $objc = Counterorg::where('organize_id',$ido)->where('day','=',$date)->first();
            if($objc){
              $counts = $objc->total;
            }else{
              $counts=0;
            }
            $data .= "{y: '$date', item1: ".$counts."},";
            $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
          }
          $data .= "],";
          $data .= "xkey: 'y',";
          $data .= "ykeys: ['item1'],";
          $data .= "labels: ['Stat'],";
          $data .= "lineColors: ['#3c8dbc'],";
          $data .= "hideHover: 'auto',";
        $data .= "});";
      $data .= "</script>";
      echo $data;
    }

    public function counterhit()
    {
      $ido = session('sess_org');
      $today = date("Y-m-d");
      $objcounter = Counterorg::where('organize_id',$ido)->where('day','=',$today)->first();
      if ($objcounter){
        $counttotal = $objcounter->total+1;

        global $COUNTER_USE_COOKIES;
        $cookie_name = 'HIT_COUNTER_'.$ido.$today;
       	if(!isset($_COOKIE[$cookie_name])) {

          $cookie_name = 'HIT_COUNTER_'.$ido.$today;
          setcookie($cookie_name, 'TRUE', time() + 360);

          $objcounter->day = $today;
          $objcounter->total = $counttotal;
          $objcounter->save();
        }
      }else{
          $counttotal = 1;
          $objcounter = new Counterorg();
          $objcounter->day = $today;
          $objcounter->total = $counttotal;
          $objcounter->organize_id = $ido;
          $objcounter->save();
      }
      //return $today.' '.$counttotal;
      //return 'test count org';
    }

}
