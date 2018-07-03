var appid = "ZgMBex6IVRbeGq1dRGs5";
var appcode = "1PVbz59VzirLgPFQBaHaag";

function mapInit(){}

/* Evento del Boton de busqueda de direcciones */
$("#btnDireccion").click(function (event) {
    alert( "direccion: " + $('#txtDireccion').val());
    $.ajax({
        url: 'https://geocoder.cit.api.here.com/6.2/geocode.json',
        type: 'GET',
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        data: {
            searchtext: $('#txtDireccion').val() + ', Distrito Federal, Mexico',
            app_id: appid,
            app_code: appcode,
            gen: '8'
        },
        success: function (data) {
            var datos = JSON.stringify(data);
            var parseados = JSON.parse(datos);
            var lat = parseados.Response.View[0].Result[0].Location.DisplayPosition.Latitude;
            var lon = parseados.Response.View[0].Result[0].Location.DisplayPosition.Longitude;
            maps._map.setView(new L.LatLng(lat, lon), 16);
            PuntoLoc.setLatLng(L.latLng(lat, lon));
            //fn_datainfo();
            // calcularRuta();
        }
    });
    event.preventDefault();
});

function alertError(error) {
    var errors = {
        1: 'Permiso denegado',
        2: 'Posicion no disponible',
        3: 'Tiempo excedido'
    };
    alert("Error: " + errors[error.code]+ "\nFavor de Buscar su Direccion");
    mapToPosition(position);
}

function calcularRuta(){

    if(typeof(PuntoPago) === 'undefined'){
        return;
    }

    var origen = PuntoLoc.getLatLng();
    var destino = PuntoPago.getLatLng();
    $.ajax({
        url: 'https://route.cit.api.here.com/routing/7.2/calculateroute.json',
        type: 'GET',
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        data: {
            waypoint0: origen.lat+','+origen.lng,
            waypoint1: destino.lat+','+destino.lng,
            mode: 'fastest;car;traffic:disabled',
            app_id: appid,
            app_code: appcode,
            language: 'es-es',
            //routeAttributes:'none,legs,bb',
            representation:'display',

            routeattributes : 'waypoints,summary,shape,legs,bb',
            maneuverattributes: 'direction,action',

            //avoidareas: "19.04725120,-98.2035255;19.0452431,-98.1996417!19.04301204,-98.2068085;19.0406794,-98.20322514!19.04743375,-98.2185029;19.0437016,-98.21403980"

            //alternatives:2,
            //avoidlinks:"+701792967,+1149539511,+701792137,+701805849,+701796153"
            //avoidlinks:"+701805849"
            //avoidlinks:"+701796153"
        },
        success: function (data) {
            var ruta = data.response.route[0].leg[0].maneuver;
            creaItinerario(ruta);
            //dibujaRuta(ruta);
            var bb = data.response.route[0].boundingBox;
            maps._map.fitBounds([
                [bb.bottomRight.latitude,bb.topLeft.longitude],
                [bb.topLeft.latitude,bb.bottomRight.longitude]
            ],
            {paddingTopLeft:[30,30]});
            //$('#tblModo').show();
        },
        error: function (status, error){
            alert(status);
        }
    });
}

function calcularbloqueos(lat,lng){
    $.ajax({
        url: 'https://reverse.geocoder.cit.api.here.com/6.2/reversegeocode.json',
        type: 'GET',
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        data: {
            prox:lat+","+lng+",25",
            mode:retrieveAddresses,
            app_id: appid,
            app_code: appcode,
            gen:8
        },
        success: function (data) {
            var ruta = data.response.route[0].leg[0].maneuver;
            creaItinerario(ruta);
            dibujaRuta(ruta);
            var bb = data.response.route[0].boundingBox;
            maps._map.fitBounds([
                [bb.bottomRight.latitude,bb.topLeft.longitude],
                [bb.topLeft.latitude,bb.bottomRight.longitude]
            ],
            {paddingTopLeft:[30,30]});
            //$('#tblModo').show();

        },
        error: function (status, error){
            alert(status);
        }
    });
}

/***********************************************************************************/
/* Dibuja la ruta de origen a destino fijados en el mapa */
function creaItinerario(ruta){
    $( "#itinerario" ).html('');
    for(i=0; i<ruta.length; i++){
        //$('#itinerario').html(ruta[0].instruction);
        //num = num + 1;
        $( "#itinerario" ).append('<li data-index="'+i+'"><span class="arrow '+ruta[i].action+'"></span><span>'+ruta[i].instruction+'</span></li>');
        //$( "#itinerario" ).append('<td>'+ruta[i].instruction+'</td></tr>');
    }
}

/***********************************************************************************/
/* Dibuja la ruta de origen a destino fijados en el mapa */
function dibujaRuta(ruta){

    var shape;
    var split;
    var n=0;
    var linea = new Array();
    var paso = new Array();

    maniobra = new Array();
    maps._map.removeLayer(polyline);
    maps._map.removeLayer(lineaSegmento);
    maps._map.removeLayer(puntoSegmento);
    //por cada maniobra
    for(i=0; i<ruta.length; i++){
        shape=ruta[i].shape;
        //por cada segmento de maniobra
        for(j=0; j<shape.length; j++){
            split = shape[j].split(',');
            split[0]=parseFloat(split[0]);
            split[1]=parseFloat(split[1]);
            linea[n] = split;
            paso[j] = split;
            n=n+1;
        }
        maniobra[i]=paso;
        paso = new Array();
    }
    polyline = new L.Polyline(linea,
        {color: '#0000FF'}).addTo(maps._map);
}

/***********************************************************************************/
/* Dibuja la ruta de origen a destino fijados en el mapa */
function dibujaRutatmp(ruta){

    var shape;
    var split;
    var linea = new Array();

    maniobra = new Array();
    maps._map.removeLayer(polyline);
    polyline = [];
    //por cada maniobra
    for(i=0; i<ruta.length; i++){
        shape=ruta[i].shape;
        //por cada segmento de maniobra
        for(j=0; j<shape.length; j++){
            split = shape[j].split(',');
            split[0]=parseFloat(split[0]);
            split[1]=parseFloat(split[1]);
            linea[j] = split;
        }
        polyline[i] = new L.Polyline(linea,
            {color: '#0000FF'}).addTo(maps._map);
            maniobra[i]=linea;
            linea = new Array();
    }
}

/***********************************************************************************/
/* Zoom al segmento de la maniobra */
function zoomSegmento(row){
    //alert("Row index is: " + row.rowIndex);
    var bounds = new Array();
    var indice = $(row).attr("data-index");

    for(i=0; i<maniobra[indice].length; i++){
        bounds[i] = new L.LatLng(maniobra[indice][i][0],maniobra[indice][i][1]);
    }

    maps._map.removeLayer(lineaSegmento);
    maps._map.fitBounds(bounds);
    lineaSegmento = new L.Polyline(bounds,{
        color: '#DF0101',
        opacity: 1,
        weight: 10
    }).addTo(maps._map);

    maps._map.removeLayer(puntoSegmento);
    puntoSegmento = undefined;
    puntoSegmento = new L.marker([maniobra[indice][0][0],maniobra[indice][0][1]], {
        icon: infoIcon,
        riseOnHover:true,
        title:"Indicacion"
    })
    .bindPopup($("#itinerario li:eq("+indice+")").text())
    .openPopup()
    .addTo(maps._map);
}

function geocode_inverse(){
    
    var url = "https://reverse.geocoder.cit.api.here.com/6.2/reversegeocode.json?app_id={YOUR_APP_ID}&app_code={YOUR_APP_CODE}&gen=9&prox=50.112,8.683,10&mode=retrieveAddresses";
}
