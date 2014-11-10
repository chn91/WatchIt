<?php

/**
 * Class ActorsController
 */
class ActorsController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /movies
     *
     * @return Response
     */
    public function index()
    {
        $actors = Actor::paginate(24);
        return View::make('actors')->with(compact('actors'));
    }

    /**
     * Return a view with a single actor
     *
     * @param Actor $actor
     * @return $this
     */
    public function show(Actor $actor)
    {
        return View::make('actor')->with(compact('actor'));
    }

    public function comment($id)
    {
        # Validate input

        ActorComment::create([
            'actor_id' => $id,
            'user_id' => Auth::user()->id,
            'comment' => Input::get('comment')
        ]);

        return Redirect::back()->withFlashMessage('Your comment has been posted');
    }

    public function like($id) {
        # Determine plus or minus
        (Input::has('plus')) ? $val = 1 : $val = -1;

        DB::insert('INSERT INTO `actor_likes` (`actor_id`, `user_id`, `like`, `created_at`, `updated_at`) VALUES (?, ?, ?, NOW(), NOW())', [
            $id,
            Auth::user()->id,
            $val
        ]);

        return Redirect::back()->withFlashMessage('Your like has been saved');
    }

}