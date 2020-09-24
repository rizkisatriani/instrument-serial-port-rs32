<?php

  //print_r($this->db->last_query());

  $id_user = $USER['id'];

  $TBODY = "";

  $arr_menu = array();
  foreach ($daftar_modul as $arraymodule)
	{
			$arr_menu[$arraymodule[0]] = $arraymodule[1];

			$arr_submenu[$arraymodule[0]][$arraymodule[2]] = $arraymodule[3];

			$arr_module[$arraymodule[2]][$arraymodule[6]] = $arraymodule[5];

	}

    $urut = 1;
		$list_menu = '';
		$list_submenu = '';

    foreach ($arr_menu as $keymenu => $valmenu)
		{
			if ($list_menu != $keymenu)
			{
				//$tabelkiri .= "<tr><td align='right'>$urut</td>";
				//$tabelkiri .= "<td colspan=4><b>$valmenu<b></td>";

        $TBODY .= "<tr>
                    <td colspan=6 class='alert'><b>$valmenu</b></td>
                  </tr>";

				$urut++;
				$list_menu = $keymenu;
			}
			foreach($arr_submenu[$keymenu] as $keysubmenu => $valsubmenu)
			{
				$list_submenu =  $keysubmenu ;
				//$ketsubmenu = "&bull;&nbsp;" . $valsubmenu;

        $TBODY .= "<tr>
                <td colspan=2 class='success'><b>&bull;&nbsp;</small>$valsubmenu</small></b></td>
              </tr>";

				foreach ( $arr_module[$keysubmenu] as $keymodul => $valmodul)
				{

					//$tabelkiri .= "<td><small> - " . $valmodul . "</small></td>"; // ketmodul
          $TBODY .= "<tr>
                      <td><small></small></td>
                      <td><small>$valmodul</small></td>

                      <td align='center'>
                        <button class='button primary cycle small outline mif-add' onClick='tambahhakmodul(\"$keymodul\",\"$id_user\")'></button>
                      </td>
                    </tr>";

				}
			}
		}

 ?>


      <table class="table compact row-border table-border cell-border">
          <thead>
          <tr>
              <th width=2%>Menu</th>
              <th>Module</th>
              <th width=5%></th>
          </tr>
          </thead>
          <tbody>
              <?=$TBODY?>
          </tbody>
      </table>
