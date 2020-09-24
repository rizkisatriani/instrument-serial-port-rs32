<?php
    if (!isset($judul)) {
        $judul = 'INFORMASI';
    }
    //closePopup() jika ada
    echo "
        <script>
          Metro.dialog.create({
                 title: '$judul',
                 content: '<div>$pesan</div>',
                 clsDialog: 'warning',
                 actions: [
                     {
                         caption: 'OK',
                         cls: 'js-dialog-close warning',
                         onclick: function(){
                              location.reload(true);
                         }
                     },

                 ]
             });
        </script>";

    echo die();
