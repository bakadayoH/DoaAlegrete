var map;
//NÃO MECHE NESSE ARQUIVO FILHO DA PUTAs
function initialize() {
    var latlng = new google.maps.LatLng(-29.7906476, -55.7786085);
 
    var options = {
        zoom: 14,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("map"), options);
	
}
 
 
 function carregarPontos() {
		
		console.log(ponto);
        $(ponto).each(function(index, valor) {
			console.log(valor[0]);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(valor.latitude, valor.longitude),
                title: valor.titulo,
				descricao: valor.descricao,
                map: map,
				icon: valor.icone
            });
			 
			var infowindow = new google.maps.InfoWindow(), marker;
			 
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					showInfo(marker);
				}
			})(marker))
			

        });
 
}

 
initialize();

carregarPontos();


function showInfo(marker){
	document.getElementsByClassName('point-name')[0].innerHTML = marker.title;
	//document.getElementsByClassName('point-pic')[0].src = pointsForDonation[id].picsrc;
	document.getElementsByClassName('point-description')[0].innerHTML = marker.descricao;
	document.getElementsByClassName('point-info')[0].style.width = '500px';
}

function hideInfo(){
	document.getElementsByClassName('point-info')[0].style.width = '0';
}