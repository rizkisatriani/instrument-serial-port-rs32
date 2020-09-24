<?php
// Query sudah OK
 
if($data_t2){
    
$kolom =  array(7,25,30,60,70); 
//print_r($ujipetik);
//foreach($ujipetik as $data){
//    echo $data->tanggal;
//}
 $timestamp = strtotime($tanggal);
 $new_date = date("d-m-Y", $timestamp);
 $cols[0] = $new_date ;
 $cols[1] = "Factory";
 $cols[2] = "Laborat" ;
 $cols[3] = "Analisa";
 $cols[4] = "";
 $cols[5] = 3; 
  
include('pdf_tanggal_inc.php');
$p = new PDF($cols);
 
$p->AddPage();
$unit_control = "";
$width=25;
$fill = false; 
include('cetak_report_condensor_daily_t1.php');
$p->Ln(10);   
$p->setFillColor(236, 240, 241); 
$n= 0; 
 $p->Cell(20,6,"Material1" ,1,0,'C',true);   
foreach($header as $val){ 
    switch ($n) {
        case 5:
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
        $p->Cell($width,6,$val->name ,1,0,'C',true);  
        $n++; 
} 
$p->Ln();


$n= 0;
 $p->Cell(20,6," " ,1,0,'C',true);   
 $x = $p->GetX();
foreach($header as $val){ 
switch ($n) {
        case 5:
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
        $p->Cell(($width/2),6,'pH',1,0,'C',true);  
        $p->Cell(($width/2),6,'Sugar ppm',1,0,'C',true);  
        $n++; 
} 
$p->Ln();

$n= 0;
 $p->Cell(20,6,"Target" ,1,0,'C',true);   
 $x = $p->GetX();
foreach($header as $val){ 
switch ($n) {
        case 5:
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
        $n=0;  
foreach($data_t2 as $val2){                  
switch ($n) { 
    
        case 0:
        $width=25;
        $p->Ln();
        $p->Cell(20,6,$val2->id_jam ,1,0,'C',true);    
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');  
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C');   
        $M051P003 =$M051P003+$val2->pH;  
        $M051P029 =$M051P029+$val2->Sugar; 
            break; 
       case 1:
        $width=25;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');  
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C');  
        $M052P003 =$M052P003+$val2->pH;   
        $M052P029 =$M052P029+$val2->Sugar;  
            break; 
        case 2:
            $width=25;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');   
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C');  
        $M053P003 =$M053P003+$val2->pH;   
        $M053P029 =$M053P029+$val2->Sugar; 
            break; 
        case 3:
            $width=25;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');   
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C');  
        $M054P003 =$M054P003+$val2->pH;    
        $M054P029 =$M054P029+$val2->Sugar;   
            break; 
        case 4:
            $width=25;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');    
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C');  
        $M055P003 =$M055P003+$val2->pH;   
        $M055P029 =$M055P029+$val2->Sugar; 
            break; 
        case 5:
            $width=29;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');   
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C'); 
        $M056P003 =$M056P003+$val2->pH;   
        $M056P029 =$M056P029+$val2->Sugar;  
            break;
        case 6:
            $width=25;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');   
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C');  
        $M062P003 =$M062P003+$val2->pH;   
        $M062P029 =$M062P029+$val2->Sugar;  
            break;
        case 7:
            $width=25;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');   
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C');  
        $M063P003 =$M063P003+$val2->pH;  
        $M063P029 =$M063P029+$val2->Sugar; 
            break;  
        case 8:
            $width=29;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');  
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C'); 
        $M064P003 =$M064P003+$val2->pH;  
        $M064P029 =$M064P029+$val2->Sugar;  
        break;
        case 9:
            $width=29;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');  
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C'); 
        $M068P003 =$M068P003+$val2->pH; 
        $M068P029 =$M068P029+$val2->Sugar; 
            break; 
        case 10:
            $width=29;
        $p->Cell(($width/2),6,round($val2->pH,2),1,0,'C');  
        $p->Cell(($width/2),6,round($val2->Sugar,2),1,0,'C'); 
        $M069P003 =$M069P003+$val2->pH;  
        $M069P029 =$M069P029+$val2->Sugar; 
            break; 
        default: 
            break;
    }  
        $n++; 
        if($n==11){
            $n=0;
        }
    }   
 $n= 0;  
 $p->Ln();
 $p->Cell(20,6,'Average',1,0,'C',true); 
foreach($header as $val2){ 
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
            $width=29;
        $p->Cell(($width/2),6,round($M056P003/$data_count,2),1,0,'C',true);   
        $p->Cell(($width/2),6,round($M056P029/$data_count,2),1,0,'C',true);  
            break;
        case 7:
            $width=25;
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
    }   
    $p->Ln(5);
include('cetak_report_condensor_daily_t3.php');
$p->htmltable($hdr); 
 $p->htmltable($ttd);    
$p->output('absensi_tanggal.pdf','I');      
}else{
    echo " Tidak Ada Data !!";
}


?>