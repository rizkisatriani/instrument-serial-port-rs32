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
 var controller = module.capitalize() + "_controller"

 $(document).ready(function(){

   showdata();
       //console.log(controller);
 });

 function showdata(){
   ajax_do_action( 'showdata', 'showdata');
 }

 function detil_user( id ) {
   $('.FixedHeader_Header').remove();
   data = new Array();
   data[1] = id;
   ajax_do_action( 'detil_user', 'content',data);
 }

 function tambahhakmodul(module,id_user){
    $.ajax({
 				type: 'POST',
 				data: {id_user: id_user, id_module: module},
 				cache: false,
 				url: baseURL + menu + '/' + submenu + '/' + controller + '/tambah_hakmodul',
 				beforeSend:  function(){
 					pesanupdate();
 				},
 				complete: function(){
 					progress_selesai();
 				},
 				success: function(result){
 					var msg = $.trim(result);
 					if (msg == 'OK') {
 						showdata_now_module(id_user);
            showdata_all_module(id_user);
 					}
 				}
 			});

 }

 function hapushakmodul(module,id_user){

   $.ajax({
       type: 'POST',
       data: {id_user: id_user, id_module: module},
       cache: false,
       url: baseURL + menu + '/' + submenu + '/' + controller + '/delete_hakmodul',
       success: function(result){
         var msg = $.trim(result);
         if (msg == 'OK') {
           showdata_now_module(id_user);
           showdata_all_module(id_user);
         }
       }
     });

 }

 function showdata_now_module(id){
   data = new Array();
   data[1] = id;
   ajax_do_action( 'showdata_now_module', 'responseNowModule',data);
 }

 function showdata_all_module(id){
   data = new Array();
   data[1] = id;
   ajax_do_action( 'showdata_all_module', 'responseAllModule',data);
 }

 function ubahAksesModule(flag,module,id_user){

    id = flag+module;
    checkBox = document.getElementById(id);
    nilai = checkBox.checked;
    //checkBox.checked
    $.ajax({
        type: 'POST',
        data: {iduser: id_user, idmodul: module,jenis:flag,nilai:nilai},
        cache: false,
        url: baseURL + menu + '/' + submenu + '/' + controller + '/sethakuser',
        success: function(result){
          var msg = $.trim(result);
          if (msg == 'OK') {
            showdata_now_module(id_user);
            showdata_all_module(id_user);
          }
        }
      });
 }

 function reset(id){

   Metro.dialog.create({
            title: "Use Default Passwod For this User?",
            content: "<div>Reset Password</div>",
            clsDialog: "warning",
            actions: [
                {
                    caption: "Agree",
                    cls: "js-dialog-close alert",
                    onclick: function(){

                      $.ajax({
                          type: 'POST',
                          data: {iduser: id},
                          cache: false,
                          url: baseURL + menu + '/' + submenu + '/' + controller + '/ResetPassword',
                          success: function(result){
                            var msg = $.trim(result);
                            if (msg == 'OK') {
                                showdata();
                            }else{
                              alert("Delete Failed");
                            }
                          }
                        });

                    }
                },
                {
                    caption: "Disagree",
                    cls: "js-dialog-close",

                }
            ]
        });

 }

 function hapus(id){

   Metro.dialog.create({
            title: "Do You Won to Delete this User?",
            content: "<div>Warning Delete User</div>",
            clsDialog: "alert",
            actions: [
                {
                    caption: "Agree",
                    cls: "js-dialog-close alert",
                    onclick: function(){

                      $.ajax({
                          type: 'POST',
                          data: {iduser: id},
                          cache: false,
                          url: baseURL + menu + '/' + submenu + '/' + controller + '/DeleteUser',
                          success: function(result){
                            var msg = $.trim(result);
                            if (msg == 'OK') {
                                showdata();
                            }else{
                              alert("Delete Failed");
                            }
                          }
                        });

                    }
                },
                {
                    caption: "Disagree",
                    cls: "js-dialog-close",

                }
            ]
        });
 }

 function createUser(){
   //Metro.dialog.open('#demoDialog1');
   //ini gx bisa pake enter harus satu baris
   var formInput = "<div><div class='form-group'><label>NIP</label><input type='text' placeholder='NIP User' name='nip' id='nip' data-validate='required'/></div><div class='form-group'><label>Nama</label><input type='text' placeholder='Nama User' name='nama' id='nama'/></div></div>";
   var id = 2;

   Metro.dialog.create({
            title: "Create New User?",
            content: formInput,
            clsDialog: "success",
            actions: [
                {
                    caption: "Save",
                    cls: "js-dialog-close success",
                    onclick: function(){

                      var nip = $('#nip').val();
                      var nama = $('#nama').val();

                      if (nip=='' || nama == ''){
                        alert("NIP atau Nama Tidak boleh Kosong");

                        return false;
                      }

                      $.ajax({
                          type: 'POST',
                          data: {nip: nip,nama:nama},
                          cache: false,
                          url: baseURL + menu + '/' + submenu + '/' + controller + '/CreateNewUser',
                          success: function(result){
                            var msg = $.trim(result);
                            var isi = msg.split('|');
                            if (isi[0] == "OK") {
                                detil_user( isi[1] );
                                //console.log(isi[0]);
                            }else{
                              alert(msg);
                            }
                          }
                        });

                    }
                },
                {
                    caption: "Close",
                    cls: "js-dialog-close",

                }
            ]
        });
 }

 function AllowAktif(iduser){

   var aktif = $('#Aktif'+iduser).val();
   //console.log(aktif);

   $.ajax({
       type: 'POST',
       data: {aktif: aktif,iduser:iduser},
       cache: false,
       url: baseURL + menu + '/' + submenu + '/' + controller + '/AllowAktif',
       success: function(result){
         var msg = $.trim(result);

         if (msg == "OK") {
             showdata();
             //console.log(isi[0]);
         }else{
           alert(msg);
         }
       }
     });

     //console.log(aktif);
 }


</script>
