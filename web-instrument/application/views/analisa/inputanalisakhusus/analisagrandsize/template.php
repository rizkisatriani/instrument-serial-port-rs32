<?php $this->load->view('element/include/breadcrumbs');?>

<div class="m-3" id="content">

  <div id="showdata"></div>

</div>
<script>

  var baseURL = $('body').data('baseurl');
  var cat = $('body').data('cat');
  var menu = $('#page').data('menu');
  var submenu = $('#page').data('submenu');
  var module = $('#page').data('module');
  var module_id = $('#page').data('module_id');
  var controller = module.capitalize() + "_controller";
  
  var APIKEY = "<?=APIKEYMD5?>";
  var dataSetting; 
  var input = 0; 

  $(document).ready(function(){

    showdata();
        //console.log(controller);
    get_devices_ip(APIKEY);
  });

  function showdata(){
    ajax_do_action( 'showdata', 'showdata');
  }

  function createanalisa(){
    ajax_do_action( 'open_form_analisa', 'content');
  }

  function detilanalisa(id){
    data = new Array();
    data[1] = id;
    ajax_do_action( 'open_detil_analisa', 'content',data);
  }
  
    function PostParameterAlat(){
    var ip = $("#ip").val();
    var request = get_device_setting(ip); 
    
    request.done(function (response, textStatus, jqXHR){
        
        dataSetting = response;
        if (response){
            post_device_setting(response,APIKEY); // ambil dari serialdata.js
        } 
    });
  }
  
  
  function getAnalisaAlat( resp ){

    var obj = JSON.parse( dataSetting );
    var request = get_device_data(dataSetting, APIKEY); //ambil dari 
    
    var brt_wadah = $("#blangko").val();
    var brt_akhir = $("#gula").val();
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
        if (str){
            
            isi = str.substring(obj.awal, obj.akhir);
            isi = isi.replace('SUI', '')
            isi = parseFloat(isi);
            isi = Math.abs( isi.toFixed(2) );
            //console.log(isi)
            showDisplay(isi,resp);
            
        }
    });
    
  }
  
  function showDisplay(isi,flag){
    
    var tarra_f1 = parseFloat( $("#tarra_f1").val() );
    var tarra_f2 = parseFloat( $("#tarra_f2").val() );
    var tarra_f3 = parseFloat( $("#tarra_f3").val() );
    var tarra_f4 = parseFloat( $("#tarra_f4").val() );
    var tarra_f5 = parseFloat( $("#tarra_f5").val() );
    var tarra_f6 = parseFloat( $("#tarra_f6").val() );
    var sample = parseFloat( $("#sample").val() );
    
    var brutto_f1 = parseFloat( $("#brutto_f1").val() );
    var brutto_f2 = parseFloat( $("#brutto_f2").val() );
    var brutto_f3 = parseFloat( $("#brutto_f3").val() );
    var brutto_f4 = parseFloat( $("#brutto_f4").val() );
    var brutto_f5 = parseFloat( $("#brutto_f5").val() );
    
    
    //console.log(input);
    if (flag == 'form'){
        
        if ( tarra_f1 == 0){
            $("#tarra_f1").val(isi)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 == 0 ){
            $("#tarra_f2").val(isi);
        }
        
        if ( tarra_f2 > 0 && tarra_f3 == 0 ){
            $("#tarra_f3").val(isi);
        } 
        
        if ( tarra_f3 > 0 && tarra_f4 == 0 ){
            $("#tarra_f4").val(isi);
        } 
        
        if ( tarra_f4 > 0 && tarra_f5 == 0 ){
            $("#tarra_f5").val(isi);
        }
        
        if ( tarra_f5 > 0 && tarra_f6 == 0 ){
            $("#tarra_f6").val(isi);
        }
        
        if ( tarra_f6 > 0 && sample == 0 ){
            $("#sample").val(isi);
            $("#simpan_sementara").show();
        }
        
    }else{ //detil
        
        if ( sample > 0 && brutto_f1 == 0 ){
            $("#brutto_f1").val(isi);
        }
        
        if ( brutto_f1 > 0 && brutto_f2 == 0 ){
            $("#brutto_f2").val(isi);
        }
        
        if ( brutto_f2 > 0 && brutto_f3 == 0 ){
            $("#brutto_f3").val(isi);
        }
        
        if ( brutto_f3 > 0 && brutto_f4 == 0 ){
            $("#brutto_f4").val(isi);
        }
        
        if ( brutto_f4 > 0 && brutto_f5 == 0 ){
            $("#brutto_f5").val(isi);
            
            hitung_hasil();
            
            document.getElementById("buttonsave").disabled = false; 
        }
        
    }
     
  }
  
  function resetform( flag ){
    
    var tarra_f1 = parseFloat( $("#tarra_f1").val() );
    var tarra_f2 = parseFloat( $("#tarra_f2").val() );
    var tarra_f3 = parseFloat( $("#tarra_f3").val() );
    var tarra_f4 = parseFloat( $("#tarra_f4").val() );
    var tarra_f5 = parseFloat( $("#tarra_f5").val() );
    var tarra_f6 = parseFloat( $("#tarra_f6").val() );
    var sample = parseFloat( $("#sample").val() );
    
    var brutto_f1 = parseFloat( $("#brutto_f1").val() );
    var brutto_f2 = parseFloat( $("#brutto_f2").val() );
    var brutto_f3 = parseFloat( $("#brutto_f3").val() );
    var brutto_f4 = parseFloat( $("#brutto_f4").val() );
    var brutto_f5 = parseFloat( $("#brutto_f5").val() );
    
    //if ( tarra_f1> 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 tarra_f6 > 0 && sample > 0 && 
         //brutto_f1 > 0 && brutto_f2 > 0 && brutto_f3 > 0 && brutto_f4 > 0 brutto_f4 > 0 && brutto_f5 > 0  ){
            
    if (flag == 'detil'){
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 > 0 && sample > 0 &&
        brutto_f1 > 0 && brutto_f2 > 0 && brutto_f3 > 0 && brutto_f4 > 0 && brutto_f4 > 0 && brutto_f5 > 0  )
        {     
            $("#brutto_f5").val(0);
            $("#brutto_f6").val(0);
            $("#net_f1").val(0);
            $("#net_f2").val(0);
            $("#net_f3").val(0);
            $("#net_f4").val(0);
            $("#net_f5").val(0);
            $("#net_f6").val(0);
            
            $("#g_size").val(0);
            $("#ma").val(0);
            $("#sd").val(0);
            $("#cv").val(0);
            
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 > 0 && sample > 0 &&
            brutto_f1 > 0 && brutto_f2 > 0 && brutto_f3 > 0 && brutto_f4 > 0 && brutto_f5 == 0  )
        {     
            $("#brutto_f4").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 > 0 && sample > 0 &&
            brutto_f1 > 0 && brutto_f2 > 0 && brutto_f3 > 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#brutto_f3").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 > 0 && sample > 0 &&
            brutto_f1 > 0 && brutto_f2 > 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#brutto_f2").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 > 0 && sample > 0 &&
            brutto_f1 > 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#brutto_f1").val(0)
        }
        
    }else{
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 > 0 && sample > 0 &&
        brutto_f1 == 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#sample").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 > 0 && sample == 0 &&
            brutto_f1 == 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#tarra_f6").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 > 0 && tarra_f6 == 0 && sample == 0 &&
            brutto_f1 == 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#tarra_f5").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 > 0 && tarra_f5 == 0 && tarra_f6 == 0 && sample == 0 &&
            brutto_f1 == 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#tarra_f4").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 > 0 && tarra_f4 == 0 && tarra_f5 == 0 && tarra_f6 == 0 && sample == 0 &&
            brutto_f1 == 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#tarra_f3").val(0)
        }
        
        if ( tarra_f1 > 0 && tarra_f2 > 0 && tarra_f3 == 0 && tarra_f4 == 0 && tarra_f5 == 0 && tarra_f6 == 0 && sample == 0 &&
            brutto_f1 == 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#tarra_f2").val(0)
        }
        
        
        if ( tarra_f1 > 0 && tarra_f2 == 0 && tarra_f3 == 0 && tarra_f4 == 0 && tarra_f5 == 0 && tarra_f6 == 0 && sample == 0 &&
            brutto_f1 == 0 && brutto_f2 == 0 && brutto_f3 == 0 && brutto_f4 == 0 && brutto_f5 == 0  )
        {     
            $("#tarra_f1").val(0)
        }
        
    }
}

  function showdatatable(){
    
    data = new Array();
    
    month = $('#calendarpicker').val();
    
    data[0] = month;
    
    document.getElementById("t1_search").innerHTML ="";
    
    ajax_do_action( 'showdatatable', 'showdatatable',data);
    
    
  }
  
  function hitung_hasil(){
    
    var brt_brutto_f6;
    var tarra_f1 = parseFloat( $("#tarra_f1").val() );
    var tarra_f2 = parseFloat( $("#tarra_f2").val() );
    var tarra_f3 = parseFloat( $("#tarra_f3").val() );
    var tarra_f4 = parseFloat( $("#tarra_f4").val() );
    var tarra_f5 = parseFloat( $("#tarra_f5").val() );
    var tarra_f6 = parseFloat( $("#tarra_f6").val() );
    var brutto_f1 = parseFloat( $("#brutto_f1").val() );
    var brutto_f2 = parseFloat( $("#brutto_f2").val() );
    var brutto_f3 = parseFloat( $("#brutto_f3").val() );
    var brutto_f4 = parseFloat( $("#brutto_f4").val() );
    var brutto_f5 = parseFloat( $("#brutto_f5").val() );
    var brt_tarra_f1sd6 = tarra_f1 + tarra_f2 + tarra_f3 + tarra_f4 + tarra_f5 + tarra_f6;
    var brt_brutto_f1sd5 = brutto_f1 + brutto_f2 + brutto_f3 + brutto_f4 + brutto_f5;
    var sample = parseFloat( $("#sample").val() );
    var brutto_f6 = sample + brt_tarra_f1sd6 - brt_brutto_f1sd5;
    
    //brutto_f6.toFixed(2);
    
    $("#brutto_f6").val(brutto_f6.toFixed(2));
    
    var net_f1 = brutto_f1 - tarra_f1;
    var net_f2 = brutto_f2 - tarra_f2;
    var net_f3 = brutto_f3- tarra_f3;
    var net_f4 = brutto_f4 - tarra_f4;
    var net_f5 = brutto_f5 - tarra_f5;
    var net_f1sd5 = net_f2 + net_f3 + net_f4 + net_f5;
    var net_f6 = brutto_f6 - tarra_f6; //sample - net_f1sd5;
    
    $("#net_f1").val(net_f1);
    $("#net_f2").val(net_f2);
    $("#net_f3").val(net_f3);
    $("#net_f4").val(net_f4);
    $("#net_f5").val(net_f5);
    $("#net_f6").val(net_f6);
    
    var a = sample;
    var b = net_f1;
    var c = net_f2;
    var d = net_f3;
    var e = net_f4;
    var f = net_f5;
    var g = net_f6;
    
    var g_size = 10 / ((b/a*4.8) + (c/a*7.1) + (d/a*10) + (e/a*14.1) + (f/a*24) + (g/a*48));
    var ma = (b/a*1.85) + (c/a*1.44) + (d/a*1.015) + (e/a*0.725) + (f/a*0.45) + (g/a*0.275);
    //var sd = (((ma-1.85)*b) + ((ma-1.44)*c) + ((ma-1.015)*d) + ((ma-0.725)*e) + ((ma-0.45)*f) + ((ma-0.275)*g)) / a;
    //untuk develop dimatikan dl karena error di browser lama untuk pangkat **
    var sd = ( ( b / a * ((ma - 1.85)**2) ) + ( c / a * ((ma - 1.44)**2) ) + ( d / a * ((ma - 1.015)**2) ) + ( e / a * ((ma - 0.725)**2) ) + 
             ( f / a * ((ma - 0.45)**2) ) + ( g / a * ((ma - 0.275)**2) ) )**0.5;
            
    var cv = sd/ma *100;
    
    $("#g_size").val(g_size.toFixed(2));
    $("#ma").val(ma.toFixed(2));
    $("#sd").val(sd.toFixed(2));
    $("#cv").val(cv.toFixed(2));
  }



</script>
