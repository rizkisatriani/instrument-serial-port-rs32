<?php  //echo $this->db->last_query();
?>
<!--<div class="bg-white p-4">-->
<div class="panel mt-4">
    <div data-role="panel">
    <div class="p-4">
        <div class="d-flex flex-wrap flex-nowrap-lg flex-align-center flex-justify-center flex-justify-start-lg mb-2">
            <div class="w-100 mb-2 mb-0-lg" id="t1_search"></div>
            <div class="ml-2 mr-2 my-rows-wrapper" id="t1_rows"></div>
            <div class="" id="t1_actions">
                <button class="button square" onclick="$('#t1').data('table').toggleInspector()"><span class="mif-cog"></span></button>
            </div>
        </div>
         <table id="t1" class="table subcompact table-border cell-border row-hover"
            data-role="table"
            data-show-activity="false"
            data-rownum="true"
            data-search-wrapper="#t1_search"
            data-rows-wrapper="#t1_rows"
            data-view-save-mode="client"
            data-view-save-path="TABLE:$1:KEYS"
            data-rows="20"
         >
         <thead>
    		<tr>
                <th width="8%">KODE</th>
    			<th width="15%">IP</th>
    			<th width="10%">MEREK</th>
    			<th>DESKRIPSI</th>
    			<th width="10%">NAMA</th>
    			<th width="10%">URL</th>
                <th width="10%">Status</th>
    		</tr>
    	</thead>
        <tbody>
    	<?php
    	$nomer=0;
    	foreach($devices as $val){
    		$nomer++;

    	?>
            <tr>
                <td align="right"><button class="button link small" onclick="getModal(<?=$val->id?>,'<?=$val->url?>')"><?=$val->kode_produk?> </button></td>
    			<td align="left"><?=$val->ip?></td>
                <td align="right"><?=$val->merk?></td>
                <td align="right"><?=$val->deskripsi?></td>
                <td align="right"><?=$val->nama?></td>
                <td align="right"><?=$val->url?></td>
                <!--<td align="center"><code class="bg-yellow">Preparing</code></td>-->
                <td align="center"><button class="button warning cycle small mif-cog bg-white fg-red" onclick="getSetting(<?=$val->id?>)"></button></td>

    		</tr>
    	<?php } ?>
    	</tbody>
        </table>
    </div>
    </div>
</div>

<div class="dialog primary" data-role="dialog" id="dialogTestAPI">
    <div class="dialog-title">Detil Data Devices</div>
    <div class="dialog-content">

        <input type="hidden" id="iddevice" name="iddevice" />
        <input type="hidden" id="urlapi" name="urlapi" />
        <div class="input-control textarea">
            <textarea name="hasil" id="hasil" rows="20" cols="100"></textarea>
        </div>

        <div class="input-control text big-input">
            <input type="text" placeholder="Hasil Value Sebenarnya" id="valuehasil"/>
        </div>

        <div class="p-4">
            <button class="button success" id="getAPI" onClick='javascript:GetAPI()'>Test API</button>

            <code id="ApiResponse"></code>

        </div>

    </div>
    <div class="dialog-actions">

        <button class="button js-dialog-close">Batal</button>
        <button class="button primary js-dialog-close">Edit</button>
    </div>
</div>
<div class="dialog primary" data-role="dialog" id="dialogDetil">
    <form name="settingdevces" id="settingdevces">
    <div class="dialog-title">Devices Data Setting</div>
    <div class="dialog-content">
        <input type="hidden" id="iddevice2" name="iddevice2" />
        <div class="grid">
            <div class="row">
                <div class="cell"><input type="text" name="idalat" id="idalat" data-role="input" data-prepend="ID Alat" /></div>
                <div class="cell"><input type="text" name="jenis" id="jenis" data-role="input" data-prepend="ID Jenis" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="kode" id="kode" data-role="input" data-prepend="Kode" /></div>
                <div class="cell"><input type="text" name="nama" id="nama"  data-role="input" data-prepend="Nama" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="desc" id="desc" data-role="input" data-prepend="Desc" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="ipset" id="ipset" data-role="input" data-prepend="IP" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="url" id="url"  data-role="input" data-prepend="URL" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="port" id="port" data-role="input" data-prepend="Port" /></div>
                <div class="cell"><input type="text" name="baud" id="baud" data-role="input" data-prepend="Baud" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="bit" id="bit" data-role="input" data-prepend="Bit" /></div>
                <div class="cell"><input type="text" name="parity" id="parity" data-role="input" data-prepend="Parity" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="stopbit" id="stopbit" data-role="input" data-prepend="Stopbit" /></div>
                <div class="cell"><input type="text" name="handshake" id="handshake" data-role="input" data-prepend="Hand" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="metode" id="metode" data-role="input" data-prepend="Metode" /></div>
                <div class="cell"><input type="text" name="metode_value" id="metode_value" data-role="input" data-prepend="Value" /></div>
            </div>
            <div class="row">
                <div class="cell"><input type="text" name="start" id="start" data-role="input" data-prepend="Start str" /></div>
                <div class="cell"><input type="text" name="end" id="end" data-role="input" data-prepend="End str" /></div>
            </div>
            
        </div>

    </div>
    <div class="dialog-actions">
        <button type="button" class="button warning js-dialog-close">Batal</button>
        <button type="submit" class="button success js-dialog-close">Simpan</button>
    </div>
    </form>
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
    
    $("#settingdevces").submit(function(){
        
        $.ajax({
    		type: 'POST',
    		data: $(this).serialize(),
    		cache: false,
    		url: baseURL + menu + '/' + submenu + '/' + controller + '/simpan_setting',
    		success: function(result){
    			var msg = $.trim(result);
    			if (msg == 'OK') {
                    showdata();
    			}
    		}
    	});
        
        return false;
    });



});

function getModal(id , url){

    $('#iddevice').val(id);
    $('#urlapi').val(url);

    //$('.messageResponse').hide();
    document.getElementById("ApiResponse").innerHTML = "";
    $('#hasil').text("");
    $('#valuehasil').val("");

    Metro.dialog.open('#dialogTestAPI');
}

function getSetting(id){
    
    $('#iddevice2').val(id);
    $.ajax({
		type: 'POST',
		data: {'id':id},
		cache: false,
		url: baseURL + menu + '/' + submenu + '/' + controller + '/get_devices_setting',
		success: function(result){
			var obj = JSON.parse( result );
            
            $('#idalat').val(obj.id_alat);
            $('#jenis').val(obj.id_jenis);
            $('#kode').val(obj.kode_produk);
            $('#nama').val(obj.nama);
            $('#desc').val(obj.deskripsi);
            $('#ipset').val(obj.ip);
            $('#url').val(obj.url);
            $('#port').val(obj.port);
            $('#baud').val(obj.baudrate);
            $('#bit').val(obj.databit);
            $('#parity').val(obj.parity);
            $('#stopbit').val(obj.stopbit);
            $('#handshake').val(obj.handshake);
            $('#metode').val(obj.metode);
            $('#metode_value').val(obj.metode_value);
            $('#start').val(obj.awal);
            $('#end').val(obj.akhir);
            
            Metro.dialog.open('#dialogDetil');
		}
	});
    
}

</script>
