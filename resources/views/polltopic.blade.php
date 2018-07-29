@extends('layouthomes.template')
@section('title','แบบสำรวจความคิดเห็น')
@section('subtitle','จัดการข้อมูล')
@section('body')
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">การพัฒนา</span>
        <span class="info-box-number">{{$data->where('type','1')->count()}} เรื่อง<small>%</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-object-group"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">การดูแลป้องกัน</span>
        <span class="info-box-number">{{$data->where('type','2')->count()}} เรื่อง</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-send-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">การให้บริการ</span>
        <span class="info-box-number">{{$data->where('type','3')->count()}} เรื่อง</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ความเดือดร้อน</span>
        <span class="info-box-number">{{$data->where('type','4')->count()}} เรื่อง</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ปัญหาในชุมชน</h3>
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
        url : '{!! url('polltopic/create') !!}',
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
        url : '{!! url('polltopic') !!}'+'/'+id,
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
