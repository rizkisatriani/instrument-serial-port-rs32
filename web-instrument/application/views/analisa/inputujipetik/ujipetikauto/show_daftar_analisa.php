<?php
//print_r($this->db->last_query());

  $BODY = "";
  $n = 1;
  foreach ($analisa as $val) {
    $id = $val->id;
    //$nomor = $val->nomor;
    $nilai = $val->nilai_uji;
    $tanggal = formattanggalindo($val->tanggal);
    $wkt_analisa = $val->wkt_input;
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

    $BODY .= "<tr >
                <td>$wkt_analisa</td>
                <td>$nilai</td>
                <td>$machine</td>
                <td>$color</td>
              </tr >";

    $n++;

  }

 ?>
    <!--<div data-role="panel">-->
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
    <!--</div>-->
<script>
$(document).ready(function(){



});

</script>
