<?php

class Module_model extends CI_Model
{

	function __construct()
	{
		parent:: __construct();

	}

  function check_modules_granted( $admin, $id_user)
	// untuk mengambil semua hak modul setiap user untuk dipasangkan di menu utama
	{
		$modules = array();
		if ( $admin ) {
			$query = $this->db->query("SELECT
                                        	`modules`.`id` AS moduleid,
                                        	`submenus`.`name` AS submenu,
                                        	`submenus`.`desc` AS submenudesc,
                                        	`modules`.`name` AS module,
                                        	`modules`.`desc` AS moduledesc,
                                        	`menus`.`name` AS menu,
                                        	`menus`.`desc` AS menudesc,
                                        	'1' AS is_create,
                                        	'1' AS is_update,
                                        	'1' AS is_delete,
                                        	`submenus`.`logo` as submenulogo,
                                            `modules`.`logo` AS modulelogo
                                        FROM
                                        	`modules`
                                        	INNER JOIN `submenus`
                                        	  ON `modules`.`id_submenu` = `submenus`.`id`
                                        	INNER JOIN `menus`
                                        	  ON `submenus`.`id_menu` = `menus`.`id`
                                         WHERE `submenus`.`active` = '1'
                                            AND `modules`.`active` = '1'
                                         ORDER BY `menus`.`urut`,
                                        	`submenus`.`urut`,
                                        	`modules`.`urut` ");
		} else {
			$query = $this->db->query("SELECT
											`modules`.`id` AS moduleid,
											`submenus`.`name` AS submenu,
											`submenus`.`desc` AS submenudesc,
											`modules`.`name` AS module,
											`modules`.`desc` AS moduledesc,
											`menus`.`name` AS menu,
											`menus`.`desc` AS menudesc,
											`hakakses`.`is_create`,
											`hakakses`.`is_update`,
											`hakakses`.`is_delete`,
                                            `submenus`.`logo` as submenulogo,
                                            `modules`.`logo` AS modulelogo
										 FROM
											`modules`
											INNER JOIN `hakakses`
											  ON `hakakses`.`id_module` = `modules`.`id`
											INNER JOIN `submenus`
											  ON `modules`.`id_submenu` = `submenus`.`id`
											INNER JOIN `menus`
											  ON `submenus`.`id_menu` = `menus`.`id`
										 WHERE `hakakses`.`id_user` = '$id_user'
											AND `submenus`.`active` = '1'
                                            AND `modules`.`active` = '1'
										 ORDER BY `menus`.`urut`,
											`submenus`.`urut`,
											`modules`.`urut` ");
		}
		$result = $query->result();
		//if ( $result ){
			foreach( $result as $row ){
				array_push($modules, array($row->menu,
													$row->menudesc,
													$row->submenu,
													$row->submenudesc,
                          $row->submenulogo,
													$row->module,
													$row->moduledesc,
                          $row->modulelogo,
													$row->moduleid,
													$row->is_create,
													$row->is_update,
													$row->is_delete
													));

			}
			//print_r ($modules);
			return $modules;
		//} else {
		//	return false;
		//}
	}

  function get_modules_url( $menu, $submenu, $module )
	// mengambil informasi dari modul yang telah dipilih user di menu
	{
		$this->db->select('menus.name as menu, submenus.name as submenu, submenus.desc AS submenu_title,
                            modules.desc AS module_title, modules.id AS module_id,`menus`.`desc` AS menudesc,
                            `submenus`.`logo` as submenulogo,`modules`.`logo` AS modulelogo');
		$this->db->from('modules');
		$this->db->join('submenus', 'modules.id_submenu = submenus.id','left');
		$this->db->join('menus', 'submenus.id_menu = menus.id','left');
		$this->db->where('modules.name', $module);
		$this->db->where('submenus.name', $submenu);
		$this->db->where('menus.name', $menu);

		$query = $this->db->get();

		return $query->row_array();
	}

	function all_modules($id_user)
	// medul yang tersedia
	{

		$all_modules = array();
		$query = $this->db->query("SELECT menus.`name` AS menu_name,
											menus.desc AS menu_desc,
											submenus.name AS submenu_name,
											submenus.desc AS submenu_desc,
											modules.name AS module_name,
											modules.desc AS module_desc,
											modules.id AS module_ID
											FROM
												modules
											LEFT JOIN submenus
												ON modules.id_submenu = submenus.id
											LEFT JOIN menus
												ON submenus.id_menu = menus.id
											WHERE
 												submenus.`active` = '1'
												and menus.`only_admin` = '0'
											AND modules.`id` NOT IN
												(SELECT
														hakakses.`id_module`
													FROM
														hakakses,
														modules,
														submenus
													WHERE hakakses.`id_user` = '$id_user'
													AND hakakses.`id_module` = modules.id
													AND modules.`id_submenu` = submenus.`id`
												)
											ORDER BY menus.id,
											submenus.urut,
											modules.urut");

											//$query = $this->db->result();
		if ( $query ){
			foreach( $query->result() as $row ){
				array_push($all_modules, array($row->menu_name,$row->menu_desc,$row->submenu_name ,$row->submenu_desc, $row->module_name ,$row->module_desc, $row->module_ID));
			}
		/* hasil
			[0] => Array ( [0] => master [1] => Master Data [2] => strukturorg [3] => STRUKTUR [4] => kepangkatan [5] => Kepangkatan [6] => 1)
			[1] => Array ( [0] => master [1] => Master Data [2] => strukturorg [3] => STRUKTUR [4] => varianpangkat [5] => Varian Pangkat [6] => 2 )
			[2] => Array ( [0] => master [1] => Master Data [2] => strukturorg [3] => STRUKTUR [4] => organisasi [5] => Organisasi [6] => 3 )
		 */
		//print_r ($all_modules);
			return $all_modules;
		} else {
			return false;
		}
	}

	function add_module_user($id_user,$id_module){

	}

	function get_all_menu(){
		$this->db->select('*');
		$this->db->order_by('urut', 'ASC');
		$query = $this->db->get('menus');

		return $query->result();
	}

	function get_submenu_by_menu($idmenu){

		$this->db->select('*');
		$this->db->order_by('urut', 'ASC');
		$this->db->where('id_menu',$idmenu);

		$query = $this->db->get('submenus');

		return $query->result();

	}

	function get_module_by_submenu($idsubmenu){

		$this->db->select('*');
		$this->db->order_by('urut', 'ASC');
		$this->db->where('id_submenu',$idsubmenu);

		$query = $this->db->get('modules');

		return $query->result();

	}

	function chek_submenu(){

			$submenuid = $this->input->post('submenuid');

			$this->db->select('*');
			$this->db->where('name', $submenuid);
			//$this->db->where('password', $password);

			$query = $this->db->get('submenus', 1);

			if ( $query->num_rows() == 1 )
			{
				return $query->row();
			}
			else
			{
				return false;
			}

	}

	function insert_new_submenu(){

			$menus = $this->input->post('menus');
			$desc = $this->input->post('submenudesc');
			$submenuid = $this->input->post('submenuid');
			$logo= $this->input->post('submenulogo');
			$urut = $this->input->post('submenusurut');

			$data = array(
				'id_menu' => $menus,
				'urut' => $urut,
				'name' => $submenuid,
				'desc' => $desc,
				'logo' => $logo
			);

			$query = $this->db->insert('submenus', $data);

			if ($query){ return true;}else{return false;}

	}


}
