<?php


ob_start();
class PDF extends PDFTable{
	
	function PDF($data,$orientation='L',$unit='mm',$format='F4')
	{
		PDFTable::PDFTable($orientation, $unit, $format);
		$this->SetAuthor('ITGMP');
		$this->SetFont('arial','',6);
		$this->SetLineWidth(0.1);
		$this->SetMargins(10,5,5);
        
		$this->AliasNbPages(); // ini buat menghitung jumlah halaman
        $this->bulan = $data[0];
		$this->departemen =$data[1];
		$this->divisi =$data[2];
        $this->unit =$data[3];
		$this->hal = 0;
        $this->option = $data[4];
        $this->kolom = $data[5];
	}
    
   	function bingkai($lebar) {
	 	$this->hr();
		$y = $this->GetY();
		$this->Line($this->left,$this->y,$this->left,$lebar);
		$this->Line($this->right-0.9,$this->y,$this->right-0.9,$lebar);
		$this->Line($this->x,$lebar,$this->right-0.9,$lebar);
		
	}
    
   	function set_hal($n){
		$this->hal = $n;
	}
    
    function set_dep($x){
  		$this->departemen = "$x";
    }
    
    function SetDash($black=null, $white=null){
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
    
   	function setTeksFooter($teks){
		$this->teksfooter = $teks;
	}
	
	function Header()
	{
        
        $bln = $this->bulan;
       
        $kal = CAL_GREGORIAN;

        $tgl = substr($bln,0,2);
        $bulan = substr($bln,3,2);
        $tahun = substr ($bln,6,4);  
        //$bulan = substr($bln,0,2);
        //$tahun = substr($bln,3,4);
        
        $nama_bulan = array('01' => 'JANUARI','02' => 'FEBRUARI','03' => 'MARET','04' => 'APRIL','05' => 'MEI','06' => 'JUNI','07' => 'JULI','08'=>'AGUSTUS', 
                            '09'=>'SEPTEMBER','10'=>'OKTOBER','11'=>'NOVEMBER','12'=>'DESEMBER');
           
         $jumlah_hari = cal_days_in_month($kal, $bulan, $tahun);
        
        $tanggal = $tahun.'-'.$bulan.'-'.$tgl;
        $day = date('D', strtotime($tanggal));
        
        $dayList = array('Sun' => 'Minggu','Mon' => 'Senin','Tue' => 'Selasa','Wed' => 'Rabu','Thu' => 'Kamis','Fri' => 'Jumat','Sat' => 'Sabtu' );
        
		if ($this->page == 1) {
            $this->Ln(3);
			$this->setStyle('title');
			$this->text(0,"PT GUNUNG MADU PLANTATIONS",0,'C'); 
			$this->setStyle('subtitle');
			$this->text(0,"DAILY BOILER WATER, CONDENSATE & CONDENSOR ANALYSIS REPORT",0,'C');
			$this->setStyle('subtitle');
 	        $this->text(0,$dayList[$day]." ".$tgl." - ".$nama_bulan[$bulan]." - ".$tahun,0,'C');
     		$this->setStyle('small');
    		$this->Cell(20,0,"DEPARTEMENT ",0,0,"L");
    		$this->Cell(27,0,": ".$this->departemen,0,0,"L");
    		$this->ln(4);
    		$this->Cell(15,0,$this->divisi." - ".$this->unit,0,0,"L");
    		$this->Cell(0,0,'Hal : '.$this->PageNo().' / {nb}',0,0,'R');
    		$this->ln(2);
            $lebar = $this->width;
            $kolom = $this->kolom;
            
            $hdr = "<table align='left' border='1' width='$lebar'>
    					<tr bgcolor='#EDEDED'>	
    						<td width='50'  align='center' valign='middle' size='8' style='B'>No</td>	
    						<td width='50'  align='center' valign='middle' size='8' style='B'>Nip</td>
    						<td width='50'  align='center' valign='middle' size='8' style='B'>Nama</td>
                            <td align='center' valign='middle' size='8' style='B'>jam Kehadiran 1, 2, 3, 4</td>
    					</tr>
				    </table>";
            //$this->htmltable($hdr,1);   
		}
        else{
            
            $this->Ln(8);
    		$this->setStyle('small');
    		$this->Cell(15,0,"DEPARTEMENT : ".$this->departemen,0,0,"L");
    		$this->ln(4);
    		$this->Cell(15,0,$this->divisi." - ".$this->unit,0,0,"L");
    		//$this->Cell(25,0," / ".$this->unit,0,0,"L");
           
    		$this->Cell(0,0,'Hal : '.$this->PageNo().' / {nb}',0,0,'R');
    		$this->ln(4);
             $lebar = $this->width;
            $kolom = $this->kolom;
            $hdr = "<table align='left' border='1' width='$lebar'>
    			<tr bgcolor='#EDEDED'>	
    				<td width='$kolom[0]'  align='center' valign='middle' size='8' style='B'>No</td>	
    				<td width='$kolom[1]'  align='center' valign='middle' size='8' style='B'>Nip</td>
    				<td width='$kolom[2]'  align='center' valign='middle' size='8' style='B'>Nama</td>
                    <td align='center' valign='middle' size='8' style='B'>$dayList[$day] - $tgl/$bulan/$tahun</td>
    			</tr>
    	    </table>";
            $this->htmltable($hdr);
            
		}
        
	}
			
	function Footer()
	{      
        date_default_timezone_set("Asia/Jakarta");
		$this->SetY(-8);
		$this->setStyle('page');
		$tglcetak = date('d-m-Y H:i');
  	  //$this->Cell(0,0,$this->teksfooter . " - Cetak : " . $tglcetak,0,0,'R'); 
        $this->Cell(0,0, 'Hal '.$this->PageNo(). " - Tanggal Cetak : " . $tglcetak,0,0,'R');
	}


	function setStyle($style='normal'){
		switch ($style){
			case 'title':
				$this->SetFont('arial','B',8);
				break;
			case 'subtitle':
				$this->SetFont('arial','B',7);
				break;
			case 'small':
				$this->SetFont('arial','',7);
				break;
			case 'subtotal':
				$this->SetFont('arial','B',7);
				break;
			case 'nilai':
				$this->SetFont('arial','',8);
				break;
			case 'normal':
			default:
				$this->SetFont('arial','',7);
		}
	}

	function text($w,$txt,$border=0,$align='J',$fill=0){
		FPDF::MultiCell($w,$this->FontSizePt/2,$txt,$border,$align,$fill);
	}

	function hr(){
		$this->Line($this->left,$this->y,$this->right-0.9,$this->y);
	}
	
	function bordercell($data,$split=true) {
		if (!$split) {
			$this->Cell(6,5,$data,1,0,'C');
		} else{
			$jml = strlen(trim($data)) - 1;
				for ($i=0; $i<=$jml; $i++)
				{
					if ($data[$i] == " ") {
						$this->Cell(6,5,$data[$i],0,0,'C');
					} else {
						$this->Cell(6,5,$data[$i],1,0,'C');
					}
				}
		}
	}
	
	function bordercell2($data) {
		$jml = strlen(trim($data)) - 1;
		for ($i=0; $i<=$jml; $i++)
		{
			if ($data[$i] == " ") {
				$this->Cell(5,5,$data[$i],0,0,'C');
			} else {
				$this->Cell(5,5,$data[$i],1,0,'C');
			}
		}
		
	}
	
	function kotakcentang($data) {
		$this->Cell(5,5,$data,1,0,'C');
	}
	
	function TextWithDirection($x, $y, $txt, $direction='R')
	{
		 $txt=str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
		 if ($direction=='R')
			  $s=sprintf('BT %.2f %.2f %.2f %.2f %.2f %.2f Tm (%s) Tj ET', 1, 0, 0, 1, $x*$this->k, ($this->h-$y)*$this->k, $txt);
		 elseif ($direction=='L')
			  $s=sprintf('BT %.2f %.2f %.2f %.2f %.2f %.2f Tm (%s) Tj ET', -1, 0, 0, -1, $x*$this->k, ($this->h-$y)*$this->k, $txt);
		 elseif ($direction=='U')
			  $s=sprintf('BT %.2f %.2f %.2f %.2f %.2f %.2f Tm (%s) Tj ET', 0, 1, -1, 0, $x*$this->k, ($this->h-$y)*$this->k, $txt);
		 elseif ($direction=='D')
			  $s=sprintf('BT %.2f %.2f %.2f %.2f %.2f %.2f Tm (%s) Tj ET', 0, -1, 1, 0, $x*$this->k, ($this->h-$y)*$this->k, $txt);
		 else
			  $s=sprintf('BT %.2f %.2f Td (%s) Tj ET', $x*$this->k, ($this->h-$y)*$this->k, $txt);
		 if ($this->ColorFlag)
			  $s='q '.$this->TextColor.' '.$s.' Q';
		 $this->_out($s);
	}

	
	
}//end of class
?>