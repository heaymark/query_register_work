$(function(){
    mapHeight = document.getElementsByTagName('body')[0].clientHeight;
    navHeight = document.getElementsByTagName('nav')[0].clientHeight;
    $("#divMapMain").css("height",(mapHeight-navHeight-22) + "px");

    $('#pnl_infra').on("click","input[type='checkbox']",switch_click);

    $('#dgiCmbDel').on("change",dgicmbdel_change);

    $('#dgiFilterSearch').on("click",getSearch);

    $('#btramite').on("click",getSearchTramite);
    
    // $('#bdro').on("click",graph_indice);

    $('[data-tab=tramite]').on("click",tipo_formato);

    $("#tipo_formato").change(tipo_subformato);

    $("#subtipo_formato_select").change(getSearchTramite);

    $('#lst_indice').on("click","a",ids_change);

    initial();
    graph_indice();
});
