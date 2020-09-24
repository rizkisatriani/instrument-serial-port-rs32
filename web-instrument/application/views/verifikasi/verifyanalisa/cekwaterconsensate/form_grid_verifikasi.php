<?php

    //print_r($chek);
    //print_r($var['jam']);
    $table = "";
    $table2 = "";
    $target ="";
    $no=0;
    foreach($material as $val){
        $nama_material = $val->name;
        $id_material = $val->id_material;
        
        switch($val->id_material){ 
            case 'M065': $target = "<50"; break;
            case 'M066': $target = "<50"; break;
            case 'M092': $target = "<150"; break;
            case 'M093': $target = "<150"; break;
            case 'M094': $target = "<150"; break;
            case 'M089': $target = "<150"; break;
            case 'M090': $target = "<150"; break;
            case 'M091': $target = "<150"; break;
            default: $target = "<10"; break;
        }
        
        $P003_id=""; 
        $P003="";
        $P040_id=""; 
        $P040="";
        $P027_id=""; 
        $P027="";
        $P029_id=""; 
        $P029="";


        foreach($analisa as $val_analisa){
            $material_analisa = $val_analisa->id_material; 

            if($id_material == $material_analisa){
                
                switch($val_analisa->id_parameter){
                    case 'P003':
                        $P003_id = $val_analisa->id;
                        $P003 = $val_analisa->hasil;
                    break;
                    
                    case 'P040':
                        $P040_id = $val_analisa->id;
                        $P040 = $val_analisa->hasil;
                    break;
                    
                    case 'P027':
                        $P027_id = $val_analisa->id;
                        $P027 = $val_analisa->hasil;
                    break;
                    case 'P029':
                        $P029_id = $val_analisa->id;
                        $P029 = $val_analisa->hasil;
                    break;
                     
                }  
            }
        }
        
       if ($no<23) {
           $table .= "<tr>
                    <td>$nama_material</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P003_id','$P003','$nama_material','Ph')\">$P003</a></td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P029_id','$P029','$nama_material','Debit')\">$P029</a></td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P027_id','$P027','$nama_material','Temp')\">$P027</a></td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P040_id','$P040','$nama_material','Sugar (ppm)')\">$P040</a></td>
                    <td style='text-align:center;' class='fg-emerald'>$target </td>
                 </tr>";
         }   else{
             $table2 .= "<tr>
                    <td>$nama_material</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P003_id','$P003','$nama_material','Ph')\">$P003</a></td>

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P029_id','$P029','$nama_material','Sugar (ppm)')\">$P029</a></td> 
                    <td style='text-align:center;' class='fg-emerald'>$target</td>
                 </tr>";
             } 
             $no++;
       
    }
?>
<div class="row">
<table style="width: 59%!important;"class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='15%' style='text-align:center;' >Material</th>
            <th width='5%' style='text-align:center;' >Ph</th>
            <th width='10%' style='text-align:center;'>Sugar (ppm)</th>
            <th width='10%' style='text-align:center;'>Temp</th>
    		<th width='10%' style='text-align:center;'>Debit (m3/d)</th>
    		<th width='10%' style='text-align:center;'>Target</th> 
        </tr>
    </thead>
    <tbody>
        <?=$table?>
    </tbody>
</table>
<table style="width: 39%!important; margin-left: 2%!important;"class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='15%' style='text-align:center;' >Material</th>
            <th width='5%' style='text-align:center;' >Ph</th>
            <th width='10%' style='text-align:center;'>Sugar (ppm)</th> 
            <th width='10%' style='text-align:center;'>Target</th> 
        </tr>
    </thead>
    <tbody>
        <?=$table2?>
    </tbody>
</table>
</div>
<div class="row border-top bd-gray">
    <div class="cell-sm-full cell-md-one-third cell-lg-3"></div>
    <div class="cell-sm-full cell-md-two-third cell-lg-3"><button class="button primary" onclick="simpanVerifikasi('<?=$tgl?>','<?=$jam?>')"><span class="mif-done_all"></span> Simpan</button></div>
    <div class="cell-sm-full cell-md-half cell-lg-3"><button class="button alert" onclick="batalVerifikasi('<?=$tgl?>','<?=$jam?>')"><span class="mif-cross"></span> Batal</button></div>
    <div class="cell-sm-full cell-md-half cell-lg-3"></div>
</div>
