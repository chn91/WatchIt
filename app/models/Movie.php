<?php

class Movie extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'movies';

    protected $guarded = [];

    public function actors() {
        return $this->belongsToMany('Actor');
    }

    public function genres() {
        return $this->belongsToMany('Genre');
    }

    public function studios() {
        return $this->belongsToMany('Studio');
    }

    public function cover() {
        if ($this->cover != null) {
            return 'https://image.tmdb.org/t/p/w300/' . $this->cover;
        } else {
            return asset('img/nocover.jpg');
        }
    }

    public function comments() {
        return $this->hasMany('MovieComment')->orderBy('created_at', 'DESC');
    }

    public function likes() {
        $sum = DB::select('SELECT SUM(`like`) as sum FROM movie_likes WHERE movie_id = ' . $this->id);
        return $sum[0]->sum != null ? $sum[0]->sum : 0;
    }

    public function watched() {
        $sum = DB::select('SELECT COUNT(*) as sum FROM watched WHERE movie_id = ' . $this->id);
        return $sum[0]->sum != null ? $sum[0]->sum : 0;
    }

    public function toWatch() {
        $sum = DB::select('SELECT COUNT(*) as sum FROM to_watch WHERE movie_id = ' . $this->id);
        return $sum[0]->sum != null ? $sum[0]->sum : 0;
    }

}
