<?php

class Helper_model extends CI_Model
{

	function __construct()
	{
		parent:: __construct();
	}

    function show_jam_analisa(){

      $this->db->select('*');
      $query = $this->db->get('jam_analisa');

    	return $query->result();
    }

	function show_material_analisa($flag){
		$this->db->select('*');
		if ($flag != ''){

			switch (substr($flag,0,1)){
				case 'M':
					$this->db->like('id_material', $flag);
				break;
				case 'k':
					$this->db->like('id_klp', $flag);
				break;
			}
		}
        
        $this->db->order_by('id_material', 'ASC'); 
        $query = $this->db->get('material_analisa');
		//print_r($this->db->last_query());
	   return $query->result();
	}

	function show_parameter_analisa($flag){
	   $this->db->select('*');
	   if ($flag != ''){
			switch (substr($flag,0,1)){
				case 'P':
					$this->db->like('id_parameter', $flag);
				break;
				case 'k':
					$this->db->where('id_klp', $flag);
				break;
			}
        }
        $query = $this->db->get('parameter_analisa');

        return $query->result();
	}

	function show_count_analysis_by_module(){

		$query = $this->db->query('select count(DISTINCT(nomor)) AS jumlah,count(DISTINCT(IF(is_data=1,nomor,NULL))) as baru,
										COUNT(DISTINCT(IF(is_data=2,nomor,NULL))) as ricek, COUNT(DISTINCT(IF(is_data=3,nomor,NULL))) as test,
									modules.`desc` nama from hasil_analisa
									inner join modules
									on modules.`id` = hasil_analisa.`id_modul`
									where month(hasil_analisa.`tanggal`) = month(now())
									and year(hasil_analisa.`tanggal`) = YEAR(NOW())
									group by hasil_analisa.`id_modul`
									order by count(DISTINCT(nomor)) DESC
									limit 5');

        return $query->result();
	}
        
    function show_uji_petik($jenis){
        
        $query = $this->db->query("SELECT * FROM (
                                    SELECT id AS id,CONCAT(UNIX_TIMESTAMP(wkt_input),'000') AS t,nilai_uji AS y FROM uji_petik_gula
                                    WHERE id_parameter = '$jenis'
                                    ORDER BY id ASC
                                    LIMIT 500) AS d
                                    ORDER BY id ASC");
                                    
        return $query->result();
        
    }
    
    function simpan_analisa_grandsize_tmp(){
        
        $this->db->where('id_user', $this->session->userdata('id_user') );
        $this->db->delete('grandsize_tmp');
        
        $tarra_f1 = $this->input->post('input')[0];
        $tarra_f2 = $this->input->post('input')[1];
        $tarra_f3 = $this->input->post('input')[2];
        $tarra_f4 = $this->input->post('input')[3];
        $tarra_f5 = $this->input->post('input')[4];
        $tarra_f6 = $this->input->post('input')[5];
        $sample = $this->input->post('input')[6];
        $brutto_f1 = $this->input->post('input')[7];
        $brutto_f2 = $this->input->post('input')[8];
        $brutto_f3 = $this->input->post('input')[9];
        $brutto_f4 = $this->input->post('input')[10];
        $brutto_f5 = $this->input->post('input')[11];
        $brutto_f6 = $this->input->post('input')[12];
        $net_f1 = $this->input->post('input')[13];
        $net_f2 = $this->input->post('input')[14];
        $net_f3 = $this->input->post('input')[15];
        $net_f4 = $this->input->post('input')[16];
        $net_f5 = $this->input->post('input')[17];
        $net_f6 = $this->input->post('input')[18];
        $gsize = $this->input->post('input')[19];
        $ma = $this->input->post('input')[20];
        $sd = $this->input->post('input')[21];
        $cv = $this->input->post('input')[22];
        
        $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'brt_tarra_f1' => $tarra_f1,
                'brt_tarra_f2' => $tarra_f2,
                'brt_tarra_f3' => $tarra_f3,
                'brt_tarra_f4' => $tarra_f4,
                'brt_tarra_f5' => $tarra_f5,
                'brt_tarra_f6' => $tarra_f6,
                'brt_sample' => $sample,
                'brt_brutto_f1' => $brutto_f1,
                'brt_brutto_f2' => $brutto_f2,
                'brt_brutto_f3' => $brutto_f3,
                'brt_brutto_f4' => $brutto_f4,
                'brt_brutto_f5' => $brutto_f5,
                'brt_brutto_f6' => $brutto_f6,
                'brt_net_f1' => $net_f1,
                'brt_net_f2' => $net_f2,
                'brt_net_f3' => $net_f3,
                'brt_net_f4' => $net_f4,
                'brt_net_f5' => $net_f5,
                'brt_net_f6' => $net_f6,
                'gsize' => $gsize,
                'ma' => $ma,
                'sd' => $sd,
                'cv' => $cv,
            );

        $insert = $this->db->insert('grandsize_tmp', $data);
        
        if ( $insert ){ return true; }else{ return false; }
        
          
    }
    
    function get_analisa_grandsize_tmp(){
  		
        $this->db->select('*');
		$this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id', 'DESC'); 

		$query = $this->db->get('grandsize_tmp',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
    }
    
    function delete_analisa_grandsize_tmp(){
        $this->db->where('id_user', $this->session->userdata('id_user') );
        
        $delete = $this->db->delete('grandsize_tmp');
        
        if ($delete){return true;}
    }
    
    function simpan_analisa_fiber_tmp(){
        
        $this->db->where('id_user', $this->session->userdata('id_user') );
        $this->db->delete('fiber_tmp');
        
        $wadah = $this->input->post('input')[0];
        $awal = $this->input->post('input')[1];
        $akhir = $this->input->post('input')[2];
        $hasil = $this->input->post('hasil');
        
        $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'wadah' => $wadah,
                'awal' => $awal,
                'akhir' => $akhir,
                'hasil' => $hasil
            );

        $insert = $this->db->insert('fiber_tmp', $data);
        
        if ( $insert ){ return true; }else{ return false; }
    }
    
    function get_analisa_fiber_tmp(){
  		
        $this->db->select('*');
		$this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id', 'DESC'); 

		$query = $this->db->get('fiber_tmp',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
    }
    
    function delete_analisa_fiber_tmp(){
        $this->db->where('id_user', $this->session->userdata('id_user') );
        
        $delete = $this->db->delete('fiber_tmp');
        
        if ($delete){return true;}
    }
    
    function getPengenceran($id){
  		
        $this->db->select('*');
        $this->db->where('id', $id);

		$query = $this->db->get('material_analisa',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
    }
    
    function get_parameter($param){
        
        $this->db->select('*');
        $this->db->where('id_parameter', $param);
    
        $query = $this->db->get('parameter_analisa',1);

        if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
    
    function delete_verifikasi_by_id($id){
        
        $this->db->where('id_verifikasi', $id );
        $delete_detil = $this->db->delete('verifikasi_detil');
        
        $this->db->where('id', $id );
        $delete_header = $this->db->delete('verifikasi');
        
        if ($delete_header){return true;}
    }
    
    function fix_rounding($val,$round){
        
        $query = $this->db->query("select round($val,$round) as hasil");
        
        return $query->row_array();
        
    }

}
