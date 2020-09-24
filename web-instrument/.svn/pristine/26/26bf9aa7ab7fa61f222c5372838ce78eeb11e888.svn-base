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
  var dataSetting2;
  
  var input = 1;
  var next = 2;
  var prev = 0;

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
  
  function PostParameterAlat(){ //pH
    var ip = $("#ip").val();
    var request = get_device_setting(ip); 
    
    request.done(function (response, textStatus, jqXHR){
        
        dataSetting = response;
        if (response){
            post_device_setting(response,APIKEY); // ambil dari serialdata.js
        } 
    });
  }
  
  function PostParameterAlat2(){ //Spectro
  
    var ip = '192.168.100.28'; 
    var request = get_device_setting(ip); 
    
    request.done(function (response, textStatus, jqXHR){
        
        dataSetting2 = response;
        if (response){
            //post_device_setting(response,APIKEY); // ambil dari serialdata.js
        } 
    });
  }
  
  function getAnalisaAlat( resp ){
    
    var parameter = $("#parameter").val();
    
    if (parameter == 'P003'){ //PH Meter
        
        var obj = JSON.parse( dataSetting );
        var request = get_device_data(dataSetting, APIKEY); //ambil dari 
        
        request.done(function (response, textStatus, jqXHR){
            var str = response.VALUE;
            if (str){    
                var res = str.split(",");
                ph = parseFloat(res[obj.awal].replace("+",""));
                ph = ph.toFixed(2); 
                
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
                
                $("#input1_"+input).val(condy);
                $("#input2_"+input).val(ph);
                
                getInput('get') ;
            }
        });
        
        
    }else{ //Spectrofotometer
    
        var obj = JSON.parse( dataSetting2 );
        var request = get_device_data(dataSetting2, APIKEY); //ambil dari serialdata.js
        
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
                
                $("#input2_"+input).val(value_x);
                
                getInput('get') ;
                
            } 
        });
   
    } //end if parameter
    
    
  }
  
  
  function getInput(btn){
    
    if (input >= 1 ){
        
        switch (btn){
            case 'get':
                if (input <= 51){
                    input = input + 1;
                    next = input + 1;
                    prev = input - 1;  
                }
                
            break;
            case 'reset':
                if (input > 1){
                    input = input - 1;  
                    $("#input1_"+input).val("");
                    $("#input2_"+input).val(""); 
                    next = next - 1; 
                    prev = prev - 1;
                }      
            break;                        
            case 'next':
                if (next <= 51){
                    
                    input = next;
                    next = input + 1;
                    prev = input - 1;
                      
                }
            break;
            case 'prev':
                if (prev > 0){
                    input = prev;
                    prev = input - 1;
                    next = input + 1;
                }
            break;
        }        
        
    }
    
    
    $("#input1_"+input).addClass("info");
    $("#input2_"+input).addClass("info");
    
    if (input >= 1){
        
        color = input -1;
        color2 = input +1;
        
        if (input <=6){
            var element1 = document.getElementById("input1_"+color);
            if (element1){
                element1.classList.remove("info");
            }
            
            var element3 = document.getElementById("input1_"+color2);
            if (element3){
                element3.classList.remove("info");
            }
            
        }

        var element2 = document.getElementById("input2_"+color);
        element2.classList.remove("info");
        
        var element4 = document.getElementById("input2_"+color2);
        element4.classList.remove("info");
        
    }
    
    document.getElementById("logoInput").innerHTML = "( "+input+" )";
     
    document.getElementById("next").innerHTML = next;
    document.getElementById("prev").innerHTML = prev;
    
  }
  
  function resetform(){
    
    getInput('reset');
  }


</script>