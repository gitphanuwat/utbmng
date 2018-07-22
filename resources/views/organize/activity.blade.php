@extends('layoutpages.template')
@section('title','เรื่องเด่นในชุมชน')
@section('subtitle','จัดการข้อมูล')
@section('body')
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-6">
  <div class="info-box">
    <span class="info-box-icon bg-blue"><i class="ion ion-ribbon-b"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">โครงการเด่น</span>
      <span class="info-box-number">{{$data->where('type','1')->count()}} รายการ</span>
    </div>
  </div>
</div>
<div class="clearfix visible-sm-block"></div>
<div class="col-md-3 col-sm-6 col-xs-6">
  <div class="info-box">
    <span class="info-box-icon bg-aqua"><i class="ion ion-map"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">สถานที่สำคัญ</span>
      <span class="info-box-number">{{$data->where('type','2')->count()}} รายการ</span>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-6 col-xs-6">
  <div class="info-box">
    <span class="info-box-icon bg-green"><i class="ion ion-map"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">ผลิตภัณฑ์ชุมชน</span>
      <span class="info-box-number">{{$data->where('type','3')->count()}} รายการ</span>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-6 col-xs-6">
  <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="ion ion-bag"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">อื่นๆ</span>
      <span class="info-box-number">{{$data->where('type','4')->count()}} รายการ</span>
    </div>
  </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">เรื่องเด่นในชุมชน</h3>
      </div>
      <div class="box">
        <div class="box-body">
          <div class="displayrecord" id='i'>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="box-body">
          <div class="showdetail" id='j'>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection
@section('script')

<!-- DataTables -->
<script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>

<script type="text/javascript">
$(function(){
  $('.showdetail').hide();
  $('body').delegate('.btncancel','click',function(){
    $('.showdetail').hide();
  });
  $('body').delegate('.bndetail','click',function(){
    $('.showdetail').show();
    var id = $(this).data('id');
    displaydetail(id);
  });
  displaydata();
});
function displaydata(){
  $.ajax({
    url : '{!! url('managerset/activity/create') !!}',
    type : "get",
    //asyncfalse
    data : {},
    success : function(s)
    {
      $('.displayrecord').html(s);
      $("#example1").DataTable();
    }
  });
}
function displaydetail(id){
  $.ajax({
    url : '{!! url('activity') !!}'+'/'+id,
    //url : '{!! url('organize/create') !!}',
    type : "get",
    //asyncfalse
    data : {},
    success : function(s)
    {
      $('.showdetail').html(s);
    }
  });
}
</script>

@endsection
