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
  
  function processgetData(){
    data = new Array();
    
    tgl = $('#tanggal').val();
    jam = $('#jam_analisa').val();
    
    data[0] = tgl;
    data[1] = jam;
    ajax_do_action( 'open_form_grid_analisa', 'gridedit',data);
  }
  
  function openDialogUpdateVerifyTmp(id,value,material,parameter){
        Metro.dialog.create({
            title: material,
            content: "<div><input type='text' id='hasil' data-role='input' data-prepend='"+parameter+" : ' value='"+value+"'></div>",
            actions: [
                {
                    caption: "Update",
                    cls: "js-dialog-close warning",
                    onclick: function(){
                        YeNo = confirm("Apakah Anda Yakin untuk update data!");
                        if (YeNo == true){
                            hasil = $("#hasil").val();
                            updateVerifikasiTmp(id,hasil);
                        }
                    }
                },
                {
                    caption: "Batal",
                    cls: "js-dialog-close",
                    onclick: function(){
                    }
                }
            ]
        });
    }
    
    function updateVerifikasiTmp(id,hasil){
        URL =  baseURL + menu + '/' + submenu + '/' + controller + '/update_verifikasi_tmp',
        
        $.post( URL , { id: id,hasil: hasil },
          function(result){
            var msg = $.trim(result);
 					if (msg == 'OK') {
                        processgetData()
 					}
          }); 
    }
    
    function simpanVerifikasi(tgl,jam){
        
        URL =  baseURL + menu + '/' + submenu + '/' + controller + '/simpan_verifikasi',
        
        $.post( URL , { jam: jam,tgl: tgl, param:'water' },
          function(result){
            var msg = $.trim(result);
				if (msg == 'OK') {
				    custom_alert_notif("Data Berhasil di simpan",title="Berhasil",action="success");
                    createanalisa();
                    
				}else{
				    custom_alert_notif("Data Verifikasi Sudah di buat",title="Error",action="alert");
				}
          });
        //console.log(tgl)
    }
    
    function batalVerifikasi(tgl,jam){
        URL =  baseURL + menu + '/' + submenu + '/' + controller + '/batal_verifikasi',
          $.post( URL , { jam: jam,tgl: tgl, param:'water' },
          function(result){
            var msg = $.trim(result);
				if (msg == 'OK') {
				    custom_alert_notif("Data Berhasil di Hapus",title="Berhasil",action="success");
                    createanalisa();
				}
          });
    }


</script>
