<?php

  $date = date("M Y");

 ?>
<div class="row border-bottom bd-lightGrayBlue m-3">
   <!--Breadcrubs -->
   <div class='cell-md-10 text-left d-flex flex-justify-left flex-justify-left-md'>
     <ul class="breadcrumbsCustom bg-transparent">
             <li class="page-item"><a href="#" class="page-link"><span class="mif-meter"></span></a></li>
             <li class='page-item'><a class='page-link'>Home</a></li>
             <li class="page-item"><a href="#" class="page-link">Dashboard</a></li>
     </ul>
    </div>
    <div class='cell-md-2 text-center text-end-md'>
      <span id='jam'></span>
    </div>
</div>
<!--isi Page Conten disini -->
<div class="m-3">
   <div class="panel mt-4" id="70d8d9f2-dc1a-4d2f-a32d-1768688063ba">
       <div data-role="panel" data-title-caption="Monthly Recap Report" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="panel-content" data-role-panel="true">
           <div class="row">
               <div class="cell-md-7 p-10"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                   <h5 class="text-center">TOP 5 Analysis</h5>
                   <canvas id="chart" style="display: block; width: 620px; height: 310px;" width="620" height="310" class="chartjs-render-monitor"></canvas>
               </div>
               <div class="cell-md-4 p-10">
                 <h5 class="text-center">Completed Data</h5>
                  <canvas id="dashboardChart2" style="display: block; width: 620px; height: 310px;" width="620" height="600" class="chartjs-render-monitor"></canvas>
               </div>
           </div>
           </div>
       </div>
       <div class="panel-title"><span class="caption">Monthly Recap Report</span><span class="mif-chart-line icon"></span><span class="dropdown-toggle marker-center active-toggle"></span>
       </div>
   </div>
<!--<script src="https://cdn.jsdelivr.net/npm/luxon@1.24.1"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0-alpha/dist/Chart.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.1"></script>-->
<!--<script src="<?php echo base_url(); ?>assets/js/charts.js"></script>-->
<script src="<?php echo base_url(); ?>assets/chart/luxon.js"></script>
<script src="<?php echo base_url(); ?>assets/chart/Chart.js"></script>
<script src="<?php echo base_url(); ?>assets/chart/chartjs-adapter-luxon.js"></script>
<script src="<?php echo base_url(); ?>assets/js/index_chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chartjs-chart-financial.js"></script>
<script >

  var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>)
  var	clientTime = new Date();
  var	Diff = serverTime.getTime() - clientTime.getTime();

  var baseURL = $('body').data('baseurl');
  var nama = [];
  var alldata = [];
  var newdata = [];
  var rechekdata = [];
  var testdata = [];

  $(document).ready(function(){

    setInterval(function() { show_waktu(); },50);

  });

  <br />
  function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
  }

  function show_waktu(){
    var clientTime = new Date();
    var d = new Date(clientTime.getTime() + Diff); //buat object date dengan menghitung selisih waktu client dan server
    //console.log(d);
  	var h = addZero(d.getHours());
  	var m = addZero(d.getMinutes());
  	var s = addZero(d.getSeconds());
    var month = new Array();
    month[0] = "Jan";
    month[1] = "Feb";
    month[2] = "Mar";
    month[3] = "Apr";
    month[4] = "May";
    month[5] = "Jun";
    month[6] = "Jul";
    month[7] = "Aug";
    month[8] = "Sep";
    month[9] = "Oct";
    month[10] = "Nov";
    month[11] = "Dec";

    var day = addZero(d.getDate());

    $("#jam").html("<div class='countdown' data-animate='slide' style='font-size: 24px;'> "+
                      "<div data-label='"+month[d.getMonth()]+" "+d.getFullYear()+"' class='part days no-divider bg-orange fg-white'> "+
                        "<div class='digit'> "+
                          "<span class='digit-placeholder'>0</span> "+
                          "<span class='digit-value'>"+String(day).substring(0,2)+"</span> "+
                        "</div> "+
                        "<div class='digit'> "+
                          "<span class='digit-placeholder'>0</span> "+
                          "<span class='digit-value'>"+String(day).substring(1,2)+"</span> "+
                        "</div> "+
                      "</div> "+
                     "<div data-label='HOURS' class='part hours no-divider bg-red fg-white'> "+
                       "<div class='digit'> "+
                         "<span class='digit-placeholder'>0</span> "+
                         "<span class='digit-value'>"+String(h).substring(0,2)+"</span> "+
                       "</div> "+
                       "<div class='digit'> "+
                         "<span class='digit-placeholder'>0</span> "+
                         "<span class='digit-value'>"+String(h).substring(1,2)+"</span> "+
                       "</div> "+
                     "</div> "+
                     "<div data-label='MINS' class='part minutes no-divider bg-green fg-white'> "+
                       "<div class='digit'> "+
                         "<span class='digit-placeholder'>0</span> "+
                         "<span class='digit-value'>"+String(m).substring(0,2)+"</span> "+
                       "</div> "+
                       "<div class='digit'> "+
                         "<span class='digit-placeholder'>0</span> "+
                         "<span class='digit-value'>"+String(m).substring(1,2)+"</span> "+
                       "</div> "+
                     "</div> "+
                     "<div data-label='SECS' class='part seconds no-divider bg-blue fg-white'> "+
                       "<div class='digit'> "+
                         "<span class='digit-placeholder'>0</span> "+
                         "<span class='digit-value'>"+String(s).substring(0,2)+"</span> "+
                       "</div> "+
                       "<div class='digit'> "+
                         "<span class='digit-placeholder'>0</span> "+
                         "<span class='digit-value'>"+String(s).substring(1,2)+"</span> "+
                       "</div> "+
                     "</div> "+
                   "</div>");
  }
  


</script>
