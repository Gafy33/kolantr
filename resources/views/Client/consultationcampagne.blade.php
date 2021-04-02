@extends('layouts.home', ['title' => 'Gérer Campagne Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">


  <style>
  .modal-window{
  display: none;
  position: fixed;
  z-index: 2;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  text-align: center;
  background: rgba(0,0,0,0.5);
}

.modal-window .iframe{
  position: absolute;
  z-index: 3;
  margin: auto;
  cursor: crosshair;
  width: 100%;
  height: 100%;
}

.show-popup{
  display: block;
}

canvas{
display: block;
text-align: center;
}
.iframe h1 {
  position: absolute;
  color: #fff;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: "Source Sans Pro";
  font-size: 75px;
  font-weight: 1000;
  -webkit-user-select: none;
  user-select: none;
}

.iframe h6 {
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  font-family: 'Chango', cursive;
  font-size: 75px;
  font-weight: 900;
  -webkit-user-select: none;
  user-select: none;
}

.iframe a{
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  outline: none;
  text-decoration: none;
  font-family: "Source Sans Pro";
  font-size: 35px;
  font-weight: 900;
  -webkit-user-select: none;
  user-select: none;
}

@media (max-width: 600px) {
  .iframe h1 {
  	font-size: 2em;
  	font-weight: 500;
}

.iframe h6 {
  top: 65%;
  font-size: 2em;
  font-weight: 900;
}

.iframe a{
  top: 73%;
  font-size: 1.5em;
  font-weight: 900;
}

}

@media (max-width: 1500px) {
  .iframe h1 {
  	font-size: 2.5em;
  	font-weight: 500;
}

.iframe h6 {
  font-size: 2.5em;
  font-weight: 900;
}

.iframe a{
  font-size: 2em;
  font-weight: 900;
}

}

</style>
@stop

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
		
        
@if(!empty($stat_true))
	@include('Client/stat_true')
@else
	@include('Client/stat_false')
@endif

@stop

@section('script')

  <script src="{{ asset('/js/form-validation.js')}}"></script>

@stop