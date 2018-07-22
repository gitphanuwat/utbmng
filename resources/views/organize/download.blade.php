@extends('layoutpages.template')
@section('title','ดาวน์โหลดเอกสาร')
@section('subtitle','จัดการข้อมูล')
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
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="displayrecord">
          </div>
          <button type="button" class="btn btn-primary btndetail">เพิ่มข้อมูล >></button>

        </div>
        <!-- /.box-body -->
      </div>
    </div>
</div>
</div>

<div id='showdetail'>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">ดาวน์โหลดเอกสาร</h3>
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
                <label>ชื่อเอกสาร</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="ชื่อเรื่อง">
              </div>
              <div class="form-group" >
                <label>รายละเอียด</label>
                <textarea type="text" rows="8" class="form-control" name="detail" id="detail"></textarea>
              </div>
              <div class="form-group" style="width:250px">
                <label>ประเภทเอกสาร</label>
                <select name="type" id="type" class="form-control">
                  <option value="1">หนังสือราชการ</option>
                  <option value="2">มาตรฐานต่างๆ</option>
                  <option value="3">แบบฟอร์มต่างๆ</option>
                  <option value="4">เอกสารอื่นๆ</option>
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
          <div class="col-md-4">
            <div class="box-body">
              <div class="form-group">
                <label>ไฟล์เอกสารประกอบ</label>
                <div id='userfile'>-</div>
                <input type="file" class="form-control" name="file" id="file">
                <input type="hidden" class="form-control" name="fileold" id="fileold">
              </div>
            </div>
          </div>
        </form>
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
      $('#showdetail').hide();
      //$('.btndetail').hide();
      $('.updaterecord').hide();

      $('.btndetail').click(function(){
          $('#showdetail').show();
          $('.btndetail').hide();
          $('#name').focus();
      });
      $('.btncancel').click(function(){
          $('.updaterecord').hide();
          $('.saverecord').show();
          $('.btndetail').show();
          $('#showdetail').hide();
          $('#msgname').html('');
          $("#form_data")[0].reset();
          $('#userfile').html('');
      });
      displaydata();

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
            url : '{!! url('managerset/download') !!}'+'/'+id+'/edit',
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
              $('#fileold').val(e.file);
              $('#userfile').html('<a href="{{url("/files/download")}}/'+e.file+'">'+e.file+'</a>');
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
            url : '{!! url('managerset/download') !!}'+'/'+id,
            type : "POST",
            //asyncfalse
            data : {
              '_method':'DELETE',
              '_token': '{{ csrf_token() }}'
            },
            success : function(d)
            {
              //alert(e.name);
              $("#form_data")[0].reset();
              displaydata();
            }
        });
      }
      });
  });

      $('.saverecord').click(function(){
              //alert(0);
              $.ajax({
                  url : '{!! url('managerset/download') !!}',
                  async:false,
                  type:'post',
                  processData: false,
                  contentType: false,
                  data:new FormData($("#form_data")[0]),
                  success:function(d)
                  {
                    if(d.check){
                      displaydata();
                      $('#userfile').html('');
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
        var id = $('#id').val();
                $.ajax({
                  url : '{!! url('managerset/downloadpost') !!}'+'/'+id,
                    async:false,
                    type:'post',
                    processData: false,
                    contentType: false,
                    data:
                    //{
                    new FormData($("#form_data")[0]),
                    //'_method':'PUT'
                    //$('#form_data').serialize(),
                    //},

                    success:function(d)
                    {
                      //alert(d.file);
                      if(d.check){
                        displaydata();
                        var url = d.file;
                        $( '#msgname' ).html('<div class="alert alert-success">บันทึกข้อมูลสำเร็จ</div>');
                        $('#userfile').html('');
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

    function displaydata(){
      //alert(2);
      $.ajax({
        url : '{!! url('managerset/download/create') !!}',
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
