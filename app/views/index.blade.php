@extends('layouts.master')

@section('content')

<h3>Movies</h3>
<h4>10 Most Watched Movies</h4>
<canvas id="movies-watched" width="1100" height="400"></canvas>
<h4>10 Most Wanted to Watch Movies</h4>
<canvas id="movies-towatch" width="1100" height="400"></canvas>
<h4>Movies / Year</h4>
<canvas id="movies-year" width="1100" height="300"></canvas>
<h4>Most Commented Movie</h4>
<h4>Most Popular Movies</h4>
<h4>Most Movies / Studio</h4>
<canvas id="movies-studios" width="1100" height="300"></canvas>

<h3>Actors</h3>
<h4>Actor Ages</h4>
<canvas id="actor-ages" width="1100" height="300"></canvas>
<h4>Most Commented Actor</h4>
<h4>Most Popular Actors</h4>
<h4>Actors in Most Movies</h4>

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

        var ctx1 = document.getElementById('movies-studios').getContext('2d');
        var chart1 = {
            labels:     ['Paramount', 'Fox', 'Sony', 'Warner', 'Universal'],
            datasets:   [{
                data:           ['23392', '24255', '12148', '23393', '31282'],
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

        var ctx3 = document.getElementById('movies-watched').getContext('2d');
        var chart3 = {
            labels: {{ json_encode($topMoviesLabels) }},
            datasets:   [{
                data:           {{ json_encode($topMoviesData) }},
                fillColor:      "rgba(107, 170, 228, 0.3)",
                strokeColor:    "#3885cc",
                pointColor:    "#3885cc"
            }]
        };

        var ctx4 = document.getElementById('movies-towatch').getContext('2d');
                var chart4 = {
                    labels: {{ json_encode($topToWatchLabels) }},
                    datasets:   [{
                        data:           {{ json_encode($topToWatchData) }},
                        fillColor:      "rgba(107, 170, 228, 0.3)",
                        strokeColor:    "#3885cc",
                        pointColor:    "#3885cc"
                    }]
                };

        new Chart(ctx).Line(chart);
        new Chart(ctx1).Bar(chart1);
        new Chart(ctx2).Bar(chart2);
        new Chart(ctx3).Line(chart3);
        new Chart(ctx4).Line(chart4);
    })();

</script>

@stop