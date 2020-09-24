<?php $this->load->view('element/include/breadcrumbs');?>

<div class="m-3">
<div id="form_master_menu"></div>

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

   form_master_menu();
       //console.log(controller);
 });

 function form_master_menu(){
   ajax_do_action( 'form_master_menu', 'form_master_menu');
 }

 function ShowSubmenu(){
   data = new Array();
   id = $('#menus').val();
   data[1] = id;

   ajax_do_action( 'showSubmenu', 'showSubmenu',data);
 }

 function CreateSubMenu(urut){
   data = new Array();
   menus = $('#menus').val();

   var formInput = "<div><div class='form-group'><label>URUT</label><input type='text' name='submenusurut' id='submenusurut' value='"+urut+"' disabled/></div><div class='form-group'><label>SUBMENU ID</label><input type='text' placeholder='Submenu Id' name='submenuid' id='submenuid' maxlength='20'/><label>KETERANGAN</label><input type='text' placeholder='Keterangan' name='submenudesc' id='submenudesc'/><label>LOGO</label><input type='text' placeholder='Logo' name='submenulogo' id='submenulogo' value='mif-list2'/></div></div>";

   Metro.dialog.create({
            title: "Create New Submenu?",
            content: formInput,
            clsDialog: "success",
            actions: [
                {
                    caption: "Save",
                    cls: "js-dialog-close success",
                    onclick: function(){

                      var submenusurut = $('#submenusurut').val();
                      var submenuid = $('#submenuid').val();
                      var submenudesc = $('#submenudesc').val();
                      var submenulogo = $('#submenulogo').val();

                      if (submenuid=='' || submenudesc == '' || submenulogo == ''){
                        alert("Submenu ID,Keterangan dan Logo Tidak boleh Kosong");

                        return false;
                      }

                      data = {
                          menus:menus,
                          submenuid:submenuid,
                          submenudesc:submenudesc,
                          submenulogo:submenulogo,
                          submenusurut:submenusurut
                      }

                      $.ajax({
                          type: 'POST',
                          data,
                          cache: false,
                          url: baseURL + menu + '/' + submenu + '/' + controller + '/createSubmenu',
                          success: function(result){
                            var msg = $.trim(result);
                            var isi = msg.split('|');
                            if (isi[0] == "OK") {
                                ShowSubmenu();
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

      function HapusModule(id,name){

        data = new Array();
        msg  = new Array();
        data = { idmodul:id }
        msg = { title : "Apakah Anda yakin menghapus module "+name+" ?",content : "Hapus "+name}
        url = baseURL + menu + '/' + submenu + '/' + controller + '/hapusmodule';
        action = "";

        custom_alert_YesNo_action(data,url,msg,action);

      }


</script>
