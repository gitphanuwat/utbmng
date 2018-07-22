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
              <h3 class="box-title">ปฏิทินชุมชน</h3>
            </div>
            <!-- /.box-header -->

            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <div class="displayrecord">
                </div>
                <button type="button" class="btn btn-primary btndetail">เพิ่มข้อมูล >></button>
              </div>
              <!-- /.box-body -->
            </div>

          <div id='showdetail'>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">กิจกรรม</h3>
              </div>
              <div class="box">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                    <!-- form start -->
                    <div id = 'msgname'></div>

                    <form role="form" method="POST" id="form_data" name="form_data" enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group" id='j'>
                          <label>ชื่อกิจกรรม</label>
                          <input type="text" class="form-control" name="title" id="title" placeholder="ชื่อกิจกรรม">
                        </div>
                        <div class="form-group" style="width:250px">
                          <label>ประเภท</label>
                          <select name="type" id="type" class="form-control">
                            <option value="1">งานประจำปี</option>
                            <option value="2">งานบริการชุมชน</option>
                            <option value="3">ส่งเสริมท่องเที่ยว</option>
                            <option value="4">งานประเพณี</option>
                            <option value="5">ทำนุบำรุงศิลปะวัฒนธรรม</option>
                            <option value="6">อื่นๆ</option>
                          </select>
                        </div>
                        <div class="form-group" >
                          <label>รายละเอียด</label>
                          <textarea type="text" rows="8" class="form-control" name="detail" id="detail"></textarea>
                        </div>
                        <div class="form-group">
                          <label>สถานที่จัด</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="สถานที่จัด">
                        </div>
                        <div class="form-group">
                          <label>วันเริ่มต้น:</label>
                          <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" name="startdate" id="startdate" value="2018-07-15 12:45">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>วันสิ้นสุด:</label>
                          <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" name="enddate" id="enddate" value="2018-07-16 12:45">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>
                            <input type="checkbox" name="repeat" id="repeat" class="minimal" value="1">
                            กิจกรรมประจำปี
                          </label>
                        </div>
                        <div class="form-group">
                          <label>ข้อมูลติดต่อ</label>
                          <input type="text" class="form-control" name="contact" id="contact" placeholder="ข้อมูลติดต่อ">
                        </div>
                        <div class="form-group" >
                          <label>วันที่ : {{ date('Y-m-d h:i:sa') }}</label><br>
                        </div>

                        <input type="hidden"  id="id">
                        <button type="button"  class="btn btn-primary saverecord">บันทึกข้อมูล</button>
                        <button type="button" class="btn btn-primary updaterecord">อัพเดทข้อมูล</button>
                        <button type="reset" class="btn btn-danger btncancel">ยกเลิก</button>
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="box-body">
                        <div class="form-group">
                          <label>รูปภาพประกอบ</label>
                          <div id='userpicture'>
                            <img class="img-responsive img-squar" src="{{url('/images/no_image.png')}}" width="250">
                          </div>
                          <input type="file" class="form-control" name="picture" id="picture">
                          <input type="text" class="form-control" name="pictureold" id="pictureold">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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
      $('#showdetail').hide();
      //$('.btndetail').hide();
      $('.updaterecord').hide();

      $('.btndetail').click(function(){
          $('#showdetail').show();
          $('.btndetail').hide();
          $('#msgname').html('');
      });
      $('.btncancel').click(function(){
          $('.updaterecord').hide();
          $('.saverecord').show();
          $('.btndetail').show();
          $('#showdetail').hide();
          $('#msgname').html('');

      });
      displaydata();

      //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

      $('body').delegate('.edit','click',function(){
        $('.updaterecord').show();
        $('.saverecord').hide();
        $('#showdetail').show();
        $('.btndetail').hide();
        $('#msgname').html('');
        $('#title').focus();
        var id = $(this).data('id');

        //alert(0);
        $.ajax({
            url : '{!! url('managerset/event') !!}'+'/'+id+'/edit',
            type : "get",
            //asyncfalse
            data : {
              '_token': '{{ csrf_token() }}'
            },
            success : function(e)
            {
              //alert(e.name);
              $('#id').val(e.id);
              $('#title').val(e.title);
              $('#type').val(e.type);
              $('#detail').val(e.detail);
              $('#address').val(e.address);
              $('#startdate').val(e.startdate);
              $('#enddate').val(e.enddate);
              $('#repeat').val(e.repeat);
              $('#contact').val(e.contact);
              $('#pictureold').val(e.picture);
              $('#userpicture').html('<img class="img-responsive img-squar" src="{{url("/images/event")}}/'+e.picture+'" width="250">');

            },
            error:function(err){
                  alert('สิทธิ์การใช้งานไม่ถูกต้อง');
             }
        });

      });


      $('body').delegate('.delete','click',function(){
        if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
        var id = $(this).data('id');
        $('.updaterecord').hide();
        $('.saverecord').show();
        $('#showdetail').hide();
        $('.btndetail').show();
        $('#msgname').html('');
        $.ajax({
            url : '{!! url('managerset/event') !!}'+'/'+id,
            type : "POST",
            //asyncfalse
            data : {
              '_method':'DELETE',
              '_token': '{{ csrf_token() }}'
            },
            success : function(d)
            {
              //alert(d);
              $("#form_data")[0].reset();
              displaydata();
            },
            error:function(err){
                  alert('สิทธิ์การใช้งานไม่ถูกต้อง');
             }
        });
      }
      });
      $('#startdate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom auto",
        todayHighlight: true,
        todayBtn: true,
        language: 'th',//เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
        thaiyear: true//Set เป็นปี พ.ศ.
      });
      $('#enddate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom auto",
        todayHighlight: true,
        todayBtn: true,
        language: 'th',//เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
        thaiyear: true//Set เป็นปี พ.ศ.
      })
  });

      $('.saverecord').click(function(){

        $.ajax({
            url : '{!! url('managerset/event') !!}',
            async:false,
            type:'post',
            processData: false,
            contentType: false,
            data:new FormData($("#form_data")[0]),
            success:function(d)
            {
              if(d.check){
                displaydata();
                $('#userpicture').html('<img class="img-responsive img-squar" src="{{url("/images/no_image.png")}}" width="250">');
                $( '#msgname' ).html('<div class="alert alert-success">บันทึกข้อมูลสำเร็จ</div>');
              }else{
                $( '#msgname' ).html('<div class="alert alert-danger">เกิดข้อผิดพลาด</div>');
              }
              $("#form_data")[0].reset();
              $('#name').focus();
            },
            error:function(err){
                //alert(err);
                if( err.status === 422 ) {
                  var errors = err.responseJSON; //this will get the errors response data.
                  errorsHtml = '<div class="alert alert-danger"><ul>';
                  $.each( errors, function( key, value ) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                  });
                  errorsHtml += '</ul></di>';
                  $( '#msgname' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                }else{
                  $( '#msgname' ).html( 'ERROR : '+err.status );
                }
             }

        });
      }) ;


    $('.updaterecord').click(function(){
      $('.updaterecord').show();
      $('.saverecord').hide();
      $('#showdetail').show();
      $('.btndetail').hide();
      $('#msgname').html('');
      $('#title').focus();
      var id = $('#id').val();
            $.ajax({
              url : '{!! url('managerset/eventpost') !!}'+'/'+id,
              async:false,
              type:'post',
              processData: false,
              contentType: false,
              data:new FormData($("#form_data")[0]),
                success : function(re)
                {
                  //alert(re);
                  if(re == 0){
                    displaydata();
                    $( '#msgname' ).html('<div class="alert alert-success">บันทึกข้อมูลสำเร็จ</div>');
                  }else{
                    $( '#msgname' ).html('<div class="alert alert-danger">เกิดข้อผิดพลาด</div>');
                  }
                  $('.updaterecord').hide();
                  $('.saverecord').show();
                  $('#showdetail').hide();
                  $('.btndetail').show();
                  $("#form_data")[0].reset();
                },
                error:function(err){
                    //alert(err);
                    if( err.status === 422 ) {
                      var errors = err.responseJSON; //this will get the errors response data.
                      errorsHtml = '<div class="alert alert-danger"><ul>';
                      $.each( errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                      });
                      errorsHtml += '</ul></di>';
                      $( '#msgname' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                    }else{
                      $( '#msgname' ).html( 'ERROR : '+err.status );
                    }
                 }
            });
    }) ;

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
