 <?php
//print_r($this->db->last_query());

  $BODY = "";
  $n = 1;
  $p2 = "";
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
    $input = $val->input;
    $param = $val->param;
    $arrinput = explode("|",$input);
    $arrparam = explode("|",$param);
    
    if (isset( $arrparam[1] )){
        $p2 = ", ".alias_parameter($arrparam[1]);
    }

    $BODY .= "<tr >
                <td>$n</td>
                <td><button class='button small link' title='View detil' onclick='javascript:detilanalisa(\"$id\")'>$nomor</button></td>
                <td>$tanggal</td>
                <td>$createby</td>
                <td>$jam</td>
                <td>$parameter $p2</td>
                <td>$material</td>
                <td>$arrinput[0]</td>
                 <td>$arrinput[1]</td>
                <td>$status</td>
              </tr >";

    $n++;
  }

 ?>
 
 <table id="t1" class="table compact table-border cell-border row-border row-hover "
    data-role="table"
    data-show-activity="false"
    data-show-search= "true"
    data-search-wrapper="#t1_search"
    data-show-rows-steps="false"
    data-rows="15"
    data-view-save-mode="client"
    data-view-save-path="TABLE:$1:KEYS"
    data-rownum = 'false'
    data-rownum-title = 'No'
 >
    <thead>
		<tr >
            <th class="bg-green fg-white" data-cls-column="text-center">No</th>
            <th class="w-10 bg-green fg-white">NOMOR</th>
            <th class="w-10 bg-green fg-white" data-cls-column="text-center" >TANGGAL</th>
            <th class="w-10 bg-green fg-white">CREATE BY</th>
            <th class='w-10 bg-green fg-white'>JAM</th>
            <th class='w-20 bg-green fg-white'>PARAMETER</th>
            <th class='w-20 bg-green fg-white'>MATERIAL</th>
            <th class="w-10 bg-green fg-white">PH</th>
            <th class="w-10 bg-green fg-white">CONDUCTY</th>
            <th class="bg-green fg-white" width='5%'>STATUS</th>
		</tr>
   </thead>
    <tbody>
        <?=$BODY?>
	</tbody>
</table>
<script>
document.getElementById("t1_search").innerHTML ="";
</script>