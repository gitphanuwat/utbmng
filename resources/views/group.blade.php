@extends('layouthomes.template')
@section('title','กลุ่มชุมชน')
@section('subtitle','จัดการข้อมูล')
@section('body')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="ion ion-pricetags"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ระดับจังหวัด</span>
        <span class="info-box-number">{{$data->where('type','1')->count()}} กลุ่ม</span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="ion ion-pricetags"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ระดับอำเภอ</span>
        <span class="info-box-number">{{$data->where('type','2')->count()}} กลุ่ม</span>
      </div>
    </div>
  </div>
  <!-- /.col -->
  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="ion-pricetag"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ระดับตำบล</span>
        <span class="info-box-number">{{$data->where('type','3')->count()}} กลุ่ม</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion-location"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ระดับหมู่บ้าน</span>
        <span class="info-box-number">{{$data->where('type','4')->count()}} กลุ่ม</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>      <!-- /.row -->

<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">กลุ่มชุมชน</h3>
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
<!-- Geolocation -->

<script type="text/javascript">
    $(function(){
      $('.showdetail').hide();
      $('body').delegate('.btncancel','click',function(){
        $('.showdetail').hide();
      });
      displaydata();
      $('body').delegate('.bndetail','click',function(){
        $('.showdetail').show();
        var id = $(this).data('id');
        displaydetail(id);
      });
    });

    function displaydata(){
      $.ajax({
        url : '{!! url('group/create') !!}',
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
        url : '{!! url('group') !!}'+'/'+id,
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
