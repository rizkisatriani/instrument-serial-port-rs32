
<div class="panel mt-4">
    <div data-role="panel">
    <div class="p-1">
      <?php
        if ($is_create){
      ?>
      <button class="button success drop-shadow"  onclick="javascript:createanalisa()" title='Tambah Analisa?' > <span class="mif-plus"></span> Tambah <?=$module_title?></button>
      <?php }?>
    </div>
    <div class="p-1">
        <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
            <div class="w-90 mb-2 mb-0-lg" id="t1_search">
            </div>
            <div class="ml-3 mr-3" id="t1_date"><input type="text" data-role="calendarpicker" data-prepend="Date: " name="calendarpicker" id="calendarpicker" data-day="false" onchange="getdatatable()" value="<?=date("Y/m/d")?>" data-format="%d %B %Y"></div>
            <div class="" id="t1_actions">
                <button class="button alert" onclick="$('#t1').data('table').export('CSV')"><span class="mif-file-excel"></span> Export</button>
            </div>
        </div>

        <div id="showdatatable"></div>
    </div>
    </div>
</div>
<script>

var filterIndex;

$(document).ready(function(){

  showdatatable();


});

function getdatatable(){
    showdatatable();
}


</script>
