<?php

  //print_r($this->session->userdata());

  $nama_user = $this->session->userdata('namalengkap');
  $gender = $this->session->userdata('gender');
  $bidang_kerja = $this->session->userdata('bidang_kerja');
  $id = $this->session->userdata('id_user');
  $is_admin = $this->session->userdata('is_admin');
  $user = $this->session->userdata('nip');

  if ($gender == 'L'){
      $img = base_url()."assets/images/users/user.png";
  }else{
      $img = base_url()."assets/images/users/user-woman.png";
  }

  $warning = "";
  if ($this->session->flashdata('change_error'))
  {
    $warning =  $this->session->flashdata('warning');
  }
 ?>

 <div id='page' class='row border-bottom bd-lightGray m-3'
        data-menu= "users"
  data-submenu="profil"
  data-module=""
 >
    <ul class='breadcrumbs bg-transparent'>
            <li class='page-item'><a class='page-link'><span class='mif-user'></span></a></li>
            <li class='page-item'><a class='page-link'>User</a></li>
             <li class='page-item'><a href='javascript:load_page()' class='page-link'>Profil</a></li>
    </ul>
 </div>

<div class="row m-3">
    <div class="cell-lg-4 cell-md-6">
        <div class="bg-white p-4">
            <div class="skill-box mt-4-minus">
                <div class="header border-top border-bottom bd-default">
                    <img src="<?=$img?>" class="avatar">
                    <div class="title"><?=$nama_user?></div>
                    <div class="subtitle"><?=$bidang_kerja?></div>
                </div>
                <ul class="skills">
                    <li>
                        <span>Projects</span>
                        <span class="badge bg-orange fg-white">25</span>
                    </li>
                    <li>
                        <span>Tasks</span>
                        <span class="badge bg-cyan fg-white">5</span>
                    </li>
                    <li>
                        <span>Completed Projects</span>
                        <span class="badge bg-green fg-white">21</span>
                    </li>
                    <li>
                        <span>Followers</span>
                        <span class="badge bg-red fg-white">1024</span>
                    </li>
                </ul>
            </div>
        </div>
        <br>
    </div>
    <div class="cell-lg-8 cell-md-6">
        <div class="bg-white p-4">
            <div class="tabs tabs-wrapper top tabs-expand">
              <div class="expand-title">About</div>
              <ul data-role="tabs" data-expand="sm">
                <li class="active" id='about'><a href="#_target_1">About</a></li>
            </ul>
              <button type="button" class="hamburger menu-down dark"><span class="line"></span><span class="line"></span><span class="line"></span></button>
          </div>
          <div class='frames'>
            <div id="user-profile-tabs-content">
              <div id="profile-about" style="">
              <br>
              <form name='form' id='form-gantipassword'>
              <div class="panel" id="682a6390-6bb1-450b-a00d-21af3e07aa1f">
                <div data-role="panel" data-title-caption="General information" data-title-icon="&lt;span class=&#39;mif-info&#39;&gt;" data-collapsible="true" class="panel-content" data-role-panel="true">
                    <input type="hidden" name='iduser' id='iduser' value="<?=$id?>"/>
                    <input type="hidden" name='user' id='user' value="<?=$user?>"/>
                    <div class="text-bold " >Password Lama</div>
                      <div class="form-group"><input type="password" name="password" id='password' data-role="input" placeholder="Masukan Password Lama" data-validate="required"></div>
                    <div class="text-bold mt-2">Password Baru</div>
                      <div class="form-group"><input type="password" name="passwordbaru" id='passwordbaru' data-role="input" placeholder="Masukan Password Baru" data-validate="required"></div>
                      <div class="form-group"><input type="password" name="passwordbaru2" id='passwordbaru2' data-role="input" placeholder="Konfirmasi Password Baru" data-validate="required"></div>
                    <div class="text-bold mt-2">
                      <div class=" d-flex flex-justify-start flex-align-center p-4 form-group">
                        <button class="button info" id='simpan' >Simpan</button>
                        <button type='reset' class="button dark ml-1" onclick="">Batal</button>
                      </div>
                    </div>
                </div>
                <div class="panel-title"><span class="caption">Ganti Password</span><span class="mif-info icon"></span><span class="dropdown-toggle marker-center active-toggle"></span></div>
              </div>
            </form>
            </div>
            </div>

          </div>

        </div>
    </div>
</div> <!-- div atas-->
<script>

    var baseURL = $('body').data('baseurl');
		var cat = $('body').data('cat');
		var menu = $('#page').data('menu');
		var url_home = baseURL+"home";

    $(document).ready(function(){

      $('#simpan').click(function(){

          var p1 = $('#password').val().trim();
          var p2 = $('#passwordbaru').val().trim();
          var p3 = $('#passwordbaru2').val().trim();

          if ( p1 == '' || p2 == '' || p3 == '' )
				  {
            alert("Jangan ada isian yang kosong!");
            $('#password').focus();
					  return false;
				  }

          if ( p1 ==  p2  )
				  {
					   alert("Password baru tidak boleh sama dengan Password lama");
					   $('#passwordbaru').focus();
					   return false;
				  }

          if ( p2 !==  p3  )
  				{
            alert("Konfirmasi Password baru tidak valid");
  					$('#passwordbaru2').focus();
  					return false;
  				}

          $.ajax({
    					type: 'POST',
    					data: $('#form-gantipassword').serialize(),
    					cache: false,
    					url: baseURL + 'site/gantipassword',
    					success: function(result){
    						var msg = $.trim(result);
    						if (msg == "OK") {
                  alert("Password berhasil diupdate");
    							setTimeout(function(){ $(location).attr('href', url_home)},2000);
    						} else {
    							alert(msg)
    							//setTimeout(function(){ location.reload(true); },3000);
    						}
    					}
				  });

          return false;
      });


    });

</script>
