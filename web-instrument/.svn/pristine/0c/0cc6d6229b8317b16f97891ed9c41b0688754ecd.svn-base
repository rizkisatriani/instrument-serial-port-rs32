<?php
  $SELECT = "";
  foreach ($menu as $key) {
    $id = $key->id;
    $SELECT .= "<option value='$id' class='fg-cyan'>".$key->desc."</option>";
  }
 ?>
<div class="panel mt-4">
    <div data-role="panel">
      <div class="p-1">
        <div class="row mb-2">
          <label class="cell-sm-2">MENU APLIKASI</label>
          <div class="cell-sm-8">
            <select id='menus' data-role="select" class="w-100" data-on-change="ShowSubmenu()">
              <option value="0" class="fg-cyan">--PILIH MENU--</option>
              <?=$SELECT?>
            </select>
          </div>
          <div class="cell-sm-2">
            <button class='button info'><span class='mif-add'></span>Tambah Menu</button>
          </div>
        </div>
      </div>
      <div class="p-1">
        <div id="showSubmenu"></div>
      </div>
    </div>
</div>
<script>

$(document).ready(function(){

  //ShowSubmenu();

});

</script>
