@extends('layouthomes.template')

@section('title','ศูนย์ข้อมูลท้องถิ่น')
@section('subtitle','Uttaradit Book System')
@section('styles')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset("assets/plugins/datepicker/datepicker3.css") }}">
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset("assets/plugins/morris/morris.css") }}">
<link rel="stylesheet" href="{{ asset("assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css") }}">
@endsection

<?php
use App\Counter;
?>
@section('body')
  <!-- Main row -->
  <div class="row">
    <section class="col-lg-9">
      <!-- LINE CHART -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">สถิติการใช้ระบบ</h3>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="line-chart" style="height: 325px;"></div>
        </div>
      </div>
    </section>
    <?php
    $enddate = date("Y-m-d");
    $startdate=date("Y-m-d",strtotime("-30 days",strtotime($enddate)));
    ?>
    <section class="col-lg-3">
        <div class="box-body chart-responsive">
          <div class="form-group">
            <h3 class="box-title">เลือกเวลา</h3>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i> เริ่มต้น
              </div>
              <input type="text" class="form-control pull-left" id="datepicker1" value="{{ $startdate }}">
            </div>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i> สิ้นสุด
              </div>
              <input type="text" class="form-control pull-left" id="datepicker2" value="{{ $enddate }}">
            </div>
          </div>
          <button type="button" class="btn btn-primary btnupdate">อัพเดทข้อมูล</button>

        </div>
    </section>
  </div>
  <div class="displaydetail">detail</div>


@endsection

@section('script')
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset("assets/plugins/morris/morris.min.js") }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset("assets/plugins/datepicker/bootstrap-datepicker.js") }}"></script>

<script type="text/javascript">
    $(function(){

      var startdate = $('#datepicker1').val();
      var enddate = $('#datepicker2').val();
      loadstat(startdate,enddate);

      //Date picker
      $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });
      $('#datepicker2').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });

      $('.btnupdate').click(function(){
        var startdate = $('#datepicker1').val();
        var enddate = $('#datepicker2').val();
          loadstat(startdate,enddate);
          //alert(0);
      });
    });

    function loadstat(startdate,enddate){
      //alert(month);
        $.ajax({
          url : '{!! url('/loadstat') !!}',
          type : "get",
          //asyncfalse
          data : {
            'startdate' : startdate,
            'enddate' : enddate,
          },
          success : function(s)
          {
            //alert(s);
            $('.displaydetail').html(s);
          }
        });
  }
</script>

@endsection
