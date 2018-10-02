$(function(){
    var objMap;
    mapHeight = document.getElementsByTagName('body')[0].clientHeight;
    navHeight = document.getElementsByTagName('nav')[0].clientHeight;
    $("#divMapMain").css("height",(mapHeight-navHeight-22) + "px");

    $('#pnl_infra').on("click","input[type='checkbox']",switch_click);

    $('#dgiCmbDel').on("change",dgicmbdel_change);

    $('#dgiFilterSearch').on("click",getSearch);

    $('#btramite').on("click",getSearchTramite);
    
    $('#bdro').on("click",getSearchDRO);

    // $('.id_ubicacion').on("click",fnMostrarPunto);
    $('#list_tramites').on("click",".id_ubicacion",fnMostrarPunto);

    $('[data-tab=tramite]').on("click",tipo_formato);

    $('[data-tab=dro]').on("click",tipo_dro);

    $('[data-tab=status]').on("click",status_rmc);

    $("#estado_mc").change(getStatusTramite); //Anterior
    
    $("#estado_mc_1").change(getStatusTramite_1);

    $("#tipo_formato").change(tipo_subformato);

    $("#subtipo_formato_select").change(getSearchTramite);

    $('#lst_indice').on("click","a",ids_change);

    $('#btn_graf').on("click",graph_indice);

    $('#btn_graf_2').on("click",graphtime);

    $('#close_graphic').on("click",graph_close);
    
    $('.close_panel').on("click",panel_close);

    $('#buscador').on('change',buscadores);

    $('.close_filter').on('click',cierrabuscador);

    initial();
    // graph_indice();
});
