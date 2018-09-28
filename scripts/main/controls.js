//ICONO DEL BUSCADOR
var search = L.control({position: 'topright'});
search.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'leaflet-bar'); // create a div with a class "info"
    this._filtro = L.DomUtil.create('a','',this._div);
    this._i_filtro = L.DomUtil.create('i','glyphicon glyphicon-search',this._filtro);
    L.DomEvent.addListener(this._filtro,'click',this.fnToggle,this);
    return this._div;};
search.fnToggle = function () {$("#options").toggle();};

//ICONO DEL EXPORTAR
var exporta = L.control({position: 'topright'});
exporta.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'leaflet-bar'); // create a div with a class "info"
    this._filtro = L.DomUtil.create('a','',this._div);
    this._i_filtro = L.DomUtil.create('i','glyphicon glyphicon-export',this._filtro);
    L.DomEvent.addListener(this._filtro,'click',this.fnToggle,this);
    return this._div;};
exporta.fnToggle = function () {$("#dvdownload").toggle();};

//ICONO REFRESH
var refresh = L.control({position: 'topright'});
refresh.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'leaflet-bar'); // create a div with a class "info"
    this._filtro = L.DomUtil.create('a','',this._div);
    this._i_filtro = L.DomUtil.create('i','glyphicon glyphicon-refresh',this._filtro);
    L.DomEvent.addListener(this._filtro,'click',this.fnRefresh,this);
    return this._div;};
    
	refresh.fnRefresh = function () {
		var latitud = 19.325075030834952;
		var longitud = -99.13307189941406;
		var ptPoint = L.latLng(latitud,longitud);
		objMap._map.setView(ptPoint,11);
	};