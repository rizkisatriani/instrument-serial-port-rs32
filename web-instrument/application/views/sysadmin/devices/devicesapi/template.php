<?php $this->load->view('element/include/breadcrumbs');?> 
 <div class="m-3">
 
 <div id="showdata"></div>
 
  </div>
  
  <script>
	var baseURL = $('body').data('baseurl');
	var cat = $('body').data('cat');
	var menu = $('#page').data('menu');
	var submenu = $('#page').data('submenu');
	var module = $('#page').data('module');
    var module_id = $('#page').data('module_id');
    var controller = module.capitalize() + "_controller"
    
	$(document).ready(function(){
			
		showdata();
        //console.log(controller);
		
	});
	
	function showdata(){
		ajax_do_action( 'showdata', 'showdata');
	}
	

</script>