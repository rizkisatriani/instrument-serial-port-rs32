<?php
// Query sudah OK  
if($data1){
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

//header table pertama 
                    $html = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>B-Masc CVP#1</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>B-Masc CVP#2</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>C-Masc CVP#1</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>C-Masc CVP#2</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>C-Masc Head Box</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>Final Molasses</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>FM-2</td> 
                    </tr>  
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    </tr>       
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Target</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    </tr>     
                    "; 
                   $B_Masc_CVP1_Brix="";
                    $B_Masc_CVP1_Polarization="";
                    $B_Masc_CVP2_Brix="";
                    $B_Masc_CVP2_Polarization="";
                    $C_Masc_CVP1_Brix="";
                    $C_Masc_CVP1_Polarization="";
                    $C_Masc_CVP2_Brix="";
                    $C_Masc_CVP2_Polarization="";
                    $C_Masc_Head_Box_Brix="";
                    $C_Masc_Head_Box_Polarization="";
                    $Final_Molasses_Brix="";
                    $Final_Molasses_Polarization="";
                    $Final_Molasses_2_Brix="";
 foreach ($data1 as $val) {  
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
                    $pty4=0; 
                    $pty5=0; 
                    $pty6=0; 

    if ($val->B_Masc_CVP1_Brix!=0&&$val->B_Masc_CVP1_Polarization!=0)$pty1=round($val->B_Masc_CVP1_Brix/$val->B_Masc_CVP1_Polarization*100,2);
    if ($val->B_Masc_CVP2_Brix!=0&&$val->B_Masc_CVP2_Polarization!=0)$pty2=round($val->B_Masc_CVP2_Brix/$val->B_Masc_CVP2_Polarization*100,2);
    if ($val->C_Masc_CVP1_Brix!=0&&$val->C_Masc_CVP1_Polarization!=0)$pty3=round($val->C_Masc_CVP1_Brix/$val->C_Masc_CVP1_Polarization*100,2);
    if ($val->C_Masc_CVP2_Brix!=0&&$val->C_Masc_CVP2_Polarization!=0)$pty4=round($val->C_Masc_CVP2_Brix/$val->C_Masc_CVP2_Polarization*100,2);
    if ($val->C_Masc_Head_Box_Brix!=0&&$val->C_Masc_Head_Box_Polarization!=0)$pty5=round($val->C_Masc_Head_Box_Brix/$val->C_Masc_Head_Box_Polarization*100,2);
    if ($val->Final_Molasses_Brix!=0&&$val->Final_Molasses_Polarization!=0)$pty6=round($val->Final_Molasses_Brix/$val->Final_Molasses_Polarization*100,2);

            $B_Masc_CVP1_Brix=$B_Masc_CVP1_Brix+$val->B_Masc_CVP1_Brix;
            $B_Masc_CVP1_Polarization=$B_Masc_CVP1_Polarization+$val->B_Masc_CVP1_Polarization;
            $B_Masc_CVP2_Brix=$B_Masc_CVP2_Brix+$val->B_Masc_CVP2_Brix;
            $B_Masc_CVP2_Polarization=$B_Masc_CVP2_Polarization+$val->B_Masc_CVP2_Polarization;
            $C_Masc_CVP1_Brix=$C_Masc_CVP1_Brix+$val->C_Masc_CVP1_Brix;
            $C_Masc_CVP1_Polarization=$C_Masc_CVP1_Polarization+$val->C_Masc_CVP1_Polarization;
            $C_Masc_CVP2_Brix=$C_Masc_CVP2_Brix+$val->C_Masc_CVP2_Brix;
            $C_Masc_CVP2_Polarization=$C_Masc_CVP2_Polarization+$val->C_Masc_CVP2_Polarization;
            $C_Masc_Head_Box_Brix=$C_Masc_Head_Box_Brix+$val->C_Masc_Head_Box_Brix;
            $C_Masc_Head_Box_Polarization=$C_Masc_Head_Box_Polarization+$val->C_Masc_Head_Box_Polarization;
            $Final_Molasses_Brix=$Final_Molasses_Brix+$val->Final_Molasses_Brix;
            $Final_Molasses_Polarization=$Final_Molasses_Polarization+$val->Final_Molasses_Polarization;
            $Final_Molasses_2_Brix=$Final_Molasses_2_Brix+$val->Final_Molasses_2_Brix;

           $html .= " <tr> <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td>
           <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Masc_CVP1_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Masc_CVP1_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Masc_CVP2_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Masc_CVP2_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Masc_CVP1_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Masc_CVP1_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Masc_CVP2_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Masc_CVP2_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty4</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Masc_Head_Box_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Masc_Head_Box_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty5</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Final_Molasses_Brix</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Final_Molasses_Polarization</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$pty6</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Final_Molasses_2_Brix</td>
            </tr> ";  
 }
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
                    $pty4=0; 
                    $pty5=0; 
                    $pty6=0; 

    if ($B_Masc_CVP1_Brix!=0&&$B_Masc_CVP1_Polarization!=0)$pty1=round($B_Masc_CVP1_Brix/$B_Masc_CVP1_Polarization*100,2);
    if ($B_Masc_CVP2_Brix!=0&&$B_Masc_CVP2_Polarization!=0)$pty2=round($B_Masc_CVP2_Brix/$B_Masc_CVP2_Polarization*100,2);
    if ($C_Masc_CVP1_Brix!=0&&$C_Masc_CVP1_Polarization!=0)$pty3=round($C_Masc_CVP1_Brix/$C_Masc_CVP1_Polarization*100,2);
    if ($C_Masc_CVP2_Brix!=0&&$C_Masc_CVP2_Polarization!=0)$pty4=round($C_Masc_CVP2_Brix/$C_Masc_CVP2_Polarization*100,2);
    if ($C_Masc_Head_Box_Brix!=0&&$C_Masc_Head_Box_Polarization!=0)$pty5=round($C_Masc_Head_Box_Brix/$C_Masc_Head_Box_Polarization*100,2);
    if ($Final_Molasses_Brix!=0&&$Final_Molasses_Polarization!=0)$pty6=round($Final_Molasses_Brix/$Final_Molasses_Polarization*100,2);
 $html .= " <tr bgcolor='#EDEDED'>  
            <td width='4%' align='center' valign='middle' size='6' style='B'>Average</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Masc_CVP1_Brix/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Masc_CVP1_Polarization/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty1/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Masc_CVP2_Brix/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Masc_CVP2_Polarization/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty2/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Masc_CVP1_Brix/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Masc_CVP1_Polarization/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty3/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Masc_CVP2_Brix/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Masc_CVP2_Polarization/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty4/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Masc_Head_Box_Brix/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Masc_Head_Box_Polarization/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty5/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$Final_Molasses_Brix/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$Final_Molasses_Polarization/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty6/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$Final_Molasses_2_Brix/$data_count."</td>
            </tr> 
            </table>";

//header table kedua 

             $html2 = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>
                    <td width='4%' colspan='4' align='center' valign='middle' size='6' style='B'>B Magma</td>
                    <td width='4%' colspan='4' align='center' valign='middle' size='6' style='B'>C Magma</td> 
                    <td width='4%' colspan='4' align='center' valign='middle' size='6' style='B'>B/C Melting</td> 
                    <td width='4%' colspan='4' align='center' valign='middle' size='6' style='B'>C1 Sugar</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>C-Wash</td> 
                    </tr>  
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Colour (IU)</td>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Colour (IU)</td>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Colour (IU)</td>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Colour (IU)</td>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>    
                    </tr>       
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Target</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    </tr> 
                    "; 

                    $B_Magma_Brix="";
                    $B_Magma_Polarization="";
                    $B_Magma_Liquid_Colour="";
                    $C_Magma_Brix="";
                    $C_Magma_Polarization="";
                    $C_Magma_Liquid_Colour="";
                    $B_C_Melting_Brix="";
                    $B_C_Melting_Polarization="";
                    $B_C_Melting_Liquid_Colour="";
                    $C1_Sugar_Brix="";
                    $C1_Sugar_Polarization="";
                    $C1_Sugar_Liquid_Colour="";
                    $C_Wash_Brix="";
                    $C_Wash_Polarization ="";
 foreach ($data2 as $val) {  
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
                    $pty4=0; 
                    $pty5=0; 

    if ($val->B_Magma_Brix!=0&&$val->B_Magma_Polarization!=0)$pty1=round($val->B_Magma_Brix/$val->B_Magma_Polarization*100,2);
    if ($val->C_Magma_Brix!=0&&$val->C_Magma_Polarization!=0)$pty2=round($val->C_Magma_Brix/$val->C_Magma_Polarization*100,2);
    if ($val->B_C_Melting_Brix!=0&&$val->B_C_Melting_Polarization!=0)$pty3=round($val->B_C_Melting_Brix/$val->B_C_Melting_Polarization*100,2);
    if ($val->C1_Sugar_Brix!=0&&$val->C1_Sugar_Polarization!=0)$pty4=round($val->C1_Sugar_Brix/$val->C1_Sugar_Polarization*100,2);
    if ($val->C_Wash_Brix!=0&&$val->C_Wash_Polarization!=0)$pty5=round($val->C_Wash_Brix/$val->C_Wash_Polarization*100,2);

$B_Magma_Brix=$B_Magma_Brix+$val->B_Magma_Brix;
$B_Magma_Polarization=$B_Magma_Polarization+$val->B_Magma_Polarization;
$B_Magma_Liquid_Colour=$B_Magma_Liquid_Colour+$val->B_Magma_Liquid_Colour;
$C_Magma_Brix=$C_Magma_Brix+$val->C_Magma_Brix;
$C_Magma_Polarization=$C_Magma_Polarization+$val->C_Magma_Polarization;
$C_Magma_Liquid_Colour=$C_Magma_Liquid_Colour+$val->C_Magma_Liquid_Colour;
$B_C_Melting_Brix=$B_C_Melting_Brix+$val->B_C_Melting_Brix;
$B_C_Melting_Polarization=$B_C_Melting_Polarization+$val->B_C_Melting_Polarization;
$B_C_Melting_Liquid_Colour=$B_C_Melting_Liquid_Colour+$val->B_C_Melting_Liquid_Colour;
$C1_Sugar_Brix=$C1_Sugar_Brix+$val->C1_Sugar_Brix;
$C1_Sugar_Polarization=$C1_Sugar_Polarization+$val->C1_Sugar_Polarization;
$C1_Sugar_Liquid_Colour=$C1_Sugar_Liquid_Colour+$val->C1_Sugar_Liquid_Colour;
$C_Wash_Brix=$C_Wash_Brix+$val->C_Wash_Brix;
$C_Wash_Polarization=$C_Wash_Polarization+$val->C_Wash_Polarization;

$html2 .= " <tr> <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Magma_Brix</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Magma_Polarization</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Magma_Liquid_Colour</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Magma_Brix</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Magma_Polarization</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Magma_Liquid_Colour</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_C_Melting_Brix</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_C_Melting_Polarization</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_C_Melting_Liquid_Colour</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C1_Sugar_Brix</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C1_Sugar_Polarization</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$pty4</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C1_Sugar_Liquid_Colour</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Wash_Brix</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$val->C_Wash_Polarization</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>$pty5</td>
            </tr> ";  

} 
                     $pty1=0;
                    $pty2=0;
                    $pty3=0; 
                    $pty4=0; 
                    $pty5=0; 

    if ($B_Magma_Brix!=0&&$B_Magma_Polarization!=0)$pty1=round($B_Magma_Brix/$B_Magma_Polarization*100,2);
    if ($C_Magma_Brix!=0&&$C_Magma_Polarization!=0)$pty2=round($C_Magma_Brix/$C_Magma_Polarization*100,2);
    if ($B_C_Melting_Brix!=0&&$B_C_Melting_Polarization!=0)$pty3=round($B_C_Melting_Brix/$B_C_Melting_Polarization*100,2);
    if ($C1_Sugar_Brix!=0&&$C1_Sugar_Polarization!=0)$pty4=round($C1_Sugar_Brix/$C1_Sugar_Polarization*100,2);
    if ($C_Wash_Brix!=0&&$C_Wash_Polarization!=0)$pty5=round($C_Wash_Brix/$C_Wash_Polarization*100,2); 
$html2 .= " <tr bgcolor='#EDEDED'> <td width='4%' align='center' valign='middle' size='6' style='B'>Average</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Magma_Brix/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Magma_Polarization/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$pty1/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Magma_Liquid_Colour/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Magma_Brix/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Magma_Polarization/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$pty2/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Magma_Liquid_Colour/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$B_C_Melting_Brix/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$B_C_Melting_Polarization/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$pty3/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$B_C_Melting_Liquid_Colour/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C1_Sugar_Brix/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C1_Sugar_Polarization/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$pty4/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C1_Sugar_Liquid_Colour/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Wash_Brix/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$C_Wash_Polarization/$data_count."</td>
<td width='4%' align='center' valign='middle' size='6' style='B'>".$pty5/$data_count."</td>
            </tr> 
            </table>";  

//header table ketiga
             $html3 = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>
                    <td width='4%' colspan='4' align='center' valign='middle' size='6' style='B'>A-Mol @Tank</td>
                    <td width='4%' colspan='4' align='center' valign='middle' size='6' style='B'>A-Wash</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'> B-Mol Heavy</td> 
                    <td width='4%' colspan='4' align='center' valign='middle' size='6' style='B'>B-Mol @Tank</td> 
                    <td width='4%' colspan='1' align='center' valign='middle' size='6' style='B'>Scrubber</td> 
                    </tr>  
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Colour (IU)</td>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Colour (IU)</td>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>       
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Colour (IU)</td>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>      
                    </tr>       
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Target</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td> 
                    </tr> 
                    "; 
                    $A_Mol_Tank_Brix="";
                    $A_Mol_Tank_Polarization="";
                    $A_Mol_Tank_Liquid_Colour="";
                    $A_Wash_Brix="";
                    $A_Wash_Polarization="";
                    $A_Wash_Liquid_Colour="";
                    $B_Mol_Heavy_Brix="";
                    $B_Mol_Heavy_Polarization=""; 
                    $B_Mol_Tank_Brix="";
                    $B_Mol_Tank_Polarization="";
                    $B_Mol_Tank_Liquid_Colour="";
                    $Sugar_Scrubber_Brix="";


 
                     foreach ($data3 as $val) {  
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
                    $pty4=0; 

    if ($val->A_Mol_Tank_Brix!=0&&$val->A_Mol_Tank_Polarization!=0)$pty1=round($val->A_Mol_Tank_Brix/$val->A_Mol_Tank_Polarization*100,2);
    if ($val->A_Wash_Brix!=0&&$val->A_Wash_Polarization!=0)$pty2=round($val->A_Wash_Brix/$val->A_Wash_Polarization*100,2);
    if ($val->B_Mol_Heavy_Brix!=0&&$val->B_Mol_Heavy_Polarization!=0)$pty3=round($val->B_Mol_Heavy_Brix/$val->B_Mol_Heavy_Polarization*100,2);
    if ($val->B_Mol_Tank_Brix!=0&&$val->B_Mol_Tank_Polarization!=0)$pty4=round($val->B_Mol_Tank_Brix/$val->B_Mol_Tank_Polarization*100,2);
   
    $A_Mol_Tank_Brix=$A_Mol_Tank_Brix+$val->A_Mol_Tank_Brix;
    $A_Mol_Tank_Polarization=$A_Mol_Tank_Polarization+$val->A_Mol_Tank_Polarization;
    $A_Mol_Tank_Liquid_Colour=$A_Mol_Tank_Liquid_Colour+$val->A_Mol_Tank_Liquid_Colour;
    $A_Wash_Brix=$A_Wash_Brix+$val->A_Wash_Brix;
    $A_Wash_Polarization=$A_Wash_Polarization+$val->A_Wash_Polarization;
    $A_Wash_Liquid_Colour=$A_Wash_Liquid_Colour+$val->A_Wash_Liquid_Colour;
    $B_Mol_Heavy_Brix=$B_Mol_Heavy_Brix+$val->B_Mol_Heavy_Brix;
    $B_Mol_Heavy_Polarization=$B_Mol_Heavy_Polarization+$val->B_Mol_Heavy_Polarization; 
    $B_Mol_Tank_Brix=$B_Mol_Tank_Brix+$val->B_Mol_Tank_Brix;
    $B_Mol_Tank_Polarization=$B_Mol_Tank_Polarization+$val->B_Mol_Tank_Polarization;
    $B_Mol_Tank_Liquid_Colour=$B_Mol_Tank_Liquid_Colour+$val->B_Mol_Tank_Liquid_Colour;
    $Sugar_Scrubber_Brix=$Sugar_Scrubber_Brix+$val->Sugar_Scrubber_Brix;

    $html3 .= " <tr> <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Mol_Tank_Brix</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Mol_Tank_Polarization</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Mol_Tank_Liquid_Colour</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Wash_Brix</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Wash_Polarization</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->A_Wash_Liquid_Colour</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Mol_Heavy_Brix</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Mol_Heavy_Polarization</td> 
                <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Mol_Tank_Brix</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Mol_Tank_Polarization</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$pty4</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->B_Mol_Tank_Liquid_Colour</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Sugar_Scrubber_Brix</td>
            </tr> ";  
        
            } 
                    $pty1=0;
                    $pty2=0;
                    $pty3=0; 
                    $pty4=0; 

    if ($A_Mol_Tank_Brix!=0&&$A_Mol_Tank_Polarization!=0)$pty1=round($A_Mol_Tank_Brix/$A_Mol_Tank_Polarization*100,2);
    if ($A_Wash_Brix!=0&&$A_Wash_Polarization!=0)$pty2=round($A_Wash_Brix/$A_Wash_Polarization*100,2);
    if ($B_Mol_Heavy_Brix!=0&&$B_Mol_Heavy_Polarization!=0)$pty3=round($B_Mol_Heavy_Brix/$B_Mol_Heavy_Polarization*100,2);
    if ($B_Mol_Tank_Brix!=0&&$B_Mol_Tank_Polarization!=0)$pty4=round($B_Mol_Tank_Brix/$B_Mol_Tank_Polarization*100,2);
       $html3 .= " <tr bgcolor='#EDEDED'> <td width='4%' align='center' valign='middle' size='6' style='B'>Average</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$A_Mol_Tank_Brix/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$A_Mol_Tank_Polarization/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty1/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$A_Mol_Tank_Liquid_Colour/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$A_Wash_Brix/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$A_Wash_Polarization/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty2/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$A_Wash_Liquid_Colour/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Mol_Heavy_Brix/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Mol_Heavy_Polarization/$data_count."</td> 
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty3/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Mol_Tank_Brix/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Mol_Tank_Polarization/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty4/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$B_Mol_Tank_Liquid_Colour/$data_count."</td>
        <td width='4%' align='center' valign='middle' size='6' style='B'>".$Sugar_Scrubber_Brix/$data_count."</td>
            </tr> 
            </table>";  

            $html4 = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' style='B'>Material</td>
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>Nuscth C-CVP #1</td>
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>Nuscth C-CVP #2</td>  
                    </tr>  
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>       
                    </tr>       
                    <tr bgcolor='#EDEDED'>     
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Target</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'></td>   
                    </tr> 
                    "; 
                    $Nuscth_C_CVP_1_Brix="";
                    $Nuscth_C_CVP_1_Polarization="";
                    $Nuscth_C_CVP_2_Brix="";
                    $Nuscth_C_CVP_2_Polarization="";
 foreach ($data4 as $val) {  
                    $pty1=0;
                    $pty2=0; 

    if ($val->Nuscth_C_CVP_1_Brix!=0&&$val->Nuscth_C_CVP_1_Polarization!=0)$pty1=round($val->Nuscth_C_CVP_1_Brix/$val->Nuscth_C_CVP_1_Polarization*100,2);
    if ($val->Nuscth_C_CVP_2_Brix!=0&&$val->Nuscth_C_CVP_2_Polarization!=0)$pty2=round($val->Nuscth_C_CVP_2_Brix/$val->Nuscth_C_CVP_2_Polarization*100,2);
   $Nuscth_C_CVP_1_Brix=$Nuscth_C_CVP_1_Brix+$val->Nuscth_C_CVP_1_Brix;
$Nuscth_C_CVP_1_Polarization=$Nuscth_C_CVP_1_Polarization+$val->Nuscth_C_CVP_1_Polarization;
$Nuscth_C_CVP_2_Brix=$Nuscth_C_CVP_2_Brix+$val->Nuscth_C_CVP_2_Brix;
$Nuscth_C_CVP_2_Polarization=$Nuscth_C_CVP_2_Polarization+$val->Nuscth_C_CVP_2_Polarization;
    $html4 .= " <tr> <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Nuscth_C_CVP_1_Brix</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Nuscth_C_CVP_1_Polarization</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Nuscth_C_CVP_2_Brix</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Nuscth_C_CVP_2_Polarization</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td>
            </tr> ";  
        
            } 
                    $pty1=0;
                    $pty2=0;  
    if ($Nuscth_C_CVP_1_Brix!=0&&$Nuscth_C_CVP_1_Polarization!=0)$pty1=round($Nuscth_C_CVP_1_Brix/$Nuscth_C_CVP_1_Polarization*100,2);
    if ($Nuscth_C_CVP_2_Brix!=0&&$Nuscth_C_CVP_2_Polarization!=0)$pty2=round($Nuscth_C_CVP_2_Brix/$Nuscth_C_CVP_2_Polarization*100,2);
     $html4 .= " <tr bgcolor='#EDEDED'> <td width='4%' align='center' valign='middle' size='6' style='B'>Average</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$Nuscth_C_CVP_1_Brix/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$Nuscth_C_CVP_1_Polarization/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty1/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$Nuscth_C_CVP_2_Brix/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$Nuscth_C_CVP_2_Polarization/$data_count."</td>
                <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty2/$data_count."</td>
            </tr> ";


$p->htmltable($html); 
$p->Ln(2); 
$p->htmltable($html2); 
$p->Ln(2); 
 $p->htmltable($html3); 
$p->Ln(2); 
 $p->htmltable($html4); 
$p->Ln(2); 
 
$tglName = date('YmdHis');   
$p->output('DAILY BOILING MATERIAL ANALYSIS REPORT_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>