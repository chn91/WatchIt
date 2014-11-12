@extends('layouts.master')

@section('content')

<h3>Movies</h3>
<h4>Movies / Year</h4>
<canvas id="movies-year" width="1100" height="400"></canvas>
<h3>Actors</h3>
<h4>Actor Ages</h4>
<canvas id="actor-ages" width="1100" height="400"></canvas>

<script src="{{ asset('js/chart.min.js') }}"></script>
<script>
    (function() {
        var ctx = document.getElementById('movies-year').getContext('2d');
        var chart = {
            labels:     {{ json_encode($movieLabels) }},
            datasets:   [{
                data:           {{ json_encode($movieData) }},
                fillColor:      "rgba(107, 170, 228, 0.3)",
                strokeColor:    "#3885cc",
                pointColor:    "#3885cc"
            }]
        };

        var ctx2 = document.getElementById('actor-ages').getContext('2d');
        var chart2 = {
            labels: {{ json_encode($ageLabels) }},
            datasets:   [{
                data:           {{ json_encode($agesArr) }},
                fillColor:      "rgba(107, 170, 228, 0.3)",
                strokeColor:    "#3885cc",
                pointColor:    "#3885cc"
            }]
        };


        new Chart(ctx).Line(chart);
        new Chart(ctx2).Bar(chart2);
    })();

</script>

@stop