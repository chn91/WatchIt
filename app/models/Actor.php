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

    public function movies() {

    }

    public function comments() {

    }

    public function likes() {

    }

}
