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
        if($P001!=0 && $P002!=0){
        $pty=round($P001/$P002*100,2);
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
                    <td style='text-align:center;'>$pty</td> 
                 </tr>";
             }
         
?> 
<div class="panel mt-4">
  <div class="row">
      <div class="cell"> <!--<div class="cell-md-6">!-->
          <div class="panel" id="analisaph1">
              <div data-role="panel" data-title-caption="ANALISA PH" data-collapsible="true"
                  data-title-icon="<span class='mif-lab'></span>" class="panel-content" data-role-panel="true">
                  <div class="cell p-1 border-bottom bd-gray">
                    <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
                        <div class="w-50 mb-2 mb-0-lg" >
                          <input type="text" data-role="input" data-prepend="Tanggal" value="<?=$header['tanggal']?>" readonly>
                        </div>
                        <div class="ml-2 w-50 mr-2 my-rows-wrapper">
                          <input type="text" data-role="input" data-prepend="Jam Analisa" value="<?=$header['id_jam']?>" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="cell p-1" id='gridedit'> 
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
 </div>                 
              </div>
              <div class="panel-title">
                  <span class="caption"><?=$module_title?> : <b><?=$header['nomor']?></b></span>
                  <span class="mif-lamp fg-green icon"></span>
                  <span class="dropdown-toggle marker-center active-toggle"></span>
              </div>
          </div>
      </div>
  </div>
</div>