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
                    <td style='text-align:center;'> $P025</td>

                    <td style='text-align:center;'> $P027</td>

                    <td style='text-align:center;'> $P087</td>

                    <td style='text-align:center;'> $P088</td> 
 
                    <td style='text-align:center;'> $P076</td> 

                    <td style='text-align:center;'> $P012</td>
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
                    <div class="row border-top bd-gray">
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