var _url = null;
$(document).ready(function() {
	_url = document.getElementById('url').dataset.url;
	disabled_buttons();
	setInterval(function(){ get_info_parking_lot(); }, 1000);
});

function get_info_parking_lot(){
	$.ajax({
		url: _url + "main/get_async_parking_info",
		success: function(res) {
			update_info(res);
		},
		error: function(x) {
	        console.log("No se ha podido obtener la información" + x);
	    }
	});
}

function update_info(res) {
	var data = JSON.parse(res);
	document.getElementById("can_available_txt").innerHTML = data.available;
	document.getElementById("cant_busy_txt").innerHTML = data.busy;
}

function disabled_buttons() {
	var busy = document.getElementById("cant_busy_txt").innerHTML;
	var available = document.getElementById("can_available_txt").innerHTML;

	document.getElementById("buttonOUT").disabled  = (busy <= 0);
	document.getElementById("buttonIN").disabled  = (available <= 0);	 
}

function update_quotas(type) {
	var busy = document.getElementById("cant_busy_txt").innerHTML;
	var available = document.getElementById("can_available_txt").innerHTML;

	if((type == 1 && available > 0) || (type == 0 && busy > 0)) {
		$.ajax({
			data: { "type": type },
			type: 'POST',
			url: _url + "main/update_quotas",
			beforeSend: function() {
				document.getElementById("buttonOUT").disabled  = true;
				document.getElementById("buttonIN").disabled  = true;
			},
			success: function() {
				get_info_parking_lot();
			},
			error: function(x) {
				console.log("No se ha podido obtener la información" + x);
			},
			complete: function() {
				setTimeout(function(){
					disabled_buttons();
				}, 1000);
			}
		});
	}
}