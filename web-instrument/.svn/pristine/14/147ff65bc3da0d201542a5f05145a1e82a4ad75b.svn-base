<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
date_default_timezone_set('Asia/Jakarta');
$jam = "<option value='0' >--Pilih Jam--</option>";
$material = "<option value='0' >--Pilih Material--</option>";
$parameter = "<option value='0' >--Pilih Parameter--</option>";
$no = 1;
foreach ( opsi_db('material_analisa','','','k06') as $key=>$val ){
    if ($no == 1){$select='selected';}else{$select = '';}
    $material .= "<option value='$key' $select>$val</option>";
    $no++;
}
$select = '';
$getTime = date("H");
/*
foreach ( opsi_db('jam_analisa') as $key=>$val ){
    switch($getTime){
        case '06': if ($val=='07:00'){$select='selected';}else{$select='';} break;
        case '07': if ($val=='08:00'){$select='selected';}else{$select='';} break;
        case '08': if ($val=='09:00'){$select='selected';}else{$select='';} break;
        case '09': if ($val=='10:00'){$select='selected';}else{$select='';} break;
        case '10': if ($val=='11:00'){$select='selected';}else{$select='';} break;
        case '11': if ($val=='12:00'){$select='selected';}else{$select='';} break;
        case '12': if ($val=='13:00'){$select='selected';}else{$select='';} break;
        case '13': if ($val=='14:00'){$select='selected';}else{$select='';} break;
        case '14': if ($val=='15:00'){$select='selected';}else{$select='';} break;
        case '15': if ($val=='16:00'){$select='selected';}else{$select='';} break;
        case '16': if ($val=='17:00'){$select='selected';}else{$select='';} break;
        case '17': if ($val=='18:00'){$select='selected';}else{$select='';} break;
        case '18': if ($val=='19:00'){$select='selected';}else{$select='';} break;
        case '19': if ($val=='20:00'){$select='selected';}else{$select='';} break;
        case '20': if ($val=='21:00'){$select='selected';}else{$select='';} break;
        case '21': if ($val=='22:00'){$select='selected';}else{$select='';} break;
        case '22': if ($val=='23:00'){$select='selected';}else{$select='';} break;
        case '23': if ($val=='24:00'){$select='selected';}else{$select='';} break;
        case '24': if ($val=='01:00'){$select='selected';}else{$select='';} break;
        case '01': if ($val=='02:00'){$select='selected';}else{$select='';} break;
        case '02': if ($val=='03:00'){$select='selected';}else{$select='';} break;
        case '03': if ($val=='04:00'){$select='selected';}else{$select='';} break;
        case '04': if ($val=='05:00'){$select='selected';}else{$select='';} break;
        case '05': if ($val=='06:00'){$select='selected';}else{$select='';} break;
    }
    
    $jam .= "<option value='$key' $select>$val</option>";
}
*/
$JSON_Jam = json_encode( opsi_db('jam_analisa') );

$select = '';
foreach (opsi_db('parameter_analisa','','','k06') as $key=>$val ) {
    if ($key=='P005'){$select='selected';}else{$select = '';}
    if ($key != 'P052'){
        $parameter .= "<option value='$key' $select>$val</option>";
    }
    
}

$nama = $this->session->userdata('namalengkap');
$tanggal = date("d-m-Y");

?>
<div class="panel mt-4">
  <div class="row">
      <div class="cell"> <!--<div class="cell-md-6">!-->
          <div class="panel" id="analisaph1">
              <div data-role="panel" data-title-caption="ANALISA PH" data-collapsible="true"
                  data-title-icon="<span class='mif-lab'></span>" class="panel-content" data-role-panel="true">
                  <div class="cell-md-6 p-4">
                    <form name="analisa" id="analisa">
                        <input type="hidden" name="id_modul" id='id_modulinput' >
                         <div class="row mb-2">
                             <label class="cell-sm-2">Nama Analis</label>
                             <div class="cell-sm-10">
                                 <input type="text" name="namalengkap" value="<?=$nama?>" disabled readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Tanggal</label>
                             <div class="cell-sm-10">
                                 <input type="text" data-role="calendarpicker" name="tanggal" id="tanggal" data-day="false" value="<?=date("Y/m/d")?>" data-format="%d-%m-%Y">
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Material</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='material_analisa' name='material_analisa' onchange="getJam()" >
                                 <?=$material?>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Parameter</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='parameter' name='parameter' onchange="getpengenceran()">
                                 <?=$parameter?>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Jam</label>
                             <div class="cell-sm-10">
                             <!--
                               <select data-role="select" id='jam_analisa' name='jam_analisa' >
                                 <?=$jam?>
                               </select>
                               -->
                               <span id="span_jam"></span>
                             </div>
                         </div>
                         <div class="row mb-2">
                           <label class="cell-sm-2">Status</label>
                           <div class="cell-sm-10">
                               <label class="radio">
                                  <input name="status" id='status1' type="radio" data-role="radio" data-caption="Option one" checked="true" class="" data-role-radio="true" value="1">
                                  <span class="check"></span><span class="caption">New</span>
                               </label>
                               <label class="radio">
                                 <input name="status" id='status2' type="radio" data-role="radio" data-caption="Option two" class="" data-role-radio="true" value="2">
                                 <span class="check"></span><span class="caption">Ricek</span>
                               </label>
                               <label class="radio">
                                 <input name="status" id='status3' type="radio" data-role="radio" data-caption="Option two" class="" data-role-radio="true" value="3">
                                 <span class="check"></span><span class="caption">Test</span>
                               </label>
                           </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Strike</label>
                             <div class="cell-sm-10">
                                 <input type="text" placeholder="No Strike"  name='strike' id='strike' onkeypress="return chekNumber(event)"
                                  data-role="keypad"
                                      data-cls-keys="bg-steel fg-white"
                                      data-cls-backspace="bg-darkOrange fg-white"
                                      data-cls-clear="bg-darkOrange fg-white"
                                      data-clear-button="false"

                                  />
                             </div>
                         </div>
                         <div class="row mb-2" id="pengenceranDiv">
                             <label class="cell-sm-2">Pengenceran</label>
                             <div class="cell-sm-10">
                                 <input type="text" id="pengenceran"  name='pengenceran'
                                  data-role="keypad"
                                      data-cls-keys="bg-steel fg-white"
                                      data-cls-backspace="bg-darkOrange fg-white"
                                      data-cls-clear="bg-darkOrange fg-white"
                                      data-clear-button="false"
                                    readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Hasil</label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='hasil' id='hasil' class="input-large"
                                  data-role="input"
                                  data-cls-input="text-bold input-large"
                                  data-clear-button="false"
                                  />
                             </div>
                         </div>
                         <div class="row">
                             <div class="cell">
                                 <!--<button type="submit" class="button primary">Sign in</button>-->
                                 <!--<button type="button" class="button secondary" title="get data from ph A" onclick="javascript:get_data_api('hasil','2')"><span class="mif-download"></span> Get data from <?=$module_title?></button>-->
                                 <button type="button" class="button success" id='buttonget' title="get data from Spectro" onclick="javascript:getAnalisaAlat()"><span class="mif-download"></span> Get data from Spectro</button>
                                 <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform()"> Reset</button>
                                 <button type="submit" class="button button primary" title="Save data"><span class="mif-floppy-disk"></span> Simpan</button>
                                 <code id="ApiResponse"></code>
                             </div>
                         </div>
                     </form>
                  </div>
              </div>
              <div class="panel-title">
                  <span class="caption"><?=$module_title?></span>
                  <span class="mif-lamp fg-green icon"></span>
                  <span class="dropdown-toggle marker-center active-toggle"></span>
              </div>
          </div>
      </div>
  </div>
</div>
<script>

var arrayJam = <?=$JSON_Jam?>;

$(document).ready(function(){

  $("#id_modulinput").val(module_id);
  $("#hasil").val(0);
  
  $("#pengenceranDiv").hide();
  
  document.getElementById("buttonget").disabled = true;
  
  PostParameterAlat();

  $("#analisa").submit(function(){
    //console.log('oke')
    if( $("#jam_analisa").val() == '0' ){
      msg = "Jam Analisa Harus di Pilih";
      custom_alert_notif(msg);
      return false;
    }

    if( $("#parameter").val() == '0'){
      msg = "paramter Analisa belum di Pilih";
      custom_alert_notif(msg);
      return false;
    }

    if( $('#material_analisa').val() == '0' ){
      msg = "Material Harus di Pilih";
      custom_alert_notif(msg);
      return false;
    }

    if( $("#hasil").val() == '0' ){
      msg = "Hasil Tidak Boleh 0";
      custom_alert_notif(msg);
      return false;
    }

    $.ajax({
 				type: 'POST',
 				data: $(this).serialize(),
 				cache: false,
 				url: baseURL + menu + '/' + submenu + '/' + controller + '/simpan_analisa',
 				success: function(result){
 					var msg = $.trim(result);
 					if (msg == 'OK') {
                        location.reload();
 					}
 				}
 			});

    return false;
  });
  
  getpengenceran()
});

function resetform(){
  //console.log('oke')
  $("#hasil").val(0);

}

function getJam(){
    var material = $('#material_analisa').val();
    
    document.getElementById("span_jam").innerHTML = "";
    
    var parameter = $("#parameter").val();
    
    var opt = "<select data-role='select' id='jam_analisa' name='jam_analisa' >";                  
    for ( var key in arrayJam ){
        
        if (arrayJam.hasOwnProperty(key)) {
            
            if ( material == "39" ){
                
                if (key == 25 || key == 26 || key == 27){
                    opt += "<option value='"+ key +"'>"+ arrayJam[key] +"</option>";
                }
                
            }else{
                
                opt += "<option value='"+ key +"'>"+ arrayJam[key] +"</option>";
            }
        }
    }
    
    opt += " </select>";
    
    document.getElementById("span_jam").innerHTML = opt;
    
    var d = new Date();
    var n = d.getHours();
    var jam = 0;
    
    switch(n){
        
        case 6: jam = 2; break;
        case 7: jam = 3; break;
        case 8: jam = 4; break;
        case 9: jam = 5; break;
        case 10: jam = 6; break;
        case 11: jam = 7; break;
        case 12: jam = 8; break;
        case 13: jam = 9; break;
        case 14: jam = 10; break;
        case 15: jam = 11; break;
        case 16: jam = 12; break;
        case 17: jam = 13; break;
        case 18: jam = 14; break;
        case 19: jam = 15; break;
        case 20: jam = 16; break;
        case 21: jam = 17; break;
        case 23: jam = 19; break;
        case 24: case 0: jam = 20; break;
        case 1: jam = 21; break;
        case 2: jam = 22; break;
        case 3: jam = 23; break;
        case 4: jam = 24; break;
        case 5: jam = 1; break;
        
    }
    
    $('#jam_analisa').val(jam);
    
    getpengenceran()
    
}

function getpengenceran(){
    
    var parameter = $("#parameter").val();
    
    if(parameter == 'P005' || parameter == 'P006'){
        $("#pengenceranDiv").show();
        
        id = $("#material_analisa").val();
        var url =  baseURL + menu + '/' + submenu + '/' + controller + '/get_pengenceran/'+id;
        
        $.get( url , function(data, status){
                //alert("Data: " + data + "\nStatus: " + status);
                $("#pengenceran").val(data);
        });
        
    }else{
        $("#pengenceranDiv").hide();
    }
    
    
}





</script>
