<?php

class Workflow_model extends CI_Model
{

	function __construct()
	{
		parent :: __construct();
	}

  function show_all_workflow(){

    $this->db->select('*');
		$query = $this->db->get('wf_table');

		return $query->result();
  }

	function show_workflow_by_id( $id ){

		$this->db->select('*');
		$this->db->where('id', $id);

		$query = $this->db->get('wf_table',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function show_workflow_submiter_by_wf($id){

		$this->db->select('wf_submiter.id,users.nip as nip,
										users.namalengkap as nama,wf_group.name as group');
		$this->db->from('wf_submiter');
		$this->db->join('users', 'users.id = wf_submiter.id_user');
		$this->db->join('wf_group', 'wf_group.id = wf_submiter.id_wf_group');
		$this->db->where('id_wf_table', $id);

		$query = $this->db->get();

		return $query->result();
	}

	function get_button_workflow($id_group){

			$this->db->select('wf_status.id,wf_action.desc');
			$this->db->from('wf_action');
			$this->db->join('wf_status', 'wf_status.id = wf_action.id_wf_status');
			$this->db->where('id_wf_group',$id_group);

			$query = $this->db->get();
			//print_r($this->db->last_query());
			return $query->result();
	}

	function get_wf_table_by_module_id($module_id){

			$this->db->select('*');
			$this->db->where('id_module', $module_id);

			$query = $this->db->get('wf_table',1);

			if ( $query->num_rows() == 1 )
			{
				return $query->row_array();
			}
			else
			{
				return false;
			}
	}

	function chek_transaction($tablename,$fieldname,$row_id){
			$this->db->select('*');
			$this->db->where('id', $row_id);

			$query = $this->db->get($tablename,1);

			if ( $query->num_rows() == 1 )
			{
				return $query->row_array();
			}
			else
			{
				return false;
			}
	}

	function update_status_transaction($get_wf_table,$row_id,$action_id,$pendingby,$buttonid){

		$tablename = $get_wf_table['nama_table'];
		$fieldname = $get_wf_table['nama_field'];
		$namapending = $get_wf_table['nama_pending'];
		$namaverify = $get_wf_table['nama_verify'];
		$namaapprove = $get_wf_table['nama_approve'];

		switch ($buttonid) {
			case 'Verify':
				$field = $namaverify;
				$value = $this->session->userdata('id_user');
				$data = array(
		        $fieldname => $action_id,
						$namapending => $pendingby,
						$field=>$value
				);
				break;
			case 'Approve':
				$field = $namaapprove;
				$value = $this->session->userdata('id_user');
				$data = array(
		        $fieldname => $action_id,
						$namapending => $pendingby,
						$field=>$value
				);
				break;
			default:
				$data = array(
						$fieldname => $action_id,
						$namapending => $pendingby
				);
				break;
		}

		$this->db->where('id', $row_id);
		$query = $this->db->update($tablename, $data);

		if ($query){return true;}else{return false;}

	}

	function get_group_user($module_id,$user_id){

		$query = $this->db->query("select wf_submiter.`id_user` as submit,wf_asigment.`id_user` as assigment, wf_asigment.`id_wf_group` as id_group
												 			from wf_table
															inner join wf_submiter on wf_submiter.`id_wf_table` = wf_table.`id`
															inner join wf_asigment on wf_asigment.`id_wf_submiter` = wf_submiter.`id`
															inner join wf_group on wf_group.`id` = wf_asigment.`id_wf_group`
															where wf_table.`id_module` = '$module_id' and ( wf_submiter.`id_user` = '$user_id' or wf_asigment.`id_user` = '$user_id')
															LIMIT 1");

		return $query->row_array();

	}

	function get_wf_by_submit($idwftable,$user_id){

		$this->db->select('wf_submiter.id,wf_asigment.id_user');
		$this->db->from('wf_submiter');
		$this->db->join('wf_asigment', 'wf_asigment.id_wf_submiter = wf_submiter.id');
		$this->db->where('wf_submiter.id_user',$user_id);
		$this->db->where('wf_submiter.id_wf_table',$idwftable);
		$this->db->where('wf_asigment.step','1');

		$query = $this->db->get();

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function get_wf_next($idwftable,$user_id,$submit_id){

		$this->db->select('wf_submiter.id,wf_asigment.id_user,wf_asigment.step');
		$this->db->from('wf_submiter');
		$this->db->join('wf_asigment', 'wf_asigment.id_wf_submiter = wf_submiter.id');
		$this->db->where('wf_submiter.id_user',$submit_id);
		$this->db->where('wf_submiter.id_wf_table',$idwftable);
		$this->db->where('wf_asigment.id_user',$user_id);
		//$this->db->where('wf_asigment.step','1');
		$query = $this->db->get()->row_array();

		$curstep = $query['step'];

		$nexstep = $curstep + 1;

		$this->db->select('wf_submiter.id,wf_asigment.id_user,wf_asigment.step');
		$this->db->from('wf_submiter');
		$this->db->join('wf_asigment', 'wf_asigment.id_wf_submiter = wf_submiter.id');
		$this->db->where('wf_submiter.id_user',$submit_id);
		$this->db->where('wf_submiter.id_wf_table',$idwftable);
		$this->db->where('wf_asigment.step',$nexstep);

		$query2 = $this->db->get();

		if ( $query2->num_rows() == 1 )
		{
			return $query2->row_array();
		}
		else
		{
			return false;
		}

	}
}
