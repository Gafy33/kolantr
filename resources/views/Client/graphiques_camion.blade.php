<div class="row featurette shadow p-3 mb-5">
      <div class="col-md-13">
        <h2 class="featurette-heading tx-black"> Graphique camion</h2>
        <hr>
        <div class="row">
          <div class="col-lg-4" style="width: 33%;">
                <button type="button" class="w-100 btn btn-sm btn-outline-secondary" onclick="AfficherGraphiqueLigne_camion();"> Graphique Ligne</button>
          </div>
          <div class="col-lg-4" style="width: 33%;">
                <button type="button" class="w-100 btn btn-sm btn-outline-secondary" onclick="AfficherGraphiqueCercle_camion();"> Graphique Cercle </button>
          </div>
          <div class="col-lg-4" style="width: 33%;">
                <button type="button" class="w-100 btn btn-sm btn-outline-secondary" onclick="AfficherGraphiqueBarre_camion();"> Graphique Barre </button>
          </div>
        </div>
        <hr>
		        <div id="graphiques_lignes_camion" style="display: block;"></div>
            <div id="graphiques_cercle_camion" style="display: none;"></div>
            <div id="graphiques_barres_camion" style="display: none;"></div>
      </div>
</div>


<script type="text/javascript">

var Campagne = {!! json_encode($campagne->adresseCampagne) !!};
var Limitation = {!! json_encode($campagne->limitationvitesse) !!};
var statVitMoyen = {!! json_encode($statVitMoyen_PL) !!};
var statHeureStat = {!! json_encode($statHeureStat_PL) !!};
var statVitesseInferieurOuEgale = {!! json_encode($statVitesseInferieurOuEgale_PL) !!};
var statVitesseLimitMoins20 = {!! json_encode($statVitesseLimitMoins20_PL) !!};
var statVitesseLimitPlus20 = {!! json_encode($statVitesseLimitPlus20_PL) !!};
var statVitesseLimitPlus30 = {!! json_encode($statVitesseLimitPlus30_PL) !!};
var statVitesseLimitPlus40 = {!! json_encode($statVitesseLimitPlus40_PL) !!};
var statVitesseLimitPlus50 = {!! json_encode($statVitesseLimitPlus50_PL) !!};
var vit1 = 0;
var vit2 = 0;
var vit3 = 0;
var vit4 = 0;
var vit5 = 0;
var vit6 = 0;

var compt = 0;

for (var i in statVitesseInferieurOuEgale) 
{
    vit1 = vit1 + statVitesseInferieurOuEgale[i];
    compt = compt + 1;
}
for (var i in statVitesseLimitMoins20) 
{
  vit2 = vit2 + statVitesseLimitMoins20[i];
}
for (var i in statVitesseLimitPlus20) 
{
  vit3 = vit3 + statVitesseLimitPlus20[i];
}
for (var i in statVitesseLimitPlus30) 
{
  vit4 = vit4 + statVitesseLimitPlus30[i];
}
for (var i in statVitesseLimitPlus40) 
{
  vit5 = vit5 + statVitesseLimitPlus40[i];
}
for (var i in statVitesseLimitPlus50)
{
  vit6 = vit6 + statVitesseLimitPlus50[i];
}

vit1 = vit1 / compt;
vit2 = vit2 / compt;
vit3 = vit3 / compt;
vit4 = vit4 / compt;
vit5 = vit5 / compt;
vit6 = vit6 / compt;


Highcharts.chart('graphiques_lignes_camion', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Limitation : ' + Limitation + ' km/h',
  },
  xAxis: {
    categories: statHeureStat,
  },
  yAxis: {
    title: {
      text: 'Nombre de camions'
    },
    plotLines:  [{
        value: Limitation,
        color: 'red',
        width: 1,
        label: {
          text: Limitation
        }
      }]
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: false
    }
  },
  series: [{
    name: 'VitesseInferieurOuEgale',
    data: statVitesseInferieurOuEgale,
  }, {
    name: 'VitesseLimitMoins20',
    data: statVitesseLimitMoins20,
  }, {
    name: 'VitesseLimitplus20',
    data: statVitesseLimitPlus20,
  }, {
    name: 'VitesseLimitplus30',
    data: statVitesseLimitPlus30,
  }, {
    name: 'VitesseLimitplus40',
    data: statVitesseLimitPlus40,
  }, {
    name: 'VitesseLimitplus50',
    data: statVitesseLimitPlus50,
  }]
});

// Parse the data from an inline table using the Highcharts Data plugin
Highcharts.chart('graphiques_cercle_camion', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: 'Limitation : ' + Limitation + ' km/h',
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      depth: 35,
      dataLabels: {
        enabled: true,
        format: '{point.name}'
      }
    }
  },
  series: [{
    type: 'pie',
    name: 'Browser share',
    data: [
        {
          name: 'VitesseInferieurOuEgale',
          y: vit1,
        }, {
          name: 'VitesseLimitMoins20',
          y: vit2,
        }, {
          name: 'VitesseLimitplus20',
          y: vit3,
        }, {
          name: 'VitesseLimitplus30',
          y: vit4,
        }, {
          name: 'VitesseLimitplus40',
          y: vit5,
        }, {
          name: 'VitesseLimitplus50',
          y: vit6,
        }
    ]
  }]
});

Highcharts.chart('graphiques_barres_camion', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Limitation : ' + Limitation + ' km/h',
  },
  xAxis: {
    categories: statHeureStat,
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Nombre de camions'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:f} <i class="fas fa-truck" width="40" height="40" fill="currentColor"></i></b></td></tr>',
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
    name: 'VitesseInferieurOuEgale',
    data: statVitesseInferieurOuEgale,
  }, {
    name: 'VitesseLimitMoins20',
    data: statVitesseLimitMoins20,
  }, {
    name: 'VitesseLimitplus20',
    data: statVitesseLimitPlus20,
  }, {
    name: 'VitesseLimitplus30',
    data: statVitesseLimitPlus30,
  }, {
    name: 'VitesseLimitplus40',
    data: statVitesseLimitPlus40,
  }, {
    name: 'VitesseLimitplus50',
    data: statVitesseLimitPlus50,
  }]
});

          function AfficherGraphiqueLigne_camion() {
            var div = document.getElementById("graphiques_lignes_camion");
            var div2 = document.getElementById("graphiques_cercle_camion");
            var div3 = document.getElementById("graphiques_barres_camion");
              div.style.display = "block";
              div2.style.display = "none";
              div3.style.display = "none";
              document.getElementById("graphiques_lignes_camion").disabled = false;
              document.getElementById("graphiques_cercle_camion").disabled = true;
              document.getElementById("graphiques_barres_camion").disabled = true;
					};

					function AfficherGraphiqueCercle_camion() {
					  var div = document.getElementById("graphiques_lignes_camion");
            var div2 = document.getElementById("graphiques_cercle_camion");
            var div3 = document.getElementById("graphiques_barres_camion");
              div.style.display = "none";
              div2.style.display = "block";
              div3.style.display = "none";
              document.getElementById("graphiques_lignes_camion").disabled = true;
              document.getElementById("graphiques_cercle_camion").disabled = false;
              document.getElementById("graphiques_barres_camion").disabled = true;
          };

          function AfficherGraphiqueBarre_camion() {
					  var div = document.getElementById("graphiques_lignes_camion");
            var div2 = document.getElementById("graphiques_cercle_camion");
            var div3 = document.getElementById("graphiques_barres_camion");
              div.style.display = "none";
              div2.style.display = "none";
              div3.style.display = "block";
              document.getElementById("graphiques_lignes_camion").disabled = true;
              document.getElementById("graphiques_cercle_camion").disabled = true;
              document.getElementById("graphiques_barres_camion").disabled = false;
          };
</script>