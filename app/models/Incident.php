<?php

class Incident extends Eloquent 
{
	protected $guarded = ['_method', 'id'];

	public function followups() {
		return $this->hasMany('Followup');
	}

	public function witnesses() {
		return $this->hasMany('Witness');
	}

	public function documents() {
		return $this->hasMany('Document');
	}
	
}