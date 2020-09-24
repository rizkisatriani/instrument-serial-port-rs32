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
         //console.log(response);
        if (str){
            
            var res = str.split(",");
            //console.log(res);
            /*
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
             */
             
            real_z = res[26];
            real_z = parseFloat(real_z);
            e = real_z.toFixed(2);
            $("#real_z").val(e);
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
    
    Qt = $("#Qt").val(); //read
    Po = $("#Po").val();
    PR = $("#PR").val();
    PL = $("#PL").val();
    
    Q20 = $("#Q20").val();
    tp = $("#tp").val();
    c = $("#c").val();
    tr = $("#tr").val(); //
    z = $("#real_z").val();
    
    if (!Qt){
       $("#Qt").val(z);
    }
    
    if (Qt && !Po){
         $("#Po").val(z);
    }
    
    if (Qt && Po && !PR){
         $("#PR").val(z);
    }
    
    if (Qt && Po && PR && !PL){
         $("#PL").val(z);
    }
    
    hitunghasil();
  
  }
  
  function resetform(){ 
    
    Q20 = $("#Q20").val();
    
    Qt = $("#Qt").val(); //read
    Po = $("#Po").val();
    PR = $("#PR").val();
    PL = $("#PL").val();
    
    tp = $("#tp").val();
    
    tr = $("#tr").val();
    
    c = $("#c").val(); //konstan
     //
    z = $("#real_z").val();
    
    if (Qt && Po && PR && PL){
        $("#PL").val("");
        $("#hasil").val("");
    }
    
    if (Qt && Po && PR && !PL){
        $("#PR").val("");
    }
    
    if (Qt && Po && !PR && !PL){
        $("#Po").val("");
    }
    
    if (Qt && !Po && !PR && !PL){
        $("#Qt").val("");
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
