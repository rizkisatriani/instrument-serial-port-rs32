<?php

class Reportdailyclari_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data_t1($date){   
        $query = $this->db->query('SELECT  
t.id_jam
,t.tanggal,
CASE WHEN MAX(t.Clear_Juice_Brix)=0 THEN MIN(t.Clear_Juice_Brix) ELSE MAX(t.Clear_Juice_Brix) END AS Clear_Juice_Brix,
CASE WHEN MAX(t.Clear_Juice_Polarization)=0 THEN MIN(t.Clear_Juice_Polarization) ELSE MAX(t.Clear_Juice_Polarization) END AS Clear_Juice_Polarization,
CASE WHEN MAX(t.Clear_Juice_pH)=0 THEN MIN(t.Clear_Juice_pH) ELSE MAX(t.Clear_Juice_pH) END AS Clear_Juice_pH,
CASE WHEN MAX(t.Clear_Juice_Reducing_Sugar)=0 THEN MIN(t.Clear_Juice_Reducing_Sugar) ELSE MAX(t.Clear_Juice_Reducing_Sugar) END AS Clear_Juice_Reducing_Sugar,
CASE WHEN MAX(t.Clear_Juice_Turbidity)=0 THEN MIN(t.Clear_Juice_Turbidity) ELSE MAX(t.Clear_Juice_Turbidity) END AS Clear_Juice_Turbidity,
CASE WHEN MAX(t.Clear_Juice_Calcium_Oxide_Content)=0 THEN MIN(t.Clear_Juice_Calcium_Oxide_Content) ELSE MAX(t.Clear_Juice_Calcium_Oxide_Content) END AS Clear_Juice_Calcium_Oxide_Content,
CASE WHEN MAX(t.Clear_Juice_Liquid_Colour)=0 THEN MIN(t.Clear_Juice_Liquid_Colour) ELSE MAX(t.Clear_Juice_Liquid_Colour) END AS Clear_Juice_Liquid_Colour,
CASE WHEN MAX(t.Filter_Cake_Polarization)=0 THEN MIN(t.Filter_Cake_Polarization) ELSE MAX(t.Filter_Cake_Polarization) END AS Filter_Cake_Polarization,
CASE WHEN MAX(t.Filter_Cake_Moisture_Content)=0 THEN MIN(t.Filter_Cake_Moisture_Content) ELSE MAX(t.Filter_Cake_Moisture_Content) END AS Filter_Cake_Moisture_Content,
CASE WHEN MAX(t.Raw_Syrup_Brix)=0 THEN MIN(t.Raw_Syrup_Brix) ELSE MAX(t.Raw_Syrup_Brix) END AS Raw_Syrup_Brix,
CASE WHEN MAX(t.Raw_Syrup_Polarization)=0 THEN MIN(t.Raw_Syrup_Polarization) ELSE MAX(t.Raw_Syrup_Polarization) END AS Raw_Syrup_Polarization,
CASE WHEN MAX(t.Raw_Syrup_pH)=0 THEN MIN(t.Raw_Syrup_pH) ELSE MAX(t.Raw_Syrup_pH) END AS Raw_Syrup_pH,
CASE WHEN MAX(t.Raw_Syrup_Phospate_Content_before_dosing)=0 THEN MIN(t.Raw_Syrup_Phospate_Content_before_dosing) ELSE MAX(t.Raw_Syrup_Phospate_Content_before_dosing) END AS Raw_Syrup_Phospate_Content_before_dosing,
CASE WHEN MAX(t.Raw_Syrup_Reducing_Sugar)=0 THEN MIN(t.Raw_Syrup_Reducing_Sugar) ELSE MAX(t.Raw_Syrup_Reducing_Sugar) END AS Raw_Syrup_Reducing_Sugar,
CASE WHEN MAX(t.Raw_Syrup_Calcium_Oxide_Content)=0 THEN MIN(t.Raw_Syrup_Calcium_Oxide_Content) ELSE MAX(t.Raw_Syrup_Calcium_Oxide_Content) END AS Raw_Syrup_Calcium_Oxide_Content,
CASE WHEN MAX(t.Raw_Syrup_Liquid_Colour)=0 THEN MIN(t.Raw_Syrup_Liquid_Colour) ELSE MAX(t.Raw_Syrup_Liquid_Colour) END AS Raw_Syrup_Liquid_Colour
FROM(
SELECT
    material_analisa.id_material
    , verifikasi_detil.id_material AS matr
    , verifikasi_detil.id_parameter AS prmt
    , parameter_analisa.id_parameter
    , verifikasi_detil.id_jam
    , verifikasi_detil.tanggal
    , verifikasi_detil.hasil,
    CASE WHEN verifikasi_detil.id_material="M006" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Clear_Juice_Brix,
CASE WHEN verifikasi_detil.id_material="M006" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Clear_Juice_Polarization,
CASE WHEN verifikasi_detil.id_material="M006" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Clear_Juice_pH, 
CASE WHEN verifikasi_detil.id_material="M006" AND verifikasi_detil.id_parameter="P007" THEN  hasil ELSE 0 END AS Clear_Juice_Reducing_Sugar, 
CASE WHEN verifikasi_detil.id_material="M006" AND verifikasi_detil.id_parameter="P011" THEN  hasil ELSE 0 END AS Clear_Juice_Turbidity,
CASE WHEN verifikasi_detil.id_material="M006" AND verifikasi_detil.id_parameter="P012" THEN  hasil ELSE 0 END AS Clear_Juice_Calcium_Oxide_Content,
CASE WHEN verifikasi_detil.id_material="M006" AND verifikasi_detil.id_parameter="P013" THEN  hasil ELSE 0 END AS Clear_Juice_Liquid_Colour, 
CASE WHEN verifikasi_detil.id_material="M007" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Filter_Cake_Polarization, 
CASE WHEN verifikasi_detil.id_material="M007" AND verifikasi_detil.id_parameter="P008" THEN  hasil ELSE 0 END AS Filter_Cake_Moisture_Content, 
CASE WHEN verifikasi_detil.id_material="M008" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Raw_Syrup_Brix,
CASE WHEN verifikasi_detil.id_material="M008" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Raw_Syrup_Polarization,
CASE WHEN verifikasi_detil.id_material="M008" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Raw_Syrup_pH,
CASE WHEN verifikasi_detil.id_material="M008" AND verifikasi_detil.id_parameter="P006" THEN  hasil ELSE 0 END AS Raw_Syrup_Phospate_Content_before_dosing,
CASE WHEN verifikasi_detil.id_material="M008" AND verifikasi_detil.id_parameter="P007" THEN  hasil ELSE 0 END AS Raw_Syrup_Reducing_Sugar, 
CASE WHEN verifikasi_detil.id_material="M008" AND verifikasi_detil.id_parameter="P012" THEN  hasil ELSE 0 END AS Raw_Syrup_Calcium_Oxide_Content,
CASE WHEN verifikasi_detil.id_material="M008" AND verifikasi_detil.id_parameter="P013" THEN  hasil ELSE 0 END AS Raw_Syrup_Liquid_Colour 
FROM
    material_analisa 
    INNER JOIN verifikasi_detil 
        ON (material_analisa.id_material = verifikasi_detil.id_material)
    INNER JOIN parameter_analisa 
        ON (parameter_analisa.id_parameter = verifikasi_detil.id_parameter)
        WHERE material_analisa.id_material IN ("M006","M007","M008")
        AND parameter_analisa.id_parameter IN ("P001","P002","P003","P006","P007","P008","P011","P012","P013")  
       and  verifikasi_detil.tanggal="'.$date.'"
        GROUP BY material_analisa.id_material,parameter_analisa.id_parameter,verifikasi_detil.id_jam
        ORDER BY verifikasi_detil.id_jam,material_analisa.id_material,parameter_analisa.id_parameter
        )AS t GROUP BY t.id_jam ORDER BY t.id_jam;
        ');  
        return $query->result();
    }



    function get_data_t2($date){   
        $query = $this->db->query('SELECT  
t.id_jam
,t.tanggal,
CASE WHEN MAX(t.Clarified_Syrup_Brix)=0 THEN MIN(t.Clarified_Syrup_Brix) ELSE MAX(t.Clarified_Syrup_Brix) END AS Clarified_Syrup_Brix,
CASE WHEN MAX(t.Clarified_Syrup_Polarization)=0 THEN MIN(t.Clarified_Syrup_Polarization) ELSE MAX(t.Clarified_Syrup_Polarization) END AS Clarified_Syrup_Polarization,
CASE WHEN MAX(t.Clarified_Syrup_pH)=0 THEN MIN(t.Clarified_Syrup_pH) ELSE MAX(t.Clarified_Syrup_pH) END AS Clarified_Syrup_pH,
CASE WHEN MAX(t.Clarified_Syrup_Phospate_Content_before_dosing)=0 THEN MIN(t.Clarified_Syrup_Phospate_Content_before_dosing) ELSE MAX(t.Clarified_Syrup_Phospate_Content_before_dosing) END AS Clarified_Syrup_Phospate_Content_before_dosing,
CASE WHEN MAX(t.Clarified_Syrup_Reducing_Sugar)=0 THEN MIN(t.Clarified_Syrup_Reducing_Sugar) ELSE MAX(t.Clarified_Syrup_Reducing_Sugar) END AS Clarified_Syrup_Reducing_Sugar,
CASE WHEN MAX(t.Clarified_Syrup_Turbidity)=0 THEN MIN(t.Clarified_Syrup_Turbidity) ELSE MAX(t.Clarified_Syrup_Turbidity) END AS Clarified_Syrup_Turbidity,
CASE WHEN MAX(t.Clarified_Syrup_Calcium_Oxide_Content)=0 THEN MIN(t.Clarified_Syrup_Calcium_Oxide_Content) ELSE MAX(t.Clarified_Syrup_Calcium_Oxide_Content) END AS Clarified_Syrup_Calcium_Oxide_Content,
CASE WHEN MAX(t.Clarified_Syrup_Liquid_Colour)=0 THEN MIN(t.Clarified_Syrup_Liquid_Colour) ELSE MAX(t.Clarified_Syrup_Liquid_Colour) END AS Clarified_Syrup_Liquid_Colour,
CASE WHEN MAX(t.Sulphited_Syrup_Brix)=0 THEN MIN(t.Sulphited_Syrup_Brix) ELSE MAX(t.Sulphited_Syrup_Brix) END AS Sulphited_Syrup_Brix,
CASE WHEN MAX(t.Sulphited_Syrup_Polarization)=0 THEN MIN(t.Sulphited_Syrup_Polarization) ELSE MAX(t.Sulphited_Syrup_Polarization) END AS Sulphited_Syrup_Polarization,
CASE WHEN MAX(t.Sulphited_Syrup_pH)=0 THEN MIN(t.Sulphited_Syrup_pH) ELSE MAX(t.Sulphited_Syrup_pH) END AS Sulphited_Syrup_pH,
CASE WHEN MAX(t.Sulphited_Syrup_Liquid_Colour)=0 THEN MIN(t.Sulphited_Syrup_Liquid_Colour) ELSE MAX(t.Sulphited_Syrup_Liquid_Colour) END AS Sulphited_Syrup_Liquid_Colour,
CASE WHEN MAX(t.Limed_Juice_pH)=0 THEN MIN(t.Limed_Juice_pH) ELSE MAX(t.Limed_Juice_pH) END AS Limed_Juice_pH,
CASE WHEN MAX(t.Sulphited_Juice_pH)=0 THEN MIN(t.Sulphited_Juice_pH) ELSE MAX(t.Sulphited_Juice_pH) END AS Sulphited_Juice_pH,
CASE WHEN MAX(t.Final_Reaction_pH)=0 THEN MIN(t.Final_Reaction_pH) ELSE MAX(t.Final_Reaction_pH) END AS Final_Reaction_pH,
CASE WHEN MAX(t.Melting_pH)=0 THEN MIN(t.Melting_pH) ELSE MAX(t.Melting_pH) END AS Melting_pH
FROM(
SELECT
    material_analisa.id_material
    , verifikasi_detil.id_material AS matr
    , verifikasi_detil.id_parameter AS prmt
    , parameter_analisa.id_parameter
    , verifikasi_detil.id_jam
    , verifikasi_detil.tanggal
    , verifikasi_detil.hasil,
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Clarified_Syrup_Brix,
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Clarified_Syrup_Polarization,
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Clarified_Syrup_pH,
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P006" THEN  hasil ELSE 0 END AS Clarified_Syrup_Phospate_Content_before_dosing,
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P007" THEN  hasil ELSE 0 END AS Clarified_Syrup_Reducing_Sugar, 
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P011" THEN  hasil ELSE 0 END AS Clarified_Syrup_Turbidity,
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P012" THEN  hasil ELSE 0 END AS Clarified_Syrup_Calcium_Oxide_Content,
CASE WHEN verifikasi_detil.id_material="M009" AND verifikasi_detil.id_parameter="P013" THEN  hasil ELSE 0 END AS Clarified_Syrup_Liquid_Colour,
CASE WHEN verifikasi_detil.id_material="M010" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Sulphited_Syrup_Brix,
CASE WHEN verifikasi_detil.id_material="M010" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Sulphited_Syrup_Polarization,
CASE WHEN verifikasi_detil.id_material="M010" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Sulphited_Syrup_pH, 
CASE WHEN verifikasi_detil.id_material="M010" AND verifikasi_detil.id_parameter="P013" THEN  hasil ELSE 0 END AS Sulphited_Syrup_Liquid_Colour, 
CASE WHEN verifikasi_detil.id_material="M147" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Limed_Juice_pH,  
CASE WHEN verifikasi_detil.id_material="M148" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Sulphited_Juice_pH,  
CASE WHEN verifikasi_detil.id_material="M149" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Final_Reaction_pH,  
CASE WHEN verifikasi_detil.id_material="M150" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Melting_pH
FROM
    material_analisa 
    INNER JOIN verifikasi_detil 
        ON (material_analisa.id_material = verifikasi_detil.id_material)
    INNER JOIN parameter_analisa 
        ON (parameter_analisa.id_parameter = verifikasi_detil.id_parameter)
        WHERE material_analisa.id_material IN ("M009","M010","M147","M148","M149","M150")
        AND parameter_analisa.id_parameter IN ("P001","P002","P003","P006","P007","P008","P011","P012","P013")  
        and  verifikasi_detil.tanggal="'.$date.'"
        GROUP BY material_analisa.id_material,parameter_analisa.id_parameter,verifikasi_detil.id_jam
        ORDER BY verifikasi_detil.id_jam,material_analisa.id_material,parameter_analisa.id_parameter
        )AS t GROUP BY t.id_jam ORDER BY t.id_jam;');  
        return $query->result();
    }
 
 function get_data_t3($date){   
        $query = $this->db->query('SELECT  
t.id_jam
,t.tanggal,
CASE WHEN MAX(t.Mud_Brix)=0 THEN MIN(t.Mud_Brix) ELSE MAX(t.Mud_Brix) END AS Mud_Brix,
CASE WHEN MAX(t.Mud_Polarization)=0 THEN MIN(t.Mud_Polarization) ELSE MAX(t.Mud_Polarization) END AS Mud_Polarization,
CASE WHEN MAX(t.Mud_pH)=0 THEN MIN(t.Mud_pH) ELSE MAX(t.Mud_pH) END AS Mud_pH, 
CASE WHEN MAX(t.Heavy_Filtrate_Brix)=0 THEN MIN(t.Heavy_Filtrate_Brix) ELSE MAX(t.Heavy_Filtrate_Brix) END AS Heavy_Filtrate_Brix,
CASE WHEN MAX(t.Heavy_Filtrate_Polarization)=0 THEN MIN(t.Heavy_Filtrate_Polarization) ELSE MAX(t.Heavy_Filtrate_Polarization) END AS Heavy_Filtrate_Polarization,
CASE WHEN MAX(t.Heavy_Filtrate_pH)=0 THEN MIN(t.Heavy_Filtrate_pH) ELSE MAX(t.Heavy_Filtrate_pH) END AS Heavy_Filtrate_pH, 
CASE WHEN MAX(t.Light_Filtrate_Brix)=0 THEN MIN(t.Light_Filtrate_Brix) ELSE MAX(t.Light_Filtrate_Brix) END AS Light_Filtrate_Brix,
CASE WHEN MAX(t.Light_Filtrate_Polarization)=0 THEN MIN(t.Light_Filtrate_Polarization) ELSE MAX(t.Light_Filtrate_Polarization) END AS Light_Filtrate_Polarization,
CASE WHEN MAX(t.Light_Filtrate_pH)=0 THEN MIN(t.Light_Filtrate_pH) ELSE MAX(t.Light_Filtrate_pH) END AS Light_Filtrate_pH, 
CASE WHEN MAX(t.Scum_Brix)=0 THEN MIN(t.Scum_Brix) ELSE MAX(t.Scum_Brix) END AS Scum_Brix,
CASE WHEN MAX(t.Scum_Polarization)=0 THEN MIN(t.Scum_Polarization) ELSE MAX(t.Scum_Polarization) END AS Scum_Polarization,
CASE WHEN MAX(t.Scum_pH)=0 THEN MIN(t.Scum_pH) ELSE MAX(t.Scum_pH) END AS Scum_pH, 
CASE WHEN MAX(t.Saccharate_Lime_pH)=0 THEN MIN(t.Saccharate_Lime_pH) ELSE MAX(t.Saccharate_Lime_pH) END AS Saccharate_Lime_pH,
CASE WHEN MAX(t.Saccharate_Lime_Beume)=0 THEN MIN(t.Saccharate_Lime_Beume) ELSE MAX(t.Saccharate_Lime_Beume) END AS Saccharate_Lime_Beume
FROM(
SELECT
    material_analisa.id_material
    , verifikasi_detil.id_material AS matr
    , verifikasi_detil.id_parameter AS prmt
    , parameter_analisa.id_parameter
    , verifikasi_detil.id_jam
    , verifikasi_detil.tanggal
    , verifikasi_detil.hasil,
CASE WHEN verifikasi_detil.id_material="M011" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Mud_Brix,
CASE WHEN verifikasi_detil.id_material="M011" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Mud_Polarization,
CASE WHEN verifikasi_detil.id_material="M011" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Mud_pH, 
CASE WHEN verifikasi_detil.id_material="M012" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Heavy_Filtrate_Brix,
CASE WHEN verifikasi_detil.id_material="M012" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Heavy_Filtrate_Polarization,
CASE WHEN verifikasi_detil.id_material="M012" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Heavy_Filtrate_pH, 
CASE WHEN verifikasi_detil.id_material="M013" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Light_Filtrate_Brix,
CASE WHEN verifikasi_detil.id_material="M013" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Light_Filtrate_Polarization,
CASE WHEN verifikasi_detil.id_material="M013" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Light_Filtrate_pH, 
CASE WHEN verifikasi_detil.id_material="M014" AND verifikasi_detil.id_parameter="P001" THEN  hasil ELSE 0 END AS Scum_Brix,
CASE WHEN verifikasi_detil.id_material="M014" AND verifikasi_detil.id_parameter="P002" THEN  hasil ELSE 0 END AS Scum_Polarization,
CASE WHEN verifikasi_detil.id_material="M014" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Scum_pH,  
CASE WHEN verifikasi_detil.id_material="M151" AND verifikasi_detil.id_parameter="P003" THEN  hasil ELSE 0 END AS Saccharate_Lime_pH,
CASE WHEN verifikasi_detil.id_material="M151" AND verifikasi_detil.id_parameter="P076" THEN  hasil ELSE 0 END AS Saccharate_Lime_Beume
FROM
    material_analisa 
    INNER JOIN verifikasi_detil 
        ON (material_analisa.id_material = verifikasi_detil.id_material)
    INNER JOIN parameter_analisa 
        ON (parameter_analisa.id_parameter = verifikasi_detil.id_parameter)
        WHERE material_analisa.id_material IN ( "M011","M012","M013","M014","M151")
        AND parameter_analisa.id_parameter IN ("P001","P002","P003","P076")  
        and  verifikasi_detil.tanggal="'.$date.'"
        GROUP BY material_analisa.id_material,parameter_analisa.id_parameter,verifikasi_detil.id_jam
        ORDER BY verifikasi_detil.id_jam,material_analisa.id_material,parameter_analisa.id_parameter
        )AS t GROUP BY t.id_jam ORDER BY t.id_jam;');  
        return $query->result();
    }

     function get_data_count($date){   
                $query = $this->db->query(' 
                SELECT verifikasi_detil.id_verifikasi AS id, 
                verifikasi_detil.id_jam AS id_jam 
                FROM  verifikasi_detil
                WHERE verifikasi_detil.id_material IN ( "M011","M012","M013","M014","M151") AND 
                verifikasi_detil.id_material IN ( "M011","M012","M013","M014","M151") and 
                verifikasi_detil.tanggal="'.$date.'" GROUP BY  id_jam'); 
                return $query->num_rows();  
        }    
}
?>
