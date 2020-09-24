 <?php

 echo "
     <div id='page' class='row border-bottom bd-lightGray m-3'
      data-menu=\"$menu\"
			data-submenu=\"$submenu\"
			data-module=\"$module\"
			data-module_id=\"$module_id\"
			data-submenu_title=\"$submenu_title\"
			data-module_title=\"$module_title\"
     >
        <ul class='breadcrumbs bg-transparent'>
                <li class='page-item'><a class='page-link'><span class='$submenulogo'></span></a></li>
                <li class='page-item'><a class='page-link'>$submenu_title</a></li>
                 <li class='page-item'><a href='javascript:load_page()' class='page-link'>$module_title</a></li>
        </ul>

     </div>

 ";


 ?>
