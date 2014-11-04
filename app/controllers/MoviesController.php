<?php

/**
 * Class MoviesController
 */
class MoviesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /movies
	 *
	 * @return Response
	 */
	public function index()
	{
        $movies = Movie::paginate(24);
		return View::make('movies')
            ->with(compact('movies'));
	}

    /**
     * Rerturns a view with a single movie
     *
     * @param Movie $movie
     * @return $this
     */
    public function show(Movie $movie)
	{
        return View::make('movie')->with(compact('movie'));
    }

}