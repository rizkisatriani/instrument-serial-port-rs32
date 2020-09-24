<?php

if ($ujipetik){
    //echo $this->db->last_query();
    //echo $this->absensi->last_query(); 
    $kolom =  array(10,40,25,25,20,35); 
    include('pdf_tanggal_inc.php');
    
    switch ($shift){
        case '1':
            $nama_shift = "Shift 1";
        break;
        case '2':
            $nama_shift = "Shift 2";
        break;
        case '3':
            $nama_shift = "Shift 3";
        break;
        default:
            $nama_shift = "";
        break;
    }
    
    switch ($jenis_laporan){ 
        case 'daily': 
            $tanggal_awal=date_create($tanggal_awal);
            $date = date_format($tanggal_awal,"d F Y"); 
            $judul = $nama_shift." - ".$date;
        break;
        case 'periode':
            $tanggal_awal=date_create($tanggal_awal);
            $tanggal_akhir=date_create($tanggal_akhir);
            $awal = date_format($tanggal_awal,"d F Y");
            $akhir = date_format($tanggal_akhir,"d F Y");
            $judul = "From : $awal to $akhir";
        break;
    }
    
    $cols[0] = $judul;
    $cols[1] = $shift;
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
    
    $html = "<table align='center' border='1' width='150'>";
    $no=0;
    foreach ($ujipetik as $val){
        
        $tanggal = $val->tanggal;
        $hasil = $val->hasil;
        $createby = $val->createby;
        $wkt_input = $val->wkt_input; 
        $machine = $val->timbangan;
        $reason = $val->reason_delete;
        $no++;
        
        $html .= "
				<tr >	
					<td width='$kolom[0]' align='center' valign='middle' size='8' >$no</td>	
					<td width='$kolom[1]' align='center' valign='middle' size='8' >$wkt_input</td>
					<td width='$kolom[2]' align='center' valign='middle' size='8' >$hasil</td>
					<td width='$kolom[3]' align='center' valign='middle' size='8' >$desc</td>
                    <td width='$kolom[4]' align='center' valign='middle' size='8' >$machine</td>
                    <td width='$kolom[5]' align='left' valign='middle' size='8' >$reason</td>
				</tr>
    				";
    }
    
    $html .= "</table>";
    
    $tglName = date('YmdHis');
                    
    $p->htmltable($html);
    $p->output("DetailSugarPackingErrorReport_$tglName.pdf",'I');
}else{
    
    echo "Tidak Ada Data";
}
?>