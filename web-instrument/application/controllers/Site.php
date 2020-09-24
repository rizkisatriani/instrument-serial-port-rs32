<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
        if( $this->session->userdata('logged_in') )
        {
            redirect(site_url('home'));

        }else{
            redirect(site_url('login'));
        }
	}

    function load_login(){

        $this->load->template_login();
    }


    function login()
    {
        $this->load->model('user_model');

        $nip = $this->input->post('user');
        $password = $this->input->post('password');

        $user = $this->user_model->check_login($nip, $password);

        if (!$user) {
            $this->session->set_flashdata(array('logged_error' => TRUE, 'warning' => 'User tidak di temukan..!'));
            redirect(site_url('login'));
            return false;
        }

        if ($password != $user->password){
            $this->session->set_flashdata(array('logged_error' => TRUE, 'warning' => 'Password salah..!'));
            redirect(site_url('login'));
            return false;

        }

        if (!$user->allow){
            $this->session->set_flashdata(array('logged_error' => TRUE, 'warning' => 'Anda tidak memiliki hak akses ke halaman ini..!'));
            redirect(site_url('login'));
            return false;
        }

        $allow = $user->namalengkap;

        $this->session->unset_userdata('error_logged');

        $this->session->set_userdata(array(
                                            'logged_in' => TRUE,
								            'id_user' => $user->id,
								            'namalengkap' => $user->namalengkap,
								            'nip' => $user->nip,
                                            'gender' => $user->gender,
								            'allow' => $user->allow,
                                            'is_admin' => $user->is_admin,
								            'bidang_kerja' => $user->bidang_kerja
								    ));
        redirect(site_url('home'));
    }

    function logout()
    {

        $array_items = array('logged_in','id_user','namalengkap','nip',
                            'gender','allow','is_admin','bidang_kerja');

        $this->session->unset_userdata($array_items);

        redirect(site_url('login'));

    }

    function gantipassword(){
        
        $this->load->model('user_model');

        $iduser = $this->input->post('iduser');
        $nip = $this->input->post('user');
        $password = $this->input->post('password');
        $newpassword = $this->input->post('passwordbaru');
        $newpassword2 = $this->input->post('passwordbaru2');

        $user = $this->user_model->check_login($nip, $password);

        if (!$user) {
            echo "User tidak di temukan..!'";
            return false;
        }

        if ($password != $user->password){
            echo "Password salah..!";
            return false;
        }

        $update = $this->user_model->ResetPassword($newpassword);

			echo "OK";

    }

    function get_api(){

        $id = $this->input->post('id_devices');

        echo get_api($id);
    }

    function post_api(){

        $id = $this->input->post('id_devices');

        echo post_api($id);
			//return false;
    }

    function show_count_analysis_by_module(){
        $this->load->model('helper_model');
        $data = $this->helper_model->show_count_analysis_by_module();
        echo json_encode($data);
    }
    
    function show_data_uji_petik($jenis){
        $this->load->model('helper_model');
        
        $data = $this->helper_model->show_uji_petik($jenis);
        
        echo json_encode($data,JSON_NUMERIC_CHECK);
    }
    
    function get_device_setting(){
        $this->load->model('devices_model');
        $ip = $this->input->post('ip');

        $data =  $this->devices_model->get_devices_by_ip($ip);
        
        echo json_encode($data);
    }
    
    function delete_verifikasi(){
        
        $this->load->model('helper_model');
        
        $id = $this->input->post('id');
        $delete = $this->helper_model->delete_verifikasi_by_id($id);
        
        echo "OK";
    }


}
