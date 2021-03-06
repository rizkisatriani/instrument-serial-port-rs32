<?php

class Reportdailymill_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data(  $date ){   
 $query = $this->db->query('SELECT  
 t.id_jam
,t.tanggal
,CASE WHEN MAX(t.M001_P001)=0 THEN MIN(t.M001_P001) ELSE MAX(t.M001_P001) END AS M001_P001
,CASE WHEN MAX(t.M001_P002)=0 THEN MIN(t.M001_P002) ELSE MAX(t.M001_P002) END AS M001_P002
,CASE WHEN MAX(t.M001_P003)=0 THEN MIN(t.M001_P003) ELSE MAX(t.M001_P003) END AS M001_P003 
,CASE WHEN MAX(t.M001_P007)=0 THEN MIN(t.M001_P007) ELSE MAX(t.M001_P007) END AS M001_P007 
,CASE WHEN MAX(t.M002_P001)=0 THEN MIN(t.M002_P001) ELSE MAX(t.M002_P001) END AS M002_P001
,CASE WHEN MAX(t.M002_P002)=0 THEN MIN(t.M002_P002) ELSE MAX(t.M002_P002) END AS M002_P002
,CASE WHEN MAX(t.M002_P003)=0 THEN MIN(t.M002_P003) ELSE MAX(t.M002_P003) END AS M002_P003
,CASE WHEN MAX(t.M002_P005)=0 THEN MIN(t.M002_P005) ELSE MAX(t.M002_P005) END AS M002_P005
,CASE WHEN MAX(t.M002_P006)=0 THEN MIN(t.M002_P006) ELSE MAX(t.M002_P006) END AS M002_P006
,CASE WHEN MAX(t.M002_P007)=0 THEN MIN(t.M002_P007) ELSE MAX(t.M002_P007) END AS M002_P007 
,CASE WHEN MAX(t.M002_P075)=0 THEN MIN(t.M002_P075) ELSE MAX(t.M002_P075) END AS M002_P075
,CASE WHEN MAX(t.M002_P077)=0 THEN MIN(t.M002_P077) ELSE MAX(t.M002_P077) END AS M002_P077
,CASE WHEN MAX(t.M003_P001)=0 THEN MIN(t.M003_P001) ELSE MAX(t.M003_P001) END AS M003_P001
,CASE WHEN MAX(t.M003_P002)=0 THEN MIN(t.M003_P002) ELSE MAX(t.M003_P002) END AS M003_P002
,CASE WHEN MAX(t.M003_P003)=0 THEN MIN(t.M003_P003) ELSE MAX(t.M003_P003) END AS M003_P003  
,CASE WHEN MAX(t.M004_P009)=0 THEN MIN(t.M004_P009) ELSE MAX(t.M004_P009) END AS M004_P009
,CASE WHEN MAX(t.M004_P010)=0 THEN MIN(t.M004_P010) ELSE MAX(t.M004_P010) END AS M004_P010  
,CASE WHEN MAX(t.M005_P002)=0 THEN MIN(t.M005_P002) ELSE MAX(t.M005_P002) END AS M005_P002 
,CASE WHEN MAX(t.M005_P008)=0 THEN MIN(t.M005_P008) ELSE MAX(t.M005_P008) END AS M005_P008 
 FROM(
SELECT
    material_analisa.id_material
    , verifikasi_detil.id_material AS matr
    , verifikasi_detil.id_parameter AS prmt
    , parameter_analisa.id_parameter
    , verifikasi_detil.id_jam
    , verifikasi_detil.tanggal
    , verifikasi_detil.hasil,
CASE WHEN verifikasi_detil.id_material="M001" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS M001_P001,
CASE WHEN verifikasi_detil.id_material="M001" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS M001_P002,
CASE WHEN verifikasi_detil.id_material="M001" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS M001_P003, 
CASE WHEN verifikasi_detil.id_material="M001" AND verifikasi_detil.id_parameter="P007" THEN  hasil ELSE 0 END AS M001_P007,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS M002_P001,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS M002_P002,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS M002_P003,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P005" THEN  hasil ELSE 0 END AS M002_P005,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P006" THEN  hasil ELSE 0 END AS M002_P006,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P007" THEN  hasil ELSE 0 END AS M002_P007,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P075" THEN  hasil ELSE 0 END AS M002_P075,
CASE WHEN verifikasi_detil.id_material="M002" AND verifikasi_detil.id_parameter="P004" THEN  hasil ELSE 0 END AS M002_P077,
CASE WHEN verifikasi_detil.id_material="M003" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS M003_P001,
CASE WHEN verifikasi_detil.id_material="M003" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS M003_P002,
CASE WHEN verifikasi_detil.id_material="M003" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS M003_P003,
CASE WHEN verifikasi_detil.id_material="M004" AND verifikasi_detil.id_parameter="P009" THEN  hasil ELSE 0 END AS M004_P009,
CASE WHEN verifikasi_detil.id_material="M004" AND verifikasi_detil.id_parameter="P010" THEN  hasil ELSE 0 END AS M004_P010,
CASE WHEN verifikasi_detil.id_material="M005" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS M005_P002,
CASE WHEN verifikasi_detil.id_material="M005" AND verifikasi_detil.id_parameter="P008" THEN  hasil ELSE 0 END AS M005_P008
FROM
    material_analisa 
    INNER JOIN verifikasi_detil 
        ON (material_analisa.id_material = verifikasi_detil.id_material)
    INNER JOIN parameter_analisa 
        ON (parameter_analisa.id_parameter = verifikasi_detil.id_parameter)
        WHERE material_analisa.id_material IN ("M001","M002","M003","M004","M005")
        AND parameter_analisa.id_parameter IN ("P001","P002","P003","P005","P006","P007","P008","P009","P010","P075","P004") and tanggal="'.$date.'"
        GROUP BY material_analisa.id_material,parameter_analisa.id_parameter,verifikasi_detil.id_jam
        ORDER BY verifikasi_detil.id_jam,material_analisa.id_material,parameter_analisa.id_parameter
        )AS t GROUP BY t.id_jam;');  
        return $query->result();
    }

     

     function get_data_count($date){   
                 $query = $this->db->query(' 
                SELECT verifikasi_detil.id_verifikasi AS id, 
                verifikasi_detil.id_jam AS id_jam 
                FROM  verifikasi_detil
                WHERE verifikasi_detil.id_material IN("M001","M002","M003","M004","M005") AND 
                verifikasi_detil.id_parameter IN ("P001","P002","P003","P005","P006","P007","P008","P009","P010","P075","P077") and 
                verifikasi_detil.tanggal="'.$date.'" GROUP BY  id_jam'); 
                return $query->num_rows();  
        }
            
}
 ?>
