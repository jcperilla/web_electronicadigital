$(document).ready(function() {
	setInterval(function(){ get_info_parking_lot(); }, 3000);
});

function get_info_parking_lot(){
	$.ajax({
		url: "http://localhost/web_electronicadigital/main/GET_query_parking",
		success: function(respuesta) {
			console.log(respuesta);
		},
		error: function(x) {
	        console.log("No se ha podido obtener la información" + x);
	    }
	});
}