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
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' style='B'>Time</td>
                    <td width='4%' colspan='2' align='center' valign='middle' size='6' style='B'>Shreddered Cane</td> 
                    <td width='4%' colspan='5' align='center' valign='middle' size='6' style='B'>First Expressed Juice</td>
                    <td width='4%' colspan='9' align='center' valign='middle' size='6' style='B'>Mixed Juice</td> 
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' style='B'>Last Expressed Juice</td>
                    <td width='4%' colspan='2' align='center' valign='middle' size='6' style='B'>Final Bagasse</td>  
                </tr>  
                <tr bgcolor='#EDEDED'>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>PI (%)</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Fiber (%)</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>RS (%Bx)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>pH</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>RS (%Bx)</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>P2O5bfr (ppm)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>P2O5afr (ppm)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Solid (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Losses (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Brix (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pty (%)</td>   
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Pol (%)</td>    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Moist. (%)</td>  
                </tr>"; 
                    
    $M004_P009="";
    $M004_P010="";
    $M001_P001="";
    $M001_P002=""; 
    $M001_P003="";
    $M001_P007="";
    $M002_P001="";
    $M002_P002=""; 
    $M002_P003="";
    $M002_P005="";
    $M002_P006="";
    $M002_P007="";
    $M002_P075="";
    $M002_P077="";
    $M003_P001="";
    $M003_P002=""; 
    $M005_P002="";
    $M005_P008="";
    
    $pi = "-";
    $count_pi=0;
    
    
    foreach ($data as $val) {  
        $pty1=0;
        $pty2=0;
        $pty3=0; 
        
        if ($val->M001_P001!=0&&$val->M001_P002!=0)$pty1=fix_rounding($val->M001_P002/$val->M001_P001*100,2);
        if ($val->M002_P001!=0&&$val->M002_P002!=0)$pty2=fix_rounding($val->M002_P002/$val->M002_P001*100,2);
        if ($val->M003_P001!=0&&$val->M003_P002!=0)$pty3=fix_rounding($val->M003_P002/$val->M003_P001*100,2);
        
        $M004_P009=$M004_P009+$val->M004_P009;
        $M004_P010=$M004_P010+$val->M004_P010;
        $M001_P001=$M001_P001+$val->M001_P001;
        $M001_P002=$M001_P002+$val->M001_P002;
        $M001_P003=$M001_P003+$val->M001_P003;
        $M001_P007=$M001_P007+$val->M001_P007;
        $M002_P001=$M002_P001+$val->M002_P001;
        $M002_P002=$M002_P002+$val->M002_P002;
        $M002_P003=$M002_P003+$val->M002_P003;
        $M002_P005=$M002_P005+$val->M002_P005;
        $M002_P006=$M002_P006+$val->M002_P006;
        $M002_P007=$M002_P007+$val->M002_P007;
        $M002_P075=$M002_P075+$val->M002_P075;
        $M002_P077=$M002_P077+$val->M002_P077;
        $M003_P001=$M003_P001+$val->M003_P001;
        $M003_P002=$M003_P002+$val->M003_P002;
        $M005_P002=$M005_P002+$val->M005_P002;
        $M005_P008=$M005_P008+$val->M005_P008;
        
        if ($val->M004_P009 > 0){ $count_pi++; $pi=$val->M004_P009; }else{$pi = "-";}
        
        
        
        $html .= " <tr> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->id_jam</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$pi</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M004_P010</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M001_P001</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M001_P002</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$pty1</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M001_P003</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M001_P007</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P001</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P002</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$pty2</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P003</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P005</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P006</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P007</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P077</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M002_P075</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M003_P001</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M003_P002</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$pty3</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M005_P002</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>$val->M005_P008</td>
            </tr> ";  
    }
    
    $pty1=0;
    $pty2=0;
    $pty3=0;  
    
    if ($M001_P001!=0&&$M001_P002!=0)$pty1=round($M001_P002/$M001_P001*100,2);
    if ($M002_P001!=0&&$M002_P002!=0)$pty2=round($M002_P002/$M002_P001*100,2);
    if ($M003_P001!=0&&$M003_P002!=0)$pty3=round($M003_P002/$M003_P001*100,2); 
    
 $html .= " <tr bgcolor='#EDEDED'>  
            <td width='4%' align='center' valign='middle' size='6' style='B'> Avegare </td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".fix_rounding($M004_P009/$count_pi,2)."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M004_P010/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M001_P001/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M001_P002/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty1 ."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M001_P003/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M001_P007/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P001/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P002/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty2 ."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P003/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P005/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P006/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P007/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P077/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M002_P075/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M003_P001/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M003_P002/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$pty3 ."</td> 
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M005_P002/$data_count."</td>
            <td width='4%' align='center' valign='middle' size='6' style='B'>".$M005_P008/$data_count."</td>
            </tr> 
            </table>";
    //  echo $html;
$p->htmltable($html); 
$p->Ln(2); 
 
$tglName = date('YmdHis');   
$p->output('DAILY MILL MATERIAL ANALYSIS REPORT_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>