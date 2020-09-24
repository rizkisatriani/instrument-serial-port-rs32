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

  $(document).ready(function(){

    showdata();

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
    //sconsole.log(obj);
    var request = get_device_data(dataSetting, APIKEY); //ambil dari 
    
    startMachine();
     
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
         console.log(response);
        if (str){
            
            var res = str.split(",");
            //console.log(res);
            brix = res[29];
            brix = parseFloat(brix);
            a = brix.toFixed(2);
            $("#real_brix").val(a);
            
            pol = res[32];
            pol = parseFloat(pol);
            b = pol.toFixed(2);
            $("#real_pol").val(b);
            
            pty = res[35];
            pty = parseFloat(pty);
            //c = pty.toFixed(2);
            
            a = pol.toFixed(2);
            b = brix.toFixed(2);
            
            c = a / b * 100;
            
            c = c.toFixed(2);
            //$("#real_pty").val(pty);
            $("#real_pty").val(c);
            
            bagasse = res[38];
            bagasse = parseFloat(bagasse);
            d = bagasse.toFixed(2);
            $("#real_bagasse").val(bagasse);
            
            filtercake = res[41];
            filtercake = parseFloat(filtercake);
            e = filtercake.toFixed(2);
            $("#real_filtercake").val(filtercake);
             
        }
    });
    
  }
  
  function startMachine(){
    put_device_command(dataSetting, APIKEY,'R')
  }
  
  function start_reading(){
    
    var n = 0;
    timer = setInterval(    function(){ 
                     
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
    
    var pengenceran = $("#pengenceran").val();
    
    var brix = $("#real_brix").val();
    var pol = $("#real_pol").val();
    var pty = $("#real_pty").val();
    var bagase_pol = $("#real_bagasse").val();
    var filtercake_pol = $("#real_filtercake").val();
    
    var material = $("#material_analisa").val();
    
    var isi_pol = 0;
    var isi_brix = 0;
    
    switch (material){
        case '5': //bagase M005
            isi_pol = bagase_pol * pengenceran;
            isi_brix = "";
            pty = "";
            
            $("#flag").val("pol");
        break;
        case '7': //filter cake M007
        case '185': //M007A
        case '209': case '210'://209 - 218
        case '211': case '212': case '213': case '214': case '215': case '216': case '217': case '218':
            isi_pol = filtercake_pol * pengenceran;
            isi_brix = "";
            pty = "";
            $("#flag").val("pol");
        break;
        case '153': //M029A
        case '188': //M098A
        case '40': //M040
        case '95': //M095
        case '96': //M096
        case '97': //M097
        case '98': //M098
        case '99': //M099
        case '100': //M100
        case '101': //M101
        case '102': //M102
        case '103': //M103
        case '104': //M104
        case '105': //M105
        case '106': //M106
        case '107': //M107
        case '108': //M108
        case '109': //M109
        case '245': case '246': case '247': case '248': case '249': case '250': 
        case '251': case '252': case '253': case '254': case '255': case '256': case '257': case '258': case '259': case '260'://245 - 292
        case '261': case '262': case '263': case '264': case '265': case '266': case '267': case '268': case '269': case '270'://245 - 292
        case '271': case '272': case '273': case '274': case '275': case '276': case '277': case '278': case '279': case '280'://245 - 292
        case '281': case '282': case '283': case '284': case '285': case '286': case '287': case '288': case '289': case '290'://245 - 292
        case '291': case '292':
            isi_pol = "";
            isi_brix = brix * pengenceran;
            pty = "";
            $("#flag").val("brix");
        break;
        default:
            isi_pol = pol * pengenceran;
            isi_brix = brix * pengenceran;

            pty = pty;
            $("#flag").val("pty");
        break;
    }
    //var isi;
    if (isi_pol){
        isi = isi_pol.toFixed(2);  
    }else{
        isi = "";
    }
    //var brix_isi;
    if (isi_brix){
        brix_isi = isi_brix.toFixed(2);
    }else{
        brix_isi = "";
    }
    
    //isi = isi_pol.toFixed(2);
    //brix_isi = isi_brix.toFixed(2);
    $("#pol").val(isi);
    $("#brix").val(brix_isi); 
    $("#hasil").val(pty);
    
  }
  
  function resetform(){ 
    
    $("#pol").val(0);
    $("#hasil").val(0);
    $("#brix").val(0); 
  }
  
  function showdatatable(){
    
    data = new Array();
    
    month = $('#calendarpicker').val();
    
    data[0] = month;
    
    document.getElementById("t1_search").innerHTML ="";
    
    ajax_do_action( 'showdatatable', 'showdatatable',data);
    
    
  }
  
  

</script>
