<?php
use App\Type;

use App\Social;
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

    $ido = session('sess_org');
    //$csocial = Social::where('organize_id',$ido)->get();
    $organize = Organize::find($ido);
    ////
    $cperson = Person::where('organize_id',$ido)->get();
    $cvillage = Village::where('organize_id',$ido)->get();
    $cgroup = Group::where('organize_id',$ido)->get();
    $cactivity = Activity::where('organize_id',$ido)->get();
    $ctourist = Tourist::where('organize_id',$ido)->get();
    $cevent = Event::where('organize_id',$ido)->get();
    $cproblem = Problem::where('organize_id',$ido)->get();

    $cinfo= Info::where('organize_id',$ido)->get();
    $cpolltopic = Polltopic::where('organize_id',$ido)->get();
    $ccomplaint = Complaint::where('organize_id',$ido)->get();
    $cdownload = Download::where('organize_id',$ido)->get();


?>

<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset("/images/lrd_logo.png") }}"  alt="Local Research Development">
    </div>
    <div class="pull-left info">
      <p>UTB System</p>
      <a href="#">Uttaradit Book System.</a>
    </div>
  </div>

  <!-- search form -->
  <form action="{{ url('search') }}" method="POST" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Search...">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <span class="input-group-btn">
            <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- sidebar menu: : style can be found in sidebar.less -->

<ul class="sidebar-menu">

<li class="header">เมนู:ข้อมูลหน่วยงาน</li>
<li {!! classActivePath($organize->title) !!}><a href="{{url('')}}/{{$organize->title}}"><i class="fa fa-dashboard"></i> <span>ศูนย์ข้อมูลข่าวสาร</span>
<span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'csocial'></div></small></span></a></li>
<li {!! classActivePath($organize->title.'/organize') !!}><a href="{{url('')}}/{{$organize->title}}/organize"><i class="fa fa-home"></i><span>ข้อมูลหน่วยงาน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'corganize'></div></small></span></a></li>
<li {!! classActivePath($organize->title.'/person') !!}><a href="{{url('')}}/{{$organize->title}}/person"><i class="fa fa-home"></i><span>บุคลากร</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cperson'>{{ $cperson->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/village') !!}><a href="{{ url('')}}/{{$organize->title}}/village"><i class="fa fa-users"></i> <span>ข้อมูลชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cvillage'>{{ $cvillage->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/group') !!}><a href="{{ url('')}}/{{$organize->title}}/group"><i class="fa fa-tags"></i> <span>การรวมกลุ่มชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cgroup'>{{ $cgroup->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/activity') !!}><a href="{{ url('')}}/{{$organize->title}}/activity"><i class="fa fa-flag"></i> <span>เรื่องเด่นชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cactivity'>{{ $cactivity->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/tourist') !!}><a href="{{ url('')}}/{{$organize->title}}/tourist"><i class="fa fa-image"></i> <span>แหล่งท่องเที่ยว</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'ctourist'>{{ $ctourist->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/event') !!}><a href="{{ url('')}}/{{$organize->title}}/event"><i class="fa fa-calendar"></i> <span>ปฏิทินกิจกรรม</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cevent'>{{ $cevent->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/problem') !!}><a href="{{ url('')}}/{{$organize->title}}/problem"><i class="fa fa-question"></i> <span>ปัญหาชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cproblem'>{{ $cproblem->count() }}</div></small></span></a></li>
<li><hr></li>
<li {!! classActivePath($organize->title.'/info') !!}><a href="{{ url('')}}/{{$organize->title}}/info"><i class="fa fa-newspaper-o"></i> ข่าวสาร&กิจกรรม
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cinfo'>{{ $cinfo->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/polltopic') !!}><a href="{{ url('')}}/{{$organize->title}}/polltopic"><i class="fa fa-server"></i> <span>สำรวจความคิดเห็น</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cpolltopic'>{{ $cpolltopic->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/complaint') !!}><a href="{{ url('')}}/{{$organize->title}}/complaint"><i class="fa fa-legal"></i> <span>เรื่องร้องเรียน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'ccomplaint'>{{ $ccomplaint->count() }}</div></small></span></a></li>
<li {!! classActivePath($organize->title.'/download') !!}><a href="{{ url('')}}/{{$organize->title}}/download"><i class="fa fa-paperclip"></i> ดาวน์โหลดเอกสาร
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cdownload'>{{ $cdownload->count() }}</div></small></span></a></li>
<li><hr></li>
<li {!! classActivePath($organize->title.'/search') !!}><a href="{{ url('search')}}"><i class="fa fa-search"></i> <span>ค้นหาข้อมูล</span></a></li>
<!-- Authentication Links -->
<li {!! classActivePath('login') !!}><a href="http://localhost/utb/public_html/login"><i class="fa fa-lock"></i> <span>เข้าสู่ระบบ</span></a></li>


  </ul>
</section>
