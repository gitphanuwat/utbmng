@extends('layoutpages.template')
@section('title','บุคลากรในหน่วยงาน')
@section('subtitle',session('sess_orgname'))
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

      displaydata();

  });

    function displaydata(){
      //alert(2);
      $.ajax({
        url : '{!! url('managerset/person/create') !!}',
        type : "get",
        //asyncfalse
        data : {},
        success : function(s)
        {
          $('.displayrecord').html(s);
          //$("#example1").DataTable();
        }
      });
    }



</script>
@endsection
