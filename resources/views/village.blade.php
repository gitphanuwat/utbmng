@extends('layouthomes.template')
@section('title','พื้นที่ชุมชน')
@section('subtitle','จัดการข้อมูล')
@section('body')
<div class="row">
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <!-- tools box -->
      <div class="pull-right box-tools">
        <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
          <i class="fa fa-minus"></i></button>
      </div>
      <!-- /. tools -->
      <i class="fa fa-map-marker"></i>
      <h3 class="box-title">
        หมู่บ้าน
      </h3>
    </div>
    <div class="box-body">
      <div id="map" style="height: 450px; width: 100%;">
      </div>
    </div>
    <!-- /.box-body-->
  </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">พื้นที่ชุมชน</h3>
            </div>
            <!-- /.box-header -->
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <div class="displayrecord">
                </div>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
    </div>
  </div>
@endsection
@section('script')
<script  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCkw9kj6fQxsFQJ89BbuRqPRZ5c_SdoDqg"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
<script src="{{ asset("assets/js/uttmap.js") }}"></script>
<script>
  var prev_infowindow =false;
  var locations = <?php print_r(json_encode($data)) ?>;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 9,
    center: {lat: 17.75098, lng: 100.5304},
    mapTypeId: 'roadmap'
  });
  var bermudaTriangle = new google.maps.Polygon({
    paths: mappolygon,
    strokeColor: '#FF0000',
    strokeOpacity: 0.5,
    strokeWeight: 1,
    fillColor: '#FF0000',
    fillOpacity: 0.05
  });
  bermudaTriangle.setMap(map);

  $.each( locations, function( index, value ){
      var marker = new google.maps.Marker({
          position: {lat: value.lat, lng: value.lng},
          map: map,
          //icon: iconBase,
          title: value.name,
          zIndex: value.id
      });
      var infowindow = new google.maps.InfoWindow({
          content: value.name
        });
      marker.addListener('click', function() {
        if( prev_infowindow ) {
           prev_infowindow.close();
        }
        prev_infowindow = infowindow;
          infowindow.open(map, marker);
      });
  });
</script>

<!-- DataTables -->
<script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<!-- Geolocation -->

<script type="text/javascript">
  $(function(){
      displaydata();
  });
  function displaydata(){
    $.ajax({
      url : '{!! url('village/create') !!}',
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
</script>

@endsection
