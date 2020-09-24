<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
$jam = "<option value='0' >--Pilih Jam--</option>";

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
       $jam .= "<option value='$val' $select>$val</option>"; 
    }
}
$select = '';

$nama = $this->session->userdata('namalengkap');
$tanggal = date("Y-m-d");

?>
<div class="panel mt-4">
  <div class="row">
      <div class="cell"> <!--<div class="cell-md-6">!-->
          <div class="panel" id="analisaph1">
              <div data-role="panel" data-title-caption="ANALISA PH" data-collapsible="true"
                  data-title-icon="<span class='mif-lab'></span>" class="panel-content" data-role-panel="true">
                  <div class="cell p-1 border-bottom bd-gray">
                    <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
                        <div class="w-50 mb-2 mb-0-lg" >
                          <input type="text" data-role="calendarpicker" data-prepend="Tanggal" id="tanggal" value="<?=$tanggal?>">
                        </div>
                        <div class="ml-2 w-50 mr-2 my-rows-wrapper">
                          <select data-role="select" id='jam_analisa' name='jam_analisa' data-prepend="Jam Analisa">
                            <?=$jam?>
                          </select>
                        </div>
                        <div class="">
                            <button class="button success" onclick="javascript:processgetData()" ><span class="mif-spinner4"></span> Process</button>
                        </div>
                    </div>
                  </div>
                  <div class="cell p-1" id='gridedit'> </div>                 
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
    
    
    
    })



</script>
