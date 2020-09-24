<?php

  $selectNo = "";
  $selectyes = "";

 ?>
<div class="panel mt-4">
    <div data-role="panel">
    <div class="p-1">
      <button class="button success drop-shadow"  onclick="javascript:createUser()" title='Buat User baru?'> <span class="mif-user-plus"></span> Tambah User</button>
    </div>
    <div class="p-1">
        <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
            <div class="w-100 mb-2 mb-0-lg" id="t1_search"></div>
            <div class="ml-2 mr-2 my-rows-wrapper" id="t1_rows"></div>
            <div class="" id="t1_actions">
                <button class="button square" onclick="$('#t1').data('table').toggleInspector()"><span class="mif-cog"></span></button>
            </div>
        </div>
         <table id="t1" class="table table-border cell-border row-border row-hover "
            data-role="table"
            data-show-activity="false"
            data-rownum="true"
            data-search-wrapper="#t1_search"
            data-rows-wrapper="#t1_rows"
            data-view-save-mode="client"
            data-view-save-path="TABLE:$1:KEYS"
         >
         <thead>
    		<tr >
          <th class="w-10">ID LOGIN</th>
					<th class='w-25' >NAMA</th>
					<th class='w-25'>RUANG KERJA</th>
          <th width='10%'>GENDER</th>
          <th width='20%'>DIPAKAI</th>
					<th width='5%'>AKTIF</th>
					<th width='5%'></th>
    		</tr>
    	</thead>
      <tbody>
        <?php
          foreach($user as $val){

              $id = $val->id;

              $gender = $val->gender;

              if($gender = 'L'){
                $gender = "Laki-laki";
              }else{
                $gender = "Perempuan";
              }

              $hapus = "<button class='button alert cycle mif-user-minus outline' onclick=\"javascript:hapus('$id')\" title='Hapus User'></button>";
  		        $reset = "<button class='button warning cycle mif-key outline' onclick=\"javascript:reset('$id')\" title='Reset Password'></button>";

         ?>
          <tr class="row" >
            <td ><a href="javascript:void(0)" onClick="detil_user('<?=$val->id?>')" title='Lihat detil User'><?=$val->nip?></a></td>
            <td ><?=$val->namalengkap?></td>
            <td ><?=$val->bidang_kerja?></td>
            <td ><?=$gender?></td>
            <td >

            </td>
            <td class="cell">
              <div class="input-control select w-100 align-center">
                <?php
                  $aktif = $val->allow;

                  if ($aktif == 1){
                      $selectyes = "selected";
                      $selectNo = "";
                  }else{
                      $selectNo = "selected";
                      $selectyes = "";
                  }

                ?>
                <select data-role="select" data-on-change="AllowAktif('<?=$id?>')" id='<?="Aktif".$id?>' >
                  <option value="0" <?=$selectNo?>>No</option>
                  <option value="1" <?=$selectyes?>>Yes</option>
                </select>
              </div>
            </td>
            <td align='center'>
              <?=$reset."&nbsp;&nbsp;&nbsp;&nbsp;".$hapus?>
            </td>

          </tr>
         <?php
            };
          ?>

    	</tbody>
        </table>
    </div>
    </div>
</div>
<div class="dialog" data-role="dialog" id="demoDialog1">
    <div class="dialog-title">Use Windows location service?</div>
    <div class="dialog-content">
        Bassus abactors ducunt ad triticum.
        A fraternal form of manifestation is the bliss.
    </div>
    <div class="dialog-actions">
        <button class="button js-dialog-close place-left">Batal</button>
        <button class="button primary js-dialog-close place-right">Simpan</button>
    </div>
</div>
