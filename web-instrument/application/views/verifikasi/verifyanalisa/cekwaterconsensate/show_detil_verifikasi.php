<?php

    $table = "";
    $table2 = "";
    $target ="";
    $no=0;
    
    //print_r($material);
    
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
                    <td style='text-align:center;'><a class='button-custom' >$P003</a></td>
                    <td style='text-align:center;'><a class='button-custom' >$P029</a></td> 
                    <td style='text-align:center;'><a class='button-custom' >$P027</a></td>
                    <td style='text-align:center;'><a class='button-custom' >$P040</a></td>
                    <td style='text-align:center;' class='fg-emerald'>$target </td>
                 </tr>";
         }   else{
             $table2 .= "<tr>
                    <td>$nama_material</td>
                    <td style='text-align:center;'><a class='button-custom' >$P003</a></td>

                    <td style='text-align:center;'><a class='button-custom' >$P029</a></td> 
                    <td style='text-align:center;' class='fg-emerald'>$target</td>
                 </tr>";
             } 
             $no++;
       
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