$(function(){
    mapHeight = document.getElementsByTagName('body')[0].clientHeight;
    navHeight = document.getElementsByTagName('nav')[0].clientHeight;
    $("#divMapMain").css("height",(mapHeight-navHeight-22) + "px");

    $('#pnl_infra').on("click","input[type='checkbox']",switch_click);

    $('#dgiCmbDel').on("change",dgicmbdel_change);

    $('#dgiFilterSearch').on("click",getSearch);
    
    $('#tramite').on("click",tipo_formato);

    $('#lst_indice').on("click","a",ids_change);

    initial();
});
