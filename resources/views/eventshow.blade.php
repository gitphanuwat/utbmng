@extends('layouthomes.template')
@section('title','ปฏิทินกิจกรรม')
@section('subtitle','จัดการข้อมูล')
@section('styles')

@endsection
@section('body')


<div class="row">
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ปฏิทินกิจกรรม</h3>
            </div>
            <!-- /.box-header -->
          <div id='showdetail'>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">กิจกรรม</h3>
              </div>
              <div class="box">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                    <!-- form start -->
                    <div id = 'msgname'></div>

                      <div class="box-body">
                        <div class="form-group">
                          <h3>"{{$data->title}}"</h3>
                        </div>
                        <div class="form-group">
                          <?php $type=array('','งานประจำปี','งานบริการชุมชน','ส่งเสริมท่องเที่ยว','งานประเพณี','ทำนุบำรุงศิลปะวัฒนธรรม','อื่นๆ');
                            if($data->picture!=''){
                              echo '<img class="img-responsive img-squar" src="'.url("http://localhost/utb/public_html/images/event/".$data->picture).'" width="250">';
                            }
                          ?>
                        </div>
                        <div class="form-group">
                          <h5>ประเภท:{{$type[$data->type]}}</h5>
                        </div>
                        <div class="form-group" >
                          <label>รายละเอียด</label>
                          <blockquote>
                            <p>{{$data->detail}}</p>
                            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                          </blockquote>
                        </div>
                        <div class="form-group">
                          <p>สถานที่จัด <cite title="Source Title">{{$data->address}}</cite></p>
                        </div>
                        <div class="form-group">
                          <p>วันเริ่มต้น <cite title="Source Title">{{$data->startdate}}</cite></p>
                        </div>
                        <div class="form-group">
                          <p>วันสิ้นสุด <cite title="Source Title">{{$data->enddate}}</cite></p>
                        </div>
                        <div class="form-group">
                          <p>ข้อมูลติดต่อ <cite title="Source Title">{{$data->contact}}</cite></p>
                        </div>
                        <button type="button" class="btn btn-warning" onclick="window.history.back()">ย้อนกลับ</button>
                      </div>
                    </div>



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

<script type="text/javascript">
    $(function(){

  });
</script>

@endsection
