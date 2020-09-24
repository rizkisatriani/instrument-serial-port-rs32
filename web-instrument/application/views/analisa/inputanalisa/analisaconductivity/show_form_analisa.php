<?php
//print_r($this->session->userdata());
//print_r(opsi_db('jam_analisa'));
//print_r(opsi_db('material_analisa'));
date_default_timezone_set('Asia/Jakarta');
$jam = "<option value='0' >--Pilih Jam--</option>";
$material = "<option value='0' >--Pilih Material--</option>";
$parameter = "<option value='0' >--Pilih Parameter--</option>";
$no = 1;
foreach ( opsi_db('material_analisa','','','k04') as $key=>$val ){
    if ($no == 1){$select='selected';}else{$select = '';}
    $material .= "<option value='$key' $select>$val</option>";
    $no++;
}
//$no = 1;
$select = '';
$getTime = date("H");
foreach ( opsi_db('jam_analisa') as $key=>$val ){
    
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
        case '00': if ($val=='01:00'){$select='selected';}else{$select='';} break;
        case '01': if ($val=='02:00'){$select='selected';}else{$select='';} break;
        case '02': if ($val=='03:00'){$select='selected';}else{$select='';} break;
        case '03': if ($val=='04:00'){$select='selected';}else{$select='';} break;
        case '04': if ($val=='05:00'){$select='selected';}else{$select='';} break;
        case '05': if ($val=='06:00'){$select='selected';}else{$select='';} break;
    }
    
    $jam .= "<option value='$key' $select>$val</option>";
}
$select = '';
foreach (opsi_db('parameter_analisa','','','P028') as $key=>$val ) {
    if ($key=='P028'){$select='selected';}else{$select = '';}
    $parameter .= "<option value='$key' $select>$val</option>";
}

foreach (opsi_db('parameter_analisa','','','P003') as $key=>$val ) {
    if ($key=='P028'){$select='selected';}else{$select = '';}
    $parameter .= "<option value='$key' $select>$val</option>";
}

$nama = $this->session->userdata('namalengkap');
$tanggal = date("d-m-Y");

$JSON_parameter = json_encode( opsi_db('parameter_analisa','','','') );

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
                             <label class="cell-sm-2">Nama Analis</label>
                             <div class="cell-sm-10">
                                 <input type="text" name="namalengkap" value="<?=$nama?>" disabled readonly>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Tanggal</label>
                             <div class="cell-sm-10">
                                 <input type="text" data-role="calendarpicker" name="tanggal" id="tanggal" data-day="false" value="<?=date("Y/m/d")?>" data-format="%d-%m-%Y">
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Material</label>
                             <div class="cell-sm-10">
                               <select data-role="select" id='material_analisa' name='material_analisa' onchange="changeMaterial()" >
                                 <?=$material?>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Parameter</label>
                             <div class="cell-sm-10">
                             <!--
                               <select data-role="select" id='parameter' name='parameter' >
                                 <?=$parameter?>
                               </select>-->
                               <span id="span_parameter"></span>
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
                               <label class="radio">
                                  <input name="status" id='status1' type="radio" data-role="radio" data-caption="Option one" checked="true" class="" data-role-radio="true" value="1">
                                  <span class="check"></span><span class="caption">New</span>
                               </label>
                               <label class="radio">
                                 <input name="status" id='status2' type="radio" data-role="radio" data-caption="Option two" class="" data-role-radio="true" value="2">
                                 <span class="check"></span><span class="caption">Ricek</span>
                               </label>
                               <label class="radio">
                                 <input name="status" id='status3' type="radio" data-role="radio" data-caption="Option two" class="" data-role-radio="true" value="3">
                                 <span class="check"></span><span class="caption">Test</span>
                               </label>
                           </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">pH</label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[0]' id='hasilP' class="input-large"
                                  data-role="input"
                                  data-cls-input="text-bold input-large"
                                  data-clear-button="false"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2 hasilC">
                             <label class="cell-sm-2 ">Conducty</label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[1]' id='hasilC' class="input-large"
                                  data-role="input"
                                  data-cls-input="text-bold input-large"
                                  data-clear-button="false"
                                  />
                             </div>
                         </div>
                         <div class="row">
                             <div class="cell">
                                <button type="button" class="button success" id='buttonget' title="get data from ph A" onclick="javascript:getAnalisaAlat()"><span class="mif-download"></span> Get data from pH</button>
                                 <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform()"> Reset</button>
                                 <button type="submit" class="button button primary" title="Save data"><span class="mif-floppy-disk"></span> Simpan</button>
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

var arrayParam = <?=$JSON_parameter?>;

$(document).ready(function(){

  $("#id_modulinput").val(module_id);
  $("#hasilC").val(0);
  $("#hasilP").val(0);
  
  $(".hasilC").show();
  
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

    if( $("#hasil").val() == '0' ){
      msg = "Hasil Tidak Boleh 0";
      custom_alert_notif(msg);
      return false;
    }
    
    var material = $("#material_analisa").val();
    var input_param = $("#parameter").val();
    var jam = $("#jam_analisa").val();
    var status = $("input[name=status]:checked").val();
    
    var hasilC = $("#hasilC").val();
    var hasilP = $("#hasilP").val();
    
    var tanggal = $("#tanggal").val();
    
    var mt = material;
    
    if (mt == 45 || mt == 46 || mt == 47 || mt == 48 || mt == 49 || mt == 50 || mt == 121 || mt == 122 || mt == 156 )
    {

        dataIsi = {
            'tanggal'             : tanggal,
            'hasil'               : 0,		
            'id_modul'            : module_id,  	
            'input[0]'            : hasilP,	
            'input[1]'            : hasilC,	
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter[0]'	      : 'P003',
            'parameter[1]'	      : "P028", 
            'status'	          : status,
            'array'               : true
        };
        
    }else{

        dataIsi = {
            'tanggal'             : tanggal,
            'hasil'               : hasilP,		
            'id_modul'            : module_id,  	
            'input[1]'            : hasilP,
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter'	          : "P003",
            'status'	          : status,
            'array'               : false
        };  
    }
    
    $.ajax({
			type: 'POST',
            data: dataIsi,
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

function resetform(){
  //console.log('oke')
  $("#hasilP").val(0);
  $("#hasilC").val(0);

}

function changeMaterial(){
    
        document.getElementById("span_parameter").innerHTML = "";
        
        var mt = $("#material_analisa").val();
        
        var opt = "<select data-role='select' id='parameter' name='parameter[]' multiple>";                  
        for ( var key in arrayParam ){
            
            if (mt == 45 || mt == 46 || mt == 47 || mt == 48 || mt == 49 || mt == 50 || mt == 121 ||
                mt == 122 || mt == 156)
            {
                
                if (key == 'P028' || key == "P003" ){ //P028 Conducty
                    opt += "<option value='"+ key +"' selected>"+ arrayParam[key] +"</option>";
                    
                }
                
                $(".hasilC").show();
            }else{
                if (key == 'P003'){
                    opt += "<option value='"+ key +"' selected>"+ arrayParam[key] +"</option>";
                   
                }
                 $(".hasilC").hide();
            }
        }
        
        opt += " </select>";
        
        
        
        document.getElementById("span_parameter").innerHTML = opt;
    
}



</script>
