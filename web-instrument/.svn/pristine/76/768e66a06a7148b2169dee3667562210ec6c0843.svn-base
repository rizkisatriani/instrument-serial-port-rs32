<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
date_default_timezone_set('Asia/Jakarta');
$jam = "<option value='0' >--Pilih Jam--</option>";
//$material = "<option value='0' >--Pilih Material--</option>";
$parameter = "<option value='0' >--Pilih Parameter--</option>";
$hiden_paramter = "";
/*
$no = 1;
foreach ( opsi_db('material_analisa','','','k03') as $key=>$val ){
    if ($no == 1){$select='selected';}else{$select = '';}
    $material .= "<option value='$key' $select>$val</option>";
    $no++;
}
*/
$JSON_Material = json_encode( opsi_db('material_analisa','','','k03') );

$select = '';
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
        case '00': if ($val=='01:00'){$select='selected';}else{$select='';} break;
        case '01': if ($val=='02:00'){$select='selected';}else{$select='';} break;
        case '02': if ($val=='03:00'){$select='selected';}else{$select='';} break;
        case '03': if ($val=='04:00'){$select='selected';}else{$select='';} break;
        case '04': if ($val=='05:00'){$select='selected';}else{$select='';} break;
        case '05': if ($val=='06:00'){$select='selected';}else{$select='';} break;
    }
    
    $jam .= "<option value='$key' $select>$val</option>";
}
$select = '';
foreach (opsi_db('parameter_analisa','','','') as $key=>$val ) {
    switch ($key) {
      case 'P010': case 'P004': case 'P043':
          $parameter .= "<option value='$key' selected='selected'>$val</option>"; //parameter[]
          //$hiden_paramter .= "<input type='hidden' name='parameter[]' value='$key'/>";
      break;
      case 'P048': case 'P049': case 'P050': case 'P102':
          $hiden_paramter .= "<input type='hidden' name='parameter[]' value='$key'/>";
      break;
    }
}

$nama = $this->session->userdata('namalengkap');
$tanggal = date("d-m-Y");

$wadah = 0;
$awal = 0;
$akhir = 0;
$hasil = 0;


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
                        <input type="hidden" name="hasil_get" id='hasil_get' >
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
                             <!--
                               <select data-role="select" id='material_analisa' name='material_analisa' >
                                 
                               </select>
                             -->
                                <span id="span_material"></span>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Parameter</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='parameter' name='parameter[]' onchange="change_parameter()" >
                                 <?=$parameter?>
                               </select>
                               <?=$hiden_paramter?>
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
                               <!--
                               <label class="radio">
                                 <input name="status" id='status3' type="radio" data-role="radio" data-caption="Option two" class="" data-role-radio="true" value="3">
                                 <span class="check"></span><span class="caption">Test</span>
                               </label> -->
                           </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2"><span id="logo1"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[0]' id='wadah' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$wadah?>'
                                  readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2"><span id="logo2"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[1]' id='awal' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false" 
                                  value='<?=$awal?>' 
                                  readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2"><span id="logo3"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[2]' id='akhir' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$akhir?>' 
                                  readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2 divkering">
                             <label class="cell-sm-2"><span id="logo4"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[3]' id='kering' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$akhir?>' 
                                  readonly="readonly"
                                  oninput="hitung_hasil()"
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
                                  readonly="readonly"
                                  value='<?=$hasil?>'
                                  />
                             </div>
                         </div>
                         <div class="row">
                             <div class="cell">
                                 <button type="button" class="button success" id='buttonget' title="get data weight" onclick="javascript:getAnalisaAlat()" ><span class="mif-download"></span> Get data Weight</button>
                                 <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform()"> Reset</button>
                                 <button type="button" class="button button info" id="simpan_sementara" onclick="javascript:simpanSementara()" title="Save data" ><span class="mif-note-add"></span> Simpan Sementara</button>
                                 <!---<button type="submit" class="button button primary" title="Save data"><span class="mif-floppy-disk"></span> Simpan</button>-->
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

var arrayMaterial = <?=$JSON_Material?>;

$(document).ready(function(){
   
  //document.getElementById("buttonget").disabled = true; 
  
  $("#id_modulinput").val(module_id);
  //$("#hasil").val(0);
  $("#simpan_sementara").hide();
  
  PostParameterAlat();
  //$(".divkering").hide();
    
  $("#wadah").focus();

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

    if( $("#hasil").val() == '0' || $("#hasil").val() == 'NaN' ){
      msg = "Hasil Tidak Boleh 0";
      custom_alert_notif(msg);
      return false;
    }
    
    var material = $("#material_analisa").val();
    var input_param = $("#parameter").val();
    var jam = $("#jam_analisa").val();
    var status = $("input[name=status]:checked").val();
    
    var input1 = $("#wadah").val();
    var input2 = $("#awal").val();
    var input3 = $("#akhir").val();
    var input4 = $("#kering").val();
    var hasil = $("#hasil").val();

    
    if (input_param == 'P010' ){
        
        dataIsi = {
            'hasil'               : hasil,		
            'id_modul'            : module_id,  	
            'input[0]'            : input1,	 //wadah
            'input[1]'            : input2,	 // sample
            'input[4]'            : input3,  // berat kering
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter[0]'	      : input_param,
            'parameter[1]'	      : "P048", //Berat wadah
            'parameter[2]'	      : "P049", //Berat Sample
            'parameter[3]'	      : "P050", //Berat Kering
            'status'	          : status
        }
        
        
    }else{
        /* catatan
        input1,	 //sample
        input2,	//kiesel
        input3,	// paper
        input4,	//berat kering
        */
        dataIsi = {
            'hasil'               : hasil,		
            'id_modul'            : module_id,  	
            'input[1]'            : input1,	 // sample
            'input[2]'            : input2,	 // kiesel
            'input[3]'            : input3,  // paper
            'input[4]'            : input4,  // berat kering
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter[0]'	      : input_param,
            'parameter[1]'	      : "P049", //Berat Sample
            'parameter[2]'	      : "P102", //Kieselguhr
            'parameter[3]'	      : "P103", //Filter Paper
            'parameter[4]'	      : "P050", //Berat Kering
            'status'	          : status
        }
        
    }
    
    $.ajax({
		type: 'POST',
		data: dataIsi,
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

});

function simpanSementara(){
    
    var material = $("#material_analisa").val();
    var input_param = $("#parameter").val();
    var jam = $("#jam_analisa").val();
    var status = $("input[name=status]:checked").val();
    
    var input1 = $("#wadah").val();
    var input2 = $("#awal").val();
    var input3 = $("#akhir").val();
    var input4 = $("#kering").val();
    var hasil = $("#hasil").val();
    var tanggal = $("#tanggal").val();
    
    if (input_param == 'P010' ){
        
        dataIsi = {
            'tanggal'             : tanggal,
            'hasil'               : hasil,		
            'id_modul'            : module_id,  	
            'input[0]'            : input1,	 //wadah
            'input[1]'            : input2,	 // sample
            'input[4]'            : input3,  // berat kering
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter[0]'	      : input_param,
            'parameter[1]'	      : "P048", //Berat wadah
            'parameter[2]'	      : "P049", //Berat Sample
            'parameter[3]'	      : "P050", //Berat Kering
            'status'	          : status
        }
        
        
    }else{
        /* catatan
        input1,	 //sample
        input2,	//kiesel
        input3,	// paper
        input4,	//berat kering
        */
        dataIsi = {
            'tanggal'             : tanggal,
            'hasil'               : hasil,		
            'id_modul'            : module_id,  	
            'input[1]'            : input1,	 // sample
            'input[2]'            : input2,	 // kiesel
            'input[3]'            : input3,  // paper
            'input[4]'            : input4,  // berat kering
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter[0]'	      : input_param,
            'parameter[1]'	      : "P049", //Berat Sample
            'parameter[2]'	      : "P102", //Kieselguhr
            'parameter[3]'	      : "P103", //Filter Paper
            'parameter[4]'	      : "P050", //Berat Kering
            'status'	          : status
        }
        
    }
    
    $.ajax({
			type: 'POST',
			data: dataIsi,
			cache: false,
			url: baseURL + menu + '/' + submenu + '/' + controller + '/simpan_sementara',
			success: function(result){
				var msg = $.trim(result);
				if (msg == 'OK') {
                    custom_alert_notif("Berhasil di simpan sementara",title="Completed",action="success");
                    location.reload();
				}
			}
		});
            
}




</script>
