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

    public function create1()
    {
      $display = 'test';
      return $display;
    }

    public function create()
    {

      $token = "1496188763803694|13ca95b19789a800190bc4fe50eea910";
      //$pageID = '262013900603203';
      $pageID = '582857498471447';
      $pagearr = array('262013900603203','582857498471447','ILikeURU');

    //$pageID = 'ILikeURU';

        //$pageDetails = $this->getFacebookId($pageID,$token);
        //$get_data = $this->feedExtract($pageID,$token);

        $display ='';
        $ic=0;
        foreach ($pagearr as $key => $value) {
          $get_data = $this->feedExtract($value,$token);

          $display .= '<img class="attachment-img" src="'.$get_data['data'][$ic]['picture'].'" height="80" alt="Attachment Image">';
        //$display .= '<img src="'$get_data['data'][$ic]['picture'].'"><br>';
        //$display .= $get_data['data'][$ic]['created_time']).'<br>';
        $display .= $get_data['data'][$ic]['id'].'<br>';
        //$display .= $get_data['data'][$ic]['id'].'<br>';
        @$story = $get_data['data'][$ic]['message'];
        @$story = $get_data['data'][$ic]['story'];

        $display .= $story.'<br>';
        //$display .= $get_data['data'][$ic]['message'].'<br>';
        $display .= '<hr>';
        }
        return $display;
    }

    function getFacebookId($pageID,$token) // This function return facebook page details by its url
    {
       $json = file_get_contents('https://graph.facebook.com/'.$pageID.'?fields=picture,phone,fan_count,talking_about_count,name,about,link,website&access_token='.$token);
       $json = json_decode($json);
       return $json;
    }

    function feedExtract($pageFBID,$token)
    {
     $response = file_get_contents("https://graph.facebook.com/v2.6/$pageFBID/feed?fields=picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)&access_token=".$token);
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
