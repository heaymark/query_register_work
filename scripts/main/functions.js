var callbackMap = function(layer){
    lyr = layer;

    var geomTools = new L.FeatureGroup();
    var drawControl = new L.Control.Draw({
        position : 'topright',
        draw : {
            polyline: {
                allowIntersection: false,
                drawError: {
                    color: '#b00b00',
                    timeout: 1000
                },
                shapeOptions: { 
                    stroke: true,
                    color: '#662d91',
                    weight: 5,
                    opacity: 2.5,
                    fill: true,
                    fillColor: null,
                    fillOpacity: 0.2,
                    clickable: true
                },
                metric: true,
                zIndexOffset:2000,
                repeatMode:false,
                showLength: true
            },
            polygon:false,
            rectangle:false,
            circle:false,
            marker:false
        },
        edit : {
            featureGroup : geomTools,
            edit : false,
            remove : true
        }
    });

    // objMap._map.addControl(drawControl); //Linea de medicion
    // objMap._map.addLayer(geomTools); //Linea de medicion
    // search.addTo(objMap._map); //Busqueda
    refresh.addTo(objMap._map); 
    // exporta.addTo(objMap._map); //Exportar dataset

    objMap._map.on('draw:created', function(e) {
        var type = e.layerType;
        var layer = e.layer;
        var coord = layer.toGeoJSON(); 
        var content = getPopupContent(layer);

        e.layer.bindPopup(content);
        geomTools.addLayer(e.layer);

    });


    // if(navigator.geolocation){
    //     navigator.geolocation.getCurrentPosition(coords);
    // } else {
        position  = {
            coords:{
                latitude: 19.3899839,
                longitude: -99.099821
            }
        };
    // }

    lon = position.coords.longitude;
    lat = position.coords.latitude;

    lyrInfra = layer.getSubLayer(6);
    lyrInfra.setInteraction(true);
    lyrInfra.setInteractivity(['cartodb_id','the_geom_webmercator','calle','codigo_postal','colonia','cuenta_predial','delegacion','id_proceso','latitud','longitud','num_exterior','num_interior']);

    lyrInfra.on('featureClick',function(evt,latlng,pos,data,layers){
        $("#mdlContent").html('');

            $.get($("#baseUrl").val()+"welcome/getInfoTramite",{idproceso:data.id_proceso},getTramiteInfo,"json");

    });

    lyrInfra.on('mouseover',function(){
        $("#divMapMain").css('cursor','pointer');
    });

    lyrInfra.on('mouseout',function(){
        $("#divMapMain").css('cursor','grab');
    });

    $.get($("#baseUrl").val()+"carto/getDelegaciones",getDelegacion,"json");

    // var url = $("#baseUrl").val()+"carto/getDelegaciones";
    // $.ajax({
    //     url: url,
    //     type: 'POST',
    //     dataType: 'html',
    //     async:false,
    //     success: getDelegacion
    // });

    // objMap.tosql(users,"select * from basedel order by nombre asc",getDelegacion,[]);
    // objMap.tosql(users,"select * from limites_delegaciones_seduvi_cdmx order by delegacia_ asc",getDelegacion,[]);

    $.get($("#baseUrl").val()+"carto/getColonias",getColonia,"json");

    // objMap.tosql(users,"select * from basecol order by delegacion asc,nombre asc",getColonia,[]);
    // objMap.tosql(users,"select * from colonias_seduvi order by id_mun asc,nombre asc",getColonia,[]);

    objMap._layers = layer;
    objMap._map.zoomControl.setPosition('topright');

    $("#status_eject").attr('src', './img/map_blue.png');
    $("#status_trami").attr('src', './img/map_dark_blue.png');
}

function initial() {
    objMap  =  new cdmxCarto(layerbase,viz,'divMapMain',users,paramlayerbase,parammapbase);
    objMap.renderMap(callbackMap);
}

function coords(coord){
    position = coord;
    coordsUbicacion(position);
}

function coordsUbicacion(latlon){
    latInicial = parseFloat(latlon.coords.latitude).toFixed(8);
    lonInicial = parseFloat(latlon.coords.longitude).toFixed(8);
    ptInicial = new L.latLng(latInicial,lonInicial);

    iconPosicion = L.icon({
        iconUrl: './img/ubicacion_persona.png',
        iconRetinaUrl: './img/ubicacion_persona.png',
        iconSize: [64, 64],
    });

    objMap._map.setView(ptInicial,13);
    if (mkrInicial == undefined ){
        // var mkrInicial = L.marker(ptInicial,{icon:iconPosicion,draggable: true });
        var mkrInicial = L.marker(ptInicial);

        mkrInicial.addTo(objMap._map);
        //mkrInicial.on('drag', markerDrag);
        /*moveMarker = new L.Draggable(mkrInicial);
        moveMarker.enable();*/
        //mkrInicial.on('mousedown', markerDown);
        mkrInicial.on('dragend', markerDrag);
        //moveMarker.on('dragstart', markerDown);
        //moveMarker.on('dragend', markerOut);
        // infoPunto(latlon);
    } else {
        var ptPoint = L.latLng(latInicial,lonInicial);
        mkrInicial.setLatLng(ptPoint);
    }
}

function markerDown(e){
    jsonCercano = {
        sql: "select * FROM infraestructura_dif  where 1 = 0",
        cartocss: styleCercano
    };
    lyrCercanos.set(jsonCercano);
}

function markerOut(e){
    var latlon = {
        coords:{
            latitude:e.latlng.lat,
            longitude:e.latlng.lng
        }
    }
    infoPunto(latlon);
}

function markerDrag(e){
    var marker = e.target;
    var latlon = {
        coords:{
            latitude:marker.getLatLng().lat,
            longitude:marker.getLatLng().lng
        }
    };
    infoPunto(latlon);
}

function infoPunto(latlon){
    lon = parseFloat(latlon.coords.longitude).toFixed(8);
    lat = parseFloat(latlon.coords.latitude).toFixed(8);

    var sqlBounds = new cartodb.SQL({
        user:'finanzasdf-admin'
    });
    var location =  "ST_GeographyFromText('POINT("+lon+" "+lat+")')";

    jsonCercano = {
        sql: "WITH puntos AS (SELECT cartodb_id, the_geom, the_geom_webmercator FROM dro_tramites  ORDER BY the_geom <-> ST_SetSRID(ST_MakePoint("+lon+","+lat+"),4326) ASC LIMIT 3) SELECT null as cartodb_id, ST_MakeLine(ST_Transform(ST_SetSRID(ST_MakePoint("+lon+","+lat+"),4326),3857),the_geom_webmercator) as the_geom_webmercator FROM puntos",
        cartocss: styleCercano
    };
    lyrCercanos.set(jsonCercano);
}

function fnExtentInicial(pt1,pt2){
    var lyrExtent = L.featureGroup([pt1,pt2]);
    return  lyrExtent.getBounds();
}

getTramiteInfo = function (response) {
    _.templateSettings.variable = "item";
    var template = _.template($("#infraestructura").html());
    $("#mdlContent").append(template(response));
    $("#mdl").modal("show");
}

getDelegacion = function(data){
    for(idx in data.rows){
        $("<option/>",{"value":data.rows[idx].conse,"text":data.rows[idx].nombre}).appendTo("#dgiCmbDel");
    }
}

getColonia = function(data){
    $("#dgiCmbCol").html('');
    $("<option/>",{"value":"","text":""}).appendTo("#dgiCmbCol");
    for(idx in data.rows){
        $("<option/>",{"value":data.rows[idx].mslink,"text":data.rows[idx].nombre,"data-deleg":data.rows[idx].delegacion}).appendTo("#dgiCmbCol");
    }
    // $("#dgiFlrCol").show();
}

getDelColonia = function(){
    $("#dgiCmbCol option[data-deleg != '"+ $("#dgiCmbDel").val() +"']").hide();
    $("#dgiCmbCol option[data-deleg = '"+ $("#dgiCmbDel").val() +"']").show();
    $("#dgiCmbCol option:first").prop("selected",true);
}

getCalle = function(data){
    $("#dgiCmbCalle").html('');
    $("<option/>",{"value":"","text":""}).appendTo("#dgiCmbCalle");
    for(idx in data.rows){
        $("<option/>",{"value":data.rows[idx].nombre,"text":data.rows[idx].nombre}).appendTo("#dgiCmbCalle");
    }
    $("#dgiFlrCalle").show();
}

getSearch = function(){
    var del = $("#dgiCmbDel").val();
    var col = $("#dgiCmbCol").val();

    if (col != "") {
        objMap.bounry(users,"basecol","delegacion = "+ del +" and mslink = " + col,objMap._layers,objMap);
    } else if (del != "") {
        objMap.bounry(users,"basedel","conse = "+ del,objMap._layers,objMap);
    }
}

dgicmbdel_change = function (evt) {
 var del = evt.target.value;
 objMap.tosql(users,"select mslink,nombre,delegacion from basecol where delegacion = "+ del+" order by nombre asc",getColonia,[]);
}

switch_click = function(evt){
    categ = $("#pnl_infra input[type='checkbox']").filter(function () {
        return ($(this).is(':checked'));
    }).map(function () {
        return $(this).val()
    }).get().join(",");
    objMap.toLyrSQL(2,"select * from infraestructura_dif where categ in ("+categ+")");
}

ids_change = function(evt){
    $(".legend").hide();
    $("#lbl_indice").html($(evt.target).text()+'<span class="caret"></span>');
    switch ($(evt.target).attr("data-value")){
        case "ids_grado":
            objMap.toLyrCSS(0,ids_grado);
            $("#lgd_nivel").show();
            break;
        case "ids_habitante":
            objMap.toLyrCSS(0,ids_habitante);
            $("#lgd_poblacion").show();
            break;
        case "ids_valor":
            objMap.toLyrCSS(0,ids_valor);
            $("#lgd_valor").show();
            break;
        case "ids_estrato":
            objMap.toLyrCSS(0,ids_estrato);
            $("#lgd_estracto").show();
            break;
        }
}

tipo_formato = function(){
    var tipo_formato = $("#tf").val();
    var tipo_subformato = $("#ts").val();
    var url = $('#baseUrl').val()+'welcome/catalogo_procesos/';
    $.ajax({
        url:url,
        type: 'post',
        dataType: 'html',
        async: false,
        success: function(res){
            $('#tipo_formato').html(res);
            if (tipo_formato != ""){
                $('#tipo_formato').val(tipo_formato).change();
            }
            if (tipo_subformato != "" ){
                $('#subtipo_formato_select').val(tipo_subformato).change();
            }else{
                $('#subtipo_formato_select').empty();
            }
        }
    });
}

status_rmc = function(){
    var status_rmc = $("#status_rmc").val();
    var url = $('#baseUrl').val()+'welcome/catalogo_estados_manifestaciones/';
    $("#total_obras").remove();
    $.ajax({
        url:url,
        type: 'post',
        dataType: 'html',
        async: false,
        success: function(res){
            $('#estado_mc').html(res);
            if (status_rmc != ""){
                $('#estado_mc').val(status_rmc).change();
            }
            $.post($("#baseUrl").val()+"welcome/getTotalEstado", contador_estado,"json");
        }
    });
}

contador_estado = function(data){
    var total_obras = parseInt(data[0].TOTAL)+parseInt(data[1].TOTAL)+parseInt(data[2].TOTAL)+parseInt(data[3].TOTAL);
    $('<div id="total_obras" class="panel panel-default" >'+
                '<div class="panel-heading">'+
                  '<div class="row">'+
                    '<div class="col-sm-10 col-md-10"><h4>Totales por estado</h4> </div>'+
                  '</div>'+
                '</div>'+
                '<div class="panel-body">'+
                  '<div id="txt_total_obra">'+
                    '<div class="table-responsive">'+
                      '<table class="table table-hover">'+
                        '<tbody>'+
                          '<tr>'+
                            '<td class="active">'+data[0].ESTADO+'</td>'+
                            '<td class="active text-center">'+data[0].TOTAL+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td class="active">'+data[1].ESTADO+'</td>'+
                            '<td class="active text-center">'+data[1].TOTAL+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td class="active">'+data[2].ESTADO+'</td>'+
                            '<td class="active text-center">'+data[2].TOTAL+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td class="active">'+data[3].ESTADO+'</td>'+
                            '<td class="active text-center">'+data[3].TOTAL+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<td class="active">Total de obras</td>'+
                            '<td class="active text-center">'+total_obras+'</td>'+
                          '</tr>'+
                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>').appendTo("#status");
}

tipo_dro = function(){
    var url = $('#baseUrl').val()+'welcome/catalogo_perfil/';
    $.ajax({
        url:url,
        type: 'post',
        dataType: 'html',
        async: false,
        success: function(res){
            $('#tipo_dro').html(res);
            /*if (tipo_formato != ""){
                $('#tipo_formato').val(tipo_formato).change();
            }
            if (tipo_subformato != "" ){
                $('#subtipo_formato_select').val(tipo_subformato).change();
            }else{
                $('#subtipo_formato_select').empty();
            }*/
        }
    });
}

download_formato = function(evt) {
    var idproceso = $(this).attr('data-id');
    var data = {idproceso_:idproceso}
    var url = $('#baseUrl').val()+'reporte/index/';
    $.ajax({
        url:url,
        data:data,
        type: 'post',
        dataType: 'html',
        async: false,
        success: function(res){
            $('#show_pdf').html(res);
        }
    });
}

tipo_subformato = function() {
    switch ($("#tipo_formato").val()) {
        case "1":
            var url = $('#baseUrl').val()+'welcome/manifestacion_tipob/';
            $.ajax({
                url:url,
                type: 'post',
                dataType: 'html',
                async: false,
                success: function(res){
                    $('#subtipo_formato_select').html(res);
                    getSearchTramite();
                }
            });
            break;
        case "2":
            var url = $('#baseUrl').val()+'welcome/manifestacion_tipoc/';
            $.ajax({
                url:url,
                type: 'post',
                dataType: 'html',
                async: false,
                success: function(res){
                    $('#subtipo_formato_select').html(res);
                    getSearchTramite();

                }
            });
            break;
        case "3":
            var url = $('#baseUrl').val()+'welcome/licencia_construccion/';
            $.ajax({
                url:url,
                type: 'post',
                dataType: 'html',
                async: false,
                success: function(res){
                    $('#subtipo_formato_select').html(res);
                    getSearchTramite();

                }
            });
            break;
        case "4":
            var url = $('#baseUrl').val()+'welcome/otras_responsivas/';
            $.ajax({
                url:url,
                type: 'post',
                dataType: 'html',
                async: false,
                success: function(res){
                    $('#subtipo_formato_select').html(res);
                    getSearchTramite();

                }
            });
            break;
        case "5":
            var url = $('#baseUrl').val()+'welcome/reconstruccion_multifamiliar/';
            $.ajax({
                url:url,
                type: 'post',
                dataType: 'html',
                async: false,
                success: function(res){
                    $('#subtipo_formato_select').html(res);
                    getSearchTramite();

                }
            });
            break;
        case "0":
            $('#subtipo_formato_select').empty();
            objMap.toLyrSQL(6,"SELECT * FROM dro_tramites");
            getSearchTramite();

            //$('#tipo_formato').empty();
            // $('[data-modal=accion]').attr('id','btn_accion');
            //$("#btn_accion").css("display", "none");
            break;
        case "":
            $('#subtipo_formato_select').empty();
            objMap.toLyrSQL(6,"SELECT * FROM dro_tramites");
            getSearchTramite();

            //$('#tipo_formato').empty();
            // $('[data-modal=accion]').attr('id','btn_accion');
            //$("#btn_accion").css("display", "none");
            break;
    }
}

getSearchTramite = function (){
  var tipo_formato = $("#tipo_formato").val();
  var tipo_subformato = $("#subtipo_formato_select").val();
  var data = {tformato:tipo_formato, tsubformato:tipo_subformato}
  var url = $('#baseUrl').val()+'welcome/gettramites/';

    $.ajax({
        url:url,
        data:data,
        type: 'post',
        dataType: 'text',
        async: false,
        success: function(res){

            objMap.toLyrSQL(6,"SELECT * FROM dro_tramites WHERE id_proceso IN ("+res+");");
            
            if(res != 0){
                var sql = "SELECT count(tramite.delegacion) as total,del.nombre as categories,'obras' as series FROM develop.dro_tramites tramite INNER JOIN develop.basedel del ON ST_Contains(del.the_geom,tramite.the_geom) OR ST_Intersects(del.the_geom,tramite.the_geom) WHERE tramite.id_proceso IN ("+res+") group by del.nombre;";
                // var sql2 = "SELECT del.nombre as delegacion,'obras' as series, tramite.fecha_insercion, EXTRACT(YEAR FROM tramite.fecha_insercion) AS anio, EXTRACT(MONTH FROM tramite.fecha_insercion) AS mes,  EXTRACT(DAY FROM tramite.fecha_insercion) AS dia, tramite.id_proceso FROM develop.dro_tramites tramite INNER JOIN develop.basedel del ON ST_Contains(del.the_geom,tramite.the_geom) OR ST_Intersects(del.the_geom,tramite.the_geom) WHERE tramite.id_proceso IN ("+res+") group by del.nombre,tramite.fecha_insercion,tramite.id_proceso ORDER BY tramite.fecha_insercion ASC";

            }else{
                var sql = "SELECT 0 as total, '' as categories,'obras' as series FROM develop.dro_tramites tramite LIMIT 1";

            }
            
            // if($('input[name="grafica"]:checked').val() != "barra"){
            var tiempo = $("#btn_graf_2").attr('option');
            var barra = $("#btn_graf").attr('option');

            if( tiempo == 'active' && barra == '' ){

                $.post($("#baseUrl").val()+"welcome/gettimetramites", data, grap_htime_2,"json");
            }else{

                var titletext = {
                    title: "Total de obras por delegacion",
                    subtitle:"",
                    xaxis: "",
                    yaxis: "",
                }
                objMap.tosql(users,sql,graph_drill,[titletext]);
                // objMap.tosql(users,sql2,graph_time,[titletext]);
            }

            $("#tf").val(tipo_formato);
            $("#ts").val(tipo_subformato);
        }
    });
}

getStatusTramite = function (){
  var estado_mc = $("#estado_mc").val();
  var data = {status_mc:estado_mc}
  var url = $('#baseUrl').val()+'welcome/getstatustramites/';

    $.ajax({
        url:url,
        data:data,
        type: 'post',
        dataType: 'text',
        async: false,
        success: function(res){
            objMap.toLyrSQL(6,"SELECT * FROM dro_tramites WHERE id_proceso IN ("+res+");");
            $("#status_rmc").val(estado_mc);
        }
    });
}

getStatusTramite_1 = function (){
  var estado_mc = $("#estado_mc_1").val();
  var data = {status_mc_1:estado_mc}
  var url = $('#baseUrl').val()+'welcome/getstatustramites_1/';

    $.ajax({
        url:url,
        data:data,
        type: 'post',
        dataType: 'text',
        async: false,
        success: function(res){
            objMap.toLyrSQL(6,"SELECT * FROM dro_tramites WHERE id_proceso IN ("+res+");");
            $("#status_rmc").val(estado_mc);
        }
    });
}

getSearchDRO = function(){
  var numero_dro = $("#numerodedro").val();
  var tipo_dro = $("#tipo_dro").val();
  var data = {ndro:numero_dro, tdro:tipo_dro}
  var url = $('#baseUrl').val()+'welcome/getdro/';
  var total = 0;
  var num_list= 1;

    $.ajax({
      url:url,
      data:data,
      type:'post',
      dataType:'json',
      async: false,
      beforeSend: function(){
         $("#bdro").append("<i id=\"spinner\" class=\"fa fa-spinner fa-spin\"></i>");
      },
      success: function(res){
        var total_res = Object.keys(res).length;
        if (total_res > 0) {
            $("#spinner").remove();
            $('#sn_resul').hide();
            $('#info_dro').fadeIn(2000);
            $("#name_dro").html(res[0]["NOMBRE"]+" "+res[0]["APELLIDO_PATERNO"]+" "+res[0]["APELLIDO_MATERNO"]);
            $("#num_dro").html(res[0]["NUMEROREGISTRO"]);
            $("#fecha_vigencia").html("05/07/2018");
            // console.log(res['rows'].length);5

            for (var i = 0; i < res['rows'].length; i++) {

                $("#list_tramites").append("<p>"+num_list+".-"+res[i]['DESCRIPCION']+" - <b> FOLIO:</b><span>"+res[i]['FOLIO']+" - <b> PERFIL:</b><span>"+res[i]['ABREVIATURA']+" - <b> TOTAL:</b><span>"+res[i]['SUPERFICIETOTAL_M2']+"M</span><sup>2</sup><br><a class=\"id_ubicacion\" data-long=\""+res['rows'][i]["longitud"]+"\" data-lat=\""+res['rows'][i]["latitud"]+"\"><span class=\"text-danger glyphicon glyphicon-globe\"></span> <span class=\"text-danger\"> Centrar en el mapa</span></a></p><br>");

                total += (parseFloat(res[i]['SUPERFICIETOTAL_M2']));
                num_list++;
            }

            $("#total_metros").html(total);
            $("#total_obra").html(res['rows'].length);

        }else{
            $("#spinner").remove();
            $('#info_dro').hide();
            $('#sn_resul').fadeIn(2000);
            $('#txt_sn_resul').html('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  No se encontraron resultados </div>')

        }

      },
      error: function() {
        $("#spinner").remove();
        alert("OPPS! Ocurrio un error! falta Numero de registro");
      }


    });
}

fnMostrarPunto = function(evt){
    var longitud = $(this).attr('data-long');
    var latitud = $(this).attr('data-lat');
    var ptPoint = L.latLng(latitud,longitud);
    objMap._map.setView(ptPoint,20);
}

getfile = function(elem){

    objMap.getFile($(elem).attr("data-table"),$(elem).attr("data-format"));
}

graph_line = function(data,titletext){

    graphserieline(data.rows,"container",titletext);
}

/*graph_time  = function(data,titletext){
    console.log(data);
    graptime(data.rows,"container",titletext);
}*/

grap_htime_2 = function(data){
    var objArray = [];
    var objArrayName = [];
    var dataCfg;
    // console.log(data);
    for(idx in data){
        mes  = parseInt(data[idx].MES)-parseInt(1);
        total = parseInt(data[idx].TOTAL);
        objArray.push([Date.UTC(data[idx].ANIO, mes, data[idx].DIA), total]);
        objArrayName.push(data[idx].SUBPROCESO);
    }

    dataCfg = 
        [
            {
                name:objArrayName,
                data:objArray,
            }
        ];

    // console.log(objArray);
    // console.log(objArrayName);
    // console.log(dataCfg);

    graptime(dataCfg,"container");
}

graphtime = function(){
    $("#btn_graf_2").attr('option', 'active');
    $("#btn_graf").attr('option', '');
    $("#btn_graf,#btn_graf_2").hide();
    // $("#btn_graf").slideUp();//ocultar
    // $("#close_graphic,#toolsgraphics").show();
    $("#close_graphic,#toolsgraphics").slideDown();//mostrar

    var tipo_formato = $("#tipo_formato").val();
    var tipo_subformato = $("#subtipo_formato_select").val();
    var data = {tformato:tipo_formato, tsubformato:tipo_subformato}

    if (tipo_formato == "" || tipo_formato == 0){
        /*var sql = "SELECT del.nombre as delegacion,'obras' as series, tramite.fecha_insercion, EXTRACT(YEAR FROM tramite.fecha_insercion) AS anio, EXTRACT(MONTH FROM tramite.fecha_insercion) AS mes,  EXTRACT(DAY FROM tramite.fecha_insercion) AS dia, tramite.id_proceso FROM develop.dro_tramites tramite INNER JOIN develop.basedel del ON ST_Contains(del.the_geom,tramite.the_geom) OR ST_Intersects(del.the_geom,tramite.the_geom) group by del.nombre,tramite.fecha_insercion,tramite.id_proceso";
        var titletext = {
            title: "Total de obras por tiempo",
            subtitle:"",
            xaxis: "",
            yaxis: "",
        }
        objMap.tosql(users,sql,graph_time,[titletext]);*/
        $.post($("#baseUrl").val()+"welcome/gettimetramites", data, grap_htime_2,"json");
    }else{

        getSearchTramite();
    }
}

graph_drill = function(data,titletext) {

    graphdrill(data.rows, "container", titletext);
}

graph_indice = function(){
    $("#btn_graf").attr('option', 'active');
    $("#btn_graf_2").attr('option', '');
    $("#btn_graf,#btn_graf_2").hide();
    // $("#btn_graf").slideUp();//ocultar
    // $("#close_graphic,#toolsgraphics").show();
    $("#close_graphic,#toolsgraphics").slideDown();//mostrar
    var tipo_formato = $("#tipo_formato").val();
    // var tipo_subformato = $("#subtipo_formato_select").val();

    if (tipo_formato == "" || tipo_formato == 0){
        var sql = "SELECT count(tramite.delegacion) as total,del.nombre as categories,'obras' as series FROM develop.dro_tramites tramite INNER JOIN develop.basedel del ON ST_Contains(del.the_geom,tramite.the_geom) OR ST_Intersects(del.the_geom,tramite.the_geom) group by del.nombre";
        var titletext = {
            title: "Total de obras por delegacion",
            subtitle:"",
            xaxis: "",
            yaxis: "",
        }
        objMap.tosql(users,sql,graph_drill,[titletext]);
    }else{

        getSearchTramite();
    }

}

graph_close = function() {
    $("#close_graphic,#toolsgraphics").hide();    
    $("#btn_graf").attr('option', '');
    $("#btn_graf_2").attr('option', '');
    // $("#close_graphic,#toolsgraphics").slideUp();//mostrar
    // $("#btn_graf").show();,
    $("#btn_graf,#btn_graf_2").slideDown();//ocultar
}

panel_close = function() {
    // $("#info_dro").fadeOut();
    $("#info_dro,#sn_resul").hide();
    $("#name_dro,#num_dro,#fecha_vigencia,#list_tramites,#total_obra,#txt_sn_resul").html('');
}

map_change = function(){
    var layer = $("#sel_tematico").data("value");
    var anio = $("#sel_anio").data("value");

    switch (layer){
        case 0:

        break;
        case 1:

        break;
    }

    var lyrJson = {
        sql:sql,
        cartocss:cartocss
    }

    objMap.toLyrSET(0,lyrJson);
    $("#title_page").html(title);
    $("#title_anio_page").html(anio);
}

function getPopupContent(layer){

    // Truncate value based on number of decimals
    var _round = function(num, len) {
        return Math.round(num*(Math.pow(10, len)))/(Math.pow(10, len));
    };
    // Helper method to format LatLng object (x.xxxxxx, y.yyyyyy)
    var strLatLng = function(latlng) {
        return "("+_round(latlng.lat, 6)+", "+_round(latlng.lng, 6)+")";
    };

    // Marker - add lat/long
    if (layer instanceof L.Marker || layer instanceof L.CircleMarker) {
        return strLatLng(layer.getLatLng());
    // Circle - lat/long, radius
    } else if (layer instanceof L.Circle) {
        var center = layer.getLatLng(),
            radius = layer.getRadius();
        return "Center: "+strLatLng(center)+"<br />"
              +"Radius: "+_round(radius, 2)+" m";
    // Rectangle/Polygon - area
    } else if (layer instanceof L.Polygon) {
        var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
            area = L.GeometryUtil.geodesicArea(latlngs);
        return "Area: "+L.GeometryUtil.readableArea(area, true);
    // Polyline - distance
    } else if (layer instanceof L.Polyline) {
        var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
            distance = 0;
        if (latlngs.length < 2) {
            return "Distance: N/A";
        } else {
            for (var i = 0; i < latlngs.length-1; i++) {
                distance += latlngs[i].distanceTo(latlngs[i+1]);
            }
            return "Distance: "+_round(distance, 2)+" m";
        }
    }
    return null;
}

buscadores = function(){
    var id = $('#buscador').val();
    if(id == ""){
        $('#message').html('Debe de seleccionar una opción').show();
        $('#div_google,#div_predio,#div_expediente,#div_btn').hide();
    }else if(id == 1){
        $('#message').html('').hide();
        $('#div_predio,#div_estatus,#div_expediente,#div_btn').hide();
        $('#div_google').show();
    }else if(id == 2){
        $('#message').html('').hide();
        $('#div_google,#div_estatus,#div_expediente').hide();
        $('#region,#manzana,#lote').val('');
        $('#div_predio,#div_btn').show();
    }else if(id == 3){
        $('#message').html('').hide();
        $('#div_google,#div_predio,#div_btn').hide();
        $('#div_expediente').show();
        fnExpediente(); 
    }
}

cierrabuscador = function(){
    
    $("#options,#dvdownload").hide();
}

function onKeyDecimal(e,thix) {
        var keynum = window.event ? window.event.keyCode : e.which;
        if (document.getElementById(thix.id).value.indexOf('.') != -1 && keynum == 46)
            return false;
        if ((keynum == 8 || keynum == 48 || keynum == 46))
            return true;
        if (keynum <= 47 || keynum >= 58) return false;
        return /\d/.test(String.fromCharCode(keynum));
}