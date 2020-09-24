<?php $this->load->view('element/include/breadcrumbs');?>
<?php //$this->load->view('element/include/actionworkflow.php');?>
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
  //var APIKEY = "";

  $(document).ready(function(){

    showdata();
        //console.log(controller); 
        //showdatatable();
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
    var request = get_device_data(dataSetting, APIKEY); //ambil dari serialdata.js
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
        if (str){

            var res = str.split(",");
            
            //isi = parseFloat(res[obj.metode_value] );
            isi = parseFloat(res[obj.metode_value].replace("+",""));
            //isi = parseFloat(res[10].replace("+",""));

            //console.log(res[10]);
            isi = isi.toFixed(2); 

            $('#hasil').val(isi);
        } 
    });
    
    /*
    var request = get_device_setting( );
    
    request.done(function (response, textStatus, jqXHR){
   
        var obj = JSON.parse(response);

        $.ajax({
          type:"GET",
          headers: { "Content-Type": "application/json",
                     "App-key" : APIKEY
                    },
          data : JSON.stringify({
                  "Id":1,
                  "Title":"PT Gunung Madu Plantations",
                  "Author":obj.nama,
                  "COM_SET":obj.config,
                  "COM_STATUS":false,
                  "COM_MESSAGE":"",
                  "VALUE":"0.00"
                }),
          timeout:5000,
          url: obj.url,
          error: function (error) {
            //console.log(error.statusText);
            custom_alert_notif(error.statusText,title="Alert",action="alert");
          },
          success :function (data){
            var str = data.VALUE;
            var res = str.split(",");
            
            isi = parseFloat(res[obj.metode_value]);
            isi = isi.toFixed(2);

            $('#hasil').val(isi);
    
          }
        });
    
    });
    */
  }
  
  function showdatatable(){
    
    data = new Array();
    
    month = $('#calendarpicker').val();
    
    data[0] = month;
    
    document.getElementById("t1_search").innerHTML ="";
    
    ajax_do_action( 'showdatatable', 'showdatatable',data);
    
    
  }



</script>
