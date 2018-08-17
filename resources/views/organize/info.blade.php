@extends('layoutpages.template')
@section('title','ข่าวสาร/กิจกรรม')
@section('subtitle',session('sess_orgname'))
@section('body')
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
        url : '{!! url('managerset/info/create') !!}',
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
        url : '{!! url('info') !!}'+'/'+id,
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
