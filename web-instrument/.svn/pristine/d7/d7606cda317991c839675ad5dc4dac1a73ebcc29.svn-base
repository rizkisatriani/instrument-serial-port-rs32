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
                    $html = "<table align='center' border='1' width='100%'> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='15%' rowspan='2' align='center' valign='middle' size='6' style='B'> Strike </td> 
                    <td widtd='5%'  align='center' valign='middle' size='6' >Liq. Clr</td>
                    <td widtd='5%'  align='center' valign='middle' size='6' >Cry. Clr</td>
                    <td widtd='5%' align='center' valign='middle' size='6' >Moist.</td>
                    <td widtd='5%' align='center' valign='middle' size='6' >Pol</td>
                    <td widtd='5%' align='center' valign='middle' size='6' >G-Size</td> 
                    <td widtd='5%'  align='center' valign='middle' size='6' >MA</td> 
                    <td widtd='5%' align='center' valign='middle' size='6' >CV</td> 
                    <td widtd='5%'  align='center' valign='middle' size='6' >SO2</td> 
                    <td widtd='5%' align='center' valign='middle' size='6' >Ash</td> 
                    <td widtd='5%'  align='center' valign='middle' size='6' >C'fugal</td> 
                    <td widtd='5%'  align='center' valign='middle' size='6' >Grader</td> 
                    <td widtd='5%'  align='center' valign='middle' size='6' >Bag</td> 
                    </tr>  
                    <tr bgcolor='#EDEDED'>  
                    <td widtd='5%' align='center' valign='middle' size='6' >< 300</td>
                    <td widtd='5%' align='center' valign='middle' size='6' >5-8</td>
                    <td widtd='5%' align='center' valign='middle' size='6' >< 0.05</td>
                    <td widtd='5%'  align='center' valign='middle' size='6' >>99,75</td>
                    <td widtd='5%'  align='center' valign='middle' size='6' >0,8-1,2</td> 
                    <td widtd='5%' align='center' valign='middle' size='6' >-</td> 
                    <td widtd='5%'  align='center' valign='middle' size='6' >-</td> 
                    <td widtd='5%' align='center' valign='middle' size='6' >< 10</td> 
                    <td widtd='5%' align='center' valign='middle' size='6' >< 0,1</td> 
                    <td widtd='5%' align='center' valign='middle' size='6' >< 61</td> 
                    <td widtd='5%' align='center' valign='middle' size='6' >< 40</td> 
                    <td widtd='5%'  align='center' valign='middle' size='6'>< 40</td> 
                    </tr>     
                    "; 
                   $table = "";
    $table2 = "";
    $target ="";
    $no=0;     
        $P013_AVG=""; 
        $P014_AVG=""; 
        $P008_AVG=""; 
        $P002_AVG=""; 
        $P018_AVG=""; 
        $P019_AVG=""; 
        $P020_AVG=""; 
        $P021_AVG=""; 
        $P022_AVG=""; 
        $P084_AVG=""; 
        $P085_AVG=""; 
        $P086_AVG=""; 
        $P080_AVG=""; 
    foreach($material as $val){
        $no_strike = $val->no_strike; 
        $P013_id=""; 
        $P013="";
        $P014_id=""; 
        $P014="";
        $P008_id=""; 
        $P008="";
        $P002_id=""; 
        $P002="";
        $P018_id=""; 
        $P018="";
        $P019_id=""; 
        $P019="";
        $P020_id=""; 
        $P020="";
        $P021_id=""; 
        $P021="";
        $P022_id=""; 
        $P022="";
        $P084_id=""; 
        $P084="";
        $P085_id=""; 
        $P085="";
        $P086_id=""; 
        $P086="";
        $P080_id=""; 
        $P080=""; 
        foreach($data as $val_analisa){
            $strike_analisa = $val_analisa->id_jam;  
            if($no_strike == $strike_analisa){   
                switch($val_analisa->id_parameter){
                    case 'P013':
                        $P013_id = $val_analisa->id;
                        $P013 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2); 
                    break;
                    case 'P014':
                        $P014_id = $val_analisa->id;
                        $P014 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'P008':
                        $P008_id = $val_analisa->id;
                        $P008= $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'P002':
                        $P002_id = $val_analisa->id;
                        $P002 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break; 
                    case 'P018':
                        $P018_id = $val_analisa->id;
                        $P018 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2); 
                    break;
                    case 'P019':
                        $P019_id = $val_analisa->id;
                        $P019 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'P020':
                        $P020_id = $val_analisa->id;
                        $P020= $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'P021':
                        $P021_id = $val_analisa->id;
                        $P021 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break; 
                    case 'P022':
                        $P022_id = $val_analisa->id;
                        $P022 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2); 
                    break;
                    case 'P084':
                        $P084_id = $val_analisa->id;
                        $P084 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'P085':
                        $P085_id = $val_analisa->id;
                        $P085= $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'P086':
                        $P086_id = $val_analisa->id;
                        $P086 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break; 
                    case 'P080':
                        $P080_id = $val_analisa->id;
                        $P080 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;  
                }  
                 
            }  
        }
        $P002_AVG=$P002_AVG+$P002;
        $P008_AVG=$P008_AVG+$P008;
        $P013_AVG=$P013_AVG+$P013;
        $P014_AVG=$P014_AVG+$P014;
        $P018_AVG=$P018_AVG+$P018;
        $P019_AVG=$P019_AVG+$P019;
        $P020_AVG=$P020_AVG+$P020;
        $P021_AVG=$P021_AVG+$P021;
        $P022_AVG=$P022_AVG+$P022;
        $P080_AVG=$P080_AVG+$P080;
        $P084_AVG=$P084_AVG+$P084;
        $P085_AVG=$P085_AVG+$P085;
        $P086_AVG=$P086_AVG+$P086;
           $html .= "<tr>
                    <td align='center' valign='middle' size='6'>$no_strike</td>
                    <td align='center' valign='middle' size='6'>$P013</td>
                    <td align='center' valign='middle' size='6'>$P014</td>
                    <td align='center' valign='middle' size='6'>$P008</td>
                    <td align='center' valign='middle' size='6'>$P002</td>
                    <td align='center' valign='middle' size='6'>$P018</td>
                    <td align='center' valign='middle' size='6'>$P019</td>
                    <td align='center' valign='middle' size='6'>$P020</td>
                    <td align='center' valign='middle' size='6'>$P021</td>
                    <td align='center' valign='middle' size='6'>$P022</td>
                    <td align='center' valign='middle' size='6'>$P084</td>
                    <td align='center' valign='middle' size='6'>$P085</td>
                    <td align='center' valign='middle' size='6'>$P086</td> 
                   </tr>"; 
                 $no++;
       
    }

         $html .= "<tr bgcolor='#EDEDED'>
                    <td align='center' valign='middle' size='6'>Average</td>
                    <td align='center' valign='middle' size='6'>".$P013/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P014/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P008/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P002/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P018/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P019/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P020/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P021/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P022/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P084/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P085/$data_count."</td>
                    <td align='center' valign='middle' size='6'>".$P086/$data_count."</td> 
                   </tr>"; 
    //  echo $html;
$p->htmltable($html); 
$p->Ln(2); 
 
$tglName = date('YmdHis');   
$p->output('DAILY SUGAR PRODUCT ANALYSIS REPORT_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>