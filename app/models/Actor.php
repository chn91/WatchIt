<?php

class Actor extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actors';

    protected $fillable = ['fName', 'lName', 'bio', 'birthday', 'nationality_id'];

    public function image() {
        if ($this->image != null) {
            return 'https://image.tmdb.org/t/p/w396/' . $this->image;
        } else {
            return asset('img/nophoto.jpg');
        }
    }

    public function nationality() {
        return $this->hasOne('Nationality');
    }

    public function movies() {
        return $this->belongsToMany('Movie');
    }

    public function comments() {
        return $this->hasMany('ActorComment')->orderBy('created_at', 'DESC');
    }

    public function likes() {
        $sum = DB::select('SELECT SUM(`like`) as sum FROM actor_likes WHERE actor_id = ' . $this->id);
        return $sum[0]->sum != null ? $sum[0]->sum : 0;
    }

}
