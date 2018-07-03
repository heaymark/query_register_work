var callbackMap = function(layer){
    lyr = layer;

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
    lyrInfra.setInteractivity(['cartodb_id','the_geom','the_geom_webmercator','calle','codigo_postal','colonia','cuenta_predial','delegacion','id_proceso','latitud','longitud']);
    /*lyrInfra.setInteseractivity('cartodb_id,id_area_periferica,id_dir,id_delegacion,nombre_centro,domicilio,coordenadas,streetview,pagina_web,director,' +
        'administrador,director_cadi,fecha_apertua,' +
        'personal_base,personal_confianza_honorarios,areas_atencion,superficio,aforo,personas_atendidas,' +
        'area_administrativa,centro_cdmx,cadi,ubr,primera_infancia,consejo_tutela,horario_bebe,lugares_bebe,camiones_bebe,' +
        'camiones_bebe_ant,id_usr,id_usr_mod,fec_alta,fec_modificacion,becas,id_becas,biometrico,alias,areaid');*/

    lyrInfra.on('featureClick',function(evt,latlng,pos,data,layers){
        $("#mdlContent").html('');
	    _.templateSettings.variable = "item";
        var template = _.template($("#infraestructura").html());
        $("#mdlContent").append(template(data));
        $("#mdl").modal("show");
    });

    lyrInfra.on('mouseover',function(){
        $("#divMapMain").css('cursor','pointer');
    });

    lyrInfra.on('mouseout',function(){
        $("#divMapMain").css('cursor','grab');
    });

    /*jsonCercano = {
        sql: "WITH puntos AS (SELECT cartodb_id, the_geom, the_geom_webmercator FROM dro_tramites  ORDER BY the_geom <-> ST_SetSRID(ST_MakePoint("+lon+","+lat+"),4326) ASC LIMIT 3) SELECT null as cartodb_id, ST_MakeLine(ST_Transform(ST_SetSRID(ST_MakePoint("+lon+","+lat+"),4326),3857),the_geom_webmercator) as the_geom_webmercator FROM puntos",
        cartocss: styleCercano
    };
    lyrCercanos = layer.getSubLayer(6);
    lyrCercanos.set(jsonCercano);*/

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
    var url = $('#baseUrl').val()+'welcome/catalogo_procesos/';
    $.ajax({
        url:url,
        type: 'post',
        dataType: 'html',
        async: false,
        success: function(res){
            $('#tipo_formato').html(res);
            $('#subtipo_formato_select').empty();
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
        case "":
            $('#subtipo_formato_select').empty();
            objMap.toLyrSQL(6,"SELECT * FROM dro_tramites");
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
        var sql = "SELECT count(tramite.delegacion) as total,del.nombre as categories,'obras' as series FROM develop.dro_tramites tramite INNER JOIN develop.basedel del ON ST_Contains(del.the_geom,tramite.the_geom) OR ST_Intersects(del.the_geom,tramite.the_geom) WHERE tramite.id_proceso IN ("+res+") group by del.nombre;";
        var titletext = {
            title: "Total de obras por delegacion",
            subtitle:"",
            xaxis: "",
            yaxis: "",
        }        
        objMap.tosql(users,sql,graph_drill,[titletext]);
      }
    });
}

getfile = function(elem){

    objMap.getFile($(elem).attr("data-table"),$(elem).attr("data-format"));
}

graph_line = function(data,titletext){

    graphserieline(data.rows,"container",titletext);
}

graph_emision = function(anio){
    var sql = "SELECT delegacion as categories, descripcion as series,sum(otorgados) as total  FROM develop.beneficios_emision_2012_2018 where ano = "+anio+
        " group by delegacion,descripcion order by delegacion,descripcion ";
    var titletext = {
        title: "Benificios emision "+anio,
        subtitle:"",
        xaxis: "",
        yaxis: "",
    };
    objMap.tosql(users,sql,graph_line,[titletext]);
}

graph_drill = function(data,titletext) {

    graphdrill(data.rows, "container", titletext);
}

graph_indice = function(){
    var sql = "SELECT count(tramite.delegacion) as total,del.nombre as categories,'obras' as series FROM develop.dro_tramites tramite INNER JOIN develop.basedel del ON ST_Contains(del.the_geom,tramite.the_geom) OR ST_Intersects(del.the_geom,tramite.the_geom) group by del.nombre";
    var titletext = {
        title: "Total de obras por delegacion",
        subtitle:"",
        xaxis: "",
        yaxis: "",
    }
    objMap.tosql(users,sql,graph_drill,[titletext]);
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