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
        $movies = Movie::orderBy('release', 'DESC')->paginate(24);
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

    public function comment($id)
    {
        # Validate input

        MovieComment::create([
            'movie_id' => $id,
            'user_id' => Auth::user()->id,
            'comment' => Input::get('comment')
        ]);

        return Redirect::back()->withFlashMessage('Your comment has been posted');
    }

    public function like($id) {
        # Determine plus or minus
        (Input::has('plus')) ? $val = 1 : $val = -1;

        DB::insert('INSERT INTO `movie_likes` (`movie_id`, `user_id`, `like`, `created_at`, `updated_at`) VALUES (?, ?, ?, NOW(), NOW())', [
            $id,
            Auth::user()->id,
            $val
        ]);

        return Redirect::back()->withFlashMessage('Your like has been saved');
    }

    public function watch($id)
    {
        DB::insert('INSERT INTO `watched` (`movie_id`, `user_id`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [
            $id,
            Auth::user()->id,
        ]);

        return Redirect::back()->withFlashMessage('Your choice has been posted');
    }

    public function toWatch($id)
    {
        DB::insert('INSERT INTO `to_watch` (`movie_id`, `user_id`, `created_at`, `updated_at`) VALUES (?, ?, NOW(), NOW())', [
            $id,
            Auth::user()->id,
        ]);

        return Redirect::back()->withFlashMessage('Your choice has been posted');
    }

}