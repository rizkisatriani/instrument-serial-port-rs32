<?php

class Reportdailypan_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data_t1($date){   
 $query = $this->db->query('SELECT  
 t.id_jam
,t.tanggal,
CASE WHEN MAX(t.A_Massecuite_Brix)=0 THEN MIN(A_Massecuite_Brix) ELSE MAX(t.A_Massecuite_Brix) END AS A_Massecuite_Brix,
CASE WHEN MAX(t.A_Massecuite_Polarization)=0 THEN MIN(A_Massecuite_Polarization) ELSE MAX(t.A_Massecuite_Polarization) END AS A_Massecuite_Polarization,
CASE WHEN MAX(t.A_Massecuite_Time_Strike)=0 THEN MIN(A_Massecuite_Time_Strike) ELSE MAX(t.A_Massecuite_Time_Strike) END AS A_Massecuite_Time_Strike,
CASE WHEN MAX(t.A_Massecuite_No_Strike)=0 THEN MIN(A_Massecuite_No_Strike) ELSE MAX(t.A_Massecuite_No_Strike) END AS A_Massecuite_No_Strike,
CASE WHEN MAX(t.A_Massecuite_Pan_Strike)=0 THEN MIN(A_Massecuite_Pan_Strike) ELSE MAX(t.A_Massecuite_Pan_Strike) END AS A_Massecuite_Pan_Strike,
CASE WHEN MAX(t.A_Massecuite_Boiling_Time)=0 THEN MIN(A_Massecuite_Boiling_Time) ELSE MAX(t.A_Massecuite_Boiling_Time) END AS A_Massecuite_Boiling_Time,
CASE WHEN MAX(t.A_Massecuite_Volume)=0 THEN MIN(A_Massecuite_Volume) ELSE MAX(t.A_Massecuite_Volume) END AS A_Massecuite_Volume,
CASE WHEN MAX(t.A_Graining_Brix)=0 THEN MIN(A_Graining_Brix) ELSE MAX(t.A_Graining_Brix) END AS A_Graining_Brix,
CASE WHEN MAX(t.A_Graining_Polarization)=0 THEN MIN(A_Graining_Polarization) ELSE MAX(t.A_Graining_Polarization) END AS A_Graining_Polarization,
CASE WHEN MAX(t.A_Graining_Time_Strike)=0 THEN MIN(A_Graining_Time_Strike) ELSE MAX(t.A_Graining_Time_Strike) END AS A_Graining_Time_Strike,
CASE WHEN MAX(t.A_Graining_No_Strike)=0 THEN MIN(A_Graining_No_Strike) ELSE MAX(t.A_Graining_No_Strike) END AS A_Graining_No_Strike,
CASE WHEN MAX(t.A_Graining_Pan_Strike)=0 THEN MIN(A_Graining_Pan_Strike) ELSE MAX(t.A_Graining_Pan_Strike) END AS A_Graining_Pan_Strike,
CASE WHEN MAX(t.A_Graining_Boiling_Time)=0 THEN MIN(A_Graining_Boiling_Time) ELSE MAX(t.A_Graining_Boiling_Time) END AS A_Graining_Boiling_Time,
CASE WHEN MAX(t.A_Graining_Volume)=0 THEN MIN(A_Graining_Volume) ELSE MAX(t.A_Graining_Volume) END AS A_Graining_Volume,
CASE WHEN MAX(t.A_Seed_Brix)=0 THEN MIN(A_Seed_Brix) ELSE MAX(t.A_Seed_Brix) END AS A_Seed_Brix,
CASE WHEN MAX(t.A_Seed_Polarization)=0 THEN MIN(A_Seed_Polarization) ELSE MAX(t.A_Seed_Polarization) END AS A_Seed_Polarization,
CASE WHEN MAX(t.A_Seed_Time_Strike)=0 THEN MIN(A_Seed_Time_Strike) ELSE MAX(t.A_Seed_Time_Strike) END AS A_Seed_Time_Strike,
CASE WHEN MAX(t.A_Seed_No_Strike)=0 THEN MIN(A_Seed_No_Strike) ELSE MAX(t.A_Seed_No_Strike) END AS A_Seed_No_Strike,
CASE WHEN MAX(t.A_Seed_Pan_Strike)=0 THEN MIN(A_Seed_Pan_Strike) ELSE MAX(t.A_Seed_Pan_Strike) END AS A_Seed_Pan_Strike,
CASE WHEN MAX(t.A_Seed_Boiling_Time)=0 THEN MIN(A_Seed_Boiling_Time) ELSE MAX(t.A_Seed_Boiling_Time) END AS A_Seed_Boiling_Time,
CASE WHEN MAX(t.A_Seed_Volume)=0 THEN MIN(A_Seed_Volume) ELSE MAX(t.A_Seed_Volume) END AS A_Seed_Volume
 FROM(
SELECT
    material_analisa.id_material
    , verifikasi_detil.id_material AS matr
    , verifikasi_detil.id_parameter AS prmt
    , parameter_analisa.id_parameter
    , verifikasi_detil.id_jam
    , verifikasi_detil.tanggal
    , verifikasi_detil.hasil,
CASE WHEN verifikasi_detil.id_material="M030" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS A_Massecuite_Brix,
CASE WHEN verifikasi_detil.id_material="M030" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS A_Massecuite_Polarization,
CASE WHEN verifikasi_detil.id_material="M030" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS A_Massecuite_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M030" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS A_Massecuite_No_Strike,
CASE WHEN verifikasi_detil.id_material="M030" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS A_Massecuite_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M030" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS A_Massecuite_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M030" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS A_Massecuite_Volume,
CASE WHEN verifikasi_detil.id_material="M031" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS A_Graining_Brix,
CASE WHEN verifikasi_detil.id_material="M031" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS A_Graining_Polarization,
CASE WHEN verifikasi_detil.id_material="M031" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS A_Graining_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M031" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS A_Graining_No_Strike,
CASE WHEN verifikasi_detil.id_material="M031" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS A_Graining_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M031" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS A_Graining_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M031" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS A_Graining_Volume,
CASE WHEN verifikasi_detil.id_material="M032" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS A_Seed_Brix,
CASE WHEN verifikasi_detil.id_material="M032" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS A_Seed_Polarization,
CASE WHEN verifikasi_detil.id_material="M032" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS A_Seed_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M032" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS A_Seed_No_Strike,
CASE WHEN verifikasi_detil.id_material="M032" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS A_Seed_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M032" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS A_Seed_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M032" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS A_Seed_Volume
FROM
    material_analisa
    INNER JOIN verifikasi_detil 
        ON (material_analisa.id_material = verifikasi_detil.id_material)
    INNER JOIN parameter_analisa 
        ON (parameter_analisa.id_parameter = verifikasi_detil.id_parameter)
        WHERE material_analisa.id_material IN ("M030","M031","M032")
        AND parameter_analisa.id_parameter IN ("P001","P002","P079","P080","P081","P082","P083")
        GROUP BY material_analisa.id_material,parameter_analisa.id_parameter,verifikasi_detil.id_jam
        ORDER BY verifikasi_detil.id_jam,material_analisa.id_material,parameter_analisa.id_parameter
        )AS t GROUP BY t.id_jam;');  
        return $query->result();
    }


    function get_data_t2($date){   
 $query = $this->db->query('SELECT  
 t.id_jam
,t.tanggal,
CASE WHEN MAX(t.B_Graining_Brix)=0 THEN MIN(B_Graining_Brix) ELSE MAX(t.B_Graining_Brix) END AS B_Graining_Brix,
CASE WHEN MAX(t.B_Graining_Polarization)=0 THEN MIN(B_Graining_Polarization) ELSE MAX(t.B_Graining_Polarization) END AS B_Graining_Polarization,
CASE WHEN MAX(t.B_Graining_Time_Strike)=0 THEN MIN(B_Graining_Time_Strike) ELSE MAX(t.B_Graining_Time_Strike) END AS B_Graining_Time_Strike,
CASE WHEN MAX(t.B_Graining_No_Strike)=0 THEN MIN(B_Graining_No_Strike) ELSE MAX(t.B_Graining_No_Strike) END AS B_Graining_No_Strike,
CASE WHEN MAX(t.B_Graining_Pan_Strike)=0 THEN MIN(B_Graining_Pan_Strike) ELSE MAX(t.B_Graining_Pan_Strike) END AS B_Graining_Pan_Strike,
CASE WHEN MAX(t.B_Graining_Boiling_Time)=0 THEN MIN(B_Graining_Boiling_Time) ELSE MAX(t.B_Graining_Boiling_Time) END AS B_Graining_Boiling_Time,
CASE WHEN MAX(t.B_Graining_Volume)=0 THEN MIN(B_Graining_Volume) ELSE MAX(t.B_Graining_Volume) END AS B_Graining_Volume,
CASE WHEN MAX(t.B_Seed_Brix)=0 THEN MIN(B_Seed_Brix) ELSE MAX(t.B_Seed_Brix) END AS B_Seed_Brix,
CASE WHEN MAX(t.B_Seed_Polarization)=0 THEN MIN(B_Seed_Polarization) ELSE MAX(t.B_Seed_Polarization) END AS B_Seed_Polarization,
CASE WHEN MAX(t.B_Seed_Time_Strike)=0 THEN MIN(B_Seed_Time_Strike) ELSE MAX(t.B_Seed_Time_Strike) END AS B_Seed_Time_Strike,
CASE WHEN MAX(t.B_Seed_No_Strike)=0 THEN MIN(B_Seed_No_Strike) ELSE MAX(t.B_Seed_No_Strike) END AS B_Seed_No_Strike,
CASE WHEN MAX(t.B_Seed_Pan_Strike)=0 THEN MIN(B_Seed_Pan_Strike) ELSE MAX(t.B_Seed_Pan_Strike) END AS B_Seed_Pan_Strike,
CASE WHEN MAX(t.B_Seed_Boiling_Time)=0 THEN MIN(B_Seed_Boiling_Time) ELSE MAX(t.B_Seed_Boiling_Time) END AS B_Seed_Boiling_Time,
CASE WHEN MAX(t.B_Seed_Volume)=0 THEN MIN(B_Seed_Volume) ELSE MAX(t.B_Seed_Volume) END AS B_Seed_Volume,
CASE WHEN MAX(t.B_Massecuite_Batch_Pan_Brix)=0 THEN MIN(B_Massecuite_Batch_Pan_Brix) ELSE MAX(t.B_Massecuite_Batch_Pan_Brix) END AS B_Massecuite_Batch_Pan_Brix,
CASE WHEN MAX(t.B_Massecuite_Batch_Pan_Polarization)=0 THEN MIN(B_Massecuite_Batch_Pan_Polarization) ELSE MAX(t.B_Massecuite_Batch_Pan_Polarization) END AS B_Massecuite_Batch_Pan_Polarization,
CASE WHEN MAX(t.B_Massecuite_Batch_Pan_Time_Strike)=0 THEN MIN(B_Massecuite_Batch_Pan_Time_Strike) ELSE MAX(t.B_Massecuite_Batch_Pan_Time_Strike) END AS B_Massecuite_Batch_Pan_Time_Strike,
CASE WHEN MAX(t.B_Massecuite_Batch_Pan_No_Strike)=0 THEN MIN(B_Massecuite_Batch_Pan_No_Strike) ELSE MAX(t.B_Massecuite_Batch_Pan_No_Strike) END AS B_Massecuite_Batch_Pan_No_Strike,
CASE WHEN MAX(t.B_Massecuite_Batch_Pan_Pan_Strike)=0 THEN MIN(B_Massecuite_Batch_Pan_Pan_Strike) ELSE MAX(t.B_Massecuite_Batch_Pan_Pan_Strike) END AS B_Massecuite_Batch_Pan_Pan_Strike,
CASE WHEN MAX(t.B_Massecuite_Batch_Pan_Boiling_Time)=0 THEN MIN(B_Massecuite_Batch_Pan_Boiling_Time) ELSE MAX(t.B_Massecuite_Batch_Pan_Boiling_Time) END AS B_Massecuite_Batch_Pan_Boiling_Time,
CASE WHEN MAX(t.B_Massecuite_Batch_Pan_Volume)=0 THEN MIN(B_Massecuite_Batch_Pan_Volume) ELSE MAX(t.B_Massecuite_Batch_Pan_Volume) END AS B_Massecuite_Batch_Pan_Volume
 FROM(
SELECT
    material_analisa.id_material
    , verifikasi_detil.id_material AS matr
    , verifikasi_detil.id_parameter AS prmt
    , parameter_analisa.id_parameter
    , verifikasi_detil.id_jam
    , verifikasi_detil.tanggal
    , verifikasi_detil.hasil,
CASE WHEN verifikasi_detil.id_material="M033" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS B_Graining_Brix,
CASE WHEN verifikasi_detil.id_material="M033" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS B_Graining_Polarization,
CASE WHEN verifikasi_detil.id_material="M033" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS B_Graining_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M033" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS B_Graining_No_Strike,
CASE WHEN verifikasi_detil.id_material="M033" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS B_Graining_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M033" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS B_Graining_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M033" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS B_Graining_Volume,
CASE WHEN verifikasi_detil.id_material="M034" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS B_Seed_Brix,
CASE WHEN verifikasi_detil.id_material="M034" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS B_Seed_Polarization,
CASE WHEN verifikasi_detil.id_material="M034" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS B_Seed_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M034" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS B_Seed_No_Strike,
CASE WHEN verifikasi_detil.id_material="M034" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS B_Seed_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M034" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS B_Seed_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M034" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS B_Seed_Volume,
CASE WHEN verifikasi_detil.id_material="M035" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS B_Massecuite_Batch_Pan_Brix,
CASE WHEN verifikasi_detil.id_material="M035" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS B_Massecuite_Batch_Pan_Polarization,
CASE WHEN verifikasi_detil.id_material="M035" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS B_Massecuite_Batch_Pan_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M035" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS B_Massecuite_Batch_Pan_No_Strike,
CASE WHEN verifikasi_detil.id_material="M035" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS B_Massecuite_Batch_Pan_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M035" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS B_Massecuite_Batch_Pan_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M035" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS B_Massecuite_Batch_Pan_Volume 
FROM
    material_analisa
    INNER JOIN verifikasi_detil 
        ON (material_analisa.id_material = verifikasi_detil.id_material)
    INNER JOIN parameter_analisa 
        ON (parameter_analisa.id_parameter = verifikasi_detil.id_parameter)
        WHERE material_analisa.id_material IN ( "M033","M034","M035")
        AND parameter_analisa.id_parameter IN ("P001","P002","P079","P080","P081","P082","P083")
        GROUP BY material_analisa.id_material,parameter_analisa.id_parameter,verifikasi_detil.id_jam
        ORDER BY verifikasi_detil.id_jam,material_analisa.id_material,parameter_analisa.id_parameter
        )AS t GROUP BY t.id_jam;');  
        return $query->result();
    }

      function get_data_t3($date){   
 $query = $this->db->query('SELECT  
 t.id_jam
,t.tanggal,
CASE WHEN MAX(t.C_Graining_Brix)=0 THEN MIN(C_Graining_Brix) ELSE MAX(t.C_Graining_Brix) END AS C_Graining_Brix,
CASE WHEN MAX(t.C_Graining_Polarization)=0 THEN MIN(C_Graining_Polarization) ELSE MAX(t.C_Graining_Polarization) END AS C_Graining_Polarization,
CASE WHEN MAX(t.C_Graining_Time_Strike)=0 THEN MIN(C_Graining_Time_Strike) ELSE MAX(t.C_Graining_Time_Strike) END AS C_Graining_Time_Strike,
CASE WHEN MAX(t.C_Graining_No_Strike)=0 THEN MIN(C_Graining_No_Strike) ELSE MAX(t.C_Graining_No_Strike) END AS C_Graining_No_Strike,
CASE WHEN MAX(t.C_Graining_Pan_Strike)=0 THEN MIN(C_Graining_Pan_Strike) ELSE MAX(t.C_Graining_Pan_Strike) END AS C_Graining_Pan_Strike,
CASE WHEN MAX(t.C_Graining_Boiling_Time)=0 THEN MIN(C_Graining_Boiling_Time) ELSE MAX(t.C_Graining_Boiling_Time) END AS C_Graining_Boiling_Time,
CASE WHEN MAX(t.C_Graining_Volume)=0 THEN MIN(C_Graining_Volume) ELSE MAX(t.C_Graining_Volume) END AS C_Graining_Volume,
CASE WHEN MAX(t.C_Seed_Brix)=0 THEN MIN(C_Seed_Brix) ELSE MAX(t.C_Seed_Brix) END AS C_Seed_Brix,
CASE WHEN MAX(t.C_Seed_Polarization)=0 THEN MIN(C_Seed_Polarization) ELSE MAX(t.C_Seed_Polarization) END AS C_Seed_Polarization,
CASE WHEN MAX(t.C_Seed_Time_Strike)=0 THEN MIN(C_Seed_Time_Strike) ELSE MAX(t.C_Seed_Time_Strike) END AS C_Seed_Time_Strike,
CASE WHEN MAX(t.C_Seed_No_Strike)=0 THEN MIN(C_Seed_No_Strike) ELSE MAX(t.C_Seed_No_Strike) END AS C_Seed_No_Strike,
CASE WHEN MAX(t.C_Seed_Pan_Strike)=0 THEN MIN(C_Seed_Pan_Strike) ELSE MAX(t.C_Seed_Pan_Strike) END AS C_Seed_Pan_Strike,
CASE WHEN MAX(t.C_Seed_Boiling_Time)=0 THEN MIN(C_Seed_Boiling_Time) ELSE MAX(t.C_Seed_Boiling_Time) END AS C_Seed_Boiling_Time,
CASE WHEN MAX(t.C_Seed_Volume)=0 THEN MIN(C_Seed_Volume) ELSE MAX(t.C_Seed_Volume) END AS C_Seed_Volume,
CASE WHEN MAX(t.C_Massecuite_Batch_Pan_Brix)=0 THEN MIN(C_Massecuite_Batch_Pan_Brix) ELSE MAX(t.C_Massecuite_Batch_Pan_Brix) END AS C_Massecuite_Batch_Pan_Brix,
CASE WHEN MAX(t.C_Massecuite_Batch_Pan_Polarization)=0 THEN MIN(C_Massecuite_Batch_Pan_Polarization) ELSE MAX(t.C_Massecuite_Batch_Pan_Polarization) END AS C_Massecuite_Batch_Pan_Polarization,
CASE WHEN MAX(t.C_Massecuite_Batch_Pan_Time_Strike)=0 THEN MIN(C_Massecuite_Batch_Pan_Time_Strike) ELSE MAX(t.C_Massecuite_Batch_Pan_Time_Strike) END AS C_Massecuite_Batch_Pan_Time_Strike,
CASE WHEN MAX(t.C_Massecuite_Batch_Pan_No_Strike)=0 THEN MIN(C_Massecuite_Batch_Pan_No_Strike) ELSE MAX(t.C_Massecuite_Batch_Pan_No_Strike) END AS C_Massecuite_Batch_Pan_No_Strike,
CASE WHEN MAX(t.C_Massecuite_Batch_Pan_Pan_Strike)=0 THEN MIN(C_Massecuite_Batch_Pan_Pan_Strike) ELSE MAX(t.C_Massecuite_Batch_Pan_Pan_Strike) END AS C_Massecuite_Batch_Pan_Pan_Strike,
CASE WHEN MAX(t.C_Massecuite_Batch_Pan_Boiling_Time)=0 THEN MIN(C_Massecuite_Batch_Pan_Boiling_Time) ELSE MAX(t.C_Massecuite_Batch_Pan_Boiling_Time) END AS C_Massecuite_Batch_Pan_Boiling_Time,
CASE WHEN MAX(t.C_Massecuite_Batch_Pan_Volume)=0 THEN MIN(C_Massecuite_Batch_Pan_Volume) ELSE MAX(t.C_Massecuite_Batch_Pan_Volume) END AS C_Massecuite_Batch_Pan_Volume
 FROM(
SELECT
    material_analisa.id_material
    , verifikasi_detil.id_material AS matr
    , verifikasi_detil.id_parameter AS prmt
    , parameter_analisa.id_parameter
    , verifikasi_detil.id_jam
    , verifikasi_detil.tanggal
    , verifikasi_detil.hasil,
CASE WHEN verifikasi_detil.id_material="M036" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS C_Graining_Brix,
CASE WHEN verifikasi_detil.id_material="M036" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS C_Graining_Polarization,
CASE WHEN verifikasi_detil.id_material="M036" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS C_Graining_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M036" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS C_Graining_No_Strike,
CASE WHEN verifikasi_detil.id_material="M036" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS C_Graining_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M036" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS C_Graining_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M036" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS C_Graining_Volume,
CASE WHEN verifikasi_detil.id_material="M037" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS C_Seed_Brix,
CASE WHEN verifikasi_detil.id_material="M037" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS C_Seed_Polarization,
CASE WHEN verifikasi_detil.id_material="M037" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS C_Seed_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M037" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS C_Seed_No_Strike,
CASE WHEN verifikasi_detil.id_material="M037" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS C_Seed_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M037" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS C_Seed_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M037" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS C_Seed_Volume,
CASE WHEN verifikasi_detil.id_material="M038" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS C_Massecuite_Batch_Pan_Brix,
CASE WHEN verifikasi_detil.id_material="M038" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS C_Massecuite_Batch_Pan_Polarization,
CASE WHEN verifikasi_detil.id_material="M038" AND verifikasi_detil.id_parameter="P079" THEN  hasil ELSE 0 END AS C_Massecuite_Batch_Pan_Time_Strike,
CASE WHEN verifikasi_detil.id_material="M038" AND verifikasi_detil.id_parameter="P080" THEN  hasil ELSE 0 END AS C_Massecuite_Batch_Pan_No_Strike,
CASE WHEN verifikasi_detil.id_material="M038" AND verifikasi_detil.id_parameter="P081" THEN  hasil ELSE 0 END AS C_Massecuite_Batch_Pan_Pan_Strike,
CASE WHEN verifikasi_detil.id_material="M038" AND verifikasi_detil.id_parameter="P082" THEN  hasil ELSE 0 END AS C_Massecuite_Batch_Pan_Boiling_Time,
CASE WHEN verifikasi_detil.id_material="M038" AND verifikasi_detil.id_parameter="P083" THEN  hasil ELSE 0 END AS C_Massecuite_Batch_Pan_Volume
FROM
    material_analisa
    INNER JOIN verifikasi_detil 
        ON (material_analisa.id_material = verifikasi_detil.id_material)
    INNER JOIN parameter_analisa 
        ON (parameter_analisa.id_parameter = verifikasi_detil.id_parameter)
        WHERE material_analisa.id_material IN ("M036","M037","M038")
        AND parameter_analisa.id_parameter IN ("P001","P002","P079","P080","P081","P082","P083")
        GROUP BY material_analisa.id_material,parameter_analisa.id_parameter,verifikasi_detil.id_jam
        ORDER BY verifikasi_detil.id_jam,material_analisa.id_material,parameter_analisa.id_parameter
        )AS t GROUP BY t.id_jam;');  
        return $query->result();
    }

     function get_data_count($date){   
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
                return $query->num_rows();  
        }
            
}
 ?>
