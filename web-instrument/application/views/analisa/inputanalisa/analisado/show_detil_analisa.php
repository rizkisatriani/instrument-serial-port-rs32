<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
//print_r($analisa);
$jam = "";
$material = "";
$parameter = "";
foreach ( opsi_db('material_analisa','','','k08') as $key=>$val ){
    if ($key == $analisa['id_material']){
      $material .= "<option value='$key' selected>$val</option>";
    }

}

$select='';
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

foreach (opsi_db('parameter_analisa','','','P030') as $key=>$val ) {
    if ($key==$analisa['id_parameter']){
      $parameter .= "<option value='$key' selected>$val</option>";
    }
}

$id = $analisa['id'];
$nama = nama_user($analisa['id_user']);
$tanggal = formattanggalindo($analisa['tanggal']);
$nomor = $analisa['nomor'];
$hasil = $analisa['hasil'];
$strike = $analisa['no_strike'];
$is_data = $analisa['is_data'];

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
                  <div class="cell-md-6 p-4">
                    <form name="analisa" id="analisa">
                        <input type="hidden" name="id_modul" id='id_modulinput' >
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="row mb-2">
                            <label class="cell-sm-2">Nomor</label>
                            <div class="cell-sm-10">
                                <input type="text" name="nomor" value="<?=$nomor?>" disabled readonly>
                            </div>
                        </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Nama Analis</label>
                             <div class="cell-sm-10">
                                 <input type="text" name="namalengkap" value="<?=$nama?>" disabled readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Tanggal</label>
                             <div class="cell-sm-10">
                                <input type="text" data-role="calendarpicker" name="tanggal" id="tanggal" data-day="false" value="<?=$analisa['tanggal']?>" data-format="%d-%m-%Y">
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Material</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='material_analisa' name='material_analisa' disabled readonly>
                                 <?=$material?>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Parameter</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='parameter' name='parameter' disabled readonly>
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
                              <?=$radio?>
                           </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Hasil</label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='hasil' id='hasil' class="input-large" value='<?=$hasil?>'
                                  data-role="input"
                                  data-cls-input="text-bold input-large"
                                  data-clear-button="false"
                                  disabled readonly />
                             </div>
                         </div>
                         <?php if($is_data == '1') { ?>
                        <div class="row">
                            <div class="cell">
                              <!--<button type="submit" class="button primary">Sign in</button>-->
                              <button type="submit" class="button success" title="Save data"><span class="mif-floppy-disk"></span> Update</button>
                              <!-- <code id="ApiResponse"></code> -->
                              <!--<button type="button" class="button secondary" title="get data from ph A" onclick="javascript:post_data_api('hasil','1')"><span class="mif-download"></span> POST data from <?=$module_title?></button>
                              !-->
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
$("#analisa").submit(function(){
  if( $("#jam_analisa").val() == '0' ){
    msg = "Jam Analisa Harus di Pilih";
    custom_alert_notif(msg);
    return false;
  }
  $.ajax({
      type: 'POST',
      data: $(this).serialize(),
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
});

function resetform(){
  //console.log('oke')
  $("#hasil").val(0);

}



</script>
