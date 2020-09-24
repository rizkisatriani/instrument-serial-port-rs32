<?php

class User_model extends CI_Model
{

	function __construct()
	{
		parent :: __construct();
	}

	function check_login( $nip, $password )
	{
		// $this->support = $this->load->database('db_sigma', true);

		$this->db->select('*');
		$this->db->where('nip', $nip);
		//$this->db->where('password', $password);

		$query = $this->db->get('users', 1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function show_all_user(){

		$this->db->select('*');
		$query = $this->db->get('users');

		return $query->result();
	}

	function show_user_by_id($id){

		$this->db->select('*');
		$this->db->where('id', $id);

		$query = $this->db->get('users',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}

	}

	function ResetPassword($defaultPassword){
		$iduser = $this->input->post('iduser');

		$this->db->set('password', $defaultPassword);
		$this->db->where('id', $iduser);
		$query = $this->db->update('users');

		if ($query){ return true;}else{return false;}

	}

	function DeleteUser(){

		$iduser = $this->input->post('iduser');

		$this->db->where('id', $iduser);
		$query = $this->db->delete('users');

		if ($query){ return true;}else{return false;}

	}

	function CreateNewUser($defaultPassword){

		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');


		$data = array(
		        'nip' => $nip,
		        'namalengkap' => $nama,
						'password' => $defaultPassword
		);

		$this->db->insert('users', $data);

		return $this->db->insert_id();

	}

	function chek_already_User($nip){

		$this->db->select('*');
		$this->db->where('nip', $nip);

		$query = $this->db->get('users',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function updateAllow(){

		$iduser = $this->input->post('iduser');
		$aktif = $this->input->post('aktif');

		$this->db->set('allow', $aktif);
		$this->db->where('id', $iduser);
		$query = $this->db->update('users');

		if ($query){ return true;}else{return false;}
	}

	function update_detil_user(){

		$id = $this->input->post('id_user');
		$gender = $this->input->post('gender');
		$allow = $this->input->post('allow');
		$bidang_kerja = $this->input->post('bidang_kerja');
		$is_admin = $this->input->post('is_admin');

		$data = array(
        'gender' => $gender,
        'allow' => $allow,
        'bidang_kerja' => $bidang_kerja,
				'is_admin' => $is_admin
			);

			$this->db->where('id', $id);
			$query = $this->db->update('users', $data);

			if ($query){ return true;}else{return false;}
	}


}
