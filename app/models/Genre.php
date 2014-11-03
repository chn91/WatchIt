<?php

class Genre extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'genres';

    /**
     * The fillable fields
     *
     * @var array
     */
    protected $fillable = ['name'];

}
