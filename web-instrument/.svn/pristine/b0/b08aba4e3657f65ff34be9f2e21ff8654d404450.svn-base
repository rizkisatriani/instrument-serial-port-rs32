<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( !function_exists('get_api') )
{

    function get_api($param_id){

      $CI =& get_instance();
      $CI->load->library('curl');
      $CI->load->model('devices_model');

      $devices = $CI->devices_model->get_devices_by_id($param_id);

      $url = $devices['url'];
      $metode = $devices['metode'];
      $metode_value = $devices['metode_value'];
      $string_awal = $devices['awal'];
      $string_akhir = $devices['akhir'];
      $key = APIKEY;

      $headers = array('Content-Type: application/json',
                          'App-Key:'.$key.'');

      $CI->curl->option('RETURNTRANSFER', 1);
      $CI->curl->option('HTTPHEADER', $headers);
      $CI->curl->option('connecttimeout', 100);
      $data = $CI->curl->simple_get($url);
      $awal = "";

      if ($data){
         $dataArray = json_decode($data, true); 
         $value = $dataArray["VALUE"];

         switch ($metode) {
           case 'array':
               $isi_array = explode(',',$value);
               if (!empty($isi_array[$metode_value])){
                 $awal = floatval($isi_array[$metode_value]);
                 $isi = round($awal,2);
               }else{
                 $isi = 0;
               }
             break;
          case 'search':
            $isi_awal = strpos($value,$metode_value);
            $awal = floatval(substr(substr($value,$isi_awal,21) , $string_awal,$string_akhir ));
            $isi = round($awal,2);
          break;

           default:
             $isi = $value;
             break;
         }
         return $isi;
      }else{
         return $CI->curl->error_string;
      }

    }

}

if ( !function_exists('post_api') )
{

    function post_api($param_id){

      $CI =& get_instance();
      $CI->load->library('curl');
      $CI->load->model('devices_model');

      $devices = $CI->devices_model->get_devices_by_id($param_id);

      $deviceNama = $devices['nama'];

      $url = $devices['url'];
      $metode = $devices['metode'];
      $metode_value = $devices['metode_value'];
      $config = $devices['port']."|".$devices['baudrate']."|".$devices['databit']."|".$devices['parity']."|".$devices['stopbit']."|".$devices['handshake'];
      $key = APIKEY;

      $headers = array('Content-Type: application/json',
                          'App-Key:'.$key.'');

      $CI->curl->option('RETURNTRANSFER', 1);
      $CI->curl->option('HTTPHEADER', $headers);
      $CI->curl->option('connecttimeout', 100);

      $data = array('Id'=> 1,
                    'Title' => "PT Gunung Madu Plantations",
                    "Author" => "$deviceNama",
                    "COM_SET" => $config,
                    "COM_STATUS" => false,
                    "COM_MESSAGE" => "",
                    "VALUE" => "0"
                    );

      $post_data = json_encode($data);

      $data = $CI->curl->simple_post($url,$post_data);

      if ($data){
         return "OK";
      }else{
         return $CI->curl->error_string;
      }

    }

}
