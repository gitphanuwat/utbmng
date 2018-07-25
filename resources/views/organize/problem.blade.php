@extends('layoutpages.template')
@section('title','ปัญหาในชุมชน')
@section('subtitle','จัดการข้อมูล')
@section('body')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <a class="btn btn-app">
        <span class="badge bg-blue">{{$data->where('type','1')->count()}} </span>
        <i class="fa fa-ship"></i> โครงสร้างพื้นฐานฯ
      </a>
      <a class="btn btn-app">
        <span class="badge bg-green">{{$data->where('type','2')->count()}} </span>
        <i class="fa fa-briefcase"></i> อาชีพฯ
      </a>
      <a class="btn btn-app">
        <span class="badge bg-yellow">{{$data->where('type','3')->count()}} </span>
        <i class="fa fa-user-md"></i> สุขภาพฯ
      </a>
      <a class="btn btn-app">
        <span class="badge bg-red">{{$data->where('type','4')->count()}} </span>
        <i class="fa fa-share-alt"></i> ความรู้ฯ
      </a>
      <a class="btn btn-app">
        <span class="badge bg-purple">{{$data->where('type','5')->count()}} </span>
        <i class="fa fa-users"></i> ความเข้มแข็งฯ
      </a>
      <a class="btn btn-app">
        <span class="badge bg-teal">{{$data->where('type','6')->count()}} </span>
        <i class="fa fa-photo"></i> ธรรมชาติฯ
      </a>
      <a class="btn btn-app">
        <span class="badge bg-maroon">{{$data->where('type','7')->count()}} </span>
        <i class="fa fa-list-ul"></i> อื่นๆ
      </a>

  </div>
</div>

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
        url : '{!! url('managerset/problem/create') !!}',
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
        url : '{!! url('problem') !!}'+'/'+id,
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
