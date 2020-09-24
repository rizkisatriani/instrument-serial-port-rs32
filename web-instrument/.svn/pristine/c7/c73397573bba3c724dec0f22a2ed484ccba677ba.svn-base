<?php

//print_r($analisa);
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

//$namalengkap = $this->session->userdata('namalengkap');
//$tanggal = date("d-m-Y");

$id = $analisa['id'];
$namalengkap = nama_user($analisa['id_user']);
$tanggal = formattanggalindo($analisa['tanggal']);
$nomor = $analisa['nomor'];
$hasil = $analisa['hasil'];
$strike = $analisa['no_strike'];
$is_data = $analisa['is_data'];
$input = explode("|",$analisa['input']);
$input1 = "";

$row = 5;

for ($x = 1; $x <= $row; $x++) {
    
    /*
        First Exp Juice - M001
        Mixed Juice - M002
        Clear Juice - M006
        Raw Syrup - M008
        Clarified Syrup - M009

    */
    
    switch ($x){
        case 1: 
            $nama = "First Exp Juice";
            $material = "<input type='hidden' name='material[$x]' value='1'>";
            $input4 = 'hidden';
            
        break;
        case 2: 
            $nama = "Mixed Juice"; 
            $material = "<input type='hidden' name='material[$x]' value='2'>";
            $input4 = 'text';
        break;
        case 3: 
            $nama = "Clear Juice"; 
            $material = "<input type='hidden' name='material[$x]' value='6'>";
            $input4 = 'hidden';
        break;
        case 4: 
            $nama = "Raw Syrup"; 
            $material = "<input type='hidden' name='material[$x]' value='8'>";
            $input4 = 'hidden';
        break;
        case 5: 
            $nama = "Clarified Syrup"; 
            $material = "<input type='hidden' name='material[$x]' value='9'>";
            $input4 = 'hidden';
        break;
        default: $nama = ""; break;
    }

    //Material	Brix (%) - P001	RS (%) - P007	RS%Bx - P007A
    $colom1 = $x-1;
    $colom2 = $row*1+$x-1;
    $colom3 = $row*2+$x-1;
    $colom4 = $row*3+$x-1;
    
    $input1 .= "<tr>
                <td>$x</td>
                <td>$nama $material</td>
                <td ><input type='text' id='input1_$x' name='input1[$x]' class='input-extrasmall text-bold info' value='$input[$colom1]'  readonly/></td>
                <td><input type='text' id='input2_$x' name='input2[$x]' class='input-extrasmall text-bold info' value='$input[$colom2]'  readonly/></td>
                <td><input type='text' id='input3_$x' name='input3[$x]' class='input-extrasmall text-bold info' value='$input[$colom3]' readonly /></td>
                <td><input type='$input4' id='input4_$x' name='input4[$x]' class='input-extrasmall text-bold info' value='$input[$colom4]'  readonly /></td>                                           
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
                                <input type="text" name="namalengkap" value="<?=$nomor?>" readonly>
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
                                            <th>Brix (%)</th>
                                            <th>RS (%)</th>
                                            <th>RS%Bx</th>
                                            <th>Losses (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$input1?>
                                    </tbody>
                                </table>
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

