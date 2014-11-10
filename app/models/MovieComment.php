<?php

class MovieComment extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'movie_comment';

    protected $guarded = [];

    public function movie() {
        return $this->hasMany('Movie');
    }

    public function user() {
        return $this->belongsTo('User');
    }

}
