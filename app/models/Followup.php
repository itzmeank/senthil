<?php

class Followup extends Eloquent 
{
	protected $guarded = ['id'];

	public function incident() {
		return $this->belongsTo('Incident');
	}
}