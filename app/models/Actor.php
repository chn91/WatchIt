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

    public function language() {
        return $this->hasOne('Language');
    }

    public function movies() {

    }

    public function comments() {

    }

    public function likes() {
        $sum = DB::select('SELECT SUM(`like`) as sum FROM actor_likes WHERE actor_id = ' . $this->id);
        return $sum[0]->sum;
    }

}
