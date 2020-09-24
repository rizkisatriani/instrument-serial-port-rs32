<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
date_default_timezone_set('Asia/Jakarta');
$jam = "<option value='0' >--Pilih Jam--</option>";
$material = "<option value='0' >--Pilih Material--</option>";
$parameter = "<option value='0' >--Pilih Parameter--</option>";
$hiden_paramter = "";
$no = 1;
foreach ( opsi_db('material_analisa','','','M039') as $key=>$val ){
    if ($no == 1){$select='selected';}else{$select = '';}
    $material .= "<option value='$key' $select>$val</option>";
    $no++;
}
$select = '';
$getTime = date("H");
foreach ( opsi_db('jam_analisa') as $key=>$val ){
    if ($val=='Shift I'){$select='selected';}else{$select='';}
    if ($val == 'Shift I' or $val=='Shift II' or $val=='Shift III'){
      $jam .= "<option value='$key' $select>$val</option>";
    }

}
$select = '';
foreach (opsi_db('parameter_analisa','','','') as $key=>$val ) {
    switch ($key) {
      case 'P061': case 'P062': case 'P063': case 'P064': case 'P065': case 'P066':
      case 'P067': case 'P068': case 'P069': case 'P070': case 'P071': case 'P072':
      case 'P073': 
        $hiden_paramter .= "<input type='hidden' name='parameter[]' value='$key'/>";
      break;
      case 'P018':
        $parameter .= "<option value='$key' selected='selected'>$val</option>"; //parameter[]
        $hiden_paramter .= "<input type='hidden' name='parameter[]' value='$key'/>";
      break; 
      case 'P019':
        $parameter .= "<option value='$key' selected='selected'>$val</option>"; //parameter[] 
        $hiden_paramter .= "<input type='hidden' name='parameter[]' value='$key'/>";
      break;
      case 'P074':
        $hiden_paramter .= "<input type='hidden' name='parameter[]' value='$key'/>";
      break;
      case 'P020':
          $parameter .= "<option value='$key' selected='selected'>$val</option>"; //parameter[]
          $hiden_paramter .= "<input type='hidden' name='parameter[]' value='$key'/>";
      break;
    }
}

$nama = $this->session->userdata('namalengkap');
$tanggal = date("d-m-Y");

$brt_tarra_f1 = 0;
$brt_tarra_f2 = 0;   
$brt_tarra_f3 = 0;   
$brt_tarra_f4 = 0;   
$brt_tarra_f5 = 0;   
$brt_tarra_f6 = 0;   
$brt_sample = 0; 
$brt_brutto_f1 = 0; 
$brt_brutto_f2 = 0; 
$brt_brutto_f3 = 0;
$brt_brutto_f4 = 0;
$brt_brutto_f5 = 0;
$brt_brutto_f6 = 0;   
$brt_net_f1 = 0;    
$brt_net_f2 = 0; 
$brt_net_f3 = 0; 
$brt_net_f4 = 0;  
$brt_net_f5 = 0;
$brt_net_f6 = 0;  
$gsize = 0;  
$ma = 0;    
$sd = 0;
$cv = 0; 

?>
<div class="panel mt-4">
  <div class="row">
      <div class="cell"> <!--<div class="cell-md-6">!-->
          <div class="panel" id="analisaph1">
              <div data-role="panel" data-title-caption="ANALISA PH" data-collapsible="true"
                  data-title-icon="<span class='mif-lab'></span>" class="panel-content" data-role-panel="true">
                  <div class="cell-md-11 p-4">
                    <form name="analisa" id="analisa">
                        <input type="hidden" name="id_modul" id='id_modulinput' >
                         <div class="row mb-2">
                             <label class="cell-sm-1">Nama Analis</label>
                             <div class="cell-sm-5">
                                 <input type="text" name="namalengkap" value="<?=$nama?>" disabled readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Tanggal</label>
                             <div class="cell-sm-5">
                                 <!--<input type="text" name="tanggal" value ="<?=$tanggal?>" disabled readonly>-->
                                 <input type="text" data-role="calendarpicker" name="tanggal" id="tanggal" data-day="false" onchange="getdatatable()" value="<?=date("Y/m/d")?>" data-format="%d-%m-%Y">
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Material</label>
                             <div class="cell-sm-5">
                               <select data-role="select" id='material_analisa' name='material_analisa' >
                                 <?=$material?>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Parameter</label>
                             <div class="cell-sm-11">
                               <select data-role="select" id='parameter' name='x[]' multiple disabled >
                                 <?=$parameter?>
                               </select>
                               <?=$hiden_paramter?>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Jam</label>
                             <div class="cell-sm-5">
                               <select data-role="select" id='jam_analisa' name='jam_analisa' >
                                 <?=$jam?>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                           <label class="cell-sm-1">Status</label>
                           <div class="cell-sm-5">
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
                               </label>
                               -->
                           </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Tarra F1</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='tarra_f1' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_tarra_f1?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Tarra F2</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='tarra_f2' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_tarra_f2?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Tarra F3</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='tarra_f3' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_tarra_f3?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Tarra F4</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='tarra_f4' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_tarra_f4?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Tarra F5</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='tarra_f5' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_tarra_f5?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Tarra F6</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='tarra_f6' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_tarra_f6?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Berat Sample</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='sample' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_sample?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Brutto F1</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='brutto_f1' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_brutto_f1?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Brutto F2</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='brutto_f2' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_brutto_f2?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Brutto F3</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='brutto_f3' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_brutto_f3?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Brutto F4</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='brutto_f4' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_brutto_f4?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Brutto F5</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='brutto_f5' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_brutto_f5?>' readonly="readonly"
                                  oninput="hitung_hasil()"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Brutto F6</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='brutto_f6' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_brutto_f6?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Net F1</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='net_f1' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_net_f1?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Net F2</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='net_f2' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_net_f2?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Net F3</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='net_f3' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_net_f3?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Net F4</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='net_f4' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_net_f4?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Net F5</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='net_f5' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_net_f5?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Net F6</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='net_f6' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$brt_net_f6?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">G Size</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='g_size' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$gsize?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">MA</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='ma' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$ma?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">SD</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='sd' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$sd?>' readonly="readonly"
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">CV</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='cv' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$cv?>' readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row">
                             <div class="cell">
                                 <button type="button" class="button success" id='buttonget' title="get data weight" onclick="javascript:getAnalisaAlat('form')"><span class="mif-download"></span> Get data Weight</button>
                                 <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform('form')"> Reset</button>
                                 <button type="button" class="button button info" id="simpan_sementara" onclick="javascript:simpanSementara()" title="Save data" ><span class="mif-note-add"></span> Simpan Sementara</button>
                                 <!--<button type="submit" class="button button primary" id="buttonsave" title="Save data"><span class="mif-floppy-disk"></span> Simpan</button>-->
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

$(document).ready(function(){
    
    document.getElementById("buttonget").disabled = true; 
    //document.getElementById("buttonsave").disabled = true; 
    $("#id_modulinput").val(module_id);
    $("#hasil").val(0);
    
    $("#simpan_sementara").hide();
    
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
    
        $.ajax({
        			type: 'POST',
        			data: $(this).serialize(),
        			cache: false,
        			url: baseURL + menu + '/' + submenu + '/' + controller + '/simpan_analisa',
        			success: function(result){
        				var msg = $.trim(result);
        				if (msg == 'OK') {
                            //location.reload();
        				}
        			}
        		});
        
            return false;
        });
});


function simpanSementara(){
    
    $.ajax({
			type: 'POST',
			data: $('#analisa').serialize(),
			cache: false,
			url: baseURL + menu + '/' + submenu + '/' + controller + '/simpan_sementara',
			success: function(result){
				var msg = $.trim(result);
				if (msg == 'OK') {
                    //
                    custom_alert_notif("Berhasil di simpan sementara",title="Completed",action="success");
                    location.reload();
				}
			}
		});
             
}



</script>
