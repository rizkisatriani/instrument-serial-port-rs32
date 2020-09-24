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
  
    
  function showdatatable(){
    
    data = new Array();
    
    month = $('#calendarpicker').val();
    
    data[0] = month;
    
    document.getElementById("t1_search").innerHTML ="";
    
    ajax_do_action( 'showdatatable', 'showdatatable',data);
    
    
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
    var request = get_device_data(dataSetting, APIKEY); //ambil dari serialdata.js
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
        if (str){

            var res = str.split(",");
            ph = parseFloat(res[obj.awal].replace("+",""));
            ph = ph.toFixed(2); 
            
            $('#hasilP').val(ph);
            
            condy = parseFloat(res[obj.akhir]);
            
            a = parseInt(obj.akhir);
            
            st = res[a+1];
            
            //kl yg "1" pengali "10" (mS/m)
            //kl yg "2" pengali "10000" (S/m)
            
            if (st == '1'){
                faktor = 10;
            }else{
                faktor = 10000;
            }
            
            condy = condy * faktor;
            condy = condy.toFixed(2); 
            
            $('#hasilC').val(condy);
            
            //console.log(res[62])
        } 
    });
    
    }



</script>
