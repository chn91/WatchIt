<?php

class Movie extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'movies';

    protected $fillable = ['title', 'resume', 'lenght', 'release', 'cover'];

    public function actors() {

    }

    public function genres() {

    }

    public function cover() {
        if ($this->cover != null) {
            return 'https://image.tmdb.org/t/p/w300/' . $this->cover;
        } else {
            return asset('img/nocover.jpg');
        }
    }

    public function comments() {

    }

    public function likes() {

    }

}
