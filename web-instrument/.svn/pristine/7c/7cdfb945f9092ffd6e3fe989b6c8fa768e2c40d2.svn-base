<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( !function_exists('opsi_db') )
{

    function opsi_db($jenis,$arrdataopsi=null,$awal=null,$flag=null)
    //penggunaan. 	jika ingin memasak pilihan awal adalah '0' maka format adalah buatopsi_db($jenis,'x','0') buatopsi_db($jenis,'','0')
    //			  	jika ingin memasak pilihan awal adalah '' maka format adalah buatopsi_db($jenis,'x','') atau buatopsi_db($jenis,'','')
    {
        $op = array();
        if ( !is_null($awal)) {
            if ($awal === 0)  $awal = '0';
            if ($awal == 'x_all') {
                $op[$awal] = "Pilih .....";
                $op[0] .= "Semua";
            } elseif ( $awal == 'all') {
                $op[0] = "Semua";
            } else {

            if ($awal != '') {
                $op[$awal] = "Pilih .....";
            }
          }
        }

        switch ($jenis) {

          case 'jam_analisa':
            $CI =& get_instance();
            $CI->load->model('helper_model');
            $arrdataopsi = $CI->helper_model->show_jam_analisa();
            foreach($arrdataopsi as $arr ) {$op[$arr->id] = $arr->desc;}

            break;
          case 'material_analisa':
            $CI =& get_instance();
            $CI->load->model('helper_model');
            $arrdataopsi = $CI->helper_model->show_material_analisa($flag);
            foreach($arrdataopsi as $arr ) {$op[$arr->id] = $arr->id_material."-".$arr->name;}
          break;
          case 'parameter_analisa':
            $CI =& get_instance();
            $CI->load->model('helper_model');
            $arrdataopsi = $CI->helper_model->show_parameter_analisa($flag);
            foreach($arrdataopsi as $arr ) {$op[$arr->id_parameter] = $arr->id_parameter." - ".$arr->nama_parameter." (".$arr->alias.") ".$arr->satuan;}
          break;

        }

        return ($op);


    }


}
