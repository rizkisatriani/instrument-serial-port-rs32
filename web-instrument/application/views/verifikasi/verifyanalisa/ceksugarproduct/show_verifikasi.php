
<?php
//print_r($this->db->last_query());
    $bidang_kerja = $this->session->userdata('bidang_kerja'); //Administrator 
  $BODY = "";
  $n = 1;
  foreach ($analisa as $val) {
    $id = $val->id;
    $nomor = $val->nomor;
    $tanggal = formattanggalindo($val->tanggal);
    $jam = $val->id_jam;
    echo $jam;
    switch($jam)
    {
        case "25":
            $sh = "Shift I";
        break;
        case "26":
            $sh = "Shift II";
        break;
        case "27":
            $sh = "Shift III";
        break;
    }
    //$status = $val->status;
    $createby = $val->createby;
    
    //$delete = "<button class='button small link' title='View detil' onclick='javascript:detilanalisa(\"$id\")'></button>";
    if ($bidang_kerja == "Administrator" or $bidang_kerja == "Staff"){
        $delete = "<span class='button mini bg-white mif-bin fg-red' onclick='javascript:deleteverivikasi(\"$id\")'>";
    }else{
        $delete = "";
    }
  
    $BODY .= "<tr >
                <td>$n</td>
                <td><button class='button small link' title='View detil' onclick='javascript:detilanalisa(\"$id\")'>$nomor</button></td>
                <td>$tanggal</td>
                <td>$sh</td>
                <td>$createby</td>
                <td>$delete</td>
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
		<tr>
            <th class="w-5 bg-amber fg-white text-center" data-cls-column="text-center"  >No</th>
            <th class="w-20 bg-amber fg-white" >NOMOR</th>
            <th class="w-10 bg-amber fg-white text-center" data-cls-column="text-center" >TANGGAL</th>
            <th class='w-20 bg-amber fg-white'>JAM</th>
            <th class='w-20 bg-amber fg-white'>USER</th>
            <th class='w-10 bg-amber fg-white' data-cls-column="text-center" ></th>
		</tr>
	</thead>
    <tbody>
        <?=$BODY?>
	</tbody>
</table>
<script>
document.getElementById("t1_search").innerHTML ="";

function deleteverivikasi(id){
    
    URL =  baseURL + '/site/delete_verifikasi'
    
    YeNo = confirm("Apakah Anda Yakin untuk Delete data! ");
    
    if (YeNo == true){
        
        $.post( URL , { id: id },
          function(result){
            var msg = $.trim(result);
				if (msg == 'OK') {
				    custom_alert_notif("Data Berhasil di Hapus",title="Berhasil",action="success");
                    showdatatable();
				}
          });
        

    }
    
        
    
}
</script>