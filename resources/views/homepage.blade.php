@extends('layoutpages.template')
@section('title',$data->name)
@section('subtitle','อ.'.$data->amphur->name.' จังหวัดอุตรดิตถ์')
<?php
  use App\Counterorg;
  //session(['sess_fb' => '']);
  if(!session('sess_fb')){
    //include ('makejson.php');
    session(['sess_fb' => 'now']);
  }
?>
@section('body')
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$person->count()}}</h3>
        <p>บุคลากร</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="{{url('')}}/{{$data->title}}/person" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$village->count()}}</h3>
        <p>ชุมชน</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="{{url('')}}/{{$data->title}}/village" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$activity->count()}}</h3>
        <p>เรื่องเด่น</p>
      </div>
      <div class="icon">
        <i class="fa fa-flag"></i>
      </div>
      <a href="{{url('')}}/{{$data->title}}/activity" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$tourist->count()}}</h3>
        <p>แหล่งท่องเที่ยว</p>
      </div>
      <div class="icon">
        <i class="fa fa-photo"></i>
      </div>
      <a href="{{url('')}}/{{$data->title}}/tourist" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-8 connectedSortable">
    <div class="box box-success">
      <div class="box-header">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">กิจกรรมชุมชน</h3>
      </div>

      <div class="box-body chat">
        <div class="item">
            <div id="showfeed"></div>
            <div align="center" id="loadfeed"><img src="images/ajax-loader.gif" align="absmiddle"><br>Facebook Loading...</div>
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
          <a href='{{url('')}}/{{$data->title}}/organize' class='name'>
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
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-calendar"></i>

        <h3 class="box-title">กิจกรรมชุมชน</h3>
        <!-- tools box -->
        <div class="box-tools pull-right">
          <a href="{{url('')}}/{{$data->title}}/event" class='name'>
            <small class='text-muted pull-right'><i class='fa fa-list'></i> More..</small>
          </a>
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-black">
        <div class="row">
          <div class="col-sm-12">
            <div id='showevent'></div>
            <small class='text-muted pull-right'>กิจกรรมที่กำลังจะมาถึง</small>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box -->

      <!-- LINE CHART -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">สถิติการใช้ระบบ</h3>
          <div class="box-tools pull-right">
            <a href="{{url('')}}/{{$data->title}}/stat" class='name'>
              <small class='text-muted pull-right'><i class='fa fa-list'></i> More..</small>
            </a>
          </div>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="line-chart" style="height: 250px;"></div>
          <div id='counter'></div>
        </div>
      </div>

    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-envelope"></i>

        <h3 class="box-title">แจ้งปัญหาชุมชน</h3>
        <!-- tools box -->
        <div class="box-tools pull-right">
          <a href='{{url('')}}/{{$data->title}}/problem' class='name'>
            <small class='text-muted pull-right'><i class='fa fa-list'></i> More..</small>
          </a>
        </div>
        <!-- /. tools -->
      </div>
      <div id='showproblem'>
      <form role="form" id="form_problem" name="form_problem">
      <div class="box-body">
        <div class="form-group" style="width:250px">
          <label>หน่วยงาน</label>
          <select name="organize_id" id="organize_id" class="form-control">
            <?php
                echo '<option value="'.$data->id.'">'.$data->name.'</option>';
             ?>
          </select>
        </div>
          <div class="form-group">
            <input type="text" class="form-control" name="sender" placeholder="ผู้ส่ง">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="หัวเรื่อง">
          </div>
          <div>
            <textarea class="textarea" placeholder="ข้อความ" name="detail" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
      </div>
      <div class="box-footer clearfix">
        <button type="button" class="pull-right btn btn-default" id="sendproblem">ส่งข้อมูล
          <i class="fa fa-arrow-circle-right"></i></button>
          {{ csrf_field() }}
          {{ method_field('post') }}
      </div>
    </form>
    </div>
    </div>

    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">สำรวจความคิดเห็น</h3>
        <div class="box-tools pull-right">
          <a href='{{url('')}}/{{$data->title}}/polltopic' class='name'>
            <small class='text-muted pull-right'><i class='fa fa-list'></i> More..</small>
          </a>
        </div>
      </div>
      <div class="box-body">
        <form role="form" id="form_poll" name="form_poll">
        <div class="form-group">
          <div id='showpoll'></div>
          <button type="button" class="pull-right btn btn-default" id="sendpoll">ส่งข้อมูล
            <i class="fa fa-arrow-circle-right"></i></button>
            {{ csrf_field() }}
            {{ method_field('put') }}
        </div>
      </form>
      </div>
    </div>
  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->
@endsection

@section('script')
<script  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCkw9kj6fQxsFQJ89BbuRqPRZ5c_SdoDqg"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- counter -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset("assets/plugins/morris/morris.min.js") }}"></script>

<script>
var counterfeed=0;
    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
          //alert(0);
          $('#loadfeed').show();
            //displayfeed();
        }
    });
    function appendData() {
        var html = '';
        for (i = 0; i < 10; i++) {
            html += '<p class="dynamic">Dynamic Data :  This is test data.</br>Next line.</p>';
        }
        $('#myScroll').append(html);
  counterfeed++;

  //if(counter==2)
  //$('#myScroll').append('<button id="uniqueButton" style="margin-left: 50%; background-color: powderblue;">Click</button></br></br>');
    }
</script>

<script>
  var locations = <?php print_r(json_encode($data)) ?>;
  var map = new GMaps({
    el: '#map',
    lat: locations.lat,
    lng: locations.lng,
    zoom: 12,
  });
      map.addMarker({
          id: locations.id ,
          lat: locations.lat ,
          lng: locations.lng ,
          title: locations.name ,
          infoWindow: {
             content: locations.name
          }
      });
</script>


<script>
  $(function () {
    "use strict";
    counterhit();
    displaypoll();
    loadevent();
    displayfeed();
    $('#sendpoll').click(function(){
      updatepoll();
    });
    $('#sendproblem').click(function(){
      postproblem();
    });
  });

  function counterhit(){
    $.ajax({
      url : '{!! url('managerset/counterhit') !!}',
      type : "get",
      data : {
        '_token': '{{ csrf_token() }}'
      },
      success : function(s)
      {
        //alert(s);
        //$('#counter').html(s);
      }
    });
  }
  function displayfeed(){
    $.ajax({
      url : '{!! url('feed/create') !!}',
      type : "get",
      //asyncfalse
      data : {
        '_token': '{{ csrf_token() }}'
      },
      success : function(s)
      {
        $('#showfeed').append(s);
        $('#loadfeed').hide();
      }
    });
  }
  function displaypoll(){
    $.ajax({
      //url : '{!! url('polltopic/1/edit') !!}',
      url : '{!! url('managerset/polltopic/1/edit') !!}',
      type : "get",
      data : {
        '_token': '{{ csrf_token() }}'
      },
      success : function(s)
      {
        $('#showpoll').html(s);
      }
    });
  }
  function updatepoll(){
    var id = $('#idpoll').val();
    //var t = $('#p1').val();
    //alert(t);
    $.ajax({
      url : '{!! url('managerset/polltopic') !!}'+'/'+id,
      async:false,
      type:'post',
      processData: false,
      contentType: false,
      data:new FormData($("#form_poll")[0]),
      success : function(s)
      {
        //alert(s);
        $('#showpoll').html(s);
      }
    });
  }
  function postproblem(){
    //alert(0);
    $.ajax({
      url : '{!! url('managerset/problem') !!}',
      async:false,
      type:'post',
      processData: false,
      contentType: false,
      data:new FormData($("#form_problem")[0]),
      success : function(s)
      {
        //alert(s);
        $('#showproblem').html(s);
      },
      error:function(err){
          if(err){alert('กรุณาเติมข้อมูลให้ถูกต้อง');}
       }
    });
  }
  function loadevent(){
    $.ajax({
      url : '{!! url('managerset/eventshow') !!}',
      type : "get",
      data : {
        '_token': '{{ csrf_token() }}'
      },
      success : function(s)
      {
        $('#showevent').html(s);
      }
    });
  }
</script>


<?php
    $ido = session('sess_org');
    $nowdate = date("Y-m-d");
    $date=date("Y-m-d",strtotime("-6 days",strtotime($nowdate)));
    $end_date = date("Y-m-d");
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
?>


@endsection
