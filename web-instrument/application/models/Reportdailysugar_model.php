<?php

class Reportdailysugar_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data($date){   
 $query = $this->db->query("SELECT verifikasi_detil.*,
 material_analisa.name , 
 AVG(verifikasi_detil.hasil) AS Hasil_rata
 FROM verifikasi_detil 
 INNER JOIN material_analisa 
 ON material_analisa.id_material = verifikasi_detil.id_material
  WHERE  verifikasi_detil.tanggal = '".$date."' AND param='sugar' 
  GROUP BY verifikasi_detil.id_material ,verifikasi_detil.id_parameter
  ");  
        return $query->result();
    }

 

     function get_data_count($date){   
                $query = $this->db->query("SELECT verifikasi_detil.*,
 material_analisa.name , 
 AVG(verifikasi_detil.hasil) AS Hasil_rata
 FROM verifikasi_detil 
 INNER JOIN material_analisa 
 ON material_analisa.id_material = verifikasi_detil.id_material
  WHERE  verifikasi_detil.tanggal = '".$date."' AND param='sugar' 
  GROUP BY verifikasi_detil.id_jam"); 
                return $query->num_rows();  
        }
            
}
 ?>
