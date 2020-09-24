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
    $judul ="";
    $cols[0] =date_indo($tanggal);
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
                    <td width='4%' rowspan='3' align='center' valign='middle' size='6' >MACHINE</td>
                    <td width='4%' colspan='6' align='center' valign='middle' size='6' >C-1 SUGAR & FINAL MOLASSES</td> 
                    <td width='4%' colspan='5' align='center' valign='middle' size='6' >DATA PARAMETER OPERASIONAL</td> 
                    </tr>   
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' >C-1 SUGAR</td>
                    <td width='4%' colspan='3' align='center' valign='middle' size='6' >FINAL MOLASSES</td> 
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' >Temp Fmol</td> 
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' >Vol FM</td> 
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' >Load</td> 
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' >Dilt Wtr</td> 
                    <td width='4%' rowspan='2' align='center' valign='middle' size='6' >Temp Dilt. Wtr.</td>  
                    </tr> 
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%' align='center' valign='middle' size='6' >Brix</td>
                    <td width='4%' align='center' valign='middle' size='6' >Pol</td> 
                    <td width='4%' align='center' valign='middle' size='6' >Pty</td> 
                    <td width='4%' align='center' valign='middle' size='6' >Brix</td>
                    <td width='4%' align='center' valign='middle' size='6' >Pol</td> 
                    <td width='4%' align='center' valign='middle' size='6' >Pty</td> 
                    </tr>      
                    ";  

                    $table  = "<table align='center' border='1' width='100%'>  
                    <tr bgcolor='#EDEDED'>    
                    <td width='4%'  align='center' valign='middle' size='6' >Material</td>
                    <td width='4%'  align='center' valign='middle' size='6' >Brix</td> 
                    <td width='4%'   align='center' valign='middle' size='6' >Pol</td> 
                    <td width='4%'  align='center' valign='middle' size='6' >Pty</td> 
                    <td width='4%'  align='center' valign='middle' size='6' >Visc</td> 
                    <td width='4%'   align='center' valign='middle' size='6' >Temp</td>  
                    </tr> </table>";    


    foreach($material as $val){
        $nama_material = $val->name;
        $id_material = $val->id_material;
        $pty_c1=0;
        $pty_finmol=0; 
        $P001_id ='';
        $P001=''; 
        $P002_id ='';
        $P002=''; 
        $P025_id ='';
        $P025=''; 
        $P027_id ='';
        $P027='';
        $P092_id ='';
        $P092='';
        $P093_id ='';
        $P093='';
        $P094_id ='';
        $P094='';
        $P095_id ='';
        $P095='';
        $P096_id ='';
        $P096='';
        $P097_id ='';
        $P097='';
        $P098_id ='';
        $P098='';
        $P099_id ='';
        $P099='';
        $P100_id ='';
        $P100='';
  
        foreach($data as $val_analisa){
            $material_analisa = $val_analisa->id_material; 

            if($id_material == $material_analisa){
                
                switch($val_analisa->id_parameter){  
                case 'P001':
                $P001_id = $val_analisa->id;
                $P001= $val_analisa->Hasil_rata;
                break;
                case 'P002':
                $P002_id = $val_analisa->id;
                $P002= $val_analisa->Hasil_rata;
                break;
                case 'P025':
                $P025_id = $val_analisa->id;
                $P025= $val_analisa->Hasil_rata;
                break;
                case 'P027':
                $P027_id = $val_analisa->id;
                $P027= $val_analisa->Hasil_rata;
                break;
                case 'P092':
                $P092_id = $val_analisa->id;
                $P092= $val_analisa->Hasil_rata;
                break;
                case 'P093':
                $P093_id = $val_analisa->id;
                $P093= $val_analisa->Hasil_rata;
                break;
                case 'P094':
                $P094_id = $val_analisa->id;
                $P094= $val_analisa->Hasil_rata;
                break;
                case 'P095':
                $P095_id = $val_analisa->id;
                $P095= $val_analisa->Hasil_rata;
                break;
                case 'P096':
                $P096_id = $val_analisa->id;
                $P096= $val_analisa->Hasil_rata;
                break;
                case 'P097':
                $P097_id = $val_analisa->id;
                $P097= $val_analisa->Hasil_rata;
                break;
                case 'P098':
                $P098_id = $val_analisa->id;
                $P098= $val_analisa->Hasil_rata;
                break;
                case 'P099':
                $P099_id = $val_analisa->id;
                $P099= $val_analisa->Hasil_rata;
                break;
                case 'P100':
                $P100_id = $val_analisa->id;
                $P100= $val_analisa->Hasil_rata;
                break;
                     
                }  
            }
        } 
        if($P092!=0&&$P093!=0) { 
         $pty_c1=round(( $P092 /$P093 )*100,2);
         }else{
            $pty_c1=0;
         }
         if($P094!=0&&$P095!=0){
         $pty_finmol=round(( $P094 / $P095 )*100,2); 
         }else{
            $pty_finmol=0;
         }   
         if($P001!=0&&$P002!=0){
         $pty_material=round(( $P001 / $P002 )*100,2); 
         }else{
            $pty_material=0;
         }
    if ($id_material=='M019' || $id_material=='M029' || $id_material=='M180') {
            $table .= "<tr>
                    <td align='left' valign='middle' size='6'>$nama_material</td>
                    <td align='center' valign='middle' size='6'>$P001</td>  
                    <td align='center' valign='middle' size='6'>$P002</td> 
                    <td align='center' valign='middle' size='6'>$pty_material</td> 
                    <td align='center' valign='middle' size='6'>$P025</td> 
                    <td align='center' valign='middle' size='6'>$P027</td> 
                 </tr>";
         }else{ 
         $html .= "<tr>
                    <td align='left' valign='middle' size='6'>$nama_material</td>
                     <td align='center' valign='middle' size='6'>$P092</td>  
                    <td align='center' valign='middle' size='6'>$P093</td> 
                    <td align='center' valign='middle' size='6'>$pty_c1</td> 
                    <td align='center' valign='middle' size='6'>$P094</td>  
                    <td align='center' valign='middle' size='6'>$P095</td> 
                    <td align='center' valign='middle' size='6' >$pty_finmol</td> 
                    <td align='center' valign='middle' size='6'>$P096</td> 
                    <td align='center' valign='middle' size='6'>$P097</td> 
                    <td align='center' valign='middle' size='6'>$P098</td>  
                    <td align='center' valign='middle' size='6'>$P099</td> 
                    <td align='center' valign='middle' size='6'>$P100</td> 
                 </tr>";
       }
       
    } 
    $table.="</table>";
    $html.="</table>";
/*echo $table2 ;
echo $html ;*/
$p->htmltable($html); 
$p->Ln(2);
 $p->htmltable($table); 
$p->Ln(2);  
$tglName = date('YmdHis');   
$p->output('C-1 MACHINE TEST_'.$tglName.'.pdf','I');  
  }else{
    echo " Tidak Ada Data !!";
}

?>