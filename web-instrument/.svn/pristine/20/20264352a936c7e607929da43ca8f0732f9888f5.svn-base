<?php

  $BODY = "";
  foreach ($module as $val) {
    $id = $val->id;
    $urut = $val->urut;
    $desc = $val->desc;
    $logo = $val->logo;
    $moduleid = $val->name;

    $BODY .= " <tr>
                <td align='center'>$urut</td>
                <td align='left' >
                  <span class='button bg-white mif-user-check'></span>
                  $moduleid</td>
                <td >$desc</td>
                <td align='center' ><span class='$logo'></span></td>
                <td align='center'><span class='button bg-white mif-pencil' onclick=\"javascript:EditModule('$id')\">
                            </span> <span class='button bg-white mif-bin fg-red' onclick=\"javascript:HapusModule('$id','$desc')\"></span>
                </td>
              </tr>";
  }

 ?>
<table class="table compact row-border table-border cell-border">
    <thead>
    <tr class="bg-grayBlue">
        <th width=2%>URUT</th>
        <th width=15%>MODULE ID</th>
        <th>KETERANGAN MODULE</th>
        <th width=5%>LOGO</th>
        <th width=15%>PANEL</th>
    </tr>
    </thead>
    <tbody>
      <?=$BODY?>
    </tbody>
</table>
