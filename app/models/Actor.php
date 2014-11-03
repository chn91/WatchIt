<?php

class Actor extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actors';

    protected $fillable = ['fName', 'lName', 'bio', 'birthday', 'nationality_id'];

}
