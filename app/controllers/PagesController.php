<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response
	 */
	public function index()
	{
        $ages = DB::select('select count(*) as sum
                                from (
                                select  case
                                    when  age between 0 and 10 then 1
                                    when  age between 11 and 20 then 2
                                    when  age between 21 and 30 then 3
                                    when  age between 31 and 40 then 4
                                    when  age between 41 and 50 then 5
                                    when  age between 51 and 60 then 6
                                    when  age between 61 and 70 then 7
                                    when  age between 71 and 80 then 8
                                    when  age between 81 and 90 then 9
                                    when  age > 91 then 10
                                end as AgeGroup
                                    from (
                                        SELECT ROUND(DATEDIFF(Cast(NOW() as Date),
                                        Cast(birthday as Date)) / 365, 0) as age
                                        FROM actors
                                        WHERE deathday is null
                                    ) as SubQueryAlias
                                ) as SubQueryAlias2
                            group by AgeGroup');

        $agesArr = [];

        foreach($ages as $age) {
            $agesArr[] = $age->sum;
        }

        array_shift($agesArr);
        array_pop($agesArr);

        $ageLabels = ['10-20', '20-30', '30-40', '40-50', '50-60', '60-70', '70-80', '80-90', '> 90'];

        $movies = DB::select('SELECT
                              Year(`release`) as year,
                              Count(*) As total
                              FROM movies
                              GROUP BY Year(`release`)');

        $movieLabels = [];
        $movieData = [];

        for ($i = count($movies) - 20; $i < count($movies); $i++) {
            $movieLabels[] = $movies[$i]->year;
            $movieData[] = $movies[$i]->total;
        }

        $topMovies = DB::select('SELECT movies.title, COUNT(`movie_id`) as sum
                                FROM movies, watched
                                WHERE movies.id = watched.movie_id
                                GROUP BY movie_id
                                ORDER BY sum DESC
                                LIMIT 10');

        $topMoviesLabels = [];
        $topMoviesData = [];

        foreach($topMovies as $topMovie) {
            $topMoviesLabels[] = $topMovie->title;
            $topMoviesData[] = $topMovie->sum;
        }

        $toWatch = DB::select('SELECT movies.title, COUNT(`movie_id`) as sum
                                FROM movies, to_watch
                                WHERE movies.id = to_watch.movie_id
                                GROUP BY movie_id
                                ORDER BY sum DESC
                                LIMIT 10');

        $topToWatchLabels = [];
        $topToWatchData = [];

        foreach($toWatch as $topMovie) {
            $topToWatchLabels[] = $topMovie->title;
            $topToWatchData[] = $topMovie->sum;
        }

        $studioLabels = ['Warner Bros.', 'Universal', 'Paramount', 'Sony', 'Disney', 'FOX'];

		return View::make('index')
            ->with(compact('movieLabels'))
            ->with(compact('movieData'))
            ->with(compact('agesArr'))
            ->with(compact('ageLabels'))
            ->with(compact('topMoviesLabels'))
            ->with(compact('topMoviesData'))
            ->with(compact('topToWatchLabels'))
            ->with(compact('topToWatchData'));
	}
}