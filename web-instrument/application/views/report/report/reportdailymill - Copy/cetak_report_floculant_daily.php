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
 
                    $html = "<table align='center'  border='1' width='100%'>  
                    <tr bgcolor='#EDEDED' >    
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Material</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Shift</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Viscocity</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Temp</td> 
                    <td width='4%' align='center' valign='middle' size='6' style='B'>WR</td>
                    <td width='4%' align='center' valign='middle' size='6' style='B'>OV</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>Beume</td>  
                    <td width='4%' align='center' valign='middle' size='6' style='B'>CaO</td>   
                    "; 
                   
               
            $id_jam="";
 foreach ($data as $val) {   
              if($id_jam!=$val->id_jam){
          $html .= " <tr> <td width='4%' align='left' valign='middle' size='6' style='B'>$val->name</td>
            <td width='4%' rowspan='9' align='center' valign='middle' size='6' style='B'>$val->id_jam</td> 
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Viscosity</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Temperature</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->WR</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->OV</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Beume</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Calcium_Oxide_Content</td>
            </tr> ";  
            }else{
                $html .= " <tr> 
              <td width='4%' align='left' valign='middle' size='6' style='B'>$val->name</td> 
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Viscosity</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Temperature</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->WR</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->OV</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Beume</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Calcium_Oxide_Content</td>
            </tr> "; 
            }
            $id_jam=$val->id_jam;
 }  

 foreach ($data_avg as $val) {   
              if($id_jam!=$val->id_jam){
          $html .= " <tr> <td width='4%' align='left' valign='middle' size='6' style='B'>$val->name</td>
            <td width='4%' rowspan='9' align='center' valign='middle' size='6' style='B'>Avegare</td> 
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Viscosity</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Temperature</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->WR</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->OV</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Beume</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Calcium_Oxide_Content</td>
            </tr> ";  
            }else{
                $html .= " <tr> 
              <td width='4%' align='left' valign='middle' size='6' style='B'>$val->name</td> 
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Viscosity</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Temperature</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->WR</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->OV</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Beume</td>
              <td width='4%' align='center' valign='middle' size='6' style='B'>$val->Calcium_Oxide_Content</td>
            </tr> "; 
            }
            $id_jam=$val->id_jam;
 } 
    // echo $html;
 $p->htmltable($html); 
 $p->Ln(2); 
 
$tglName = date('YmdHis');   
$p->output('FLOCULANT & LIME ANALYSIS REPORT_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>