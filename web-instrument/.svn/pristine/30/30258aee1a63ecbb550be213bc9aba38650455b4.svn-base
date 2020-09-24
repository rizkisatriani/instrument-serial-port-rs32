<?php
  $gender = $USER['gender'];
  $allow = $USER['allow'];
  $id_user = $USER['id'];

  if($allow){
    $allowText = "Yes";
  }else{
    $allowText = "No";
  }

  $bidang_kerja = $USER['bidang_kerja'];

  $is_admin = $USER['is_admin'];

  if($is_admin){
    $adminText = "Yes";
  }else{
    $adminText = "No";
  }

  if ($gender == 'L'){
    $genderText = "Laki-Laki";
  }else{
    $genderText = "Perempuan";
  }

 ?>
<div id="user-profile-tabs-content">
  <div id="profile-about" style="">
  <input type="hidden" id='id_user' value="<?=$id_user?>">
  <br>
  <div class="panel" id="682a6390-6bb1-450b-a00d-21af3e07aa1f">
    <div data-role="panel" data-title-caption="General information" data-title-icon="&lt;span class=&#39;mif-info&#39;&gt;" data-collapsible="true" class="panel-content detil" data-role-panel="true">
      <div class="text-bold">Gender</div>
      <div class='detil'><?=$genderText?></div>
      <div class="text-bold mt-2">Allow Login</div>
      <div class='detil'><?=$allowText?></div>
      <div class="text-bold mt-2">Bidang Kerja</div>
      <div class='detil'><?=$bidang_kerja?></div>
      <div class="text-bold mt-2">Administrator</div>
      <div class='detil'><?=$adminText?></div>
      <div class="text-bold mt-2 ">
        <button class="button warning" id='edit' >
          <span class="mif-pencil icon"></span>
          <span class="caption">Edit</span>
        </button>
      </div>
    </div>

    <div data-role="panel" data-title-caption="General information" data-title-icon="&lt;span class=&#39;mif-info&#39;&gt;" data-collapsible="true" class="panel-content edit" data-role-panel="true">
      <div class="text-bold edit">Gender</div>
      <div class="edit">
        <select data-role="select" id='gender' >
          <option value="L" >Laki-Laki</option>
          <option value="P" >Perempuan</option>
        </select>
      </div >
      <div class="text-bold mt-2">Allow Login</div>
      <div class="edit">
        <select data-role="select" id='allow' >
          <option value="0" >No</option>
          <option value="1" >Yes</option>
        </select>
      </div>
      <div class="text-bold mt-2">Bidang Kerja</div>
      <div class="edit">
        <select data-role="select" id='bidang_kerja'>
          <option value="Operator">Operator</option>
          <option value="Supervisor">Supervisor</option>
          <option value="Staff">Staff</option>
          <option value="Administrator">Administrator</option>
        </select>
      </div>
      <div class="text-bold mt-2">Administrator</div>
      <div class="edit">
        <select data-role="select" id='is_admin'>
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </div>
      <div class="text-bold mt-2 edit">
        <button class="button info" id='simpan' >
          <span class="mif-checkmark icon"></span>
          <span class="caption">Simpan</span>
        </button>
        <button type='reset' class="button dark ml-1" id='batal'>
          <span class="mif-cross icon"></span>
          <span class="caption">Batal</span>
        </button>
      </div>
    </div>

    <div class="panel-title"><span class="caption">General information</span><span class="mif-info icon"></span><span class="dropdown-toggle marker-center active-toggle"></span></div>
  </div>
</div>
</div>
<script>

$('.edit').hide();

document.getElementById("gender").value = "<?=$gender?>";
document.getElementById("allow").value = "<?=$allow?>";
document.getElementById("bidang_kerja").value = "<?=$bidang_kerja?>";
document.getElementById("is_admin").value = "<?=$is_admin?>";

$(document).ready(function(){



$('#edit').click(function(){
    $('.detil').hide();
    $('.edit').show();
});

$('#batal').click(function(){
    $('.detil').show();
    $('.edit').hide();
});

$('#simpan').click(function(){

  var data = Array();
  var gender = $('#gender').val();
  var allow = $('#allow').val();
  var bidang_kerja = $('#bidang_kerja').val();
  var is_admin = $('#is_admin').val();
  var id_user = $('#id_user').val();

  if (bidang_kerja != "Administrator" && is_admin == '1'){
    alert("Role Admin Hanya Boleh di bidang kerja Administrator");
    return false;
  }

  data = {
    'gender' : gender,
    'allow' : allow,
    'bidang_kerja' : bidang_kerja,
    'is_admin' : is_admin,
    'id_user' : id_user
  }

  $.ajax({
      type: 'POST',
      data,
      cache: false,
      url: baseURL + menu + '/' + submenu + '/' + controller + '/update_detil_user',
      success: function(result){
        var msg = $.trim(result);
        if (msg = 'OK') {
          //showdata_now_module(id_user);
          //showdata_all_module(id_user);
          detil_user( id_user );
        }else{
          alert("Update Gagal");
        }
      }
    });

});


});
</script>
