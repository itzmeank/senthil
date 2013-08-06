@extends('layouts.master')

@section('main')

	<div class="container first-item">

		
			{{ Form::model($incident, ['method' => 'put', 'route' => ['incidents.update', $incident->id], 'id' => 'editIncident']) }}
		   <fieldset>
				<legend>Incident</legend>
				<div class="row">
					<div class="span2">
						{{ Form::label('incident_status', 'Status') }}
						{{ Form::select('incident_status', $status) }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('incident_date', 'Incident Date') }}
						{{ Form::input('date', 'incident_date') }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('incident_time', 'Incident Time') }}
						{{ Form::input('time', 'incident_time') }}
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						{{ Form::label('incident_branch', 'Incident Branch') }}
						{{ Form::select('incident_branch', $branches) }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('incident_offsite_location', 'Incident Offsite') }}
						{{ Form::select('incident_offsite_location', $offSiteLocations) }}
					</div>
					<div class="span2 offset1">
						{{ Form::label('incident_location', 'Incident Location') }}
						{{ Form::select('incident_location', $locations) }}
					</div>
                    
				</div> <!-- end row -->
                <div class="row">
					<div class="span2">
						{{ Form::label('report', 'Report') }}
						{{ Form::select('report', $report) }}
					</div>
                </div>
                
			</fieldset>
			<fieldset>
				<legend>Injured Person</legend>
					<div class="row">
						<div class="span1">
							{{ Form::label('involvement', 'Involvement') }}
							{{ Form::select('involvement', $involvement) }}
						</div>
					</div> <!-- end row -->
					<div class="row">
						<div class="span2">
							{{ Form::label('first_name', 'First Name') }}
							{{ Form::text('first_name') }}
						</div>
						<div class="span2 offset1">
							{{ Form::label('last_name', 'Last Name') }}
							{{ Form::text('last_name') }}
						</div>
						<div class="span2 offset1">
							{{ Form::label('birthdate', 'Birthdate') }}
                            {{ Form::input('date', 'birthdate') }}
						</div>
						<div class="span2 offset1">
							{{ Form::label('gender', 'Gender') }}
							{{ Form::select('gender', $gender) }}
						</div>
					</div> <!-- end row -->
					<div class="row">
						<div class="span2">
							{{ Form::label('address', 'Address') }}
							{{ Form::text('address') }}
						</div>
						<div class="span2 offset1">
							{{ Form::label('city', 'City') }}
							{{ Form::text('city') }}
						</div>
						<div class="span2 offset1">
							{{ Form::label('state', 'State') }}
							{{ Form::text('state') }}
						</div>
						<div class="span2 offset1">
							{{ Form::label('zip', 'Zip') }}
							{{ Form::text('zip') }}
						</div>
					</div> <!-- end row -->
					<div class="row">
						<div class="span2">
							{{ Form::label('phone', 'Phone') }}
							{{ Form::text('phone') }}
						</div>
						<div class="span2 offset1">
							{{ Form::label('email', 'Email') }}
							{{ Form::text('email') }}
						</div>
					</div> <!-- end row -->
			</fieldset>
            
            <div class="form-actions">
			  <button type="submit" class="btn btn-primary">Next</button>
			 
			</div>
            
	      <!-- <script type="text/javascript">
			$("#incident_status").prop('disabled', true);
			$(".hideID").hide();
			$("#cancel").on('click', function() {
				window.location.replace("/incidents");
			});

			
		</script>-->

		<!-- form validation -->
        {{ Html::script('js/jquery.validate.js') }}
		{{ Html::script('js/validation.js') }}
        </div>
        @stop