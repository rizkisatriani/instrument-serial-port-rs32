<?php
// Query sudah OK
 
if($ujipetik){
    
$kolom =  array(10,20,70); 

$cols[0] = $tanggal;
$cols[1] = $dp;
$cols[2] = $div;
$cols[3] = $unit;
$cols[4] = $option;
$cols[5] = $kolom;

include('pdf_tanggal_inc.php');
$p = new PDF($cols);

$xx = $x;
$jm1 = $jm1;
$jm2 = $jm2;
$p->AddPage();
$unit_control = "";
$n= 0;
$hdr= "<table cellspacing=0 border='1' width='100%'>";
foreach($jam as $val){
        $nama = $val->nama;
        $nip = $val->nip;
        $kode_unit = $val->kode_unit;
        $nama_unit = $val->unit;
        $jamS = $val->jam;
        $n++;
        
        $x1 = "";
        $x2 = "";
        $x3 = "";
        $x4 = "";
        
        $waktu =  explode(",", $jamS);
        $xy = 0;
        foreach($waktu as $isi){
        $xy++;
            if ($xy == 1){
                $x1 = $waktu[0];
            }
            
            if ($xy == 2){
                $x2 = $waktu[1];
            }
            
            if ($xy == 3){
                $x3 = $waktu[2];
            }
            
            if ($xy == 4){
                $x4 = $waktu[3];
            }
        
        }
        
        if($unit_control != $kode_unit ){
        $hdr .= "<tr><td style='B' colspan=7><b>".$nama_unit."</b></td></tr>";
        $n=1;
        }
        $unit_control = $kode_unit;
        $hdr .= "
    					<tr>	
    						<td width='$kolom[0]'  align='center' valign='middle' size='8' >$n</td>	
    						<td width='$kolom[1]'  align='center' valign='middle' size='8' >$nip</td>
    						<td width='$kolom[2]'  align='left' valign='middle' size='8' >$nama</td>
                            <td width='25' align='center' valign='middle' size='8' >".$x1."</td>
                            <td width='25' align='center' valign='middle' size='8' >".$x2."</td>
                            <td width='25' align='center' valign='middle' size='8' >".$x3."</td>
                            <td width='25' align='center' valign='middle' size='8' >".$x4."</td>
    					</tr>
				    </table>";
           
}

$ttd= "<table cellspacing=0 width='100%'>
                <tr>	
    						<td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' >Disiapakan Oleh</td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' >Diketahui Oleh</td>
                            <td align='center' valign='middle' size='8' ></td>
                </tr>
                <tr>	
    						<td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                </tr>
                <tr>	
    						<td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' ></td>
                </tr>
                <tr>	
    						<td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' >Personnel Admin</td>
                            <td align='center' valign='middle' size='8' ></td>
                            <td align='center' valign='middle' size='8' >Kabag Personnel</td>
                            <td align='center' valign='middle' size='8' ></td>
                </tr>
				    
        </table>";
$p->htmltable($hdr);
$p->Ln(8);
$p->htmltable($ttd);    
$p->output('absensi_tanggal.pdf','I');      
}else{
    echo " Tidak Ada Data !!";
}
 //var_dump($data);
/*foreach($data as $val){
    $ph="0";
    $ppm="0"; 

$n= 0;
switch($val->id_material){
                    case 'M051': 
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break;
                    case 'M052':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break;
                    case 'M053':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break;
                    case 'M054':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 
                    case 'M055':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 
                    case 'M056':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 
                    case 'M062':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 

                    case 'M063':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 
                    
                    case 'M064':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 
                    
                    case 'M068':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 
                    
                    case 'M069':
                    switch ($val->id_parameter) {
                        case 'P003':
                            $ph=$val->hasil;
                            break;
                        
                        default:
                            $ppm=$val->hasil;
                            break;
                    }
                    break; 
                }   

 $p->Cell(20,6,$val->id_jam,1,0,'C');    
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
        $p->Cell(($width/2),6,round($ph,2),1,0,'C');  
        $p->Cell(($width/2),6,round($ppm,2),1,0,'C');  
        $n++; 
        $p->Ln();
}*/

?>