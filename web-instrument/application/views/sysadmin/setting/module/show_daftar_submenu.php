<?php
$BODY = "";
$urutan = 0;
foreach ($submenu as $val) {

  $id = $val->id;
  $urut = $val->urut;
  $submenuid = $val->name;
  $desc = $val->desc;
  $logo = $val->logo;

  $BODY .= " <tr>
              <td align='center'>$urut</td>
              <td align='left' >
                <span id='toggle_right_mdl$id' class='button bg-white mif-arrow-right' onclick=\"javascript:toggle_module('$id')\"></span>
                <span id='toggle_down_mdl$id' class='button bg-white mif-arrow-down' onclick=\"javascript:toggle_module('$id')\" style='display:none'></span>
                $submenuid</td>
              <td >$desc</td>
              <td align='center' ><span class='$logo'></span></td>
              <td align='center'><span class='button bg-white mif-pencil' onclick=\"javascript:EditSubmenu('$id')\">
                          </span> <span class='button bg-white mif-bin fg-red' onclick=\"javascript:HapusSubmenu('$id')\"></span>
              </td>
            </tr>
            <tr style='display:none;' id='tr_user$id'>
                <td align='center'></td>
                <td align='center' colspan='3'>
                  <div id='td_user$id'></div>
                </td>
                <td align='center'>
                  <button class='button info'><span class='mif-add'></span>ADD MODUL</button>
                </td>
            </tr>

            ";
    $urutan ++;
}

 ?>
 <div class="p-1">
   <button class="button success drop-shadow"  onclick="javascript:CreateSubMenu('<?=$urutan+1?>')" title='Buat User baru?'> <span class="mif-menu"></span> Tambah SubMenu</button>
 </div>
<table class="table compact row-border table-border cell-border">
    <thead>
    <tr class="bg-green">
        <th width=2%>URUT</th>
        <th width=15%>SUBMENU ID</th>
        <th>KETERANGAN SUBMENU</th>
        <th width=5%>LOGO</th>
        <th width=10%>PANEL</th>
    </tr>
    </thead>
    <tbody>
      <?=$BODY?>
    </tbody>
</table>
<script>
	function toggle_module(id) {
		proses = 0
		if($('#tr_user'+id).css('display') == 'none') {
			$('#tr_user'+id).show()
			proses = 1
			$('#toggle_right_mdl'+id).hide()
			$('#toggle_down_mdl'+id).show()
		} else {
			$('#tr_user'+id).hide()
			$('#toggle_right_mdl'+id).show()
			$('#toggle_down_mdl'+id).hide()
		}
		if (proses == 1) {
			xdiv = 'td_user'+id
			data = new Array()
			data[1] = id
			ajax_do_action( 'showmodule', xdiv,data);

      //ajax_cpanel( 'show_user_modul', xdiv, data);
		}
	}
</script>
