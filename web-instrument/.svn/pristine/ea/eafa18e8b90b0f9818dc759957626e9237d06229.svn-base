/*controller.js
 * kumpulan fungsi yang digunakan codeigniter controller yang menggunakan ajax process
 */
/*
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
*/

String.prototype.capitalize = function() {
    //tergantung dipakai nantinya saat di CI 3.0.x
    //return this.charAt(0).toUpperCase() + this.slice(1);
	return this.charAt(0).toLowerCase() + this.slice(1);
}


function DisabledEffect()
{
	$('#overlay').show();
	$('#overlay').css('width', '100%');
	$('#overlay').css('height', '100%');
}

function EnabledEffect()
{
	$('#overlay').width(0);
	$('#overlay').height(0);
	$('#overlay').hide(0);
}

function progress_selesai()
{
	$('#preloader').fadeOut();
    $('#preloader-text').text('')
	EnabledEffect()
}

function progressbar_hide()
{
	$('#container_bar').fadeOut();
	EnabledEffect()
}

function pesanloading()
{
	DisabledEffect()
	$('#preloader').show();
	$('#preloader-text').text("tunggu, sedang memuat data ...").show();
}

function pesansimpan()
{
	DisabledEffect()
	$('#preloader').show();
	$('#preloader-text').html('tunggu, sedang menyimpan data ...').show();
}

function pesanupdate()
{
	DisabledEffect()
	$('#preloader').show();
	$('#preloader-text').html('tunggu, sedang mengupdate data ...').show();
}

function pesanhapus()
{
	DisabledEffect()
	$('#preloader').show();
	$('#preloader-text').html('tunggu, sedang menghapus data ...').show();
}

function pesanproses(kata)
{
	DisabledEffect()
	$('#preloader').show();
	$('#preloader-text').html(kata).show();
}

function progressbar_show(kata)
{
	DisabledEffect()
	$('#container_bar').show()
	$('#progresskata').html(kata)
}
// Refresh tab yang aktif

function reload_tab(paramValue)
{
	//paramValue bersifat opsional
	var tab_active = $('.tabs li').filter('.active').attr('id');
	if (typeof(paramValue) === 'undefined')
	{
		ajax_load_tab_content(tab_active);
	}
	else
	{
		ajax_load_tab_content(tab_active, paramValue);
	}
}
//jika tab menggunakan jquery-ui

function reload_tab_ui()
{
	var current_index = $('#tabs').tabs('option', 'active');
	alert(current_index)
	$('#tabs').tabs('load', current_index);
}

function closePopup()
{
	$.Dialog.close();
}
//digunakan untuk menampilkan data ke suatu div

function ajax_do_action(action, divresponse, param_data, progress_bar)
{
	//1=pesanloading 2=pesanupdate 3=pesanhapus 4=pesansimpan 5=custom
	//0= gak pake pesan
	if (progress_bar === undefined)
	{
		progress_bar = '1';
	}
	var baseURL = $('body').data('baseurl')
	var cat = $('body').data('cat')
	var menu = $('#page').data('menu')
	var submenu = $('#page').data('submenu')
	var submenu_title = $('#page').data('submenu_title')
	var module = $('#page').data('module')
	var module_title = $('#page').data('module_title')
	var module_id = $('#page').data('module_id')
	var controller = module.capitalize() + "_controller"

	if (progress_bar != '0'){
		var actifity = Metro.activity.open();
	}

	var url = baseURL + menu + '/' + submenu + '/' + controller + '/do_action'
	$('.div-sub-menu-jp').hide()
	$.ajax(
	{
		type: 'POST',
		data: {
			'cat': cat,
			'menu': menu,
			'submenu': submenu,
			'submenu_title': submenu_title,
			'module': module,
			'module_title': module_title,
			'module_id': module_id,
			'action': action,
			'data': param_data
		},
		cache: false,
		url: url,
		beforeSend: function()
		{
			switch (progress_bar) {
				case '1' :
					pesanloading()
					break;
				case '2' :
					pesanupdate()
					break;
				case '3' :
					pesanhapus
					break;
				case '4' :
					pesansimpan
					break;
				default :
					pesanproses(progress_bar)
					break;
			}
		},
		complete: function()
		{
			progress_selesai();
			if (progress_bar != '0'){
				Metro.activity.close(actifity);
			}
		},
		success: function(response)
		{
			$('#' + divresponse).html(response)
		},
		error: function(response){
			if (progress_bar != '0'){
				Metro.activity.close(actifity);
			}
				console.log(response);
		}
	})
}
//digunakan jika langsung memproses data pada table dan mengeksekusi sebuah fungsi lain dari hasil proses data tersebut

function ajax_prosesdata(action, param_data, param_function, progress_bar)
{
	//1=pesanloading 2=pesanupdate 3=pesanhapus 4=pesansimpan 5=custom
	if (progress_bar === undefined)
	{
		progress_bar = '2';
	}
	var baseURL = $('body').data('baseurl');
	var cat = $('body').data('cat');
	var menu = $('#page').data('menu');
	var submenu = $('#page').data('submenu');
	var module = $('#page').data('module');
	var module_id = $('#page').data('module_id');
	var controller = module.capitalize() + "_controller"

	$.ajax(
	{
		type: 'POST',
		data: {
			'action': action,
			'data': param_data,
			'module_id': module_id,
		},
		url: baseURL + menu + '/' + submenu + '/' + controller + '/do_action',
		beforeSend: function()
		{
		switch (progress_bar) {
			case '1' :
				pesanloading()
				break;
			case '2' :
				pesanupdate()
				break;
			case '3' :
				pesanhapus
				break;
			case '4' :
				pesansimpan
				break;
			default :
				pesanproses(progress_bar)
				break;
			}
		},
		complete: function()
		{
			progress_selesai();
		},
		success: function(respon)
		{
			param_function()
		}
	}); // end ajax
}

function ajax_load_tab_content(tab, paramValue, divresponse)
{
	//parameter paramValue bersifat optional/jika diperlukan utk query
	if (typeof(paramValue) === 'undefined')
	{
		paramValue = "";
	}
	if (typeof(divresponse) === 'undefined')
	{
		div_result = ".frames";
	}
	else
	{
		div_result = "#" + divresponse;
	}
	var baseURL = $('body').data('baseurl');
	var cat = $('body').data('cat');
	var menu = $('#page').data('menu');
	var submenu = $('#page').data('submenu');
	var submenu_title = $('#page').data('submenu_title');
	var module = $('#page').data('module');
	var module_id = $('#page').data('module_id');
	var module_title = $('#page').data('module_title');
	var controller = module.capitalize() + "_controller"

	//$('.frames').html('');
	var url = baseURL + menu + '/' + submenu + '/' + controller + '/load_tab_content';
	$.post(url, {
		'cat': cat,
		'menu': menu,
		'submenu': submenu,
		'submenu_title': submenu_title,
		'module': module,
		'module_id': module_id,
		'module_title': module_title,
		'tab': tab,
		'paramValue': paramValue
	}, function(response)
	{
		$(div_result).html(response);
	})
}

function create_popup_window(title, data, dimension, nama_controller)
{
	var baseURL = $('body').data('baseurl');
	var cat = $('body').data('cat');
	var menu = $('#page').data('menu');
	var submenu = $('#page').data('submenu');
	var module = $('#page').data('module');
	var controller = module.capitalize() + "_controller"

	if (typeof(dimension) === 'undefined')
	{
		w = 700;
		h = 570;
	}
	else
	{
		a = dimension.split(':');
		w = a[0];
		h = a[1];
	}
	if (typeof(nama_controller) === 'undefined')
	{
		url = baseURL + menu + '/' + submenu + '/' + controller + '/view_popup_window';
	}
	else
	{
		controller = nama_controller.capitalize()
		url = baseURL + menu + '/' + submenu + '/' + controller + '/view_popup_window';
	}
	$.post(url, {
		'cat': cat,
		'menu': menu,
		'submenu': submenu,
		'module': module,
		'data': data
	}, function(response)
	{
		$.Dialog(
		{
			shadow: true,
			overlay: true,
			flat: true,
			draggable: true,
			icon: '<span class="icon-grid-view fg-yellow"></span>',
			width: w,
			height: h,
			padding: 10,
			onShow: function(_dialog)
			{
				var content = response
				$.Dialog.title(title);
				$.Dialog.content(content);
				$.Metro.initInputs();
			}
		});
	})
}


//Fungsi dibawah ini untuk keperluan pada komponen controller
//yang digunakan bersama oleh beberapa entri

function ajax_include(action, div_result, param_data, layar_update_proses)
{
	if (layar_update_proses === undefined)
	{
		layar_update_proses = false;
	}
	if (typeof(param_data) === 'undefined')
	{
		param_data = Array()
	}
    var ctrl = "komponen"
    var controller = ctrl.capitalize()
	var baseURL = $('body').data('baseurl');
	var submenu_title = $('#page').data('submenu_title');
	var module_title = $('#page').data('module_title');
	var module_id = $('#page').data('module_id');
	var url_control = baseURL + controller + '/do_include'
	div_result = "#" + div_result;
	$('.div-sub-menu-jp').hide();
	if (layar_update_proses == false)
	{
		$.post(url_control, {
			'data': param_data,
			'action': action,
			'submenu_title': submenu_title,
			'module_title': module_title,
			'module_id': module_id
		}, function(response)
		{
			$(div_result).html(response)
		})
	}
	else
	{
		$.ajax(
		{
			type: 'POST',
			data: {
				'data': param_data,
				'action': action,
				'module_id': module_id,
				'submenu_title': submenu_title,
				'module_title': module_title
			},
			url: url_control,
			beforeSend: function()
			{
				pesanupdate();
			},
			complete: function()
			{
				progress_selesai();
			},
			success: function(response)
			{
				$(div_result).html(response)
			}
		}) // end ajax
	}
}

function popup_public(title, data, dimension, namafungsi)
{
	var baseURL = $('body').data('baseurl');
	if (typeof(dimension) === 'undefined')
	{
		w = "700px";
		h = "570px";
	}
	else
	{
		a = dimension.split(':');
		w = a[0];
		h = a[1];
	}
    var ctrl = "komponen"
    var controller = ctrl.capitalize()
	url = baseURL + controller + '/' + namafungsi
	$.post(url, {'data': data},
			function(response){
				$.Dialog(
				{
					shadow: true,
					overlay: true,
					flat: true,
					draggable: true,
					icon: '<span class=" icon-list fg-white"></span>',
					width: w,
					height: h,
					padding: 10,
					onShow: function(_dialog)
					{
						var content = response
						$.Dialog.title(title);
						$.Dialog.content(content);
						$.Metro.initInputs();
					}
				});
			})
}

function load_tab_public(tab, namafungsi, paramValue, divresponse)
{
	if (typeof(paramValue) === 'undefined')
	{
		paramValue = Array();
	}
	if (typeof(divresponse) === 'undefined')
	{
		div_result = ".frames";
	}
	else
	{
		div_result = "#" + divresponse;
	}
	var ctrl = "komponen"
    var controller = ctrl.capitalize()
	var url = baseURL + controller + '/' + namafungsi
	$.post(url, {
		'tab': tab,
		'data': paramValue
	}, function(response)
	{
		$(div_result).html(response);
	})
}

function daftar_kodecc()
{
	data = new Array();
	dimensi = "600px:500px";
	popup_public("KODE PUSAT BIAYA (Cost Center)", data, dimensi, "daftar_kodecc");
}

function daftar_org(kodeorg)
{
	data = new Array();
	data[0] = kodeorg;
	dimensi = "560px:550px";
	popup_public("DAFTAR ORGANISASI", data, dimensi, "daftar_org");
}

function daftar_unitkerja(staf)
{
	data = new Array();
	//jika tidak ada parameter sama sekali berarti boleh mengklik unit staf
	if (typeof(staf) === 'undefined') {
		data[0] = 1;
	} else {
		data[0] = staf;
	}
	dimensi = "560px:550px";
	popup_public("DAFTAR UNIT KERJA", data, dimensi, "daftar_kodeunit");
}

function cari_karyawan(DB, tabel, model, staf)
{
	if (typeof(staf) === 'undefined') {
		staf = '1';
	}
	wx = $(document).width() - 50;
	hx = $(document).height() - 150;
    if (hx > 590) {
        hx = 590;
    }
	w = wx.toString() + "px"
	h = hx.toString() + "px"
	dimensi = w + ":" + h
	data = new Array();
	data[0] = DB
	data[1] = tabel
	data[2] = model
	data[3] = dimensi // berguna untuk menentukan sScrollY datatables
	data[4] = staf
	popup_public("Cari Karyawan", data, dimensi, "cari_karyawan");
}

function cari_karyawan_b()
{
    wx = $(document).width() - 50;
	hx = $(document).height() - 150;
	w = wx.toString() + "px"
	h = hx.toString() + "px"
	dimensi = w + ":" + h
	popup_public("Cari Karyawan", data, dimensi, "cari_karyawan_b");
}
