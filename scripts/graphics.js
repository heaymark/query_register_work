function graphbar(objdata,objCategoria,div,titleText,subtitle) {
  /*Highcharts.setOptions({
      colors: objColor
  });*/
  var dta = [];
  dta = objdata;
  chart = new Highcharts.Chart({

      chart: {
          renderTo: div,
          defaultSeriesType: 'column'
      },

      title: {
         text: titleText
      },
      subtitle: {
         text: subtitle
      },
      xAxis: {
         categories: objCategoria,

         crosshair: true
      },
      yAxis: {
         min: 0,
         title: {
            text: 'Numero de Pedido'
         }
      },
      tooltip: {
         headerFormat: '<sPAN style="font-size:10px">{point.key}</sPAN><table>',
         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.NAme}: </td>' +
         '<td style="padding:0"><b>{point.y:.1f} votos</b></td></tr>',
         footerFormat: '</table>',
         shared: true,
         useHTML: true
      },
      plotOptions: {
         column: {
            pointPadding: 0.2,
            borderWidth: 0
         }
      },
      series: [{
         name: 'Partido',
         colorByPoint: true,
         data: dta
     }]
 });

   //$('#'+div).highcharts(jsonGraph);
}

function graphseriebar(objdata,objCategoria,div,titleText) {

    var jsonGraph = {
        chart: {
            type: 'column'
        },
        title: {
            text: titleText
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: objCategoria,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Votos'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: objdata
    };
    $('#'+div).highcharts(jsonGraph);
}

function graptime(objdata,div) {
    // var objArray = [];
    // var data = [];
    // var mes;

    /*var usdeur = [
        [Date.UTC(2018, 8, 1), 3],
        [Date.UTC(2018, 8, 2), 2],
        [Date.UTC(2018, 8, 3), 1],
        [Date.UTC(2018, 8, 4), 4]
    ];*/

    /*for(idx in objdata){
        mes  = parseInt(objdata[idx].mes)-parseInt(1);
        objArray.push([Date.UTC(objdata[idx].anio, mes, objdata[idx].dia), objdata[idx].id_proceso]);
    }*/

    // console.log(usdeur);
    // console.log(objArray);
    // console.log(objdata);

    Highcharts.stockChart('container', {

        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                second: '%Y-%m-%d<br/>%H:%M:%S',
                minute: '%Y-%m-%d<br/>%H:%M',
                hour: '%Y-%m-%d<br/>%H:%M',
                day: '%Y<br/>%m-%d',
                week: '%Y<br/>%m-%d',
                month: '%Y-%m',
                year: '%Y'
            }
        },

        rangeSelector: {
            selected: 1
        },

        series: objdata
    });

}

function graphserieline(objdata,div,titleText) {
    var ary_x = {};
    var objCategoria = [];
    var ary_series = {};
    var data = [];
    for(idx in objdata){
        if(!ary_x.hasOwnProperty(objdata[idx].categories)) {
            ary_x[objdata[idx].categories] = 0;
            objCategoria.push(objdata[idx].categories);
        }

        if(!ary_series.hasOwnProperty(objdata[idx].series)) {
            ary_series[objdata[idx].series] = "";

        }
    }

    for(series in ary_series){
        var cat = Object.create(ary_x);

        ary_series[series] = cat;
    }

    for(idx in objdata){
        ary_series[objdata[idx].series][objdata[idx].categories] = objdata[idx].total;
    }

    for (serie in ary_series){
        var series = {};
        series["name"] = serie
        series["data"] = []
        for (dta in  ary_series[serie]){
            series["data"].push(ary_series[serie][dta]);
        }
        data.push(series);
    }


    var jsonGraph = {
        chart: {
            type: 'spline'
        },


        title: {
            text: titleText.title
        },

        subtitle: {
            text: titleText.subtitle
        },

        xAxis: {
            categories: objCategoria,
            crosshair: true
        },

        yAxis: {
            title: {
                text: titleText.yAxis
            },
            labels: {
                format: '{value} '
            }
        },
        credits: {
            text: 'SEFIN',
            href: 'http://www.example.com',
            position: {
                align: 'right',
                //  x: 10
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            text: 'SEFIN',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: true
                }
            }
        },

        series: data,

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 800
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    };
    $('#'+div).highcharts(jsonGraph);
}

function graphseriebubble(objdata,div,titleText) {
    var ary_x = {};
    var objCategoria = [];
    var ary_series = {};
    var data = [];
    for(idx in objdata){
        if(!ary_x.hasOwnProperty(objdata[idx].categories)) {
            ary_x[objdata[idx].categories] = 0;
            objCategoria.push(objdata[idx].categories);
        }

        if(!ary_series.hasOwnProperty(objdata[idx].series)) {
            ary_series[objdata[idx].series] = "";
        }
    }

    for(series in ary_series){
        var cat = Object.create(ary_x);

        ary_series[series] = cat;
    }

    for(idx in objdata){
        ary_series[objdata[idx].series][objdata[idx].categories] = objdata[idx].total;
    }

    for (serie in ary_series){
        var series = {
            name:"",
            data:[],
            marker: {
                fillColor: {
                    radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                    stops: [
                        [0, 'rgba(255,255,255,0.5)'],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[3]).setOpacity(0.5).get('rgba')]
                    ]
                }
            }
        };
        series["name"] = serie
        series["data"] = []
        for (dta in  ary_series[serie]){
            var categoria = [];
            categoria.push(ary_series[serie][dta]);
            categoria.push(dta);
            series["data"].push(categoria);
        }
        data.push(series);
    }


    var jsonGraph = {
        chart: {
            type: 'bubble',
            plotBorderWidth: 1,
            zoomType: 'xy'
        },


        title: {
            text: titleText.title
        },

        subtitle: {
            text: titleText.subtitle
        },

        xAxis: {
            categories: objCategoria,
            crosshair: true
        },

        yAxis: {
            title: {
                text: titleText.yAxis
            },
            labels: {
                format: '{value} '
            }
        },
        credits: {
            text: 'SEFIN',
            href: 'http://www.example.com',
            position: {
                align: 'right',
                //  x: 10
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            text: 'SEFIN',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: true
                }
            }
        },

        series: data,

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 800
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    };
    $('#'+div).highcharts(jsonGraph);
}

function graphgauge(objdata,objCategoria,div,titleText) {
	var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '90%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
            [0.1, '#55BF3B'], // green
            [0.5, '#DDDF0D'], // yellow
            [0.9, '#DF5353'] // red
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickAmount: 2,
        title: {
            y: -70
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
    };

    // The speed gauge
    var chartSpeed = Highcharts.chart(div, Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'Speed'
        }
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'Speed',
        data: [objdata],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                   '<span style="font-size:12px;color:silver">%</span></div>'
        },
        tooltip: {
            valueSuffix: '%'
        }
    }]
    }));
}

function graphdrill(objdata, div, titletext) {
    var ary_x = {};
    var series = "";

    var ary_series = [];
    var ary_drill = [];

    var objCategoria = [];
    var data = [];

    var total_series = 0;

    for (idx in objdata) {
        if (!ary_x.hasOwnProperty(objdata[idx].categories)) {
            ary_x[objdata[idx].categories] = {
                total: 0,
                drilldown: objdata[idx].drill,
                drill: []
            };

            ary_x[objdata[idx].categories]["total"] = objdata[idx].total;
            ary_x[objdata[idx].categories]["drill"] = {};

            var drill = {
                "name": "Periodos",
                "type": 'bubble',
                "id": objdata[idx].drill,
                "data": [],
                marker: {
                    fillColor: {
                        radialGradient: {cx: 0.4, cy: 0.3, r: 0.7},
                        stops: [
                            [0, 'rgba(255,255,255,0.5)'],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0.5).get('rgba')]
                        ]
                    }
                }
            };

            if (!objCategoria.hasOwnProperty(objdata[idx].categories_drill)) {
                objCategoria.push(objdata[idx].categories_drill);
            }

            var sub_drill = [objdata[idx].total, objdata[idx].categories_drill];
            drill.data.push(sub_drill);


            ary_x[objdata[idx].categories]["drill"][objdata[idx].drill] = drill;
            series = objdata[idx].categories;
        } else {
            ary_x[objdata[idx].categories]["total"] = ary_x[objdata[idx].categories]["total"] + objdata[idx].total;
            var sub_drill = [objdata[idx].total, objdata[idx].categories_drill];

            ary_x[objdata[idx].categories]["drill"][objdata[idx].drill].data.push(sub_drill);
        }
    }


    for (var idx in ary_x) {
        var serie = {
            name: idx,
            y: ary_x[idx]["total"],
            drilldown: ary_x[idx]["drilldown"]
        };

        ary_series.push(serie);

        for (var idx_drill in ary_x[idx]["drill"]) {
            ary_drill.push(ary_x[idx]["drill"][idx_drill]);
        }
    }

    Highcharts.setOptions({
        lang: {
            drillUpText: ' < Regresar a Totales...'
        }
    });
    Highcharts.chart(div, {

        chart: {
            type: 'column'
        },
        title: {
            text: titletext.title
        },
        subtitle: {
            text: titletext.subtitle
        },
        xAxis: {
            type: 'category',
                title: {
                text: titletext.xaxis
            }
        },
        yAxis: {
            title: {
                text: titletext.yaxis
            }

        },
        legend: {
            enabled: true
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
        },
        series: [
            {
                "name": "Total nivel Delegación",
                "colorByPoint": true,
                "data": ary_series
            }
        ],
        drilldown: {
            activeDataLabelStyle: {
                textDecoration: 'none',
            },
            "series":ary_drill
        }
    });
}

function createChart(seriesOptions) {

    Highcharts.stockChart('container', {

        rangeSelector: {
            selected: 4
        },

        yAxis: {
            labels: {
                formatter: function () {
                    return (this.value > 0 ? ' + ' : '') + this.value + '%';
                }
            },
            plotLines: [{
                value: 0,
                width: 2,
                color: 'silver'
            }]
        },

        plotOptions: {
            series: {
                compare: 'percent',
                showInNavigator: true
            }
        },

        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
            valueDecimals: 2,
            split: true
        },

        series: seriesOptions
    });
}