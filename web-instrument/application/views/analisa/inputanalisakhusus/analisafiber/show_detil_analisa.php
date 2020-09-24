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
                  <div class="cell-md-6 p-4">
                    <form name="analisa" id="analisa">
                        <input type="hidden" name="id_modul" id='id_modulinput'>
                        <div class="row mb-2">
                            <label class="cell-sm-2">Nomor</label>
                            <div class="cell-sm-10">
                                <input type="text" name="no_analisa" id="no_analisa" value="<?=$nomor?>" readonly>
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
                                 <input type="text" data-role="calendarpicker" name="tanggal" id="tanggal" data-day="false" value="<?=$analisa['tanggal']?>" data-format="%d-%m-%Y">
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
                             <label class="cell-sm-2"><span id="logo1"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[0]' id='wadah' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[0]?>'
                                  readonly
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2"><span id="logo2"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[1]' id='awal' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[1]?>'
                                  readonly
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2"><span id="logo3"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[2]' id='akhir' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[2]?>'
                                  readonly
                                  />
                             </div>
                         </div>
                         <div class="row mb-2 divkering">
                             <label class="cell-sm-2"><span id="logo4"></span></label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='input[3]' id='kering' class="input"
                                  data-role="input"
                                  data-cls-input="text-bold"
                                  data-clear-button="false"
                                  value='<?=$input[3]?>'
                                  readonly="readonly"
                                  />
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Hasil</label>
                             <div class="cell-sm-10">
                                 <input type="text"  name='hasil' id='hasil' class="input-large" value='<?=$hasil?>'
                                  data-role="input"
                                  data-cls-input="text-bold input-large"
                                  data-clear-button="false"
                                  readonly />
                             </div>
                         </div>
                         <?php if($is_data == 3){ ?>
                             <div class="row">
                                 <div class="cell">
                                     <button type="button" class="button success" id='buttonget' title="get data weight" onclick="javascript:getAnalisaAlatUpdate()" ><span class="mif-download"></span> Get data Weight</button>
                                     <button type="button" class="button button alert" title="reset this form" onclick="javascript:resetform()"> Reset</button>
                                     <button type="submit" class="button button primary" title="Save data"><span class="mif-floppy-disk"></span> Simpan</button>
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

    PostParameterAlat();
    
    show_input();
    
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

    if( $("#hasil").val() == '0' || $("#hasil").val() == 'NaN' || $("#hasil").val() == '0.00' ){
      msg = "Hasil Tidak Boleh 0";
      custom_alert_notif(msg);
      return false;
    }
    
    var material = $("#material_analisa").val();
    var input_param = $("#parameter").val();
    var jam = $("#jam_analisa").val();
    var status = $("input[name=status]:checked").val();
    
    var input1 = $("#wadah").val();
    var input2 = $("#awal").val();
    var input3 = $("#akhir").val();
    var input4 = $("#kering").val();
    var hasil = $("#hasil").val();
    var nomor = $("#nomor").val();

    if (input_param == 'P010' ){
        
        dataIsi = {
            'nomor'               : nomor,
            'tglanalisa'          : "<?=$tglanalisa?>",
            'hasil'               : hasil,		
            'id_modul'            : module_id,  	
            'input[0]'            : input1,	 //wadah
            'input[1]'            : input2,	 // sample
            'input[4]'            : input3,  // berat kering
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter[0]'	      : input_param,
            'parameter[1]'	      : "P048", //Berat wadah
            'parameter[2]'	      : "P049", //Berat Sample
            'parameter[3]'	      : "P050", //Berat Kering
            'status'	          : status
        }
        
        
    }else{
        /* catatan
        input1,	 //sample
        input2,	//kiesel
        input3,	// paper
        input4,	//berat kering
        */
        dataIsi = {
            'nomor'               : nomor,
            'tglanalisa'          : "<?=$tglanalisa?>",
            'hasil'               : hasil,		
            'id_modul'            : module_id,  	
            'input[1]'            : input1,	 // sample
            'input[2]'            : input2,	 // kiesel
            'input[3]'            : input3,  // paper
            'input[4]'            : input4,  // berat kering
            'jam_analisa'	      : jam,
            'material_analisa'    : material,	
            'parameter[0]'	      : input_param,
            'parameter[1]'	      : "P049", //Berat Sample
            'parameter[2]'	      : "P102", //Kieselguhr
            'parameter[3]'	      : "P103", //Filter Paper
            'parameter[4]'	      : "P050", //Berat Kering
            'status'	          : status
        }
        
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

 function show_input(){
    
    var parameter = $("#parameter").val();
        
    if ( parameter == 'P010' ){
        $(".divkering").hide();
        document.getElementById("logo1").innerHTML = "Wadah";
        document.getElementById("logo2").innerHTML = "Sample";
        document.getElementById("logo3").innerHTML = "Timbang Kering";
        
    }else{
        $(".divkering").show();
        document.getElementById("logo1").innerHTML = "Sample";
        document.getElementById("logo2").innerHTML = "+ Kieselguhr";
        document.getElementById("logo3").innerHTML = "+ Filter Paper";
        document.getElementById("logo4").innerHTML = "Timbang Kering";
    }
    
  }
  
  function getAnalisaAlatUpdate( ){

    var obj = JSON.parse( dataSetting );
    var request = get_device_data(dataSetting, APIKEY); //ambil dari 
    
    var brt_wadah = $("#wadah").val();
    var brt_awal = $("#awal").val();
    var brt_akhir = $("#akhir").val();
    var brt_kering = $("#kering").val();
    var input_param = $("#parameter").val();
    
    request.done(function (response, textStatus, jqXHR){
        var str = response.VALUE;
        if (str){
            
            isi = str.substring(obj.awal, obj.akhir);
            isi = parseFloat(isi);
            isi = Math.abs( isi.toFixed(2) );

            if (input_param == 'P010'){
                $("#akhir").val(isi)
                hitung_hasil()
            }else{
                $("#kering").val(isi)
                hitung_hasil()
            }
             
        }
    });
    
  }


</script>
