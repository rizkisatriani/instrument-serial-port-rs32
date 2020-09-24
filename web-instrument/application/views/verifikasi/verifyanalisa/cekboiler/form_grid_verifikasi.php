<?php

$table = "";
$targetfeed = "";
$targetwater = "";

foreach($parameter as $val){
    
    $nama_parameter = $val->nama_parameter;
    $satuan = $val->satuan;
    $id_parameter = $val->id_parameter;
   // var_dump($parameter);
    switch($id_parameter){ 
        case 'P003': $targetfeed = "7,0 - 9,0"; $targetwater = "10,5 - 11,0"; break;  
        case 'P028': $targetfeed = "< 10"; $targetwater = "< 3.500"; break; 
        case 'P029': $targetfeed = "<20"; $targetwater = "< 50"; break; 
        case 'P030': $targetfeed = "-"; $targetwater = "-"; break; 
        case 'P031': $targetfeed = "0"; $targetwater = "0"; break; 
        case 'P032': $targetfeed = "< 20"; $targetwater = "< 700"; break; 
        case 'P033': $targetfeed = "-"; $targetwater = "-"; break; 
        case 'P034': $targetfeed = "-"; $targetwater = "<150"; break; 
        case 'P035': $targetfeed = "< 0,1"; $targetwater = "< 150"; break; 
        case 'P036': $targetfeed = "-"; $targetwater = "30-70"; break; 
        case 'P037': $targetfeed = "-"; $targetwater = "20-50"; break; 
        case 'P038': $targetfeed = "-"; $targetwater = "<70"; break; 
        case 'P039': $targetfeed = "< 0,1"; $targetwater = "-"; break; 
        default: $targetfeed = ""; $targetwater = ""; break;
    }
    
    
    $M045='';
    $M156='';
    $M046='';
    $M047='';
    $M048='';
    $M049='';
    $M050=''; 
    $M045_id='';
    $M156_id='';
    $M046_id='';
    $M047_id='';
    $M048_id='';
    $M049_id='';
    $M050_id=''; 
//var_dump($analisa);
//print_r($analisa);
    foreach($analisa as $val_analisa){
        
        $parameter_analisa = $val_analisa->id_parameter;
            
        if($id_parameter == $parameter_analisa){
            
            switch($val_analisa->id_material){ 
                case 'M045':
                    $M045_id = $val_analisa->id;
                    $M045 = $val_analisa->hasil;
                break;
                case 'M045A':
                    $M156_id = $val_analisa->id;
                    $M156 = $val_analisa->hasil;
                break;
                case 'M046':
                    $M046_id = $val_analisa->id;
                    $M046 = $val_analisa->hasil;
                break;
                case 'M047':
                    $M047_id = $val_analisa->id;
                    $M047 = $val_analisa->hasil;
                break;
                case 'M048':
                    $M048_id = $val_analisa->id;
                    $M048 = $val_analisa->hasil;
                break;
                case 'M049':
                    $M049_id = $val_analisa->id;
                    $M049 = $val_analisa->hasil;
                break;
                case 'M050':
                    $M050_id = $val_analisa->id;
                    $M050 = $val_analisa->hasil;
                break;
            }    
                
        }
    }
      
    $table .= "<tr>
                    <td>$nama_parameter</td>
                    <td>$satuan</td>
                    <td style='text-align:center;' class='fg-emerald'>$targetfeed</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M045_id','$M045','Boiler Feed Water','Nama Material','$nama_parameter')\">$M045</a></td>  
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M156_id','$M156','Boiler Feed Water 4','$nama_parameter')\">$M156</a></td>  
                    <td style='text-align:center;' class='fg-emerald'>$targetwater</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M046_id','$M046','Boiler Water 1','$nama_parameter')\">$M046</a></td>   
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M047_id','$M047','Boiler Water 2','$nama_parameter')\">$M047</a></td>   
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M048_id','$M048','Boiler Water 3','$nama_parameter')\">$M048</a></td>   
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M049_id','$M049','Boiler Water 4','$nama_parameter')\">$M049</a></td>   
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M050_id','$M050','Boiler Water 5','$nama_parameter')\">$M050</a></td>   
                 </tr>";
}


?>

<table class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='10%' style='text-align:center; vertical-align: middle;' >Parameter</th>
            <th width='5%' style='text-align:center;vertical-align: middle;'>Satuan</th>
            <th width='5%' style='text-align:center;vertical-align: middle;'>Standard Limits Boiler Feed Water</th>
    		<th width='5%' style='text-align:center;vertical-align: middle;'>Boiler Feed Water</th>
            <th width='5%' style='text-align:center;vertical-align: middle;'>Boiler Feed Water 4</th>
            <th width='5%' style='text-align:center;vertical-align: middle;'>Standard Limits Boiler Water</th>
    		<th width='5%' style='text-align:center;vertical-align: middle;'>Boiler Water 1</th> 
            <th width='5%' style='text-align:center;vertical-align: middle;'>Boiler Water 2</th> 
            <th width='5%' style='text-align:center;vertical-align: middle;'>Boiler Water 3</th> 
            <th width='5%' style='text-align:center;vertical-align: middle;'>Boiler Water 4</th> 
            <th width='5%' style='text-align:center;vertical-align: middle;'>Boiler Water 5</th> 
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