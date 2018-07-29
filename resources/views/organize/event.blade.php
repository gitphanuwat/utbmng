@extends('layoutpages.template')
@section('title','ปฏิทินกิจกรรม')
@section('subtitle','จัดการข้อมูล')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{ asset("assets/plugins/datatables/dataTables.bootstrap.css") }}">
<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="{{ asset("assets/plugins/fullcalendar/fullcalendar.min.css") }}">
<link rel="stylesheet" href="{{ asset("assets/plugins/fullcalendar/fullcalendar.print.css") }}" media="print">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset("assets/plugins/datepicker/datepicker3.css") }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset("assets/plugins/iCheck/all.css") }}">

@endsection
@section('body')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
  </div>
</div><!-- /.row -->

<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ปฏิทินกิจกรรม</h3>
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
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset("assets/plugins/fullcalendar/fullcalendar.js") }}"></script>
<script src="{{ asset("assets/plugins/fullcalendar/locale/th.js") }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset("assets/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
<script src="{{ asset("assets/plugins/datepicker/locales/bootstrap-datepicker.th.js") }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset("assets/plugins/iCheck/icheck.min.js") }}"></script>

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
    url : '{!! url('managerset/event/create') !!}',
    type : "get",
    //asyncfalse
    data : {},
    success : function(s)
    {
      $('.displayrecord').html(s.display);
      $("#example1").DataTable();
      displayevent(s.data)
    }
  });
}
function displaydetail(id){
  $.ajax({
    url : '{!! url('event') !!}'+'/'+id+'/edit',
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

function displayevent(data){
$('#calendar').fullCalendar({
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
  },
  buttonIcons:{
      prev: 'left-single-arrow',
      next: 'right-single-arrow',
      prevYear: 'left-double-arrow',
      nextYear: 'right-double-arrow'
  },
  events : data,
      eventLimit:true,
      //hiddenDays: [ 2, 4 ],
      lang: 'th',
});
};

</script>
@endsection
