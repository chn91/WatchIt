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

}