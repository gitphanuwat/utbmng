@extends('layoutpages.template')
@section('title','หน่วยงานท้องถิ่น')
@section('subtitle',session('sess_orgname'))
@section('body')
<div class="row">
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-map-marker"></i> หน่วยงาน : {{$objorg->name or ''}}</h3>
            </div>
            <!-- /.box-headertest -->


            <div id='showdetail'>
            <!-- form start -->

            <div id = 'msgname'></div>
            <form role="form" id="form_data" name="form_data">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box-body">
                  <span class='pull-left'><label>ตำแหน่งพื้นที่</label></span>
                <div id="map" style="height: 300px; width: 100%;"></div>
                <div class="form-group">
                        <label>ละติจูด : {{$objorg->lat or ''}}</label>
                        <label>ลองจิจูด : {{$objorg->lng or ''}}</label>
                </div>
              </div>
              </div>
              <?php
              $arrtype=array('','องค์การบริหารส่วนจังหวัด','เทศบาลเมือง','เทศบาลตำบล','องค์การบริหารส่วนตำบล','การปกครองพิเศษ','อื่นๆ');
              $atype = 1; ?>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="box-body">
                <blockquote class="pull-right">
                  <p>{{$objorg->name or ''}}</p>
                  <small>ประเภทหน่วยงาน <cite title="Source Title">{{ $arrtype[$atype] }}</cite></small>
                </blockquote>
                </div>
                <div class="box-body">
                <blockquote>
                  <p>{{$objorg->name or ''}}</p>
                  <small>ที่อยู่ <cite title="Source Title">{{$objorg->address}}</cite></small>
                  <small>เว็บไซต์ <cite title="Source Title">{{$objorg->website}}</cite></small>
                  <small>เฟสบุ๊ค <cite title="Source Title">{{$objorg->facebook}}</cite></small>
                  <small>เบอร์โทร <cite title="Source Title">{{$objorg->tel}}</cite></small>
                </blockquote>
              </div>
            </div>
          </div>
        </form>
          </div>
          </div>


          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-map-marker"></i>
              <h3 class="box-title">
                วิสัยทัศน์
              </h3>
            </div>
            <div class="box-body">
              <blockquote>
                <p>วิสัยทัศน์</p>
                <small><?php echo $objorg->vision ?></small>
              </blockquote>
              <blockquote>
                <p>พันธกิจ</p>
                <small><?php echo $objorg->basic ?></small>
              </blockquote>
              <blockquote>
                <p>ประวัติ</p>
                <small><?php echo $objorg->history ?></small>
              </blockquote>
            </div>
          </div>

        </div>
      </div>
@endsection
@section('script')

<script  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCkw9kj6fQxsFQJ89BbuRqPRZ5c_SdoDqg"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

<!-- DataTables -->
<script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<!-- Geolocation -->
<script src="{{ asset("assets/js/geolocation.js") }}"></script>
<script>
  var locations = <?php print_r(json_encode($objorg)) ?>;
  var map = new GMaps({
    el: '#map',
    lat: locations.lat,
    lng: locations.lng,
    zoom: 12,
  });
      map.addMarker({
          id: locations.id ,
          lat: locations.lat ,
          lng: locations.lng ,
          title: locations.name ,
          infoWindow: {
             content: 'หน่วยงาน:'+locations.name
          }
      });
</script>

@endsection
