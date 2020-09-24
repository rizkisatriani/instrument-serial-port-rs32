function load_page()
{
	var baseURL = $('body').data('baseurl');
	var cat = $('body').data('cat');
	var menu = $('#page').data('menu');
	var submenu = $('#page').data('submenu');
	var module = $('#page').data('module');
	if (typeof submenu === 'undefined')
	{
		//cpanel tidak menggunakan submenu
		location.href = baseURL + menu + '/' + module
	}
	else
	{
		location.href = baseURL + menu + '/' + submenu + '/' + module
	}
}

function custom_alert_notif(msg="Error System",title="Alert",action="alert"){
	var notify = Metro.notify;
		notify.setup({
				width: 300,
				duration: 1000,
				animation: 'easeOutBounce'
		});
		notify.create(msg, title, {
				cls: action
		});
		notify.reset();
}

function custom_alert_YesNo_action(data,url,msg,action){
	Metro.dialog.create({
		 title: msg['title'],
		 content: "<div>"+msg['content']+"</div>",
		 clsDialog: "alert",
		 actions: [
				 {
					 caption: "Agree",
					 cls: "js-dialog-close alert",
					 onclick: function(){

						 $.ajax({
								 type: 'POST',
								 data,
								 cache: false,
								 url: url,
								 success: function(result){
									 var msg = $.trim(result);
									 if (msg = 'OK') {
											 showdata();
									 }else{
										 alert("Delete Failed");
									 }
								 }
							 });

					 }
				 },
				 {
						 caption: "Disagree",
						 cls: "js-dialog-close",

				 }
			 ]
    });
}


function chekNumber(e) {
  var x = e.which || e.keyCode;
  var vchar = String.fromCharCode(x);

}

function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs

    
    //compatibility for firefox and chrome
    
    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    var pc = new myPeerConnection({
        iceServers: []
    }),
    
    noop = function() {},
    localIPs = {},
    ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
    key;

    function iterateIP(ip) {
        if (!localIPs[ip]) onNewIP(ip);
        localIPs[ip] = true;
    }

     //create a bogus data channel
    pc.createDataChannel("");

    // create offer and set local description
    pc.createOffer().then(function(sdp) {
        sdp.sdp.split('\n').forEach(function(line) {
            if (line.indexOf('candidate') < 0) return;
            line.match(ipRegex).forEach(iterateIP);
        });
        
        pc.setLocalDescription(sdp, noop, noop);
    }).catch(function(reason) {
        // An error occurred, so handle the failure to connect
    });

    //listen for candidate events
    pc.onicecandidate = function(ice) {
        if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
        ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
    };
    
    //alert("disini");
    
}



