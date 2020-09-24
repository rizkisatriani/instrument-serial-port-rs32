<?php
 
    $table = "";   
     foreach($material as $val){
        $id_jam = $val->id_jam;   
        $jam = $val->desc;
        $M140_id=""; 
        $M140="";
        $M141_id=""; 
        $M141="";
        $M142_id=""; 
        $M142="";
        $M143_id=""; 
        $M143="";
        $M176_id=""; 
        $M176="";
        $M145_id=""; 
        $M145=""; 
        foreach($analisa as $val_analisa){
            $jam_analisa = $val_analisa->id_jam;   
            if($id_jam == $jam_analisa){  
                switch($val_analisa->id_material){
                    case 'M140':
                        $M140_id = $val_analisa->id;
                        $M140 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2); 
                    break;
                    case 'M141':
                        $M141_id = $val_analisa->id;
                        $M141 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'M142':
                        $M142_id = $val_analisa->id;
                        $M142= $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'M143':
                        $M143_id = $val_analisa->id;
                        $M143 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break; 
                    case 'M176':
                        $M176_id = $val_analisa->id;
                        $M176 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2); 
                    break;
                    case 'M145':
                        $M145_id = $val_analisa->id;
                        $M145 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break; 
                }  
                 
            }  
        }
 
           $table .= "<tr>
                    <td style='text-align:center;'>$jam</td> 
                    <td style='text-align:center;'>$M176</td>
                    <td style='text-align:center;'>$M140</td>
                    <td style='text-align:center;'>$M141</td>
                    <td style='text-align:center;'>$M142</td>
                    <td style='text-align:center;'>$M143</td>
                    <td style='text-align:center;'>$M145</td> 
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
                        <div class="w-100 mb-2 mb-0-lg" >
                          <input type="text" data-role="input" data-prepend="Tanggal" value="<?=$header['tanggal']?>" readonly>
                        </div>
                       <!--  <div class="ml-2 w-50 mr-2 my-rows-wrapper">
                          <input type="text" data-role="input" data-prepend="Jam Analisa" value="<?=$header['id_jam']?>" readonly>
                        </div> -->
                    </div>
                  </div>
                  <div class="cell p-1" id='gridedit'> 
                    <div class="row border-top bd-gray">
<table class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='15%' rowspan='2' style='text-align:center;' >Jam</th>
            <th width='5%' style='text-align:center;' >Curing</th>
            <th width='10%' style='text-align:center;'>Tank A</th> 
            <th width='10%' style='text-align:center;'>Tank B</th> 
            <th width='10%' style='text-align:center;'>Tank C</th> 
            <th width='10%' style='text-align:center;'>Tank D</th>
            <th width='10%' style='text-align:center;'>Tank Factory</th>  
        </tr>
        <tr class="bg-orange" > 
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th>
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th> 
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