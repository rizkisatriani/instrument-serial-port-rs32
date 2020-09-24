<script src="<?php echo base_url(); ?>assets/js/workflowcontroller.js"></script>
<div class="m-3">
  <div class="workflow mt-4" id="actionworkflow"
        data-menu='sysadmin'
        data-submenu='setting'
        data-module='workflow'
  >
    <input type="hidden" id='idrow' />
    <div class="workflow-title border bd-amber ribbed-amber  ">
      <span class="caption">
          <small>
              <i>Sistem Informasi Laboratorium Workflow > <b><?=$module_title?></b> <span id='lastactiontaken'></span></i>
          </small>
      </span>
      <span class="mif-assignment icon"></span>
      <div class="dropdown-button" id='workflowbutton'>
      </div>
    </div>
  </div>
</div>

<!--
<button class="button mini submited bg-white rounded pos-center">
  <span class="caption">Submit</span>
</button>

<button class="button mini dropdown-toggle bg-white rounded pos-center">
  <span class="caption">Action</span>
</button>
<ul class="d-menu place-right" data-role="dropdown">
  <li><a href="#" onclick="javascript:createanalisa()" >View History</a></li>
</ul>
<span>  &nbsp;&nbsp;&nbsp;&nbsp; </span>

-->
<script>

var baseURL = $('body').data('baseurl');
var cat = $('body').data('cat');
var menu = $('#page').data('menu');
var submenu = $('#page').data('submenu');
var module = $('#page').data('module');
var module_id = $('#page').data('module_id');
var controller = module.capitalize() + "_controller"

$(document).ready(function(){

  //get_buttom_workflow();



});

</script>
