<?php
use App\Type;

use App\Social;
use App\Organize;
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

use App\Person;

    //$csocial = Social::get();
    $corganize = Organize::get();
    $cvillage = Village::get();
    $cgroup = Group::get();
    $cactivity = Activity::get();
    $ctourist = Tourist::get();
    $cevent = Event::get();
    $cproblem = Problem::get();

    $cinfo= Info::get();
    $cpolltopic = Polltopic::get();
    $ccomplaint = Complaint::where('permit','1')->get();
    $cdownload = Download::get();

    $cperson = Person::get();

?>

<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset("/images/utb_logo.png") }}"  alt="Uttaradit Book System">
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
<li {!! classActivePath('social') !!}><a href="{{ url('social')}}"><i class="fa fa-dashboard"></i> <span>ศูนย์ข้อมูลข่าวสาร</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'csocial'></div></small></span></a></li>
<li {!! classActivePath('organize') !!}><a href="{{ url('/organize')}}"><i class="fa fa-home"></i><span>ข้อมูลหน่วยงาน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'corganize'>{{ $corganize->count() }}</div></small></span></a></li>
<li {!! classActivePath('person') !!}><a href="{{ url('/person')}}"><i class="fa fa-user"></i><span>ข้อมูลบุคลากร</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'corganize'>{{ $cperson->count() }}</div></small></span></a></li>
<li {!! classActivePath('village') !!}><a href="{{ url('/village')}}"><i class="fa fa-users"></i> <span>ข้อมูลชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cvillage'>{{ $cvillage->count() }}</div></small></span></a></li>
<li {!! classActivePath('group') !!}><a href="{{ url('/group')}}"><i class="fa fa-tags"></i> <span>การรวมกลุ่มชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cgroup'>{{ $cgroup->count() }}</div></small></span></a></li>
<li {!! classActivePath('activity') !!}><a href="{{ url('/activity')}}"><i class="fa fa-flag"></i> <span>เรื่องเด่นชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cactivity'>{{ $cactivity->count() }}</div></small></span></a></li>
<li {!! classActivePath('tourist') !!}><a href="{{ url('/tourist')}}"><i class="fa fa-image"></i> <span>แหล่งท่องเที่ยว</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'ctourist'>{{ $ctourist->count() }}</div></small></span></a></li>
<li {!! classActivePath('event') !!}><a href="{{ url('/event')}}"><i class="fa fa-calendar"></i> <span>ปฏิทินกิจกรรม</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cevent'>{{ $cevent->count() }}</div></small></span></a></li>
<li {!! classActivePath('problem') !!}><a href="{{ url('/problem')}}"><i class="fa fa-question"></i> <span>ปัญหาชุมชน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cproblem'>{{ $cproblem->count() }}</div></small></span></a></li>
<li><hr></li>
<li {!! classActivePath('info') !!}><a href="{{ url('/info')}}"><i class="fa fa-newspaper-o"></i> ข่าวสาร&กิจกรรม
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cinfo'>{{ $cinfo->count() }}</div></small></span></a></li>
<li {!! classActivePath('polltopic') !!}><a href="{{ url('/polltopic')}}"><i class="fa fa-server"></i> <span>สำรวจความคิดเห็น</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cpolltopic'>{{ $cpolltopic->count() }}</div></small></span></a></li>
<li {!! classActivePath('complaint') !!}><a href="{{ url('/complaint')}}"><i class="fa fa-legal"></i> <span>เรื่องร้องเรียน</span>
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'ccomplaint'>{{ $ccomplaint->count() }}</div></small></span></a></li>
<li {!! classActivePath('download') !!}><a href="{{ url('/download')}}"><i class="fa fa-paperclip"></i> ดาวน์โหลดเอกสาร
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cdownload'>{{ $cdownload->count() }}</div></small></span></a></li>
<li {!! classActivePath('rss') !!}><a href="{{ url('/rss')}}"><i class="fa fa-paperclip"></i> หนังสือราชการ
  <span class="pull-right-container"><small class="label pull-right bg-gray"><div id = 'cdownload'></div></small></span></a></li>
<li><hr></li>
<li {!! classActivePath('search') !!}><a href="{{ url('search')}}"><i class="fa fa-search"></i> <span>ค้นหาข้อมูล</span></a></li>
<!-- Authentication Links -->
<li {!! classActivePath('login') !!}><a href="http://localhost/utb/public_html/login"><i class="fa fa-lock"></i> <span>เข้าสู่ระบบ</span></a></li>


  </ul>
</section>
