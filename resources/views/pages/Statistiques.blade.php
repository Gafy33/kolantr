<!DOCTYPE html>
<html>
    <head>
        <title>Statistiques</title>
        <meta charset= "utf-8">

        <style>
            table
            {
                border-collapse: collapse; /* Les bordures du tableau seront collées (plus joli) */
            }
            td, th
            {
                border: 1px solid black;
            }
        </style>
    </head>

    <body>
        <table>
            <tr>
                <th>typeV</th>
                <th>NbVehicule</th>
                <th>NbEssieu</th>
                <th>VitMoyenne</th>
                <th>VitMax</th>
                <th>VitesseInferieureOuEgale</th>
                <th>VitesseLimitMoins20</th>
                <th>VitesseLimitPlus20</th>
                <th>VitesseLimitPlus30</th>
                <th>VitesseLimitPlus40</th>
                <th>VitesseLimitPlus50</th>
            </tr>
            @foreach($Stats as $Stat)
            <tr>
                <td>{!! $Stat->typeV !!}</td>
                <td>{!! $Stat->NbVehicule !!}</td>
                <td>{!! $Stat->NbEssieux !!}</td>
                <td>{!! $Stat->VitMoyenne !!}</td>
                <td>{!! $Stat->VitMax !!}</td>
                <td>{!! $Stat->VitesseInferieureOuEgale !!}</td>
                <td>{!! $Stat->VitesseLimitMoins20 !!}</td>
                <td>{!! $Stat->VitesseLimitPlus20 !!}</td>
                <td>{!! $Stat->VitesseLimitPlus30 !!}</td>
                <td>{!! $Stat->VitesseLimitPlus40 !!}</td>
                <td>{!! $Stat->VitesseLimitPlus50 !!}</td>
            </tr>
            @endforeach

    </body>
</html>

