<?php
 
    $table = "";  
    $no=0; 
     foreach($material as $val){
        $nama_material = $val->name;
        $id_material = $val->id_material;  
        $P001= ""; 
        $P001_id= ""; 
        $P002= "" ; 
        $P002_id= "" ; 
        $P079= "" ; 
        $P079_id= "" ; 
        $P080= "" ; 
        $P080_id= "" ; 
        $P081= "" ; 
        $P081_id= "" ; 
        $P082= "" ; 
        $P082_id= "" ; 
        $P083= "" ;  
        $P083_id= "" ;   
    foreach($analisa as $val_analisa){
        $material_analisa = $val_analisa->id_material;  
            if($id_material == $material_analisa){
                switch($val_analisa->id_parameter){
                    case 'P001':
                        $P001_id = $val_analisa->id;
                        $P001 = $val_analisa->hasil== 0 ? '' :$val_analisa->hasil; 
                    break;
                    case 'P002':
                        $P002_id = $val_analisa->id;
                        $P002= $val_analisa->hasil== 0 ? '' :$val_analisa->hasil; 
                    break;
                    case 'P079':
                        $P079_id = $val_analisa->id;
                        $P079= $val_analisa->hasil== 0 ? '' :$val_analisa->hasil; 
                    break;
                    case 'P080':
                        $P080_id = $val_analisa->id;
                        $P080= $val_analisa->hasil== 0 ? '' :$val_analisa->hasil;  
                    break;
                    case 'P081':
                        $P081_id = $val_analisa->id;
                        $P081= $val_analisa->hasil== 0 ? '' :$val_analisa->hasil;  
                    break;
                    case 'P082':
                        $P082_id = $val_analisa->id;
                        $P082= $val_analisa->hasil== 0 ? '' :$val_analisa->hasil;  
                    break;
                    case 'P083':
                        $P083_id = $val_analisa->id;
                        $P083= $val_analisa->hasil== 0 ? '' :$val_analisa->hasil;    
                    break;
                     
                }  
                 
            }  
        $pty=''; 

        if($P001 !=0 && $P002 !=0){
            $pty = round(($P001/$P002)*100,2);
            echo $pty;
        } 
}
           $table .= "<tr>
                    <td>$nama_material</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P079_id','$P079','$nama_material','Press')\">$P079</a></td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P080_id','$P080','$nama_material','Press')\">$P080</a></td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P081_id','$P081','$nama_material','Press')\">$P081</a></td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P082_id','$P082','$nama_material','Press')\">$P082</a></td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P083_id','$P083','$nama_material','Press')\">$P083</a></td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P001_id','$P001','$nama_material','Press')\">$P001</a></td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P002_id','$P002','$nama_material','Press')\">$P002</a></td> 
                   
                 </tr>";
             }
         
?> 
<table  class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='20%' style='text-align:center;' >Material</th>
            <th width='10%' style='text-align:center;' >Time</th>
            <th width='10%' style='text-align:center;' >Strike</th>
            <th width='10%' style='text-align:center;'>Pan</th>
            <th width='10%' style='text-align:center;'>BT</th>
    		<th width='10%' style='text-align:center;'>Vol</th>
    		<th width='10%' style='text-align:center;'>Brix</th> 
            <th width='10%' style='text-align:center;'>Pol</th> 
            <th width='10%' style='text-align:center;'>pty</th> 
        </tr>
    </thead>
    <tbody>
        <?=$table?>
    </tbody>
</table>
  
<div class="row border-top bd-gray">
    <div class="cell-sm-full cell-md-one-third cell-lg-3"></div>
    <div class="cell-sm-full cell-md-two-third cell-lg-3"><button class="button primary" onclick="simpanVerifikasi('<?=$tgl?>','<?=$jam?>')"><span class="mif-done_all"></span> Simpan</button></div>
    <div class="cell-sm-full cell-md-half cell-lg-3"><button class="button alert" onclick="batalVerifikasi('<?=$tgl?>','<?=$jam?>')"><span class="mif-cross"></span>Batal</button></div>
    <div class="cell-sm-full cell-md-half cell-lg-3"></div>
</div>
