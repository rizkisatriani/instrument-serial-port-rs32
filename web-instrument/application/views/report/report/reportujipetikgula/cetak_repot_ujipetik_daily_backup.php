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


?>