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
    
    var ip = '192.168.100.28'; 
    var request = get_device_setting(ip); 
    
    request.done(function (response, textStatus, jqXHR){
        
        dataSetting = response;
        if (response){
            post_device_setting(response,APIKEY); // ambil dari serialdata.js
        } 
    });
  }
  
  function getAnalisaAlat( resp ){
    
    var pengenceran = $("#pengenceran").val();
    var parameter = $("#parameter").val();
    
    var obj = JSON.parse( dataSetting );
    var request = get_device_data(dataSetting, APIKEY); //ambil dari serialdata.js
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
        if (str){
            
            var res = str.split("\r\n");

            //res.forEach(printarray);
            //index parameter 139
            //index value 172
            //index unit 175
            
            value = res[172];
            v = value.split(">");
            value_x = parseFloat(v[1]);
            
            if(parameter == 'P005' || parameter == 'P006'){
                hasil = value_x * pengenceran;
                $("#hasil").val(hasil);
            }else{
                $("#hasil").val(value_x);
            }

            //console.log(value_x)
        } 
    });
    
  }
  
  function printarray(item, index) {
    //document.getElementById("demo").innerHTML += index + ":" + item + "<br>";
    console.log(index+" = "+item)
  }



</script>
