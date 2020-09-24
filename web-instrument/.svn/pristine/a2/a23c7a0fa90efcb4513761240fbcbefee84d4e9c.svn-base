<?php
if ($ujipetik){
    
    $kolom =  array(25,25,25,25,25,25,25,25,15);
    include('pdf_summary_inc.php');
    
     switch ($jenis_laporan){
            
        case 'daily':
            $tanggal_awal=date_create($tanggal_awal);
            $date = date_format($tanggal_awal,"d M Y");
            $judul = $date;
        break;
        case 'periode':
            $tanggal_awal=date_create($tanggal_awal);
            $tanggal_akhir=date_create($tanggal_akhir);
            $awal = date_format($tanggal_awal,"d M Y");
            $akhir = date_format($tanggal_akhir,"d M Y");
            $judul = "From : $awal to $akhir";
        break;
    }
    
    $cols[0] = $judul;
    $cols[1] = "";
    $cols[2] = "";
    $cols[3] = "";
    $cols[4] = "";
    $cols[5] = $kolom;
    $cols[6] = "";
    $cols[7] = "";
    
    $p = new PDF($cols);
    $p->AddPage();
    
    switch ($jenis_timbang){
        case '20kg':
            $desc = "Box 20 Kg";
        break;
        case '50kg':
            $desc = "Bag 50 kg";
        break;
        case '1kg':
            $desc = "Pack 1 kg";
        break;
        
    }
    
    $sum_min = 0;
    $sum_max = 0;
    $sum_avg = 0;
    $sum_counter = 0;
    $sum_under = 0;
    $sum_over = 0;
    
    $html = "<table align='center' cellspacing=0 border='1' width='100%'>";
    $no=0;
    foreach ($ujipetik as $val){
        
        $tanggal = $val->tanggal;
        $min = $val->MIN;
        $max = $val->MAX;
        $avg = $val->AVG;
        $sum = $val->SUM;
        $under = $val->under;
        $over = $val->overmax;
        $counter = $val->conter;
        $machine = $val->timbangan;
        
        $sum_min += $min;
        $sum_max += $max;
        $sum_avg += $avg;
        $sum_counter += $counter;
        $sum_under += $under;
        $sum_over += $over;

        $no++;
        
        $html .= "
				<tr >	
					<td width='$kolom[0]' align='center' valign='middle' size='8' >$tanggal</td>
                    <td width='$kolom[8]' align='center' valign='middle' size='8' >$machine</td>	
					<td width='$kolom[1]' align='center' valign='middle' size='8' >$min</td>
					<td width='$kolom[2]' align='center' valign='middle' size='8' >$max</td>
					<td width='$kolom[3]' align='center' valign='middle' size='8' >$avg</td>
                    <td width='$kolom[4]' align='center' valign='middle' size='8' >$counter</td>
                    <td width='$kolom[5]' align='center' valign='middle' size='8' >$under</td>
                    <td width='$kolom[6]' align='center' valign='middle' size='8' >$over</td>
                    <td width='$kolom[7]' align='center' valign='middle' size='8' >$desc</td>
				</tr>
    				";
    }
    
    $avg_min = round($sum_min / $no,2);
    $avg_max = round($sum_max / $no,2);
    $avg_avg = round($sum_avg / $no,2);
    $avg_counter = $sum_counter;
    $avg_under = $sum_under;
    $avg_over = $sum_over;
     
    $html .= "
				<tr bgcolor='#EDEDED' >	
					<td colspan='2' align='center' valign='middle' size='8' >Average</td>	
					<td width='$kolom[1]' align='center' valign='middle' size='8' >$avg_min</td>
					<td width='$kolom[2]' align='center' valign='middle' size='8' >$avg_max</td>
					<td width='$kolom[3]' align='center' valign='middle' size='8' >$avg_avg</td>
                    <td width='$kolom[4]' align='center' valign='middle' size='8' >$avg_counter</td>
                    <td width='$kolom[5]' align='center' valign='middle' size='8' >$avg_under</td>
                    <td width='$kolom[6]' align='center' valign='middle' size='8' >$avg_over</td>
                    <td width='$kolom[7]' align='center' valign='middle' size='8' ></td>
				</tr>
    				";
    
    $html .= "</table>";
    
    $tglName = date('YmdHis');
                    
    $p->htmltable($html);
    $p->output("SummarySugarPackingReport_$tglName.pdf",'I');
}else{
    
    echo "Tidak Ada Data";
}
?>