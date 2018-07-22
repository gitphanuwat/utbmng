<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Researcher;
use App\Research;
use App\Expert;
use App\Expertlist;
use App\Creative;
use App\Problem;
use App\Useful;
use App\Infor;
use App\University;
use App\Question;

use App\Http\Requests\QuestRequest;

class GuestController extends Controller
{

  public function index()
  {
    return view('search');
  }

  public function getInfor(Request $request)
  {
    $objinfor = Infor::orderBy('id', 'desc')->get();
    return view('infor', compact('objinfor'));
  }

  public function getSearch(Request $request)
  {
    $search = $request->input('search');
    session(['sess_search' => $search]);

    $researchers = Researcher::where('firstname','LIKE',"%$search%")
    ->orWhere('lastname','LIKE',"%$search%")
    ->orWhere('email','LIKE',"%$search%")
    ->get();
    $researchs = Research::where('title_th','LIKE',"%$search%")
    ->orWhere('title_eng','LIKE',"%$search%")
    ->orWhere('propose','LIKE',"%$search%")
    ->orWhere('keyword','LIKE',"%$search%")
    //->orWhere('abstract','LIKE',"%$search%")
    ->get();
    $experts = Expert::where('firstname','LIKE',"%$search%")
    ->orWhere('lastname','LIKE',"%$search%")
    ->orWhere('email','LIKE',"%$search%")
    ->get();
    $expertlists = Expertlist::where('title_th','LIKE',"%$search%")
    ->orWhere('title_eng','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->get();
    $creatives = Creative::where('title','LIKE',"%$search%")
    ->orWhere('keyword','LIKE',"%$search%")
    ->orWhere('abstract','LIKE',"%$search%")
    ->get();
    $problems = Problem::leftjoin('areas','problems.area_id','=','areas.id')
    ->where('problems.title','LIKE',"%$search%")
    ->orWhere('problems.detail','LIKE',"%$search%")
    ->orWhere('problems.instruct','LIKE',"%$search%")
    ->orWhere('areas.name','LIKE',"%$search%")
    ->select('problems.*','areas.name')
    ->orderBy('areas.name')
    ->get();
    $usefuls = Useful::where('title','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('keyman','LIKE',"%$search%")
    ->get();

      $data = [
        'researchers' => $researchers,
        'researchs' => $researchs,
        'experts' => $experts,
        'expertlists' => $expertlists,
        'creatives' => $creatives,
        'problems' => $problems,
        'usefuls' => $usefuls,
          'search' => $search,
      ];
      return view('search', $data);
}


  public function postSearch(Request $request)
  {
      return $this->getSearch($request);
  }

  public function question()
  {
    $objuniver = University::get();
    return view('question', compact('objuniver'));
  }
  public function showresearcher()
  {
    	function highlightKeywords($text, $keyword) {
    		$wordsAry = explode(" ", $keyword);
    		$wordsCount = count($wordsAry);

    		for($i=0;$i<$wordsCount;$i++) {
    			$highlighted_text = "<span style='font-weight:bold;color:red;'>$wordsAry[$i]</span>";
    			$text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
    		}
    		return $text;
    	}
    //$search = 'ฐาน';
    $search = session()->get('sess_search');
    $researchs = Research::where('title_th','LIKE',"%$search%")
    ->orWhere('title_eng','LIKE',"%$search%")
    //->orWhere('propose','LIKE',"%$search%")
    ->orWhere('keyword','LIKE',"%$search%")
    ->get();
    $expertlists = Expertlist::where('title_th','LIKE',"%$search%")
    ->orWhere('title_eng','LIKE',"%$search%")
    //->orWhere('detail','LIKE',"%$search%")
    ->get();
    $creatives = Creative::where('title','LIKE',"%$search%")
    ->orWhere('keyword','LIKE',"%$search%")
    //->orWhere('abstract','LIKE',"%$search%")
    ->get();    //return view('question', compact('objuniver'));
    $display="
    <table class='table table-bordered'>
    <tr>
      <th><input type='checkbox' id='toggle' onClick='do_this()'></th>
      <th><span class='mailbox-read-time pull-center'>ข้อมูลแนะนำ</span></th>
    </tr>
    ";
    $cu=0;
    $arr_user = array();
    foreach ($researchs as $key) {
      $cu++;
      $name = $key->researcher->headname.$key->researcher->firstname.' '.$key->researcher->lastname;
      $display .= "
      <tr>
        <td width='30'>

        <input type='checkbox' name='check_users[]' value='".$key->researcher->email.','.$name."'>
        </td>
        <td><b>".$name.''.'</b> email: '.$key->researcher->email.'<br>'.
        '<b>งานวิจัย </b>'.highlightKeywords($key->title_th,$search).'('.highlightKeywords($key->title_eng,$search).')'.'<br>'.
        highlightKeywords($key->keyword,$search).
        "</td>
      </tr>
      ";
    }

    foreach ($expertlists as $key) {
      $cu++;
      if($key->researcher_id){
        $name = $key->researcher->headname.$key->researcher->firstname.' '.$key->researcher->lastname;
        $display .= "
        <tr>
          <td>
          <input type='checkbox' name='check_users[]' value='".$key->researcher->email.','.$name."'>
          </td>
          <td><b>".$name.''.'</b> email: '.$key->researcher->email.'<br>'.
            '<b>ความเชี่ยวชาญ </b>'.highlightKeywords($key->title_th,$search).'('.highlightKeywords($key->title_eng,$search).')'.
          "</td>
        </tr>
        ";
      }elseif($key->expert_id){
        $name = $key->expert->headname.$key->expert->firstname.' '.$key->expert->lastname;
        $display .= "
        <tr>
          <td>
          <input type='checkbox' name='check_users[]' value='".$key->expert->email.','.$name."'>
          </td>
          <td><b>".$name.''.'</b> email: '.$key->expert->email.'<br>'.
            '<b>ความเชี่ยวชาญ </b>'.highlightKeywords($key->title_th,$search).'('.highlightKeywords($key->title_eng,$search).')'.
          "</td>
        </tr>
        ";
      }
    }

    foreach ($creatives as $key) {
      $cu++;
      $name = $key->researcher->headname.$key->researcher->firstname.' '.$key->researcher->lastname;
      $display .= "
      <tr>
        <td>
        <input type='checkbox' name='check_users[]' value='".$key->researcher->email.','.$name."'>
        </td>
        <td><b>";
          $display .= $name.''.'</b> email: '.$key->researcher->email.'<br>'.
          '<b>ผลงาน </b>'.highlightKeywords($key->title,$search).'('.highlightKeywords($key->keyword,$search).')';
        $display .="</td>
      </tr>
      ";
    }

    $display .= "
    </table>
    ";
    if($cu!=0){
      echo $display;
    }else{
      echo ' - ไม่พบข้อมูลผู้วิจัยและผู้เชี่ยวชาญ - ';
    }
  }
  public function sendquest(QuestRequest $request)
  {
      $post = $request->all();
      $users = $request['check_users'];
      $allreceiver = '';
      foreach ($users as $key => $value) {
        $allreceiver .= $value.'|';
      }
      $data = array(
        'topic' => $post['topic'],
        'detail' => $post['detail'],
        'address' => $post['address'],
        'tel' => $post['tel'],
        'email' => $post['email'],
        'sender' => $post['sender'],
        'receiver' => $allreceiver,
        'status' => '1',
        'timeup' => date("Y-m-d H:i:s")
      );
      $check = Question::insert($data);
      if($check>0){return 0;}else{return 1;}
  }

}
