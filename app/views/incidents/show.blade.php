@extends('layouts.master')

@section('main')
<style type="text/css" media="print">
    @page 
    {
        /* auto is the initial value */
       /* margin: 0mm;  /* this affects the margin in the printer settings */
    }
	.navbar navbar-fixed-top navbar-inverse,.navbar-inner,.btn pull-right a,icon-print i
	{
	display:none;
	}
	#pre1,#pre2
	{
	display:none;
	}
	.brandnew{
	padding-top:50px;
	}
	
	
	
</style>
	<script>
	  $("#divshow").hide();
			$("#pre1").on('click', function() {
			$("#divshow").show();
			});
		</script>
        <div id="divshow">
        
        <div class="container">
        	<p class="brandnew" href="{{{ URL::to('incidents') }}}"><img src="{{URL::asset('/img/logo.png')}}" alt="logo" width="30px" height="25px"> Incident Tracking</p>
           </div>
        </div>
	<div class="container first-item">
     	<a class="btn pull-right" id="pre1" onClick="javascript:window.print();"><i class="icon-print"></i> Print</a>
         <a class="btn pull-right" id="pre2" href="../incidents/email/{{ $incident->id }}"><i class="icon-pencil icon-white"></i> Send Email</a>
			<fieldset>
				<legend>Incident</legend>
				<div class="row">
					<div class="span2"> 
						<label for="">Incident Status</label>
						<span class="label incident-status"><?= $incident->incident_status; ?></span>
					</div> 
					<div class="span2 offset1">
						<label for="">Incident Date</label>
						<?= date('m/d/Y', strtotime($incident->incident_date)); ?>
					</div>
					<div class="span2 offset1">
						<label for="">Incident Time</label>
						<br>
						<?= date('h:i A', strtotime($incident->incident_time)); ?>
					</div>
				</div> <!-- end row -->
				<br>
				<div class="row">
					<div class="span2">
						<label for="">Incident Branch</label>
						<?= $incident->incident_branch; ?>
					</div>
					<div class="span2 offset1">
						<label for="">Offsite Location</label>
						<?= $incident->incident_offsite_location; ?>
					</div>
					<div class="span2 offset1">
						<label for="">Incident Location</label>
						<?= $incident->incident_location; ?>
					</div>
				</div> <!-- end row -->
                
                <div class="row">
					<div class="span2">
						<label for="">Report</label>
						<?= $incident->report; ?>
					</div>
                </div>
                
				<br>
			</fieldset>
			<fieldset>
				<legend>Injured Person</legend>
					<div class="row">
						<div class="span2">
							{{ Form::label('involvement', 'Involvement') }}
							<?= $incident->involvement; ?>
						</div>
					</div> <!-- end row -->	
					<br>
					<div class="row">
						<div class="span2">
							<label for="">First Name</label>
							<br>
							<?= $incident->first_name; ?>
						</div>
						<div class="span2 offset1">
							<label for="">Last Name</label>
							<br>
							<?= $incident->last_name; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('birthdate', 'Birthdate') }}
							<?= $incident->birthdate; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('gender', 'Gender') }}
							<br>
							<?= $incident->gender; ?>
						</div>
					</div> <!-- end row -->
					<br>
					<div class="row">
						<div class="span2">
							{{ Form::label('address', 'Address') }}
							<br>
							<?= $incident->address; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('city', 'City') }}
							<br>
							<?= $incident->city; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('state', 'State') }}
							<br>
							<?= $incident->state; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('zip', 'Zip') }}
							<br>
							<?= $incident->zip; ?>
						</div>
					</div> <!-- end row -->	
					<br>
					<div class="row">
						<div class="span2">
							{{ Form::label('phone', 'Phone') }}
							<br>
							<?= $incident->phone; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('email', 'Email') }}
							<br>
							<?= $incident->email; ?>
					</div> <!-- end row -->
					<br>
			</fieldset>
			<fieldset>
				<legend>Guardian \ Emergency Contact Information</legend>
				<div class="row">
					<div class="span2">
						{{ Form::label('parent_first_name', 'First Name') }}
						<br>
						<?= $incident->parent_first_name; ?>
					</div>
					<div class="span2 offset1">
						{{ Form::label('parent_last_name', 'Last Name') }}
						<br>
						<?= $incident->parent_last_name; ?>
					</div>
				</div> <!-- end row -->
						<br>
				<div class="row">
					<div class="span2">
						{{ Form::label('parent_address', 'Address') }}
						<br>
						<?= $incident->parent_address; ?>
					</div>
					<div class="span2 offset1">
						{{ Form::label('parent_city', 'City') }}
						<br>
						<?= $incident->parent_city; ?>
					</div>
					<div class="span1 offset1">
						{{ Form::label('parent_state', 'State') }}
						<br>
						<?= $incident->parent_state; ?>
					</div>
					<div class="span1 offset1">
						{{ Form::label('parent_zip', 'Zip') }}
						<br>
						<?= $incident->parent_zip; ?>
					</div>
				</div><!-- end row -->
						<br>
				<div class="row">
					<div class="span2">
						{{ Form::label('parent_phone', 'Phone') }}
						<br>
						<?= $incident->parent_phone; ?>
					</div>
					<div class="span2 offset1">
						{{ Form::label('parent_email', 'Email') }}
						<br>
						<?= $incident->parent_email; ?>
					</div>	
				</div><!-- end row -->
						<br>
			</fieldset>
			<fieldset>
						<br>
				<legend>Incident Details</legend>
				<?= $incident->description; ?>
			</fieldset>
			<fieldset>
				<legend>Medical Information</legend>
				<div class="row">
					<div class="span12">
						<div class="row">
							<div class="span6">
								<?= $incident->medical_info; ?>
							</div>
							<div class="span6">
								<div class="row">
									{{ Form::label('first_aid', 'First Aid Administered?') }}
									<br>
									<?= $incident->first_aid; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('first_aid_whom', 'By Whom') }}
									<br>
									<?= $incident->first_aid_whom; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('head_injury', 'Head or Face Injury?') }}
									<br>
									<?= $incident->head_injury; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('head_injury_whom', 'Reported to whom') }}
									<br>
									<?= $incident->head_injury_whom; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('blood_borne', 'Blood-Borne Exposures?') }}
									<br>
									<?= $incident->blood_borne; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('blood_borne_whom', 'To whom') }}
									<br>
									<?= $incident->blood_borne_whom; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('emergency_services', 'Emergency Services Called?') }}
									<br>
									<?= $incident->emergency_services; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('hospital', 'Taken To Hospital?') }}
									<br>
									<?= $incident->hospital; ?>
								<br>
								</div><!-- end row -->
								<div class="row">
									{{ Form::label('hospital_name', 'Hospital Name') }}
									<br>
									<?= $incident->hospital_name; ?>
								<br>
								</div><!-- end row -->
							</div>
						</div><!-- end row -->
					</div>
				</div><!-- end row -->
			</fieldset>
			<fieldset>
				<legend>Guardian \ Emergency Contact</legend>
							<div class="row">
								<div class="span6">	
									{{ Form::label('parent_contacted', 'Was guardian \ emergency contact notified?') }}
									<br>
									<?= $incident->parent_contacted; ?>
								</div>
							</div><!-- end row -->
									<br>
							<div class="row">
								<div class="span6">		
									{{ Form::label('parent_contacted_whom', 'Who was called?') }}
									<br>
									<?= $incident->parent_contacted_whom; ?>
								</div>
							</div><!-- end row -->
									<br>			
							<div class="row">
								<div class="span6">
									{{ Form::label('parent_contacted_time', 'When?') }}
									<br>
									<?= $incident->parent_contacted_time; ?>
								</div>
							</div><!-- end row -->
									<br>
							<div class="row">
								<div class="span6">
									{{ Form::label('parent_contacted_outcome', 'What was the outcome of the call?') }}
									<br>
									<?= $incident->parent_contacted_outcome; ?>
								</div>
							</div><!-- end row -->
									<br>
							<div class="row">
								<div class="span6">
									{{ Form::label('left_site_time', 'What time did the injured party leave the site?') }}
									<br>
									<?= $incident->left_site_time; ?>
								</div>
							</div><!-- end row -->
									<br>
							<div class="row">
								<div class="span6">		
									{{ Form::label('left_site_with', 'With whom?') }}
									<br>
									<?= $incident->left_site_with; ?>
								</div>
							</div><!-- end row -->
									<br>
			</fieldset>
			<fieldset>
				<legend>Witnesses \ Responders</legend>
				<!-- witness 1 info -->
				<fieldset>
				@foreach ($witnesses as $witness)
					<legend class="sub-legend">Witness \ Responder</legend>
					<div class="row">
						<div class="span12">
							<div class="row">
								<div class="span2">
									{{ Form::label('type', 'Witness Type') }}
									<br>
									<?= $witness->type; ?>
								</div>
								<div class="span2 offset1">
									{{ Form::label('involvement', 'Involvement') }}
									<br>
									<?= $witness->involvement; ?>
								</div>
							</div><!-- end row -->
							<br>
							<div class="row">
								<div class="span2">
									{{ Form::label('first_name', 'First Name') }}
									<br>
									<?= $witness->first_name; ?>
								</div>
								<div class="span2 offset1">
									{{ Form::label('last_name', 'Last Name') }}
									<br>
									<?= $witness->last_name; ?>
								</div>
								<div class="span2 offset1">
									{{ Form::label('age', 'Age') }}
									<br>
									<?= $witness->age; ?>
								</div>
							</div> <!-- end row -->
							<br>
							<div class="row">
								<div class="span2">
									{{ Form::label('address', 'Address') }}
									<br>
									<?= $witness->address; ?>
								</div>
								<div class="span2 offset1">
									{{ Form::label('city', 'City') }}
									<br>
									<?= $witness->city; ?>
								</div>
								<div class="span1 offset1">
									{{ Form::label('state', 'State') }}
									<br>
									<?= $witness->state; ?>
								</div>
								<div class="span1 offset1">
									{{ Form::label('zip', 'Zip') }}
									<br>
									<?= $witness->zip; ?>
								</div>
							</div><!-- end row -->
									<br>
							<div class="row">
								<div class="span2">
									{{ Form::label('phone', 'Phone') }}
									<br>
									<?= $witness->phone; ?>
								</div>
								<div class="span2 offset1">
									{{ Form::label('email', 'Email') }}
									<br>
									<?= $witness->email; ?>
								</div>	
							</div><!-- end row -->
						</div>
					</div> <!-- end row -->
					@endforeach
				</fieldset>
				<!-- end witness 1 info -->
			</fieldset>
			<fieldset>
				<legend>Additional Information</legend>
				<div class="row">
					<div class="span10">
						{{ Form::label('previous_injury', 'Previous injury to this') }}
						<br>
						<?= $incident->previous_injury; ?>
						<div class="clear-fix"></div>
						<?= $incident->additional_info; ?>
					</div>
				</div> <!--end row -->
				<br>
			</fieldset>
			<fieldset>
				<legend>Follow-Up</legend>
				@foreach ($followups as $followup)
					<div class="row">
						<div class="span2">
							{{ Form::label('date', 'Date') }}
							<br>
							<?= $followup->date; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('staff', 'Staff') }}
							<br>
							<?= $followup->staff; ?>
						</div>
						<div class="span2 offset1">
							{{ Form::label('whom', 'Spoke to') }}
							<br>
							<?= $followup->whom; ?>
						</div>
					</div><!--end row -->
					<br>
					<div class="row">
						<div class="span12">
							{{ Form::label('notes', 'Notes') }}
							<br>
							<?= $followup->notes; ?>
						</div>
					</div><!--end row -->
                    
				@endforeach	
             		
			</fieldset>
            
             @if(!empty($incident->docpath))
            <fieldset>
				<legend>Detailed Information</legend>
			
					<div class="row">
						<div class="span2">
							{{ Form::label('DetailedInformation', 'DetailedInformation') }}
						
						<!-- <a target="_blank" href='/post_doc/<?= $incident->docpath;?>'>View Document</a>-->
                        {{Html::link('post_doc/'.$incident->docpath, 'View Document', array('title' => 'View', 'target' => '_blank'), '')}}
						</div>
             </div>
             </fieldset>  
             @endif          
			{{ Form::open(['method' => 'put', 'route' => ['incidents.update', $incident->id]]) }}
				<div class="form-actions">
					{{ Form::text('incident_status', $incident->incident_status, array('id' => 'incident_status')) }}
					{{ Form::submit('Reviewed', array('id' => 'reviewed', 'class' => 'btn btn-primary')) }}
					{{ Form::submit('Signoff', array('id' => 'signoff', 'class' => 'btn btn-primary')) }}
					{{ Form::submit('Close', array('id' => 'closed', 'class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
	</div>

	<script>
		$('#incident_status').hide();

		$('#reviewed').hide();
		$('#signoff').hide();
		$('#closed').hide();

		if ( {{ (Entrust::can('review_incident') === true ? 'true' : 'false') }} === true ) {
			$('#reviewed').show();
		}
		if ( {{ (Entrust::can('signoff_incident') === true ? 'true' : 'false') }} === true  ) {
			$('#signoff').show();
		}
		if ( {{ (Entrust::can('close_incident') === true ? 'true' : 'false') }} === true  ) {
			$('#closed').show();
		}

		$('#reviewed').on('click', function() {
			$('#incident_status').val('Reviewed');
		});
		
		$('#signoff').on('click', function() {
			$('#incident_status').val('Signoff');
		});

		$('#closed').on('click', function() {
			$('#incident_status').val('Closed');
		});
	</script>
@stop
