@extends('layouts.master')

@section('main')
<div class="container first-item">
  <form method="POST" action="incidents/add" accept-charset="UTF-8" enctype="multipart/form-data" id="newIncident">

<fieldset>
				<legend>Guardian \ Emergency Contact Information</legend>
				<div class="row">
					<div class="span2">
						{{ Form::label('parent_first_name', 'First Name') }}
						{{ Form::text('parent_first_name') }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('parent_last_name', 'Last Name') }}
						{{ Form::text('parent_last_name') }}
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						{{ Form::label('parent_address', 'Address') }}
						{{ Form::text('parent_address') }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('parent_city', 'City') }}
						{{ Form::text('parent_city') }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('parent_state', 'State') }}
						{{ Form::text('parent_state') }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('parent_zip', 'Zip') }}
						{{ Form::text('parent_zip') }}
					</div>
				</div>
				<div class="row">
					<div class="span2">
						{{ Form::label('parent_phone', 'Phone') }}
						{{ Form::text('parent_phone') }}
					</div>
					<div class="span2 offset1">
							{{ Form::label('parent_email', 'Email') }}
							{{ Form::text('parent_email') }}
						</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Incident Details</legend>
				<textarea name="description" id="description" class="input-block-level" cols="30" rows="10"><?= (isset($incident)) ? $incident->description : null ?></textarea>
			</fieldset>
			<fieldset>
				<legend>Medical Information</legend>
				<div class="row">
					<div class="span12">
						<div class="row">
							<div class="span6">
								<textarea name="medical_info" id="medical_info" class="textarea-wide" cols="30" rows="10"><?= (isset($incident)) ? $incident->medical_info : null ?></textarea>
							</div>
							<div class="span6">
								<div class="row">
									<div class="span3">
										{{ Form::label('first_aid', 'First Aid Administered?') }}
										{{ Form::select('first_aid', array('' => '--', 'Yes' => 'Yes', 'No' => 'No')) }}
									</div>
									<div class="span3">
										{{ Form::label('first_aid_whom', 'By Whom') }}
										{{ Form::text('first_aid_whom') }}
									</div>
								</div>
								<div class="row">
									<div class="span3">
										{{ Form::label('head_injury', 'Head or Face Injury?') }}
										{{ Form::select('head_injury', array('' => '--', 'Yes' => 'Yes', 'No' => 'No')) }}
									</div>
									<div class="span3">
										{{ Form::label('head_injury_whom', 'Reported to whom') }}
										{{ Form::text('head_injury_whom') }}
									</div>
								</div>
								<div class="row">
									<div class="span3">
										{{ Form::label('blood_borne', 'Blood-Borne Exposures?') }}
										{{ Form::select('blood_borne', array('' => '--', 'Yes' => 'Yes', 'No' => 'No')) }}
									</div>
									<div class="span3">
										{{ Form::label('blood_borne_whom', 'To whom') }}
										{{ Form::text('blood_borne_whom') }}
									</div>
								</div>
								<div class="row">
									<div class="span3">
										{{ Form::label('emergency_services', 'Emergency Services Called?') }}
										{{ Form::select('emergency_services', array('' => '--', 'Yes' => 'Yes', 'No' => 'No')) }}
									</div>
									<div class="span3"></div>
								</div>
								<div class="row">
									<div class="span3">
										{{ Form::label('hospital', 'Taken To Hospital?') }}
										{{ Form::select('hospital', array('' => '--', 'Yes' => 'Yes', 'No' => 'No')) }}
									</div>
									<div class="span3">
										{{ Form::label('hospital_name', 'Hospital Name') }}
										{{ Form::text('hospital_name') }}
									</div>
								</div>
							</div>
						</div><!-- end row -->
					</div>
				</div><!-- end row -->
			</fieldset>
			<fieldset>
				<legend>Parent \ Emergency Contact</legend>
					<div class="row">
						<div class="span3">
							{{ Form::label('parent_contacted', 'Emergency contact notified?') }}
							{{ Form::select('parent_contacted', array('' => '--', 'Yes' => 'Yes', 'No' => 'No')) }}
						</div>
						<div class="span3">
							{{ Form::label('parent_contacted_whom', 'Who was called?') }}
							{{ Form::text('parent_contacted_whom') }}
						</div>
						<div class="span3">
							{{ Form::label('parent_contacted_time', 'When?') }}
							{{ Form::text('parent_contacted_time') }}
						</div>
					</div> <!-- end row -->
					<div class="row">
						<div class="span3">
							{{ Form::label('parent_contacted_outcome', 'What was the outcome of the call?') }}
							{{ Form::text('parent_contacted_outcome') }}
						</div>
						<div class="span3">
							{{ Form::label('left_site_time', 'What time did the injured party leave the site?') }}
							{{ Form::text('left_site_time') }}
						</div>
						<div class="span3">
							{{ Form::label('left_site_with', 'With whom did the injured party leave?') }}
							{{ Form::text('left_site_with') }}
						</div>
					</div> <!-- end row -->
                    </fieldset>
                  <fieldset>
				<legend>Upload Additional Information</legend>
                <div class="row">
						<div class="span3">
							{{ Form::label('upload_information', 'Upload Information') }}
							{{ Form::file('docpath') }}
                            
						</div>
                  </div>
                  </fieldset>
			
              <div class="form-actions">
			  <button type="submit" class="btn btn-primary">Next</button>
			 
			</div>
		{{ Form::close() }}
        <!-- form validation -->
	       {{ Html::script('js/jquery.validate.js') }}
           {{ Html::script('js/validation.js') }}
        </div>
       @stop