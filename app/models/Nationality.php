<?php

class Nationality extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'nationalities';

    /**
     * The fillable fields
     *
     * @var array
     */
    protected $fillable = ['nationality'];

}
