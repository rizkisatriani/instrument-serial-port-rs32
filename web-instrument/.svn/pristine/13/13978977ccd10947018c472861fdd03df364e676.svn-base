<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportdailyeva_controller extends CI_Controller {
	   
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
        $this->load->model('Reportdailyeva_model');

    }
    
    function do_action()
    {

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
        
        $data['url'] = $this->url;

        cek_sesi();

        switch($action){
            case 'showdata':
              $this->load->view( $this->url . '/form_cetak',$data);
              break;
        }

    }
    
    function add_session_print(){
        
        $jenis_laporan = $this->input->post('jenis_laporan');
        $jenis_timbang = $this->input->post('jenis_timbang');
        $url = $this->input->post('url');
        $data = $this->input->post('data');
        
        $tanggal_awal = $data[0];
        $tanggal_akhir = $data[1];
        
        $array_items = array('view_url','jenis_laporan','jenis_timbang','tanggal_awal','tanggal_akhir');
        
        $this->session->unset_userdata($array_items);
        
        $this->session->set_userdata(array(
                                        'view_url' => $url,
                                        'jenis_laporan' => $jenis_laporan, 
                                        'jenis_timbang' => $jenis_timbang,
                                        'tanggal_awal' => $tanggal_awal,
                                        'tanggal_akhir' => $tanggal_akhir,
                                     ));
    }
     
    function export_pdf(){
         
                $url = $this->session->userdata('view_url');
                $tanggal_awal = $this->session->userdata('tanggal_awal');
                $tanggal_akhir = $this->session->userdata('tanggal_akhir');  
                $var['tanggal_awal'] = $tanggal_awal;
                $var['tanggal_akhir'] = $tanggal_akhir;
                
                $this->load->vars( $var );  
                $data['data'] = $this->Reportdailyeva_model->get_data($tanggal_awal);    
                $data['header'] = $this->Reportdailyeva_model->get_data_header();      
                $data['tanggal']=$tanggal_awal; 
                $this->load->view( $url. '/cetak_report_eva_daily',$data);
           
    }
    
}
