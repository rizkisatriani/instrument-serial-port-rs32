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
$getheader=true; 
 
                    $html = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' colspan='8' align='center' valign='middle' size='6' style='B'>A-Massecuite</td>
                    <td width='4%' colspan='6' align='center' valign='middle' size='6' style='B'>A-Graining</td>  
                    <td width='4%' colspan='6' align='center' valign='middle' size='6' style='B'>A-Seed</td>  
                    </tr>  
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Strike</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>BT</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>  
                    </tr>     
                    "; 
                    $A_Massecuite_No_Strike="";
                    $A_Massecuite_Pan_Strike="";
                    $A_Massecuite_Boiling_Time="";
                    $A_Massecuite_Volume="";
                    $A_Massecuite_Brix="";
                    $A_Massecuite_Polarization=""; 
                    $A_Graining_Time_Strike=""; 
                    $A_Graining_Pan_Strike="";
                    $A_Graining_Volume="";
                    $A_Graining_Brix="";
                    $A_Graining_Polarization="";  
                    $A_Seed_Time_Strike="";
                    $A_Seed_Pan_Strike="";
                    $A_Seed_Volume="";
                    $A_Seed_Brix="";
                    $A_Seed_Polarization="";  
 foreach ($data as $val) {  
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
    if ($val->A_Massecuite_Polarization!=0 && $val->A_Massecuite_Brix!=0){
    $pty1=round($val->A_Massecuite_Polarization/$val->A_Massecuite_Brix*100,2);
        }
    if ($val->A_Graining_Polarization!=0&&$val->A_Graining_Brix!=0){
        $pty2=round($val->A_Graining_Polarization/$val->A_Graining_Brix*100,2);
    }
    if ($val->A_Seed_Brix!=0&&$val->A_Seed_Polarization!=0){
        $pty3=round($val->A_Seed_Polarization/$val->A_Seed_Brix*100,2); 
    }

            $A_Massecuite_No_Strike=$A_Massecuite_No_Strike+$val->A_Massecuite_No_Strike;
            $A_Massecuite_Pan_Strike=$A_Massecuite_Pan_Strike+$val->A_Massecuite_Pan_Strike;
            $A_Massecuite_Boiling_Time=$A_Massecuite_Boiling_Time+$val->A_Massecuite_Boiling_Time;
            $A_Massecuite_Volume=$A_Massecuite_Volume+$val->A_Massecuite_Volume;
            $A_Massecuite_Brix=$A_Massecuite_Brix+$val->A_Massecuite_Brix;
            $A_Massecuite_Polarization=$A_Massecuite_Polarization+$val->A_Massecuite_Polarization;
            $A_Graining_Time_Strike=$A_Graining_Time_Strike+$val->A_Graining_Time_Strike;
            $A_Graining_Pan_Strike=$A_Graining_Pan_Strike+$val->A_Graining_Pan_Strike;
            $A_Graining_Volume=$A_Graining_Volume+$val->A_Graining_Volume;
            $A_Graining_Brix=$A_Graining_Brix+$val->A_Graining_Brix;
            $A_Graining_Polarization=$A_Graining_Polarization+$val->A_Graining_Polarization ;
            $A_Seed_Time_Strike=$A_Seed_Time_Strike+$val->A_Seed_Time_Strike;
            $A_Seed_Pan_Strike=$A_Seed_Pan_Strike+$val->A_Seed_Pan_Strike;
            $A_Seed_Volume=$A_Seed_Volume+$val->A_Seed_Volume;
            $A_Seed_Brix=$A_Seed_Brix+$val->A_Seed_Brix;
            $A_Seed_Polarization=$A_Seed_Polarization+$val->A_Seed_Polarization;

            $html .= " <tr> <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Massecuite_No_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Massecuite_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Massecuite_Boiling_Time</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Massecuite_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Massecuite_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Massecuite_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Graining_Time_Strike</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Graining_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Graining_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Graining_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Graining_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Seed_Time_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Seed_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Seed_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Seed_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Seed_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td> 
            </tr> ";  
 }
 if ($A_Massecuite_Polarization!=0 && $A_Massecuite_Brix!=0){
    $pty1=round($A_Massecuite_Polarization/$A_Massecuite_Brix*100,2);
        }
    if ($A_Graining_Polarization!=0&&$A_Graining_Brix!=0){
        $pty2=round($A_Graining_Polarization/$A_Graining_Brix*100,2);
    }
     if ($A_Seed_Brix!=0&&$A_Seed_Polarization!=0){
        $pty3=round($A_Seed_Polarization/$A_Seed_Brix*100,2); 
    }
 $html .= " <tr bgcolor='#EDEDED'> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>Average</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Massecuite_No_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Massecuite_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Massecuite_Boiling_Time</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Massecuite_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Massecuite_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Massecuite_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Graining_Time_Strike</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Graining_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Graining_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Graining_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Graining_Polarization</td>  
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Seed_Time_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Seed_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Seed_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Seed_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$A_Seed_Polarization</td>  
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td> 
            </tr>  
             </table>";

 $html2 = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' colspan='8' align='center' valign='middle' size='6' style='B'>B-Massecuite</td>
                    <td width='4%' colspan='6' align='center' valign='middle' size='6' style='B'>B-Graining</td>  
                    <td width='4%' colspan='6' align='center' valign='middle' size='6' style='B'>B-Seed</td>  
                    </tr>  
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Strike</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>BT</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>  
                    </tr>     
                    "; 
                    $B_Massecuite_Batch_Pan_No_Strike="";
                    $B_Massecuite_Batch_Pan_Pan_Strike="";
                    $B_Massecuite_Batch_Pan_Boiling_Time="";
                    $B_Massecuite_Batch_Pan_Volume="";
                    $B_Massecuite_Batch_Pan_Brix="";
                    $B_Massecuite_Batch_Pan_Polarization=""; 
                    $B_Graining_Time_Strike=""; 
                    $B_Graining_Pan_Strike="";
                    $B_Graining_Volume="";
                    $B_Graining_Brix="";
                    $B_Graining_Polarization="";  
                    $B_Seed_Time_Strike="";
                    $B_Seed_Pan_Strike="";
                    $B_Seed_Volume="";
                    $B_Seed_Brix="";
                    $B_Seed_Polarization=""; 

    foreach ($data2 as $val) {  
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
   if ($val->B_Massecuite_Batch_Pan_Polarization!=0 && $val->B_Massecuite_Batch_Pan_Brix!=0){
    $pty1=round($val->B_Massecuite_Batch_Pan_Polarization/$val->B_Massecuite_Batch_Pan_Brix*100,2);
        }
    if ($val->B_Graining_Polarization!=0&&$val->B_Graining_Brix!=0){
        $pty2=round($val->B_Graining_Polarization/$val->B_Graining_Brix*100,2);
    }
     if ($val->B_Seed_Brix!=0&&$val->B_Seed_Polarization!=0){
        $pty3=round($val->B_Seed_Polarization/$val->B_Seed_Brix*100,2); 
    }

    $B_Massecuite_Batch_Pan_No_Strike=$B_Massecuite_Batch_Pan_No_Strike+$val->B_Massecuite_Batch_Pan_No_Strike;
            $B_Massecuite_Batch_Pan_Pan_Strike=$B_Massecuite_Batch_Pan_Pan_Strike+$val->B_Massecuite_Batch_Pan_Pan_Strike;
            $B_Massecuite_Batch_Pan_Boiling_Time=$B_Massecuite_Batch_Pan_Boiling_Time+$val->B_Massecuite_Batch_Pan_Boiling_Time;
            $B_Massecuite_Batch_Pan_Volume=$B_Massecuite_Batch_Pan_Volume+$val->B_Massecuite_Batch_Pan_Volume;
            $B_Massecuite_Batch_Pan_Brix=$B_Massecuite_Batch_Pan_Brix+$val->B_Massecuite_Batch_Pan_Brix;
            $B_Massecuite_Batch_Pan_Polarization=$B_Massecuite_Batch_Pan_Polarization+$val->B_Massecuite_Batch_Pan_Polarization;
            $B_Graining_Time_Strike=$B_Graining_Time_Strike+$val->B_Graining_Time_Strike;
            $B_Graining_Pan_Strike=$B_Graining_Pan_Strike+$val->B_Graining_Pan_Strike;
            $B_Graining_Volume=$B_Graining_Volume+$val->B_Graining_Volume;
            $B_Graining_Brix=$B_Graining_Brix+$val->B_Graining_Brix;
            $B_Graining_Polarization=$B_Graining_Polarization+$val->B_Graining_Polarization ;
            $B_Seed_Time_Strike=$B_Seed_Time_Strike+$val->B_Seed_Time_Strike;
            $B_Seed_Pan_Strike=$B_Seed_Pan_Strike+$val->B_Seed_Pan_Strike;
            $B_Seed_Volume=$B_Seed_Volume+$val->B_Seed_Volume;
            $B_Seed_Brix=$B_Seed_Brix+$val->B_Seed_Brix;
            $B_Seed_Polarization=$B_Seed_Polarization+$val->B_Seed_Polarization;
    $html2 .= " <tr> <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Massecuite_Batch_Pan_No_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Massecuite_Batch_Pan_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Massecuite_Batch_Pan_Boiling_Time</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Massecuite_Batch_Pan_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Massecuite_Batch_Pan_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Massecuite_Batch_Pan_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Graining_Time_Strike</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Graining_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Graining_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Graining_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Graining_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Seed_Time_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Seed_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Seed_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Seed_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Seed_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td> 
            </tr> "; 

        }
             if ($B_Massecuite_Batch_Pan_Polarization!=0 && $B_Massecuite_Batch_Pan_Brix!=0){
    $pty1=round($B_Massecuite_Batch_Pan_Polarization/$B_Massecuite_Batch_Pan_Brix*100,2);
        }
    if ($B_Graining_Polarization!=0&&$B_Graining_Brix!=0){
        $pty2=round($B_Graining_Polarization/$B_Graining_Brix*100,2);
    }
     if ($B_Seed_Brix!=0&&$B_Seed_Polarization!=0){
        $pty3=round($B_Seed_Polarization/$B_Seed_Brix*100,2); 
    }
 $html2 .= " <tr bgcolor='#EDEDED'> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>Average</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Massecuite_Batch_Pan_No_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Massecuite_Batch_Pan_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Massecuite_Batch_Pan_Boiling_Time</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Massecuite_Batch_Pan_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Massecuite_Batch_Pan_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Massecuite_Batch_Pan_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Graining_Time_Strike</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Graining_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Graining_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Graining_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Graining_Polarization</td>  
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Seed_Time_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Seed_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Seed_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Seed_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$B_Seed_Polarization</td>  
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td> 
            </tr>  
             </table>";

             $html3 = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' colspan='8' align='center' valign='middle' size='6' style='B'>C-Massecuite</td>
                    <td width='4%' colspan='6' align='center' valign='middle' size='6' style='B'>C-Graining</td>  
                    <td width='4%' colspan='6' align='center' valign='middle' size='6' style='B'>C-Seed</td>  
                    </tr>  
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Strike</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>BT</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Time</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pan</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Volume</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty</td>  
                    </tr>     
                    "; 
                    $C_Massecuite_Batch_Pan_No_Strike="";
                    $C_Massecuite_Batch_Pan_Pan_Strike="";
                    $C_Massecuite_Batch_Pan_Boiling_Time="";
                    $C_Massecuite_Batch_Pan_Volume="";
                    $C_Massecuite_Batch_Pan_Brix="";
                    $C_Massecuite_Batch_Pan_Polarization=""; 
                    $C_Graining_Time_Strike=""; 
                    $C_Graining_Pan_Strike="";
                    $C_Graining_Volume="";
                    $C_Graining_Brix="";
                    $C_Graining_Polarization="";  
                    $C_Seed_Time_Strike="";
                    $C_Seed_Pan_Strike="";
                    $C_Seed_Volume="";
                    $C_Seed_Brix="";
                    $C_Seed_Polarization=""; 

    foreach ($data3 as $val) {  
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
   if ($val->C_Massecuite_Batch_Pan_Polarization!=0 && $val->C_Massecuite_Batch_Pan_Brix!=0){
    $pty1=round($val->C_Massecuite_Batch_Pan_Polarization/$val->C_Massecuite_Batch_Pan_Brix*100,2);
        }
    if ($val->C_Graining_Polarization!=0&&$val->C_Graining_Brix!=0){
        $pty2=round($val->C_Graining_Polarization/$val->C_Graining_Brix*100,2);
    }
     if ($val->C_Seed_Brix!=0&&$val->C_Seed_Polarization!=0){
        $pty3=round($val->C_Seed_Polarization/$val->C_Seed_Brix*100,2); 
    }

    $C_Massecuite_Batch_Pan_No_Strike=$C_Massecuite_Batch_Pan_No_Strike+$val->C_Massecuite_Batch_Pan_No_Strike;
            $C_Massecuite_Batch_Pan_Pan_Strike=$C_Massecuite_Batch_Pan_Pan_Strike+$val->C_Massecuite_Batch_Pan_Pan_Strike;
            $C_Massecuite_Batch_Pan_Boiling_Time=$C_Massecuite_Batch_Pan_Boiling_Time+$val->C_Massecuite_Batch_Pan_Boiling_Time;
            $C_Massecuite_Batch_Pan_Volume=$C_Massecuite_Batch_Pan_Volume+$val->C_Massecuite_Batch_Pan_Volume;
            $C_Massecuite_Batch_Pan_Brix=$C_Massecuite_Batch_Pan_Brix+$val->C_Massecuite_Batch_Pan_Brix;
            $C_Massecuite_Batch_Pan_Polarization=$C_Massecuite_Batch_Pan_Polarization+$val->C_Massecuite_Batch_Pan_Polarization;
            $C_Graining_Time_Strike=$C_Graining_Time_Strike+$val->C_Graining_Time_Strike;
            $C_Graining_Pan_Strike=$C_Graining_Pan_Strike+$val->C_Graining_Pan_Strike;
            $C_Graining_Volume=$C_Graining_Volume+$val->C_Graining_Volume;
            $C_Graining_Brix=$C_Graining_Brix+$val->C_Graining_Brix;
            $C_Graining_Polarization=$C_Graining_Polarization+$val->C_Graining_Polarization ;
            $C_Seed_Time_Strike=$C_Seed_Time_Strike+$val->C_Seed_Time_Strike;
            $C_Seed_Pan_Strike=$C_Seed_Pan_Strike+$val->C_Seed_Pan_Strike;
            $C_Seed_Volume=$C_Seed_Volume+$val->C_Seed_Volume;
            $C_Seed_Brix=$C_Seed_Brix+$val->C_Seed_Brix;
            $C_Seed_Polarization=$C_Seed_Polarization+$val->C_Seed_Polarization;
    $html3 .= " <tr> <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Massecuite_Batch_Pan_No_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Massecuite_Batch_Pan_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Massecuite_Batch_Pan_Boiling_Time</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Massecuite_Batch_Pan_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Massecuite_Batch_Pan_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Massecuite_Batch_Pan_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Graining_Time_Strike</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Graining_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Graining_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Graining_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Graining_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Seed_Time_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Seed_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Seed_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Seed_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Seed_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td> 
            </tr> "; 

        }
             if ($C_Massecuite_Batch_Pan_Polarization!=0 && $C_Massecuite_Batch_Pan_Brix!=0){
    $pty1=round($C_Massecuite_Batch_Pan_Polarization/$C_Massecuite_Batch_Pan_Brix*100,2);
        }
    if ($C_Graining_Polarization!=0&&$C_Graining_Brix!=0){
        $pty2=round($C_Graining_Polarization/$C_Graining_Brix*100,2);
    }
     if ($C_Seed_Brix!=0&&$C_Seed_Polarization!=0){
        $pty3=round($C_Seed_Polarization/$C_Seed_Brix*100,2); 
    }
 $html3 .= " <tr bgcolor='#EDEDED'> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>Average</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Massecuite_Batch_Pan_No_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Massecuite_Batch_Pan_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Massecuite_Batch_Pan_Boiling_Time</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Massecuite_Batch_Pan_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Massecuite_Batch_Pan_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Massecuite_Batch_Pan_Polarization</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Graining_Time_Strike</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Graining_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Graining_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Graining_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Graining_Polarization</td>  
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Seed_Time_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Seed_Pan_Strike</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Seed_Volume</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Seed_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$C_Seed_Polarization</td>  
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td> 
            </tr>  
             </table>";
       //echo $html;
$p->htmltable($html); 
$p->Ln(2); 
$p->htmltable($html2); 
$p->Ln(2); 
$p->htmltable($html3); 
$p->Ln(2); 
 
$tglName = date('YmdHis');   
$p->output('DAILY BATCH PAN MASSECUITE ANALYSIS REPORT_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>