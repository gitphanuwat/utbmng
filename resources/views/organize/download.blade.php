@extends('layoutpages.template')
@section('title','ดาวน์โหลดเอกสาร')
@section('subtitle',session('sess_orgname'))
@section('body')
<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ดาวน์โหลดเอกสาร</h3>
      </div>
      <!-- /.box-header -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-download"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">หนังสือราชการ</span>
              <span class="info-box-number">{{ count($data->where('type','1')) }} รายการ</span>
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
            <span class="info-box-icon bg-green"><i class="ion ion-android-download"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">มาตรฐานต่างๆ</span>
              <span class="info-box-number">{{ count($data->where('type','2')) }} รายการ</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-android-download"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">แบบฟอร์ม</span>
              <span class="info-box-number">{{ count($data->where('type','3')) }} รายการ</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-android-download"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">เอกสารอื่นๆ</span>
              <span class="info-box-number">{{ count($data->where('type','4')) }} รายการ</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
      </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ข่าวสาร/กิจกรรม</h3>
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
        url : '{!! url('managerset/download/create') !!}',
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
        url : '{!! url('download') !!}'+'/'+id,
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
