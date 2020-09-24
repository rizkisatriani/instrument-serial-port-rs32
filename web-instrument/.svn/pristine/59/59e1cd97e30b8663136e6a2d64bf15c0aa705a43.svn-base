<?php

class Reportdailycondensor_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data_t1(  $date ){  

        $query = $this->db->query('SELECT 
            t.id AS id,
            t.tanggal AS tanggal,
            t.id_jam AS id_jam,
            t.id_material AS id_material,
            t.NAME AS NAME,
            CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
            CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar 
            FROM (
            SELECT verifikasi_detil.id_verifikasi AS id,
            verifikasi.tanggal AS tanggal,
            verifikasi_detil.id_jam AS id_jam,
            material_analisa.id_material AS id_material,
            verifikasi_detil.id_material AS material,
            verifikasi_detil.id_parameter AS id_parameter,
            verifikasi_detil.hasil AS hasil,
            material_analisa.name AS NAME,
            CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
            AND verifikasi_detil.id_parameter = "P003") THEN verifikasi_detil.hasil ELSE 0 END AS pH,
            CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
            AND verifikasi_detil.id_parameter = "P029") THEN verifikasi_detil.hasil ELSE 0 END AS Sugar 
            FROM (
            material_analisa 
            LEFT JOIN 
            (verifikasi JOIN verifikasi_detil 
            ON(verifikasi_detil.id_material IN ("M045","M046","M047","M048","M049","M050","M057","M058","M059","M060","M061") 
            AND verifikasi.id = verifikasi_detil.id_verifikasi)) 
            ON(material_analisa.id_material IN ("M045","M046","M047","M048","M049","M050","M057","M058","M059","M060","M061"))) 
            WHERE verifikasi_detil.param IN ("water","boiler") AND verifikasi_detil.tanggal="'.$date.'"
            ORDER BY verifikasi_detil.id_jam,material_analisa.id_material) t 
            GROUP BY t.id_material,t.id_jam 
            ORDER BY t.id_jam,t.id_material;'); 

        return $query->result();
    }

    function get_data_t2($date){  
        $query = $this->db->query('SELECT 
            t.id AS id,
            t.tanggal AS tanggal,
            t.id_jam AS id_jam,
            t.id_material AS id_material,
            t.name AS NAME,
            CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
            CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar 
            FROM (
            SELECT verifikasi_detil.id_verifikasi AS id,
            verifikasi.tanggal AS tanggal,
            verifikasi_detil.id_jam AS id_jam,
            material_analisa.id_material AS id_material,
            material_analisa.name AS NAME,
            CASE WHEN verifikasi_detil.id_parameter = "P003" THEN verifikasi_detil.hasil ELSE 0 END AS pH,
            CASE WHEN verifikasi_detil.id_parameter = "P029" THEN verifikasi_detil.hasil ELSE 0 END AS Sugar 
            FROM (material_analisa 
            LEFT JOIN (verifikasi JOIN verifikasi_detil 
            ON(verifikasi.id = verifikasi_detil.id_verifikasi)) 
            ON(material_analisa.id_material IN ("M051","M052","M053","M054","M055","M056","M062","M063","M064","M068","M069") 
            AND material_analisa.id_material = verifikasi_detil.id_material)) 
            WHERE verifikasi_detil.param = "water" AND verifikasi_detil.tanggal="'.$date.'"
            GROUP BY material_analisa.id_material,verifikasi_detil.id_jam,verifikasi_detil.id_parameter 
            ORDER BY verifikasi_detil.id_jam,material_analisa.id_material) t 
            GROUP BY t.id_material,t.id_jam 
            ORDER BY t.id_jam,t.id_material'); 
        return $query->result();
    }

    function get_data_t3(  $date ){  
        $query = $this->db->query('SELECT 
            t.id AS id,
            t.tanggal AS tanggal,
            t.id_jam AS id_jam,
            t.id_material AS id_material,
            t.name AS NAME,
            CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
            CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar 
            FROM 
            (
            SELECT 
            verifikasi_detil.id_verifikasi AS id,
            verifikasi.tanggal AS tanggal,
            verifikasi_detil.id_jam AS id_jam,
            material_analisa.id_material AS id_material,
            material_analisa.name AS NAME,
            CASE WHEN verifikasi_detil.id_parameter = "P003" THEN verifikasi_detil.hasil ELSE 0 END AS pH,
            CASE WHEN verifikasi_detil.id_parameter = "P029" THEN verifikasi_detil.hasil ELSE 0 END AS Sugar 
            FROM (material_analisa 
            LEFT JOIN (verifikasi 
            JOIN verifikasi_detil 
            ON(verifikasi.id = verifikasi_detil.id_verifikasi)) 
            ON(material_analisa.id_material IN ("M070","M071","M072","M073","M074","M075","M076","M077","M078","M079","M080") 
            AND material_analisa.id_material = verifikasi_detil.id_material)) 
            WHERE verifikasi_detil.param = "water" AND verifikasi_detil.tanggal="'.$date.'"
            GROUP BY material_analisa.id_material,verifikasi_detil.id_jam,verifikasi_detil.id_parameter 
            ORDER BY verifikasi_detil.id_jam,material_analisa.id_material) t 
            GROUP BY t.id_material,t.id_jam 
            ORDER BY t.id_jam,t.id_material'); 
        return $query->result();
    }
       function get_data_t4(  $date ){  
        $query = $this->db->query('SELECT 
            t.id AS id,
            t.tanggal AS tanggal,
            t.id_jam AS id_jam,
            t.id_material AS id_material,
            t.name AS NAME,
            CASE WHEN MAX(t.Temp) = 0 THEN MIN(t.Temp) ELSE MAX(t.Temp) END AS Temp,
            CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
            CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar 
            FROM (
            SELECT 
            verifikasi_detil.id_verifikasi AS id,
            verifikasi.tanggal AS tanggal,
            verifikasi_detil.id_jam AS id_jam,
            material_analisa.id_material AS id_material,
            material_analisa.name AS NAME,
            CASE WHEN verifikasi_detil.id_parameter = "P027" THEN verifikasi_detil.hasil ELSE 0 END AS Temp,
            CASE WHEN verifikasi_detil.id_parameter = "P003" THEN verifikasi_detil.hasil ELSE 0 END AS pH,
            CASE WHEN verifikasi_detil.id_parameter = "P029" THEN verifikasi_detil.hasil ELSE 0 END AS Sugar 
            FROM 
            (material_analisa 
            LEFT JOIN (verifikasi 
            JOIN verifikasi_detil 
            ON(verifikasi.id = verifikasi_detil.id_verifikasi)) 
            ON(material_analisa.id_material IN ("M081","M082","M083","M084","M085","M086","M087","M088","M065","M066") 
            AND material_analisa.id_material = verifikasi_detil.id_material)) 
            WHERE verifikasi_detil.param = "water" AND verifikasi_detil.tanggal="'.$date.'" 
            GROUP BY material_analisa.id_material,verifikasi_detil.id_jam,verifikasi_detil.id_parameter 
            ORDER BY verifikasi_detil.id_jam,material_analisa.id_material) t 
            GROUP BY t.id_material,t.id_jam 
            ORDER BY t.id_jam,t.id_material'); 
        return $query->result();
    } 

     function get_data_t5(  $date ){  
        $query = $this->db->query('SELECT 
t.id AS id,
t.tanggal AS tanggal,
t.id_jam AS id_jam,
t.id_material AS id_material,
t.NAME AS NAME,
CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar,
CASE WHEN MAX(t.Temp_in) = 0 THEN MIN(t.Temp_in) ELSE MAX(t.Temp_in) END AS Temp_in,
CASE WHEN MAX(t.Temp_out) = 0 THEN MIN(t.Temp_out) ELSE MAX(t.Temp_out) END AS Temp_out,
CASE WHEN MAX(t.Debit) = 0 THEN MIN(t.Debit) ELSE MAX(t.Debit) END AS Debit 
FROM (
SELECT verifikasi_detil.id_verifikasi AS id,
verifikasi.tanggal AS tanggal,
verifikasi_detil.id_jam AS id_jam,
material_analisa.id_material AS id_material,
verifikasi_detil.id_material AS material,
verifikasi_detil.id_parameter AS id_parameter,
verifikasi_detil.hasil AS hasil,
material_analisa.name AS NAME,
CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
AND verifikasi_detil.id_parameter = "P003") THEN verifikasi_detil.hasil ELSE 0 END AS pH,
CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
AND verifikasi_detil.id_parameter = "P029") THEN verifikasi_detil.hasil ELSE 0 END AS Sugar,
CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
AND verifikasi_detil.id_parameter = "P089") THEN verifikasi_detil.hasil ELSE 0 END AS Temp_in,
CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
AND verifikasi_detil.id_parameter = "P090") THEN verifikasi_detil.hasil ELSE 0 END AS Temp_out,
CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
AND verifikasi_detil.id_parameter = "P040") THEN verifikasi_detil.hasil ELSE 0 END AS Debit 
FROM (material_analisa 
LEFT JOIN (verifikasi JOIN verifikasi_detil ON(verifikasi_detil.id_material 
IN ("M089","M090","M091","M092","M093","M094","M163") AND verifikasi.id = verifikasi_detil.id_verifikasi)) 
ON(material_analisa.id_material IN ("M089","M090","M091","M092","M093","M094","M163"))) 
WHERE verifikasi_detil.param = "water" AND verifikasi_detil.tanggal="'.$date.'" 
ORDER BY verifikasi_detil.id_jam,material_analisa.id_material
) t 
GROUP BY t.id_material,t.id_jam 
ORDER BY t.id_jam,t.id_material DESC'); 
        return $query->result();
    }

     function get_data_count($date,$param){  
        $query = '';
        switch ($param) {
            case 1:
                $query = $this->db->query('SELECT 
                t.id AS id,
                t.tanggal AS tanggal,
                t.id_jam AS id_jam,
                t.id_material AS id_material,
                t.NAME AS NAME,
                CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
                CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar 
                FROM (
                SELECT verifikasi_detil.id_verifikasi AS id,
                verifikasi.tanggal AS tanggal,
                verifikasi_detil.id_jam AS id_jam,
                material_analisa.id_material AS id_material,
                verifikasi_detil.id_material AS material,
                verifikasi_detil.id_parameter AS id_parameter,
                verifikasi_detil.hasil AS hasil,
                material_analisa.name AS NAME,
                CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
                AND verifikasi_detil.id_parameter = "P003") THEN verifikasi_detil.hasil ELSE 0 END AS pH,
                CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
                AND verifikasi_detil.id_parameter = "P029") THEN verifikasi_detil.hasil ELSE 0 END AS Sugar 
                FROM (
                material_analisa 
                LEFT JOIN 
                (verifikasi JOIN verifikasi_detil 
                ON(verifikasi_detil.id_material IN ("M045","M046","M047","M048","M049","M050","M057","M058","M059","M060","M061") 
                AND verifikasi.id = verifikasi_detil.id_verifikasi)) 
                ON(material_analisa.id_material IN ("M045","M046","M047","M048","M049","M050","M057","M058","M059","M060","M061"))) 
                WHERE verifikasi_detil.param IN ("water","boiler") AND verifikasi_detil.tanggal="'.$date.'"
                ORDER BY verifikasi_detil.id_jam,material_analisa.id_material) t 
                GROUP BY  t.id_jam 
                ORDER BY t.id_jam ;'); 
                return $query->result();
                break;
            case 2:
                $query= $this->db->query('SELECT 
            t.id AS id,
            t.tanggal AS tanggal,
            t.id_jam AS id_jam,
            t.id_material AS id_material,
            t.name AS NAME,
            CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
            CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar 
            FROM (
            SELECT verifikasi_detil.id_verifikasi AS id,
            verifikasi.tanggal AS tanggal,
            verifikasi_detil.id_jam AS id_jam,
            material_analisa.id_material AS id_material,
            material_analisa.name AS NAME,
            CASE WHEN verifikasi_detil.id_parameter = "P003" THEN verifikasi_detil.hasil ELSE 0 END AS pH,
            CASE WHEN verifikasi_detil.id_parameter = "P029" THEN verifikasi_detil.hasil ELSE 0 END AS Sugar 
            FROM (material_analisa 
            LEFT JOIN (verifikasi JOIN verifikasi_detil 
            ON(verifikasi.id = verifikasi_detil.id_verifikasi)) 
            ON(material_analisa.id_material IN ("M051","M052","M053","M054","M055","M056","M062","M063","M064","M068","M069") 
            AND material_analisa.id_material = verifikasi_detil.id_material)) 
            WHERE verifikasi_detil.param = "water" AND verifikasi_detil.tanggal="'.$date.'"
            GROUP BY material_analisa.id_material,verifikasi_detil.id_jam,verifikasi_detil.id_parameter 
            ORDER BY verifikasi_detil.id_jam,material_analisa.id_material) t 
            GROUP BY t.id_jam 
            ORDER BY t.id_jam ');
                return $query->result();
                break;

            case 3:
                    $query= $this->db->query('SELECT 
                    t.id AS id,
                    t.tanggal AS tanggal,
                    t.id_jam AS id_jam,
                    t.id_material AS id_material,
                    t.NAME AS NAME,
                    CASE WHEN MAX(t.pH) = 0 THEN MIN(t.pH) ELSE MAX(t.pH) END AS pH,
                    CASE WHEN MAX(t.Sugar) = 0 THEN MIN(t.Sugar) ELSE MAX(t.Sugar) END AS Sugar,
                    CASE WHEN MAX(t.Temp_in) = 0 THEN MIN(t.Temp_in) ELSE MAX(t.Temp_in) END AS Temp_in,
                    CASE WHEN MAX(t.Temp_out) = 0 THEN MIN(t.Temp_out) ELSE MAX(t.Temp_out) END AS Temp_out,
                    CASE WHEN MAX(t.Debit) = 0 THEN MIN(t.Debit) ELSE MAX(t.Debit) END AS Debit 
                    FROM (
                    SELECT verifikasi_detil.id_verifikasi AS id,
                    verifikasi.tanggal AS tanggal,
                    verifikasi_detil.id_jam AS id_jam,
                    material_analisa.id_material AS id_material,
                    verifikasi_detil.id_material AS material,
                    verifikasi_detil.id_parameter AS id_parameter,
                    verifikasi_detil.hasil AS hasil,
                    material_analisa.name AS NAME,
                    CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
                    AND verifikasi_detil.id_parameter = "P003") THEN verifikasi_detil.hasil ELSE 0 END AS pH,
                    CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
                    AND verifikasi_detil.id_parameter = "P029") THEN verifikasi_detil.hasil ELSE 0 END AS Sugar,
                    CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
                    AND verifikasi_detil.id_parameter = "P089") THEN verifikasi_detil.hasil ELSE 0 END AS Temp_in,
                    CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
                    AND verifikasi_detil.id_parameter = "P090") THEN verifikasi_detil.hasil ELSE 0 END AS Temp_out,
                    CASE WHEN (material_analisa.id_material = verifikasi_detil.id_material 
                    AND verifikasi_detil.id_parameter = "P040") THEN verifikasi_detil.hasil ELSE 0 END AS Debit 
                    FROM (material_analisa 
                    LEFT JOIN (verifikasi JOIN verifikasi_detil ON(verifikasi_detil.id_material 
                    IN ("M089","M090","M091","M092","M093","M094","M163") AND verifikasi.id = verifikasi_detil.id_verifikasi)) 
                    ON(material_analisa.id_material IN ("M089","M090","M091","M092","M093","M094","M163"))) 
                    WHERE verifikasi_detil.param = "water" AND verifikasi_detil.tanggal="'.$date.'" 
                    ORDER BY verifikasi_detil.id_jam,material_analisa.id_material
                    ) t 
                    GROUP BY t.id_jam 
                    ORDER BY t.id_jam DESC');
                    return $query->result();
                break;
            case 4:
                $tbl='water_condensate_report_tb_4';
                break;
            case 5:
                $tbl='water_condensate_report_tb_5';
                break;
            
            default:
                # code...
                break;
        }
         
    }

        function get_headers($param){
        
        switch($param){

            case '0':
                $urut = "urut_water,urut_boiler";
                $IN="id_material IN ('M045','M046','M047','M048','M049','M050','M057','M058','M059','M060','M061')";
            break;
            case '1':
                $urut = "urut_water";
                $IN="id_material IN('M051','M052','M053','M054','M055','M056','M062','M063','M064','M068','M069')";
            break;
            case '2':
                $urut = "urut_water";
                $IN="id_material IN ('M070','M071','M072','M073','M074','M075','M076','M077','M078','M079','M080')";
            break;
            case '3':
                $urut = "urut_water";
                $IN="id_material IN ('M081','M082','M083','M084','M085','M086','M087','M088','M065','M066')";
            break;
            case 'evap':
                $urut = "urut_evap";
            break;
            default:
                $urut = "";
            break;
        }
        
        $query = $this->db->query("select * from material_analisa where $IN order by $urut asc");
        
        return $query->result();
    }

}
 ?>
