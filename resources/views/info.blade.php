@extends('layouthomes.template')
@section('title','ข่าวสาร/กิจกรรม')
@section('subtitle','จัดการข้อมูล')
@section('body')
<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ข่าวสาร/กิจกรรม</h3>
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
    </div>
</div>
</div>

<div id='showdetail'>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">ข่าวสาร/กิจกรรม</h3>
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
                <label>ชื่อเรื่อง</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="ชื่อเรื่อง">
              </div>
              <div class="form-group" >
                <label>รายละเอียด</label>
                <textarea type="text" rows="8" class="form-control" name="detail" id="detail"></textarea>
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
                <div id='userfile'>
                  <img class="img-responsive img-squar" src="{{url('/images/no_image.png')}}" width="250">
                </div>
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
          $('#userfile').html('<img class="img-responsive img-squar" src="{{url("/images/no_image.png")}}" width="250">');
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
            url : '{!! url('managerset/info') !!}'+'/'+id+'/edit',
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
              $('#fileold').val(e.file);
              $('#userfile').html('<img class="img-responsive img-squar" src="{{url("/images/info")}}/'+e.file+'" width="250">');
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
            url : '{!! url('managerset/info') !!}'+'/'+id,
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
                  url : '{!! url('managerset/info') !!}',
                  async:false,
                  type:'post',
                  processData: false,
                  contentType: false,
                  data:new FormData($("#form_data")[0]),
                  success:function(d)
                  {
                    if(d.check){
                      displaydata();
                      //$('#userfile').html('<img class="img-responsive img-squar" src="{{url("/images/info")}}/'+d.file+'" width="250">');
                      $('#userfile').html('<img class="img-responsive img-squar" src="{{url("/images/no_image.png")}}" width="250">');
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
                  url : '{!! url('managerset/infopost') !!}'+'/'+id,
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
                        //$('#userfile').html('<img class="img-responsive img-squar" src="{{url("/images/info")}}/'+d.file+'" width="250">');
                        $('#userfile').html('<img class="img-responsive img-squar" src="{{url("/images/no_image.png")}}" width="250">');
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
        url : '{!! url('managerset/info/create') !!}',
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
