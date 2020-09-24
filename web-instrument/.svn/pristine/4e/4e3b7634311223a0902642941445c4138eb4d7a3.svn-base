<?php

class Reportdailyfloculant_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();

    }
    
    function get_data($date){   
  $query = $this->db->query('SELECT
   t.id_jam, 
   t.id_parameter,
   t.id_material, 
   t.name , 
   t.urut_floculant,
    CASE WHEN MAX(t.Viscosity)=0 THEN MIN(t.Viscosity) ELSE MAX(t.Viscosity) END AS Viscosity,
  CASE WHEN MAX(t.Temperature)=0 THEN MIN(t.Temperature) ELSE MAX(t.Temperature) END AS Temperature,
  CASE WHEN MAX(t.WR)=0 THEN MIN(t.WR) ELSE MAX(t.WR) END AS WR,
  CASE WHEN MAX(t.OV)=0 THEN MIN(t.OV) ELSE MAX(t.OV) END AS OV,
  CASE WHEN MAX(t.Beume)=0 THEN MIN(t.Beume) ELSE MAX(t.Beume) END AS Beume,
  CASE WHEN MAX(t.Calcium_Oxide_Content)=0 THEN MIN(t.Calcium_Oxide_Content) ELSE MAX(t.Calcium_Oxide_Content) END AS Calcium_Oxide_Content
  FROM(
  SELECT verifikasi_detil.id_jam, 
   verifikasi_detil.id_parameter,
   material_analisa.id_material, 
   material_analisa.name , 
   verifikasi_detil.hasil  ,
   material_analisa.urut_floculant,
  CASE WHEN verifikasi_detil.id_parameter="P025" THEN  hasil ELSE 0 END AS Viscosity,
  CASE WHEN verifikasi_detil.id_parameter="P027" THEN  hasil ELSE 0 END AS Temperature,
  CASE WHEN verifikasi_detil.id_parameter="P087" THEN  hasil ELSE 0 END AS WR,
  CASE WHEN verifikasi_detil.id_parameter="P088" THEN  hasil ELSE 0 END AS OV ,
  CASE WHEN verifikasi_detil.id_parameter="P076" THEN  hasil ELSE 0 END AS Beume,
  CASE WHEN verifikasi_detil.id_parameter="P012" THEN  hasil ELSE 0 END AS Calcium_Oxide_Content 
   FROM verifikasi_detil  
   INNER JOIN material_analisa 
   ON material_analisa.id_material = verifikasi_detil.id_material
    WHERE  verifikasi_detil.tanggal="'.$date.'" AND param="floculant"  
    ORDER BY verifikasi_detil.id_jam  ASC
    ) AS t GROUP BY t.id_jam ,t.id_material
    ORDER BY t.id_jam,t.urut_floculant');  
        return $query->result();
    }

 function get_data_avg($date){   
  $query = $this->db->query(' SELECT 
  a.id_jam, 
   a.id_parameter,
   a.id_material, 
   a.name ,
   AVG(a.Calcium_Oxide_Content) AS Calcium_Oxide_Content ,
    AVG(a.Viscosity) AS Viscosity,
    AVG(a.Temperature) AS Temperature,
    AVG(a.Beume) AS Beume,
    AVG(a.WR)AS WR,
    AVG(a.OV) AS OV
    FROM(
    SELECT
   t.id_jam, 
   t.id_parameter,
   t.id_material, 
   t.name , 
   t.urut_floculant,
  CASE WHEN MAX(t.Calcium_Oxide_Content)=0 THEN MIN(t.Calcium_Oxide_Content) ELSE MAX(t.Calcium_Oxide_Content) END AS Calcium_Oxide_Content,
  CASE WHEN MAX(t.Viscosity)=0 THEN MIN(t.Viscosity) ELSE MAX(t.Viscosity) END AS Viscosity,
  CASE WHEN MAX(t.Temperature)=0 THEN MIN(t.Temperature) ELSE MAX(t.Temperature) END AS Temperature,
  CASE WHEN MAX(t.Beume)=0 THEN MIN(t.Beume) ELSE MAX(t.Beume) END AS Beume,
  CASE WHEN MAX(t.WR)=0 THEN MIN(t.WR) ELSE MAX(t.WR) END AS WR,
  CASE WHEN MAX(t.OV)=0 THEN MIN(t.OV) ELSE MAX(t.OV) END AS OV
  FROM(
  SELECT verifikasi_detil.id_jam, 
   verifikasi_detil.id_parameter,
   material_analisa.id_material, 
   material_analisa.name , 
   verifikasi_detil.hasil  ,
   material_analisa.urut_floculant,
  CASE WHEN verifikasi_detil.id_parameter="P025" THEN  hasil ELSE 0 END AS Viscosity,
  CASE WHEN verifikasi_detil.id_parameter="P027" THEN  hasil ELSE 0 END AS Temperature,
  CASE WHEN verifikasi_detil.id_parameter="P087" THEN  hasil ELSE 0 END AS WR,
  CASE WHEN verifikasi_detil.id_parameter="P088" THEN  hasil ELSE 0 END AS OV ,
  CASE WHEN verifikasi_detil.id_parameter="P076" THEN  hasil ELSE 0 END AS Beume,
  CASE WHEN verifikasi_detil.id_parameter="P012" THEN  hasil ELSE 0 END AS Calcium_Oxide_Content 
   FROM verifikasi_detil 
   INNER JOIN material_analisa 
   ON material_analisa.id_material = verifikasi_detil.id_material
    WHERE  verifikasi_detil.tanggal="'.$date.'" AND param="floculant"  
    ORDER BY verifikasi_detil.id_jam  ASC
    ) AS t GROUP BY t.id_jam ,t.id_material
    ORDER BY t.id_jam,t.urut_floculant
    ) AS a GROUP BY a.id_material
    ORDER BY a.urut_floculant
    ');  
        return $query->result();
    }
 

     function get_data_count($date){   
                $query = $this->db->query(" SELECT verifikasi_detil.*,
 material_analisa.name , 
 verifikasi_detil.hasil  
 FROM verifikasi_detil 
 INNER JOIN material_analisa 
 ON material_analisa.id_material = verifikasi_detil.id_material
  WHERE  verifikasi_detil.tanggal = '".$date."' AND param='floculant'  
  GROUP BY id_jam"); 
                return $query->num_rows();  
        }
            
}
 ?>
