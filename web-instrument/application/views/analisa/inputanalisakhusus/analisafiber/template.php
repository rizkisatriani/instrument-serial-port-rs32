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
    var request = get_device_data(dataSetting, APIKEY); //ambil dari 
    
    var brt_wadah = $("#wadah").val();
    var brt_awal = $("#awal").val();
    var brt_akhir = $("#akhir").val();
    var brt_kering = $("#kering").val();
    var input_param = $("#parameter").val();
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
        if (str){
            
            isi = str.substring(obj.awal, obj.akhir);
            isi = parseFloat(isi);
            isi = Math.abs( isi.toFixed(2) );
            
            if (brt_wadah == 0){
                $("#wadah").val(isi);
            }
            
            if (brt_awal == 0 && brt_wadah != 0){
                $("#awal").val(isi);
                
                if (input_param == 'P010' ){
                    $("#simpan_sementara").show();
                }
                
            }
            
            if (input_param != 'P010'){
            
                if (brt_akhir == 0 && brt_awal != 0 && brt_wadah != 0){
                    $("#akhir").val(isi);
                    
                    if (input_param == 'P010' ){
                        hitung_hasil();
                    }else{
                        $("#simpan_sementara").show();
                    }
                }
            }
            
            /*
            if (input_param != 'P010'){
                
                if ( brt_kering == 0 && brt_akhir != 0 && brt_awal != 0 && brt_wadah != 0){
                    $("#kering").val(isi);
                
                    hitung_hasil();
                }   
            } */  
        }
    });
    
  }
  
  function hitung_hasil(){
    
    var parameter = $("#parameter").val();
    
    if ( parameter == 'P010' ){
        
        var a = $("#wadah").val();
        var b = $("#awal").val();
        var c = $("#akhir").val();
        //var d = $("#kering").val();
        
        a = parseFloat(a);
        b = parseFloat(b);
        c = parseFloat(c);
        
        hasil = ( (c - a ) / (b - a) ) * 100;
        
        x = hasil.toFixed(2);
        
        $("#hasil").val(x);
         
    }else{
        
        var a = $("#wadah").val();
        var b = $("#awal").val();
        var c = $("#akhir").val();
        var d = $("#kering").val();
        
        //hasil = 100 - ((brt_awal - brt_akhir) / (brt_awal - brt_wadah) *100);
        //hasil = hasil.toFixed(2);
        
        //$("#hasil").val(hasil);
        
        a = parseFloat(a);
        b = parseFloat(b);
        c = parseFloat(c);
        d = parseFloat(d);
        
        hasil = (d - c + a) / a * 100;
         
        x = hasil.toFixed(2);
        
        $("#hasil").val(x);
    }
    
  }
  
  function resetform(){
    
    var brt_wadah = $("#wadah").val();
    var brt_awal = $("#awal").val();
    var brt_akhir = $("#akhir").val();
    var brt_kering = $("#kering").val();
    
    if ( brt_kering != 0 && brt_akhir != 0 && brt_awal != 0 && brt_wadah != 0){
        $("#kering").val(0);
        $("#hasil").val(0);
        $("#simpan_sementara").hide();
    }
    
    if ( brt_kering == 0 && brt_akhir != 0 && brt_awal != 0 && brt_wadah != 0){
        $("#akhir").val(0);
        $("#hasil").val(0);
        $("#simpan_sementara").hide();
    }
    
    if ( brt_kering == 0 && brt_akhir == 0 && brt_awal != 0 && brt_wadah != 0){
        $("#awal").val(0);
    }
    
    if ( brt_kering == 0 && brt_akhir == 0 && brt_awal == 0 && brt_wadah != 0){
        $("#wadah").val(0);
    }

  }
  
  function showdatatable(){
    
    data = new Array();
    
    month = $('#calendarpicker').val();
    
    data[0] = month;
    
    document.getElementById("t1_search").innerHTML ="";
    
    ajax_do_action( 'showdatatable', 'showdatatable',data);

  }
  
  function change_parameter(){

        document.getElementById("span_material").innerHTML = "";
        
        var parameter = $("#parameter").val();
        
        var opt = "<select data-role='select' id='material_analisa' name='material_analisa' >";                  
        for ( var key in arrayMaterial ){
            
            if (arrayMaterial.hasOwnProperty(key)) {
                if (parameter == 'P010'){
                    if (key == 4){
                        opt += "<option value='"+ key +"'>"+ arrayMaterial[key] +"</option>";
                    }
                }
                
                if (parameter == 'P004'){
                    if (key == 2 || key == 6 || key == 9 || (key >= 181 && key <= 183)){
                        opt += "<option value='"+ key +"'>"+ arrayMaterial[key] +"</option>";
                    }
                }
                
                if (parameter == 'P043'){
                    if ( key >= 121 && key <= 139 ){
                        opt += "<option value='"+ key +"'>"+ arrayMaterial[key] +"</option>";
                    }
                }  
            }
        }
        
        opt += " </select>";
        
        document.getElementById("span_material").innerHTML = opt;
        
        if ( parameter == 'P010' ){
            $(".divkering").hide();
            document.getElementById("logo1").innerHTML = "Wadah";
            document.getElementById("logo2").innerHTML = "+ Sample";
            document.getElementById("logo3").innerHTML = "Timbang Kering";
            
        }else{
            $(".divkering").show();
            document.getElementById("logo1").innerHTML = "Sample";
            document.getElementById("logo2").innerHTML = "+ Kieselguhr";
            document.getElementById("logo3").innerHTML = "+ Filter Paper";
            document.getElementById("logo4").innerHTML = "Timbang Kering";
        }
    
  }



</script>
