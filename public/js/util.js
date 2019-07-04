var _url = null;
$(document).ready(function() {
	_url = document.getElementById('url').dataset.url;
	setInterval(function(){ get_info_parking_lot(); }, 1000);
});

function get_info_parking_lot(){
	$.ajax({
		url: _url + "main/get_async_parking_info",
		success: function(res) {
			update_info(res);
			var busy = document.getElementById("cant_busy_txt").innerHTML;
			var available = document.getElementById("can_available_txt").innerHTML;
			
			document.getElementById("buttonOUT").disabled  = (busy == 0);
			document.getElementById("buttonIN").disabled  = (available == 0);	
	
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

function update_quotas(type) {
	$.ajax({
		data: { "type": type },
		type: 'POST',
		url: _url + "main/update_quotas",
		success: function() {
			get_info_parking_lot();
		},
		error: function(x) {
			console.log("No se ha podido obtener la información" + x);
		}
	});
}