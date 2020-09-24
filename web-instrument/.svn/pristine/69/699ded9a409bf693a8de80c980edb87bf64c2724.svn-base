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
  
  
  function getAnalisaAlat( ){

    var obj = JSON.parse( dataSetting );
    
    startMachine()

    var obj = JSON.parse( dataSetting );
    console.log(obj.VALUE);
    var obj = JSON.parse(dataSetting);
    console.log(obj);


    var request = get_device_data(dataSetting, APIKEY); //ambil dari 
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;

        if (str){
            
            var res = str.split(",");
            //console.log(res);
            brix = res[29];
            brix = parseFloat(brix);
            brix.toFixed(2);
            $("#real_brix").val(brix);
            
            pol = res[32];
            pol = parseFloat(pol);
            pol.toFixed(2);
            $("#real_pol").val(pol);
            /*
            pty = res[35];
            pty = parseFloat(pty);
            pty.toFixed(2);
            $("#real_pty").val(pty);
            */
            
            a = pol.toFixed(2);
            b = brix.toFixed(2);
            
            c = a / b * 100;
            
            c = c.toFixed(2);
            
            $("#real_pty").val(c);
            
            bagasse = res[38];
            bagasse = parseFloat(bagasse);
            bagasse.toFixed(2);
            $("#real_bagasse").val(bagasse);
            
            filtercake = res[41];
            filtercake = parseFloat(filtercake);
            filtercake.toFixed(2);
            $("#real_filtercake").val(filtercake);
            
            /*
            var patt = /Brix:.+\d/i;
            isi1= str.match(patt);
            isi=isi1.toString().replace("Brix:", "");
            isi = parseFloat(isi);
            isi = Math.abs( isi.toFixed(2) );
            
            if (brix1 == 0){
                $("#brix1").val(isi);
            }
            
            if (brix2 == 0 && brix1 != 0){
                $("#brix2").val(isi);
                
                hitung_hasil();
            }
            */
        }
    });
    
  }
  
  function hitung_hasil(){
    
    var hasil = 0;
    var hasilFixed = 0;
    var brix1 = $("#brix1").val();
    var brix2 = $("#brix2").val(); 
    
    if(brix1==0||brix2==0){

        hitung=0;
    }else{
        hitung = brix1/brix2*100;
    }

    hasil = parseFloat(hitung);
    hasil.toFixed(2);
    
    hasilFixed = hasil.toFixed(2);

    $("#hasil").val(hasilFixed);
  }
  
  function resetform(){
    
    var brix1 = $("#brix1").val();
    var brix2 = $("#brix2").val();
    var hasil = $("#hasil").val();
    
    if (brix1 != 0 && brix2 != 0 ){
        $("#brix2").val(0);
        $("#hasil").val(0);
    }
    
    if (brix2 == 0 && brix1 != 0  ){
        $("#brix1").val(0);
    }
  }
  
  function startMachine(){
    put_device_command(dataSetting, APIKEY,'R')
  }
  
  function start_reading(){
    
        var n = 0;
        
        
        timer = setInterval(    function(){ 
                        
                    //getAnalisaAlat( dataSetting ); 
                    getAnalisaAlat();
                    n++;
                        
                    modulus = n % 2;
                    
                    if (modulus){
                        document.getElementById("processing").innerHTML ="<button class='button info large rounded no-caption place-left' disabled='disabled'><span class='mif-spinner2'></span></button>"; 
                    }else{
                       document.getElementById("processing").innerHTML ="<button class='button success large rounded no-caption place-left' disabled='disabled'><span class='mif-spinner2'></span></button>";
                    }
                        
                },1000);
    
  }
  
  function getData(){
    
    //getAnalisaAlat()
    
    var brix1 = $("#brix1").val();
    var brix2 = $("#brix2").val(); 
    
    var isi = $("#real_brix").val();
    
    if (brix1 == 0){
        $("#brix1").val(isi);
    }
            
    if (brix2 == 0 && brix1 != 0){
        $("#brix2").val(isi);
        
        hitung_hasil();
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
