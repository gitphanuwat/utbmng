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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    public function info()
    {
      $locations = DB::table('organizes')->get();
      return view('home',compact('locations'));
    }

    public function stat()
    {
      $objcou = Counter::get();
      //$objunivs = University::lists('name','id');
      return view('stat',compact('$objcou'));
    }

    public function loadstat(Request $request){
      $startdate = $request['startdate'];
      $enddate = $request['enddate'];

      //$objcounter = Counter::where('day','like','%2016%')->get();
      //$nowdate = date("Y-m-d");
      //$date=date("Y-m-d",strtotime("-30 days",strtotime($nowdate)));
      //$date=date("Y-m-d",strtotime("oct 2017"));
      //$end_date = date("Y-m-d");
      //$end_date = date("Y-m-d",strtotime("+1 month",strtotime($date)));
      $date=date("Y-m-d",strtotime("$startdate"));
      $end_date = date("Y-m-d",strtotime("$enddate"));

          $data = "<script>";
          $data .= "var line = new Morris.Line({";
          $data .= "element: 'line-chart',";
          $data .= "resize: true,";
          $data .= "data: [";
          //foreach ($objcounter as $obj) {
            //$data .= "{y: '$obj->day', item1: ".$obj->total."},";
          //}
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
      //$data .= "counterread()";
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
      return $today.' '.$counttotal;
    }


    public function organize($organize)
    {
      //$organize = $request['name'];
      $data = Organize::where('title',$organize)->first();
      session(['sess_org' => $data->id]);
      session(['sess_orgname' => $data->name]);
      return view('homepage',compact('data'));
      //echo $data[0]->name;
    }

}
