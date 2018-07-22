@extends('layoutpages.template')
@section('title','แบบสำรวจความคิดเห็น')
@section('subtitle','จัดการข้อมูล')
@section('body')
<!-- Info boxes -->
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ด้านการพัฒนา</span>
        <span class="info-box-number">5 เรื่อง<small>%</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ด้านการส่งเสริม</span>
        <span class="info-box-number">6 เรื่อง</span>
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
      <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">การดูแลและป้องกัน</span>
        <span class="info-box-number">7 เรื่อง</span>
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
        <span class="info-box-text">ด้านการให้บริการ</span>
        <span class="info-box-number">2 เรื่อง</span>
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
              <h3 class="box-title">แบบสำรวจความคิดเห็น</h3>
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
            <div id = 'msgname'></div>
            <form role="form" id="form_data" name="form_data">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="box-body">
                    <div class="form-group">
                      <label>หัวข้อแบบสำรวจ</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="หัวข้อปัญหา">
                    </div>
                    <div class="form-group">
                      <label>รายละเอียด</label>
                      <textarea type="text" class="form-control" name="detail" id="detail"></textarea>
                    </div>
                    <div class="form-group" style="width:250px">
                      <label>ประเภทเอกสาร</label>
                      <select name="type" id="type" class="form-control">
                        <option value="1">ด้านการพัฒนาและส่งเสริม</option>
                        <option value="2">การดูแลและป้องกัน</option>
                        <option value="3">ด้านการให้บริการ</option>
                        <option value="4">ด้านอื่นๆ</option>
                      </select>
                    </div>
                    <input type="hidden"  id="id">
                    <button type="button"  class="btn btn-primary saverecord">บันทึกข้อมูล</button>
                    <button type="button" class="btn btn-primary updaterecord">อัพเดทข้อมูล</button>
                    <button type="reset" class="btn btn-danger btncancel">ยกเลิก</button>
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                  </div>
            </div>
          </div>
        </form>
          </div>


<div id='displaytopic'>
  <div class="box">
    <div class="box-body">
      <div class="showtopic" id='showtopic'>></div>
    </div>
  </div>
  <div id='msgtopic'></div>
  <form role="form" id="form_topic" name="form_topic">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box-body">
          <div class="form-group">
            <label>หัวข้อสำรวจ</label>
            <input type="text" class="form-control" name="titletopic" id="titletopic" placeholder="หัวข้อสำรวจ">
          </div>
          <div class="form-group">
            <label>รายละเอียด</label>
            <textarea type="text" class="form-control" name="detailtopic" id="detailtopic"></textarea>
          </div>
          <input type="hidden"  id="idtopic">
          <input type="hidden"  name="polltopic_id" id="polltopic_id" value="">
          <button type="button"  class="btn btn-primary savetopic">บันทึกข้อมูล</button>
          <button type="button"  class="btn btn-primary updatetopic">อัพเดทข้อมูล</button>
          <button type="reset" class="btn btn-danger btncanceltopic">ยกเลิก</button>
          {{ csrf_field() }}
          {{ method_field('post') }}
        </div>
  </div>
</div>
</form>
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
      $('#showdetail').hide();
      $('#displaytopic').hide();
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
      $('.btncanceltopic').click(function(){
          //$('.updatetopic').hide();
          $('.savetopic').show();
          //$('.btndetail').show();
          $('#showdetail').hide();

          $('#msgtopic').html('');
          $('.displayrecord').show();
          $('#showdetail').hide();
          $('.btndetail').show();
          $('#displaytopic').hide();
          displaydata();
      });
      displaydata();

      $('body').delegate('.bntopic','click',function(){
        $('.displayrecord').hide();
        $('#showdetail').hide();
        $('.btndetail').hide();
        $('.updatetopic').hide();
        $('#displaytopic').show();
        var id = $(this).data('id');
        $('#polltopic_id').val(id);
        displaytopic(id);
      });

      $('.saverecord').click(function(){

          //$('#new_polltopic').val('error');
              $.ajax({
                  url : '{!! url('managerset/polltopic') !!}',
                  async:false,
                  type:'post',
                  processData: false,
                  contentType: false,
                  data:new FormData($("#form_data")[0]),
                  success:function(re)
                  {
                    //alert(re);
                    if(re == 0){
                      displaydata();
                      $( '#msgname' ).html('<div class="alert alert-success">บันทึกข้อมูลสำเร็จ</div>');
                    }else{
                      $( '#msgname' ).html('<div class="alert alert-danger">เกิดข้อผิดพลาด</div>');
                    }
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

      $('body').delegate('.edit','click',function(){
        $('.updaterecord').show();
        $('.saverecord').hide();
        $('#showdetail').show();
        $('.btndetail').hide();
        $('#msgname').html('');
        $('#name').focus();
        var id = $(this).data('id');

        //alert(0);
        $.ajax({
            url : '{!! url('managerset/polltopic') !!}'+'/'+id+'/edit',
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
              $('#detail').val(e.detail);
              $('#type').val(e.type);
            }
        });

      });

      $('.updaterecord').click(function(){
      //alert(0);
        var id = $('#id').val();
        var title = $('#title').val();
        var detail = $('#detail').val();
        var type = $('#type').val();
            $.ajax({
              url : '{!! url('managerset/polltopic') !!}'+'/'+id,
                type : "post",
                //asyncfalse
                data : {
                  '_method':'PUT',
                  '_token': '{{ csrf_token() }}',
                  'title' : title,
                  'detail' : detail,
                  'type' : type
                },
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

      $('body').delegate('.delete','click',function(){
        if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
        var id = $(this).data('id');
        $('.updaterecord').hide();
        $('.saverecord').show();
        $('#showdetail').hide();
        $('.btndetail').show();
        $('#msgname').html('');
        $.ajax({
            url : '{!! url('managerset/polltopic') !!}'+'/'+id,
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
            }
        });
      }
      });


/////////////////////////////////////////////////////////////////////////////////for pollanswer
  $('.savetopic').click(function(){
      //$('#new_pollanswer').val('error');
          $.ajax({
              url : '{!! url('managerset/pollanswer') !!}',
              async:false,
              type:'post',
              processData: false,
              contentType: false,
              data:new FormData($("#form_topic")[0]),
              success:function(re)
              {
                //alert(re);
                if(re.check){
                  displaytopic(re.polltopic_id);
                  $( '#msgtopic' ).html('<div class="alert alert-success">บันทึกข้อมูลสำเร็จ</div>');
                }else{
                  $( '#msgtopic' ).html('<div class="alert alert-danger">เกิดข้อผิดพลาด</div>');
                }
                $("#form_topic")[0].reset();
                $('#polltopic_id').val(re.polltopic_id);
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

                    $( '#msgtopic' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                  }else{
                    $( '#msgtopic' ).html( 'ERROR : '+err.status );
                  }
               }
          });
  }) ;

  $('body').delegate('.edittopic','click',function(){
    $('.updatetopic').show();
    $('.savetopic').hide();
    //$('#showdetail').show();
    //$('.btndetail').hide();
    $('#msgtopic').html('');
    $('#titletopic').focus();
    var id = $(this).data('id');
    $.ajax({
        url : '{!! url('managerset/pollanswer') !!}'+'/'+id+'/edit',
        type : "get",
        //asyncfalse
        data : {
          '_token': '{{ csrf_token() }}'
        },
        success : function(e)
        {
          //alert(e.name);
          $('#idtopic').val(e.id);
          $('#titletopic').val(e.title);
          $('#detailtopic').val(e.detail);
          //$('#type').val(e.type);
        }
    });

  });

  $('.updatetopic').click(function(){
  //alert(0);
  var id = $('#idtopic').val();
  var polltopic_id = $('#polltopic_id').val();
    var titletopic = $('#titletopic').val();
    var detailtopic = $('#detailtopic').val();
    //var type = $('#type').val();
        $.ajax({
          url : '{!! url('managerset/pollanswer') !!}'+'/'+id,
            type : "post",
            //asyncfalse
            data : {
              '_method':'PUT',
              '_token': '{{ csrf_token() }}',
              'titletopic' : titletopic,
              'detailtopic' : detailtopic
            },
            success : function(re)
            {
              //alert(re);
              if(re == 0){
                displaytopic();
                $( '#msgtopic' ).html('<div class="alert alert-success">บันทึกข้อมูลสำเร็จ</div>');
              }else{
                $( '#msgtopic' ).html('<div class="alert alert-danger">เกิดข้อผิดพลาด</div>');
              }
              $('.updatetopic').hide();
              $('.savetopic').show();
              //$('#showtopic').hide();
              $("#form_topic")[0].reset();
              $('#polltopic_id').val(polltopic_id);
              displaytopic(polltopic_id);
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

  $('body').delegate('.deletetopic','click',function(){
    if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
      var polltopic_id = $('#polltopic_id').val();
    var id = $(this).data('id');
    $('.updatetopic').hide();
    $('.savetopic').show();
    $('#msgtopic').html('');
    //$('#showtopic').hide();
    //$('.btndetail').show();
    $('#msgname').html('');
    $.ajax({
        url : '{!! url('managerset/pollanswer') !!}'+'/'+id,
        type : "POST",
        //asyncfalse
        data : {
          '_method':'DELETE',
          '_token': '{{ csrf_token() }}'
        },
        success : function(d)
        {
          //alert(d);
          $("#form_topic")[0].reset();
          $('#polltopic_id').val(polltopic_id);
          displaytopic(polltopic_id);
        }
    });
  }
  });

});//body


    function displaydata(){
      $.ajax({
        url : '{!! url('managerset/polltopic/create') !!}',
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

    function displaytopic(id){
      //alert(id);
      $.ajax({
        url : '{!! url('managerset/pollanswer') !!}'+'/'+id,
        type : "get",
        //asyncfalse
        data : {},
        success : function(s)
        {
          $('#showtopic').html(s);
          //$("#example2").DataTable();
        }
      });
    }
</script>

@endsection
