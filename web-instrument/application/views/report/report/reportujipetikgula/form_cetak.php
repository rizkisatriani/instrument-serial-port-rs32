<div class="panel mt-4">
  <div class="row">
      <div class="cell"> <!--<div class="cell-md-6">!-->
          <div class="panel" id="analisaph1">
              <div data-role="panel" data-title-caption="ANALISA PH" data-collapsible="true"
                  data-title-icon="<span class='mif-lab'></span>" class="panel-content" data-role-panel="true">
                  <div class="cell-md-6 p-4">
                    <form name="cetak" id="cetak">
                        <input type="hidden" name="id_modul" id='id_modulinput' >
                        <div class="row mb-2">
                             <label class="cell-sm-2">Tipe Laporan</label>
                             <div class="cell-sm-6">
                                <select data-role="select" id='tipe_laporan' name='tipe_laporan' >
                                    <option value='1' selected='selected'>Detail Sugar Packing Report</option>
                                    <option value='2' >Summary Sugar Packing Report</option>
                                    <option value='3' >Error Sugar Packing Report</option>
                               </select>
                             </div>
                         </div>
                        <div class="row mb-2">
                             <label class="cell-sm-2">Packages</label>
                             <div class="cell-sm-6">
                                <select data-role="select" id='jenis_timbang' name='jenis_timbang' >
                                    <option value='20kg' selected='selected'>20 Kg</option>
                                    <option value='1kg' >1 Kg</option>
                                    <option value='50kg' >50 Kg</option>
                               </select>
                             </div>
                         </div>
                        <div class="row mb-2">
                             <label class="cell-sm-2">Jenis Laporan</label>
                             <div class="cell-sm-6">
                                <select data-role="select" id='jenis_laporan' name='jenis_laporan'  onchange="jenislaporan()">
                                    <option value='daily' selected='selected'>Daily</option>
                                    <option value='periode' >Periode</option>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2 shift">
                             <label class="cell-sm-2">Shift</label>
                             <div class="cell-sm-6">
                                <select data-role="select" id='shift' name='shift'  onchange="jenislaporan()">
                                    <option value='0' selected='selected'>All Shift</option>
                                    <option value='1' >Shift-1</option>
                                    <option value='2' >Shift-2</option>
                                    <option value='3' >Shift-3</option>
                               </select>
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label class="cell-sm-2">Tanggal</label>
                             <div class="cell-sm-3">
                                <input type="text" name="dateawal" data-role="calendarpicker">
                             </div>
                             <label class="cell-sm-1 periode" >Sampai</label>
                             <div class="cell-sm-3 periode" >
                                <input type="text" name="dateakhir" data-role="calendarpicker">
                             </div>
                         </div>
                         <div class="row">
                             <div class="cell">
                                 <button type="submit" class="button button primary" title="Save data"><span class="mif-print"></span> Cetak Laporan Uji Petik</button>
                             </div>
                         </div>
                     </form>
                  </div>
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
<script>

    data = new Array();

    $(".periode").hide();  

    $(document).ready(function(){
        
        $("#cetak").submit(function(){
            
            jenis_laporan = $('select[name=jenis_laporan] option:selected').val();
            dateawal = $('input[name=dateawal]').val();
            dateakhir = $('input[name=dateakhir]').val();
            jenis_timbang = $('select[name=jenis_timbang] option:selected').val(); 
            tipe_laporan = $('select[name=tipe_laporan] option:selected').val(); 
            shift = $('select[name=shift] option:selected').val(); 
            
            data[0] = dateawal;
            data[1] = dateakhir; 
            if (!dateawal){
                alert("Tanggal belum di isi");
                return false;
            }
            
            $.post(baseURL + menu + '/' + submenu + '/' + controller + '/add_session_print', 
                { url:'<?php echo $url; ?>', jenis_laporan: jenis_laporan, jenis_timbang:jenis_timbang, tipe_laporan:tipe_laporan, shift:shift, data: data }, 
                function(){
		              window.open(baseURL + menu + '/' + submenu + '/' + controller + '/export_pdf');
                }
            )	
            
            return false;
        });
           
    });
    
    
    function jenislaporan() {
      jenis_laporan = $("#jenis_laporan").val();
      
      switch (jenis_laporan){
        case 'daily':
            $(".periode").hide(); 
            $(".shift").show(); 
        break;
        case 'periode':
            $(".periode").show();
            $(".shift").hide(); 
        break;
        
      }
    }
    

  
</script>