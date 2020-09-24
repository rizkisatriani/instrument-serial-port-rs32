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

$select = '';
$getTime = date("H");

$nama = nama_user($analisa['id_user']);
$tanggal = formattanggalindo($analisa['tanggal']);
$nomor = $analisa['nomor'];
$hasil = $analisa['hasil'];
$strike = $analisa['no_strike'];
$is_data = $analisa['is_data'];
$input = explode(",",$analisa['input']);

$valinput1 = explode("|",$input[0]);
$valinput2 = explode("|",$input[1]);

$jam = "";
$material = "";
$parameter = "";
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
    if ($key==$analisa['id_parameter']){
      $parameter .= "<option value='$key' selected>$val</option>";
    }
}

$namalengkap = $this->session->userdata('namalengkap');
$tanggal = date("d-m-Y");

$param = $analisa['id_parameter'];

if ($param == 'P029'){
    $namafield = "ppm";
}else{
    $namafield = "pH";
}

$input1 = "";
for ($x = 1; $x <= 26; $x++) {
    
    switch ($x){
        case 1: $nama = "Boiler Feed Water"; break;
        case 2: $nama = "Boiler Feed Water #4"; break;
        case 3: $nama = "Boiler Water No 1"; break;
        case 4: $nama = "Boiler Water No 2"; break;
        case 5: $nama = "Boiler Water No 3"; break;
        case 6: $nama = "Boiler Water No 4"; break;
        case 7: $nama = "R J H # 1 Condensate"; break;
        case 8: $nama = "R J H # 2 Condensate"; break;
        case 9: $nama = "R J H # 3 Condensate"; break;
        case 10: $nama = "S J H  1&2 Condensate"; break;
        case 11: $nama = "S J H  3&4 Condensate"; break;
        case 12: $nama = "C J H # 1 Condensate"; break;
        case 13: $nama = "C J H # 2 Condensate"; break;
        case 14: $nama = "Evap 1ABCDE Condensate"; break;
        case 15: $nama = "Evap 2ABC Condensate"; break;
        case 16: $nama = "Evap 3AB Condensate"; break;
        case 17: $nama = "Evap 4 Condensate"; break;
        case 18: $nama = "Evap 5 Condensate"; break;
        case 19: $nama = "Evap Hot Well"; break;
        case 20: $nama = "Pan Hot Well"; break;
        case 21: $nama = "Evap Vacuum Condensor"; break;
        case 22: $nama = "Injection Wtr Inlet"; break;
        case 23: $nama = "Injection Wtr Outlet"; break;
        case 24: $nama = "Cooling Water Temp. (In/Out)"; break;
        case 25: $nama = "Vacuum Filter Condensor #1"; break;
        case 26: $nama = "Vacuum Filter Condensor #2"; break;
        default: $nama = ""; break;
    }
    
    if ($x >= 1 && $x <=6){
        $isi = $valinput1[$x-1];
        $inputX = "<input type='text' id='input1_$x' name='input1[$x]' class='input-extrasmall  text-bold' value='$isi' readonly />";
    }else{
        $inputX = "-";
    }
    /*
    if ($param != 'P029'){
        $field = "<td class='conducty'>$inputX</td>";
    }else{
        $field = "";
    }
    */
    
    $field = "<td class='conducty'>$inputX</td>";
    
    $isi2 = $valinput2[$x-1];
    $input1 .= "<tr>
                <td>$x</td>
                <td>$nama</td>
                $field
                <td><input type='text' id='input2_$x' name='input2[$x]' class='input-extrasmall text-bold' value='$isi2' readonly/></td>                                            
            </tr>";
            
}
$input2 = "";
for ($x = 27; $x <= 51; $x++) {
    
    switch ($x){
        case 27: $nama = "Pan Condensor No 1"; break;
        case 28: $nama = "Pan Condensor No 2"; break;
        case 29: $nama = "Pan Condensor No 3"; break;
        case 30: $nama = "Pan Condensor No 4"; break;
        case 31: $nama = "Pan Condensor No 5"; break;
        case 32: $nama = "Pan Condensor No 6"; break;
        case 33: $nama = "Pan Condensor No 7"; break;
        case 34: $nama = "Pan Condensor No 8"; break;
        case 35: $nama = "Pan Condensor No 9"; break;
        case 36: $nama = "Pan Condensor No 10"; break;
        case 37: $nama = "Pan Condensor No 11"; break;
        case 38: $nama = "Pan Condensor No 12"; break;
        case 39: $nama = "Pan Condensor No 13"; break;
        case 40: $nama = "Pan Condensor No 14"; break;
        case 41: $nama = "Pan Condensor No 15"; break;
        case 42: $nama = "B-CVP Condensor No 1"; break;
        case 43: $nama = "B-CVP Condensor No 2"; break;
        case 44: $nama = "C-CVP Condensor No 1"; break;
        case 45: $nama = "C-CVP Condensor No 2"; break;
        case 46: $nama = "Gutter 'A' @ Clary"; break;
        case 47: $nama = "Gutter 'A' @ Curing"; break;
        case 48: $nama = "Gutter 'C' @ Milling"; break;
        case 49: $nama = "Gutter 'A'"; break;
        case 50: $nama = "Gutter 'B'"; break;
        case 51: $nama = "Gutter 'C'"; break;
        default: $nama = ""; break;
    }
    $isi2 = $valinput2[$x-1];
    $input2 .= "<tr>
                <td>$x</td>
                <td>$nama</td>
                <td><input type='text' id='input2_$x' name='input2[$x]' class='input-extrasmall text-bold' value='$isi2' readonly/></td>                                            
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
                            <label class="cell-sm-1">Nomor</label>
                            <div class="cell-sm-5">
                                <input type="text" name="no_analisa" id="no_analisa" value="<?=$nomor?>" readonly>
                            </div>
                        </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Nama Analis</label>
                             <div class="cell-sm-5">
                                 <input type="text" name="namalengkap" value="<?=$namalengkap?>" disabled readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Tanggal</label>
                             <div class="cell-sm-10">
                                 <input type="text" data-role="calendarpicker" name="tanggal" id="tanggal" data-day="false" value="<?=$analisa['tanggal']?>" data-format="%d-%m-%Y">
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-1">Parameter</label>
                             <div class="cell-sm-5">
                               <select data-role="select" id='parameter' name='parameter' onchange="SelectParameter()" >
                                 <?=$parameter?>
                               </select>
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
                             <div class="cell-sm-6">
                                 <table class="table subcompact table-border cell-border" style="width: 100%;">
                                     <thead>
                                        <tr class="bg-green">
                                            <th style="text-align:left; width: 10%;">No</th>
                                            <th style="text-align:left; width: 40%;">Material</th>
                                            <?php if ($param != 'P029'){?>
                                            <th class="conducty">Conductivity</th>
                                            <?php
                                            }?>
                                            <th><?=$namafield?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$input1?>
                                    </tbody>
                                </table>
                             </div>
                             <div class="cell-sm-6">
                                <table class="table subcompact table-border cell-border" style="width: 100%;">
                                     <thead>
                                        <tr class="bg-green">
                                            <th style="text-align:left; width: 10%;">No</th>
                                            <th style="text-align:left; width: 40%;">Material</th>
                                            <th><?=$namafield?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$input2?>
                                    </tbody>
                                </table>
                             </div>
                         </div>
                         <?php if($is_data == 3){ ?>
                         <div class="row">
                             <div class="cell">
                                 <button type="button" class="button success" id='buttonget' title="get data weight" onclick="javascript:getAnalisaAlat('form')"><span class="mif-download"></span> <span id="logoGet"></span> <span id="logoInput"></span></button>
                                 <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform('form')"> Reset</button>
                                 <button type="button" class="button secondary" id='buttonprev' title="Previous Input" onclick="javascript:getInput('prev')"><span class="mif-previous"></span> Previous <span id="prev"></span></button>
                                 <button type="button" class="button secondary" id='buttonnext' title="Next Input" onclick="javascript:getInput('next')"><span class="mif-next"></span> Next <span id="next"></span></button>
                                 <button type="button" class="button button info" id="simpan_sementara" onclick="javascript:simpanSementara()" title="Save data" ><span class="mif-note-add"></span> Simpan Sementara</button>
                                 
                                 <button type="submit" class="button button primary" id="simpan" title="Save data" ><span class="mif-floppy-disk"></span> Simpan</button>
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

    
    $(".conducty").hide();
    
    //document.getElementById("buttonget").disabled = true; 
    //document.getElementById("buttonsave").disabled = true; 
    $("#id_modulinput").val(module_id);
    //$("#hasil").val(0);
    
    //$("#simpan_sementara").hide();
    
    PostParameterAlat();
    PostParameterAlat2();
    //input = input + 1;
    document.getElementById("next").innerHTML = next;
    
    if (input == 1){
        document.getElementById("prev").disabled = true; 
    }
    
    $("#input1_"+input).addClass("info");
    $("#input2_"+input).addClass("info");
    
    document.getElementById("logoInput").innerHTML = "( "+input+" )";

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


function SelectParameter(){
    var parameter = $("#parameter").val();
    
    if (parameter == 'P003'){
        //$(".conducty").show();
        //document.getElementById("logoHead1").innerHTML = "pH";
        //document.getElementById("logoHead2").innerHTML = "pH";
        document.getElementById("logoGet").innerHTML = "Ger Data pH Meter"; 
    }else{
        //$(".conducty").hide();
        //document.getElementById("logoHead1").innerHTML = "Sugar (ppm)";
        //document.getElementById("logoHead2").innerHTML = "Sugar (ppm)";
        document.getElementById("logoGet").innerHTML = "Ger Data DR6000";    
    }
    
    var i;
    for (i = 1; i <= 51; i++) {
        //$("#input1_"+i).val(0);
        //$("#input2_"+i).val(0);
        
    }
    
}

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
