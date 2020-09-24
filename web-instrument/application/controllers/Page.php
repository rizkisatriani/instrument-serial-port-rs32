<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct()
	{
			parent :: __construct();
	}

	function unset_only() {
			$ses_data = $this->session->all_userdata();
	}

	function load_page( $submenu = null,  $modul = null )
	{
			// membuang session yang tidak diperlukan spt session habis cetak dsb
			$this->unset_only();
			//

      $menu = $this->uri->segment(1);

			if ( !$this->session->userdata('logged_in') ) {
				redirect(site_url('login'));
			}
      //print_r($menu."-".$submenu."-".$modul);
      $admin = $this->session->userdata('is_admin');
      $id_user = $this->session->userdata('id_user');

      $data = $this->module_model->get_modules_url($menu, $submenu, $modul);

			$url['menu'] = $data['menu'];
			$url['submenu'] = $data['submenu'];
			$url['submenu_title'] = $data['submenu_title'];
			$url['module_title'] = $data['module_title'];
			$url['module_id'] = $data['module_id'];
      $url['submenulogo'] = $data['submenulogo'];
      $url['modulelogo'] = $data['modulelogo'];
			$url['module'] = $modul;

			$this->load->template_header();

      $el['arraymodules'] = $this->module_model->check_modules_granted($admin, $id_user);
			
      $this->load->template_main_header($el,$submenu,$modul);

			switch ($menu) {
				case 'home':
					$this->load->template_dashboard();
					break;
				case 'users':
					$this->load->template_user_profil();
					break;
				default:
					$this->load->template_page_conten( $url );
					break;
			}

      $this->load->template_foter();

	}
}
