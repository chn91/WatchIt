<?php

class Language extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'languages';

    /**
     * The fillable fields
     *
     * @var array
     */
    protected $fillable = ['language'];

    public function actors() {
        return $this->belongsTo('Actor');
    }

}
