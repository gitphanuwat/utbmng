@extends('layouthomes.template')

@section('title','ศูนย์ข้อมูลท้องถิ่น')
@section('subtitle','Uttaradit Book System')
@section('styles')

@endsection

<?php
  use App\Counter;
?>

@section('body')
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$organize->count()}}</h3>
        <p>หน่วยงาน</p>
      </div>
      <div class="icon">
        <i class="fa fa-home"></i>
      </div>
      <a href="{{url('/managerset/person')}}" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$person->count()}}</h3>
        <p>บุคลากร</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="{{url('/managerset/village')}}" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$village->count()}}</h3>
        <p>ชุมชน</p>
      </div>
      <div class="icon">
        <i class="fa fa-map"></i>
      </div>
      <a href="{{url('/managerset/activity')}}" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$activity->count()}}</h3>
        <p>เรื่องเด่น</p>
      </div>
      <div class="icon">
        <i class="fa fa-flag"></i>
      </div>
      <a href="{{url('/managerset/tourist')}}" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

  <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- /.nav-tabs-custom -->

            <!-- Chat box -->
            <div class="box box-success">
              <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title">กิจกรรมชุมชน</h3>
              </div>

              <div class="box-body chat">

                <div class="item">
                  <div id="myScroll">
                  <div id="showfeed">
                  </div>
                  <div align="center" id="loadfeed"><img src="images/ajax-loader.gif" align="absmiddle"><br>Facebook Loading...</div>
                  </div>
                </div>
              <div class="box-footer">
                <div class="input-group">
                  <input class="form-control" placeholder="Type message...">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-4 connectedSortable">

            <!-- Map box -->
            <div class="box box-info">
              <div class="box-header">
                <div class="box-tools pull-right">
                  <a href='{{url('/stat')}}' class='name'>
                    <small class='text-muted pull-right'><i class='fa fa-list'></i> More..</small>
                  </a>
                </div>
                <i class="fa fa-map-marker"></i>
                <h3 class="box-title">
                  หน่วยงาน
                </h3>
              </div>
              <div class="box-body chart-responsive">
                <div id="map" style="width: 100%; height: 200px">map</div>
              </div>
              <!-- /.box-body-->
            </div>
            <!-- /.box -->

            <!-- Calendar -->
            <div class="box box-solid bg-green-gradient">
              <div class="box-header">
                <i class="fa fa-calendar"></i>

                <h3 class="box-title">กิจกรรมชุมชน</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="#">Add new event</a></li>
                      <li><a href="#">Clear events</a></li>
                      <li class="divider"></li>
                      <li><a href="#">View calendar</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-black">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- Progress bars -->
                    <div class="clearfix">
                      <span class="pull-left">อบต.น้ำพี้</span>
                    </div>
                    <div>
                      <a href="#">กิจกรรมบุญบั้งไฟ หมู่บ้าน..</a>
                    </div>

                    <div class="clearfix">
                      <span class="pull-left">อบต.บ่อทอง</span>
                    </div>
                    <div>
                      <a href="#">ตักบาทเทโววัดบ่อทอง..</a>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="clearfix">
                      <span class="pull-left">อบต.ท่าสัก</span>
                    </div>
                    <div>
                      <a href="#">ประเพณีแห่นางแมว..</a>
                    </div>

                    <div class="clearfix">
                      <span class="pull-left">อบต.ชัยจุมพล</span>
                    </div>
                    <div>
                      <a href="#">แห่เทียนเข้าพรรษา..</a>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.box -->

              <!-- LINE CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">สถิติการใช้ระบบ</h3>
                  <div class="box-tools pull-right">
                    <a href='{{url('/stat')}}' class='name'>
                      <small class='text-muted pull-right'><i class='fa fa-list'></i> More..</small>
                    </a>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div>
              </div>

            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-envelope"></i>

                <h3 class="box-title">แจ้งปัญหาชุมชน</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <div class="box-body">
                <form action="#" method="post">
                  <div class="form-group">
                    <input type="email" class="form-control" name="emailto" placeholder="ผู้ส่ง">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="หัวเรื่อง">
                  </div>
                  <div>
                    <textarea class="textarea" placeholder="ข้อความ" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </form>
              </div>
              <div class="box-footer clearfix">
                <button type="button" class="pull-right btn btn-default" id="sendEmail">ส่งข้อมูล
                  <i class="fa fa-arrow-circle-right"></i></button>
              </div>
            </div>

            <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title">สำรวจความคิดเห็น</h3>
                <p>
                ท่านต้องการให้ชุมชนพัฒนาและแก้ไขปัญหาในด้านใดโดยเร็วมากที่สุด
              </p>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>
                    <input type="radio" name="r1" class="minimal" checked>
                    ระบบประปาประจำหมู่บ้าน
                  </label><br>
                  <label>
                    <input type="radio" name="r1" class="minimal">
                    ระบบเส้นทางสัญจรภายในชุมชน
                  </label><br>
                  <label>
                    <input type="radio" name="r1" class="minimal">
                    ระบบเสียงตามสาย
                  </label>
                  <button type="button" class="pull-right btn btn-default" id="sendEmail">ส่งข้อมูล
                    <i class="fa fa-arrow-circle-right"></i></button>

                </div>
              </div>
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

  <!-- Main row -->
  <div class="row">


  </div>



@endsection

@section('script')
<script  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCkw9kj6fQxsFQJ89BbuRqPRZ5c_SdoDqg"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
var counter=0;
    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
          $('#loadfeed').show();
            displayfeed();
        }
    });
    function appendData() {
        var html = '';
        for (i = 0; i < 10; i++) {
            html += '<p class="dynamic">Dynamic Data :  This is test data.</br>Next line.</p>';
        }
        $('#myScroll').append(html);
  counter++;

  //if(counter==2)
  //$('#myScroll').append('<button id="uniqueButton" style="margin-left: 50%; background-color: powderblue;">Click</button></br></br>');
    }
</script>

<script>
  var locations = <?php print_r(json_encode($organize)) ?>;
  var map = new GMaps({
    el: '#map',
    lat: 17.62,
    lng: 100.087,
    zoom: 12,
  });
  /*$.each( locations, function( index, value ){
      map.addMarker({
          id: value.id ,
          lat: value.lat ,
          lng: value.lng ,
          title: value.name ,
          infoWindow: {
             content: value.name
          }
      });
});*/
</script>


<script>
  $(function () {
    "use strict";
    counterhit();
    displayfeed();
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                    event.preventDefault();
                    $(this).ekkoLightbox();
    });
  });

  function counterhit(){
    $.ajax({
      url : '{!! url('/counterhit') !!}',
      type : "get",
      //asyncfalse
      data : {},
      success : function(s)
      {
        //$('#counter').html(s);
      }
    });
  }
  function displayfeed(){
    $.ajax({
      url : '{!! url('feed/create') !!}',
      type : "get",
      //asyncfalse
      data : {},
      success : function(s)
      {
        $('#showfeed').append(s);
        $('#loadfeed').hide();
      }
    });
  }
</script>



<?php
    $objcounter = Counter::get();
    $nowdate = date("Y-m-d");
    $date=date("Y-m-d",strtotime("-6 days",strtotime($nowdate)));
    $end_date = date("Y-m-d");
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
?>


@endsection
