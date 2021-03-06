<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Counter;
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
    public function index()
    {
      $organize=Organize::get();
      $person=Person::get();
      $village=Village::get();
      $activity=Activity::get();
      return view('home',compact('organize','person','village','activity'));
    }

    public function stat()
    {
      $objcou = Counter::get();
      return view('stat',compact('$objcou'));
    }

    public function loadstat(Request $request){
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
            $objc = Counter::where('day','=',$date)->first();
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
      $today = date("Y-m-d");
      $objcounter = Counter::where('day','=',$today)->first();
      if ($objcounter){
        $counttotal = $objcounter->total+1;

        global $COUNTER_USE_COOKIES;
        $cookie_name = 'HIT_COUNTER_' . $today;
       	if(!isset($_COOKIE[$cookie_name])) {

          $cookie_name = 'HIT_COUNTER_' . $today;
          setcookie($cookie_name, 'TRUE', time() + 360);

          $objcounter->day = $today;
          $objcounter->total = $counttotal;
          $objcounter->save();
        }
      }else{
          $counttotal = 1;
          $objcounter = new Counter();
          $objcounter->day = $today;
          $objcounter->total = $counttotal;
          $objcounter->save();
      }
      //return $today.' '.$counttotal;
      return 'public';
    }

}
