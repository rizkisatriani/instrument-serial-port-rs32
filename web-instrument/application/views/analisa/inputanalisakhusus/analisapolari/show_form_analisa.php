<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
$jam = "<option value='0' >--Pilih Jam--</option>";
$material = "<option value='0' >--Pilih Material--</option>";
$parameter = "<option value='0' >--Pilih Parameter--</option>";
$no = 1;
foreach ( opsi_db('material_analisa','','','k09') as $key=>$val ){
    if ($no == 1){$select='selected';}else{$select = '';}
    $material .= "<option value='$key' $select>$val</option>";
    $no++;
}
$select = '';
date_default_timezone_set('Asia/Jakarta');
$getTime = date("H");
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
$select = '';
foreach (opsi_db('parameter_analisa','','','P001') as $key=>$val ) {
    if ($key=='P009'){$select='selected="selected"';}else{$select = '';}
    $parameter .= "<option value='$key' selected='selected'>$val</option>";
}
$select = '';
foreach (opsi_db('parameter_analisa','','','P002') as $key=>$val ) {
    //if ($key=='P013'){$select='selected="selected"';}else{$select = '';}
    $parameter .= "<option value='$key' selected='selected'>$val</option>";
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
                  <div class="grid">
                    <div class="row">
                      <div class="cell-md-6 p-4">
                        <form name="analisa" id="analisa">
                            <input type="hidden" name="id_modul" id='id_modulinput' >
                            <input type="hidden" name="flag" id='flag' >
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
                                   <select data-role="select" id='material_analisa' name='material_analisa' onchange="get_pengenceran()" >
                                     <?=$material?>
                                   </select>
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-2">Parameter</label>
                                 <div class="cell-sm-10">
                                   <select data-role="select" id='parameter' name='parameter[]' multiple >
                                     <?=$parameter?>
                                   </select>
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-2">Jam</label>
                                 <div class="cell-sm-10">
                                   <select data-role="select" id='jam_analisa' name='jam_analisa' >
                                     <?=$jam?>
                                   </select>
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
                                 <label class="cell-sm-2">Pengenceran</label>
                                 <div class="cell-sm-10">
                                     <input type="text"  name='pengenceran' id='pengenceran' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      value='0' readonly="readonly"
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2 strike" id="divstrike">
                                 <label class="cell-sm-2">Strike</label>
                                 <div class="cell-sm-10">
                                     <input type="text" placeholder="No Strike"  name='strike' id='strike'
                                      data-role="keypad"
                                      data-cls-keys="bg-steel fg-white"
                                      data-cls-backspace="bg-darkOrange fg-white"
                                      data-cls-clear="bg-darkOrange fg-white"
                                      data-clear-button="false"
                        
                                      />
                                 </div>
                            </div>
                             <div class="row mb-2 strike pan" id="divtimestrike">
                                 <label class="cell-sm-2">Time Strike</label>
                                 <div class="cell-sm-5">
                                        <select data-role="select" name="jam_st" id="jam_st" data-prepend="JAM : " onchange="changeDateTime()" >
                                            <?php
                                                $select = "";                                            
                                                for ($x = 0; $x <= 23; $x++) {
                                
                                                    $isi = sprintf("%02s", $x);
                                                    
                                                    if ($getTime == $isi){
                                                        $select='selected';                                                  
                                                    }else{
                                                        $select ="";
                                                    }
                                                                            
                                                    echo "<option value='$isi' $select >$isi</option>";      
                                                }
                                            ?>
                                        </select>
                                 </div>
                                 <div class="cell-sm-5">
                                        <select data-role="select" name="mn_st" id="mn_st" data-prepend="MENIT : " onchange="changeDateTime()" >
                                            <?php
                                                $modulus = 0;
                                                for ($x = 0; $x <= 59; $x++) {
                                                    $modulus = $x % 15;
                                                    if (!$modulus){
                                                        $isi = sprintf("%02s", $x);
                                                        echo "<option value='$isi' >$isi</option>";
                                                    }
                                                          
                                                }
                                            ?>
                                        </select>
                                 </div>
                                 <input type="hidden" name="timestrike" id='timestrike' value="<?=date("H")?>:00:00" />
                            </div>
                            <div class="row mb-2 strike" id="divbt">
                                 <label class="cell-sm-2">Boiling Time</label>
                                 <div class="cell-sm-5">
                                        <select data-role="select" name="jam_bt" id="jam_bt" data-prepend="JAM : " onchange="changeDateTime()">
                                            <?php
                                                for ($x = 0; $x <= 23; $x++) {
                                                    $isi = sprintf("%02s", $x);
                                                    echo "<option value='$isi' >$isi</option>";      
                                                }
                                            ?>
                                        </select>
                                 </div>
                                 <div class="cell-sm-5">
                                        <select data-role="select" name="mn_bt" id="mn_bt" data-prepend="MENIT : " onchange="changeDateTime()">
                                            <?php
                                                $modulus = 0;
                                                for ($x = 0; $x <= 59; $x++) {
                                                    $modulus = $x % 15;
                                                    if (!$modulus){
                                                        $isi = sprintf("%02s", $x);
                                                        echo "<option value='$isi' >$isi</option>";
                                                    }     
                                                }
                                            ?>
                                        </select>
                                 </div>
                                 <input type="hidden" name="bt" id='bt' value="00:00:00"  />
                            </div>
                            <div class="row mb-2 strike pan" id="divpan">
                                 <label class="cell-sm-2">Pan</label>
                                 <div class="cell-sm-10">
                                     <input type="text" placeholder="Pan Strike"  name='pan' id='pan'
                                      data-role="input"
                                      data-clear-button="false"
    
                                      />
                                 </div>
                            </div>
                            <div class="row mb-2 strike" id="divvol">
                                 <label class="cell-sm-2">Vol</label>
                                 <div class="cell-sm-10">
                                     <input type="text" placeholder="Vol Strike"  name='vol' id='vol'
                                      data-role="input"
                                      data-clear-button="false"
    
                                      />
                                 </div>
                            </div>

                             <div class="row mb-2">
                                 <label class="cell-sm-2">Brix</label>
                                 <div class="cell-sm-10">
                                     <input type="text"  name='input[]' id='brix' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      value='0'
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-2">Pol</label>
                                 <div class="cell-sm-10">
                                     <input type="text"  name='input[]' id='pol' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      value='0'
                                      oninput="hitung_hasil()"
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-2">Purity</label>
                                 <div class="cell-sm-10">
                                     <input type="text"  name='hasil' id='hasil' class="input-large"
                                      data-role="input"
                                      data-cls-input="text-bold input-large"
                                      data-clear-button="false"
                                      readonly
                                      />
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="cell">
                                     <!--<button type="submit" class="button primary">Sign in</button>-->
                                      <button type="button" class="button success" id='buttonget' title="get data weight" onclick="javascript:getData()" ><span class="mif-download"></span> Get data</button>
                                     <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform()"> Reset</button>
                                     <button type="submit" class="button button primary" title="Save data"><span class="mif-floppy-disk"></span> Simpan</button>
                                     <code id="ApiResponse"></code>
                                 </div>
                             </div>
                         </form>
                      </div>
                      
                      <div class="cell-md-6 p-4 ">
                        <div class="cell-sm-8 border bd-white bg-orange">
                            <div class="row mb-2">
                                 <label class="cell-sm-6 fg-white"><b>MCP Data Real Time</b></label>
                            </div>
                            <div class="row mb-2">
                                 <label class="cell-sm-3 fg-white">Brix</label>
                                 <div class="cell-sm-8">
                                     <input type="text" class="warning" id="real_brix" value="0.00" readonly>
                                 </div>
                            </div>
                            <div class="row mb-2">
                                 <label class="cell-sm-3 fg-white">Pol</label>
                                 <div class="cell-sm-8">
                                     <input type="text" class="warning" id="real_pol" value="0.00" readonly>
                                 </div>
                            </div>
                            <div class="row mb-2">
                                 <label class="cell-sm-3 fg-white">Purity</label>
                                 <div class="cell-sm-8">
                                     <input type="text" class="warning" id="real_pty" value="0.00" readonly>
                                 </div>
                            </div>
                            <div class="row mb-2">
                                 <label class="cell-sm-3 fg-white">Bagasse Pol</label>
                                 <div class="cell-sm-8">
                                     <input type="text" class="warning" id="real_bagasse" value="0.00" readonly>
                                 </div>
                            </div>
                            <div class="row mb-2">
                                 <label class="cell-sm-3 fg-white">Filter Cake Pol</label>
                                 <div class="cell-sm-8">
                                     <input type="text" class="warning" id="real_filtercake" value="0.00" readonly>
                                 </div>
                            </div>
                            
                        </div>
                        <div class="cell-sm-8">
                            <hr class="bg-grayBlue" />
                            <div>
                                <span id="processing"></span>
                                <span id="saving"></span>
                            </div>
                            <br/>
                            <br/>
                            <hr class="bg-grayBlue" />
                        </div>
                      </div>
                      
                    </div>
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

$(document).ready(function(){
    
  document.getElementById("buttonget").disabled = true; 
  document.getElementById("processing").innerHTML ="<button class='button alert large rounded no-caption place-left' disabled='disabled'><span class='mif-spinner2'></span></button>";
  
  $(".strike").hide();
   
  PostParameterAlat();
  $("#id_modulinput").val(module_id);
  $("#hasil").val(0);

  //get_brix_clr();
  get_pengenceran()

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
    
    var material = $("#material_analisa").val();
    /*
    if (material != '5' && material != '7' ){
        
        if( $("#hasil").val() == '0' ){
            msg = "Hasil Tidak Boleh 0";
            custom_alert_notif(msg);
            //return false;
        }
        
    }
    */
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


    start_reading();

});

function resetform(){

    $("#pol").val(0);
    $("#hasil").val(0);
    $("#brix").val(0);

}

function hitung_hasil(){

  var hasil;
  var brix = $("#brix").val() ;
  var pol = $("#pol").val();
  
  if (brix == 0){
    hasil = 0;
  }else{
    hasil = brix / pol * 100;
  }
  
  isi = hasil.toFixed(2);
  //Math.pow(brix_clr, 2) = brix_clr pangkat 2
  $("#hasil").val(isi);
}

function get_pengenceran(){
    
    id = $("#material_analisa").val();
    
    switch (id){
        case '30':
        case '35':
        case '38':
            $(".strike").show();
        break;
        case '31':
        case '32':
        case '33':
        case '34':
        case '36':
        case '37':
            $(".strike").hide();
            $(".pan").show();
        break;
        default:
            $(".strike").hide();
        break;
    }
    
    var url =  baseURL + menu + '/' + submenu + '/' + controller + '/get_pengenceran/'+id;
    
    $.get( url , function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            $("#pengenceran").val(data);
    });
    
}

function changeDateTime(){
    var jam_st = $("#jam_st").val();
    var mn_st = $("#mn_st").val();
    
    var jam_bt = $("#jam_bt").val();
    var mn_bt = $("#mn_bt").val();
    
    var st = jam_st+":"+mn_st+":00";
    var bt = jam_bt+":"+mn_bt+":00";

    $("#timestrike").val(st);
    $("#bt").val(bt);
}



</script>