<?php

$table = "";
$targetBrix = "";
$targetPty = "";

foreach($material as $val){
    
    $nama_material = $val->name;
    $id_material = $val->id_material;
    
    switch($val->id_material){
        case 'M015': 
        case 'M016': $targetBrix = "94-95"; $targetPty = "71-73"; break;
        case 'M017': 
        case 'M018': $targetBrix = "96-97"; $targetPty = "57-58"; break;
        case 'M020': $targetBrix = "80-81"; $targetPty = "93-94"; break;
        case 'M021': $targetBrix = "90-91"; $targetPty = "91-92"; break;
        case 'M022': $targetBrix = "60-65"; $targetPty = "92-94"; break;
        case 'M023': $targetBrix = "91-92"; $targetPty = "74-75"; break;
        case 'M024': $targetBrix = "80-82"; $targetPty = "70-73"; break;
        case 'M025': $targetBrix = "78-79"; $targetPty = "83-84"; break;
        case 'M026': $targetBrix = "84-85"; $targetPty = "52-53"; break;
        case 'M027': $targetBrix = "80-82"; $targetPty = "56-58"; break;
        case 'M028': $targetBrix = "82-84"; $targetPty = "54-56"; break;
        case 'M029': $targetBrix = "87-89"; $targetPty = "32-33"; break;
        default: $targetBrix = ""; $targetPty = ""; break;
    }
    
    $P001_id="";$P002_id="";$P013_id="";
    $P001="";$P002="";$P013="";
    
    foreach($analisa as $val_analisa){
        
        $material_analisa = $val_analisa->id_material;
            
        if($id_material == $material_analisa){
            
            switch($val_analisa->id_parameter){
                
                case 'P001':
                    $P001_id = $val_analisa->id;
                    $P001 = $val_analisa->hasil;
                break;
                case 'P002':
                    $P002_id = $val_analisa->id;
                    $P002 = $val_analisa->hasil;
                break;
                case 'P013':
                    $P013_id = $val_analisa->id;
                    $P013 = $val_analisa->hasil;
                break;
            }
                
                
        }
    }
    
    if( $P001 !="" or $P001!= 0 ){
        $PTY = fix_rounding($P002 / $P001 * 100,2); 
    }else{
        $PTY = "";
    }
    
    
    $table .= "<tr>
                    <td>$nama_material</td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P001_id','$P001','$nama_material','Brix(%)')\">$P001</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P002_id','$P002','$nama_material','Pol(%)')\">$P002</a></td>
            		<td style='text-align:center;' class='fg-crimson'>$PTY</td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P013_id','$P013','$nama_material','RS(%Bx)')\">$P013</a></td>
            		<td style='text-align:center;' class='fg-emerald'>$targetBrix</td>
            		<td style='text-align:center;' class='fg-emerald'>$targetPty</td>
                 </tr>";
}


?>

<table class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='10%' style='text-align:center;' >Material</th>
            <th width='5%' style='text-align:center;'>Brix(%)</th>
            <th width='5%' style='text-align:center;'>Pol(%)</th>
    		<th width='5%' style='text-align:center;'>Pty(%)</th>
    		<th width='5%' style='text-align:center;'>Color (UI)</th>
            <th width='5%' style='text-align:center;'>Target Brix</th>
            <th width='5%' style='text-align:center;'>Targert Purity</th>
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