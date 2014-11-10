<?php

class ActorComment extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actor_comment';

    protected $guarded = [];

    public function actor() {
        return $this->belongsTo('Actor');
    }

    public function user() {
        return $this->belongsTo('User');
    }

}
