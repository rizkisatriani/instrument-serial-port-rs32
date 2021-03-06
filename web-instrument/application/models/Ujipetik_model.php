<?php

class Ujipetik_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
        date_default_timezone_set('Asia/Jakarta');

    }

    function show_analisa( $no_pack, $date, $display = false ){
        
        if ($display){
            
            $now = new DateTime();
            $twoPm = new DateTime();
            $twoPm->setTime(06,0);
            
            if ($now < $twoPm){
                $date = date_create($date);
                date_add($date, date_interval_create_from_date_string('-1 days'));
                $date =  date_format($date, 'Y-m-d');
                $date_saiki = date_create($date);
                date_add($date_saiki, date_interval_create_from_date_string('1 days'));
                $date_sesok =  date_format($date_saiki, 'Y-m-d');
            }else{
                $date_saiki = date_create($date);
                date_add($date_saiki, date_interval_create_from_date_string('1 days'));
                $date_sesok =  date_format($date_saiki, 'Y-m-d'); 
            }
        }else{
            $date_saiki = date_create($date);
            date_add($date_saiki, date_interval_create_from_date_string('1 days'));
            $date_sesok =  date_format($date_saiki, 'Y-m-d'); 
        }

        $this->db->select('uji_petik_gula.id,uji_petik_gula.tanggal,uji_petik_gula.nilai_uji,
                           uji_petik_gula.nilai_uji as hasil,
                           uji_petik_gula.is_data,create.namalengkap as createby, uji_petik_gula.wkt_input,
                           time(`uji_petik_gula`.`wkt_input`) AS jam,
                          case
                            when time(`uji_petik_gula`.`wkt_input`) > time("06:00:00") and time(`uji_petik_gula`.`wkt_input`) < time("14:00:00") then "1"
                            when time(`uji_petik_gula`.`wkt_input`) >= time("14:00:00") and time(`uji_petik_gula`.`wkt_input`) < time("22:00:00") then "2"
                            else "3"
                           end as shift,uji_petik_gula.timbangan
                           ');
        $this->db->from('uji_petik_gula');
        $this->db->join('users as create', 'create.id = uji_petik_gula.id_user', 'inner');
        $this->db->where('uji_petik_gula.id_parameter', "$no_pack");
        $this->db->where('uji_petik_gula.is_data', "1");
        $this->db->where('wkt_input >=', "$date 06:00:00");
        $this->db->where('wkt_input <=', "$date_sesok 05:59:59"); 
            
        $this->db->order_by('uji_petik_gula.id', 'DESC');
        
        $query = $this->db->get();
        
        return $query->result();
    }


    function simpan_analisa($paramArray = false){
        
        if ($this->input->post('status') == '2'){
          $status = 1;
          $this->update_status_analisa_sebelumnya();
        }else{
          $status = $this->input->post('status');
        }
        /*
        $now = new DateTime();
        //jam 6 pagi
        $SixAM = new DateTime();
        $SixAM->setTime(24,0);
        // jam 2 siang
        $twoPM = new DateTime();
        $twoPM->setTime(14,0);
        //jam 10 malam
        $tenPM = new DateTime();
        $tenPM->setTime(22,0);
        
        print_r($SixAM);
        
        if ($now < $SixAM){
            $date = date("Y-m-d");
            $date = date_create($date);
            date_add($date, date_interval_create_from_date_string('-1 days'));
            $date =  date_format($date, 'Y-m-d');
            $shift = 3;
        }else{
            
            if ($now >= $SixAM && $now < $twoPM){
                $shift = 1;
            }
            
            if ($now >= $twoPM && $now < $tenPM){
                $shift = 2;
            }
            
            if ($now >= $tenPM){
                $shift = 3;
            }
            
            
            
            $date = date("Y-m-d"); 
        }
        */
        $jam = date('H');
        
        if ($jam >= 0 && $jam < 6){
            
            $date = date("Y-m-d");
            $date = date_create($date);
            date_add($date, date_interval_create_from_date_string('-1 days'));
            $date =  date_format($date, 'Y-m-d');
            $shift = 3;
        }
        
        if ($jam >= 6 && $jam < 14){
            $date = date("Y-m-d"); 
            $shift = 1;
        }
        
        if ($jam >= 14 && $jam < 22){
            $date = date("Y-m-d"); 
            $shift = 2;
        }
        
        if ($jam >= 22 && $jam <= 23 ){
            $date = date("Y-m-d"); 
            $shift = 3;
        }
        
        $data = array(
          'tanggal' => $date,
          'nilai_uji' => $this->input->post('hasil'),
          'id_user' => $this->session->userdata('id_user'),
          'id_parameter' => $this->input->post('jenis'),
          'is_data' => 1,
          'shift' => $shift,
          'timbangan' => $this->input->post('timbangan')
        );
    
        $insert = $this->db->insert('uji_petik_gula', $data);
    
        if ( $insert ){ return $this->db->insert_id(); }else{ return false; }

    }


    function get_analisa_by_id($id){

		$this->db->select('*');
		$this->db->where('id', $id);

		$query = $this->db->get('uji_petik_gula',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
    
    function get_param_uji($no_pack){
        
        $this->db->select('*');
		$this->db->where('no_pack', $no_pack);

		$query = $this->db->get('uji_petik_parameter',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
    }
    
    function summary_uji_perik_per_shift($no_pack, $date, $display = false){
        
        if ($display){
            $now = new DateTime();
            $twoPm = new DateTime();
            $twoPm->setTime(06,0);
            
            if ($now < $twoPm){ // jaka kurang dari jam 6 pagi maka masih tanggal sebelumnya
                
                $date = date_create($date);
                date_add($date, date_interval_create_from_date_string('-1 days'));
                $date =  date_format($date, 'Y-m-d');
                $date_saiki = date_create($date);
                date_add($date_saiki, date_interval_create_from_date_string('1 days'));
                $date_sesok =  date_format($date_saiki, 'Y-m-d');
                
            }else{
                $date_saiki = date_create($date);
                date_add($date_saiki, date_interval_create_from_date_string('1 days'));
                $date_sesok =  date_format($date_saiki, 'Y-m-d'); 
            }
        }else{
            
            $date_saiki = date_create($date);
            date_add($date_saiki, date_interval_create_from_date_string('1 days'));
            $date_sesok =  date_format($date_saiki, 'Y-m-d'); 
        }

        
        $query = $this->db->query("SELECT petik.shift, petik.min, petik.max, ROUND(petik.avg,2) as avg, petik.sum,petik.under, petik.overmax,no_pack,conter
                                    FROM (
                                    	SELECT '1' AS shift, MIN(nilai_uji) AS MIN, MAX(nilai_uji) AS MAX,AVG(nilai_uji) AS AVG,SUM(nilai_uji) AS SUM,param.`no_pack`,
                                    	COUNT( IF(uji.`nilai_uji` < param.min,TRUE,NULL) ) AS under, COUNT( IF(uji.`nilai_uji` > param.max,TRUE,NULL) ) AS overmax,
                                        COUNT(uji.id) AS conter
                                    	FROM uji_petik_gula AS uji
                                    	INNER JOIN uji_petik_parameter AS param
                                    	ON param.`no_pack` = uji.id_parameter
                                    	WHERE uji.is_data = '1' AND wkt_input BETWEEN '$date 06:00:00' AND '$date 13:59:59'
                                        GROUP BY uji.id_parameter
                                    	UNION ALL
                                    	SELECT '2' AS shift, MIN(nilai_uji) AS MIN, MAX(nilai_uji) AS MAX,AVG(nilai_uji) AS AVG,SUM(nilai_uji) AS SUM,param.`no_pack`,
                                    	COUNT( IF(uji.`nilai_uji` < param.min,TRUE,NULL) ) AS under, COUNT( IF(uji.`nilai_uji` > param.max,TRUE,NULL) ) AS overmax,
                                        COUNT(uji.id) AS conter
                                    	FROM uji_petik_gula AS uji
                                    	INNER JOIN uji_petik_parameter AS param
                                    	ON param.`no_pack` = uji.id_parameter
                                    	WHERE uji.is_data = '1' AND  wkt_input BETWEEN '$date 14:00:00' AND '$date 21:59:59'
                                        GROUP BY uji.id_parameter
                                    	UNION ALL
                                    	SELECT '3' AS shift, MIN(nilai_uji) AS MIN, MAX(nilai_uji) AS MAX,AVG(nilai_uji) AS AVG,SUM(nilai_uji) AS SUM,param.`no_pack`,
                                    	COUNT( IF(uji.`nilai_uji` < param.min,TRUE,NULL) ) AS under, COUNT( IF(uji.`nilai_uji` > param.max,TRUE,NULL) ) AS overmax,
                                        COUNT(uji.id) AS conter
                                    	FROM uji_petik_gula AS uji
                                    	INNER JOIN uji_petik_parameter AS param
                                    	ON param.`no_pack` = uji.id_parameter
                                    	WHERE uji.is_data = '1' AND wkt_input BETWEEN '$date 22:00:00' AND '$date_sesok 05:59:59'
                                        GROUP BY uji.id_parameter
                                    ) AS petik
                                WHERE no_pack = '$no_pack' ");
                                               
        return $query->result();
        
        
    }
    
    function delete_analisa(){
        
        $jenis = $this->input->post('jenis');
        $id = $this->input->post('id');
        $reason = $this->input->post('reason');
        
        $this->db->set('is_data', '2');
        $this->db->set('id_user_delete', $this->session->userdata('id_user'));
        $this->db->set('reason_delete', $reason);
        
        $this->db->where('id', $id);
        
        $update = $this->db->update('uji_petik_gula');
        
        if ($update){
            return true;
        }else{
            return false;
        }
    }
    //report uji petik perpirode GMP_RIZKI
    function report_periode_ujipetik( $no_pack, $date, $last_date ){
    
        $moduleid = $this->input->post('module_id');
        
        $date_saiki = date_create($last_date); 
        date_add($date_saiki, date_interval_create_from_date_string('1 days'));
        $date_sesok =  date_format($date_saiki, 'Y-m-d'); 
    
        $this->db->select('uji_petik_gula.id,uji_petik_gula.tanggal,uji_petik_gula.nilai_uji,
                           uji_petik_gula.nilai_uji as hasil,
                           uji_petik_gula.is_data,create.namalengkap as createby, uji_petik_gula.wkt_input,uji_petik_gula.timbangan');
        $this->db->from('uji_petik_gula');
        $this->db->join('users as create', 'create.id = uji_petik_gula.id_user', 'inner');
        $this->db->where('uji_petik_gula.id_parameter', "$no_pack");
        $this->db->where('uji_petik_gula.is_data', "1");
        $this->db->where('wkt_input >=', "$date 06:00:00");
        $this->db->where('wkt_input <=', "$date_sesok 05:59:59");
        $this->db->order_by('uji_petik_gula.id', 'DESC');
    
        $query = $this->db->get();
    
        return $query->result();
    }
    
    function report_summary_ujipetik($jenis_timbang,$tanggal_awal,$tanggal_akhir,$jenis_laporan){
        
        if ($jenis_laporan == "daily"){
            $flag = "AND uji.tanggal = '$tanggal_awal'";
        }else{
            $flag = "AND uji.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
        }
        
        $shift = $this->session->userdata('shift');
        
        if($shift !="0"){
            //$this->db->where('shift', "$shift"); 
            $f_shift = "AND uji.shift = '$shift'";
        } 
        
        $query = $this->db->query("SELECT tanggal,timbangan, MIN(nilai_uji) AS MIN, MAX(nilai_uji) AS MAX,ROUND(AVG(nilai_uji),2) AS AVG,SUM(nilai_uji) AS SUM,param.`no_pack`,
                                    COUNT( IF(uji.`nilai_uji` < param.min,TRUE,NULL) ) AS under, COUNT( IF(uji.`nilai_uji` > param.max,TRUE,NULL) ) AS overmax,
                                    COUNT(uji.id) AS conter
                                    FROM uji_petik_gula AS uji
                                    INNER JOIN uji_petik_parameter AS param
                                    ON param.`no_pack` = uji.id_parameter
                                    WHERE uji.is_data = '1' 
                                    AND uji.`id_parameter` = '$jenis_timbang'
                                    $f_shift
                                    $flag
                                    GROUP BY tanggal,timbangan,uji.id_parameter");
        return $query->result();
    }
    
    function report_error_ujipetik($jenis_timbang,$tanggal_awal,$tanggal_akhir,$jenis_laporan){
        
        switch ($jenis_timbang){
            case '20kg':
                $desc = "Box 20 Kg";
            break;
            case '50kg':
                $desc = "Bag 50 kg";
            break;
            case '1kg':
                $desc = "Pack 1 kg";
            break;
            
        }
        
        if ($jenis_laporan == "daily"){
            $flag = "AND tanggal = '$tanggal_awal'";
        }else{
            $flag = "AND tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
        }
        
        $shift = $this->session->userdata('shift');
        
        if($shift !="0"){
            //$this->db->where('shift', "$shift"); 
            $f_shift = "and shift = '$shift'";
        } 
        
        $query = $this->db->query("SELECT tanggal,reason_delete,COUNT(id) AS jumlah,'$desc' AS product 
                                    FROM uji_petik_gula
                                    WHERE is_data = 2
                                    AND id_parameter = '$jenis_timbang'
                                    $flag
                                    $f_shift
                                    GROUP BY tanggal,reason_delete");
        return $query->result();
        
    }
    
    function report_daily_analisa( $no_pack, $date, $display = false ){
        
        if ($display){
            
            $now = new DateTime();
            $twoPm = new DateTime();
            $twoPm->setTime(06,0);
            
            if ($now < $twoPm){
                $date = date_create($date);
                date_add($date, date_interval_create_from_date_string('-1 days'));
                $date =  date_format($date, 'Y-m-d');
                $date_saiki = date_create($date);
                date_add($date_saiki, date_interval_create_from_date_string('1 days'));
                $date_sesok =  date_format($date_saiki, 'Y-m-d');
            }else{
                $date_saiki = date_create($date);
                date_add($date_saiki, date_interval_create_from_date_string('1 days'));
                $date_sesok =  date_format($date_saiki, 'Y-m-d'); 
            }
        }else{
            $date_saiki = date_create($date);
            date_add($date_saiki, date_interval_create_from_date_string('1 days'));
            $date_sesok =  date_format($date_saiki, 'Y-m-d'); 
        }
        
        $shift = $this->session->userdata('shift');

        $this->db->select('uji_petik_gula.id,uji_petik_gula.tanggal,uji_petik_gula.nilai_uji,
                           uji_petik_gula.nilai_uji as hasil,
                           uji_petik_gula.is_data,create.namalengkap as createby, uji_petik_gula.wkt_input,
                           time(`uji_petik_gula`.`wkt_input`) AS jam,
                          case
                            when time(`uji_petik_gula`.`wkt_input`) > time("06:00:00") and time(`uji_petik_gula`.`wkt_input`) < time("14:00:00") then "1"
                            when time(`uji_petik_gula`.`wkt_input`) >= time("14:00:00") and time(`uji_petik_gula`.`wkt_input`) < time("22:00:00") then "2"
                            else "3"
                           end as shift,uji_petik_gula.timbangan,uji_petik_gula.reason_delete
                           ');
        $this->db->from('uji_petik_gula');
        $this->db->join('users as create', 'create.id = uji_petik_gula.id_user', 'inner');
        $this->db->where('uji_petik_gula.id_parameter', "$no_pack");
        //$this->db->where('uji_petik_gula.is_data', "1");
        $this->db->where('wkt_input >=', "$date 06:00:00");
        $this->db->where('wkt_input <=', "$date_sesok 05:59:59"); 
        
        if($shift !="0"){
            $this->db->where('shift', "$shift"); 
        }  
            
        $this->db->order_by('uji_petik_gula.id', 'DESC');
        
        $query = $this->db->get();
        
        return $query->result();
    }

}
 ?>
