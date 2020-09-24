<?php

class Reportdailyeva_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data(  $date ){  

$this->db->select('verifikasi_detil.*,material_analisa.name');
        $this->db->from('verifikasi_detil');
        $this->db->join('material_analisa', 'material_analisa.id_material = verifikasi_detil.id_material', 'inner');
        $this->db->where('verifikasi_detil.tanggal', $date);
        $this->db->order_by('material_analisa.urut_mill', 'asc'); 
        $query = $this->db->get(); 
        return $query->result();
    }
 

     function get_data_header(){   
        $query = $this->db->query("select * from material_analisa where (material_analisa.urut_evap is not null 
                            or material_analisa.urut_evap != '') order by urut_evap asc");
        return $query->result();
        } 
            
}
 ?>
