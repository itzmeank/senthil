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
						{{ Form::input('text', 'incident_date') }}
					</div>
					<div class="span2 offset1" id="incidenttime">
						{{ Form::label('incident_time', 'Incident Time') }}
						{{ Form::input('text', 'incident_time') }}
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
                            {{ Form::input('text', 'birthdate') }}
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
            <fieldset>
				<legend>Additional Information</legend>
				
                  @if (isset($incident->previous_injury))
            {{ Form::select('previous_injury', array('' => '--', 'Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown'),$incident->previous_injury)}}
              @else
             {{ Form::select('previous_injury', array('' => '--', 'Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown')) }}
              @endif 
				<div class="clear-fix"></div>
				<textarea name="additional_info" id="additional_info" class="input-block-level" cols="30" rows="10"><?= (isset($incident)) ? $incident->additional_info : null ?></textarea>
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
          {{ Html::style('css/jquery-ui.css') }}
      {{ Html::style('css/jquery.ptTimeSelect.css') }}
       {{ Html::script('js/jquery.validate.js') }}
		  {{ Html::script('js/validation.js') }}
           {{ Html::script('js/jquery.min.js') }}
		    {{ Html::script('js/jquery-ui.min.js') }}
          {{ Html::script('js/jquery.ptTimeSelect.js') }}
       
        </div>
          <script>
  $(document).ready(function() {
    $("#incident_date").datepicker({
	  minDate: '-2Y',
      maxDate: "+0D",
	  dateFormat: "yy-mm-dd",
	  
	}
	);
	 $('#incidenttime input').ptTimeSelect();
	  $('#birthdate').datepicker({
	  minDate: '-80Y',
      maxDate: "-2M",
	  dateFormat: "yy-mm-dd",
	  });
	
  });
  </script>
        @stop