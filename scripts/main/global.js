var position  = {
    coords:{
        latitude: 19.3899839,
        longitude: -99.099821
    }
};

var styleCercano = ['#untitled_table_3{',
    '[mapnik-geometry-type = 1]{',
    'marker-fill: #A6CEE3;',
    'marker-fill-opacity: 0.9;',
    'marker-line-color: #FFF;',
    'marker-line-width: 1;',
    'marker-line-opacity: 1;',
    'marker-placement: point;',
    'marker-type: ellipse;',
    'marker-width: 10;',
    'marker-allow-overlap: true;',
    '}',
    '[mapnik-geometry-type = 2]{',
    'line-color: #000000;',
    'line-opacity: 1;',
    'line-width: 2.5;',
    '}' ,
    '}',
].join(" ");

var lyrCercanos;

var layerbase = "https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager_labels_under/{z}/{x}/{y}.png";

var paramlayerbase = {
    "minZoom": "0",
    "maxZoom": "20",
    "attribution": " HERE ",
    "subdomains": "abcd"
};

var parammapbase = {
    center: new L.LatLng(19.33123050921937,-99.09942626953125),
    zoom : 11,
    minZoom: 6,
    maxZoom: 20,
    attribution: "CARTO"
}

// var viz = "https://finanzasdf.carto.com/u/finanzasdf-admin/api/v2/viz/6c221ba2-2d07-4704-bb2f-4d47e28ef9e0/viz.json";
var viz = "https://finanzasdf.carto.com/u/develop/api/v2/viz/3a1d9b2a-abad-4905-b508-34046d66bba8/viz.json";

var users = {
    // user: 'finanzasdf-admin'
    user: 'develop',
    api_key: '08d05477f96ae5233bcddda9dcb5aa38f9734938'
};
