<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Module_controller extends CI_Controller {

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

				$this->load->model('module_model');

    }

    function do_action(){

        $data['cat'] = $this->cat;
        $data['submenu_title'] = $this->input->post('submenu_title');
        $data['module_title'] = $this->input->post('module_title');
        $data['module_id'] = $this->input->post('module_id');

        $action = $this->input->post('action');
        $param_data = $this->input->post('data');

        switch($action){

          case 'form_master_menu':
            $data['menu'] = $this->module_model->get_all_menu();
            $this->load->view( $this->url . '/show_master_menu',$data);
          break;
          case 'showSubmenu':
            $idmenu = $param_data[1];
            $data['submenu'] = $this->module_model->get_submenu_by_menu($idmenu);
            $this->load->view( $this->url . '/show_daftar_submenu',$data);
          break;
          case 'showmodule':
            $idsubmenu = $param_data[1];
            $data['module'] = $this->module_model->get_module_by_submenu($idsubmenu);
            $this->load->view( $this->url . '/show_daftar_module',$data);
          break;

        }
    }

    function createSubmenu(){

        $chek = $this->module_model->chek_submenu();

        if (!$chek){
          $insert = $this->module_model->insert_new_submenu();
          if ($insert){ echo "OK"; }else{ echo "Error Insert data"; };
        }else{
            echo "Error Module Id Sudah Ada";
        }
    }

		function hapusmodule(){
			//$delete = 
		}
  }
