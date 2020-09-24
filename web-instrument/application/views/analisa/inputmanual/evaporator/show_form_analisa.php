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
for ($x = 1; $x <= 19; $x++) {
    
    /*
    Clear Juice - M006
    Evaporator #1A - M095
    Evaporator #1B - M096
    Evaporator #1C - M097
    Evaporator #1D - M098
    Evaporator #1E - M098A
    Evaporator #1ABCDE - M099
    Evaporator #2A - M100
    Evaporator #2B - M101
    Evaporator #2C - M102
    Evaporator #2D - M103
    Evaporator #2ABCD - M104
    Evaporator #3A - M105
    Evaporator #3B - M106
    Evaporator #3AB - M107
    Evaporator #4 - M108
    Evaporator #5 - M109
    Exhausted Steam - Mxxx
    Vapour Steam - Mxxx
    */
    
    switch ($x){
        case 1: 
            $nama = "Clear Juice";
            $material = "<input type='hidden' name='material[$x]' value='6'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 2: 
            $nama = "Evaporator #1A"; 
            $material = "<input type='hidden' name='material[$x]' value='95'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 3: 
            $nama = "Evaporator #1B"; 
            $material = "<input type='hidden' name='material[$x]' value='96'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 4: 
            $nama = "Evaporator #1C"; 
            $material = "<input type='hidden' name='material[$x]' value='97'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 5: 
            $nama = "Evaporator #1D"; 
            $material = "<input type='hidden' name='material[$x]' value='98'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 6: 
            $nama = "Evaporator #1E"; 
            $material = "<input type='hidden' name='material[$x]' value='188'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 7: 
            $nama = "Evaporator #1ABCDE"; 
            $material = "<input type='hidden' name='material[$x]' value='99'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 8: 
            $nama = "Evaporator #2A"; 
            $material = "<input type='hidden' name='material[$x]' value='100'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 9: 
            $nama = "Evaporator #2B"; 
            $material = "<input type='hidden' name='material[$x]' value='101'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 10: 
            $nama = "Evaporator #2C"; 
            $material = "<input type='hidden' name='material[$x]' value='102'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 11: 
            $nama = "Evaporator #2D"; 
            $material = "<input type='hidden' name='material[$x]' value='103'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 12: 
            $nama = "Evaporator #2ABCD"; 
            $material = "<input type='hidden' name='material[$x]' value='104'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 13: 
            $nama = "Evaporator #3A"; 
            $material = "<input type='hidden' name='material[$x]' value='105'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 14: 
            $nama = "Evaporator #3B"; 
            $material = "<input type='hidden' name='material[$x]' value='106'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 15: 
            $nama = "Evaporator #3AB"; 
            $material = "<input type='hidden' name='material[$x]' value='107'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 16: 
            $nama = "Evaporator #4"; 
            $material = "<input type='hidden' name='material[$x]' value='108'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 17: 
            $nama = "Evaporator #5"; 
            $material = "<input type='hidden' name='material[$x]' value='109'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "text";
        break;
        case 18: 
            $nama = "Exhausted Steam"; 
            $material = "<input type='hidden' name='material[$x]' value='178'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "hidden";
        break;
        case 19: 
            $nama = "Vapour Steam"; 
            $material = "<input type='hidden' name='material[$x]' value='177'>";
            $colom1 = "text";
            $colom2 = "text";
            $colom3 = "hidden";
        break;
        default: $nama = ""; break;
    }

    //Temp. - P027	Press/Vacuum - Pxxx	CaO - P012

    $input1 .= "<tr>
                <td>$x</td>
                <td>$nama $material</td>
                <td ><input type='$colom1' id='input1_$x' name='input1[$x]' class='input-extrasmall text-bold info' placeholder='input' /></td>  
                <td ><input type='$colom2' id='input2_$x' name='input2[$x]' class='input-extrasmall text-bold info' placeholder='input' /></td> 
                <td ><input type='$colom3' id='input3_$x' name='input3[$x]' class='input-extrasmall text-bold info' placeholder='input' /></td>                                          
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
                                            <th>Temp (oC)</th>
                                            <th>Press/Vacuum (kg/cm2,mmHg)</th>
                                            <th>CaO (ppm)</th>
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


</script>
