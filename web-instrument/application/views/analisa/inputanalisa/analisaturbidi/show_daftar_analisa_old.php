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
    //$status = $val->status;
    $material = $val->materialname;
    $createby = $val->createby;
    $parameter = $val->nama_parameter;
    $status = staus_data($val->is_data);

    $BODY .= "<tr >
                <td><button class='button link' title='View detil' onclick='javascript:detilanalisa(\"$id\")'>$nomor</button></td>
                <td>$tanggal</td>
                <td>$createby</td>
                <td>$jam</td>
                <td>$parameter</td>
                <td>$material</td>
                <td>$nilai</td>
                <td>$status</td>
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
      <button class="button success drop-shadow"  onclick="javascript:createanalisa()" title='Tambah Analisa?' > <span class="mif-plus"></span> Tambah <?=$module_title?></button>
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
            data-rownum = 'true'
            data-rownum-title = 'No'
         >
         <thead>
    		<tr>
          <th class="w-10">NOMOR</th>
          <th class="w-10" data-cls-column="text-center" >TANGGAL</th>
          <th class="w-10">CREATE BY</th>
					<th class='w-10'>JAM</th>
          <th class='w-25'>PARAMETER</th>
					<th class='w-25'>MATERIAL</th>
          <th width='10%'>NILAI</th>
					<th width='5%'>STATUS</th>
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



});

</script>
