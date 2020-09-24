<?php
// Query sudah OK
 
 $html = "<table align='center' border='1' width='150'>";
foreach($header as $val){ 
switch ($n) {
        case 6:
            $width=29;
            break;
        
        case 8:
            $width=29;
        case 9:
            $width=29;
            break;
        case 10:
            $width=29;
            break;
        default:
           $width=25;
            break;
    }
        $p->Cell(($width/2),6,'',1,0,'C',true);  
        $p->Cell(($width/2),6,'',1,0,'C',true);  
        $n++; 
}  
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
        $id_jam='';  
        $n=0;  
foreach($data_t1 as $val2){                  
switch ($n) { 
        case 0: 
        $id_jam=$val2->id_jam; 
        $M051P003 =$val2->pH;  
        $M051P029 =$val2->Sugar; 
            break; 
       case 1: 
        $M052P003 =$val2->pH;   
        $M052P029 =$val2->Sugar;  
            break; 
        case 2: 
        $M053P003 =$val2->pH;   
        $M053P029 =$val2->Sugar; 
            break; 
        case 3: 
        $M054P003 =$val2->pH;    
        $M054P029 =$val2->Sugar;   
            break; 
        case 4: 
        $M055P003 =$val2->pH;   
        $M055P029 =$val2->Sugar; 
            break; 
        case 5: 
        $M056P003 =$val2->pH;   
        $M056P029 =$val2->Sugar;  
            break;
        case 6: 
        $M062P003 =$val2->pH;   
        $M062P029 =$val2->Sugar;  
            break;
        case 7: 
        $M063P003 =$val2->pH;  
        $M063P029 =$val2->Sugar; 
            break;  
        case 8: 
        $M064P003 =$val2->pH;  
        $M064P029 =$val2->Sugar;  
        break;
        case 9: 
        $M068P003 =$val2->pH; 
        $M068P029 =$val2->Sugar; 
            break; 
        case 10: 
        $M069P003 =$val2->pH;  
        $M069P029 =$val2->Sugar; 
            break; 
        default: 
            break;
             $n++; 
        if($n==11){
            $n=0;
        }
    }  
          
        $html .= "
               <tr bgcolor='#EDEDED'>    
                    <td width='8%' align='center' valign='middle' size='6' style='B'>$id_jam</td>
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
  
    
    }   

    $html .= "</table>"; 

 
/*foreach($header_t1 as $val2){ 
switch ($n) {
        case 1:
        $width=25;
        $p->Cell(($width/2),6,round($M051P003/$data_count,2),1,0,'C',true);  
        $p->Cell(($width/2),6,round($M051P029/$data_count,2),1,0,'C',true);  
            break; 
        case 2:
            $width=25;
        $p->Cell(($width/2),6,round($M052P003/$data_count,2),1,0,'C',true);   
        $p->Cell(($width/2),6,round($M052P029/$data_count,2),1,0,'C',true);  
            break; 
        case 3:
            $width=25;
        $p->Cell(($width/2),6,round($M053P003/$data_count,2),1,0,'C',true);   
        $p->Cell(($width/2),6,round($M053P029/$data_count,2),1,0,'C',true);  
            break; 
        case 4:
            $width=25;
        $p->Cell(($width/2),6,round($M054P003/$data_count,2),1,0,'C',true);    
        $p->Cell(($width/2),6,round($M054P029/$data_count,2),1,0,'C',true);  
            break; 
        case 5:
            $width=25;
        $p->Cell(($width/2),6,round($M055P003/$data_count,2),1,0,'C',true);   
        $p->Cell(($width/2),6,round($M055P029/$data_count,2),1,0,'C',true);  
            break;
        case 6:
            $width=25;
        $p->Cell(($width/2),6,round($M056P003/$data_count,2),1,0,'C',true);   
        $p->Cell(($width/2),6,round($M056P029/$data_count,2),1,0,'C',true);  
            break;
        case 7:
            $width=29;
        $p->Cell(($width/2),6,round($M062P003/$data_count,2),1,0,'C',true);   
        $p->Cell(($width/2),6,round($M062P029/$data_count,2),1,0,'C',true);  
            break;  
        case 8:
            $width=25;
        $p->Cell(($width/2),6,round($M063P003/$data_count,2),1,0,'C',true);  
        $p->Cell(($width/2),6,round($M063P029/$data_count,2),1,0,'C',true);  
        case 9:
            $width=29;
        $p->Cell(($width/2),6,round($M064P003/$data_count,2),1,0,'C',true);  
        $p->Cell(($width/2),6,round($M064P029/$data_count,2),1,0,'C',true); 
            break;
        case 10:
            $width=29;
        $p->Cell(($width/2),6,round($M068P003/$data_count,2),1,0,'C',true); 
        $p->Cell(($width/2),6,round($M068P029/$data_count,2),1,0,'C',true);  
            break;
        case 11:
            $width=25;
        $p->Cell(($width/2),6,round($M069P003/$data_count,2),1,0,'C',true);  
        $p->Cell(($width/2),6,round($M069P029/$data_count,2),1,0,'C',true);  
            break;  
        default: 
            break;
    }  
        $n++; 
    }   */

  

?>