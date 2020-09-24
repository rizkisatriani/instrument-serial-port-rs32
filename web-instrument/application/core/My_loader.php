<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class My_Loader extends CI_loader
	{

    public function template_login()
    {
        $data['el'] = "";

        $this->view('element/head', $data);
        $this->view('element/login/login', $data);
    }

    public function template_header()
    {
        $data['el'] = "";

        $this->view('element/head', $data);
    }

    public function template_main_header($data,$submenu,$modul)
    {
        $data['url_menu'] = $this->uri->segment(1);
        $data['url_submenu'] = $submenu;
        $data['url_module'] = $modul;

        $this->view('element/header', $data);
    }

    public function template_page_conten( $data )
    {
        $data['el'] = "";
        $url = "$data[menu]/$data[submenu]/$data[module]/template";

        $this->view($url,$data);
    }

    public function template_foter()
    {
        $data['el'] = "";
        $this->view('element/footer', $data);
    }

    public function template_dashboard()
    {
        $data['el'] = "";
        $this->view('element/homepage/homepage');
    }

    public function template_user_profil()
    {
        $data['el'] = "";
        $this->view('users/profil');
    }

    public function template_index()
    {
        $data['el'] = "";
        $this->view('welcome_message');
    }



  }
