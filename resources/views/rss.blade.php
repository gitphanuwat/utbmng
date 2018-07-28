@extends('layouthomes.template')
@section('title','หนังสือราชการ')
@section('subtitle','จัดการข้อมูล')
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
        <div class="box-footer">
          <p>
          เอกสารล่าสุดจาก ​RSS <a href="http://www.dla.go.th/">กรมส่งเสริมการปกครองท้องถิ่น</a>
        </p>
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
      $.ajax({
        url : '{!! url('rss/create') !!}',
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
