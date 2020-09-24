<?php

    //print_r($chek);
    //print_r($var['jam']);
    $table = "";
    $target ="";
    
    foreach($material as $val){
        $nama_material = $val->name;
        $id_material = $val->id_material;
        
        switch($val->id_material){
            case 'M006': 
            case 'M009': $target = "Turb < 120"; break;
            case 'M007': $target = "pol < 1.5"; break;
            case 'M008': $target = "brix > 58"; break;
            case 'M010': $target = "pH 5,4 - 5,6"; break;
            case 'M185': $target = "< 1.0"; break;
            default: $target = ""; break;
        }
        
        $P009_id="";$P010_id="";$P001_id="";$P002_id="";$P076_id="";$P003_id="";$P007_id="";$P008_id="";$P011_id="";$P012_id="";$P006_id="";$P005_id="";$P013_id="";$P077_id="";$P075_id="";
        $P009 ="";$P010="";$P001="";$P002="";$P076="";$P003="";$P007="";$P008="";$P011="";$P012="";$P006="";$P005="";$P013="";$P077="";$P075="";
        
        foreach($analisa as $val_analisa){
            $material_analisa = $val_analisa->id_material;
            
            if($id_material == $material_analisa){
                
                switch($val_analisa->id_parameter){
                    case 'P001': //brix
                        $P001_id = $val_analisa->id;
                        $P001 = $val_analisa->hasil;
                    break;
                    case 'P002': // pol
                        $P002_id = $val_analisa->id;
                        $P002 = $val_analisa->hasil;
                    break;
                    case 'P003':
                        $P003_id = $val_analisa->id;
                        $P003 = $val_analisa->hasil ==0 ? '' :fix_rounding($val_analisa->hasil,2);
                    break;
                    case 'P007A':
                        $P007_id = $val_analisa->id;
                        $P007 = $val_analisa->hasil;
                    break;
                    case 'P008':
                        $P008_id = $val_analisa->id;
                        $P008 = $val_analisa->hasil;
                    break;
                    case 'P011':
                        $P011_id = $val_analisa->id;
                        $P011 = $val_analisa->hasil;
                    break;
                    case 'P012':
                        $P012_id = $val_analisa->id;
                        $P012 = $val_analisa->hasil;
                    break;
                    case 'P006':
                        $P006_id = $val_analisa->id;
                        $P006 = $val_analisa->hasil;
                    break;
                    case 'P005':
                        $P005_id = $val_analisa->id;
                        $P005 = $val_analisa->hasil;
                    break;
                    case 'P013':
                        $P013_id = $val_analisa->id;
                        $P013 = $val_analisa->hasil;
                    break;
                    case 'P004':
                        $P077_id = $val_analisa->id;
                        $P077 = $val_analisa->hasil;
                    break;
                    case 'P075':
                        $P075_id = $val_analisa->id;
                        $P075 = $val_analisa->hasil;
                    break;
                    case 'P009':
                        $P009_id = $val_analisa->id;
                        $P009 = $val_analisa->hasil;
                    break;
                    case 'P010':
                        $P010_id = $val_analisa->id;
                        $P010 = $val_analisa->hasil;
                    break;
                    case 'P015':
                        $P076_id = $val_analisa->id;
                        $P076 = $val_analisa->hasil;
                    break;
                }

                
                if( $P001 !="" and $P001!= 0 ){
                    $PTY = fix_rounding( ( $P002 / $P001 * 100) ,2); 
                }else{
                    $PTY = "";
                }
                
                if ( $material_analisa != 'M002'){
                    $P075 = "";
                }
                
            }
        }
        
        
        $table .= "<tr>
                    <td>$nama_material</td>
                    <td class='fg-emerald' style='text-align:center;'>$target</td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P001_id','$P001','$nama_material','Brix(%)')\">$P001</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P002_id','$P002','$nama_material','Pol(%)')\">$P002</a></td>
            		<td style='text-align:center;' class='fg-crimson'>$PTY</td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P003_id','$P003','$nama_material','pH')\">$P003</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P007_id','$P007','$nama_material','RS(%Bx)')\">$P007</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P008_id','$P008','$nama_material','Moist(%)')\">$P008</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P011_id','$P011','$nama_material','Turb(NTU)')\">$P011</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P012_id','$P012','$nama_material','CaO(ppm)')\">$P012</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P006_id','$P006','$nama_material','P2O5bfr(ppm)')\">$P006</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P005_id','$P005','$nama_material','P2O5afr(ppm)')\">$P005</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P013_id','$P013','$nama_material','Colour(IU)')\">$P013</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P077_id','$P077','$nama_material','Solid(%)')\">$P077</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P075_id','$P075','$nama_material','Losses(%)')\">$P075</a></td>  
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P009_id','$P009','$nama_material','PI(%)')\">$P009</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P010_id','$P010','$nama_material','Fiber(%)')\">$P010</a></td>
            		<td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P076_id','$P076','$nama_material','Beume(Be)')\">$P076</a></td>
                 </tr>";
    }
?>
<table class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='10%' style='text-align:center;' >Material</th>
            <th width='6%' style='text-align:center;' >Target</th>
            <th width='5%' style='text-align:center;'>Brix(%)</th>
            <th width='5%' style='text-align:center;'>Pol(%)</th>
    		<th width='5%' style='text-align:center;'>Pty(%)</th>
    		<th width='5%' style='text-align:center;'>pH</th>
    		<th width='5%' style='text-align:center;'>RS(%Bx)</th>
    		<th width='5%' style='text-align:center;'>Moist(%)</th>
    		<th width='5%' style='text-align:center;'>Turb(NTU)</th>
    		<th width='5%' style='text-align:center;'>CaO(ppm)</th>
    		<th width='5%' style='text-align:center;'>P2O5bfr(ppm)</th>
    		<th width='5%' style='text-align:center;'>P2O5afr(ppm)</th>
    		<th width='5%' style='text-align:center;'>Colour(IU)</th>
    		<th width='5%' style='text-align:center;'>Solid(%)</th>
    		<th width='5%' style='text-align:center;'>Losses(%)</th>
    		<th width='5%' style='text-align:center;'>PI(%)</th>
    		<th width='5%' style='text-align:center;'>Fiber(%)</th>
    		<th width='5%' style='text-align:center;'>Beume(Be)</th>
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
