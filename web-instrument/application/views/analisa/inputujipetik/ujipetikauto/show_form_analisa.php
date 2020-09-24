<?php
$nama = $this->session->userdata('namalengkap');
$tanggal = date("d-m-Y");

switch ( $jenis ){
  case '20kg':
    $title = "SUGAR PACKING WEIGH 20 Kg";
  break;
  case '1kg':
    $title = "SUGAR PACKING WEIGH 1 Kg";
  break;
  case '50kg':
    $title = "SUGAR PACKING WEIGH 50 Kg";
  break;
}

$no_pack = $param['no_pack'];
$min_save = $param['min_save'];
$max_save = $param['max_save'];
$min = $param['min'];
$max = $param['max'];
?>
<div class="panel mt-4">
  <div class="row">
      <div class="cell"> <!--<div class="cell-md-6">!-->
          <div class="panel" id="analisaph1">
              <div data-role="panel" data-title-caption="ANALISA PH" data-collapsible="true"
                  data-title-icon="<span class='mif-lab'></span>" class="panel-content" data-role-panel="true">
                  <div class="grid">
                    <div class="row">
                        <div class="stub" style="width: 60%;">
                          <div></div>
                          <div class="row">
                            <div class="cell">
                              <div class="row">
                                  <div class="cell border-top border-left border-right bd-black bg-black">
                                    <div class="place-left logoweigh"><p><b>WEIGHT</b></p></div>
                                    <div class="place-right logoweigh"><p><b>Kgs</b></p></div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="cell border-bottom border-left border-right bd-black bg-black">
                                    <div id='divDisplayWeigh'style="width: 100%;"><span id="displayweigh"></span></div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="cell">
                              <!--
                              <div class="clear">
                                <button class="button place-left">Button floated left</button>
                                <div class="cell fg-yellow place-right">Kgs</div>
                              </div>-->
                              <div class="row border-bottom bd-black">
                                  <div class="cell">
                                    <div>
                                      <button class="button success large place-left" id='btnStart' onclick="PlayStopButton(this)"><span class="mif-play"></span> START</button>
                                      <button class="button alert large" id='btnStop' onclick="PlayStopButton(this)" ><span class="mif-stop"></span> STOP</button>
                                    </div>
                                  </div>
                                  <div class="cell">
                                    <div>
                                        <div>
                                            <span id="processing"></span>
                                            <span id="saving"></span>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="cell">
                                    <div id="showdataSummary"></div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        </div>
                        <div class="cell" style="width: 40%;" >
                          <div data-role='panel' id="showdata"></div>
                        </div>
                    </div>
                </div>
              </div>
              <input type='hidden' id='tmp' name='tmp' value='0'/>
              <input type='hidden' id='jenis' name='jenis' value='<?=$jenis?>'/>
              <input type='hidden' id='min_save' name='min_save' value='<?=$min_save?>'/>
              <input type='hidden' id='max_save' name='max_save' value='<?=$max_save?>'/>
              <input type='hidden' id='min' name='max_save' value='<?=$min?>'/>
              <input type='hidden' id='max' name='max_save' value='<?=$max?>'/>
              <input type='hidden' id='save' name='save' value='1'/>
              <div class="panel-title">
                  <span class="caption"><?=$title?></span>
                  <span class="mif-lamp fg-green icon"></span>
                  <span class="dropdown-toggle marker-center active-toggle"></span>
              </div>
          </div>
      </div>
  </div>
  <div id="alert_sound" ></div>
</div>
<script>

    var timer;
    var counting_alert = 0;
    var dialog_alert;
    var jenis = $('input[name="jenis"]').val();
    
    $(document).ready(function(){
        //showdata();
        show_data_no_loading();
        show_summary_no_loading();
        
        document.getElementById("processing").innerHTML ="<button class='button alert large rounded no-caption place-right' disabled='disabled'><span class='mif-spinner2'></span></button>";
        document.getElementById("saving").innerHTML ="<button class='button warning large rounded no-caption place-right' disabled='disabled'><span class='mif-download'></span></button>";
        
        $('#btnStop').hide();
        show_display_weigh("00.00");
    });

    function show_data_no_loading(){
        
        data = new Array();
        data[1] = jenis;
        ajax_do_action( 'showdata', 'showdata', data,'0');
    }
    
    function show_summary_no_loading(){
        data = new Array();
        data[1] = jenis;
        ajax_do_action( 'showdataSummary', 'showdataSummary', data,'0');
    }
    
    function PlayStopButton(e){
        switch (e.id) {
            case 'btnStart':
                $('#btnStart').hide();
                $('#btnStop').show();

                start_reading();     
            break;
            case 'btnStop':
                $('#btnStart').show();
                $('#btnStop').hide();
                stop_reading();
                //$('#btnProcess').hide();
                document.getElementById("processing").innerHTML ="<button class='button alert large rounded no-caption place-right' disabled='disabled'><span class='mif-spinner2'></span></button>";
            break;
        }
    }
    
    function show_display_weigh( value ){
        
        alert_analisa();
        
        if ( value ){
            
            var jenis = $("#jenis").val();
            
            switch (jenis){
                
                case '1kg':
                    //isi = value.replace('SUI', '')
                    isi = value;
                    isi = parseFloat(isi);
                    isi = isi.toFixed(2);
                break;
                case '20kg':
                    isi = value.replace('ST', '')
                    isi = parseFloat(isi);
                    isi = isi.toFixed(2);
                break;
                case '50kg':
                    //isi = 0;
                    isi = value.replace('ST', '')
                    isi = parseFloat(isi);
                    isi = isi.toFixed(2);
                break;
                
            }

            var tmp = $("#tmp").val();
            var min_save = $("#min_save").val();
            var max_save = $("#max_save").val();
            var min = parseFloat( $("#min").val() );
            var max = parseFloat( $("#max").val() );
            
            min_save = parseFloat(min_save);
            max_save = parseFloat(max_save);
          
            isi = parseFloat(isi);
            if (!isi){
                isi = 0;
            }
            isi = isi.toFixed(2);
            $("#displayweigh").html(isi);
            $("#tmp").val(isi);
            
            if (jenis == '1kg'){
                /*
                    karena timbangan gram gx tenang angkanya maka di buat kondisi selah baca dan simpan makan anggka timbangan harus turun dulu 
                    di bawah 500 gram baru system bisa save lagi
                */
                
                if (isi < 500){
                    document.getElementById("saving").innerHTML ="<button class='button warning large rounded no-caption place-right' disabled='disabled'><span class='mif-download'></span></button>";
                    $('#save').val(1);
                
                }
                
            }
            
            if (jenis == '50kg'){
                
                if (isi < 10){
                    document.getElementById("saving").innerHTML ="<button class='button warning large rounded no-caption place-right' disabled='disabled'><span class='mif-download'></span></button>";
                    $('#save').val(1);
                
                }
                
            }
            
            if (isi != 0 && (isi < min || isi > max) ){
                get_sound_alert();
            }
            
            if (isi < min_save){
                return false;
            }
          
            if (isi > max_save){
                return false;
            }
            
            if ( parseFloat(tmp).toFixed(2) != isi){
                
                switch (jenis){
                    
                    case '1kg':
                    case '50kg':
                        save = $('#save').val();
                        if (save == '1'){
                            
                            counting_alert = 0;
                            
                            document.getElementById("saving").innerHTML ="<button class='button primary large rounded no-caption place-right' disabled='disabled'><span class='mif-download ani-bounce''></span></button>";
                            
                            stop_reading();
                            
                            Metro.dialog.create({
                                title: "Pilih Nomor Timbangan Uji",
                                clsDialog: "info",
                                content: "<div><select data-role='select' id='timbangan' name='timbangan' data-prepend='Machine :'>"+
                                                        "<option value='A' selected>A</option>"+
                                                        "<option value='B'>B</option>"+
                                                        "<option value='C'>C</option>"+
                                                        "<option value='D'>D</option>"+
                                                        "<option value='E'>E</option>"+
                                                    "</select></div>",
                                actions: [
                                    {
                                        caption: "Simpan",
                                        cls: "js-dialog-close info",
                                        onclick: function(){
                                                timbangan = $("#timbangan").val();
                                                
                                                $.ajax({
                                            		type: 'POST',
                                            		data: {'jenis': jenis , 'hasil': isi, 'timbangan':timbangan},
                                            		cache: false,
                                            		url: baseURL + menu + '/' + submenu + '/' + controller + '/simpan_analisa',
                                            		success: function(result){
                                            			var msg = $.trim(result);
                                            			if (msg > 0 ) {
                                                            document.getElementById("saving").innerHTML ="<button class='button warning large rounded no-caption place-right' disabled='disabled'><span class='mif-download'></span></button>";
                                                            show_data_no_loading();
                                                            show_summary_no_loading();
                                                            
                                                            $('#save').val(0);
                                                            document.getElementById("saving").innerHTML ="<button class='button dark large rounded no-caption place-right' disabled='disabled'><span class='mif-download'></span></button>";
                                                            
                                                            if (jenis == '1kg' || jenis == '50kg'){
                                                                if (isi != 0 && (isi < min || isi > max) ){
                                                                    //stop_reading();
                                                                    HapusUjiPetik1kg(msg,jenis);
                                                                }else{
                                                                    start_reading();
                                                                }
                                                            }
                                                            
                                                            
                                                            
                                            			}
                                            		}
                                                });
                                        }
                                    }
                                ]
                            }); //end dialog timbang
                        } //end if save
                    break;
                    case '20kg':
                        document.getElementById("saving").innerHTML ="<button class='button primary large rounded no-caption place-right' disabled='disabled'><span class='mif-download ani-bounce''></span></button>";
                
                        $.ajax({
                    		type: 'POST',
                    		data: {'jenis': jenis , 'hasil': isi},
                    		cache: false,
                    		url: baseURL + menu + '/' + submenu + '/' + controller + '/simpan_analisa',
                    		success: function(result){
                    			var msg = $.trim(result);
                    			if (msg == 'OK') {
                                    document.getElementById("saving").innerHTML ="<button class='button warning large rounded no-caption place-right' disabled='disabled'><span class='mif-download'></span></button>";
                                    show_data_no_loading();
                                    show_summary_no_loading();
                                    
                    			}
                    		}
                        });
                    
                    break;

                }
            }
            
        }
        
    }
    
    function createanalisa(){
        var jenis = $('input[name="JenisPack"]:checked').val();
        data = new Array();
        data[1] = jenis;
        ajax_do_action( 'open_form_analisa', 'content',data);
    }
    
    function HapusUjiPetik(id, pack){
        
        Metro.dialog.create({
            title: "Hapus Uji Petik",
            clsDialog: "warning",
            content: "<div><select data-role='select' id='reason' name='reason' data-prepend='Reason :'><option value=''></option>"+
                                    "<option value='A Under'>A Under</option>"+
                                    "<option value='A Over'>A Over</option>"+
                                    "<option value='B Under'>B Under</option>"+
                                    "<option value='B Over'>B Over</option>"+
                                    "<option value='C Under'>C Under</option>"+
                                    "<option value='C Over'>C Over</option>"+
                                    "<option value='D Under'>D Under</option>"+
                                    "<option value='D Over'>D Over</option>"+
                                    "<option value='E Under'>E Under</option>"+
                                    "<option value='E Over'>E Over</option>"+
                                    "<option value='Timbang Terlalu Cepat'>Timbang Terlalu Cepat</option>"+
                                    "<option value='Timbangan Error'>Timbangan Error</option>"+
                                    "<option value='Jumlah Lebih'>Jumlah Lebih</option>"+
                                    "<option value='Jumlah Kurang'>Jumlah Kurang</option>"+
                                "</select></div>",
            actions: [
                {
                    caption: "Delete",
                    cls: "js-dialog-close warning",
                    onclick: function(){
                        YeNo = confirm("Apakah Anda Yakin untuk Delete data!");
                        if (YeNo == true){
                            reason = $("#reason").val();
                            if (reason == ""){
                                alert("Reason belum di isi");
                            }else{
                                
                                $.ajax({
                            		type: 'POST',
                            		data: {'jenis': pack , 'id': id ,'reason':reason},
                            		cache: false,
                            		url: baseURL + menu + '/' + submenu + '/' + controller + '/delete_analisa',
                            		success: function(result){
                            			var msg = $.trim(result);
                            			if (msg == 'OK') {
                                            show_data_no_loading();
                                            show_summary_no_loading();
                            			}
                            		}
                                  }); 
                            }

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
    
    function get_sound_alert(){
        url_audio = "<?php echo base_url();?>assets/sound/alert-3.mp3";
        document.getElementById("alert_sound").innerHTML ="<audio src="+url_audio+" autoplay /audio>";
    }
    
    function start_reading(){
        var n = 0;
        
        var jenis = $("#jenis").val();
        
        switch (jenis){
            case '1kg':
                time_loop = 500;
            break;
            case '50kg':
            case '20kg':
                time_loop = 1000;
            break;
        }
        
        timer = setInterval(    function(){ 
                        
                    getAnalisaAlat( dataSetting ); 
                    n++;
                        
                    modulus = n % 2;
                    
                    if (modulus){
                        document.getElementById("processing").innerHTML ="<button class='button info large rounded no-caption place-right' disabled='disabled'><span class='mif-spinner2'></span></button>"; 
                    }else{
                       document.getElementById("processing").innerHTML ="<button class='button success large rounded no-caption place-right' disabled='disabled'><span class='mif-spinner2'></span></button>";
                    }
                        
                },time_loop);
    }
    
    function stop_reading(){
        clearInterval(timer);
    }
    
    function HapusUjiPetik1kg(id, pack){
        
        Metro.dialog.create({
            title: "Hapus Uji Petik",
            clsDialog: "warning",
            content: "<div><select data-role='select' id='reason' name='reason' data-prepend='Reason :'>"+
                                    "<option value='A Under' selected>A Under</option>"+
                                    "<option value='A Over'>A Over</option>"+
                                    "<option value='B Under'>B Under</option>"+
                                    "<option value='B Over'>B Over</option>"+
                                    "<option value='C Under'>C Under</option>"+
                                    "<option value='C Over'>C Over</option>"+
                                    "<option value='D Under'>D Under</option>"+
                                    "<option value='D Over'>D Over</option>"+
                                    "<option value='E Under'>E Under</option>"+
                                    "<option value='E Over'>E Over</option>"+
                                    "<option value='Timbang Terlalu Cepat'>Timbang Terlalu Cepat</option>"+
                                    "<option value='Timbangan Error'>Timbangan Error</option>"+
                                    "<option value='Jumlah Lebih'>Jumlah Lebih</option>"+
                                    "<option value='Jumlah Kurang'>Jumlah Kurang</option>"+
                                "</select></div>",
            actions: [
                {
                    caption: "Delete",
                    cls: "js-dialog-close warning",
                    onclick: function(){
                        reason = $("#reason").val();
                        if (reason == ""){
                            alert("Reason belum di isi");
                        }else{
                            
                            $.ajax({
                        		type: 'POST',
                        		data: {'jenis': pack , 'id': id ,'reason':reason},
                        		cache: false,
                        		url: baseURL + menu + '/' + submenu + '/' + controller + '/delete_analisa',
                        		success: function(result){
                        			var msg = $.trim(result);
                        			if (msg == 'OK') {
                                        show_data_no_loading();
                                        show_summary_no_loading();
                                        start_reading();
                        			}
                        		}
                              }); 
                        }
                    }
                }
            ]
        });

    }
    
    function alert_analisa(){
        
        counting_alert ++;
        
        var jenis = $("#jenis").val();
        var time_alert = 0;
        
        switch (jenis){
            case '1kg':
                //karena looping 1kg per 500ms maka counter di kali 2 agar dapat detik
                time_alert = 1200;
            break;
            case '50kg':
                time_alert = 7200;
            break;
        }
       
        if (counting_alert == time_alert){ //600
            
            dialog_alert = Metro.dialog.create({
                                title: "Anda Harus Uji Petik Sekarang..!",
                                clsDialog: "alert",
                                content: "<div>Segera lakukan Penimbangan</div>",
                                actions: [
                                    {
                                        /*
                                        caption: "Keluar",
                                        cls: "js-dialog-close alert",
                                        onclick: function(){
                                            counting_alert = 0;
                                        }*/
                                    }
                                ]
                            });
            
        }
        
        if (counting_alert >= time_alert){
            if (jenis=='1kg'){
                get_sound_alert(); 
            }
            
        }
        
        if (counting_alert == 1){
            if ( dialog_alert != ""){
                Metro.dialog.close(dialog_alert);
            }  
        }
        
    }
    


</script>
