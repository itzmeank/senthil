<?php


class IncidentsController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth');
    }
	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//if ( Auth::user()->branch === 'All' ) {
			  //$incidents = DB::table('incidents')->paginate(10);
		//} else {
			$incidents = Incident::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
			// $incidents = DB::table('incidents')->paginate(10);
		//}

		return View::make('incidents.index')
			->with('incidents', $incidents);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// if (! Entrust::can('create_incident') ){
		// 	return Redirect::to('incidents');
		// }
		
		return View::make('incidents.form')
            ->with('branches', IncidentForm::$branches)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
			->with('report', IncidentForm::$report)
            ->with('witnessType', IncidentForm::$witnessType);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$incident = new Incident;
		$incidentData = Input::all();
		$witnesses = Input::get('witnesses');
		$followups = Input::get('followups');
		$documents = Input::get('documents');
	
		unset($incidentData['witnesses']);
		unset($incidentData['followups']);
		unset($incidentData['documents']);
		$incidentData['user_id'] = Auth::user()->id;
		$incident->fill($incidentData);
		$incident->save();

		// find a better place for this.
		for ( $i = 0; $i < count($witnesses); $i++ ) {
			if ( $witnesses[$i]['first_name'] ) {
				$witness = new Witness;
				$witness->fill($witnesses[$i]);
				$incident->witnesses()->save( $witness );
			}
		}

		for ( $i = 0; $i < count($followups); $i++ ) {
			if ( $followups[$i]['staff'] ) {
				$followup = new Followup;
				$followup->fill($followups[$i]);
				$incident->followups()->save( $followup );
			}		
		}

		for ( $i = 0; $i < count($documents); $i++ ) {
			if ( $documents[$i]['path'] ) {
				$document = new Document;
				$document->fill($documents[$i]);
				$incident->documents()->save( $document );
			}		
		}

		return View::make('incidents.form1')
            ->with('branches', IncidentForm::$branches)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
	}
	public function get_add()
	{
	return View::make('incidents.form1')
            ->with('branches', IncidentForm::$branches)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
	
	}
	public function get_add1()
	{
	return View::make('incidents.form2');
            
	
	}
	
	public function add()
	{
		//$incident = new Incident;
		$id= DB::table('incidents')->max('id');
		
		
		//$post = new IncidentDocument;
	   // $post->incident_id = $id;
		//$post->path = $fileName;
		//$post->save();	
		
		$incident = Incident::find($id);
		$incidentData = Input::all();
		
		//echo '<pre>';
		//dd($incidentData);
	
		//$witnesses = Input::get('witnesses');
		//$followups = Input::get('followups');
		//$documents = Input::get('documents');

		//unset($incidentData['witnesses']);
		//unset($incidentData['followups']);
		//unset($incidentData['documents']);
		
		
		
		$incident->fill($incidentData);
			
		$incident->save();
		$input = array(
   		 'docpath' => Input::file('docpath')
		);
 
		$rules = array(
   		 'docpath' => 'mimes:pdf,doc,docx|max:500'
		);
 
        $validator = Validator::make($input, $rules);
		
		//if($validator->passes())
		//{
		$fileName='';
		if (Input::hasFile('docpath'))
		{				
			$fileName = Input::file('docpath')->getClientOriginalName();
			$ext=File::extension($fileName);
			
			$fileName= $id.'.'.$ext;
			//dd($fileName);
			
			Input::file('docpath')->move('post_doc/', $fileName);
			//Input::upload('image', 'public/posts', $filename);
		
		}
		$incident->docpath=$fileName;
		$incident->save();
        //}
		// find a better place for this.
		/*for ( $i = 0; $i < count($witnesses); $i++ ) {
			if ( $witnesses[$i]['first_name'] ) {
				$witness = new Witness;
				$witness->fill($witnesses[$i]);
				$incident->witnesses()->save( $witness );
			}
		}

		for ( $i = 0; $i < count($followups); $i++ ) {
			if ( $followups[$i]['staff'] ) {
				$followup = new Followup;
				$followup->fill($followups[$i]);
				$incident->followups()->save( $followup );
			}		
		}

		for ( $i = 0; $i < count($documents); $i++ ) {
			if ( $documents[$i]['path'] ) {
				$document = new Document;
				$document->fill($documents[$i]);
				$incident->documents()->save( $document );
			}		
		}*/
	//dd($incidentData);
		return View::make('incidents.form2')
           ->with('branches', IncidentForm::$branches)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
	//return View::make('incidents.form2');
            
	}
	
	public function add1()
	{
		//$incident = new Incident;
		$id= DB::table('incidents')->max('id');

		
		$incident = Incident::find($id);
		$incidentData = Input::all();
	
		$witnesses = Input::get('witnesses');
		//echo "<pre>";
		//dd($witnesses);
		//die;
		//$followups = Input::get('followups');
		//$documents = Input::get('documents');

		unset($incidentData['witnesses']);
		//unset($incidentData['followups']);
		//unset($incidentData['documents']);
		
		$incident->fill($incidentData);
		$incident->save();

		// find a better place for this.
		for ( $i = 0; $i < count($witnesses); $i++ ) {
			if ( $witnesses[$i]['first_name'] ) {
				$witness = new Witness;
				$witness->fill($witnesses[$i]);
			    $incident->witnesses()->save( $witness );
			}
		}

		/*for ( $i = 0; $i < count($followups); $i++ ) {
			if ( $followups[$i]['staff'] ) {
				$followup = new Followup;
				$followup->fill($followups[$i]);
				$incident->followups()->save( $followup );
			}		
		}

		for ( $i = 0; $i < count($documents); $i++ ) {
			if ( $documents[$i]['path'] ) {
				$document = new Document;
				$document->fill($documents[$i]);
				$incident->documents()->save( $document );
			}		
		}*/
		
       return View::make('incidents.form3')
            ->with('branches', IncidentForm::$branches)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
		
	}
	
	public function get_add2()
	{
	return View::make('incidents.form3');
            
	
	}
	
	public function add2()
	{
		//$incident = new Incident;
		
		$id= DB::table('incidents')->max('id');

		
		$incident = Incident::find($id);
		$incidentData = Input::all();
	
		//$witnesses = Input::get('witnesses');
		$followups = Input::get('followups');
		$documents = Input::get('documents');

		//unset($incidentData['witnesses']);
		unset($incidentData['followups']);
		unset($incidentData['documents']);
		
		$incident->fill($incidentData);
		$incident->save();

		// find a better place for this.
		/*for ( $i = 0; $i < count($witnesses); $i++ ) {
			if ( $witnesses[$i]['first_name'] ) {
				$witness = new Witness;
				$witness->fill($witnesses[$i]);
				$incident->witnesses()->save( $witness );
			}
		}*/

		for ( $i = 0; $i < count($followups); $i++ ) {
			if ( $followups[$i]['staff'] ) {
				$followup = new Followup;
				$followup->fill($followups[$i]);
				$incident->followups()->save( $followup );
			}		
		}

		for ( $i = 0; $i < count($documents); $i++ ) {
			if ( $documents[$i]['path'] ) {
				$document = new Document;
				$document->fill($documents[$i]);
				$incident->documents()->save( $document );
			}		
		}
		
      // return View::make('incidents');
	    $redirectionto='incidents/'.$incident->id;
	  return Redirect::to($redirectionto);
          
		
	}
	
	
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$incident = Incident::find($id);
		$witnesses = $incident->witnesses()->get();
		$followups = $incident->followups()->get();
		$documents = $incident->documents()->get();
		
		return View::make('incidents.show')
			->with('incident', $incident)
			->with('witnesses', $witnesses)
			->with('followups', $followups)
			->with('documents', $documents);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$incident = Incident::find($id);
		$witnesses = $incident->witnesses()->get();
		$followups = $incident->followups()->get();
		$documents = $incident->documents()->get();

        return View::make('incidents.edit')
            ->with('incident', $incident)
			->with('status', IncidentForm::$status)
            ->with('witnesses', $witnesses)
			->with('report', IncidentForm::$report)
			->with('followups', $followups)
			->with('documents', $documents)
            ->with('branches', IncidentForm::$branches)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
			
			
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$incident = Incident::find($id);
		$incidentData = Input::all();
		
		//$witnesses = Input::get('witnesses');
		//$followups = Input::get('followups');
		//$documents = Input::get('documents');

		//unset($incidentData['witnesses']);
		//unset($incidentData['followups']);
		//unset($incidentData['documents']);
       
		$incident->fill($incidentData);
		Session::put('id', $incident->id);
		$incident->save();
		
		

		// find a better place for this.
		/* for ( $i = 0; $i < count($witnesses); $i++ ) {
			if (! empty($witnesses[$i]['id']) ) {
				$witness = Witness::find($witnesses[$i]['id']);
				$witness->fill($witnesses[$i]);
				$witness->save();
			} else {
				$witness = new Witness;
				$witness->fill($witnesses[$i]);
				$incident->witnesses()->save( $witness );
			}
		}

		for ( $i = 0; $i < count($followups); $i++ ) {
			if (! empty($followups[$i]['id']) ) {
				$followup = Followup::find($followups[$i]['id']);
				$followup->fill($followups[$i]);
				$followup->save();
			} else {
				$followup = new Followup;
				$followup->fill($followups[$i]);
				$incident->followups()->save( $followup );
			}
		}

		for ( $i = 0; $i < count($documents); $i++ ) {
			if (! empty($documents[$i]['id']) ) {
				$document = Document::find($documents[$i]['id']);
				$document->fill($documents[$i]);
				$document->save();
			} else {
				$document = new Document;
				$document->fill($documents[$i]);
				$incident->documents()->save( $document );
			}
		}*/
		
		
		return View::make('incidents.edit1')
			 ->with('incident', $incident)
			 ->with('status', IncidentForm::$status)
           // ->with('witnesses', $witnesses)
			->with('report', IncidentForm::$report)
			//->with('followups', $followups)
			//->with('documents', $documents)
            ->with('branches', IncidentForm::$branches)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
		
	}
	
	public function get_edit2()
	{
	 return View::make('incidents.edit2');
	}   
	
	public function get_edit3()
	{
	 return View::make('incidents.edit3');
	}   
	
	public function edit2($id)
	{
	   // $incident = Incident::find($id);
	   
	    $incident = Incident::find($id);
		
		//$followups = $incident->followups()->get();
		//$documents = $incident->documents()->get();
		
	   // $id=Session::get('id');
	   
	    $incident = new Incident;
		$incidentData = Input::all();
		//echo "<pre>";
		//dd($incidentData);
		$incidentData = Input::except('docpath');
		DB::table('incidents')
                    ->where('id', '=',$id)
					->update($incidentData);
		
		//$followups = $incident->followups()->get();
		//$documents = $incident->documents()->get();
	   // $id=Session::get('id');
	   
	    $fileName='';
		//dd($incident->docpath);
		//exit;
		if (Input::hasFile('docpath'))
		{				
			$fileName = Input::file('docpath')->getClientOriginalName();
			$ext=File::extension($fileName);
			
			$fileName= $id.'.'.$ext;
			//dd($fileName);
			
			Input::file('docpath')->move('post_doc/', $fileName);
			//Input::upload('image', 'public/posts', $filename);
		
		}
		$incident = Incident::find($id);
		
		if(trim($fileName) != '')
			$incident->docpath = $fileName;
		else
		{
			$incident->docpath = $incident->docpath;
		}
		//$incident->docpath=$fileName;
		$incident->save();
		
		
		
		$newwitnesses = new Witness;
		
		//$newwitnesses->incident_id=$id;
		//$id="incident_id=$witness->incident_id";
		$newwitnesses= DB::table('witnesses')->where('incident_id','=',$id)->get();
		//$witness->where('id', '=', $id)->first($columns);
		//$newwitnesses=serialize($newwitnesses);
		//$witness = DB::Query('select * from witnesses where id = $witness->incident_id');
		//echo '<pre>';
	   // var_dump($newwitnesses);
	    //die;
		//$witness = Witness::find($id);
		
		//$witnessData = Input::all();
		 
		//$witness = Witness::find(Session::get('id'));	
		///dd($witness);
		
		$incidentData = Input::all();
	   
		$witnesses = Input::get('witnesses');
		
		//$followups = Input::get('followups');
		//$documents = Input::get('documents');

		//unset($incidentData['witnesses']);
		//unset($incidentData['followups']);
		//unset($incidentData['documents']);
		
		//$incident->fill($incidentData);
		//$incident->save();

		//$followups = Input::get('followups');
		//$documents = Input::get('documents');
		//dd($witnesses);

		// unset($incidentData['witnesses']);
		 //unset($incidentData['followups']);
		 //unset($incidentData['documents']);
		
		//$witness->fill($incidentData);
		//Session::put('id', $incident->id);
		//$witness->save();

		// find a better place for this.
		//for ( $i = 0; $i < count($witnesses); $i++ ) {
			//if ( $witnesses[$i]['first_name'] ) {
				//$witness = new Witness;
				//$witness->fill($witnesses[$i]);
				//$incident->witnesses()->save( $witness );
			//}
		//}

	 return View::make('incidents.edit2')
	        ->with('branches', IncidentForm::$branches)
			->with('newwitnesses',$newwitnesses)
			->with('witnesses', $witnesses)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
			
			
	
	}
	
	public function edit3($id)
	{
	    $incident = Incident::find($id);
		//$witnesses = $incident->witnesses()->get();
		//$followups = $incident->followups()->get();
		//$documents = $incident->documents()->get();
		
		//dd($id);
		
		$newfollowup = new Followup;
		
		//$newwitnesses->incident_id=$id;
		//$id="incident_id=$witness->incident_id";
		$newfollowup= DB::table('followups')->where('incident_id','=',$id)->get();
		
		$newwitnesses = new Witness;
		
		//$newwitnesses->incident_id=$id;
		//$id="incident_id=$witness->incident_id";
		$newwitnesses= DB::table('witnesses')->distinct()->where('incident_id','=',$id)->get();
	    //$newwitnesses->id;
		//echo "<pre>";
		//print_r($newwitnesses);
		//die;
		//$incident = Incident::find($id);
		//$incidentData = Input::all();
		if(empty($newwitnesses))
		{
		//$witnesses = new Witness;
		$witnesses = Input::get('witnesses');
		for ( $i = 0; $i < count($witnesses); $i++ ) {
		
		
		//$witnesses['incident_id']=$incident->id; 
		//$witnesses->fill($witnesses[0]);
		//$witnesses->save();
		
				$witness = new Witness;
				$witness->fill($witnesses[$i]);
				$incident->witnesses()->save( $witness );
		
		}
		}
		else
		{
		if(!empty($newwitnesses))
		{
		$witness=Witness::find($newwitnesses[0]->id);
			//echo '<pre>';
			//dd($witness);
			//die;
	    //$incident = Incident::find($id);
		//$witnesses = witnesses()->get();
		$witnesses = Input::get('witnesses');
		
		//$witnesses= array($witnesses);
		//$witnesses = Input::all();
		
		//echo "<pre>";
		//print_r($witnesses);
		//print_r($witnesses[1]);
		//$die;
		//$followups = Input::get('followups');
		//$documents = Input::get('documents');

		//unset($incidentData['witnesses']);
		//unset($incidentData['followups']);
		//unset($incidentData['documents']);
		
		//$incident->fill($incidentData);
		//Session::put('id', $incident->id);
		//$witnesses->amend();

		// find a better place for this.
		//$name=Input::get('first_name');
		
		//dd($name);
		if(isset($newwitnesses[0]->id))
		{
		for ( $i = 0; $i < count($witnesses); $i++ ) {
			if ( $witnesses[$i]['first_name'] ) {
				$witness = new Witness;
				$witness->id=$newwitnesses[0]->id;
				//$witness = Witness::find($newwitnesses[0]->id);
				//$witness->incident_id=$newwitnesses[0]->incident_id;
				$witness->fill($witnesses[$i]);
				//print_r($witness);
				$affected = DB::table('witnesses')
                    ->where('id', '=',$newwitnesses[0]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                    ->update(array('type' => $witnesses[0]['type'],'involvement' => $witnesses[0]['involvement'],'first_name' => $witnesses[0]['first_name'],'last_name' => $witnesses[0]['last_name'],'age' => $witnesses[0]['age'],'address' => $witnesses[0]['address'],'city' => $witnesses[0]['city'],'state' => $witnesses[0]['state'],'zip' => $witnesses[0]['zip'],'phone' => $witnesses[0]['phone'],'email' => $witnesses[0]['email']));
				//$witnesses()->$witness->save($witness);
				//$witness->update( array($witness) );
			}
		}
		}
		
		if(isset($newwitnesses[1]->id))
		{
		     $witness = new Witness;
				$witness->id=$newwitnesses[1]->id;
				$witness->fill($witnesses[1]);
		   $affected = DB::table('witnesses')
                    ->where('id', '=',$newwitnesses[1]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                    ->update(array('type' => $witnesses[1]['type'],'involvement' => $witnesses[1]['involvement'],'first_name' => $witnesses[1]['first_name'],'last_name' => $witnesses[1]['last_name'],'age' => $witnesses[1]['age'],'address' => $witnesses[1]['address'],'city' => $witnesses[1]['city'],'state' => $witnesses[1]['state'],'zip' => $witnesses[1]['zip'],'phone' => $witnesses[1]['phone'],'email' => $witnesses[1]['email']));
					
		}
		if(isset($newwitnesses[2]->id))
		{
		     $witness = new Witness;
				$witness->id=$newwitnesses[2]->id;
				$witness->fill($witnesses[2]);
		   $affected = DB::table('witnesses')
                    ->where('id', '=',$newwitnesses[2]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                    ->update(array('type' => $witnesses[2]['type'],'involvement' => $witnesses[2]['involvement'],'first_name' => $witnesses[2]['first_name'],'last_name' => $witnesses[2]['last_name'],'age' => $witnesses[2]['age'],'address' => $witnesses[2]['address'],'city' => $witnesses[2]['city'],'state' => $witnesses[2]['state'],'zip' => $witnesses[2]['zip'],'phone' => $witnesses[2]['phone'],'email' => $witnesses[2]['email']));
					
		}
		if(isset($newwitnesses[3]->id))
		{
		     $witness = new Witness;
				$witness->id=$newwitnesses[3]->id;
				$witness->fill($witnesses[3]);
		   $affected = DB::table('witnesses')
                    ->where('id', '=',$newwitnesses[3]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                    ->update(array('type' => $witnesses[3]['type'],'involvement' => $witnesses[3]['involvement'],'first_name' => $witnesses[3]['first_name'],'last_name' => $witnesses[3]['last_name'],'age' => $witnesses[3]['age'],'address' => $witnesses[3]['address'],'city' => $witnesses[3]['city'],'state' => $witnesses[3]['state'],'zip' => $witnesses[3]['zip'],'phone' => $witnesses[3]['phone'],'email' => $witnesses[3]['email']));
					
		}
		}	
		}	
		/*for ( $i = 0; $i < count($witnesses); $i++ ) {
			if (! empty($witnesses[$i]['id']) ) {
				$witness = Witness::find($witnesses[$i]['id']);
				$witness->fill($witnesses[$i]->id);
				$witness->save();
			} else {
				$witness = new Witness;
				$witness->fill($witnesses[$i]->id);
				$incident->witnesses()->save( $witness );
			}
		}*/
		
	
		
		
	 return View::make('incidents.edit3')
	        ->with('branches', IncidentForm::$branches)
		    ->with('incident', $incident)
			->with('newfollowup',$newfollowup)
            ->with('offSiteLocations', IncidentForm::$offSiteLocations)
            ->with('locations', IncidentForm::$locations)
            ->with('involvement', IncidentForm::$involvement)
            ->with('gender', IncidentForm::$gender)
            ->with('witnessType', IncidentForm::$witnessType);
			
			
	
	}
	
	public function edit4($id)
	{
	    $incident = Incident::find($id);
		//$witnesses = $incident->witnesses()->get();
		//$followups = $incident->followups()->get();
		//$documents = $incident->documents()->get();
	    //$id=Session::get('id');
		//$incident = Incident::find($id);
		//$followups = Input::get('followups');
		//echo "<pre>";
		//print_r($followups);
		//die;
		
		//if($followups[1]['id']=='')
		//{
		//for ( $i = 0; $i < count($followups); $i++ ) {
		//$followup = new Followup;
		//$followup->fill($followups[1]);
		//dd($followup);
		//$incident->followups()->save( $followup );
		//}
		
		//}
		
		$newfollowup = new Followup;
		
	
		
		//$newwitnesses->incident_id=$id;
		//$id="incident_id=$witness->incident_id";
		$newfollowup= DB::table('followups')->distinct()->where('incident_id','=',$id)->get();
		
		
		if(empty($newfollowup))
		{
		//$witnesses = new Witness;
		$followups = Input::get('followups');
		
		for ( $i = 0; $i < count($followups); $i++ ) {
		
		
		//$witnesses['incident_id']=$incident->id; 
		//$witnesses->fill($witnesses[0]);
		//$witnesses->save();
		
				$followup = new Followup;
				$followup->fill($followups[$i]);
				$incident->followups()->save( $followup );
		
		}
		}
		else
		{
		
		if(!empty($newfollowup))
		{
		
		$followup=Followup::find($newfollowup[0]->id);
			//echo '<pre>';
			//dd($newfollowup);
		//$witnesses = Input::get('witnesses');
	
		//$witnesses = Input::get('witnesses');
		$followups = Input::get('followups');
		//$documents = Input::get('documents');

		// unset($incidentData['witnesses']);
		//unset($incidentData['followups']);
		//unset($incidentData['documents']);
		
		//$incident->fill($incidentData);
		//Session::put('id', $incident->id);
		//$incident->save();

		// find a better place for this.
		if(isset($newfollowup[0]->id))
		{
		for ( $i = 0; $i < count($followups); $i++ ) {
			if ( $followups[$i]['staff'] ) {
				$followup = new Followup;
				$followup->id=$newfollowup[0]->id;
				$followup->fill($followups[$i]);
				//$incident->followups()->save( $followup );
				$affected = DB::table('followups')
                    ->where('id', '=',$newfollowup[0]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                    ->update(array('date' => $followups[0]['date'],'staff' => $followups[0]['staff'],'whom' => $followups[0]['whom'],'notes'=>$followups[0]['notes']));
			}		
		}
		}
		
			if(isset($newfollowup[1]->id))
			{
		    $followup = new Followup;
				$followup->id=$newfollowup[1]->id;
				$followup->fill($followups[1]);
				//$incident->followups()->save( $followup );
				$affected = DB::table('followups')
                    ->where('id', '=',$newfollowup[1]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                  ->update(array('date' => $followups[1]['date'],'staff' => $followups[1]['staff'],'whom' => $followups[1]['whom'],'notes'=>$followups[0]['notes']));
		
            }
			if(isset($newfollowup[2]->id))
			{
		    $followup = new Followup;
				$followup->id=$newfollowup[2]->id;
				$followup->fill($followups[2]);
				//$incident->followups()->save( $followup );
				$affected = DB::table('followups')
                    ->where('id', '=',$newfollowup[2]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                  ->update(array('date' => $followups[2]['date'],'staff' => $followups[2]['staff'],'whom' => $followups[2]['whom'],'notes'=>$followups[0]['notes']));
		
            }
			if(isset($newfollowup[3]->id))
			{
		    $followup = new Followup;
				$followup->id=$newfollowup[3]->id;
				$followup->fill($followups[3]);
				//$incident->followups()->save( $followup );
				$affected = DB::table('followups')
                    ->where('id', '=',$newfollowup[3]->id)
					//->update(array('first_name' => $witnesses[0]['first_name']));
                  ->update(array('date' => $followups[3]['date'],'staff' => $followups[3]['staff'],'whom' => $followups[3]['whom'],'notes'=>$followups[0]['notes']));
		
            }
			}
			}
		
		$redirectionto='incidents/'.$id;
	  return Redirect::to($redirectionto);
	
	}
	
	// to Generate the pdf file using html2pdf vendor
	public function getpdf($id)
	   {
			$incident = Incident::find($id);
			$witnesses = $incident->witnesses()->get();
			$followups = $incident->followups()->get();
			$documents = $incident->documents()->get();
			$statuses=Input::get('statuses',IncidentForm::$status);
			
		$content =$incident;
		
		require_once(dirname(__DIR__).'/../vendor/html2pdf/libs/html2pdf.class.php');	
		$html2pdf = new HTML2PDF('P','A4','fr');
		$html2pdf->WriteHTML('<pre>'.$content.'</pre>'); // in $content you put your content to have in pdf
		$html2pdf->Output('../public/pdf/incidentdata.pdf', 'F');

		$user = array(
				'email'=>'r.senthilkumar@agriya.in',
				'name'=>'Senthil'
			);
			 
			// the data that will be passed into the mail view blade template
			$data = array(
				'detail'=>'Your awesome detail here',
				'name'  => 'Senthil'
			);
			 
			// use Mail::send function to send email passing the data and using the $user variable in the closure
			Mail::send('emails.welcome', $data, function($message) use ($user)
			{
			  $message->from('admin@site.com', 'Site Admin');
			  $message->to($user['email'], $user['name'])->subject('Welcome to My Laravel app!');
			 // $message->to('r.senthilkumar@agriya.in', 'John Smith')->subject('Welcome!');
			});

	   // Response::make($html2pdf->Output(), 200, array('Content-type' => 'application/pdf'));
		$redirectionto='incidents/'.$incident->id;
		Session::flash('success', 'PDF has beed Created Successfully for this incident');
		return Redirect::to($redirectionto);//->withInput()->with('success', 'PDF has beed Created Successfully for this incident');
	   }
	
	public function generatemail($id)
	{
	
	 //return 'Hello world';
		//$incident = Incident::find($id);
		//$witnesses = $incident->witnesses()->get();
		//$followups = $incident->followups()->get();
		//$documents = $incident->documents()->get();
		
		   $incident = Incident::find($id);
		    Session::put('id', $incident->id);
			$witnesses = $incident->witnesses()->get();
			$followups = $incident->followups()->get();
			$documents = $incident->documents()->get();
			$statuses=Input::get('statuses',IncidentForm::$status);
			
		//$content ="<page><br>".$incident;
		//$content.=$witnesses;
		//$content.=$followups;
		//$content.="<br></page>";
		//$content = $incident;
		//$content.= $witnesses;
		//$content.= $followups;
		$content = View::make('incidents.pdf')
			->with('incident', $incident)
			->with('witnesses', $witnesses)
			->with('followups', $followups)
			->with('documents', $documents);
		
		//print_r($content);
		//die;
		require_once(dirname(__DIR__).'/../vendor/html2pdf/libs/html2pdf.class.php');
		//ob_get_contents();
		//ob_end_clean();
		$html2pdf = new HTML2PDF('P','A4','en');
		$html2pdf->pdf->SetDisplayMode('real');
		$html2pdf->WriteHTML($content,isset($_GET['vuehtml'])); 
		// in $content you put your content to have in pdf
		
		//$html2pdf->WriteHTML(View::make('incidents.show')->with('incident', $incident)->with('witnesses', $witnesses)->with('followups', $followups)->with('documents', $documents));
		
		$html2pdf->Output('../public/pdf/'.$incident->id.'.pdf','F');

		$user = array(
				'email'=>'jeff.finley@ymcasv.org',
				'name'=>'Admin'
			);
			 
			// the data that will be passed into the mail view blade template
			$data = array(
				'detail'=>'Your document details',
				'name'  => 'Admin'
			);
			 //echo $path='../public/pdf/'.$incident->id.'.pdf';
			 //echo $path1='../public/post_doc/'.$incident->docpath;
			
			// use Mail::send function to send email passing the data and using the $user variable in the closure
			Mail::send('emails.welcome', $data, function($message) use ($user)
			{
			 //$incident = Incident::find($id);
			 $value = Session::get('id');
			 $incident = Incident::find($value);
			// print_r($incident->docpath);
			 //die;
			  $message->from('admin@site.com', 'Site Admin');
			  $message->to($user['email'], $user['name'])->subject('Insurance company Email!');
			  $message->attach('../public/pdf/'. $value .'.pdf');
			  if($incident->docpath!='')
			   $message->attach('../public/post_doc/'.$incident->docpath);
			  //$message->attach('../public/pdf/1.pdf');
			  //$message->attach('../public/post_doc/1.pdf');
			 // $message->to('r.senthilkumar@agriya.in', 'John Smith')->subject('Welcome!');
			});

	   // Response::make($html2pdf->Output(), 200, array('Content-type' => 'application/pdf'));
		$redirectionto='incidents/'.$incident->id;
		Session::flash('success', 'Mail send to insurance company successfully');
		return Redirect::to($redirectionto);
		
		//Load the library
		//$this->load->library('html2pdf');

		//$this->html2pdf->folder('../public/pdf/');
		//$this->html2pdf->filename('1.pdf');
		//$this->html2pdf->paper('a4', 'portrait');

		//$data = array(
		//'title' => 'PDF Created',
		//message' => 'Hello World!'
		//);
//Load html view
		//$this->html2pdf->html($this->load->view('pdf', $data, true));

//Check that the PDF was created before we send it
		/*if($path = $this->html2pdf->create('save')) {

		$this->load->library('email');

		$this->email->from('your@example.com', 'Your Name');
		$this->email->to('k.ponraj@agriya.in');

		$this->email->subject('Email PDF Test');
		$this->email->message('Testing the email a freshly created PDF');	

		$this->email->attach($path);

		$this->email->send();

		echo $this->email->print_debugger();

		}*/


       
           
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// incidents should not be deleted.
	}
	
	
    

}