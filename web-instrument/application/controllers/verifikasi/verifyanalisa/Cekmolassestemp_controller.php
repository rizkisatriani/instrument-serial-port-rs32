<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Cekmolassestemp_controller extends CI_Controller {
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
        $this->load->model('analisa_model');

    }

    function do_action(){
        
        $var = array(); 

        $data['cat'] = $this->cat;
        $data['submenu_title'] = $this->input->post('submenu_title');
        $data['module_title'] = $this->input->post('module_title');
        $data['module_id'] = $this->input->post('module_id');

        $action = $this->input->post('action');
		$param_data = $this->input->post('data');

		$admin = $this->session->userdata('is_admin');
		$id_user = $this->session->userdata('id_user');
		$permit = $this->hakakses_model->user_permission (  $id_user, $data['module_id'] , $admin ); 
		$data['is_create'] = $permit['is_create'];
		$data['is_update'] = $permit['is_update'];
		$data['is_delete'] = $permit['is_delete'];

        cek_sesi();
        
         //  echo 'test :'.$this->input->post('action'); 
        switch($action){
            case 'showdata':
              //$data['analisa'] = $this->analisa_model->show_analisa_verifikasi($param='mollasses'); 
              $this->load->view( $this->url . '/show_daftar_verifikasi',$data);
              break;
            case 'open_form_analisa': 
              $this->load->view( $this->url . '/show_form_verifikasi',$data);
              break;
			case 'open_detil_analisa':
				$id = $param_data[1];
                $data['header'] = $this->analisa_model->get_header_verifikasi_by_id($id); 
                $data['analisa'] = $this->analisa_model->get_verifikasi_analisa_by_id($id);   
                $query = $this->db->query("SELECT verifikasi_detil.id_jam, jam_analisa.desc FROM verifikasi_detil JOIN jam_analisa ON jam_analisa.id = verifikasi_detil.id_jam WHERE id_verifikasi ='$id' GROUP BY id_jam");
                $data['material'] = $query->result();  
                $this->load->view( $this->url . '/show_detil_verifikasi',$data); 
			break;
			case 'open_form_grid_analisa':
                $tgl = $param_data[0];
                $jam = null;
                $jam2 = jam_sebelumnya($jam);  
                $data['tgl'] = $tgl;
                $data['jam'] = $jam; 
                //$data['chek'] = $this->analisa_model->chek_verifikasi_sugar($tgl,'mollasses'); 
                $data['analisa'] = $this->analisa_model->get_process_verifikasi_analisa_tmp($tgl,null,null,$param='mollasses'); 
                $query = $this->db->query("SELECT verifikasi_detil_tmp.id_jam, jam_analisa.desc FROM verifikasi_detil_tmp JOIN jam_analisa ON jam_analisa.id = verifikasi_detil_tmp.id_jam WHERE tanggal='$tgl' AND param ='mollasses' GROUP BY id_jam");
                $data['material'] = $query->result();
				 $this->load->view( $this->url . '/form_grid_verifikasi',$data);
			break;
            case 'showdatatable':
                $date = $param_data[0];
                $tanggal = date('Y-m-d', strtotime($date));
                $data['analisa'] = $this->analisa_model->show_analisa_verifikasi($param='mollasses',$tanggal);
                $this->load->view( $this->url . '/show_verifikasi',$data);
            break;
        }
   }

	function update_verifikasi_tmp(){
        
        $update = $this->analisa_model->update_verifikasi_tmp();
        
        if ($update){ echo "OK"; };
    }

	function simpan_verifikasi(){
	   
        $jam = $this->input->post('jam');
        $tgl = $this->input->post('tgl');
        $param = $this->input->post('param'); 
        $cek = $this->analisa_model->chek_verifikasi($tgl,$jam,$param);
        
        if (!$cek){
            
            $simpan = $this->analisa_model->simpan_verifikasi_perdate();
            
        }else{
            $simpan = false;
        }

		if ($simpan){ echo "OK"; };
	}
    
    function batal_verifikasi(){
        
        $batal = $this->analisa_model->batal_verifikasi_perdate(); 
        if ($batal){ echo 'OK'; };
    }

  }
