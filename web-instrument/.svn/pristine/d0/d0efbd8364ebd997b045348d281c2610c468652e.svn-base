<?php
// Query sudah OK  
if($data){
    $kolom =  array(10,45,45,45,20,20); 
include('pdf_tanggal_inc.php');   
    $option = "";
    $dep = "";
    $divisi ="";
    $unit = "";
    $nama = "";
    $nip ="";
    $judul =date_indo($tanggal);
    $cols[0] = $judul;
    $cols[1] = $dep;
    $cols[2] = $divisi;
    $cols[3] = $unit;
    $cols[4] = $option;
    $cols[5] = $kolom; 
    $cols[6] = $nama;
    $cols[7] = $nip;
$p = new PDF($cols);
$p->AddPage();    

    $table = "<table align='center' border='1' widtd='100%'> 
        <tr bgcolor='#EDEDED'>
            <td width='50%' rowspan='2' align='center' valign='middle'>Material</td>
            <td width='100%' colspan='6' align='center' valign='middle'>Data Analisa</td> 
            <td width='33%' rowspan='2' align='center' valign='middle'>% Trans CaO</td> 
        </tr>
        <tr bgcolor='#EDEDED'> 
        <td>Brix</td>
        <td>pH</td>
        <td>Temp</td>
        <td>Press</td>
        <td>CaO</td> 
        <td>% Evap.</td> 

        </tr>";
         $P101_VAPO=0;
        $P001_AVG=0; 
        $P003_AVG=0; 
        $P012_AVG=0; 
        $P027_AVG=0; 
        $P101_AVG=0;
   foreach($header as $val){
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
 
        foreach($data as $val_analisa){
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
            case 'M006':
                        $bxCJ=$P001;
                        $bxCJ_TEMP=$P001;
                        $evap='';  
                        $tran_CaO='';   
                break;
                case 'M099': 
                 if($P001!=0||$P001!=""){
                    $evap=round(100-($P001/$bxCJ*100),2);
                    $tran_CaO=round($P012/1*1/$P001,2);  
                } else{ 
                    $evap='';
                    $tran_CaO=''; 
                }
                        $bxCJ=$P001;     
                break;
                case 'M104': 
                      if($P001!=0||$P001!=""){
                    $evap=round(100-($P001/$bxCJ*100),2);
                    $tran_CaO=round($P012/1*1/$P001,2);  
                } else{ 
                    $evap='';
                    $tran_CaO=''; 
                }
                        $bxCJ=$P001;    
                break;
                case 'M107': 
                        if($P001!=0||$P001!=""){
                    $evap=round(100-($P001/$bxCJ*100),2);
                    $tran_CaO=round($P012/1*1/$P001,2);  
                } else{ 
                    $evap='';
                    $tran_CaO=''; 
                }
                        $bxCJ=$P001;  
                break;
                case 'M108': 
                         if($P001!=0||$P001!=""){
                    $evap=round(100-($P001/$bxCJ*100),2);
                    $tran_CaO=round($P012/1*1/$P001,2);  
                } else{ 
                    $evap='';
                    $tran_CaO=''; 
                }
                        $bxCJ=$P001;
                break;
                case 'M109': 
                        $P101_TEMP=$P001; 
                         if($P001!=0||$P001!=""){
                    $evap=round(100-($P001/$bxCJ*100),2);
                    $tran_CaO=round($P012/1*1/$P001,2);  
                } else{ 
                    $evap='';
                    $tran_CaO=''; 
                }
                        $bxCJ=$P001;  
                break;  
                default:
                if($P001!=0||$P001!=""){
                $evap=round(100-($P001/$bxCJ*100),2);
                $tran_CaO=round($P012/1*1/$P001,2);  
                } else{ 
                $evap='';
                $tran_CaO=''; 
                } 
                break;
        }
        
            if($id_material!='M177' && $id_material!='M178'){
                $table .= "<tr>
                    <td>$nama_material </td>
                    <td>$P001</td> 
                    <td>$P003</td> 
                    <td>$P027</td> 
                    <td>$P101</td>  
                    <td>$P012</td>
                    <td>$evap</td>
                    <td>$tran_CaO</td> 
                 </tr>"; 
             }
            }

                if($P101_TEMP!=0||$P101_TEMP!=""){
               $evap=round(100-($P101_TEMP/$bxCJ_TEMP*100),2);
                //$evap=$P101_TEMP;
                $tran_CaO=round($P012/1*1/$P101_TEMP,2);  
                } else{ 
                $evap=0;
                $tran_CaO=0; 
                }
       $table .= "<tr bgcolor='#EDEDED'>
                    <td>TOTAL</a>
                    <td>$P001_AVG</a>

                    <td>$P003_AVG</a>

                    <td>$P027_AVG</a>

                    <td>$P101_AVG</a> 

                    <td>$P012_AVG</a>
                    <td>$evap </a>
                    <td>$tran_CaO </a> 
                 </tr>
                 </table>"; 
       // echo $table;
$p->htmltable($table); 
$p->Ln(2); 
 
$tglName = date('YmdHis');   
$p->output('INDIVIDUAL EVAPORATOR TEST_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>