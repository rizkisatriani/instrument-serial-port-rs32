<?php

	class System_model extends CI_Model
	{

		function __construct()
		{
			parent:: __construct();
		}

    function SystemSettingParameter(){

      $this->db->select('*');

      $query = $this->db->get('system',1);

      if ( $query->num_rows() == 1 )
      {
        return $query->row_array();
      }
      else
      {
        return false;
      }
    }

  }
