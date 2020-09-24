<?php

class Analisa_model extends CI_Model
{

	function __construct()
	{
		parent:: __construct();
        date_default_timezone_set('Asia/Jakarta');

	}
    
	function show_analisa($date = false){
	   
        

		$moduleid = $this->input->post('module_id');

		$this->db->select('hasil_analisa.id,hasil_analisa.nomor,hasil_analisa.tanggal,
							hasil_analisa.nilai_a,hasil_analisa.nilai_b,jam_analisa.desc as jam,
							hasil_analisa.no_strike,hasil_analisa.time_strike,hasil_analisa.pan_strike,
							hasil_analisa.boiling_time_strike,hasil_analisa.no_strike,parameter_analisa.nama_parameter,
							hasil_analisa.is_data,material_analisa.name as materialname,create.namalengkap as createby,
                            hasil_analisa.input as input,hasil_analisa.param');
		$this->db->from('hasil_analisa');
		$this->db->join('jam_analisa', 'jam_analisa.id = hasil_analisa.id_jam', 'left');
		$this->db->join('users as create', 'create.id = hasil_analisa.id_user', 'inner');
		$this->db->join('material_analisa', 'material_analisa.id = hasil_analisa.id_material', 'left');
		$this->db->join('parameter_analisa', 'parameter_analisa.id_parameter = hasil_analisa.id_parameter', 'left');
		$this->db->where('hasil_analisa.id_modul', $moduleid);
		$this->db->where('hasil_analisa.is_show', 1);
        
        if ($date){
            $this->db->where('hasil_analisa.tanggal', $date);
        }
        
		$this->db->order_by('hasil_analisa.nomor', 'DESC');

		$query = $this->db->get();

    	return $query->result();

	}

	function get_last_nomor()
    {
    	$tanggal = date("d-m-Y");
    	$bulan = sprintf("%02s", substr($tanggal, 3, 2));
    	$tahun = substr($tanggal, 6, 4);

    	$query = $this->db->query("select max(right(nomor,7)) as last, nomor from hasil_analisa
                                    where month(tanggal)='$bulan' and year(tanggal)='$tahun'");

    	$nomor = $query->row()->last;
    	return $nomor;
    }

	function get_nomor_formulir(){

        $tanggal = date("d-m-Y");

    	$bulan = sprintf("%02s", substr($tanggal, 3, 2));
    	$tahun = substr($tanggal, 8, 2);

    	$nomor = $this->get_last_nomor();

    	if (is_null($nomor)) {
        	$_nomor = 1;
    	} else {
        	$_nomor = $nomor + 1;
    	}

    	$sequence = sprintf("%07s", $_nomor);
    	$formatnomor = "ANL" . $tahun . $bulan . $sequence;

    	return $formatnomor;
	}

	function simpan_analisa($paramArray = false){ 
        
		$hasil = $this->input->post('hasil');
		$idjam = $this->input->post('jam_analisa');
		$material_analisa = $this->input->post('material_analisa');

		if ( $this->input->post('input') ){
			$input = implode("|",$this->input->post('input'))."|".$hasil;
		}else{
			$input = "";
		}

		if ($this->input->post('status') == '2'){
			$status = 1;
        	$this->update_status_analisa_sebelumnya($paramArray);
		}else{
			$status = $this->input->post('status');
		}
        
        $tanggal = $this->input->post('tanggal');
        
        $tgl = date('Y-m-d', strtotime($tanggal));
        //$tgl = date("Y-m-d");
        /*
        switch ($idjam){
            case '1':
            case '20':
            case '21':
            case '22':
            case '23':
            case '24':
            case '27':
                $tgl = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
            break;
            default;
                $tgl = date("Y-m-d");
            break;
            
        }
        */
        $bt = $this->input->post('bt');
        $bthasil = 0;
        if ($bt){

            $btjam = (int)substr($bt,0,2);
            $btmn = (int)substr($bt,3,2);
            $int = (int)$btmn;
            $btmenit = $int / 60;
            //$bthasil = (float)$btjam.".".$btmenit;
            
            $hasil = $btjam + $btmenit;
            $bthasil =  (float)$hasil;
        }
        
		if ($paramArray == true){ 
		  
            $nomorSementara = $this->input->post('nomor'); //jika ada update dari simpan sementara dari dirt/tss/fiber dan grain size
            
            if ($nomorSementara !=""){
                
                $nomorformulir = $nomorSementara;
                $this->delete_sementara($nomorformulir);
                $tgl = $this->input->post('tglanalisa');
                $status = 1;
            }else{
               $nomorformulir = $this->get_nomor_formulir(); 
            }
            
            $data = array();
            $param = implode("|",$this->input->post('parameter'));
            
			foreach ( $this->input->post('parameter') as $val ) {
			 
				$is_show = 0;
				switch ($val) {
					case 'P053': case 'P061': case 'P001': case 'P048': $hasil = $this->input->post('input')[0]; break;
					case 'P054': case 'P062': case 'P049': case 'P028': $hasil = $this->input->post('input')[1]; break;
                    case 'P002': $hasil = $this->input->post('input')[1]; $is_show=1; break;
                    case 'P063': case 'P102': $hasil = $this->input->post('input')[2]; break;
					case 'P064': case 'P103': $hasil = $this->input->post('input')[3]; break;
					case 'P065': case 'P050': $hasil = $this->input->post('input')[4]; break;
					case 'P066': $hasil = $this->input->post('input')[5]; break;
					case 'P067': $hasil = $this->input->post('input')[6]; break;
					case 'P068': $hasil = $this->input->post('input')[13]; break;
					case 'P069': $hasil = $this->input->post('input')[14]; break;
					case 'P070': $hasil = $this->input->post('input')[15]; break;
					case 'P071': $hasil = $this->input->post('input')[16]; break;
					case 'P072': $hasil = $this->input->post('input')[17]; break;
					case 'P073': $hasil = $this->input->post('input')[18]; break;
					case 'P018': $hasil = $this->input->post('input')[19]; $is_show=1; break;
					case 'P019': $hasil = $this->input->post('input')[20]; break;
					case 'P074': $hasil = $this->input->post('input')[21]; break;
					case 'P020': $hasil = $this->input->post('input')[22]; break;
                    case 'P003': $hasil = $this->input->post('input')[0]; $is_show=1; break;
                    case 'P051': $hasil = $this->input->post('input')[0]; break;
                    case 'P052': $hasil = $this->input->post('input')[1]; break;
                    case 'P022': $hasil = $this->input->post('hasil') * 1000; $is_show=1; break; //untuk ash sugar di kali 1000 karena terlalu kecil waktu verifikasi dan repot jgn lupa di bagi 1000
                    //case 'P004': case 'P043':  $this->input->post('hasil'); break;
					default: $hasil = $this->input->post('hasil'); $is_show=1; break;
<<<<<<< .mine
				} //end switch 
||||||| .r36
				} //end switch

=======
				} //end switch
                
                $material = $this->input->post('material_analisa');
                $flag = $this->input->post('flag');
                
                //if ( ( $material == '5' or $material == '7') and ( $val == 'P001' or $val == 'P002') ){
                if ( ( $flag == 'pol' or $flag == 'brix') and ( $val == 'P001' or $val == 'P002') ){
                    
                    if ($flag=='brix'){ //pokoknya gitu
                        
                        if ($val == 'P001'){
                            $is_show = 1;
                            array_push($data,
                                array(
                                        'nomor' => $nomorformulir,
                                        'tanggal' => $tgl,
                                        'id_jam' => $idjam,
                                        'nilai_a' => $hasil,
                					    'hasil' => $hasil,
                                        'id_user' => $this->session->userdata('id_user'),
                                        'id_parameter' => $val,
                                        'id_modul' => $this->input->post('id_modul'),
                                        'id_material' => $material,
                                        'is_data' => $status,
                                        'no_strike' => $this->input->post('strike'),
                                        'input' => $input,
                                        'is_show' => $is_show,
                                        'param' => $param, //tambah array param
                                        'time_strike' => $tgl." ".$this->input->post('timestrike'),
                                        'boiling_time_strike' => $bthasil,
                                        'pan_strike' => $this->input->post('pan'),
                                        'vol_strike' => $this->input->post('vol')
                				)
                            );
                        }
                        
                    }
                    
                    if ($flag=='pol'){
                        
                        if ($val == 'P002'){
                            $is_show = 1;
                            array_push($data,
                                array(
                                        'nomor' => $nomorformulir,
                                        'tanggal' => $tgl,
                                        'id_jam' => $idjam,
                                        'nilai_a' => $hasil,
                					    'hasil' => $hasil,
                                        'id_user' => $this->session->userdata('id_user'),
                                        'id_parameter' => $val,
                                        'id_modul' => $this->input->post('id_modul'),
                                        'id_material' => $material,
                                        'is_data' => $status,
                                        'no_strike' => $this->input->post('strike'),
                                        'input' => $input,
                                        'is_show' => $is_show,
                                        'param' => $param, //tambah array param
                                        'time_strike' => $tgl." ".$this->input->post('timestrike'),
                                        'boiling_time_strike' => $bthasil,
                                        'pan_strike' => $this->input->post('pan'),
                                        'vol_strike' => $this->input->post('vol')
                				)
                            );
                        }
                        
                    }
                    
                    
                }else{
                    
                    array_push($data,
                        array(
                                'nomor' => $nomorformulir,
                                'tanggal' => $tgl,
                                'id_jam' => $idjam,
                                'nilai_a' => $hasil,
        					    'hasil' => $hasil,
                                'id_user' => $this->session->userdata('id_user'),
                                'id_parameter' => $val,
                                'id_modul' => $this->input->post('id_modul'),
                                'id_material' => $material,
                                'is_data' => $status,
                                'no_strike' => $this->input->post('strike'),
                                'input' => $input,
                                'is_show' => $is_show,
                                'param' => $param,//tambah array param
                                'time_strike' => $tgl." ".$this->input->post('timestrike'),
                                'boiling_time_strike' => $bthasil,
                                'pan_strike' => $this->input->post('pan'),
                                'vol_strike' => $this->input->post('vol')
        				)
                    );
                    
                }

>>>>>>> .r63
<<<<<<< .mine
				array_push($data,
                    array(
                            'nomor' => $nomorformulir,
                            'tanggal' => date("Y-m-d"),
                            'id_jam' => $this->input->post('jam_analisa'),
                            'nilai_a' => $hasil,
    					    'hasil' => $hasil,
                            'id_user' => $this->session->userdata('id_user'),
                            'id_parameter' => $val,
                            'id_modul' => $this->input->post('id_modul'),
                            'id_material' => $this->input->post('material_analisa'),
                            'is_data' => $status,
                            'no_strike' => $this->input->post('strike'),
                            'input' => $input,
                            'is_show' => $is_show,
                            'param' => $param //tambah array param
    				)
                );  
||||||| .r36
				array_push($data,
                    array(
                            'nomor' => $nomorformulir,
                            'tanggal' => date("Y-m-d"),
                            'id_jam' => $this->input->post('jam_analisa'),
                            'nilai_a' => $hasil,
    					    'hasil' => $hasil,
                            'id_user' => $this->session->userdata('id_user'),
                            'id_parameter' => $val,
                            'id_modul' => $this->input->post('id_modul'),
                            'id_material' => $this->input->post('material_analisa'),
                            'is_data' => $status,
                            'no_strike' => $this->input->post('strike'),
                            'input' => $input,
                            'is_show' => $is_show,
                            'param' => $param //tambah array param
    				)
                );


=======
>>>>>>> .r63
			} //end foreach 
            $insert = $this->db->insert_batch('hasil_analisa', $data);

		}else{

			$data = array(
                    'nomor' => $this->get_nomor_formulir(),
                    'tanggal' => $tgl,
                    'id_jam' => $this->input->post('jam_analisa'),
                    'nilai_a' => $this->input->post('hasil'),
                    'hasil' => $this->input->post('hasil'),
                    'id_user' => $this->session->userdata('id_user'),
                    'id_parameter' => $this->input->post('parameter'),
                    'id_modul' => $this->input->post('id_modul'),
                    'id_material' => $this->input->post('material_analisa'),
                    'is_data' => $status,
                    'no_strike' => $this->input->post('strike'),
                    'input' => $input,
                    'is_show' => 1
			);

			$insert = $this->db->insert('hasil_analisa', $data);
		} // end else

        if ( $insert ){ return true; }else{ return false; }

    }
    
    function update_analisa($nomor, $tanggal, $jam) {
        $tgl = date('Y-m-d', strtotime($tanggal));

        $this->db->set('tanggal', $tgl);
        $this->db->set('id_jam', $jam);
        $this->db->where('nomor', $nomor);
        $update = $this->db->update('hasil_analisa');

        if ( $update ){ return true; }else{ return false; }
    }

	function get_analisa_by_id($id){

		$this->db->select('*');
		$this->db->where('id', $id);

		$query = $this->db->get('hasil_analisa',1);

		if ( $query->num_rows() == 1 )
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function update_status_analisa_sebelumnya($paramArray){
	   
        $tanggal = $this->input->post('tanggal');
        
        $tgl = date('Y-m-d', strtotime($tanggal));
	   
        if ($paramArray){
            
            $param = $this->input->post('parameter');
            $material = $this->input->post('material_analisa');
            
            $this->db->select('*');
            
            $this->db->where('id_jam', $this->input->post('jam_analisa') );
    		$this->db->where('id_parameter',  $param[0]);
    		$this->db->where('id_modul', $this->input->post('id_modul') );
    		$this->db->where('id_material', $material );
    		$this->db->where('tanggal', $tgl);
    		$this->db->where('is_data', '1');

            $query = $this->db->get('hasil_analisa',1);
            
            $hasil = $query->row_array();
            
            $this->db->set('is_data', 2);
            $this->db->where('nomor', $hasil['nomor']);
            $this->db->update('hasil_analisa');
                 
        }else{
            

    		$this->db->set('is_data', 2);
    
    		$this->db->where('id_jam', $this->input->post('jam_analisa') );
    		$this->db->where('id_parameter', $this->input->post('parameter') );
    		$this->db->where('id_modul', $this->input->post('id_modul') );
    		$this->db->where('id_material', $this->input->post('material_analisa'));
    		$this->db->where('tanggal', $tgl);
    		$this->db->where('is_data', '1');
    
    		$this->db->update('hasil_analisa');
            
        }
      
	}

	function get_analisa_by_parameter_and_item($param = ''){
    
    	$jam = $this->input->post('jam_analisa');
    	$material = $this->input->post('material_analisa');
    	$tanggal = date("Y-m-d");
    
    	$this->db->select('*');
    	$this->db->where('id_parameter', $param);
    	$this->db->where('id_jam', $jam );
    	$this->db->where('id_material', $material);
    	$this->db->where('tanggal', $tanggal);
    	$this->db->where('is_data', '1');
    
    	$query = $this->db->get('hasil_analisa',1);
    
    	if ( $query->num_rows() == 1 )
    	{
    		return $query->row_array();
    	}
    	else
    	{
    		return false;
    	}
	}
    
    function show_analisa_verifikasi($param,$tanggal = false){
        
        $this->db->select('verifikasi.*,usr.namalengkap as createby');
        $this->db->join('users as usr', 'usr.id = verifikasi.id_user', 'inner');
        //$this->db->where('id_user',$this->session->userdata('id_user') );
        $this->db->where('param',$param);
        
        if ($tanggal){
            $this->db->where('tanggal', $tanggal);
        }
        
        $this->db->order_by('verifikasi.nomor', 'DESC');        
    
    	$query = $this->db->get('verifikasi');
        
        return $query->result();
    }
    
    function chek_verifikasi_detil_tmp($tgl,$jam,$param){
        
        $this->db->select('*');
    	$this->db->where('tanggal', $tgl);
    	$this->db->where('id_jam', $jam);
        $this->db->where('param', $param);
        $this->db->where('id_user', $this->session->userdata('id_user') );
        
        $query = $this->db->get('verifikasi_detil_tmp');
        return $query->result();
    }
    
    function get_process_verifikasi_analisa_tmp($tgl,$jam,$jam2,$param){
 
        $chek = $this->chek_verifikasi_detil_tmp($tgl,$jam,$param);
        
        switch($param){
            
            case 'mill': 
                $process = $this->db->query("select material.id_material,coalesce(analisa.id_parameter,'-') as parameter,coalesce(avg(analisa.hasil),0) as hasil
                                            from (
                                            	select * from material_analisa
                                            	where (material_analisa.`urut_mill` is not null 
                                            	or material_analisa.`urut_mill` != '') order by urut_mill asc 
                                            ) as material
                                            left join (	
                                            	select 
                                            	  material.id_material,material.name,analisa.`hasil`,jam.`id` as id_jam,jam.`desc`,analisa.`tanggal`,parameter.`id_parameter`,parameter.`nama_parameter`
                                            	from
                                            	  (select * from material_analisa 
                                            	    where material_analisa.`urut_mill` is not null 
                                            	    or material_analisa.`urut_mill` != ''
                                            	   ) as material
                                            	inner join hasil_analisa as analisa
                                            	   on analisa.`id_material` = material.id and analisa.`is_data` = 1
                                            	inner join jam_analisa as jam
                                            	   on jam.`id` = analisa.`id_jam`
                                            	inner join parameter_analisa as parameter
                                            	   on parameter.`id_parameter` = analisa.`id_parameter` and parameter.`is_mill` = 1
                                            	where jam.`desc` = '$jam' and analisa.`tanggal` = '$tgl'
                                            	union all
                                            	select 
                                            	  material.id_material,material.name,analisa.`hasil`,jam.`id` as id_jam,jam.`desc`,analisa.`tanggal`,parameter.`id_parameter`,parameter.`nama_parameter`
                                            	from
                                            	  (select * from material_analisa 
                                            	    where material_analisa.`urut_mill` is not null 
                                            	    or material_analisa.`urut_mill` != ''
                                            	   ) as material
                                            	inner join hasil_analisa as analisa
                                            	   on analisa.`id_material` = material.id and analisa.`is_data` = 1
                                            	inner join jam_analisa as jam
                                            	   on jam.`id` = analisa.`id_jam`
                                            	inner join parameter_analisa as parameter
                                            	   on parameter.`id_parameter` = analisa.`id_parameter`
                                            	where jam.`desc` = '$jam2' and analisa.`tanggal` = '$tgl'
                                            	and material.id_material in ('M001','M002','M005')
                                               ) as analisa
                                             on analisa.id_material = material.id_material
                                             group by material.id_material,analisa.id_parameter
                                             order by material.urut_mill asc");  
            break;
            case 'boiling':
                $process = $this->db->query("select material.id_material,coalesce(analisa.id_parameter,'-') as parameter,coalesce(avg(analisa.hasil),0) as hasil
                                            from (
                                            	select * from material_analisa
                                            	where (material_analisa.`urut_boiling` is not null  
                                            	or material_analisa.`urut_boiling` != '') order by urut_boiling asc 
                                            ) as material
                                            left join (	
                                            	select 
                                            	  material.id_material,material.name,analisa.`hasil`,jam.`id` as id_jam,jam.`desc`,analisa.`tanggal`,parameter.`id_parameter`,parameter.`nama_parameter`
                                            	from
                                            	  (select * from material_analisa 
                                            	    where material_analisa.`urut_boiling` is not null 
                                            	    or material_analisa.`urut_boiling` != ''
                                            	   ) as material
                                            	inner join hasil_analisa as analisa
                                            	   on analisa.`id_material` = material.id and analisa.`is_data` = 1
                                            	inner join jam_analisa as jam
                                            	   on jam.`id` = analisa.`id_jam`
                                            	inner join parameter_analisa as parameter
                                            	   on parameter.`id_parameter` = analisa.`id_parameter` and parameter.`is_boiling` = 1
                                            	where jam.`desc` = '$jam' and analisa.`tanggal` = '$tgl'
                                               ) as analisa
                                             on analisa.id_material = material.id_material
                                             group by material.id_material,analisa.id_parameter
                                             order by material.urut_boiling asc"); 
            break;
            case 'boiler':
                $process = $this->db->query("select material_analisa.id_material,material_analisa.name, 
                                                coalesce(hasil_analisa.id_parameter,'-') as parameter,
                                                coalesce(avg(hasil_analisa.hasil),0) as hasil 
                                            from  hasil_analisa 
                                            inner join `parameter_analisa` 
                                                on (`hasil_analisa`.`id_parameter` = `parameter_analisa`.`id_parameter` and `parameter_analisa`.`is_boiler` =1) 
                                            inner join jam_analisa 
                                                on (jam_analisa.`id` = hasil_analisa.`id_jam` and jam_analisa.`desc` = '$jam' and hasil_analisa.`tanggal` = '$tgl') 
                                            right join material_analisa 
                                                on (`material_analisa`.`id`=`hasil_analisa`.`id_material`) 
                                            where material_analisa.`urut_boiler` is not null 
                                            group by material_analisa.id_material,hasil_analisa.id_parameter 
                                            order by material_analisa.urut_boiler asc");  
            break;
            case 'water':
                $process = $this->db->query("select material_analisa.id_material,
                                                coalesce(hasil_analisa.id_parameter,'-') as parameter,
                                                coalesce(avg(hasil_analisa.hasil),0) as hasil 
                                             from hasil_analisa 
                                             inner join `parameter_analisa` 
                                                on (`hasil_analisa`.`id_parameter` = `parameter_analisa`.`id_parameter` and `parameter_analisa`.`is_water` =1) 
                                             inner join jam_analisa 
                                                on (jam_analisa.`id` = hasil_analisa.`id_jam` and jam_analisa.`desc` = '$jam' and hasil_analisa.`tanggal` = '$tgl') 
                                             right join material_analisa 
                                                on (`material_analisa`.`id`=`hasil_analisa`.`id_material`) 
                                             where material_analisa.`urut_water` is not null 
                                             group by material_analisa.id_material,hasil_analisa.id_parameter 
                                             order by material_analisa.urut_water asc"); 
                break;
            case 'machine':
                $process = $this->db->query("select material_analisa.id_material,material_analisa.name, 
                                                coalesce(hasil_analisa.id_parameter,'-') as parameter ,
                                                coalesce(avg(hasil_analisa.hasil),0) as hasil 
                                            from hasil_analisa 
                                            inner join `parameter_analisa` 
                                                on (`hasil_analisa`.`id_parameter` = `parameter_analisa`.`id_parameter` and `parameter_analisa`.`is_machine` =1) 
                                            inner join jam_analisa 
                                                on (jam_analisa.`id` = hasil_analisa.`id_jam` and jam_analisa.`desc` = '$jam' and hasil_analisa.`tanggal` = '$tgl') 
                                            right join material_analisa 
                                                on (`material_analisa`.`id`=`hasil_analisa`.`id_material`) 
                                            where material_analisa.`urut_machine` is not null 
                                            group by material_analisa.id_material,hasil_analisa.id_parameter 
                                            order by material_analisa.urut_machine asc");  
                break;
            case 'evap':
                    $process = $this->db->query("select material_analisa.id_material,
                                                    COALESCE(hasil_analisa.id_parameter,'-') AS parameter ,
                                                    COALESCE(AVG(hasil_analisa.hasil),0) AS hasil 
                                                    FROM 
                                                    hasil_analisa 
                                                    INNER JOIN `parameter_analisa` 
                                                    ON (`hasil_analisa`.`id_parameter` = `parameter_analisa`.`id_parameter` 
                                                    AND `parameter_analisa`.`is_evap` =1) 
                                                    INNER JOIN jam_analisa 
                                                    ON (jam_analisa.`id` = hasil_analisa.`id_jam` 
                                                    AND jam_analisa.`desc` = '$jam' AND hasil_analisa.`tanggal` = '$tgl') 
                                                    RIGHT JOIN material_analisa 
                                                    ON (`material_analisa`.`id`=`hasil_analisa`.`id_material`) 
                                                    WHERE material_analisa.`urut_evap` IS NOT NULL 
                                                    GROUP BY material_analisa.id_material,hasil_analisa.id_parameter 
                                                    ORDER BY material_analisa.urut_evap ASC");  
                break;
                 
                case 'batch':
                $process = $this->db->query("SELECT 
                                                t.id ,
                                                t.id_material ,
                                                t.name ,
                                                t.no_strike ,
                                                DATE_FORMAT(t.time_strike,'%H:%i') AS time_strike ,
                                                t.pan_strike ,
                                                t.boiling_time_strike ,
                                                t.vol_strike ,
                                                CASE WHEN MAX(t.brix) = 0 THEN MIN(t.brix) ELSE MAX(t.brix) END AS brix ,
                                                CASE WHEN MAX(t.pol) = 0 THEN MIN(t.pol) ELSE MAX(t.pol) END AS pol 
                                                FROM ( 
                                                SELECT 
                                                    material_analisa.id ,
                                                    material_analisa.id_material ,
                                                    material_analisa.name,
                                                    CASE WHEN hasil_analisa.id_parameter='P001' THEN hasil ELSE 0 END AS brix ,
                                                    CASE WHEN hasil_analisa.id_parameter='P002' THEN hasil ELSE 0 END AS pol ,
                                                    COALESCE(AVG(hasil_analisa.no_strike),0) AS no_strike ,
                                                    hasil_analisa.time_strike AS time_strike,
                                                    COALESCE(AVG(hasil_analisa.pan_strike),0) AS pan_strike ,
                                                    COALESCE(AVG(hasil_analisa.boiling_time_strike),0) AS boiling_time_strike ,
                                                    COALESCE(AVG(hasil_analisa.vol_strike),0) AS vol_strike 
                                                    FROM hasil_analisa 
                                                    INNER JOIN parameter_analisa 
                                                    ON (hasil_analisa.id_parameter = parameter_analisa.id_parameter 
                                                    AND parameter_analisa.is_batch =1)
                                                    INNER JOIN jam_analisa 
                                                    ON (jam_analisa.id = hasil_analisa.id_jam 
                                                    AND jam_analisa.desc = '$jam' 
                                                    AND hasil_analisa.tanggal = '$tgl') 
                                                    RIGHT JOIN material_analisa 
                                                    ON (material_analisa.id=hasil_analisa.id_material) 
                                                    WHERE material_analisa.urut_batch IS NOT NULL 
                                                    GROUP BY material_analisa.id_material,hasil_analisa.id_parameter 
                                                    ORDER BY material_analisa.urut_batch ASC) AS t GROUP BY t.id_material");
                        
                        $hasil =  $process->result();  
                        $parameter=array("P001","P002","P079","P080","P081","P082","P083");
                        $data = array();
                        for($i=0;$i<count($hasil);$i++) {
                            $n=0;
                             foreach($parameter as $val ){
                                switch ($n) {
                                        case 0:
                                        $nilai=$hasil[$i]->brix;
                                        break;
                                        case 1:
                                        $nilai=$hasil[$i]->pol;
                                        break;
                                        case 2:
                                        $nilai=$hasil[$i]->time_strike;
                                        break;
                                        case 3:
                                        $nilai=$hasil[$i]->no_strike;
                                        break;
                                        case 4:
                                        $nilai=$hasil[$i]->pan_strike;
                                        break;
                                        case 5:
                                        $nilai=$hasil[$i]->boiling_time_strike;
                                        break;
                                        case 6:
                                        $nilai=$hasil[$i]->vol_strike;
                                        break; 
                                        default:
                                        # code...
                                        break;
                                }
                               // echo $param;
                                array_push($data,
                                    array(
                                        'id' => $hasil[$i]->id_material."".$val ."".date("Ymdhis")."".$this->session->userdata('id_user').$i,
                                        'id_material' => $hasil[$i]->id_material,
                                        'id_parameter' => $val,
                                        'id_jam' => $jam,
                                        'id_user' => $this->session->userdata('id_user'),
                                        'tanggal' => $tgl,
                                        'hasil_awal' => $nilai,
                                        'hasil' => $nilai,
                                        'param' => $param
                                      )
                                );
                                $n++;
                            }
                        }

                        $this->db->insert_batch('verifikasi_detil_tmp', $data);
                        $result = $this->select_from_temp($tgl,$jam,$param);
        
                        return $result;      
                break;
                case 'sugar': 
                $chek = $this->chek_verifikasi_detil_tmp_per_date($tgl,$param);
                if(!$chek) {
                    $process = $this->db->query("SELECT material_analisa.id_material, 
                                                    id_parameter, id_jam, tanggal, 
                                                    COALESCE(no_strike,0) AS no_strike, hasil
                                                    FROM hasil_analisa
                                                    JOIN material_analisa ON material_analisa.id = hasil_analisa.id_material
                                                    WHERE hasil_analisa.`tanggal` = '$tgl'
                                                    AND hasil_analisa.`id_material` = '39'
                                                    AND hasil_analisa.id_jam = '$jam'
                                                    AND hasil_analisa.`id_parameter` IN ('P013','P014','P008','P002','P018','P019','P020',
                                                    'P021','P022','P084','P085','P086','P080')");
                   
                    $hasil =  $process->result();                          
                    $data = array();  
                    for($i=0;$i<count($hasil);$i++) {
                               switch ($hasil[$i]->id_parameter) {
                                   case 'P080':
                                    array_push($data,
                                    array(
                                        'id' => $hasil[$i]->id_material."".$hasil[$i]->id_parameter."".date("Ymdhis")."".$this->session->userdata('id_user').$i,
                                        'id_material' => $hasil[$i]->id_material,
                                        'id_parameter' => $hasil[$i]->id_parameter,
                                        'id_jam' => $hasil[$i]->id_jam,
                                        'no_strike' => $hasil[$i]->no_strike,
                                        'id_user' => $this->session->userdata('id_user'),
                                        'tanggal' => $tgl,
                                        'hasil_awal' => $hasil[$i]->hasil,
                                        'hasil' => $hasil[$i]->hasil,
                                        'param' => $param
                                      )
                                );
                                       break; 
                                   default:
                                   array_push($data,
                                   array(
                                   'id' => $hasil[$i]->id_material."".$hasil[$i]->id_parameter."".date("Ymdhis")."".$this->session->userdata('id_user').$i,
                                   'id_material' => $hasil[$i]->id_material,
                                   'id_parameter' => $hasil[$i]->id_parameter,
                                   'id_jam' => $hasil[$i]->id_jam,
                                   'no_strike' => $hasil[$i]->no_strike,
                                   'id_user' => $this->session->userdata('id_user'),
                                   'tanggal' => $tgl,
                                   'hasil_awal' => $hasil[$i]->hasil,
                                   'hasil' => $hasil[$i]->hasil,
                                   'param' => $param
                                      )
                                );
                                       break;
                               } 
                        }
                          if(count($data)>0){ 
                        $this->db->insert_batch('verifikasi_detil_tmp', $data);
                        }
                    }
                          $result = $this->select_from_temp_sugar($tgl,$param); 
                        return $result;                      
                break;
                case 'mollasses': 

                    $chek = $this->chek_verifikasi_detil_tmp_per_date($tgl,$param); 
                    
                    if(!$chek) {
                        $process = $this->db->query("SELECT material_analisa.id_material, id_parameter, id_jam, tanggal,
                                                        CASE WHEN MAX(hasil) = 0 THEN MIN(hasil) ELSE MAX(hasil) END AS hasil
                                                        FROM hasil_analisa
                                                        INNER JOIN material_analisa ON material_analisa.id = hasil_analisa.id_material
                                                        WHERE hasil_analisa.id_material IN ('140','141','142','143','176','145') 
                                                        AND tanggal='$tgl'
                                                        AND hasil_analisa.id_parameter = 'P027'
                                                        GROUP BY hasil_analisa.id_material, hasil_analisa.id_jam
                                                        ORDER BY id_jam");
                        // $process = $this->db->query("SELECT   
                        //                                 t.id_material AS id_material,
                        //                                 t.parameter AS id_parameter,
                        //                                 t.id_jam AS id_jam,
                        //                                 t.tanggal AS tanggal,
                        //                                 CASE WHEN MAX(t.hasil) = 0 THEN MIN(t.hasil) ELSE MAX(t.hasil) END AS hasil
                        //                                 FROM (
                        //                                     SELECT material_analisa.id_material AS id_material,
                        //                                     COALESCE(parameter_analisa.id_parameter,'-') AS parameter,
                        //                                     jam_analisa.desc AS id_jam,
                        //                                     hasil_analisa.tanggal AS tanggal,
                        //                                     CASE WHEN material_analisa.id = hasil_analisa.id_material 
                        //                                     AND parameter_analisa.id_parameter = 'P027' THEN COALESCE(AVG(hasil_analisa.hasil),0) 
                        //                                     ELSE 0 END AS 
                        //                                     hasil 
                        //                                     FROM 
                        //                                     (((material_analisa LEFT JOIN 
                        //                                     hasil_analisa 
                        //                                     ON(material_analisa.id IN ('140','141','142','143','176','145'))) 
                        //                                     LEFT JOIN parameter_analisa 
                        //                                     ON(parameter_analisa.id_parameter = hasil_analisa.id_parameter)) 
                        //                                     LEFT JOIN jam_analisa ON(jam_analisa.id = hasil_analisa.id_jam)) 
                        //                                     WHERE hasil_analisa.id_material IN ('140','141','142','143','176','145') AND tanggal='$tgl'
                        //                                     AND parameter_analisa.id_parameter = 'P027' 
                        //                                     GROUP BY material_analisa.id,hasil_analisa.id_material 
                        //                                     ORDER BY material_analisa.id) t 
                        //                                 GROUP BY t.id_material,t.id_jam 
                        //                                 ORDER BY t.id_jam,t.id_material");
                        $hasil =  $process->result();          
                        $data = array(); 

                        for($i=0;$i<count($hasil);$i++) { 
                            array_push($data,
                                array(
                                'id' => $hasil[$i]->id_material."".$hasil[$i]->id_parameter."".date("Ymdhis")."".$this->session->userdata('id_user').$i,
                                'id_material' => $hasil[$i]->id_material,
                                'id_parameter' => $hasil[$i]->id_parameter,
                                'id_jam' => $hasil[$i]->id_jam,
                                'id_user' => $this->session->userdata('id_user'),
                                'tanggal' => $tgl,
                                'hasil_awal' => $hasil[$i]->hasil,
                                'hasil' => $hasil[$i]->hasil,
                                'param' => $param
                                )
                            ); 
                        }

                        if(count($data)>0) { 
                            $this->db->insert_batch('verifikasi_detil_tmp', $data);
                        }
                    }
                    
                    $result = $this->select_from_temp_sugar($tgl,$param); 
                    return $result;                      
                break;

                            case 'floculant':
                                $process = $this->db->query("   SELECT 
                                                                material_analisa.id_material,
                                                                COALESCE(hasil_analisa.id_parameter,'-') AS parameter ,
                                                                COALESCE(AVG(hasil_analisa.hasil),0) AS hasil 
                                                                FROM 
                                                                hasil_analisa 
                                                                INNER JOIN `parameter_analisa` 
                                                                ON (`hasil_analisa`.`id_parameter` = `parameter_analisa`.`id_parameter` 
                                                                AND `parameter_analisa`.`is_floculant` =1) 
                                                                INNER JOIN jam_analisa 
                                                                ON (jam_analisa.`id` = hasil_analisa.`id_jam` 
                                                                AND jam_analisa.`desc` = '$jam' AND hasil_analisa.`tanggal` = '$tgl') 
                                                                RIGHT JOIN material_analisa 
                                                                ON (`material_analisa`.`id`=`hasil_analisa`.`id_material`) 
                                                                WHERE material_analisa.`urut_floculant` IS NOT NULL 
                                                                GROUP BY material_analisa.id_material,hasil_analisa.id_parameter 
                                                                ORDER BY material_analisa.urut_floculant ASC");
                                                        
                            break; 
                }
            
        $hasil =  $process->result(); 
        $data = array();
        
        $this->db->where('id_jam', $jam);
        $this->db->where('tanggal', $tgl);
        $this->db->where('param', $param);
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $batal = $this->db->delete('verifikasi_detil_tmp');
        
        $n = 1;
            
        foreach( $hasil as $val ){
            
            $hasil = $val->hasil;
            $hasil_awal = $val->hasil;
            
            if ($chek){ //jika temp sudah di buat maka hasil berasal dari yang sudah di buat
                
                foreach ($chek as $valChek){
                    if ( $valChek->id_material == $val->id_material && $valChek->id_parameter == $val->parameter ){
                       $hasil = $valChek->hasil;
                       $hasil_awal = $valChek->hasil_awal;
                    }
                } 
            }
            
            array_push($data,
        		array(
                    'id' => $val->id_material."".$val->parameter."".date("Ymdhis")."".$this->session->userdata('id_user').$n,
                    'id_material' => $val->id_material,
                    'id_parameter' => $val->parameter,
                    'id_jam' => $jam,
                    'id_user' => $this->session->userdata('id_user'),
                    'tanggal' => $tgl,
                    'hasil_awal' => $hasil_awal,
                    'hasil' => $hasil,
                    'param' => $param
                  )
            );
            
            $n++;
        }
            

        $this->db->insert_batch('verifikasi_detil_tmp', $data);
        
        
        $result = $this->select_from_temp($tgl,$jam,$param);
        
        return $result;
    }
    
    private function select_from_temp($tgl,$jam,$param){
        
         // select from temporary
        $this->db->select('verifikasi_detil_tmp.*,material_analisa.name');
        $this->db->from('verifikasi_detil_tmp');
        $this->db->join('material_analisa', 'material_analisa.id_material = verifikasi_detil_tmp.id_material', 'inner');
    	$this->db->where('tanggal', $tgl);
    	$this->db->where('id_jam', $jam);
        $this->db->where('param', $param);
        $this->db->where('id_user', $this->session->userdata('id_user') );
        
        switch ($param){
            case 'mill':
                $this->db->order_by('material_analisa.urut_mill', 'asc');
            break;
            case 'boiling':
                $this->db->order_by('material_analisa.urut_boiling', 'asc');
            break;
        }
    
    	$query = $this->db->get();
        
        return $query->result();
    }

    private function select_from_temp_sugar($tgl,$param){
        
         // select from temporary
        $this->db->select('verifikasi_detil_tmp.*,material_analisa.name');
        $this->db->from('verifikasi_detil_tmp');
        $this->db->join('material_analisa', 'material_analisa.id_material = verifikasi_detil_tmp.id_material', 'inner');
        $this->db->where('tanggal', $tgl); 
        $this->db->where('param', $param);
        $this->db->where('id_user', $this->session->userdata('id_user') );
        
        switch ($param){
            case 'mill':
                $this->db->order_by('material_analisa.urut_mill', 'asc');
            break;
            case 'boiling':
                $this->db->order_by('material_analisa.urut_boiling', 'asc');
            break;
        }
    
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function get_material($param){
        
        switch($param){
            case 'mill':
                $urut = "urut_mill";
            break;
            case 'boiling':
                $urut = "urut_boiling";
            break;
            case 'boiler':
                $urut = "urut_boiler";
            break;
            case 'water':
                $urut = "urut_water";
            break;
            case 'evap':
                $urut = "urut_evap";
            break;
            case 'batch':
                $urut = "urut_batch";
            break;
            case 'floculant':
                $urut = "urut_floculant";
            break;
            case 'machine':
                $urut = "urut_machine";
            break;
            default:
                $urut = "";
            break;
        }
        
        $query = $this->db->query("select * from material_analisa 
                                    where (material_analisa.`$urut` is not null 
                                    or material_analisa.`$urut` != '') order by $urut,id_material asc");
        
        return $query->result();
    }
    
    function update_verifikasi_tmp(){
        
        $id = $this->input->post('id');
        $hasil = $this->input->post('hasil');
        
        $this->db->set('hasil', $hasil);
        $this->db->where('id', $id );

		$update = $this->db->update('verifikasi_detil_tmp');
        
        if ($update){return true;}else{return false;};
    }
    
    function chek_verifikasi($tgl,$jam,$param){
        
        $this->db->select('*');
        $this->db->where('id_jam', $jam);
    	$this->db->where('tanggal', $tgl);
        $this->db->where('param',$param);
    
    	$query = $this->db->get('verifikasi',1);
    
    	if ( $query->num_rows() == 1 )
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
        
    }
//check verifikasi data untuk sugar_product RIZKI
    function chek_verifikasi_sugar($tgl ,$param){
        
        $this->db->select('*'); 
        $this->db->where('tanggal', $tgl);
        $this->db->where('param',$param);
    
        $query = $this->db->get('verifikasi',1);
    
        if ( $query->num_rows() == 1 )
        {
            return true;
        }
        else
        {
            return false; 
        }
        
    }
    
    function get_last_nomor_verifikasi()
    {
    	$tanggal = date("d-m-Y");
    	$bulan = sprintf("%02s", substr($tanggal, 3, 2));
    	$tahun = substr($tanggal, 6, 4);

    	$query = $this->db->query("select max(right(nomor,7)) as last, nomor from verifikasi
                                    where month(tanggal)='$bulan' and year(tanggal)='$tahun'");

    	$nomor = $query->row()->last;
    	return $nomor;
    }

	function get_nomor_formulir_verifikasi(){

        $tanggal = date("d-m-Y");

    	$bulan = sprintf("%02s", substr($tanggal, 3, 2));
    	$tahun = substr($tanggal, 8, 2);

    	$nomor = $this->get_last_nomor_verifikasi();

    	if (is_null($nomor)) {
        	$_nomor = 1;
    	} else {
        	$_nomor = $nomor + 1;
    	}

    	$sequence = sprintf("%07s", $_nomor);
    	$formatnomor = "VRF" . $tahun . $bulan . $sequence;

    	return $formatnomor;
	}
    
    function simpan_verifikasi(){
        
        $jam = $this->input->post('jam');
        $tgl = $this->input->post('tgl');
        $param = $this->input->post('param');
        
        $nomorformulir = $this->get_nomor_formulir_verifikasi();
        
        //create header verifikasi
        $data_header = array(
                    'nomor' => $nomorformulir,
                    'tanggal' => $tgl,
                    'id_jam' => $jam,
                    'id_user' => $this->session->userdata('id_user'),
                    'param' => $param
			);
            
        $this->db->insert('verifikasi', $data_header);
        $id_verifikasi =  $this->db->insert_id();
        
        if ($id_verifikasi){
            
            //get tmp
            $this->db->select('*');
            $this->db->from('verifikasi_detil_tmp');
            $this->db->where('id_jam',$jam);
            $this->db->where('tanggal',$tgl);
            $this->db->where('id_user',$this->session->userdata('id_user'));
            $this->db->where('param',$param);
            
            $get_tmp = $this->db->get();
            $tmp =  $get_tmp->result();
                
            $data = array();
            
            foreach( $tmp as $val ){
                array_push($data,
            		array(
                        'id_verifikasi'=> $id_verifikasi,
                        'id_material' => $val->id_material,
                        'id_parameter' => $val->id_parameter,
                        'id_jam' => $val->id_jam,
                        'no_strike' => $val->no_strike,
                        'id_user' => $val->id_user,
                        'tanggal' => $val->tanggal,
                        'hasil_awal' => $val->hasil,
                        'hasil' => $val->hasil,
                        'param' => $val->param
                      )
                );
            }
                
            $inset_detil = $this->db->insert_batch('verifikasi_detil', $data);
        }
        
        if (!$inset_detil){
            $this->db->where('id', $id_verifikasi);
            $this->db->delete('verifikasi');
        }
        
        if ($id_verifikasi && $inset_detil ){
            $this->batal_verifikasi();
            return true;
        }else{
            return false;
        }
        
    }
    
    function get_verifikasi_analisa_by_id($id){
        
        $this->db->select('verifikasi_detil.*,material_analisa.name');
        $this->db->from('verifikasi_detil');
        $this->db->join('material_analisa', 'material_analisa.id_material = verifikasi_detil.id_material', 'inner');
    	$this->db->where('verifikasi_detil.id_verifikasi', $id);
        $this->db->order_by('material_analisa.urut_mill', 'asc');
    
    	$query = $this->db->get();
     
        return $query->result();
        
    }
    
    function get_header_verifikasi_by_id($id){
        
        $this->db->select('*');
        $this->db->where('id', $id);
    	$query = $this->db->get('verifikasi',1);
    
    	if ( $query->num_rows() == 1 )
    	{
    		return $query->row_array();
    	}
    	
    }
    
    function batal_verifikasi(){
        
        $jam = $this->input->post('jam');
        $tgl = $this->input->post('tgl');
        $param = $this->input->post('param');
        
        $this->db->where('id_jam', $jam);
        $this->db->where('tanggal', $tgl);
        $this->db->where('param', $param);
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $batal = $this->db->delete('verifikasi_detil_tmp');
        
        if($batal){return true;}else{return false;}
    }

//delete data verifikasi per tanggal untuk sugar & molasses RIZKI
    function batal_verifikasi_perdate(){
         
        $tgl = $this->input->post('tgl');
        $param = $this->input->post('param');
         
        $this->db->where('tanggal', $tgl);
        $this->db->where('param', $param);
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $batal = $this->db->delete('verifikasi_detil_tmp');
        
        if($batal){return true;}else{return false;}
    }
   
   //simpans data verifikasi per tanggal untuk sugar & molasses RIZKI
   function simpan_verifikasi_perdate(){
         
        $tgl = $this->input->post('tgl');
        $param = $this->input->post('param');
        
        $nomorformulir = $this->get_nomor_formulir_verifikasi();
        
        //create header verifikasi
        $data_header = array(
                    'nomor' => $nomorformulir,
                    'tanggal' => $tgl,
                    'id_jam' => '-',
                    'id_user' => $this->session->userdata('id_user'),
                    'param' => $param
            );
            
        $this->db->insert('verifikasi', $data_header);
        $id_verifikasi =  $this->db->insert_id();
        
        if ($id_verifikasi){
            
            //get tmp
            $this->db->select('*');
            $this->db->from('verifikasi_detil_tmp'); 
            $this->db->where('tanggal',$tgl);
            $this->db->where('id_user',$this->session->userdata('id_user'));
            $this->db->where('param',$param);
            
            $get_tmp = $this->db->get();
            $tmp =  $get_tmp->result();
                
            $data = array();
            
            foreach( $tmp as $val ){
                array_push($data,
                    array(
                        'id_verifikasi'=> $id_verifikasi,
                        'id_material' => $val->id_material,
                        'id_parameter' => $val->id_parameter,
                        'id_jam' => $val->id_jam,
                        'no_strike' => $val->no_strike,
                        'id_user' => $val->id_user,
                        'tanggal' => $val->tanggal,
                        'hasil_awal' => $val->hasil,
                        'hasil' => $val->hasil,
                        'param' => $val->param
                      )
                );
            }
                
            $inset_detil = $this->db->insert_batch('verifikasi_detil', $data);
        }
        
        if (!$inset_detil){
            $this->db->where('id', $id_verifikasi);
            $this->db->delete('verifikasi');
        }
        
        if ($id_verifikasi && $inset_detil ){
            $this->db->where('tanggal',$tgl);
            $this->db->where('id_user',$this->session->userdata('id_user'));
            $this->db->where('param',$param);
            $this->db->delete('verifikasi_detil_tmp');
            return true;
        }else{
            return false;
        }
        
    }
    function chek_verifikasi_detil_tmp_per_date($tgl,$param){
        
        $this->db->select('*');
        $this->db->where('tanggal', $tgl); 
        $this->db->where('param', $param);
        $this->db->where('id_user', $this->session->userdata('id_user') );
                
        $query = $this->db->get('verifikasi_detil_tmp',1);
    
        if ( $query->num_rows() == 1 )
        {
            return true;
        }
        else
        {
            return false;
        }
    
    }
//get data parameter by material untuk boiler RIZKI
    function get_parameter($param){  
        $query = $this->db->query("SELECT * FROM parameter_analisa WHERE $param=1"); 
        return $query->result();
    }

    function set_data(){ 
        
        $parameter = $this->db->query("SELECT id_parameter FROM parameter_analisa");
        $hasil =  $parameter->result();          
        $materia = $this->db->query("SELECT id FROM material_analisa");
        $hasil2 = $materia->result();  
        $data = array();
        $n=1;
        
        for($x=0;$x<count($hasil2);$x++) { 
            for($i=0;$i<count($hasil);$i++) {

                array_push($data,
                    array(
                        'id_material' => $hasil2[$x]->id,
                        'id_parameter' => $hasil[$i]->id_parameter,
                        'id_jam' => '4',
                        'id_user' => $this->session->userdata('id_user'),
                        'tanggal' => '2020-07-06', 
                        'hasil' => rand(2,100), 
                        'no_strike' => $n, 
                        'time_strike' => $n+1, 
                        'pan_strike' => $n+2, 
                        'boiling_time_strike' => $n+3, 
                        'vol_strike' => $n+4, 
                    )
                ); 

                echo 'data :'. $hasil2[$x]->id.'|'.$hasil[$i]->id_parameter.'</br>';
            }
            if($n<=15){
                $n=$n+1;
            }else{
                $n=0;
            }
        }
        
        $this->db->insert_batch('hasil_analisa', $data);
        echo 'data :'.count($data);
    }
    
    function simpan_sementara(){ 
        
        $hasil = $this->input->post('hasil');
		$idjam = $this->input->post('jam_analisa');
		$material = $this->input->post('material_analisa');

		if ( $this->input->post('input') ){
			$input = implode("|",$this->input->post('input'))."|".$hasil;
		}else{
			$input = "";
		}
        
        $nomorformulir = $this->get_nomor_formulir();
        $data = array();
        $param = implode("|",$this->input->post('parameter'));
        
        $tanggal = $this->input->post('tanggal');
        
        $tgl = date('Y-m-d', strtotime($tanggal));

        $data = array(
            'nomor' => $nomorformulir,
            'tanggal' => $tgl,
            'id_jam' => $idjam,
            'nilai_a' => $hasil,
		    'hasil' => $hasil,
            'id_user' => $this->session->userdata('id_user'),
            'id_parameter' => $this->input->post('parameter')[0],
            'id_modul' => $this->input->post('id_modul'),
            'id_material' => $material,
            'is_data' => '3',
            'no_strike' => $this->input->post('strike'),
            'input' => $input,
            'is_show' => 1,
            'param' => $param,
            
		);
    
        $insert = $this->db->insert('hasil_analisa', $data);
        
        if ( $insert ){ return true; }else{ return false; }
		
	}
    
    function delete_sementara($nomor){
        
        $this->db->where('nomor', $nomor );
        
        $delete = $this->db->delete('hasil_analisa');
        
        if ($delete){return true;}
        
    }
    
    function simpan_analisa_condensate(){
        
        $nomor = $this->input->post('nomor');
        
        $parameter = $this->input->post("parameter");
        $idjam = $this->input->post("jam_analisa");
        $status = $this->input->post("status");
        $tanggal = $this->input->post('tanggal');
        
        $input1 = $this->input->post('input1');
        $input2 = $this->input->post('input2');
        
        $inputA = implode("|",$input1);
        $inputB = implode("|",$input2);
        
        $listInput = $inputA.",".$inputB;
        
        $tgl = date('Y-m-d', strtotime($tanggal));
        
        if($nomor){
            $this->delete_sementara($nomor);
            $nomorformulir = $nomor;
        }else{
            $nomorformulir = $this->get_nomor_formulir();
        }
        
        $data = array();
        
        $is_show = 0;
        
        if ($parameter == 'P003'){
            $n=1;
            $dt = 1;
            
            foreach ( $input1 as $val ) {

                switch ($n){
                    case 1; $material=45; break;
                    case 2; $material=156; break;
                    case 3; $material=46; break;
                    case 4; $material=47; break;
                    case 5; $material=48; break;
                    case 6; $material=49; break;
                    case 7; $material=51; break;
                    case 8; $material=52; break;
                    case 9; $material=53; break;
                    case 10; $material=54; break;
                    case 11; $material=55; break;
                    case 12; $material=56; break;
                    case 13; $material=184; break;
                    case 14; $material=57; break;
                    case 15; $material=58; break;
                    case 16; $material=59; break;
                    case 17; $material=60; break;
                    case 18; $material=61; break;
                    case 19; $material=62; break;
                    case 20; $material=63; break;
                    case 21; $material=64; break;
                    case 22; $material=65; break;
                    case 23; $material=66; break;
                    case 24; $material=67; break;
                    case 25; $material=68; break;
                    case 26; $material=69; break;
                    case 27; $material=70; break;
                    case 28; $material=71; break;
                    case 29; $material=72; break;
                    case 30; $material=73; break;
                    case 31; $material=74; break;
                    case 32; $material=75; break;
                    case 33; $material=76; break;
                    case 34; $material=77; break;
                    case 35; $material=78; break;
                    case 36; $material=79; break;
                    case 37; $material=80; break;
                    case 38; $material=81; break;
                    case 39; $material=82; break;
                    case 40; $material=83; break;
                    case 41; $material=84; break;
                    case 42; $material=85; break;
                    case 43; $material=86; break;
                    case 44; $material=87; break;
                    case 45; $material=88; break;
                    case 46; $material=89; break;
                    case 47; $material=90; break;
                    case 48; $material=91; break;
                    case 49; $material=92; break;
                    case 50; $material=93; break;
                    case 51; $material=94; break;
                }
                
                $hasil = $val;
                
                if ($hasil !=""){
                    
                    if ($dt==1){
                        $is_show = 1;
                    }else{
                        $is_show = 0;
                    }
                        
                    array_push($data,
                        array(
                                'nomor' => $nomorformulir,
                                'tanggal' => $tgl,
                                'id_jam' => $idjam,
                                'nilai_a' => $hasil,
        					    'hasil' => $hasil,
                                'id_user' => $this->session->userdata('id_user'),
                                'id_parameter' => 'P028',
                                'id_modul' => $this->input->post('id_modul'),
                                'id_material' => $material,
                                'is_data' => $status,
                                'input' => $listInput,
                                'is_show' => 0,
                                'param' => "",
        				)
                    ); 
                    
                    $dt++;
                }
                
               $n++; 
            }
            
        }
        
        $n2=1;
        $dt = 1;
        foreach ( $input2 as $val ) {

            switch ($n2){
                case 1; $material=45; break;
                case 2; $material=156; break;
                case 3; $material=46; break;
                case 4; $material=47; break;
                case 5; $material=48; break;
                case 6; $material=49; break;
                case 7; $material=51; break;
                case 8; $material=52; break;
                case 9; $material=53; break;
                case 10; $material=54; break;
                case 11; $material=55; break;
                case 12; $material=56; break;
                case 13; $material=184; break;
                case 14; $material=57; break;
                case 15; $material=58; break;
                case 16; $material=59; break;
                case 17; $material=60; break;
                case 18; $material=61; break;
                case 19; $material=62; break;
                case 20; $material=63; break;
                case 21; $material=64; break;
                case 22; $material=65; break;
                case 23; $material=66; break;
                case 24; $material=67; break;
                case 25; $material=68; break;
                case 26; $material=69; break;
                case 27; $material=70; break;
                case 28; $material=71; break;
                case 29; $material=72; break;
                case 30; $material=73; break;
                case 31; $material=74; break;
                case 32; $material=75; break;
                case 33; $material=76; break;
                case 34; $material=77; break;
                case 35; $material=78; break;
                case 36; $material=79; break;
                case 37; $material=80; break;
                case 38; $material=81; break;
                case 39; $material=82; break;
                case 40; $material=83; break;
                case 41; $material=84; break;
                case 42; $material=85; break;
                case 43; $material=86; break;
                case 44; $material=87; break;
                case 45; $material=88; break;
                case 46; $material=89; break;
                case 47; $material=90; break;
                case 48; $material=91; break;
                case 49; $material=92; break;
                case 50; $material=93; break;
                case 51; $material=94; break;
            }
            
            $hasil = $val;
            
            if ($hasil !=""){
                
                if ($dt==1){
                    $is_show = 1;
                }else{
                    $is_show = 0;
                }
                
                array_push($data,
                    array(
                            'nomor' => $nomorformulir,
                            'tanggal' => $tgl,
                            'id_jam' => $idjam,
                            'nilai_a' => $hasil,
    					    'hasil' => $hasil,
                            'id_user' => $this->session->userdata('id_user'),
                            'id_parameter' => $parameter,
                            'id_modul' => $this->input->post('id_modul'),
                            'id_material' => $material,
                            'is_data' => $status,
                            'input' => $listInput,
                            'is_show' => $is_show,
                            'param' => "",
    				)
                );
                
               $dt++; 
            }

                
           $n2++; 
        }
        
        $insert = $this->db->insert_batch('hasil_analisa', $data);
        
        if ( $insert ){ return true; }else{ return false; }

    }
    
    function simpan_sementara_condensate(){
        
        $nomor = $this->input->post('nomor');
        
        $hasil = $this->input->post('hasil');
		$idjam = $this->input->post('jam_analisa');
		$material = $this->input->post('material_analisa');

        $input = implode("|",$this->input->post('input1')).",".implode("|",$this->input->post('input2'));
        
        if($nomor){
            $this->delete_sementara($nomor);
            $nomorformulir = $nomor;
        }else{
            $nomorformulir = $this->get_nomor_formulir();
        }
        
        $data = array();

        $tanggal = $this->input->post('tanggal');
        
        $tgl = date('Y-m-d', strtotime($tanggal));

        $data = array(
            'nomor' => $nomorformulir,
            'tanggal' => $tgl,
            'id_jam' => $idjam,
            'nilai_a' => $hasil,
		    'hasil' => $hasil,
            'id_user' => $this->session->userdata('id_user'),
            'id_parameter' => $this->input->post('parameter'),
            'id_modul' => $this->input->post('id_modul'),
            'id_material' => $material,
            'is_data' => '3',
            'no_strike' => $this->input->post('strike'),
            'input' => $input,
            'is_show' => 1,
            'param' => $this->input->post('parameter'),
            
		);
    
        $insert = $this->db->insert('hasil_analisa', $data);
        
        if ( $insert ){ return true; }else{ return false; }
        
    }
    
    function simpan_analisa_manual($param = false){
        
        $idjam = $this->input->post("jam_analisa");
        $tanggal = $this->input->post('tanggal');
        $material = $this->input->post('material');
        
        $tgl = date('Y-m-d', strtotime($tanggal));
        
        $nomorformulir = $this->get_nomor_formulir();
        
        $data = array();

        $Arrinput = array();
        $ArrayHasil = array();
        
        switch ($param){
            case 'reducingsugar':
                //Material	Brix (%) - P001	RS (%) - P007	RS%Bx - P007A  Losses P075
                $param = array("P001","P007","P007A","P075");
                
            break;
            case 'cao':
                //Material	CaO (mg/l) - P012	Beume (Be) - P015	W/R - P087	OV (%) - P088
                $param = array("P012","P015","P087","P088","P022");
            break;
            case 'visco':
                //Material	Viscosity (Cp) - P025
                $param = array("P025");
            break;
            case 'temperatur':
                //Temp (oC) - P027
                $param = array("P027");
            break;
            case 'debit':
                //debit (m3/d) - P040
                $param = array("P040");
            break;
            case 'boilerwater':
                //DO - P030	Total Hardness - P031	M-Alkalinity - P032	P-Alkalinity - P033	O-Alkalinity - P034	Sulphite - P037	Chloride - P038
                $param = array("P030","P031","P032","P033","P034","P037","P038");
            break;
            case 'evaporator':
                //Temp. - P027	Press/Vacuum - Pxxx	CaO - P012
                $param = array("P027","P101","P012");
            break;
            case 'machine':
                //Viscosity - P025	Temp. Material - P027	Vol Fmol - P097	Ampere - P098	Dilution Water - P099	Temp. Dilt. Water - P100
                $param = array("P025","P027","P097","P098","P099","P100");
            break;
            default:
                $param = array();
            break;
        }
        
        
        
        $ArrayHasil = array();
        $z=1;
        foreach ($param as $valParam){
            
            $inputX = $this->input->post('input'.$z);
            
            $jmlInput = count($inputX);
            
            $Arrinput = array_merge($inputX);
            $ArrayHasil = array_merge($ArrayHasil,$Arrinput);
            
            $z++;
        }
        
        $listInput = implode("|",$ArrayHasil);
        
        $jmlPram = count($param);
        $dt=1;
        $x = 1;
        foreach ($param as $val_param){ //param
            
            $n=1;
            
            $input = $this->input->post('input'.$x);
            
            foreach ($input as $val){ //input by param
                /*
                if ($x == $jmlPram and $n== $jmlInput ){
                    $is_show = 1;
                }else{
                    $is_show = 0;
                }*/
                
                //$dt=1;

                $hasil = $val;
                
                if ($hasil !=""){

                    if ($dt==1){
                        $is_show = 1;
                    }else{
                        $is_show = 0;
                    }
                    
                    array_push($data,
                        array(
                                'nomor' => $nomorformulir,
                                'tanggal' => $tgl,
                                'id_jam' => $idjam,
                                'nilai_a' => $hasil,
        					    'hasil' => $hasil,
                                'id_user' => $this->session->userdata('id_user'),
                                'id_parameter' => $val_param,
                                'id_modul' => $this->input->post('id_modul'),
                                'id_material' => $material[$n],
                                'is_data' => 1,
                                'input' => $listInput,
                                'is_show' => $is_show,
                                'param' => "",
        				)
                    );
                    
                    $dt++;
                    
                }

                $n++;
            }
            
            $x++;
        }
        
        //print_r($data);

        $insert = $this->db->insert_batch('hasil_analisa', $data);
        
        if ( $insert ){ return true; }else{ return false; }
        
    }
    

 }
