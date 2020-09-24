<?php
 
    $table = "";
    $table2 = "";
    $target ="";
    $no=0;
    
    $P001_0="";
    $P002_0="";
    $PTY_0="";
    $P096_0="";
    $P097_0="";
    $P098_0="";
    $P099_0="";
    $P100_0="";
    
    $P001_0_id = "";
    $P002_0_id = "";
    
    foreach($material as $val){
        $nama_material = $val->name;
        $alias         = $val->alias;
        $id_material = $val->id_material;
  
        $P001_id ='';
        $P001=''; 
        $P002_id ='';
        $P002=''; 
        $P025_id ='';
        $P025=''; 
        $P027_id ='';
        $P027='';
        $P092_id ='';
        $P092='';
        $P093_id ='';
        $P093='';
        $P094_id ='';
        $P094='';
        $P095_id ='';
        $P095='';
        $P096_id ='';
        $P096='';
        $P097_id ='';
        $P097='';
        $P098_id ='';
        $P098='';
        $P099_id ='';
        $P099='';
        $P100_id ='';
        $P100='';

        foreach($analisa as $val_analisa){
            $material_analisa = $val_analisa->id_material; 

            if($id_material == $material_analisa){
                
                switch($val_analisa->id_parameter){  
                    
                case 'P001': //brix
                    $P001_id = $val_analisa->id;
                    $P001= $val_analisa->hasil;
                break;
                case 'P002': //pol
                    $P002_id = $val_analisa->id;
                    $P002= $val_analisa->hasil;
                break;
                case 'P025': //Viscosity
                    $P025_id = $val_analisa->id;
                    $P025= $val_analisa->hasil;
                break;
                case 'P027': //Temperature
                    $P027_id = $val_analisa->id;
                    $P027= $val_analisa->hasil;
                break;
                case 'P092': //C-1 SUGAR Brix (salah)
                    $P092_id = $val_analisa->id;
                    $P092= $val_analisa->hasil;
                break;
                case 'P093': //C-1 SUGAR Pol (salah)
                    $P093_id = $val_analisa->id;
                    $P093= $val_analisa->hasil;
                break;
                case 'P094': //Final Molases Brix (salah)
                    $P094_id = $val_analisa->id;
                    $P094= $val_analisa->hasil;
                break;
                case 'P095': //Final Molases Pol (salah)
                    $P095_id = $val_analisa->id;
                    $P095= $val_analisa->hasil;
                break;
                case 'P027': //P096 Temp Fmol oC //ganti jadi P027
                    $P096_id = $val_analisa->id;
                    $P096= $val_analisa->hasil;
                break;
                case 'P097': //Vol FM lpm
                    $P097_id = $val_analisa->id;
                    $P097= $val_analisa->hasil;
                break;
                case 'P098': //Load Amp
                    $P098_id = $val_analisa->id;
                    $P098= $val_analisa->hasil;
                break;
                case 'P099': //Dilt Wtr gmp/lpm
                    $P099_id = $val_analisa->id;
                    $P099= $val_analisa->hasil;
                break;
                case 'P100': //Temp Dilt. Wtr.oC
                    $P100_id = $val_analisa->id;
                    $P100= $val_analisa->hasil;
                break;
                     
                }  
            }
        }

        if($P092!=0&&$P093!=0) { 
            $pty_c1=fix_rounding(( $P092 /$P093 )*100,2);
        }else{
            $pty_c1=0;
        }
        
        if($P094!=0&&$P095!=0){
            $pty_finmol=fix_rounding(( $P094 / $P095 )*100,2); 
        }else{
            $pty_finmol=0;
        }
         
        if($P001!=0&&$P002!=0){
            $pty_material=fix_rounding(( $P002 / $P001 )*100,2); 
        }else{
            $pty_material=0;
        }
         
         if ($id_material=='M186' || $id_material=='M187' || $id_material=='M180') {
            $table2 .= "<tr>
                    <td>$nama_material</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P001_id','$P001','$nama_material','Brix')\">$P001</a></td> 
                    
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P002_id','$P002','$nama_material','Pol')\">$P002</a></td>

                    <td style='text-align:center;color:#c0392b;'>$pty_material</td>

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P025_id','$P025','$nama_material','Visc')\">$P025</a></td>

 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P027_id','$P027','$nama_material','Temp')\">$P027</a></td>

                    
 
                 </tr>";
         }else{ 
           $nama_material = $alias;
           
           if ($no == 2){
                $no = 0;
           }
           
           if ($no == 0){
            
                $P001_0_id = $P001_id;
                $P002_0_id = $P002_id;
            
                $P001_0 = $P001;
                $P002_0 = $P002;
                
                if ($P002_0 != "" and $P002_0 != 0){
                    $PTY_0 = fix_rounding(( $P002_0 / $P001_0 )*100,2);
                }else{
                    $PTY_0 = 0;
                }
                
                $P096_0 = $P096;
                $P097_0 = $P097;
                $P098_0 = $P098;
                $P099_0 = $P099;
                $P100_0 = $P100;
                
                
                
           }
           
           
           if ( $no == 1 ){
            
                if ($P096_0 != "" and $P096_0 != 0){
                    $P096 = $P096_0;
                }
                
                if ($P097_0 != "" and $P097_0 != 0){
                    $P097 = $P097_0;
                }
                
                if ($P098_0 != "" and $P098_0 != 0){
                    $P098 = $P098_0;
                }
                
                if ($P099_0 != "" and $P099_0 != 0){
                    $P099 = $P099_0;
                }
                
                if ($P100_0 != "" and $P100_0 != 0){
                    $P100 = $P100_0;
                }
            
                $table .= "<tr>
                    <td>$nama_material</td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P001_0_id','$P001_0','$nama_material','Bix')\">$P001_0</a></td> 
                    
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P002_0_id','$P002_0','$nama_material','Pol')\">$P002_0</a></td>

                    <td style='text-align:center;color:#c0392b;'>$PTY_0</td>

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P001_id','$P001','$nama_material','Bix')\">$P001</a></td>

 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P002_id','$P002','$nama_material','Pol')\">$P002</a></td>

                    <td style='text-align:center; color:#c0392b;'>$pty_material</td>

                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P027_id','$P027','$nama_material','Fmol oC')\">$P027</a></td>


                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P097_id','$P097','$nama_material','FM lpm')\">$P097</a></td>


                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P098_id','$P098','$nama_material','Amp')\">$P098</a></td>


                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P099_id','$P099','$nama_material','gmp/lpm')\">$P099</a></td>


                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$P100_id','$P100','$nama_material','Wtr. oC')\">$P100</a></td>
 
                 </tr>";
                }
            
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
                    <table class="table striped table-border cell-border row-border cell-hover subcompact" style="width: 57%;">
    <thead >  
        <tr class="bg-orange" > 
            <th width='15%' style='text-align:center; vertical-align: middle;' >Material</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Brix</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Pol</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Pty</th>  
            <th width='5%' style='text-align:center; vertical-align: middle;' >Visc</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Temp</th>  
        </tr>
    </thead>
    <tbody>
        <?=$table2?>
    </tbody>
</table> 
<table class="table striped table-border cell-border row-border cell-hover subcompact" style="width: 100%;">
    <thead >
        <tr class="bg-orange" >
            <th width='15%' rowspan="3" style='text-align:center; vertical-align: middle;' >Material</th>
            <th width='5%' colspan="6" style='text-align:center; vertical-align: middle;' >C-1 SUGAR & FINAL MOLASSES</th>
            <th width='10%' colspan="6"style='text-align:center; vertical-align: middle;'>DATA PARAMETER OPERASIONAL</th> 
        </tr>
        <tr class="bg-orange" > 
            <th width='5%' colspan="3" style='text-align:center; vertical-align: middle;' >C-1 SUGAR</th>
            <th  width='5%' colspan="3"style='text-align:center; vertical-align: middle;'>FINAL MOLASSES</th> 
            <th  width='5%' rowspan="2"style='text-align:center; vertical-align: middle;'>Temp Fmol oC</th> 
            <th  width='5%' rowspan="2"style='text-align:center; vertical-align: middle;'>Vol FM lpm</th> 
            <th  width='5%' rowspan="2"style='text-align:center; vertical-align: middle;'>Load Amp</th> 
            <th  width='5%' rowspan="2"style='text-align:center; vertical-align: middle;'>Dilt Wtr gmp/lpm</th> 
            <th  width='5%' rowspan="2"style='text-align:center; vertical-align: middle;'>Temp Dilt. Wtr. oC</th> 
        </tr>
        <tr class="bg-orange" > 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Brix</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Pol</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Pty</th>  
            <th width='5%' style='text-align:center; vertical-align: middle;' >Brix</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Pol</th> 
            <th width='5%' style='text-align:center; vertical-align: middle;' >Pty</th>  
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