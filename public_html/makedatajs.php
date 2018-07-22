<?php
use App\University;
use App\Researcher;
use App\Expert;
use App\Research;
use App\Creative;
use App\Area;
use App\Problem;
use App\Taggroup;

$data1 = "
  $(function () {
    'use strict';
    var bar = new Morris.Bar({
      element: 'bar-chart2',
      resize: true,

      data: [";
      $objuniver = University::get();
      $i=1;
      foreach ($objuniver as $obj) {
        $iduni = $obj->id;

        $objresearcher = Researcher::where('university_id',$iduni)->get();
        $objexpert = Expert::leftJoin('areas','experts.area_id','=','areas.id')
        ->where('areas.university_id',$iduni)->get();
        $objresearch = Research::leftJoin('researchers','researchs.researcher_id','=','researchers.id')
        ->where('researchers.university_id',$iduni)->get();
        $objcreative = Creative::leftJoin('researchers','creatives.researcher_id','=','researchers.id')
        ->where('researchers.university_id',$iduni)->get();
        $objarea = Area::where('university_id',$iduni)->get();
        $objproblem = Problem::leftJoin('areas','problems.area_id','=','areas.id')
        ->where('areas.university_id',$iduni)->get();

          $data1 .= "{y: '".$obj->shortname."',";
          $data1 .= "1 : ".count($objresearcher).", ";
          $data1 .= "2 : ".count($objexpert).", ";
          $data1 .= "3 : ".count($objresearch).", ";
          $data1 .= "4 : ".count($objcreative).", ";
          $data1 .= "5 : ".count($objarea).", ";
          $data1 .= "6 : ".count($objproblem).", ";
        $data1 .="},";
      }
      $data1 .="],

      barColors: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#39CCCC', '#d2d6de', '#932ab6'],
      xkey: 'y',
      ykeys: [";
        $data1 .="'1','2','3','4','5','6'";
      $data1 .="],
      labels: [";
        $data1 .="'นักวิจัย','ผู้เชี่ยวชาญ','งานวิจัย','งานสร้างสรรค์','พื้นที่ชุมชน','ปัญหาชุมชน'";
      $data1 .="],
      hideHover: 'auto'
    });
  });
";
//echo $data;
$data2 = "
  $(function () {
    'use strict';
    var bar = new Morris.Bar({
      element: 'bar-chart1',
      resize: true,
      data: [";
      $objare = Area::get();
      foreach ($objare as $obj) {
        $idare = $obj->id;
        $objpro = Problem::where('area_id',$idare)->get();
        $data2 .= "{y: '".$obj->name."',";
          $data2 .= "1 : ".count($objpro).", ";
        $data2 .="},";
      }
      $data2 .="],
      barColors: ['#00a65a'],
      xkey: 'y',
      ykeys: [";
        $data2 .="'1'";
        $data2 .="],
      labels: [";
        $data2 .="'ปัญหา'";
      $data2 .="],
      hideHover: 'auto'
    });
  });
";
//echo $data2;
$i=0;
$obtag = Taggroup::get();
$data3 = '
var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
var pieChart = new Chart(pieChartCanvas);
var PieData = [';

  foreach ($obtag as $key) {
    $idtag = $key->id;
    $pro = Problem::where('taggroup_id','=', $idtag)->get();

    $data3 .='
    {
      value: "'.count($pro).'",
      color: "'.$col[$i].'",
      highlight: "'.$col[$i].'",
      label: "'.$key->groupname.'"
    },';
    $i++;
  }

  $data3 .='
];
var pieOptions = {
  segmentShowStroke: true,
  segmentStrokeColor: "#fff",
  segmentStrokeWidth: 1,
  percentageInnerCutout: 50,
  animationSteps: 100,
  animationEasing: "easeOutBounce",
  animateRotate: true,
  animateScale: false,
  responsive: true,
  maintainAspectRatio: false,
  legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
  tooltipTemplate: "<%=label%> <%=value %> เรื่อง"
};
pieChart.Doughnut(PieData, pieOptions);
';



  $objarea = Area::get();

  $data4 = "
          $('#world-map-markers').vectorMap({
            map: 'th_mill',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
              initial: {
                fill: 'rgba(210, 214, 222, 1)',
                'fill-opacity': 1,
                stroke: 'none',
                'stroke-width': 0,
                'stroke-opacity': 1
              },
              hover: {
                'fill-opacity': 0.7,
                cursor: 'pointer'
              },
              selected: {
                fill: 'yellow'
              },
              selectedHover: {}
            },
            markerStyle: {
              initial: {
                fill: '#00a65a',
                stroke: '#111'
              }
            },
            markers: [";
              foreach ($objarea as $key) {
              $data4 .= "{latLng: [".$key->latitude.", ".$key->longitude."], name: '".$key->name."'},";
            }

          $data4 .= "]
          });";


$data = $data1.$data2.$data3.$data4;
$strFileName = "data.js";
$objFopen = fopen($strFileName, 'w');


fwrite($objFopen, $data);
fclose($objFopen);
?>
