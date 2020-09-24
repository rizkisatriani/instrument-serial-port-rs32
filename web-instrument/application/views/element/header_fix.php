<?php

//print_r($this->session->userdata);

$gender = $this->session->userdata('gender');
$namauser = $this->session->userdata('namalengkap');
$is_admin = $this->session->userdata('is_admin');
$bidang_kerja = $this->session->userdata('bidang_kerja');

if ($gender == 'L'){
    $img = base_url()."assets/images/users/user.png";
}else{
    $img = base_url()."assets/images/users/user-woman.png";
}

$ip = get_client_ip();

if ($is_admin){
    $akses = $ip;
}else{
    $akses = $ip;
}

?>
<body class="m4-cloak h-vh-100">
<div data-role="navview" data-toggle="#paneToggle" data-expanded="xl" data-compact="lg" data-active-state="true">
    <div class="navview-pane">
        <div class="bg-cyan d-flex flex-align-center">
            <button class="pull-button m-0 bg-darkCyan-hover">
                <span class="mif-menu fg-white"></span>
            </button>
            <h2 class="text-light m-0 fg-white pl-7" style="line-height: 52px">SISLAB</h2>
        </div>

        <div class="suggest-box">
            <div class="data-box">
                <img src="<?=$img?>" class="avatar">
                <div class="ml-4 avatar-title flex-column">
                    <a href="#" class="d-block fg-white text-medium no-decor"><span class="reduce-1"><?=$namauser?></span></a>
                    <p class="m-0"><span class="fg-green mr-2">&#x25cf;</span><span class="text-small"><?=$bidang_kerja?></span></p>
                </div>
            </div>
            <img src="<?=$img?>" class="avatar holder ml-2">
        </div>

        <div class="suggest-box">
            <input type="text" data-role="input" data-clear-button="false" data-search-button="true">
            <button class="holder">
                <span class="mif-search fg-white"></span>
            </button>
        </div>

        <ul class="navview-menu mt-4" id="side-menu">
        <!--star menu-->
            <li class="item-header">MAIN OPERATIONS</li>
            <li>
                <a href="#dashboard">
                    <span class="icon"><span class="mif-meter"></span></span>
                    <span class="caption">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#widgets">
                    <span class="icon"><span class="mif-widgets"></span></span>
                    <span class="caption">Widgets</span>
                </a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-versions"></span></span>
                    <span class="caption">Sample Pages</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header">Pages</li>
                    <li><a href="login.html">
                        <span class="icon"><span class="mif-lock"></span></span>
                        <span class="caption">Login</span>
                    </a></li>
                    <li><a href="register.html">
                        <span class="icon"><span class="mif-user-plus"></span></span>
                        <span class="caption">Register</span>
                    </a></li>
                    <li><a href="lockscreen.html">
                        <span class="icon"><span class="mif-key"></span></span>
                        <span class="caption">Lock screen</span>
                    </a></li>
                    <li><a href="#profile">
                        <span class="icon"><span class="mif-profile"></span></span>
                        <span class="caption">Profile</span>
                    </a></li>
                    <li><a href="preloader.html">
                        <span class="icon"><span class="mif-spinner"></span></span>
                        <span class="caption">Preloader</span>
                    </a></li>
                    <li><a href="404.html">
                        <span class="icon"><span class="mif-cancel"></span></span>
                        <span class="caption">404 Page</span>
                    </a></li>
                    <li><a href="500.html">
                        <span class="icon"><span class="mif-warning"></span></span>
                        <span class="caption">500 Page</span>
                    </a></li>
                    <li><a href="#product-list">
                        <span class="icon"><span class="mif-featured-play-list"></span></span>
                        <span class="caption">Product list</span>
                    </a></li>
                    <li><a href="#product">
                        <span class="icon"><span class="mif-rocket"></span></span>
                        <span class="caption">Product page</span>
                    </a></li>
                    <li><a href="#invoice">
                        <span class="icon"><span class="mif-open-book"></span></span>
                        <span class="caption">Invoice</span>
                    </a></li>
                    <li><a href="#orders">
                        <span class="icon"><span class="mif-table"></span></span>
                        <span class="caption">Orders</span>
                    </a></li>
                    <li><a href="#order-details">
                        <span class="icon"><span class="mif-library"></span></span>
                        <span class="caption">Order details</span>
                    </a></li>
                    <li><a href="#price-table">
                        <span class="icon"><span class="mif-table"></span></span>
                        <span class="caption">Price table</span>
                    </a></li>
                    <li><a href="maintenance.html">
                        <span class="icon"><span class="mif-cogs"></span></span>
                        <span class="caption">Maintenance</span>
                    </a></li>
                    <li><a href="coming-soon.html">
                        <span class="icon"><span class="mif-watch"></span></span>
                        <span class="caption">Coming soon</span>
                    </a></li>
                    <li>
                        <a href="help-center.html">
                            <span class="icon"><span class="mif-help"></span></span>
                            <span class="caption">Help center</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="item-header">REPORTING</li>
            <li>
                <a href="#dashboard">
                    <span class="icon"><span class="mif-meter"></span></span>
                    <span class="caption">Dashboard</span>
                </a>
            </li>

            <li class="item-header">SYSTEM ADMINISTRATION</li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-cog fg-red"></span></span>
                    <span class="caption">Setting</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li><a href="#video">
                        <span class="icon"><span class="mif-user"></span></span>
                        <span class="caption">User & Akses</span>
                    </a></li>
                    <li><a href="#audio">
                        <span class="icon"><span class="mif-list"></span></span>
                        <span class="caption">Menu & Module</span>
                    </a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-lab fg-green"></span></span>
                    <span class="caption">Devices</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown" >
                    <li><a href="#audio">
                        <span class="icon"><span class="mif-link"></span></span>
                        <span class="caption">API & Devices Link</span>
                    </a></li>
                </ul>
            </li>
        <!-- end Menu -->
        </ul>

        <div class="w-100 text-center text-small data-box p-2 border-top bd-grayMouse" style="position: absolute; bottom: 0">
            <div>&copy; 2019 PT Gunung Madu Plantations</div>
            <div>SISLAB - Sistem Informasi Laboratorium</a></div>
        </div>
    </div>

    <div class="navview-content h-100">
        <div data-role="appbar" class="pos-absolute bg-darkCyan fg-white">

            <a href="#" class="app-bar-item d-block d-none-lg" id="paneToggle"><span class="mif-menu"></span></a>

            <div class="app-bar-container ml-auto">
                <a href="#" class="app-bar-item">
                    <span class="mif-envelop"></span>
                    <span class="badge bg-green fg-white mt-2 mr-1">4</span>
                </a>
                <a href="#" class="app-bar-item">
                    <span class="mif-bell"></span>
                    <span class="badge bg-orange fg-white mt-2 mr-1">10</span>
                </a>
                <a href="#" class="app-bar-item">
                    <span class="mif-flag"></span>
                    <span class="badge bg-red fg-white mt-2 mr-1">9</span>
                </a>
                <div class="app-bar-container">
                    <a href="#" class="app-bar-item">
                        <img src="<?=$img?>" class="avatar">
                        <span class="ml-2 app-bar-name"><?=$namauser?></span>
                    </a>
                    <div class="user-block shadow-1" data-role="collapse" data-collapsed="true">
                        <div class="bg-darkCyan fg-white p-2 text-center">
                            <img src="<?=$img?>" class="avatar">
                            <div class="h4 mb-0"><?=$namauser?></div>
                            <div><?=$akses?></div>
                        </div>
                        <div class="bg-white d-flex flex-justify-between flex-equal-items p-2 bg-light">
                            <button class="button mr-1">Profile</button>
                            <button class="button ml-1" onclick="location.href='Site/logout'">Sign out</button>
                        </div>
                    </div>
                </div>
                <a href="#" class="app-bar-item">
                    <span class="mif-cogs"></span>
                </a>
            </div>
        </div>

        <div id="content-wrapper" class="content-inner h-100" style="overflow-y: auto">
