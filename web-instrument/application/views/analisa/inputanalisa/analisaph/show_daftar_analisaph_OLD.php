<?php

  //print_r($this->db->last_query());

  $BODY = "";
  $n = 1;
  foreach ($analisa as $val) {
    $id = $val->id;
    $nomor = $val->nomor;
    $nilai = $val->nilai_a;
    $tanggal = formattanggalindo($val->tanggal);
    $jam = $val->jam;
    $status = $val->status;
    $material = $val->materialname;
    $pendingby = $val->pending_user;
    $createby = $val->createby;
    $BODY .= "<tr >
                <td class='d-none'>$id</td>
                <td><button class='button link' title='View detil' onclick='javascript:detilanalisa(\"$id\")'>$nomor</button></td>
                <td>$tanggal</td>
                <td>$createby</td>
                <td>$jam</td>
                <td>$material</td>
                <td>$nilai</td>
                <td>$status</td>
                <td>$pendingby</td>
              </tr >";

    $n++;

  }

 ?>
<div class="panel mt-4">
    <div data-role="panel">
    <div class="p-1">
      <?php
        if ($is_create){
      ?>
      <button class="button success drop-shadow"  onclick="javascript:createanalisa()" title='Tambah Analisa PH?' > <span class="mif-plus"></span> Tambah Analisa PH</button>
      <?php }?>
    </div>
    <div class="p-1">
        <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
            <div class="w-100 mb-2 mb-0-lg" id="t1_search"></div>
            <div class="ml-2 mr-2 my-rows-wrapper" id="t1_rows"></div>
            <div class="" id="t1_actions">
                <!--<button class="button square" onclick="$('#t1').data('table').toggleInspector()"><span class="mif-cog"></span></button>-->
                <button class="button alert" onclick="$('#t1').data('table').export('CSV')"><span class="mif-file-excel"></span> Export</button>
            </div>
        </div>

         <table id="t1" class="table table-border cell-border row-border row-hover "
            data-role="table"
            data-show-activity="false"
            data-search-wrapper="#t1_search"
            data-rows-wrapper="#t1_rows"
            data-view-save-mode="client"
            data-view-save-path="TABLE:$1:KEYS"
            data-check="true"
            data-check-type='radio'
            data-check-style="1"
            data-check-name="select_workflow"
            data-on-check-click="select_workflow"
            data-check-col-index = "0"
         >
         <thead>
    		<tr>
          <th class='d-none' data-show="false"></th>
          <th class="w-10">NOMOR</th>
          <th class="w-10" data-cls-column="text-center" >TANGGAL</th>
          <th class="w-10">Create By</th>
					<th class='w-10'>JAM</th>
					<th class='w-25'>MATERIAL</th>
          <th width='10%'>NILAI</th>
					<th width='5%'>STATUS</th>
					<th width='5%'>PENDING</th>
    		</tr>
    	</thead>
      <tbody>
        <?=$BODY?>
    	</tbody>
        </table>
    </div>
    </div>
</div>
<script>
$(document).ready(function(){

  get_workflow_processor();

});

</script>
