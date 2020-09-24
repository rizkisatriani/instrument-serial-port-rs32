<?php

class Reportdailymolasses_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data( $date ){   
  $this->db->select('verifikasi_detil.*,material_analisa.name');
        $this->db->from('verifikasi_detil');
        $this->db->join('material_analisa', 'material_analisa.id_material = verifikasi_detil.id_material', 'inner');
        $this->db->where('verifikasi_detil.tanggal', $date);
        $this->db->where('verifikasi_detil.param', 'mollasses');  
        $query = $this->db->get(); 
        return $query->result(); 
    }

     

     function get_data_count($date){   
               $this->db->select('verifikasi_detil.*,material_analisa.name');
        $this->db->from('verifikasi_detil');
        $this->db->join('material_analisa', 'material_analisa.id_material = verifikasi_detil.id_material', 'inner');
        $this->db->where('verifikasi_detil.tanggal', $date);
        $this->db->where('verifikasi_detil.param', 'mollasses');  
        $query = $this->db->get(); 
                return $query->num_rows();  
        }
            
}
 ?>
