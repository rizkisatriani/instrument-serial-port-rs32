<?php
 
    $bxCJ=0;
    $bxCJ_TEMP=0; 
    $P101_TEMP="";
    $evap=0;
    $tran_CaO=0;
    $Cao_temp=0;
    $bx_temp = 0;
    $table = "";
    $table2 = "";
    $target =""; $EXHAUST_STEAM='<table style="width: 25%!important;" class="table striped table-border cell-border row-border cell-hover subcompact">'; 

        $P101_VAPO="";
        $P001_AVG=""; 
        $P003_AVG=""; 
        $P012_AVG=""; 
        $P027_AVG=""; 
        $P101_AVG="";
    foreach($material as $val){
        $nama_material = $val->name;
        $id_material = $val->id_material;  
        
        $P001_id=""; 
        $P001="";
        $P003_id=""; 
        $P003="";
        $P012_id=""; 
        $P012="";
        $P027_id=""; 
        $P027="";
        $P101_id=""; 
        $P101="";
        $P027_EXHA_id=""; 
        $P027_EXHA="";
        $P101_EXHA_id=""; 
        $P101_EXHA="";
        $P027_VAPO_id=""; 
        $P027_VAPO="";
        $P101_VAPO_id=""; 
 
        foreach($analisa as $val_analisa){
            $material_analisa = $val_analisa->id_material;  
            if($id_material == $material_analisa){
                
                switch($val_analisa->id_parameter){
                    case 'P001':
                        $P001_id = $val_analisa->id;
                        $P001 = $val_analisa->hasil; 
                        $P001_AVG =$P001_AVG+ $val_analisa->hasil; 
                    break;
                    case 'P003':
                        $P003_id = $val_analisa->id;
                        $P003 = $val_analisa->hasil;
                        $P003_AVG =$P003_AVG+ $val_analisa->hasil; 
                    break;
                    case 'P012':
                        $P012_id = $val_analisa->id;
                        $P012= $val_analisa->hasil;
                        $P012_AVG =$P012_AVG+ $val_analisa->hasil; 
                    break;
                    case 'P027':
                        switch($id_material){
                            case 'M177':
                                $P027_VAPO_id=$val_analisa->id;
                                $P027_VAPO=$val_analisa->hasil; 
                            break;
                            case 'M178':
                                $P027_EXHA_id=$val_analisa->id; 
                                $P027_EXHA=$val_analisa->hasil; 
                            break;
                        }
                        $P027_id = $val_analisa->id;
                        $P027 = $val_analisa->hasil;
                        $P027_AVG =$P027_AVG+ $val_analisa->hasil; 
                    break; 
                    case 'P101':
                        switch($id_material){
                            case 'M177':
                                $P101_VAPO_id=$val_analisa->id;
                                $P101_VAPO=$val_analisa->hasil;
                            break;
                            case 'M178':
                                $P101_EXHA_id=$val_analisa->id; 
                                $P101_EXHA=$val_analisa->hasil;
                            break;
                    }
                        $P101_id = $val_analisa->id;
                        $P101 = $val_analisa->hasil;
                        $P101_AVG =$P101_AVG+ $val_analisa->hasil; 
                    break; 
                }  
                 
            }  
        }

        switch ($id_material) { 
            case 'M006': //Clear Juice 
                    $bxCJ=$P001;
                    $bxCJ_TEMP=$P001;
                    $evap='';  
                    $tran_CaO='';  
                    $Cao_temp =  $P012;
                    $bx_temp = $P001;
                break;
                case 'M099': //Evaporator Juice #1ABCDE 
                    if($P001!=0||$P001!=""){
                        $evap=fix_rounding(100-($bxCJ/$P001*100),2);
                        //$tran_CaO=fix_rounding($P012/1*1/$P001,2);
                        $tran_CaO = fix_rounding( $P012 / $Cao_temp * $bx_temp / $P001 * 100 ,0);    
                    }
                    $bxCJ=$P001;  
                    $Cao_temp = $P012;
                    $bx_temp = $P001; 
                   
                break;
                case 'M104': //Evaporator Juice #2ABCD
                    if($P001!=0||$P001!=""){
                        $evap=fix_rounding(100-($bxCJ/$P001*100),2);
                        //$tran_CaO=fix_rounding($P012/1*1/$P001,2); 
                        $tran_CaO = fix_rounding( $P012 / $Cao_temp * $bx_temp / $P001 * 100 ,0);  
                    }
                    $bxCJ=$P001; 
                    $Cao_temp = $P012;
                    $bx_temp = $P001;   
                break;
                case 'M107': //Evaporator Juice #3AB
                    if($P001!=0||$P001!=""){
                        $evap=fix_rounding(100-($bxCJ/$P001*100),2);
                        //$tran_CaO=fix_rounding($P012/1*1/$P001,2);  
                        $tran_CaO = fix_rounding( $P012 / $Cao_temp * $bx_temp / $P001 * 100 ,0);
                    }
                    $bxCJ=$P001;
                    $Cao_temp = $P012;
                    $bx_temp = $P001;  
                break;
                case 'M108': //Evaporator Juice #4
                    if($P001!=0||$P001!=""){
                        $evap=fix_rounding(100-($bxCJ/$P001*100),2);
                        //$tran_CaO=fix_rounding($P012/1*1/$P001,2);
                        $tran_CaO = fix_rounding( $P012 / $Cao_temp * $bx_temp / $P001 * 100 ,0);  
                    }
                    $bxCJ=$P001; 
                    $Cao_temp = $P012;
                    $bx_temp = $P001;  
                break;
                case 'M109': //Evaporator Juice #5
                    if($P001!=0||$P001!=""){
                        $P101_TEMP=$P001; 
                        $evap=fix_rounding(100-($bxCJ/$P001*100),2);
                        //$tran_CaO=fix_rounding($P012/1*1/$P001,2);
                        $tran_CaO = fix_rounding( $P012 / $Cao_temp * $bx_temp / $P001 * 100 ,0);  
                    }
                    $bxCJ=$P001;
                    $Cao_temp = $P012;
                    $bx_temp = $P001;    
                break;
                case 'M177': //Vapour Steam 
                    $EXHAUST_STEAM.='<tr><th colspan="2" class="bg-orange" colspan="2" style="text-align:center; vertical-align: middle;">VAPOUR STEAM</th></tr>';
                    $EXHAUST_STEAM.="<tr><td style='text-align:center;'>Press</td><td style='text-align:center;'>$P027_VAPO</td></tr> <tr><td style='text-align:center;'>Temp</td><td style='text-align:center;'>$P101_VAPO</td></tr>";   
                break;
                case 'M178': //Exhausted Steam
                    $EXHAUST_STEAM.='<tr><th colspan="2" class="bg-orange" colspan="2" style="text-align:center; vertical-align: middle;">EXHAUST STEAM</th></tr>';
                    $EXHAUST_STEAM.="<tr><td style='text-align:center;'>Temp</td><td style='text-align:center;'>$P027_EXHA</td></tr>";
                    $EXHAUST_STEAM.="<tr><td style='text-align:center;'>Press</td><td style='text-align:center;'>$P101_EXHA</td></tr>";  
                break; 
                default:
                    if($P001!=0||$P001!=""){
                        $evap=fix_rounding(100-($bxCJ/$P001*100),2);
                        //$tran_CaO=fix_rounding($P012/1*1/$P001,2); 
                        $tran_CaO = fix_rounding( $P012 / $Cao_temp * $bx_temp / $P001 * 100 ,0);
                        // $tran_CaO = ;
                         
                         //$Cao_temp = $P012;
                         //$bx_temp = $P001;
                         
                    } else{ 
                        $evap='';
                        $tran_CaO=''; 
                    } 
                break;
        }
        
            if($id_material!='M177' && $id_material!='M178'){
                $table .= "<tr>
                    <td>$nama_material </td>
                    <td style='text-align:center;'><a class='button-custom' >$P001</a></td>

                    <td style='text-align:center;'><a class='button-custom' >$P003</a></td>

                    <td style='text-align:center;'><a class='button-custom' >$P027</a></td>

                    <td style='text-align:center;'><a class='button-custom' >$P101</a></td> 

                    <td style='text-align:center;'><a class='button-custom' >$P012</a></td>
                    <td style='text-align:center;color:red;'>$evap</td>
                    <td style='text-align:center;color:red;' >$tran_CaO</td> 
                 </tr>"; 
             }
            }

                if($P101_TEMP!=0||$P101_TEMP!=""){
                    //$evap=fix_rounding(($P101_TEMP/$bxCJ_TEMP*100)-100,2);
                    $evap = fix_rounding( 100 -($bxCJ_TEMP / $P101_TEMP * 100) , 2);
                //$evap=$P101_TEMP;
                    $tran_CaO=fix_rounding($P012/1*1/$P101_TEMP,2);  
                } else{ 
                    $evap='';
                    $tran_CaO=''; 
                }
       $table .= "<tr>
                    <td>TOTAL</a>
                    <td style='text-align:center;color:red;'></a>

                    <td style='text-align:center;color:red;'></a>

                    <td style='text-align:center;color:red;'></a>

                    <td style='text-align:center;color:red;'></a> 

                    <td style='text-align:center;color:red;'></a>
                    <td style='text-align:center;color:red;'>$evap </a>
                    <td style='text-align:center;color:red;' > </a> 
                 </tr>"; 
     $EXHAUST_STEAM.="</table>"; 
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
<table style="width: 70%!important;"  class="table  striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='25%' rowspan="2" style='text-align:center; vertical-align: middle;' >Material</th>
            <th width='5%' colspan="6" style='text-align:center;' >Data Analisa</th> 
            <th width='15%' rowspan="2"style='text-align:center; vertical-align: middle;'>% Trans CaO</th> 
        </tr>
        <tr class="bg-orange" > 
            <th width='5%' style='text-align:center;' >Brix</th>
            <th width='5%' style='text-align:center;'>pH</th>
            <th width='5%' style='text-align:center;'>Temp</th>
        <th width='5%' style='text-align:center;'>Press</th>
        <th width='5%' style='text-align:center;'>CaO</th> 
            <th width='5%' style='text-align:center;'>% Evap.</th> 

        </tr>
    </thead>
    <tbody>
        <?=$table?> 
    </tbody>
</table>   
        <?php echo $EXHAUST_STEAM ; ?> 
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