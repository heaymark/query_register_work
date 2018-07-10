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

    $("#tipo_formato").change(tipo_subformato);

    $("#subtipo_formato_select").change(getSearchTramite);

    $('#lst_indice').on("click","a",ids_change);

    $('#btn_graf').on("click",graph_indice);

    $('#close_graphic').on("click",graph_close);
    
    $('#close_panel').on("click",panel_close);

    // $('#mdl').on("click",".dowload_report",download_formato);


    initial();
    // graph_indice();
});
