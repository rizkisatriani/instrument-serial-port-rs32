<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User_controller extends CI_Controller {
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

    }

    function do_action(){

        $data['cat'] = $this->cat;
        $data['submenu_title'] = $this->input->post('submenu_title');
        $data['module_title'] = $this->input->post('module_title');
        $data['module_id'] = $this->input->post('module_id');

        $action = $this->input->post('action');
				$param_data = $this->input->post('data');

        switch($action){
          case 'showdata':
            $data['user'] = $this->user_model->show_all_user();
            $this->load->view( $this->url . '/show_daftar_user',$data);
          break;
					case 'detil_user':
						$id = $param_data[1];
						$data['user'] = $this->user_model->show_user_by_id($id);
						$this->load->view( $this->url . '/show_detil_user',$data);
					break;
					case 'showdata_now_module':
						$id = $param_data[1];
						$data['USER'] = $this->user_model->show_user_by_id($id);

						$admin = $data['USER']['is_admin'];

						$data['hak_modul'] = $this->module_model->check_modules_granted( $admin, $id);

						$this->load->view( $this->url . '/show_user_module',$data);
					break;
					case 'showdata_all_module':
						$id = $param_data[1];
						$data['USER'] = $this->user_model->show_user_by_id($id);

						$admin = $data['USER']['is_admin'];

						$data['daftar_modul'] = $this->module_model->all_modules($id);

						$this->load->view( $this->url . '/show_all_module',$data);
					break;

        }
    }

		function load_tab_content(){

			$id = $this->input->post('paramValue');
			$tab = $this->input->post('tab');

			$data['USER'] = $this->user_model->show_user_by_id($id);

			switch ($tab) {
				case 'about':
					$this->load->view( $this->url . '/show_tab_about',$data);
					break;
				case 'module':
					//$data['daftar_modul'] = $this->module_model->all_modules($id);
					$this->load->view( $this->url . '/show_tab_module',$data);
					break;

			}

		}

		function tambah_hakmodul(){

			$addmodule = $this->hakakses_model->tambah();

			if ($addmodule){ echo 'OK'; }

		}

		function delete_hakmodul(){

			$deletemodule = $this->hakakses_model->hapus();

			if ( $deletemodule ){ echo 'OK'; }

		}

		function sethakuser(){

			$sethakuser = $this->hakakses_model->sethakuser();

			if ( $sethakuser ){ echo 'OK'; }
		}

		function ResetPassword(){

			$system = $this->system_model->SystemSettingParameter();

			$defaultPassword = $system['defaultpassword'];

			$resetPass = $this->user_model->ResetPassword($defaultPassword);

			if ( $resetPass ){ echo 'OK'; }

		}

		function DeleteUser(){
			$resetPass = $this->user_model->DeleteUser();

			if ( $resetPass ){ echo 'OK'; }
		}

		function CreateNewUser(){

			$system = $this->system_model->SystemSettingParameter();

			$defaultPassword = $system['defaultpassword'];

			$nip = $this->input->post('nip');

			$already = $this->user_model->chek_already_User($nip);

			if (!$already){
				$createuser = $this->user_model->CreateNewUser($defaultPassword);
				echo "OK|".$createuser;

			}else{
				echo "ERROR The User Already Exist";
			}


		}

		function AllowAktif(){

				$updateAllow = $this->user_model->updateAllow();

				if ($updateAllow){ echo "OK"; }else{ echo "Update Error"; };

		}

		function update_detil_user(){

			$update = $this->user_model->update_detil_user();

			if ( $update ){ echo 'OK'; }
		}

	}
