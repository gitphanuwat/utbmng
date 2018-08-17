@extends('layouthomes.template')
@section('title','บุคลากรในหน่วยงาน')
@section('subtitle','จังหวัดอุตรดิตถ์')
@section('body')
<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">บุคลากรในหน่วยงาน</h3>
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
      <div class="box">
        <div class="box-body box-profile">
          <div class="showprofile" id='k'>
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
      displaydata();
      $('body').delegate('.btncancel','click',function(){
        $('.showdetail').hide();
        $('.showprofile').hide();
      });
      $('body').delegate('.bndetail','click',function(){
        $('.showdetail').show();
        $('.showprofile').hide();
        var id = $(this).data('id');
        displayorg(id);
      });
      $('body').delegate('.bnprofile','click',function(){
        $('.showprofile').show();
        var id = $(this).data('id');
        displayprofile(id);
      });
  });

    function displaydata(){
      //alert(2);
      $.ajax({
        url : '{!! url('person/create') !!}',
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

    function displayorg(id){
      $.ajax({
        url : '{!! url("person") !!}'+'/'+id,
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

    function displayprofile(id){
      //alert(0);
      $.ajax({
        url : '{!! url("person") !!}'+'/'+id+'/edit',
        //url : '{!! url('organize/create') !!}',
        type : "get",
        //asyncfalse
        data : {},
        success : function(s)
        {
          $('.showprofile').html(s);
        }
      });
    }

</script>
@endsection
