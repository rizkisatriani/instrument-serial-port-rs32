<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
//print_r($analisa);
$jam = "";
$material = "";
$parameter = "";
foreach ( opsi_db('material_analisa','','','') as $key=>$val ){
    if ($key == $analisa['id_material']){
      $material .= "<option value='$key' selected>$val</option>";
    }

}

foreach ( opsi_db('jam_analisa') as $key=>$val ){
    if ($key==$analisa['id_jam']){
      $jam .= "<option value='$key' selected>$val</option>";
    }

}

foreach (opsi_db('parameter_analisa','','','') as $key=>$val ) {
    if ($key==$analisa['id_parameter']){
      $parameter .= "<option value='$key' selected>$val</option>";
    }
}

$nama = nama_user($analisa['id_user']);
$tanggal = formattanggalindo($analisa['tanggal']);
$nomor = $analisa['nomor'];
$hasil = $analisa['hasil'];
$strike = $analisa['no_strike'];
$is_data = $analisa['is_data'];
$input = explode("|",$analisa['input']);

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
                        <div class="row mb-2">
                            <label class="cell-sm-2">Nomor</label>
                            <div class="cell-sm-10">
                                <input type="text" name="namalengkap" value="<?=$nomor?>" readonly>
                            </div>
                        </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Nama Analis</label>
                             <div class="cell-sm-10">
                                 <input type="text" name="namalengkap" value="<?=$nama?>" readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Tanggal</label>
                             <div class="cell-sm-10">
                                 <input type="text" name="tanggal" value ="<?=$tanggal?>" readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Material</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='material_analisa' name='material_analisa' readonly>
                                 <?=$material?>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Parameter</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='parameter' name='parameter' readonly>
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
                                 <label class="cell-sm-9">Nilai polarimeter sertifikat dari kwarsa penguji (oZ)</label>
                                 <div class="cell-sm-3">
                                     <input type="text"  name='input[0]' id='Q20' class="input"
                                      data-role="input"
                                      data-cls-input="text-bold"
                                      data-clear-button="false"
                                      placeholder='Manual Input'
                                      value='<?=$input[0]?>'
                                      readonly
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
                                      value='<?=$input[1]?>'
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
                                      value='<?=$input[2]?>'
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
                                      value='<?=$input[2]?>'
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
                                      value='<?=$input[4]?>'
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
                                      value='<?=$input[5]?>'
                                      readonly
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
                                      value='<?=$input[6]?>'
                                      readonly
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
                                      value='<?=$input[7]?>' readonly="readonly"
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
                                      value='<?=$input[8]?>'
                                      readonly
                                      />
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


});

function resetform(){
  //console.log('oke')
  $("#hasil").val(0);

}



</script>
