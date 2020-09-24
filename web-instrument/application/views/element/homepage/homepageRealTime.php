<?php

  $date = date("M Y");

 ?>
 <style>
		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
	</style>
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
                   <canvas id="dashboardChart1" style="display: block; width: 620px; height: 310px;" width="620" height="310" class="chartjs-render-monitor"></canvas>
               </div>
               <div class="cell-md-4 p-10">
                 <h5 class="text-center">Completed Data</h5>
                  <canvas id="dashboardChart2" style="display: block; width: 620px; height: 310px;" width="620" height="600" class="chartjs-render-monitor"></canvas>
                    <!--
                   <h5 class="text-center">Goal Completion</h5>
                   <div class="mt-6">
                       <div class="clear">
                           <div class="place-left">Add Products to Cart</div>
                           <div class="place-right"><strong>160</strong>/200</div>
                       </div>
                       <div data-role="progress" data-value="35" data-cls-bar="bg-cyan" class="progress" data-role-progress="true"><div class="bar bg-cyan" style="width: 35%;"></div></div>
                   </div>
                   <div class="mt-6">
                       <div class="clear">
                           <div class="place-left">Complete Purchase</div>
                           <div class="place-right"><strong>310</strong>/400</div>
                       </div>
                       <div data-role="progress" data-value="35" data-cls-bar="bg-red" class="progress" data-role-progress="true"><div class="bar bg-red" style="width: 35%;"></div></div>
                   </div>
                   <div class="mt-6">
                       <div class="clear">
                           <div class="place-left">Visit Premium Page</div>
                           <div class="place-right"><strong>480</strong>/800</div>
                       </div>
                       <div data-role="progress" data-value="35" class="progress" data-role-progress="true"><div class="bar" style="width: 35%;"></div></div>
                   </div>
                   <div class="mt-6">
                       <div class="clear">
                           <div class="place-left">Send Inquiries</div>
                           <div class="place-right"><strong>250</strong>/500</div>
                       </div>
                       <div data-role="progress" data-value="35" data-cls-bar="bg-orange" class="progress" data-role-progress="true"><div class="bar bg-orange" style="width: 35%;"></div></div>
                   </div>
                   <div class="mt-6">
                       <p class="text-small">Cum brodium resistere, omnes spatiies perdere varius, magnum lanistaes.</p>
                   </div>
                 -->
               </div>
           </div>
           <!--
           <hr/>
           <div class="row">
               <div class="cell-lg-3 cell-sm-6 text-center mt-4">
                   <div class="fg-green"><span class="mif-arrow-drop-up"></span>17%</div>
                   <div class="text-bold">$35,210.43</div>
                   <div class="text-upper">TOTAL REVENUE</div>
               </div>
               <div class="cell-lg-3 cell-sm-6 text-center mt-4">
                   <div class="fg-orange"><span class="">=</span>0</div>
                   <div class="text-bold">$10,390.90</div>
                   <div class="text-upper">TOTAL COST</div>
               </div>
               <div class="cell-lg-3 cell-sm-6 text-center mt-4">
                   <div class="fg-green"><span class="mif-arrow-drop-up"></span>20%</div>
                   <div class="text-bold">$24,813.53</div>
                   <div class="text-upper">TOTAL PROFIT</div>
               </div>
               <div class="cell-lg-3 cell-sm-6 text-center mt-4">
                   <div class="fg-red"><span class="mif-arrow-drop-down"></span>18%</div>
                   <div class="text-bold">1,200</div>
                   <div class="text-upper">GOAL COMPLETIONS</div>
               </div>
           </div>-->
           <hr/>
           <div class="row">
               <div class="cell-sm-15 p-10">
                   <canvas id="chart1" style="display: block; width: 100px; height: 50px;" width="100" height="50" class="chartjs-render-monitor"></canvas>
               </div>
           </div>
           <!--
           <div class="row">
                Chart Type:
            	<select id="type">
            		<option value="line">Line</option>
            		<option value="bar">Bar</option>
            	</select>
            	<select id="unit">
            		<option value="second">Second</option>
            		<option value="minute">Minute</option>
            		<option value="hour">Hour</option>
            		<option value="day" selected>Day</option>
            		<option value="month">Month</option>
            		<option value="year">Year</option>
            	</select>
            	<button id="update">update</button>
           </div>-->
       </div>
       <div class="panel-title"><span class="caption">Monthly Recap Report</span><span class="mif-chart-line icon"></span><span class="dropdown-toggle marker-center active-toggle"></span>
       </div>
   </div>
   <!--
   <div class="row">
       <div class="cell-lg-3 cell-md-6 mt-2">
           <div class="more-info-box bg-cyan fg-white">
               <div class="content">
                   <h2 class="text-bold mb-0">150</h2>
                   <div>New Orders</div>
               </div>
               <div class="icon">
                   <span class="mif-cart"></span>
               </div>
               <a href="#" class="more"> More info <span class="mif-arrow-right"></span></a>
           </div>
       </div>
       <div class="cell-lg-3 cell-md-6 mt-2">
           <div class="more-info-box bg-green fg-white">
               <div class="content">
                   <h2 class="text-bold mb-0">53%</h2>
                   <div>Bounce Rate</div>
               </div>
               <div class="icon">
                   <span class="mif-chart-bars"></span>
               </div>
               <a href="#" class="more"> More info <span class="mif-arrow-right"></span></a>
           </div>
       </div>
       <div class="cell-lg-3 cell-md-6 mt-2">
           <div class="more-info-box bg-orange fg-white">
               <div class="content">
                   <h2 class="text-bold mb-0">44</h2>
                   <div>New Registrations</div>
               </div>
               <div class="icon">
                   <span class="mif-user-plus"></span>
               </div>
               <a href="#" class="more"> More info <span class="mif-arrow-right"></span></a>
           </div>
       </div>
       <div class="cell-lg-3 cell-md-6 mt-2">
           <div class="more-info-box bg-red fg-white">
               <div class="content">
                   <h2 class="text-bold mb-0">10,000</h2>
                   <div>Unique Visitors</div>
               </div>
               <div class="icon">
                   <span class="mif-user-check"></span>
               </div>
               <a href="#" class="more"> More info <span class="mif-arrow-right"></span></a>
           </div>
       </div>
   </div>
</div>
<!--end Page Conten-->
<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
<script src="<?php echo base_url(); ?>assets/TimeChart/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/TimeChart/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/TimeChart/utils.js"></script>
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
  var DataGula20;

  $(document).ready(function(){

    setInterval(function() { show_waktu(); },50);

    $.get('site/show_count_analysis_by_module', function(data, status){
        //console.log(data)
      var obj = JSON.parse(data, function (key, value) {
        
        if (key == 'nama'){
          nama.push(value);
        }
        if (key == 'jumlah'){
          alldata.push(parseInt(value));
        }
        if (key == 'baru'){
          newdata.push(parseInt(value));
        }
        if (key == 'ricek'){
          rechekdata.push(parseInt(value));
        }
        if (key == 'test'){
          testdata.push(parseInt(value));
        }
      });
      
      show_chart();
      pie_chart();
      chart_baru();
      /*
      document.getElementById('update').addEventListener('click', function() {
			var type = document.getElementById('type').value;
			var dataset = chart.config.data.datasets[0];
			dataset.type = type;
			dataset.data = generateData();
			chart.update();
		});
      */
      
    });

  });

  function show_chart(){

    var color = Chart.helpers.color;
    var barChartData = {
      labels: nama,
      datasets: [{
        label: 'All Analysis',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: alldata,
      }, {
        label: 'New',
        backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
        borderColor: window.chartColors.orange,
        borderWidth: 1,
        data: newdata,
      },
      {
        label: 'Recheck',
        backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
        borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: rechekdata,
      },
      {
        label: 'Test',
        backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
        borderColor: window.chartColors.green,
        borderWidth: 1,
        data: testdata,
      }
    ]

    };

    var ctx = document.getElementById('dashboardChart1').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Analysis Result <?=$date?>'
					}
				}
			});
  }

  function pie_chart(){

    var color = Chart.helpers.color;
    var barChartData = {
      labels: ['New','Recheck','Test'],
      datasets: [{
        label: 'All Analysis',
        backgroundColor: [
            window.chartColors.orange,
            window.chartColors.blue,
            window.chartColors.green
        ],
        //borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [ newdata.reduce(sumArray), rechekdata.reduce(sumArray), testdata.reduce(sumArray)],
      }
    ]

    };

    var ctx = document.getElementById('dashboardChart2').getContext('2d');
		window.myBar = new Chart(ctx, {
			type: 'doughnut',
			data: barChartData,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: false,
					text: 'Analysis Result <?=$date?>'
				}
			}
		});
  }

  function sumArray(total, num) {
    return total + num;
  }

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
  
  
    function chart_baru(){
        
  		var ctx = document.getElementById('chart1').getContext('2d');
		ctx.canvas.width = 1000;
		ctx.canvas.height = 300;
        
        //$url = "<?php echo base_url();?>assets/TimeChart/test.json";
        $url = "site/show_data_uji_petik/20kg";
        
        $.getJSON( $url, function(result){
          
            DataGula20 = result;
            
    		var color = Chart.helpers.color;
    		var cfg = {
    			data: {
    				datasets: [{
    					label: 'Sugar Pack 20kg',
    					backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
    					borderColor: window.chartColors.blue,
    					//data: generateData(),
                        data: result,
    					type: 'bar',
    					pointRadius: 0,
    					fill: false,
    					lineTension: 0,
    					borderWidth: 2
    				}]
    			},
    			options: {
    				animation: {
    					duration: 0
    				},
    				scales: {
    					xAxes: [{
    						type: 'time',
    						distribution: 'series',
    						offset: true,
    						ticks: {
    							major: {
    								enabled: true,
    								fontStyle: 'bold'
    							},
    							source: 'data',
    							autoSkip: true,
    							autoSkipPadding: 75,
    							maxRotation: 0,
    							sampleSize: 100
    						},
    						afterBuildTicks: function(scale, ticks) {
    							var majorUnit = scale._majorUnit;
    							var firstTick = ticks[0];
    							var i, ilen, val, tick, currMajor, lastMajor;
    
    							val = moment(ticks[0].value);
    							if ((majorUnit === 'minute' && val.second() === 0)
    									|| (majorUnit === 'hour' && val.minute() === 0)
    									|| (majorUnit === 'day' && val.hour() === 9)
    									|| (majorUnit === 'month' && val.date() <= 3 && val.isoWeekday() === 1)
    									|| (majorUnit === 'year' && val.month() === 0)) {
    								firstTick.major = true;
    							} else {
    								firstTick.major = false;
    							}
    							lastMajor = val.get(majorUnit);
    
    							for (i = 1, ilen = ticks.length; i < ilen; i++) {
    								tick = ticks[i];
    								val = moment(tick.value);
    								currMajor = val.get(majorUnit);
    								tick.major = currMajor !== lastMajor;
    								lastMajor = currMajor;
    							}
    							return ticks;
                                
    						}
    					}],
    					yAxes: [{
    						gridLines: {
    							drawBorder: false
    						},
    						scaleLabel: {
    							display: true,
    							labelString: 'Berat( Kg )'
    						}
    					}]
    				},
    				tooltips: {
    					intersect: false,
    					mode: 'index',
    					callbacks: {
    						label: function(tooltipItem, myData) {
    							var label = myData.datasets[tooltipItem.datasetIndex].label || '';
    							if (label) {
    								label += ': ';
    							}
    							label += parseFloat(tooltipItem.value).toFixed(2);
    							return label;
    						}
    					}
    				}
    			}
    		};
    
    		chart = new Chart(ctx, cfg);
            
      });
        
    }
    
    function generateData() {
			//var unit = document.getElementById('unit').value;
            var unit = 'hour';

			function unitLessThanDay() {
				return unit === 'second' || unit === 'minute' || unit === 'hour';
			}

			function beforeNineThirty(date) {
				return date.hour() < 9 || (date.hour() === 9 && date.minute() < 30);
			}

			// Returns true if outside 9:30am-4pm on a weekday
			function outsideMarketHours(date) {
				if (date.isoWeekday() > 5) {
					return true;
				}
				if (unitLessThanDay() && (beforeNineThirty(date) || date.hour() > 16)) {
					return true;
				}
				return false;
			}

			function randomNumber(min, max) {
				return Math.random() * (max - min) + min;
			}

			function randomBar(date, lastClose) {
				var open = randomNumber(lastClose * 0.95, lastClose * 1.05).toFixed(2);
				var close = randomNumber(open * 0.95, open * 1.05).toFixed(2);
				return {
					t: date.valueOf(),
					y: close
				};
			}

			var date = moment('Jan 01 1990', 'MMM DD YYYY');
			var now = moment();
			var data = [];
			var lessThanDay = unitLessThanDay();
			for (; data.length < 600 && date.isBefore(now); date = date.clone().add(1, unit).startOf(unit)) {
				if (outsideMarketHours(date)) {
					if (!lessThanDay || !beforeNineThirty(date)) {
						date = date.clone().add(date.isoWeekday() >= 5 ? 8 - date.isoWeekday() : 1, 'day');
					}
					if (lessThanDay) {
						date = date.hour(9).minute(30).second(0);
					}
				}
				data.push(randomBar(date, data.length > 0 ? data[data.length - 1].y : 30));
			}

			return data;
    }
  


</script>
