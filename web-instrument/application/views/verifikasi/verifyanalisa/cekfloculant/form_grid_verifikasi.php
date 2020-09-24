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
   
        $P025_id=""; 
        $P025="";
        $P027_id=""; 
        $P027="";
        $P087_id=""; 
        $P087="";
        $P088_id=""; 
        $P088="";
        $P076_id=""; 
        $P076="";
        $P012_id=""; 
        $P012="";


        foreach($analisa as $val_analisa){
            $material_analisa = $val_analisa->id_material; 

            if($id_material == $material_analisa){
                
                switch($val_analisa->id_parameter){
                    case 'P025':
                        $P025_id = $val_analisa->id;
                        $P025 = $val_analisa->hasil;
                    break;
                    case 'P027':
                        $P027_id = $val_analisa->id;
                        $P027 = $val_analisa->hasil;
                    break;
                    case 'P087':
                        $P087_id = $val_analisa->id;
                        $P087 = $val_analisa->hasil;
                    break;
                    case 'P088':
                        $P088_id = $val_analisa->id;
                        $P088 = $val_analisa->hasil;
                    break;
                    case 'P076':
                        $P076_id = $val_analisa->id;
                        $P076= $val_analisa->hasil;
                    break;
                    case 'P012':
                        $P012_id = $val_analisa->id;
                        $P012= $val_analisa->hasil;
                    break;
                     
                }  
            }
        }
         
           $table .= "<tr>
                    <td>$nama_material</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P025_id','$P025','$nama_material','Viscocity')\">$P025</a></td>

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P027_id','$P027','$nama_material','Temp')\">$P027</a></td>

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P087_id','$P087','$nama_material','WR')\">$P087</a></td>

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P088_id','$P088','$nama_material','OV')\">$P088</a></td> 
 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P076_id','$P076','$nama_material','Beume')\">$P076</a></td> 

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P012_id','$P012','$nama_material','CaO')\">$P012</a></td> 
                 </tr>";
            
       
    }
?> 
<table class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='15%' style='text-align:center;' >Material</th>
            <th width='5%' style='text-align:center;' >Viscocity</th>
            <th width='10%' style='text-align:center;'>Temp</th>
            <th width='10%' style='text-align:center;'>WR</th>
    		<th width='10%' style='text-align:center;'>OV</th>
    		<th width='10%' style='text-align:center;'>Beume</th> 
            <th width='10%' style='text-align:center;'>CaO</th> 
        </tr>
    </thead>
    <tbody>
        <?=$table?>
    </tbody>
</table> 
<div class="row border-top bd-gray">
    <div class="cell-sm-full cell-md-one-third cell-lg-3"></div>
    <div class="cell-sm-full cell-md-two-third cell-lg-3"><button class="button primary" onclick="simpanVerifikasi('<?=$tgl?>','<?=$jam?>')"><span class="mif-done_all"></span> Simpan</button></div>
    <div class="cell-sm-full cell-md-half cell-lg-3"><button class="button alert" onclick="batalVerifikasi('<?=$tgl?>','<?=$jam?>')"><span class="mif-cross"></span> Batal</button></div>
    <div class="cell-sm-full cell-md-half cell-lg-3"></div>
</div>
