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
    /*
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
    */
    
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
    
    if ($val!='Shift I' and $val!='Shift II' and $val!='Shift III'){
        $jam .= "<option value='$key' $select>$val</option>";
    } 
    
    //$jam .= "<option value='$key' $select>$val</option>";
    
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
for ($x = 1; $x <= 3; $x++) {
    
    /*
        Gutter-A - M092
        Gutter-B - M093
        Gutter-C - M094
    */
    
    switch ($x){
        case 1: 
            $nama = "Gutter-A";
            $material = "<input type='hidden' name='material[$x]' value='92'>";
        break;
        case 2: 
            $nama = "Gutter-B"; 
            $material = "<input type='hidden' name='material[$x]' value='93'>";
        break;
        case 3: 
            $nama = "Gutter-C"; 
            $material = "<input type='hidden' name='material[$x]' value='94'>";
        break;
       
        default: $nama = ""; break;
    }

    //Material	CaO (mg/l) - P012	Beume (Be) - P015	W/R - P087	OV (%) - P088

    $input1 .= "<tr>
                <td>$x</td>
                <td>$nama $material</td>
                <td ><input type='text' id='input1_$x' name='input1[$x]' class='input-extrasmall text-bold info' /></td>                                           
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
                                            <th>debit (m3/d)</th>
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
