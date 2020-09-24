<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Ujipetikberat_controller extends CI_Controller {
    private $cat;
    private $menu;
    private $submenu;
    private $module;
    private $url;

    function __construct()
    {
        parent :: __construct();

        $this->cat = $this->input->post('cat');
        $this->menu = $this->input->post('menu');
        $this->submenu = $this->input->post('submenu');
        $this->module = $this->input->post('module');
        $this->url = "$this->menu/$this->submenu/$this->module";

        $this->load->model('user_model');
        $this->load->model('hakakses_model');
        $this->load->model('ujipetik_model');

    }

    function do_action(){

        $data['cat'] = $this->cat;
        $data['submenu_title'] = $this->input->post('submenu_title');
        $data['module_title'] = $this->input->post('module_title');
        $data['module_id'] = $this->input->post('module_id');

        $action = $this->input->post('action');
    	$param_data = $this->input->post('data');
    
    	$admin = $this->session->userdata('is_admin');
    	$id_user = $this->session->userdata('id_user');
    	$permit = $this->hakakses_model->user_permission (  $id_user, $data['module_id'] , $admin );
    	//print_r($permit);
    	$data['is_create'] = $permit['is_create'];
    	$data['is_update'] = $permit['is_update'];
    	$data['is_delete'] = $permit['is_delete'];

        cek_sesi();

        switch($action){
            case 'showdata':
                $no_pack = $param_data[2];
                $date = $param_data[1];
                $data['showData'] = $param_data[3];
                $data['analisa'] = $this->ujipetik_model->show_analisa( $no_pack, $date, $display = false );
                $data['param'] = $this->ujipetik_model->get_param_uji($no_pack);
                $this->load->view( $this->url . '/show_daftar_analisa',$data);
            break;
            case 'open_form_analisa':
                $this->load->view( $this->url . '/show_form_analisa',$data);
            break;
			case 'open_detil_analisa':
    			$id = $param_data[1];
    			$data['analisa'] = $this->ujipetik_model->get_analisa_by_id($id);
    			$this->load->view( $this->url . '/show_detil_analisa',$data);
            break;
        }

    }

	function simpan_analisa(){

        $simpan = $this->ujipetik_model->simpan_analisa();
        if ($simpan){ echo "OK"; };
	}
    
    function delete_analisa(){
        $delete = $this->ujipetik_model->delete_analisa();
		if ($delete){ echo "OK"; };
    }

  }
