@extends('layouts.master')

@section('content')

<h3>Movies</h3>
<h4>Most Watched Movies</h4>
<h4>Most Wanted to Watch Movies</h4>
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

<h3>Users</h3>
<h4>Most Active Users</h4>

<h3>Other stats</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Stat</td>
            <td>Amount</td>
            <td>Stat</td>
            <td>Amount</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Number of movies</td>
            <td>23.000</td>
            <td>Number of actors</td>
            <td>1.000.000</td>
        </tr>
        <tr>
            <td>Number of users</td>
            <td>33.235</td>
            <td>Number of user comments</td>
            <td>1.034.213</td>
        </tr>
        <tr>
            <td>Number of users</td>
            <td>33.235</td>
            <td>Number of user comments</td>
            <td>1.034.213</td>
        </tr>
        <tr>
            <td>Number of users</td>
            <td>33.235</td>
            <td>Number of user comments</td>
            <td>1.034.213</td>
        </tr>
    </tbody>
</table>
<script src="{{ asset('js/chart.min.js') }}"></script>
<script>
    (function() {
        var ctx = document.getElementById('movies-year').getContext('2d');
        var chart = {
            labels:     ['2000', '2001', '2002', '2003', '2004', '2005', '2006'],
            datasets:   [{
                data:           ['300', '245', '648', '393', '282', '763', '493'],
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
            labels:     ['0-10', '10-20', '20-30', '30-40', '40-50'],
            datasets:   [{
                data:           ['2341', '24255', '27536', '36262', '25678'],
                fillColor:      "rgba(107, 170, 228, 0.3)",
                strokeColor:    "#3885cc",
                pointColor:    "#3885cc"
            }]
        };

        new Chart(ctx).Line(chart);
        new Chart(ctx1).Bar(chart1);
        new Chart(ctx2).Bar(chart2);
    })();

</script>

@stop