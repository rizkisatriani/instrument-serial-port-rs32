<?php
//print_r($this->db->last_query());

  $BODY = "";
  $BODY2 = "";
  $BODY3 = "";
  $n = 1;
  //print_r($showData);
  foreach ($analisa as $val) {
    $id = $val->id;
    //$nomor = $val->nomor;
    $nilai = $val->nilai_uji;
    $tanggal = formattanggalindo($val->tanggal);
    $wkt_analisa = $val->wkt_input;
    $shift = $val->shift;
    $machine = $val->timbangan;
    //$jam = $val->jam;
    //$status = $val->status;
    //$material = $val->materialname;
    $createby = $val->createby;
    //$parameter = $val->nama_parameter;
    $status = staus_data($val->is_data);
    
    $minimal = $param['min'];
    $maksimal = $param['max'];
    $no_pack = $param['no_pack'];
    
    if ( $nilai < $minimal or $nilai > $maksimal){
        $color = "<span class='button mini bg-white mif-bin fg-red' onclick=\"javascript:HapusUjiPetik('$id','$no_pack')\">";
    }else{
        $color = "";
    }
    switch ($showData){
        case 'all':
        
            if ($shift == '1'){
                $BODY .= "<tr >
                            <td>$wkt_analisa</td>
                            <td>$nilai</td>
                            <td>$machine</td>
                            <td>$color</td>
                          </tr >";  
            }
            
            if ($shift == '2'){
                $BODY2 .= "<tr >
                            <td>$wkt_analisa</td>
                            <td>$nilai</td>
                            <td>$machine</td>
                            <td>$color</td>
                          </tr >";  
            }
            
            if ($shift == '3'){
                $BODY3 .= "<tr >
                            <td>$wkt_analisa</td>
                            <td>$nilai</td>
                            <td>$machine</td>
                            <td>$color</td>
                          </tr >";  
            }
        break;
        case 'over':
            if ($nilai > $maksimal){
                if ($shift == '1'){
                    $BODY .= "<tr >
                                <td>$wkt_analisa</td>
                                <td>$nilai</td>
                                <td>$machine</td>
                                <td>$color</td>
                              </tr >";  
                }
                
                if ($shift == '2'){
                    $BODY2 .= "<tr >
                                <td>$wkt_analisa</td>
                                <td>$nilai</td>
                                <td>$machine</td>
                                <td>$color</td>
                              </tr >";  
                }
                
                if ($shift == '3'){
                    $BODY3 .= "<tr >
                                <td>$wkt_analisa</td>
                                <td>$nilai</td>
                                <td>$machine</td>
                                <td>$color</td>
                              </tr >";  
                }   
            }
        break;
        case 'under':
            if ($nilai < $minimal){
                if ($shift == '1'){
                    $BODY .= "<tr >
                                <td>$wkt_analisa</td>
                                <td>$nilai</td>
                                <td>$machine</td>
                                <td>$color</td>
                              </tr >";  
                }
                
                if ($shift == '2'){
                    $BODY2 .= "<tr >
                                <td>$wkt_analisa</td>
                                <td>$nilai</td>
                                <td>$machine</td>
                                <td>$color</td>
                              </tr >";  
                }
                
                if ($shift == '3'){
                    $BODY3 .= "<tr >
                                <td>$wkt_analisa</td>
                                <td>$nilai</td>
                                <td>$machine</td>
                                <td>$color</td>
                              </tr >";  
                }   
            }
        break;
        
    }
    
    $n++;

  }

 ?>
<div class="row">
    <div class="cell-4">
        <div class="panel-title"> <span class="caption"><b><i>SHIFT 1</i></b></span></div>
         <table id="t1" class="table striped compact table-border cell-border row-border row-hover "
                data-role="table"
                data-show-activity="false"
                data-show-search="false"
                data-show-rows-steps="false"
                data-rows = 15
                data-cls-head="success"
             >
              <thead>
           		<tr>
                  <th data-cls-column="text-center" class="text-center bg-green" >DATE TIME</th>
                  <th width='25%' data-cls-column="text-center" class="text-center bg-green" >WEIGH</th>
                  <th width='5%' data-cls-column="text-center" class="text-center bg-green" >MC</th>
                  <th width='25%' data-cls-column="text-center" class="text-center bg-green" ></th>
           		</tr>
        	   </thead>
              <tbody>
                  <?=$BODY?>
            	</tbody>
          </table>
    </div>
    <div class="cell-4">
            <div class="panel-title"> <span class="caption"><b><i>SHIFT 2</i></b></span></div>
            <table id="t1" class="table striped compact table-border cell-border row-border row-hover "
                data-role="table"
                data-show-activity="false"
                data-show-search="false"
                data-show-rows-steps="false"
                data-rows = 15
                data-cls-head="success"
             >
              <thead>
           		<tr>
                  <th data-cls-column="text-center" class="text-center bg-green" >DATE TIME</th>
                  <th width='25%' data-cls-column="text-center" class="text-center bg-green" >WEIGH</th>
                  <th width='5%' data-cls-column="text-center" class="text-center bg-green" >MC</th>
                  <th width='25%' data-cls-column="text-center" class="text-center bg-green" ></th>
           		</tr>
        	   </thead>
              <tbody>
                  <?=$BODY2?>
            	</tbody>
          </table>
    </div>
    <div class="cell-4">
            <div class="panel-title"> <span class="caption"><b><i>SHIFT 3</i></b></span></div>
             <table id="t1" class="table striped compact table-border cell-border row-border row-hover "
                data-role="table"
                data-show-activity="false"
                data-show-search="false"
                data-show-rows-steps="false"
                data-rows = 15
                data-cls-head="success"
             >
              <thead>
           		<tr>
                  <th data-cls-column="text-center" class="text-center bg-green" >DATE TIME</th>
                  <th width='25%' data-cls-column="text-center" class="text-center bg-green" >WEIGH</th>
                  <th width='5%' data-cls-column="text-center" class="text-center bg-green" >MC</th>
                  <th width='25%' data-cls-column="text-center" class="text-center bg-green" ></th>
           		</tr>
        	   </thead>
              <tbody>
                  <?=$BODY3?>
            	</tbody>
          </table>
    </div>
</div>
    <!--<div data-role="panel">-->

    <!--</div>-->
<script>
$(document).ready(function(){



});

function HapusUjiPetik(id, pack){
        
        Metro.dialog.create({
            title: "Hapus Uji Petik",
            clsDialog: "warning",
            /*content: "<div><input type='text' id='reason' data-role='input' data-prepend='Reason : '></div>",*/
            content: "<div><select data-role='select' id='reason' name='reason' data-prepend='Reason :'><option value=''></option>"+
                                    "<option value='A Under'>A Under</option>"+
                                    "<option value='A Over'>A Over</option>"+
                                    "<option value='B Under'>B Under</option>"+
                                    "<option value='B Over'>B Over</option>"+
                                    "<option value='C Under'>C Under</option>"+
                                    "<option value='C Over'>C Over</option>"+
                                    "<option value='D Under'>D Under</option>"+
                                    "<option value='D Over'>D Over</option>"+
                                    "<option value='E Under'>E Under</option>"+
                                    "<option value='E Over'>E Over</option>"+
                                    "<option value='Timbang Terlalu Cepat'>Timbang Terlalu Cepat</option>"+
                                    "<option value='Timbangan Error'>Timbangan Error</option>"+
                                    "<option value='Jumlah Lebih'>Jumlah Lebih</option>"+
                                    "<option value='Jumlah Kurang'>Jumlah Kurang</option>"+
                                "</select></div>",
            actions: [
                {
                    caption: "Delete",
                    cls: "js-dialog-close warning",
                    onclick: function(){
                        YeNo = confirm("Apakah Anda Yakin untuk Delete data!");
                        if (YeNo == true){
                            reason = $("#reason").val();
                            if (reason == ""){
                                alert("Reason belum di isi");
                            }else{
                                
                                $.ajax({
                            		type: 'POST',
                            		data: {'jenis': pack , 'id': id ,'reason':reason},
                            		cache: false,
                            		url: baseURL + menu + '/' + submenu + '/' + controller + '/delete_analisa',
                            		success: function(result){
                            			var msg = $.trim(result);
                            			if (msg == 'OK') {
                                            processgetData();
                                            //show_summary_no_loading();
                            			}
                            		}
                                  }); 
                            }

                        }
                    }
                },
                {
                    caption: "Batal",
                    cls: "js-dialog-close",
                    onclick: function(){
                    }
                }
            ]
        });

    }

</script>
