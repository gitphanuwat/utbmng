<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Organize;
use App\Person;
use App\Village;
use App\Group;
use App\Activity;
use App\Tourist;
use App\Event;
use App\Problem;
use App\Info;
use App\Polltopic;
use App\Complaint;
use App\Download;

use App\Http\Requests\QuestRequest;

class GuestController extends Controller
{

  public function index()
  {
    return view('search');
  }

  public function getSearch(Request $request)
  {
    $search = $request->input('search');
    session(['sess_search' => $search]);

    $organizes = Organize::where('title','LIKE',"%$search%")
    ->orWhere('name','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('website','LIKE',"%$search%")
    ->orWhere('facebook','LIKE',"%$search%")
    ->orWhere('tel','LIKE',"%$search%")
    ->get();
    $persons = Person::where('firstname','LIKE',"%$search%")
    ->orWhere('lastname','LIKE',"%$search%")
    ->orWhere('position','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('tel','LIKE',"%$search%")
    ->orWhere('email','LIKE',"%$search%")
    ->get();
    $villages = Village::where('name','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('leader','LIKE',"%$search%")
    ->orWhere('contact','LIKE',"%$search%")
    ->orWhere('tel','LIKE',"%$search%")
    ->get();
    $groups = Group::where('name','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('leader','LIKE',"%$search%")
    ->orWhere('contact','LIKE',"%$search%")
    ->orWhere('tel','LIKE',"%$search%")
    ->get();
    $activitys = Activity::where('name','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('leader','LIKE',"%$search%")
    ->get();
    $tourists = Tourist::where('name','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('website','LIKE',"%$search%")
    ->get();
    $events = Event::where('title','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->orWhere('contact','LIKE',"%$search%")
    ->get();
    $problems = Problem::where('name','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('address','LIKE',"%$search%")
    ->get();
    $info = Info::where('title','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->get();
    $polltopics = Polltopic::where('title','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->get();
    $complaints = Complaint::where('name','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->orWhere('sender','LIKE',"%$search%")
    ->orWhere('contact','LIKE',"%$search%")
    ->get();
    $downloads = Download::where('title','LIKE',"%$search%")
    ->orWhere('detail','LIKE',"%$search%")
    ->get();

      $data = [
        'organizes' => $organizes,
        'persons' => $persons,
        'villages' => $villages,
        'groups' => $groups,
        'activitys' => $activitys,
        'tourists' => $tourists,
        'events' => $events,
        'problems' => $problems,
        'infos' => $info,
        'polltopics' => $polltopics,
        'complaints' => $complaints,
        'downloads' => $downloads,
          'search' => $search,
      ];
      return view('search', $data);
  }

  public function postSearch(Request $request)
  {
      return $this->getSearch($request);
  }


}
