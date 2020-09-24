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
        if($key == '39'){
            $material .= "<option value='$key' selected>$val</option>";
        }
    $no++;
}
$select = '';
date_default_timezone_set('Asia/Jakarta');
$getTime = date("H");
foreach ( opsi_db('jam_analisa') as $key=>$val ){
    switch($getTime){
        case '06': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
        case '07': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '08': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '09': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '10': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '11': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '12': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '13': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '14': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
        case '15': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '16': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '17': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '18': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '19': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '20': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '21': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '22': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
        case '23': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
        case '00': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
        case '01': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
        case '02': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
        case '03': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
        case '04': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
        case '05': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
    }
    if ($val=='Shift I' or $val=='Shift II' or $val=='Shift III'){
        $jam .= "<option value='$key' $select>$val</option>";
    }
}
$select = '';
/*
foreach (opsi_db('parameter_analisa','','','P001') as $key=>$val ) {
    if ($key=='P009'){$select='selected="selected"';}else{$select = '';}
    $parameter .= "<option value='$key' selected='selected'>$val</option>";
}*/
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
                             <!--
                             <div class="row mb-2">
                                 <label class="cell-sm-2">Material</label>
                                 <div class="cell-sm-10">
                                   <select data-role="select" id='material_analisa' name='material_analisa' >
                                     <?=$material?>
                                   </select>
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-2">Parameter</label>
                                 <div class="cell-sm-10">
                                   <select data-role="select" id='parameter' name='parameter' >
                                     <?=$parameter?>
                                   </select>
                                 </div>
                             </div> -->
                             <input type="hidden" name="material_analisa" id='material_analisa' value='39' />
                             <input type="hidden" name="parameter" id='parameter' value='P002' />
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
                                 <label class="cell-sm-9">Nilai polarimeter sertifikat dari kwarsa penguji (oZ)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[0]' id='Q20' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Manual Input'
                                      oninput="hitunghasil()"
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-9"> Pembacaan dari standard kwarsa penguji (oZ)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[1]' id='Qt' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Dari Alat'
                                      readonly
                                      />
                                 </div>
                             </div>

                            <div class="row mb-2">
                                 <label class="cell-sm-9">Pembacaan Polarimeter kosong tanpa tabung (oZ)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[2]' id='Po' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Dari Alat'
                                      readonly
                                      />
                                 </div>
                             </div>

                            <div class="row mb-2">
                                 <label class="cell-sm-9">Pembacaan Polarimeter dari tabung polarimeter kosong (oZ)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[3]' id='PR' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Dari Alat'
                                      readonly
                                      />
                                 </div>
                             </div>

                            <div class="row mb-2">
                                 <label class="cell-sm-9">Pembacaan Polarimeter larutan gula (oZ)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[4]' id='PL' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Dari Alat'
                                      readonly
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-9">Temperatur kwarsa penguji (oC)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[5]' id='tp' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Manual Input'
                                      oninput="hitunghasil()"
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-9">Temperatur larutan (oC)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[6]' id='tr' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Manual Input'
                                      oninput="hitunghasil()"
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-9">Faktor tabung polarimeter glass window</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[7]' id='c' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      value="0.000462" readonly="readonly"
                                      />
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <label class="cell-sm-2">Pol</label>
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
                                 <label class="cell-sm-3 fg-white">Z Value</label>
                                 <div class="cell-sm-8">
                                     <input type="text" class="warning" id="real_z" value="0.00" readonly>
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
  //get_pengenceran()

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
/*
function resetform(){

    $("#pol").val(0);
    $("#hasil").val(0);
    $("#brix").val(0);

}*/
/*
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
/*
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

*/

function hitunghasil(){
    
    PR = $("#PR").val();
    PL = $("#PL").val();
    Q20 = $("#Q20").val();
    tp = $("#tp").val();
    c = $("#c").val();
    tr = $("#tr").val();
    Qt = $("#Qt").val();
    Po = $("#Po").val();
    
    console.log(PR);
    console.log(PL);
    console.log(Q20);
    console.log(tp);
    console.log(c);
    console.log(tr);
    console.log(Qt);
    console.log(Po);
    
    hasil = ((PL-PR)*Q20*(1+(0.000144*(tp-20)))*(1+(c*(tr-20))))/(Qt-Po)
    
    console.log(hasil)
    
    isi = hasil.toFixed(2);
    //Math.pow(brix_clr, 2) = brix_clr pangkat 2
    $("#hasil").val(isi);
}
</script>
