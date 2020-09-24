<?php
 
    $table = "";
    $table2 = "";
    $target ="";
    $no=0;   
     foreach($material as $val){
        $id_jam = $val->id_jam;   
        $jam = $val->desc;
        $M140_id=""; 
        $M140="";
        $M141_id=""; 
        $M141="";
        $M142_id=""; 
        $M142="";
        $M143_id=""; 
        $M143="";
        $M176_id=""; 
        $M176="";
        $M145_id=""; 
        $M145=""; 
        foreach($analisa as $val_analisa){
            $jam_analisa = $val_analisa->id_jam;  
            if($id_jam == $jam_analisa){  
                switch($val_analisa->id_material){
                    case 'M140':
                        $M140_id = $val_analisa->id;
                        $M140 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2); 
                    break;
                    case 'M141':
                        $M141_id = $val_analisa->id;
                        $M141 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'M142':
                        $M142_id = $val_analisa->id;
                        $M142= $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break;
                    case 'M143':
                        $M143_id = $val_analisa->id;
                        $M143 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break; 
                    case 'M176':
                        $M176_id = $val_analisa->id;
                        $M176 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2); 
                    break;
                    case 'M145':
                        $M145_id = $val_analisa->id;
                        $M145 = $val_analisa->hasil ==0 ? '' :round($val_analisa->hasil,2);
                    break; 
                }  
                 
            }  
        }
 
           $table .= "<tr>
                    <td style='text-align:center;'>$jam</td> 
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M176_id','$M176','Curing','$id_jam')\">$M176</a></td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M140_id','$M140','Tank A','$id_jam')\">$M140</a></td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M141_id','$M141','Tank B','$id_jam')\">$M141</a></td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M142_id','$M142','Tank C','$id_jam')\">$M142</a></td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M143_id','$M143','Tank D','$id_jam')\">$M143</a></td>
                    <td style='text-align:center;'><a class='button-custom' onclick=\"javascript:openDialogUpdateVerifyTmp('$M145_id','$M145','Tank Factory','$id_jam')\">$M145</a></td> 
                   </tr>"; 
                 $no++;
       
    }
?> 
<table class="table striped table-border cell-border row-border cell-hover subcompact">
    <thead >
        <tr class="bg-orange" >
            <th width='15%' rowspan='2' style='text-align:center;' >Jam</th>
            <th width='5%' style='text-align:center;' >Curing</th>
            <th width='10%' style='text-align:center;'>Tank A</th> 
            <th width='10%' style='text-align:center;'>Tank B</th> 
            <th width='10%' style='text-align:center;'>Tank C</th> 
            <th width='10%' style='text-align:center;'>Tank D</th>
            <th width='10%' style='text-align:center;'>Tank Faktory</th>  
        </tr>
        <tr class="bg-orange" > 
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th>
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th> 
            <th width='5%' style='text-align:center;' >< 40</th> 
        </tr>
    </thead>
    <tbody>
        <?=$table?>
    </tbody>
</table> 
<div class="row border-top bd-gray">
    <div class="cell-sm-full cell-md-one-third cell-lg-3"></div>
    <?php 
            $tgl_str="'$tgl'"; 
    if(count($analisa)>0){
        echo '<div class="cell-sm-full cell-md-two-third cell-lg-3"><button class="button primary" onclick="simpanVerifikasi('.$tgl_str.')"><span class="mif-done_all"></span> Simpan</button></div>
    <div class="cell-sm-full cell-md-half cell-lg-3"><button class="button alert" onclick="batalVerifikasi('.$tgl_str.')"><span class="mif-cross"></span> Batal</button></div>';
    }else{
        echo '<h4 style="color:#7f8c8d;">Tidak ada data analisa untuk tanggal yang anda pilih</h4>';
    } ?>
    
    <div class="cell-sm-full cell-md-half cell-lg-3"></div>
</div>
