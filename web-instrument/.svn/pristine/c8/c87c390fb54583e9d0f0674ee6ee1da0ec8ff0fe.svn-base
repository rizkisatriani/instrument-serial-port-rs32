<?php
header("Access-Control-Allow-Origin: *");
$this->load->view('element/include/breadcrumbs');?>

<div class="m-3" id="content"></div>
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
        
        var ip = $("#ip").val(); 

        if (ip){
            //openDialogActions();
            var request = get_device_setting(ip); 
            
            request.done(function (response, textStatus, jqXHR){
                dataSetting = response;
                if (response){
                    if (response=='false'){
                        custom_alert_notif("Your canot acces this page, PC not registered",title="Alert",action="alert");
                    }else{
                        openDialogActions();
                    }
                }
            });
        }else{
            //custom_alert_notif("Your canot acces this page, PC not registered",title="Alert",action="alert");
            var get_ip = get_devices_ip_manual(APIKEY);
            get_ip.done(function (response, textStatus, jqXHR){ 
                
                if (response){
                    ip = response.LocalAddress;
                    if (ip){
                        var request = get_device_setting(ip); 
            
                        request.done(function (response, textStatus, jqXHR){
                            dataSetting = response;
                            if (response){
                                if (response=='false'){
                                    custom_alert_notif("Your canot acces this page, PC not registered",title="Alert",action="alert");
                                }else{
                                    openDialogActions();
                                }
                            }
                        }); 
                    }else{
                         custom_alert_notif("Your canot acces this page, PC not registered",title="Alert",action="alert");
                    }

                }
                
            });
            
        }
        //
    });

    function openDialogActions(){
        
        var obj = JSON.parse( dataSetting );
        if (obj.kode_produk!=""){
            
            switch (obj.kode_produk){
                case '20kg':
                    select = "<div><input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Box 20kg' value='20kg' checked><br>"+
                                "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Pack 1kg' value='1kg' disabled> <br>"+
                                "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Bag 50kg' value='50kg' disabled><br>"+
                            "</div>";
                break;
                case '1kg':
                    select = "<div><input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Box 20kg' value='20kg' disabled ><br>"+
                                "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Pack 1kg' value='1kg' checked> <br>"+
                                "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Bag 50kg' value='50kg' disabled><br>"+
                            "</div>";
                break;
                case '50kg':
                     select = "<div><input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Box 20kg' value='20kg' disabled><br>"+
                                "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Pack 1kg' value='1kg' disabled> <br>"+
                                "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Bag 50kg' value='50kg' checked><br>"+
                            "</div>";
                break;
                default:
                    select = "";
                break;
            }
            
            Metro.dialog.create({
                title: "Pilih Jenis Analisa Uji Petik?",
                clsDialog: "success",
                /*
                content: "<div><input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Box 20kg' value='20kg' checked><br>"+
                              "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Pack 1kg' value='1kg'> <br>"+
                              "<input type='radio' name='JenisPack' data-role='radio' data-style='2' data-caption='Bag 50kg' value='50kg'><br>"+
                        "</div>",*/
                content:select,       
                actions: [
                {
                    caption: "Batal",
                    cls: "js-dialog-close alert",
                    onclick: function(){
                        window.location = baseURL;
                    }
                },
                {
                    caption: "OKE",
                    //cls: "js-dialog-close success",
                    cls: "success",
                    onclick: function(el){
                        
                        var actifity = Metro.activity.open({
                            type: 'metro',
                            text: '<div class=\'mt-2 text-small\'>Please, wait try to connecting to weigher</div>'
                        });
                        var jenis = $('input[name="JenisPack"]:checked').val();
                        PostParameterAlat(el, actifity , jenis);
                        //PostParameterAlat();
                    }
                },]
            });
            
        }
        
    }


    function detilanalisa(id){
        data = new Array();
        data[1] = id;
        ajax_do_action( 'open_detil_analisa', 'content',data);
    }
    
    /*
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
    */
    

    function PostParameterAlat(el, actifity, jenis){
        
        var ip = $("#ip").val(); 
        var request = get_device_setting( ip );
    
        request.done(function (response, textStatus, jqXHR){
            
            if (response){
                
                var obj = JSON.parse(response);        
                $.ajax({
                      type:"POST",
                      headers: { "Content-Type": "application/json",
                                 "App-key" : APIKEY
                                },
                      data : JSON.stringify({
                              "Id":1,
                              "Title":"PT Gunung Madu Plantations",
                              "Author": obj.nama,
                              "COM_SET": obj.config,
                              "COM_STATUS":false,
                              "COM_MESSAGE":"",
                              "VALUE":"0.00"
                            }),
                      timeout:5000,
                      url: obj.url,
                      complete :function (data){
                        //console.log(data);
                        Metro.activity.close(actifity);
                        switch (data.status) {
                          case 201:
                            Metro.dialog.close(el);
                            data = new Array();
                            data[1] = jenis;
                            ajax_do_action( 'open_form_analisa', 'content',data);
                          break;
                          case 403:
                            custom_alert_notif(data.responseText,title="Warning",action="warning");
                          break;
                          default:
                            custom_alert_notif("Weigher Not Connected, Pleace Contact Yout Administrator",title="Alert",action="alert");
                          break;
                        }
                      }
                });
            }else{
                custom_alert_notif("Your canot acces this page, PC not registered",title="Alert",action="alert");
                setInterval(function() { 
                    
                    custom_alert_notif("Your canot acces this page, PC not registered",title="Alert",action="alert");
                
                 },3000);
                
            }
    
        });
    }
    
    
    function getAnalisaAlat( resp ){
    
        var obj = JSON.parse(resp);

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
            show_display_weigh(data.VALUE)
    
          }
        });
    }
    
</script>
