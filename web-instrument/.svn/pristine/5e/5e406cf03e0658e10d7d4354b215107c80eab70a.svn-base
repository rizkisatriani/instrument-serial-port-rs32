<?php

class Devices_model extends CI_Model
{

	function __construct()
	{
		parent:: __construct();

	}

    function show_all_devices(){

        $query = $this->db->query("select devices.id,kode_produk,devices.nama,merk,devices.deskripsi,ip,url,port,baudrate,databit,parity,stopbit,handshake,
                                    	devices_jenis.`nama` as jenis,devices_jenis.`deskripsi` as jenis_deskripsi,devices.ip
                                    from devices
                                    left join devices_jenis
                                    on devices_jenis.`id_jenis` = devices.`id_jenis` order by devices.id_alat asc");

        return $query->result();
    }

	function get_devices_by_id($id){

		$this->db->select("*,CONCAT(port,'|',baudrate,'|',databit,'|',parity,'|',stopbit,'|',handshake) AS config");
		$this->db->where('id', $id);

		$query = $this->db->get('devices', 1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
    
    function get_devices_by_id_alat($id_alat){

		$this->db->select("*,CONCAT(port,'|',baudrate,'|',databit,'|',parity,'|',stopbit,'|',handshake) AS config");
		$this->db->where('id_alat', $id_alat);
		$query = $this->db->get('devices', 1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
    
    function get_devices_by_ip($ip){

		$this->db->select("*,CONCAT(port,'|',baudrate,'|',databit,'|',parity,'|',stopbit,'|',handshake) AS config");
		$this->db->where('ip', $ip);
		$query = $this->db->get('devices', 1);
        
        if ($ip){
            
            if ( $query->num_rows() == 1 )
    		{
    			return $query->row_array();
    		}
    		else
    		{
    			return false;
    		} 
        }else{
            return false;
        }	
	}
    
    function update_setting_by_id($id){
    
        $data = array(
            'id_alat' => $this->input->post('idalat'),
            'id_jenis' => $this->input->post('jenis'),
            'kode_produk' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('desc'),
            'ip' => $this->input->post('ipset'),
            'url' => $this->input->post('url'),
            'port' => $this->input->post('port'),
            'baudrate' => $this->input->post('baud'),
            'databit' => $this->input->post('bit'),
            'parity' => $this->input->post('parity'),
            'stopbit' => $this->input->post('stopbit'),
            'handshake' => $this->input->post('handshake'),
            'metode' => $this->input->post('metode'),
            'metode_value' => $this->input->post('metode_value'),
            'awal' => $this->input->post('start'),
            'akhir' => $this->input->post('end')
        );
        
        $this->db->where('id', $id);
        $update = $this->db->update('devices', $data);
        
        if ($update){return true;}
        
    }

 }
