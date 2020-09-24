<?php

  //print_r($this->db->last_query());

  $nama_user = $user["namalengkap"];
  $gender = $user["gender"];
  $bidang_kerja = $user["bidang_kerja"];
  $id = $user["id"];
  $is_admin = $user['is_admin'];

  if ($gender == 'L'){
      $img = base_url()."assets/images/users/user.png";
  }else{
      $img = base_url()."assets/images/users/user-woman.png";
  }

 ?>
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
                <!--
                <div class="d-flex flex-justify-start flex-align-center p-4">
                    <button class="button info">Follow</button>
                    <button class="button dark ml-1">Message</button>
                    <button class="button square ml-1"><span class="mif-cog"></span></button>
                </div>
              -->
            </div>
        </div>
        <br>
        <div class="bg-white p-4">
            <div id="user-profile-tabs-content">
              <div id="profile-about" style="">
              <br>
              <div class="panel" id="panelCurrentAccess">
                <div data-role="panel" data-title-caption="Now Access" data-title-icon="&lt;span class=&#39;mif-info&#39;&gt;" data-collapsible="true" class="panel-content" data-role-panel="true">
                  <div id='responseNowModule'></div>
                </div>
                <div class="panel-title"><span class="caption">Now Access</span><span class="mif-info icon"></span><span class="dropdown-toggle marker-center active-toggle"></span></div>
              </div>
            </div>
            </div>
        </div>
    </div>
    <div class="cell-lg-8 cell-md-6">
        <div class="bg-white p-4">
            <div class="tabs tabs-wrapper top tabs-expand">
              <div class="expand-title">About</div>
              <ul data-role="tabs" data-expand="sm">
                <li class="active" id='about'><a href="#_target_1">About</a></li>
                <?php
                    if (!$is_admin){
                ?>
                <li id='module'><a href="#_target_2">Module</a></li>
                <?php
                    };
                 ?>
            </ul>
              <button type="button" class="hamburger menu-down dark"><span class="line"></span><span class="line"></span><span class="line"></span></button>
          </div>
          <div class='frames'></div>

        </div>
    </div>
</div> <!-- div atas-->
<script>

  //var baseURL = $('body').data('baseurl');
  //var cat = $('body').data('cat');
  //var menu = $('#page').data('menu');
  //var submenu = $('#page').data('submenu');
  //var module = $('#page').data('module');
  //var module_id = $('#page').data('module_id');
  //var controller = module.capitalize() + "_controller"
  var id = <?=$id?>;

  $(document).ready(function(){

      showdata_now_module(id);
      //console.log(controller);

      var tab_active = $('.tabs-list li').filter('.active').attr('id');

		ajax_load_tab_content(tab_active, id);

      $('.tabs-list li').click(function(){
        var tab_id = $(this).attr('id');
        var data = '$id';
        ajax_load_tab_content(tab_id, id);
      })

  });





</script>
