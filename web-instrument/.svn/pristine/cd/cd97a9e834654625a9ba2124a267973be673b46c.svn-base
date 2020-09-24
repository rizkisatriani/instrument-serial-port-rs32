<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
//print_r($analisa);
$jam = "";
$material = "";
$parameter = "";
$hiden_paramter = "";
foreach ( opsi_db('material_analisa','','','') as $key=>$val ){
    if ($key == $analisa['id_material']){
      $material .= "<option value='$key' selected>$val</option>";
    }

}

$getTime = $analisa['id_jam'];
foreach ( opsi_db('jam_analisa') as $key=>$val ){
 
    switch($getTime){
          case '1': if ($val=='06:00'){$select='selected';}else{$select='';} break;
          case '2': if ($val=='07:00'){$select='selected';}else{$select='';} break;
          case '3': if ($val=='08:00'){$select='selected';}else{$select='';} break;
          case '4': if ($val=='09:00'){$select='selected';}else{$select='';} break;
          case '5': if ($val=='10:00'){$select='selected';}else{$select='';} break;
          case '6': if ($val=='11:00'){$select='selected';}else{$select='';} break;
          case '7': if ($val=='12:00'){$select='selected';}else{$select='';} break;
          case '8': if ($val=='13:00'){$select='selected';}else{$select='';} break;
          case '9': if ($val=='14:00'){$select='selected';}else{$select='';} break;
          case '10': if ($val=='15:00'){$select='selected';}else{$select='';} break;
          case '11': if ($val=='16:00'){$select='selected';}else{$select='';} break;
          case '12': if ($val=='17:00'){$select='selected';}else{$select='';} break;
          case '13': if ($val=='18:00'){$select='selected';}else{$select='';} break;
          case '14': if ($val=='19:00'){$select='selected';}else{$select='';} break;
          case '15': if ($val=='20:00'){$select='selected';}else{$select='';} break;
          case '16': if ($val=='21:00'){$select='selected';}else{$select='';} break;
          case '17': if ($val=='22:00'){$select='selected';}else{$select='';} break;
          case '18': if ($val=='23:00'){$select='selected';}else{$select='';} break;
          case '19': if ($val=='24:00'){$select='selected';}else{$select='';} break;
          case '20': if ($val=='01:00'){$select='selected';}else{$select='';} break;
          case '21': if ($val=='02:00'){$select='selected';}else{$select='';} break;
          case '22': if ($val=='03:00'){$select='selected';}else{$select='';} break;
          case '23': if ($val=='04:00'){$select='selected';}else{$select='';} break;
          case '24': if ($val=='05:00'){$select='selected';}else{$select='';} break;
          case '25': if ($val=='Shift I'){$select='selected';}else{$select='';} break;
          case '26': if ($val=='Shift II'){$select='selected';}else{$select='';} break;
          case '27': if ($val=='Shift III'){$select='selected';}else{$select='';} break;
      }
      
      $jam .= "<option value='$key' $select>$val</option>";
}

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

$nama = nama_user($analisa['id_user']);
$tanggal = formattanggalindo($analisa['tanggal']);
$nomor = $analisa['nomor'];
$hasil = $analisa['hasil'];
$strike = $analisa['no_strike'];
$is_data = $analisa['is_data'];
$input = explode("|",$analisa['input']);
$tglanalisa = $analisa['tanggal'];

switch ($is_data){
  case 1:
    $radio = '<label class="radio">
                 <input name="status" id="status1" type="radio" data-role="radio" data-caption="Option one" checked="true" class="" data-role-radio="true" value="1">
                 <span class="check"></span><span class="caption">New</span>
              </label>';
  break;
  case 2:
    $radio = ' <label class="radio">
                 <input name="status" id="status2" type="radio" data-role="radio" data-caption="Option two" checked="true" class="" data-role-radio="true" value="2">
                 <span class="check"></span><span class="caption">Ricek</span>
               </label>';
  break;
  case 3:
    $radio = '<label class="radio">
               <input name="status" id="status3" type="radio" data-role="radio" data-caption="Option two" checked="true" class="" data-role-radio="true" value="3">
               <span class="check"></span><span class="caption">Test</span>
             </label>';
  break;
  default:
    $radio = "";
  break;
}

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
                        <!-- <input type="hidden" name="tglanalisa" id='tglanalisa' value="<?=$tglanalisa?>" > -->
                        <div class="row mb-2">
                             <label class="cell-sm-1">Nomor</label>
                             <div class="cell-sm-5">
                                 <input type="text" name="no_analisa" id="no_analisa" value="<?=$nomor?>"  readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Nama Analis</label>
                             <div class="cell-sm-5">
                                 <input type="text" name="namalengkap" value="<?=$nama?>"  readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Tanggal</label>
                             <div class="cell-sm-10">
                                 <input type="text" data-role="calendarpicker" name="tanggal" id="tanggal" data-day="false" value="<?=$analisa['tanggal']?>" data-format="%d-%m-%Y">
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
                               <select data-role="select" id='parameter' name='x[]' multiple disabled>
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
                               <?=$radio?>
                           </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Tarra F1</label>
                             <div class="cell-sm-5">
                                 <input type="text"  name='input[]' id='tarra_f1' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[0]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Tarra F2</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='tarra_f2' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[1]?>'
                                  readonly
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
                                  value='<?=$input[2]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Tarra F4</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='tarra_f4' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[3]?>'
                                  readonly
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
                                  value='<?=$input[4]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Tarra F6</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='tarra_f6' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[5]?>'
                                  readonly
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
                                  value='<?=$input[6]?>'
                                  readonly
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
                                  value='<?=$input[7]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Brutto F2</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='brutto_f2' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[8]?>'
                                  readonly
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
                                  value='<?=$input[9]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Brutto F4</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='brutto_f4' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[10]?>'
                                  readonly
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
                                  value='<?=$input[11]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Brutto F6</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='brutto_f6' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[12]?>'
                                  readonly
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
                                  value='<?=$input[13]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Net F2</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='net_f2' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[14]?>'
                                  readonly
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
                                  value='<?=$input[15]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Net F4</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='net_f4' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[16]?>'
                                  readonly
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
                                  value='<?=$input[17]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">Net F6</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='net_f6' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[18]?>'
                                  readonly
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
                                  value='<?=$input[19]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">MA</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='ma' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[20]?>'
                                  readonly
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
                                  value='<?=$input[21]?>'
                                  readonly
                                  />
                             </div>
                             <label class="cell-sm-1"></label>
                             <label class="cell-sm-1">SV</label>
                             <div class="cell-sm-4">
                                 <input type="text"  name='input[]' id='cv' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[22]?>'
                                  readonly
                                  />
                             </div>
                         </div>
                         <?php if($is_data == 3){ ?>
                         <div class="row">
                             <div class="cell">
                                 <button type="button" class="button success" id='buttonget' title="get data weight" onclick="javascript:getAnalisaAlat('detil')"><span class="mif-download"></span> Get data Weight</button>
                                 <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform('detil')"> Reset</button>
                                 <button type="submit" class="button button primary" id="buttonsave" title="Save data"><span class="mif-floppy-disk"></span> Simpan</button>
                                 <code id="ApiResponse"></code>
                             </div>
                         </div>
                         <?php }; ?>
                         <?php if($is_data == '1') { ?>
                          <div class="row">
                            <div class="cell">
                                <button type="submit" id="updateData" class="button success" title="Save data"><span class="mif-floppy-disk"></span> Update</button>
                              </div>
                          </div>
                        <?php } ?>
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

  $('#updateData').click(function() {
    if( $("#jam_analisa").val() == '0' ){
      msg = "Jam Analisa Harus di Pilih";
      custom_alert_notif(msg);
      return false;
    }

    var no_analisa = $("#no_analisa").val();
    var tanggal = $("#tanggal").val();
    var jam_analisa = $("#jam_analisa").val();

    $.ajax({
        type: 'POST',
        data: {no_analisa:no_analisa, tanggal:tanggal, jam_analisa:jam_analisa},
        cache: false,
        url: baseURL + menu + '/' + submenu + '/' + controller + '/update_analisa',
        success: function(result){
          var msg = $.trim(result);
          if (msg == 'OK') {
            custom_alert_notif("Data Berhasil di update",title="Berhasil",action="success");
            location.reload();
          }
        }
      });
      return false;
  });
    
    document.getElementById("buttonget").disabled = true; 
    document.getElementById("buttonsave").disabled = true; 
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
                            location.reload();
        				}
        			}
        		});
        
            return false;
        });
});
</script>