<?php

class SearchController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function index() 
	{
		return Redirect::to('/incidents'); 
	}

	public function show($search) 
	{
		$search = '%' . $search . '%';

		$incidents = DB::table('incidents')
			->where('incident_branch', 'like', $search)
			->orWhere('first_name', 'like', $search)
			->orWhere('last_name', 'like', $search)
			->orWhere('incident_status', 'like', $search)->get();

		return View::make('incidents.index')
			->with('incidents', $incidents);
	}

	
}