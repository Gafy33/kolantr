<div class="row featurette shadow p-3 mb-5">
      <div class="col-md-13">
        <h2 class="featurette-heading @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Graphique   </h2>
        {{ $campagne->adresseCampagne }}
        <h2 class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="text-align: center"> Relevés  sur les 2 types de véhicules </h2>
        <hr>
        <div class="row">
          <div class="col-lg-4" style="width: 33%;">
                <button type="button" class="w-100 btn btn-sm btn-outline-secondary" onclick="AfficherGraphiqueLigne();"> Graphique Ligne</button>
          </div>
          <div class="col-lg-4" style="width: 33%;">
                <button type="button" class="w-100 btn btn-sm btn-outline-secondary" onclick="AfficherGraphiqueCercle();"> Graphique Cercle </button>
          </div>
          <div class="col-lg-4" style="width: 33%;">
                <button type="button" class="w-100 btn btn-sm btn-outline-secondary" onclick="AfficherGraphiqueBarre();"> Graphique Barre </button>
          </div>
        </div>
        <hr>
		        <div id="graphiques_lignes" style="display: block;"></div>
            <div id="graphiques_cercle" style="display: none;"></div>
            <div id="graphiques_barres" style="display: none;"></div>
      </div>
</div>


<script type="text/javascript">

var Campagne = {!! json_encode($campagne->adresseCampagne) !!};
var Limitation = {!! json_encode($campagne->limitationvitesse) !!};
var statVitMoyen = {!! json_encode($statVitMoyen) !!};
var statHeureStat = {!! json_encode($statHeureStat) !!};
var statVitesseInferieurOuEgale = {!! json_encode($statVitesseInferieurOuEgale) !!};
var statVitesseLimitMoins20 = {!! json_encode($statVitesseLimitMoins20) !!};
var statVitesseLimitplus20 = {!! json_encode($statVitesseLimitplus20) !!};
var statVitesseLimitMoins30 = {!! json_encode($statVitesseLimitMoins30) !!};
var statVitesseLimitMoins40 = {!! json_encode($statVitesseLimitMoins40) !!};
var statVitesseLimitMoins50 = {!! json_encode($statVitesseLimitMoins50) !!};
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
for (var i in statVitesseLimitplus20) 
{
  vit3 = vit3 + statVitesseLimitplus20[i];
}
for (var i in statVitesseLimitMoins30) 
{
  vit4 = vit4 + statVitesseLimitMoins30[i];
}
for (var i in statVitesseLimitMoins40) 
{
  vit5 = vit5 + statVitesseLimitMoins40[i];
}
for (var i in statVitesseLimitMoins50)
{
  vit6 = vit6 + statVitesseLimitMoins50[i];
}

vit1 = vit1 / compt;
vit2 = vit2 / compt;
vit3 = vit3 / compt;
vit4 = vit4 / compt;
vit5 = vit5 / compt;
vit6 = vit6 / compt;


Highcharts.chart('graphiques_lignes', {
  chart: {
    type: 'line'
  },
  title: {
    text: Campagne
  },
  xAxis: {
    categories: statHeureStat,
  },
  yAxis: {
    title: {
      text: 'Nombre de véhicule'
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
    data: statVitesseLimitplus20,
  }, {
    name: 'VitesseLimitplus30',
    data: statVitesseLimitMoins30,
  }, {
    name: 'VitesseLimitplus40',
    data: statVitesseLimitMoins40,
  }, {
    name: 'VitesseLimitplus50',
    data: statVitesseLimitMoins50,
  }]
});

// Parse the data from an inline table using the Highcharts Data plugin
Highcharts.chart('graphiques_cercle', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: Campagne
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

Highcharts.chart('graphiques_barres', {
  chart: {
    type: 'column'
  },
  title: {
    text: Campagne
  },
  xAxis: {
    categories: statHeureStat,
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Rainfall (mm)'
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
  series: [{
    name: 'VitesseInferieurOuEgale',
    data: statVitesseInferieurOuEgale,
  }, {
    name: 'VitesseLimitMoins20',
    data: statVitesseLimitMoins20,
  }, {
    name: 'VitesseLimitplus20',
    data: statVitesseLimitplus20,
  }, {
    name: 'VitesseLimitplus30',
    data: statVitesseLimitMoins30,
  }, {
    name: 'VitesseLimitplus40',
    data: statVitesseLimitMoins40,
  }, {
    name: 'VitesseLimitplus50',
    data: statVitesseLimitMoins50,
  }]
});

          function AfficherGraphiqueLigne() {
            var div = document.getElementById("graphiques_lignes");
            var div2 = document.getElementById("graphiques_cercle");
            var div3 = document.getElementById("graphiques_barres");
              div.style.display = "block";
              div2.style.display = "none";
              div3.style.display = "none";
              document.getElementById("graphiques_lignes").disabled = false;
              document.getElementById("graphiques_cercle").disabled = true;
              document.getElementById("graphiques_barres").disabled = true;
					};

					function AfficherGraphiqueCercle() {
					  var div = document.getElementById("graphiques_lignes");
            var div2 = document.getElementById("graphiques_cercle");
            var div3 = document.getElementById("graphiques_barres");
              div.style.display = "none";
              div2.style.display = "block";
              div3.style.display = "none";
              document.getElementById("graphiques_lignes").disabled = true;
              document.getElementById("graphiques_cercle").disabled = false;
              document.getElementById("graphiques_barres").disabled = true;
          };

          function AfficherGraphiqueBarre() {
					  var div = document.getElementById("graphiques_lignes");
            var div2 = document.getElementById("graphiques_cercle");
            var div3 = document.getElementById("graphiques_barres");
              div.style.display = "none";
              div2.style.display = "none";
              div3.style.display = "block";
              document.getElementById("graphiques_lignes").disabled = true;
              document.getElementById("graphiques_cercle").disabled = true;
              document.getElementById("graphiques_barres").disabled = false;
          };
</script>