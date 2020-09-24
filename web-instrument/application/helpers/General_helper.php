<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( !function_exists('formattanggalmysql') )
{
	function formattanggalmysql($tanggal) {
		  //24-05-1985 ke 1985-05-24
		if($tanggal){
			 $thn = substr("$tanggal",6,4);
			 $bln = substr("$tanggal",3,2);
			 $tgl = substr("$tanggal",0,2);
			 $hsl_t = "$thn-$bln-$tgl";
			 return($hsl_t);
		}
	}
}

if ( !function_exists('formattanggalindo') )
{
	function formattanggalindo($tanggal){
		if (is_null($tanggal)) {
			return;
		}
		$exp = explode('-', $tanggal);
		$tgl ="";
		if(isset($exp[0])){ $tgl = "$exp[2]-$exp[1]-$exp[0]"; }
		return $tgl;
	}
}

if ( !function_exists('nama_user') )
{
	function nama_user($id){
		if (is_null($id)) {
			return;
		}
		$CI =& get_instance();
		$CI->load->model('user_model');
		$data = $CI->user_model->show_user_by_id($id);
		return $data['namalengkap'];
	}
}

if ( !function_exists('cek_sesi') ) {
	function cek_sesi()
	 {
		 $CI = get_instance();

		 if ( !$CI->session->userdata('logged_in') )
		 {
			 $arr['pesan'] = 'Sessi Anda sudah berakhir,  Anda diharuskan login kembali';
			 $arr['judul'] = "Pemberitahuan";
			 $CI->load->view( 'element/include/alert_session_login', $arr );
		 } else {
			 $newdata = array( 'last_activity' => time() );
			 $CI->session->set_userdata($newdata);
			 return $CI->session->userdata('logged_in');
		 }
	 }
}

if ( !function_exists('staus_data') ) {
	function staus_data($id)
	 {
		 switch($id){
			 case '1':
			 	return 'New';
			 break;
			 case '2':
			 	return 'Ricek';
			 break;
			 case '3':
			 	return 'Test';
			 break;
			 default:
			 	return '';
			 break;
		 }
	 }
}

if ( !function_exists('jam_sebelumnya') ) {
	function jam_sebelumnya($jam)
	 {
		 switch($jam){
			 case '06:00': return '05:00'; break;
             case '07:00': return '06:00'; break;
             case '08:00': return '07:00'; break;
             case '09:00': return '08:00'; break;
             case '10:00': return '09:00'; break;
             case '11:00': return '10:00'; break;
             case '12:00': return '11:00'; break;
             case '13:00': return '12:00'; break;
             case '14:00': return '13:00'; break;
             case '15:00': return '14:00'; break;
             case '16:00': return '15:00'; break;
             case '17:00': return '16:00'; break;
             case '18:00': return '17:00'; break;
             case '19:00': return '18:00'; break;
             case '20:00': return '19:00'; break;
             case '21:00': return '20:00'; break;
             case '22:00': return '21:00'; break;
             case '23:00': return '22:00'; break;
             case '24:00': return '23:00'; break;
             case '01:00': return '24:00'; break;
             case '02:00': return '01:00'; break;
             case '03:00': return '02:00'; break;
             case '04:00': return '03:00'; break;
             case '05:00': return '04:00'; break;
			 
		 }
	 }
}

if (!function_exists('get_client_ip')){
    function get_client_ip() //IP gx tepat kalo jaringan di bungkus2 yg ke baca jadi IP router
     {
          $ipaddress = '';
          if (getenv('HTTP_CLIENT_IP'))
              $ipaddress = getenv('HTTP_CLIENT_IP');
          else if(getenv('HTTP_X_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
          else if(getenv('HTTP_X_FORWARDED'))
              $ipaddress = getenv('HTTP_X_FORWARDED');
          else if(getenv('HTTP_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_FORWARDED_FOR');
          else if(getenv('HTTP_FORWARDED'))
              $ipaddress = getenv('HTTP_FORWARDED');
          else if(getenv('REMOTE_ADDR'))
              $ipaddress = getenv('REMOTE_ADDR');
          else
              $ipaddress = 'UNKNOWN';
    
          return $ipaddress;
     }

//helper tanggal indo
  if ( ! function_exists('date_indo'))
    {
        function date_indo($tgl)
        {
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);
            $tanggal = $pecah[2];
            $bulan = bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal.' / '.$bulan.' / '.$tahun;
        }
    }

    if ( ! function_exists('date_indo_M_Y'))
    {
        function date_indo_M_Y()
        {
             $ubah = date("Y-m-d");
            $pecah = explode("-",$ubah); 
            $bulan = bulan($pecah[1]);
            $tahun = $pecah[0];
            return  $bulan.' '.$tahun;
            //return $ubah;
        }
    }
      
    if ( ! function_exists('bulan'))
    {
        function bulan($bln)
        {
            switch ($bln)
            {
                case 1:
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
        }
    } 
    if ( ! function_exists('alias_parameter'))
    {
        function alias_parameter($param)
        {
            $CI =& get_instance();
            $CI->load->model('helper_model');
            $arrData = $CI->helper_model->get_parameter($param);
            
            $alias = $arrData['alias'];
            
            return $alias;
            //return $ubah;
        }
    }
    
    if ( ! function_exists('fix_rounding'))
    {
        function fix_rounding($val,$round)
        {
            $CI =& get_instance();
            $CI->load->model('helper_model');
            $arrData = $CI->helper_model->fix_rounding($val,$round);
            
            $hasil = $arrData['hasil'];
            
            return $hasil;
        }
    }
 
}

