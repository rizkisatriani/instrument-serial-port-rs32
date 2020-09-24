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
foreach (opsi_db('parameter_analisa','','','') as $key=>$val ) {
    switch ($key) {

      case 'P003':
      case 'P029':
        $parameter .= "<option value='$key' selected='selected'>$val</option>"; //parameter[]
      break;
    }
}

$namalengkap = $this->session->userdata('namalengkap');
$tanggal = date("d-m-Y");

$input1 = "";
for ($x = 1; $x <= 16; $x++) {
    
    /*
        C-Massecuite Head Box - M186
        Nustch C-Massecuite - M180
        Final Molasses Composite - M187
        Machine #1 (BW) - M189 -  190
        Machine #2 (WS) - M190 - 191
        Machine #3 (WS) - M191 - 192
        Machine #4 (BW) - M192 - 193
        Machine #5 (WS) - M193 - 194
        Machine #6 (WS) - M194 - 195
        Machine #7 (HL) - M195 196
        Machine #8 (HL) - M196 - 197
        Machine #9 (WS) - M197 - 198
        Machine #10 (BMA) - M198 -199
        Machine #11 (FC) - M199 - 200
        Machine #12 (FC) - M200 - 201
        Machine #13 (FC) - M201 -202
    */
    
    switch ($x){
        case 1: 
            $nama = "C-Massecuite Head Box";
            $material = "<input type='hidden' name='material[$x]' value='186'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "hidden";
            $colom4 = "hidden";
            $colom5 = "hidden";
            $colom6 = "hidden";
        break;
        case 2: 
            $nama = "Nustch C-Massecuite";
            $material = "<input type='hidden' name='material[$x]' value='180'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "hidden";
            $colom4 = "hidden";
            $colom5 = "hidden";
            $colom6 = "hidden";
        break;
        case 3: 
            $nama = "Final Molasses Composite";
            $material = "<input type='hidden' name='material[$x]' value='187'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "hidden";
            $colom4 = "hidden";
            $colom5 = "hidden";
            $colom6 = "hidden";
        break;
        case 4: 
            $nama = "Machine #1 (BW)";
            $material = "<input type='hidden' name='material[$x]' value='190'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 5: 
            $nama = "Machine #2 (WS)";
            $material = "<input type='hidden' name='material[$x]' value='191'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 6: 
            $nama = "Machine #3 (WS)";
            $material = "<input type='hidden' name='material[$x]' value='192'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 7: 
            $nama = "Machine #4 (BW)";
            $material = "<input type='hidden' name='material[$x]' value='193'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 8: 
            $nama = "Machine #5 (WS)";
            $material = "<input type='hidden' name='material[$x]' value='194'>";
            $colom1 = "hidden";
        break;
        case 9: 
            $nama = "Machine #6 (WS)";
            $material = "<input type='hidden' name='material[$x]' value='195'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 10: 
            $nama = "Machine #7 (HL)";
            $material = "<input type='hidden' name='material[$x]' value='196'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 11: 
            $nama = "Machine #8 (HL)";
            $material = "<input type='hidden' name='material[$x]' value='197'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 12: 
            $nama = "Machine #9 (WS)";
            $material = "<input type='hidden' name='material[$x]' value='198'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 13: 
            $nama = "Machine #10 (BMA)";
            $material = "<input type='hidden' name='material[$x]' value='199'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 14: 
            $nama = "Machine #11 (FC)";
            $material = "<input type='hidden' name='material[$x]' value='200'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 15: 
            $nama = "Machine #12 (FC)";
            $material = "<input type='hidden' name='material[$x]' value='201'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        case 16: 
            $nama = "Machine #13 (FC)";
            $material = "<input type='hidden' name='material[$x]' value='202'>";
            $colom1 = "hidden";
            $colom2 = "text";
            $colom3 = "text";
            $colom4 = "text";
            $colom5 = "text";
            $colom6 = "text";
        break;
        
        default: $nama = ""; $material =""; $colom1 = "hidden"; break;
    }

    //Material	CaO (mg/l) - P012	Beume (Be) - P015	W/R - P087	OV (%) - P088

    $input1 .= "<tr>
                <td>$x</td>
                <td>$nama $material</td>
                <td ><input type='$colom1' id='input1_$x' name='input1[$x]' class='input-extrasmall text-bold '   /></td>
                <td ><input type='$colom2' id='input2_$x' name='input2[$x]' class='input-extrasmall text-bold'   /></td>
                <td ><input type='$colom3' id='formula_$x' name='formula[$x]' class='input-extrasmall text-bold' onInput='formulaVol($x)'/></td>    
                <td ><input type='$colom3' id='input3_$x' name='input3[$x]' class='input-extrasmall text-bold' readonly /></td>   
                <td ><input type='$colom4' id='input4_$x' name='input4[$x]' class='input-extrasmall text-bold'  /></td>   
                <td ><input type='$colom5' id='input5_$x' name='input5[$x]' class='input-extrasmall text-bold' /></td>   
                <td ><input type='$colom6' id='input6_$x' name='input6[$x]' class='input-extrasmall text-bold'  /></td>                                              
            </tr>";
            
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
                         <div class="row mb-2">
                             <label class="cell-sm-1">Nama Analis</label>
                             <div class="cell-sm-5">
                                 <input type="text" name="namalengkap" value="<?=$namalengkap?>" disabled readonly>
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
                             <label class="cell-sm-1">Jam</label>
                             <div class="cell-sm-5">
                               <select data-role="select" id='jam_analisa' name='jam_analisa' >
                                 <?=$jam?>
                               </select>
                             </div>
                         </div>
                        <div class="row mb-2">
                             <div class="cell-sm-12">
                                 <table class="table subcompact table-border cell-border" style="width: 100%;">
                                     <thead>
                                        <tr class="bg-green">
                                            <th style="text-align:left; width: 5%;">No</th>
                                            <th style="text-align:left; width: 40%;">Material</th>
                                            <th>Viscosity (Cp)</th>
                                            <th>Temp. Material (oC)</th>
                                            <th>Vol input</th>
                                            <th>Vol Fmol (lpm)</th>
                                            <th>Ampere (Amp)</th>
                                            <th>Dilution Water (gmp/lpm)</th>
                                            <th>Temp. Dilt. Water (oC)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$input1?>
                                    </tbody>
                                </table>
                             </div>
                         </div>
                         <div class="row">
                             <div class="cell">
                                 <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform('form')"> Reset</button>
                                 <button type="submit" class="button button primary" id="simpan" title="Save data" ><span class="mif-floppy-disk"></span> Simpan</button>
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
    
    $("#id_modulinput").val(module_id);

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


function hitungHasil(x){
    
    var bx = $("#input1_"+x).val();
    var rs = $("#input2_"+x).val();

    var hasil = rs / bx * 100;
    
    hasil = hasil.toFixed(2);
    
    $("#input3_"+x).val(hasil);
    
}

function formulaVol(x){

    var vol = $("#formula_"+x).val();
    
    hasil = 4.615 * 60 / vol;
    
    hasil = hasil.toFixed(2);
    
    $("#input3_"+x).val(hasil);
}


</script>
