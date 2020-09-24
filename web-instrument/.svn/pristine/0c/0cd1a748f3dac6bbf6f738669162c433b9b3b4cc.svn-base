<?php

//print_r($this->db->last_query());
$TBODY = "";
$menu = array();
$disable = "";
$c_create = "";
$c_update = "";
$c_delete = "";

if($USER['is_admin']){
	$disable = "disabled";
}

$id_user = $USER['id'];

foreach ($hak_modul as $arraymodule)
{
	$menu[$arraymodule[0]] = $arraymodule[1];

	$submenu[$arraymodule[0]][$arraymodule[2]] = array($arraymodule[3],$arraymodule[4]);

	$module[$arraymodule[2]][$arraymodule[5]] = array($arraymodule[6],$arraymodule[7],$arraymodule[8],$arraymodule[9],$arraymodule[10],$arraymodule[11]);

}

foreach ($menu as $keymenu => $valmenu)
{
	//$NAVBAR .= "<li class='item-header'>$valmenu</li>";
	$TBODY .= "<tr>
							<td colspan=6 class='alert'><b>$valmenu</b></td>
						</tr>";

    $num_submenu = count($submenu[$keymenu]);

    if ($num_submenu){

        foreach($submenu[$keymenu] as $arrsubmenu => $valsubmenu)
        {
							$TBODY .= "<tr>
											<td colspan=2 class='success'><b>&bull;&nbsp;</small>$valsubmenu[0]</small></b></td>
										</tr>";

              foreach ( $module[$arrsubmenu] as $arrmodul => $valmodul){

								$moduleid = $valmodul[2];
								$create = $valmodul[3];
								$update = $valmodul[4];
								$delete = $valmodul[5];

								if ($create){ $c_create="checked"; }else{ $c_create=""; };
								if ($update){ $c_update="checked"; }else{ $c_update=""; };
								if ($delete){ $c_delete="checked"; }else{ $c_delete=""; };

                $TBODY .= "<tr>
                            <td><small></small></td>
                            <td><small>$valmodul[0]</small></td>
														<td align='center'>
															<input type='checkbox' class='place-left' data-role='checkbox' id='C$moduleid' onClick='ubahAksesModule(\"C\",\"$moduleid\",\"$id_user\")' $c_create  $disable>
														</td>
														<td align='center'>
															<input type='checkbox' class='place-left' data-role='checkbox' id='U$moduleid' onClick='ubahAksesModule(\"U\",\"$moduleid\",\"$id_user\")' $c_update  $disable>
														</td>
                            <td align='center'>
															<input type='checkbox' class='place-left' data-role='checkbox' id='D$moduleid' onClick='ubahAksesModule(\"D\",\"$moduleid\",\"$id_user\")' $c_delete $disable>
														</td>
                            <td align='center'>
															<button class='button primary cycle small outline mif-cross $disable' onClick='hapushakmodul(\"$moduleid\",\"$id_user\")' ></button>
														</td>
                          </tr>";

              }

        }
    }

}


?>
<table class="table compact row-border table-border cell-border">
    <thead>
    <tr>
        <th width=2%>Menu</th>
        <th>Module</th>
				<th width=5% >C</th>
				<th width=5%>U</th>
        <th width=5%>D</th>
        <th width=5%></th>
    </tr>
    </thead>
    <tbody>
        <?=$TBODY?>
    </tbody>
</table>
