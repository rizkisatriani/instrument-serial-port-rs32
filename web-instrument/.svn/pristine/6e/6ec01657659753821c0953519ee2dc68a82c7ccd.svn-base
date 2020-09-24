<?php $this->load->view('element/include/breadcrumbs');

$tanggal = date("Y-m-d");

?>

<div class="m-3" id="content">
<div class="panel mt-4">
  <div class="row">
      <div class="cell"> <!--<div class="cell-md-6">!-->
          <div class="panel" id="analisaph1">
              <div data-role="panel" data-title-caption="ANALISA PH" data-collapsible="true"
                  data-title-icon="<span class='mif-lab'></span>" class="panel-content" data-role-panel="true">
                  <div class="cell p-1 border-bottom bd-gray">
                    <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
                        <div class="w-50 mb-2 mb-0-lg" >
                          <input type="text" data-role="calendarpicker" data-prepend="Tanggal" id="tanggal" value="<?=$tanggal?>">
                        </div>
                        <div class="ml-2 w-50 mr-2 my-rows-wrapper">
                          <select data-role="select" id='pack' name='pack' data-prepend="Packages">
                            <option value='20kg'>Box 20kg</option>
                           <option value='1kg'>Pack 1kg</option>
                           <option value='50kg'>Bag 50kg</option>
                          </select>
                        </div>
                        <div class="ml-2 w-20 mr-2 my-rows-wrapper">
                          <select data-role="select" id='data' name='data' data-prepend="Data">
                            <option value='all'>All</option>
                           <option value='over'>Over</option>
                           <option value='under'>Under</option>
                          </select>
                        </div>
                        <div class="">
                            <button class="button success" onclick="javascript:processgetData()" ><span class="mif-spinner4"></span> Cari Data</button>
                        </div>
                    </div>
                  </div> 
                  <div class="cell p-1" id="showdata"></div>                
              </div>
              <div class="panel-title">
                  <span class="caption"><?=$module_title?></span>
                  <span class="mif-lamp fg-green icon"></span>
                  <span class="dropdown-toggle marker-center active-toggle"></span>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<script>

  var baseURL = $('body').data('baseurl');
  var cat = $('body').data('cat');
  var menu = $('#page').data('menu');
  var submenu = $('#page').data('submenu');
  var module = $('#page').data('module');
  var module_id = $('#page').data('module_id');
  var controller = module.capitalize() + "_controller";

  $(document).ready(function(){

    //showdata();
        //console.log(controller);
  });

  function showdata(){
    ajax_do_action( 'showdata', 'showdata');
  }

  function createanalisa(){
    ajax_do_action( 'open_form_analisa', 'content');
  }

  function detilanalisa(id){
    data = new Array();
    data[1] = id;
    ajax_do_action( 'open_detil_analisa', 'content',data);
  }
  
  function processgetData(){
    data = new Array();
    data[1] = $('#tanggal').val();
    data[2] = $('#pack').val();
    data[3] = $('#data').val();
    ajax_do_action( 'showdata', 'showdata',data);
  }



</script>
