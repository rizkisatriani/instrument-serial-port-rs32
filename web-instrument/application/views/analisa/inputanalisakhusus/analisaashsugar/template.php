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
        //console.log(controller);
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
            /*
            isi = str.substring(obj.awal, obj.akhir);
            isi = parseFloat(isi);
            isi = Math.abs( isi.toFixed(2) );
            
            if (brt_wadah == 0){
                $("#blangko").val(isi);
            }
            
            if (brt_wadah != 0){
                $("#gula").val(isi);
                
                hitung_hasil();
            }
            */
            var res = str.split(",");
            ph = parseFloat(res[obj.awal].replace("+",""));
            ph = ph.toFixed(2); 
            
            $('#hasilP').val(ph);
            
            condy = parseFloat(res[obj.akhir]);
            
            a = parseInt(obj.akhir);
            
            st = res[a+1];
            
            temp = res[a+2];
            
            //kl yg "1" pengali "10" (mS/m)
            //kl yg "2" pengali "10000" (S/m)
            
            if (st == '1'){
                faktor = 10;
            }else{
                faktor = 10000;
            }
            
            condy = condy * faktor;
            condy = condy.toFixed(2); 
            
            //$('#hasilC').val(condy);
            
            blangko = $("#blangko").val();
            
            if (blangko == 0){
                $("#blangko").val(condy);
            }
            
            if ( blangko != 0){
                $("#gula").val(condy);
                
                $("#temp").val( parseFloat(temp.replace("+","")) );
                
                hitung_hasil();
            }
            
            
        }
    });
    
  }
  
  function hitung_hasil(){

    var hasil;
    var cond_blanko = $("#blangko").val();
    var cond_gula = $("#gula").val();
    var cond_temp = $("#temp").val();

    //hasil = 0.096618 + ( 0.0003459 * ( cond_gula - cond_blanko) )
    hasil =  ((cond_gula - 0.35*cond_blanko)*0.0006)/(1+0.026*(cond_temp-26))
    x = hasil.toFixed(4);
  //console.log(cond_blanko);
    $("#hasil").val(x);
  }
  
  function resetform(){
    
    var brt_awal = $("#blangko").val();
    var brt_akhir = $("#gula").val();
    
    if (brt_akhir != 0 && brt_awal != 0){
        $("#gula").val(0);
        $("#hasil").val(0);
    }
    
    if (brt_akhir == 0 && brt_awal != 0){
        $("#blangko").val(0);
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
