<?php

	class Hakakses_model extends CI_Model
	{

		function __construct()
		{
			parent:: __construct();
		}

		function user_permission (  $id_user, $id_module , $is_admin ) {
			$it = $this->session->userdata('it');
			if ($it) $is_admin = '1'; // override jika grup it
			if( $is_admin == '0' or $is_admin == '' ){
				$this->db->select('*');
				$this->db->from('hakakses');
				$this->db->where('hakakses.id_module', $id_module);
				$this->db->where('hakakses.id_user', $id_user);

				$query = $this->db->get();
				return $query->row_array();
			} else {
				$row = array();
				$row['is_create'] = '1';
				$row['is_update'] = '1';
				$row['is_delete'] = '1';
				return $row;
			}

		}

    function tambah(){

      $data = array(
        'id_user' => $this->input->post('id_user'),
        'id_module' => $this->input->post('id_module')
      );

      $simpan = $this->db->insert('hakakses',$data);
      if ( $simpan ){ return true; } else { return false;}
    }

    function hapus() {

      $data = array(
        'id_user' => $this->input->post('id_user'),
        'id_module' => $this->input->post('id_module')
      );

			//$delete = $this->db->query("delete from hakakses where id_user='$id_user' and id_module='$id_module'");
      $delete = $this->db->delete('hakakses', $data);

			if ( $delete ){ return true; } else { return false;}
		}

		function sethakuser() {
			$jenis = $this->input->post('jenis');
			$nilai = $this->input->post('nilai');

			if ($nilai == 'true'){
				$nilai = 1;
			}else{
				$nilai = 0;
			}

			$idmodul = $this->input->post('idmodul');
			$iduser = $this->input->post('iduser');
			switch ($jenis) {
				case "C" :
					$data = array( 'is_create' => $nilai);
					$this->db->where('id_user', $iduser);
					$this->db->where('id_module', $idmodul);
					$result = $this->db->update('hakakses', $data);
					break;
				case "U" :
					$data = array( 'is_update' => $nilai);
					$this->db->where('id_user', $iduser);
					$this->db->where('id_module', $idmodul);
					$result = $this->db->update('hakakses', $data);
					break;
				case "D" :
					$data = array( 'is_delete' => $nilai);
					$this->db->where('id_user', $iduser);
					$this->db->where('id_module', $idmodul);
					$result = $this->db->update('hakakses', $data);
					break;
			}
			return ($result);
		}



   }
