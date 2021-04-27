/*=============================================
=            Graficos Produccion           =
=============================================*/
$(function () {

    //--------------
    //- AREA CHART -
    //--------------
    var areaChartData = {
          labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
          datasets: [
            {
              fillColor           : 'rgba(37,112,187,1)',
              strokeColor         : 'rgba(37,112,187,1)',
              pointColor          : 'rgba(37,112,187,1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [65, 59, 80, 81, 56, 55]
              },
            {
              fillColor           : 'rgba(60,141,188,0.9)',
              strokeColor         : 'rgba(60,141,188,0.8)',
              pointColor          : 'rgba(60,141,188,0.8)',
              pointStrokeColor    : '#2570BB',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(37,112,187,1)',
              data                : [28, 48, 40, 19, 86, 27]
            }
          ]
        }
        var areaChartData2 = {
          labels  : ['Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          datasets: [
            {
              fillColor           : 'rgba(37,112,187,1)',
              strokeColor         : 'rgba(37,112,187,1)',
              pointColor          : 'rgba(37,112,187,1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : [65, 59, 80, 81, 56, 55]
            },
            {
              fillColor           : 'rgba(60,141,188,0.9)',
              strokeColor         : 'rgba(60,141,188,0.8)',
              pointColor          : 'rgba(60,141,188,0.8)',
              pointStrokeColor    : '#2570BB',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(37,112,187,1)',
              data                : [28, 48, 40, 19, 86, 27]
            }
          ]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
        var barChart                         = new Chart(barChartCanvas)
        var barChartData                     = areaChartData
        barChartData.datasets[1].fillColor   = '#00a65a'
        barChartData.datasets[1].strokeColor = '#00a65a'
        barChartData.datasets[1].pointColor  = '#00a65a'
        var barChartOptions                  = {
          //Boolean - Si la escala debe comenzar en cero, o un orden de magnitud hacia abajo desde el valor más bajo
          scaleBeginAtZero        : true,
          //Boolean - Si las líneas de cuadrícula se muestran en el gráfico
          scaleShowGridLines      : true,
          //String - Color de las líneas de la cuadrícula
          scaleGridLineColor      : 'rgba(0,0,0,.05)',
          //Number - Ancho de las líneas de la cuadrícula
          scaleGridLineWidth      : 1,
          //Boolean - Si se muestran líneas horizontales (excepto el eje X)
          scaleShowHorizontalLines: true,
          //Boolean - Si se muestran líneas verticales (excepto el eje Y)
          scaleShowVerticalLines  : true,
          //Boolean - Si hay un trazo en cada barra
          barShowStroke           : true,
          //Number - Ancho de píxel del trazo de la barra
          barStrokeWidth          : 2,
          //Number - Espaciado entre cada uno de los conjuntos de valores X
          barValueSpacing         : 5,
          //Number - Espaciado entre los conjuntos de datos dentro de los valores X
          barDatasetSpacing       : 1,
          //String - Una plantilla de leyenda
          legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - si hacer que la tabla responsiva
          responsive              : true,
          maintainAspectRatio     : true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)

        //-------------
        //- BAR CHART 2-
        //-------------
        var barChartCanvas                   = $('#barChart2').get(0).getContext('2d')
        var barChart                         = new Chart(barChartCanvas)
        var barChartData                     = areaChartData2
        barChartData.datasets[1].fillColor   = '#00a65a'
        barChartData.datasets[1].strokeColor = '#00a65a'
        barChartData.datasets[1].pointColor  = '#00a65a'
        var barChartOptions                  = {
          //Boolean - Si la escala debe comenzar en cero, o un orden de magnitud hacia abajo desde el valor más bajo
          scaleBeginAtZero        : true,
          //Boolean - Si las líneas de cuadrícula se muestran en el gráfico
          scaleShowGridLines      : true,
          //String - Color de las líneas de la cuadrícula
          scaleGridLineColor      : 'rgba(0,0,0,.05)',
          //Number - Ancho de las líneas de la cuadrícula
          scaleGridLineWidth      : 1,
          //Boolean - Si se muestran líneas horizontales (excepto el eje X)
          scaleShowHorizontalLines: true,
          //Boolean - Si se muestran líneas verticales (excepto el eje Y)
          scaleShowVerticalLines  : true,
          //Boolean - Si hay un trazo en cada barra
          barShowStroke           : true,
          //Number - Ancho de píxel del trazo de la barra
          barStrokeWidth          : 2,
          //Number - Espaciado entre cada uno de los conjuntos de valores X
          barValueSpacing         : 5,
          //Number - Espaciado entre los conjuntos de datos dentro de los valores X
          barDatasetSpacing       : 1,
          //String - Una plantilla de leyenda
          legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - si hacer que la tabla responsiva
          responsive              : true,
          maintainAspectRatio     : true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)


  })
