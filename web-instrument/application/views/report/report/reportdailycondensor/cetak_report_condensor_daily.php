<?php
// Query sudah OK  
if($data_jam1&&$data_jam2){
    $kolom =  array(10,45,45,45,20,20); 
include('pdf_tanggal_inc.php');   
    $option = "";
    $dep = "";
    $divisi ="";
    $unit = "";
    $nama = "";
    $nip ="";
    $judul ="";
    $cols[0] =date_indo($tanggal);
    $cols[1] = $dep;
    $cols[2] = $divisi;
    $cols[3] = $unit;
    $cols[4] = $option;
    $cols[5] = $kolom;
    
    $cols[6] = $nama;
    $cols[7] = $nip;
$p = new PDF($cols);
$p->AddPage();  
$html = "<table align='center' border='1' width='100%'>
<tr bgcolor='#EDEDED'>  
                    <td width='8%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>  
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Boiler Feed Water</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Boiler Water #1</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Boiler Water #2</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Boiler Water #3</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Boiler Water #4</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Boiler Water #5</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Evap 1ABCDE Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Evap 2ABC Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Evap 3AB Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Evap 4 Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Evap 5 Cond.</td>
                </tr>
                <tr bgcolor='#EDEDED'>   
 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                </tr>
"; 

        $M045P003_AVG=0;  
        $M045P029_AVG=0;   
        $M046P003_AVG=0;   
        $M046P029_AVG=0;   
        $M047P003_AVG=0;   
        $M047P029_AVG=0;   
        $M048P003_AVG=0;    
        $M048P029_AVG=0;   
        $M049P003_AVG=0;   
        $M049P029_AVG=0;   
        $M050P003_AVG=0;   
        $M050P029_AVG=0;   
        $M057P003_AVG=0;   
        $M057P029_AVG=0;   
        $M058P003_AVG=0;  
        $M058P029_AVG=0;   
        $M059P003_AVG=0;  
        $M059P029_AVG=0;  
        $M060P003_AVG=0; 
        $M060P029_AVG=0;   
        $M061P003_AVG=0;  
        $M061P029_AVG=0;   
        $jml1=0;
        $jml1=count($data_jam1);
        $jml=0;
        $jml=count($data_jam2);
        $baris=0;
foreach ($data_jam1 as $key) { 
        $id_jam=$key->id_jam;
        $M045P003=0;  
        $M045P029=0;   
        $M046P003=0;   
        $M046P029=0;   
        $M047P003=0;   
        $M047P029=0;   
        $M048P003=0;    
        $M048P029=0;   
        $M049P003=0;   
        $M049P029=0;   
        $M050P003=0;   
        $M050P029=0;   
        $M057P003=0;   
        $M057P029=0;   
        $M058P003=0;  
        $M058P029=0;   
        $M059P003=0;  
        $M059P029=0;  
        $M060P003=0; 
        $M060P029=0;   
        $M061P003=0;  
        $M061P029=0;    
foreach($data_t1 as $val2){ 
if($id_jam==$val2->id_jam){          
switch ($val2->id_material) { 
           case 'M045':  
        $M045P003 =$val2->pH;  
        $M045P029 =$val2->Sugar; 
        $M045P003_AVG=$M045P003_AVG+$val2->pH;  
        $M045P029_AVG=$M045P029_AVG+$val2->Sugar; 
            break; 
       case 'M046': 
        $M046P003 =$val2->pH;   
        $M046P029 =$val2->Sugar;  
        $M046P003_AVG=$M046P003_AVG+$val2->pH;   
        $M046P029_AVG=$M046P029_AVG+$val2->Sugar;  
            break; 
        case 'M047': 
        $M047P003 =$val2->pH;   
        $M047P029 =$val2->Sugar; 
        $M047P003_AVG=$M047P003_AVG+$val2->pH;   
        $M047P029_AVG=$M047P029_AVG+$val2->Sugar; 
            break; 
        case 'M048': 
        $M048P003 =$val2->pH;    
        $M048P029 =$val2->Sugar;   
        $M048P003_AVG=$M048P003_AVG+$val2->pH;    
        $M048P029_AVG=$M048P029_AVG+$val2->Sugar;  
            break; 
        case 'M049': 
        $M049P003 =$val2->pH;   
        $M049P029 =$val2->Sugar; 
        $M049P003_AVG=$M049P003_AVG+$val2->pH;   
        $M049P029_AVG=$M049P029_AVG+$val2->Sugar; 
            break; 
        case 'M050': 
        $M050P003 =$val2->pH;   
        $M050P029 =$val2->Sugar;
        $M050P003_AVG=$M050P003_AVG+$val2->pH;   
        $M050P029_AVG=$M050P029_AVG+$val2->Sugar;   
            break;
        case 'M057': 
        $M057P003 =$val2->pH;   
        $M057P029 =$val2->Sugar;  
        $M057P003_AVG=$M057P003_AVG+$val2->pH;   
        $M057P029_AVG=$M057P029_AVG+$val2->Sugar;
            break;
        case 'M058': 
        $M058P003 =$val2->pH;  
        $M058P029 =$val2->Sugar; 
        $M058P003_AVG=$M058P003_AVG+$val2->pH;  
        $M058P029_AVG=$M058P029_AVG+$val2->Sugar;
            break;  
        case 'M059': 
        $M059P003 =$val2->pH;  
        $M059P029 =$val2->Sugar;  
        $M059P003_AVG=$M059P003_AVG+$val2->pH;  
        $M059P029_AVG=$M059P029_AVG+$val2->Sugar;  
        break;
        case 'M060': 
        $M060P003 =$val2->pH; 
        $M060P029 =$val2->Sugar; 
        $M060P003_AVG=$M060P003_AVG+$val2->pH; 
        $M060P029_AVG=$M060P029_AVG+$val2->Sugar; 
            break; 
        case 'M061': 
        $M061P003 =$val2->pH;  
        $M061P029 =$val2->Sugar; 
        $M061P003_AVG=$M061P003_AVG+$val2->pH;  
        $M061P029_AVG=$M061P029_AVG+$val2->Sugar; 
            break; 
        default: 
            break; 
         
        }       
    }  
          

  }
    $html .= "  <tr >
      <td width='8%' align='center' valign='middle' size='6' style='B'>$id_jam</td>   
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M045P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M045P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M046P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M046P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M047P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M047P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M048P003</td>  
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M048P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M049P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M049P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M050P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M050P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M057P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M057P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M058P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M058P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M059P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M059P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M060P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M060P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M061P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M061P029</td> 
                </tr>
                    ";   
    }
    $html .= "  <tr  bgcolor='#EDEDED'>
        <td width='8%' align='center' valign='middle' size='6' style='B'>Average</td>   
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M045P003_AVG/$jml1."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M045P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M046P003_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M046P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M047P003_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M047P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M048P003_AVG/$jml1."</td>  
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M048P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M049P003_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M049P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M050P003_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M050P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M057P003_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M057P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M058P003_AVG/$jml1."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M058P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M059P003_AVG/$jml1."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M059P029_AVG/$jml1."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M060P003_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M060P029_AVG/$jml1."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M061P003_AVG/$jml1."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M061P029_AVG/$jml1."</td> 
                </tr>
                    ";  
    $html .= "  </table>"; 

$p->htmltable($html);   
$baris=$baris+$jml+$jml1;
if($baris<=22){
$p->Ln(2);
}else{
    $p->AddPage();
}
 
    

$html = "<table align='center' border='1' width='100%'>
<tr bgcolor='#EDEDED'>  
                    <td width='6' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>  
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>R J H # 1 Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>R J H # 2 Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>R J H # 3 Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>S J H 1&2 Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>S J H 3&4 Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Clear J Heater Cond.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Evap Hot Well</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Hot Well</td>
                    <td width='10%' colspan='2' align='center' valign='middle' size='6' style='B'>Evap Vacuum Condsr.</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>VF Condsr. #1</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>VF Condsr.. #2</td>
                </tr>
                <tr bgcolor='#EDEDED'>   
 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                </tr>
";

        $M051P003_AVG=0;  
        $M051P029_AVG=0;   
        $M052P003_AVG=0;   
        $M052P029_AVG=0;   
        $M053P003_AVG=0;   
        $M053P029_AVG=0;   
        $M054P003_AVG=0;    
        $M054P029_AVG=0;   
        $M055P003_AVG=0;   
        $M055P029_AVG=0;   
        $M056P003_AVG=0;   
        $M056P029_AVG=0;   
        $M062P003_AVG=0;   
        $M062P029_AVG=0;   
        $M063P003_AVG=0;  
        $M063P029_AVG=0;   
        $M064P003_AVG=0;  
        $M064P029_AVG=0;   
        $M068P003_AVG=0; 
        $M068P029_AVG=0;   
        $M069P003_AVG=0;  
        $M069P029_AVG=0; 
        $baris=$jml+$jml1;
foreach ($data_jam2 as $key) { 
$id_jam=$key->id_jam;
        $M051P003=0;  
        $M051P029=0;   
        $M052P003=0;   
        $M052P029=0;   
        $M053P003=0;   
        $M053P029=0;   
        $M054P003=0;    
        $M054P029=0;   
        $M055P003=0;   
        $M055P029=0;   
        $M056P003=0;   
        $M056P029=0;   
        $M062P003=0;   
        $M062P029=0;   
        $M063P003=0;  
        $M063P029=0;   
        $M064P003=0;  
        $M064P029=0;   
        $M068P003=0; 
        $M068P029=0;   
        $M069P003=0;  
        $M069P029=0;  

foreach($data_t2 as $val2){ 
if($id_jam==$val2->id_jam){          
switch ($val2->id_material) { 
            case 'M051': 
        $M051P003 =$val2->pH;  
        $M051P029 =$val2->Sugar; 
        $M051P003_AVG =$M051P003_AVG+$val2->pH;  
        $M051P029_AVG =$M051P029_AVG+$val2->Sugar; 
            break; 
       case 'M052':
        $M052P003 =$val2->pH;   
        $M052P029 =$val2->Sugar; 
        $M052P003_AVG =$M052P003_AVG+$val2->pH;   
        $M052P029_AVG=$M052P029_AVG+$val2->Sugar;  
            break; 
        case 'M053': 
        $M053P003 =$val2->pH;   
        $M053P029 =$val2->Sugar; 
        $M053P003_AVG =$M053P003_AVG+$val2->pH;   
        $M053P029_AVG =$M053P029_AVG+$val2->Sugar; 
            break; 
        case 'M054': 
        $M054P003 =$val2->pH;    
        $M054P029 =$val2->Sugar;   
        $M054P003_AVG =$M054P003_AVG+$val2->pH;    
        $M054P029_AVG =$M054P029_AVG+$val2->Sugar;   
            break; 
        case 'M055': 
        $M055P003 =$val2->pH;   
        $M055P029 =$val2->Sugar; 
        $M055P003_AVG =$M055P003_AVG+$val2->pH;   
        $M055P029_AVG =$M055P029_AVG+$val2->Sugar; 
            break; 
        case 'M056': 
        $M056P003 =$val2->pH;   
        $M056P029 =$val2->Sugar;  
        $M056P003_AVG =$M056P003_AVG+$val2->pH;   
        $M056P029_AVG =$M056P029_AVG+$val2->Sugar;  
            break;
        case 'M062': 
        $M062P003 =$val2->pH;   
        $M062P029 =$val2->Sugar;  
        $M062P003_AVG =$M062P003_AVG+$val2->pH;   
        $M062P029_AVG =$M062P029_AVG+$val2->Sugar;  
            break;
        case 'M063': 
        $M063P003 =$val2->pH;  
        $M063P029 =$val2->Sugar; 
        $M063P003_AVG =$M063P003_AVG+$val2->pH;  
        $M063P029_AVG =$M063P029_AVG+$val2->Sugar; 
            break;  
        case 'M064': 
        $M064P003 =$val2->pH;  
        $M064P029 =$val2->Sugar;  
        $M064P003_AVG =$M064P003_AVG+$val2->pH;  
        $M064P029_AVG =$M064P029_AVG+$val2->Sugar; 
        break;
        case 'M068': 
        $M068P003 =$val2->pH; 
        $M068P029 =$val2->Sugar; 
        $M068P003_AVG =$M068P003_AVG+$val2->pH; 
        $M068P029_AVG =$M068P029_AVG+$val2->Sugar; 
            break; 
        case 'M069': 
        $M069P003 =$val2->pH;  
        $M069P029 =$val2->Sugar; 
        $M069P003_AVG =$M069P003_AVG+$val2->pH;  
        $M069P029_AVG =$M069P029_AVG+$val2->Sugar; 
            break; 
}
}
} 
$html .= "  <tr >
        <td width='8%' align='center' valign='middle' size='6' style='B'>$id_jam</td>   
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M051P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M051P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M052P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M052P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M053P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M053P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M054P003</td>  
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M054P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M055P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M055P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M056P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M056P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M062P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M062P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M063P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M063P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M064P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M064P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M068P003</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M068P029</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M069P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M069P029</td> 
                </tr>
                    ";   
} 
$html .= "  <tr  bgcolor='#EDEDED'>
        <td width='8%' align='center' valign='middle' size='6' style='B'>Average</td>   
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M051P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M051P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M052P003_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M052P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M053P003_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M053P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M054P003_AVG/$jml."</td>  
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M054P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M055P003_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M055P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M056P003_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M056P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M062P003_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M062P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M063P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M063P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M064P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M064P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M068P003_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M068P029_AVG/$jml."</td> 
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M069P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M069P029_AVG/$jml."</td> 
                </tr>
                    ";  

    $html .= "  </table>"; 
$p->htmltable($html);  
$baris=$baris+$jml+$jml1;
if($baris<=20){
$p->Ln(2);
}else{
    $p->AddPage();
$jml1=0;
$baris=0; 
}


$html = "<table align='center' border='1' width='100%'>
<tr bgcolor='#EDEDED'>  
                    <td width='8%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>  
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #1</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #2</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #3</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #4</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #5</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #6</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #7</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #8</td>
                    <td width='10%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #9</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #10</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #11</td>
                </tr>
                <tr bgcolor='#EDEDED'>   
 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                </tr>
";
$M070P003_AVG=0;
$M071P003_AVG=0;
$M072P003_AVG=0;
$M073P003_AVG=0;
$M074P003_AVG=0;
$M075P003_AVG=0;
$M076P003_AVG=0;
$M077P003_AVG=0;
$M078P003_AVG=0;
$M079P003_AVG=0;
$M080P003_AVG=0; 
$M070P029_AVG=0;
$M071P029_AVG=0;
$M072P029_AVG=0;
$M073P029_AVG=0;
$M074P029_AVG=0;
$M075P029_AVG=0;
$M076P029_AVG=0;
$M077P029_AVG=0;
$M078P029_AVG=0;
$M079P029_AVG=0;
$M080P029_AVG=0;
foreach ($data_jam2 as $key) {  
$id_jam=$key->id_jam;
$M070P003=0;
$M071P003=0;
$M072P003=0;
$M073P003=0;
$M074P003=0;
$M075P003=0;
$M076P003=0;
$M077P003=0;
$M078P003=0;
$M079P003=0;
$M080P003=0; 
$M070P029=0;
$M071P029=0;
$M072P029=0;
$M073P029=0;
$M074P029=0;
$M075P029=0;
$M076P029=0;
$M077P029=0;
$M078P029=0;
$M079P029=0;
$M080P029=0;
    foreach($data_t3 as $val2){ 

if($id_jam==$val2->id_jam){          
switch ($val2->id_material) { 
case 'M070':
  $M070P003=$val2->pH;
  $M070P029=$val2->Sugar;
  $M070P003_AVG=$M070P003_AVG+$val2->pH;
  $M070P029_AVG=$M070P029_AVG+$val2->pH;
  break; 
case 'M071':
  $M071P003=$val2->pH;
  $M071P029=$val2->Sugar;
  $M071P003_AVG=$M071P003_AVG+$val2->pH;
  $M071P029_AVG=$M071P029_AVG+$val2->pH;
  break; 
case 'M072':
  $M072P003=$val2->pH;
  $M072P029=$val2->Sugar;
  $M072P003_AVG=$M072P003_AVG+$val2->pH;
  $M072P029_AVG=$M072P029_AVG+$val2->pH;
  break; 
case 'M073':
  $M073P003=$val2->pH;
  $M073P029=$val2->Sugar;
  $M073P003_AVG=$M073P003_AVG+$val2->pH;
  $M073P029_AVG=$M073P029_AVG+$val2->pH;
  break; 
case 'M074':
  $M074P003=$val2->pH;
  $M074P029=$val2->Sugar;
  $M074P003_AVG=$M074P003_AVG+$val2->pH;
  $M074P029_AVG=$M074P029_AVG+$val2->pH;
  break; 
case 'M075':
  $M075P003=$val2->pH;
  $M075P029=$val2->Sugar;
  $M075P003_AVG=$M075P003_AVG+$val2->pH;
  $M075P029_AVG=$M075P029_AVG+$val2->pH;
  break; 
case 'M076':
  $M076P003=$val2->pH;
  $M076P029=$val2->Sugar;
  $M076P003_AVG=$M076P003_AVG+$val2->pH;
  $M076P029_AVG=$M076P029_AVG+$val2->pH;
  break; 
case 'M077':
  $M077P003=$val2->pH;
  $M077P029=$val2->Sugar;
  $M077P003_AVG=$M077P003_AVG+$val2->pH;
  $M077P029_AVG=$M077P029_AVG+$val2->pH;
  break; 
case 'M078':
  $M078P003=$val2->pH;
  $M078P029=$val2->Sugar;
  $M078P003_AVG=$M078P003_AVG+$val2->pH;
  $M078P029_AVG=$M078P029_AVG+$val2->pH;
  break; 
case 'M079':
  $M079P003=$val2->pH;
  $M079P029=$val2->Sugar;
  $M079P003_AVG=$M079P003_AVG+$val2->pH;
  $M079P029_AVG=$M079P029_AVG+$val2->pH;
  break; 
case 'M080':
  $M080P003=$val2->pH;
  $M080P029=$val2->Sugar;
  $M080P003_AVG=$M080P003_AVG+$val2->pH;
  $M080P029_AVG=$M080P029_AVG+$val2->pH;
  break; 

    }
    }
    }
    $html .= "  <tr >
        <td width='8%' align='center' valign='middle' size='6' style='B'>$id_jam</td>   
<td width='4%' align='center' valign='middle' size='6' style='B'>$M070P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M070P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M071P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M071P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M072P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M072P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M073P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M073P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M074P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M074P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M075P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M075P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M076P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M076P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M077P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M077P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M078P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M078P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M079P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M079P029</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$M080P003</td>
  <td width='4%' align='center' valign='middle' size='6' style='B'>$M080P029</td>
                </tr>
                    ";  
}
$html .= "  <tr  bgcolor='#EDEDED'>
        <td width='8%' align='center' valign='middle' size='6' style='B'>Average</td>   
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M070P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M070P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M071P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M071P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M072P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M072P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M073P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M073P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M074P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M074P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M075P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M075P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M076P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M076P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M077P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M077P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M078P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M078P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M079P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M079P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M080P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M080P029_AVG/$jml."</td>
                </tr>
                    ";  

    $html .= "  </table>"; 
$p->htmltable($html); 
$baris=$baris+$jml+$jml1;
if($baris<=20){
$p->Ln(2);
}else{
    $p->AddPage();
$jml1=0;
$baris=0; 
}

$html = "<table align='center' border='1' width='100%'>
<tr bgcolor='#EDEDED'>  
                    <td width='8%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>  
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #12</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #13</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #14</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Pan Condsr. #15</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>B-CVP Condsr. #1</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>B-CVP Condsr. #2</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>C-CVP Condsr. #1</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>C-CVP Condsr. #2</td>
                    <td width='10%' colspan='3' align='center' valign='middle' size='6' style='B'>Injection Water Inlet</td>
                    <td width='8%' colspan='3' align='center' valign='middle' size='6' style='B'>Injection Water Outlet</td> 
                </tr>
                <tr bgcolor='#EDEDED'>   
 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Temp</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Temp</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                </tr>
";
$M065P003_AVG=0;
$M065P029_AVG=0;
$M065P027_AVG=0;
$M066P003_AVG=0;
$M066P029_AVG=0;
$M066P027_AVG=0;
$M081P003_AVG=0;
$M081P029_AVG=0;
$M082P003_AVG=0;
$M082P029_AVG=0;
$M083P003_AVG=0;
$M083P029_AVG=0;
$M084P003_AVG=0;
$M084P029_AVG=0;
$M085P003_AVG=0;
$M085P029_AVG=0;
$M086P003_AVG=0;
$M086P029_AVG=0;
$M087P003_AVG=0;
$M087P029_AVG=0; 
$M088P003_AVG=0;
$M088P029_AVG=0; 
foreach ($data_jam2 as $key) {  
$id_jam=$key->id_jam;
$M065P003=0;
$M065P029=0;
$M065P027=0;
$M066P003=0;
$M066P029=0;
$M066P027=0;
$M081P003=0;
$M081P029=0;
$M082P003=0;
$M082P029=0;
$M083P003=0;
$M083P029=0;
$M084P003=0;
$M084P029=0;
$M085P003=0;
$M085P029=0;
$M086P003=0;
$M086P029=0;
$M087P003=0;
$M087P029=0; 
$M088P003=0;
$M088P029=0; 
foreach($data_t4 as $val2){ 
if($id_jam==$val2->id_jam){          
switch ($val2->id_material) { 
CASE 'M065':
$M065P003=$val2->pH;
$M065P029=$val2->Sugar;
$M065P003_AVG=$M065P003_AVG+$val2->pH;
$M065P029_AVG=$M065P029_AVG+$val2->Sugar;
$M065P027_AVG=$M065P027_AVG+$val2->Temp;
break;
CASE 'M066':
$M066P003=$val2->pH;
$M066P029=$val2->Sugar;
$M066P003_AVG=$M066P003_AVG+$val2->pH;
$M066P029_AVG=$M066P029_AVG+$val2->Sugar;
$M066P027_AVG=$M066P027_AVG+$val2->Temp;
break;
CASE 'M081':
$M081P003=$val2->pH;
$M081P029=$val2->Sugar;
$M081P003_AVG=$M081P003_AVG+$val2->pH;
$M081P029_AVG=$M081P029_AVG+$val2->Sugar;
break;
CASE 'M082':
$M082P003=$val2->pH;
$M082P029=$val2->Sugar;
$M082P003_AVG=$M082P003_AVG+$val2->pH;
$M082P029_AVG=$M082P029_AVG+$val2->Sugar;
break;
CASE 'M083':
$M083P003=$val2->pH;
$M083P029=$val2->Sugar;
$M083P003_AVG=$M083P003_AVG+$val2->pH;
$M083P029_AVG=$M083P029_AVG+$val2->Sugar;
break;
CASE 'M084':
$M084P003=$val2->pH;
$M084P029=$val2->Sugar;
$M084P003_AVG=$M084P003_AVG+$val2->pH;
$M084P029_AVG=$M084P029_AVG+$val2->Sugar;
break;
CASE 'M085':
$M085P003=$val2->pH;
$M085P029=$val2->Sugar;
$M085P003_AVG=$M085P003_AVG+$val2->pH;
$M085P029_AVG=$M085P029_AVG+$val2->Sugar;
break;
CASE 'M086':
$M086P003=$val2->pH;
$M086P029=$val2->Sugar;
$M086P003_AVG=$M086P003_AVG+$val2->pH;
$M086P029_AVG=$M086P029_AVG+$val2->Sugar;
break;
CASE 'M087':
$M087P003=$val2->pH;
$M087P029=$val2->Sugar;
$M087P027=$val2->Temp;
$M087P003_AVG=$M087P003_AVG+$val2->pH;
$M087P029_AVG=$M087P029_AVG+$val2->Sugar;
break;
CASE 'M088':
$M088P003=$val2->pH;
$M088P029=$val2->Sugar;
$M088P027=$val2->Temp;
$M088P003_AVG=$M088P003_AVG+$val2->pH;
$M088P029_AVG=$M088P029_AVG+$val2->Sugar;
break;

    }
    }
    }
    $html .= "  <tr >
        <td width='8%' align='center' valign='middle' size='6' style='B'>$id_jam</td>   
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M081P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M081P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M082P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M082P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M083P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M083P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M084P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M084P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M085P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M085P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M086P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M086P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M087P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M087P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M088P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M088P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M065P027</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M065P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M065P029</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M066P027</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M066P003</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$M066P029</td>
                </tr>
                    ";  
}
$html .= "  <tr  bgcolor='#EDEDED'>
        <td width='8%' align='center' valign='middle' size='6' style='B'>Average</td>   
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M081P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M081P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M082P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M082P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M083P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M083P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M084P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M084P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M085P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M085P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M086P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M086P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M087P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M087P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M088P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M088P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M065P027_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M065P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M065P029_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M066P027_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M066P003_AVG/$jml."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$M066P029_AVG/$jml."</td>
                </tr>
                    ";  

    $html .= "  </table>"; 
$p->htmltable($html); 
$baris=$baris+$jml+$jml1;
if($baris<=20){
$p->Ln(2);
}else{
    $p->AddPage();
$jml1=0;
$baris=0; 
}
$html = "<table align='center' border='1' width='100%'>
<tr bgcolor='#EDEDED'>  
                    <td width='8%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>  
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>%Cooling Water</td>
                    <td width='8%' colspan='3' align='center' valign='middle' size='6' style='B'>Gutter ".'"A"'." </td>
                    <td width='8%' colspan='3' align='center' valign='middle' size='6' style='B'>Gutter ".'"B"'." </td>
                    <td width='8%' colspan='3' align='center' valign='middle' size='6' style='B'>Gutter ".'"C"'." </td> 
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Gutter ".'"A"'." @Clary </td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Gutter ".'"B"'." @Curing</td>
                    <td width='8%' colspan='2' align='center' valign='middle' size='6' style='B'>Gutter ".'"C"'." @Miling</td> 
                </tr>
                <tr bgcolor='#EDEDED'>   
 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Temp-In</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Temp-Out</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Debit</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Debit</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Debit</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Sugar ppm</td> 
                </tr>
";
       
        $M089P003_AVG=0;
        $M089P029_AVG=0;
        $M089P040_AVG=0;
        $M090P003_AVG=0;
        $M090P029_AVG=0;
        $M090P040_AVG=0;
        $M091P003_AVG=0;
        $M091P029_AVG=0;
        $M091P040_AVG=0;
        $M092P003_AVG=0;
        $M092P029_AVG=0;
        $M093P003_AVG=0;
        $M093P029_AVG=0;
        $M094P003_AVG=0;
        $M094P029_AVG=0;
        $M163P089_AVG=0;
        $M163P090_AVG=0;
        foreach ($data_jam2 as $key) {  
        $id_jam=$key->id_jam;
        $M089P003=0;
        $M089P029=0;
        $M089P040=0;
        $M090P003=0;
        $M090P029=0;
        $M090P040=0;
        $M091P003=0;
        $M091P029=0;
        $M091P040=0;
        $M092P003=0;
        $M092P029=0;
        $M093P003=0;
        $M093P029=0;
        $M094P003=0;
        $M094P029=0;
        $M163P089=0;
        $M163P090=0;
        foreach($data_t5 as $val2){ 
        if($id_jam==$val2->id_jam){          
        switch ($val2->id_material) { 
        CASE 'M089':
        $M089P003=$val2->pH;
        $M089P029=$val2->Sugar;
        $M089P040=$val2->Debit;
        $M089P003_AVG=$M089P003_AVG+$val2->pH;
        $M089P029_AVG=$M089P029_AVG+$val2->Sugar;
        $M089P040_AVG=$M089P040_AVG+$val2->Debit;
        break;
        CASE 'M090':
        $M090P003=$val2->pH;
        $M090P029=$val2->Sugar;
        $M090P040=$val2->Debit;
        $M090P003_AVG=$M090P003_AVG+$val2->pH;
        $M090P029_AVG=$M090P029_AVG+$val2->Sugar;
        $M090P040_AVG=$M090P040_AVG+$val2->Debit;
        break;
        CASE 'M091':
        $M091P003=$val2->pH;
        $M091P029=$val2->Sugar;
        $M091P040=$val2->Debit;
        $M091P003_AVG=$M091P003_AVG+$val2->pH;
        $M091P029_AVG=$M091P029_AVG+$val2->Sugar;
        $M091P040_AVG=$M091P040_AVG+$val2->Debit;
        break;
        CASE 'M092':
        $M092P003=$val2->pH;
        $M092P029=$val2->Sugar;
        $M092P003_AVG=$M092P003_AVG+$val2->pH;
        $M092P029_AVG=$M092P029_AVG+$val2->Sugar;
        break;
        CASE 'M093':
        $M093P003=$val2->pH;
        $M093P029=$val2->Sugar;
        $M093P003_AVG=$M093P003_AVG+$val2->pH;
        $M093P029_AVG=$M093P029_AVG+$val2->Sugar;
        break;
        CASE 'M094':
        $M094P003=$val2->pH;
        $M094P029=$val2->Sugar;
        $M094P003_AVG=$M094P003_AVG+$val2->pH;
        $M094P029_AVG=$M094P029_AVG+$val2->Sugar;
        break;
        CASE 'M163':
        $M163P089=$val2->Temp_in;
        $M163P090=$val2->Temp_out;
        $M163P089_AVG=$M163P089_AVG+$val2->Temp_in;
        $M163P090_AVG=$M163P090_AVG+$val2->Temp_out;
        break;
        }
        }
        }
$html .= "  <tr >
        <td width='8%' align='center' valign='middle' size='6' style='B'>$id_jam</td>   
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M163P089</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M163P090</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M089P003</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M089P029</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M089P040</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M090P003</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M090P029</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M090P040</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M091P003</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M091P029</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M091P040</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M092P003</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M092P029</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M093P003</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M093P029</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M094P003</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>$M094P029</td>
                </tr>
                    ";  
        }
       $html .= "  <tr  bgcolor='#EDEDED'>
        <td width='8%' align='center' valign='middle' size='6' style='B'>Average</td>   
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M163P089_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M163P090_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M089P003_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M089P029_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M089P040_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M090P003_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M090P029_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M090P040_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M091P003_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M091P029_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M091P040_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M092P003_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M092P029_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M093P003_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M093P029_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M094P003_AVG/$jml."</td>
        <td width='8%' align='center' valign='middle' size='6' style='B'>".$M094P029_AVG/$jml."</td>
                </tr>
                    "; 
$p->htmltable($html); 
 
$tglName = date('YmdHis');   
$p->output('DAILY BOILER WATER, CONDENSATE & CONDENSOR ANALYSIS REPORT_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>