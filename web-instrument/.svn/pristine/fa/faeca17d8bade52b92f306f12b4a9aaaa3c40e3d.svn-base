<?php

if ($ujipetik){
    //echo $this->db->last_query();
    //echo $this->absensi->last_query(); 
    $kolom =  array(25,45,45,20,20,20); 
    include('pdf_error_ujipetik.php');
    
    $option = "";
    $dep = "";
    $divisi ="";
    $unit = "";
    $nama = "";
    $nip ="";
    
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
    $cols[1] = $dep;
    $cols[2] = $divisi;
    $cols[3] = $unit;
    $cols[4] = $option;
    $cols[5] = $kolom;
    
    $cols[6] = $nama;
    $cols[7] = $nip;
    
    $p = new PDF($cols);
    $p->AddPage();
    
    $html = "<table align='center' border='1' width='150'>";
    
    foreach ($ujipetik as $val){
        
        $tgl = $val->tanggal;
        $reason = $val->reason_delete;
        $jumlah = $val->jumlah;
        $product = $val->product;
        
        $html .= "
				<tr >	
					<td width='$kolom[0]' align='left' valign='middle' size='8' >$tgl</td>	
					<td width='$kolom[1]' align='center' valign='middle' size='8' >$product</td>
					<td width='$kolom[2]' align='left'   valign='middle' size='8' >$reason</td>
					<td width='$kolom[3]' align='center' valign='middle' size='8' >$jumlah</td>
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