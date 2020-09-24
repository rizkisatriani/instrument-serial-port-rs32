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
    console.log(obj);
    var request = get_device_data(dataSetting, APIKEY); //ambil dari 
    
    var brix_pi1 = $("#brix_pi1").val();
    var brix_pi2 = $("#brix_pi2").val(); 
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
         console.log(response);
        if (str){
            
           // isi = str.substring(obj.awal, obj.akhir);
            var patt = /Brix:.+\d/i;
            isi1= str.match(patt);
            isi=isi1.toString().replace("Brix:", "");
            isi = parseFloat(isi);
            isi = Math.abs( isi.toFixed(2) );
            console.log("isi :"+isi);
            
            if (brix_pi1 == 0){
                $("#brix_pi1").val(isi);
            }
            
            if (brix_pi2 == 0 && brix_pi1 != 0){
                $("#brix_pi2").val(isi);
            }
            
            if ( brix_pi2 != 0 && brix_pi1 != 0){
                
                hitung_hasil();
            }
            
            
        }
    });
    
  }
  
  function hitung_hasil(){
    
    var hasil;
    var brix_pi1 = $("#brix_pi1").val();
    var brix_pi2 = $("#brix_pi2").val(); 
    
    hasil = brix_pi1/brix_pi2*100;
    hasil = hasil.toFixed(2);
    
    $("#hasil").val(hasil);
  }
  
  function resetform(){
    
    var brix_pi1 = $("#brix_pi1").val();
    var brix_pi2 = $("#brix_pi2").val();
    var hasil = $("#hasil").val();
    
    if (brix_pi1 != 0 && brix_pi2 != 0 ){
        $("#brix_pi2").val(0);
        $("#hasil").val(0);
    }
    
    if (brix_pi2 == 0 && brix_pi1 != 0  ){
        $("#brix_pi1").val(0);
    }
    
     

  }
  
    function showdatatable(){
    
    data = new Array();
    
    month = $('#calendarpicker').val();
    
    data[0] = month;
    
    document.getElementById("t1_search").innerHTML ="";
    
    ajax_do_action( 'showdatatable', 'showdatatable',data);
    
    
  }



</script>
