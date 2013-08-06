
               <h2>Incident Detailed Report</h2>
				<h3>Incident</h3>
				<div class="row">
				  <div class="span2"> 
						<label for="">Incident Status:</label>
						<span class="label incident-status"><?= $incident->incident_status; ?></span>
					</div> 
                    <br />
                    <br />
					<div class="span2 offset1">
						<label for="">Incident Date:</label>
						<?= date('m/d/Y', strtotime($incident->incident_date)); ?>
					</div>
                    <br />
                    <br />
					<div class="span2 offset1">
						<label for="">Incident Time:</label>
					
						<?= date('h:i A', strtotime($incident->incident_time)); ?>
					</div>
				</div> <!-- end row -->
				<br />
                    <br />
				<div class="row">
					<div class="span2">
						<label for="">Incident Branch:</label>
						<?= $incident->incident_branch; ?>
					</div>
                    <br />
                    <br />
					<div class="span2 offset1">
						<label for="">Offsite Location:</label>
						<?= $incident->incident_offsite_location; ?>
					</div>
                    <br />
                    <br />
					<div class="span2 offset1">
						<label for="">Incident Location:</label>
						<?= $incident->incident_location; ?>
					</div>
                    <br />
                    <br />
				</div> <!-- end row -->
                
                <div class="row">
					<div class="span2">
						<label for="">Report:</label>
						<?= $incident->report; ?>
					</div>
                </div>
                
				<br />
                    <br />
			
			
				<h3>Injured Person</h3>
                <br />
					<div class="row">
						<div class="span2">
						 <label for="">Involvement:</label>
							
							<?= $incident->involvement; ?>
						</div>
					</div> <!-- end row -->	
				<br />
                    <br />
					<div class="row">
						<div class="span2">
							<label for="">First Name:</label>
							
							<?= $incident->first_name; ?>
						</div>
                        <br />
                    <br />
						<div class="span2 offset1">
							<label for="">Last Name:</label>
							
							<?= $incident->last_name; ?>
						</div>
                        <br />
                    <br />
						<div class="span2 offset1">
                        <label for="">Birth Date:</label>
							<?= $incident->birthdate; ?>
						</div>
                        <br />
                    <br />
						<div class="span2 offset1">
							 <label for="">Gender:</label>
							<?= $incident->gender; ?>
						</div>
                        <br />
                    <br />
					</div> <!-- end row -->
					
					<div class="row">
						<div class="span2">
							
							<label for="">Address:</label>
							<?= $incident->address; ?>
						</div>
                        <br />
                    <br />
						<div class="span2 offset1">
							<label for="">City:</label>
							<?= $incident->city; ?>
						</div>
                        <br />
                    <br />
						<div class="span2 offset1">
							<label for="">State:</label>
							<?= $incident->state; ?>
						</div>
                        <br />
                    <br />
						<div class="span2 offset1">
							<label for="">Zip:</label>
							<?= $incident->zip; ?>
						</div>
                        <br />
                    <br />
					</div> <!-- end row -->	
					
					<div class="row">
					  <div class="span2">
						 <label for="">Phone:</label>
							<?= $incident->phone; ?>
					  </div>
                        <br />
                    <br />
    						<div class="span2 offset1">
						 <label for="">Email:</label>
							<?= $incident->email; ?>
					</div> <!-- end row -->
					<br />
                    <br />
			
			
				<h3>Guardian \ Emergency Contact Information</h3>
                <br />
				<div class="row">
				  <div class="span2">
						 <label for="">Parent First Name:</label>
						<?= $incident->parent_first_name; ?>
				  </div>
                    <br />
                    <br />
				  <div class="span2 offset1">
						 <label for="">Parent Last Name:</label>
						<?= $incident->parent_last_name; ?>
				  </div>
                    <br />
                    <br />
				</div> <!-- end row -->
						
				<div class="row">
				  <div class="span2">
						 <label for="">Parent Address:</label>
						<?= $incident->parent_address; ?>
				  </div>
                    <br />
                    <br />
				  <div class="span2 offset1">
						<label for="">Parent City:</label>
						<?= $incident->parent_city; ?>
				  </div>
                    <br />
                    <br />
				  <div class="span1 offset1">
						<label for="">Parent State:</label>
						<?= $incident->parent_state; ?>
				  </div>
                    <br />
                    <br />
				  <div class="span1 offset1">
					<label for="">Parent Zip:</label>
						<?= $incident->parent_zip; ?>
				  </div>
                    <br />
                    <br />
				</div><!-- end row -->
						
				<div class="row">
				  <div class="span2">
						<label for="">Parent Phone:</label>
						<?= $incident->parent_phone; ?>
				  </div>
                    <br />
                    <br />
                 
				  <div class="span2 offset1">
						<label for="">Parent Email:</label>
						<?= $incident->parent_email; ?>
				  </div>
                    <br />
                    <br />	
                    
				</div><!-- end row -->
						
			
			
						
				<h3>Incident Details</h3>
				<?= $incident->description; ?>
			  <br />
               <br />	
			
				<h3>Medical Information</h3>
				<div class="row">
					<div class="span12">
						<div class="row">
						  <div class="span6">
                            <label for="">Medical Info:</label>
								<?= $incident->medical_info; ?>
						  </div>
                            <br />
                            <br />
							<div class="span6">
								<div class="row">
									 <label for="">First Aid Administered:</label>
								
                                	<?= $incident->first_aid; ?>
                              </div><!-- end row -->
								<br />
                            <br />
								<div class="row">
									 <label for="">By Whom:</label>
								
                               	  <?= $incident->first_aid_whom; ?>
                              </div><!-- end row -->
								<br />
                            <br />
								<div class="row">
									 <label for="">Head or Face Injury?:</label>
									<?= $incident->head_injury; ?>
							
								</div><!-- end row -->
                                	<br />
                            <br />
								<div class="row">
									<label for="">Reported to whom:</label>
									<?= $incident->head_injury_whom; ?>
								
								</div><!-- end row -->
                                
								<br />
                            <br />
								<div class="row">
									<label for="">Blood-Borne Exposures?:</label>
									<?= $incident->blood_borne; ?>
								
								</div><!-- end row -->
                                	<br />
                            <br />
								<div class="row">
									<label for="">To whom:</label>
									<?= $incident->blood_borne_whom; ?>
								
								</div><!-- end row -->
                                	<br />
                            <br />
								<div class="row">
									<label for="">Emergency Services Called?:</label>
									<?= $incident->emergency_services; ?>
								
								</div><!-- end row -->
                                	<br />
                            <br />
								<div class="row">
									<label for="">Taken To Hospital?:</label>
									<?= $incident->hospital; ?>
								
								</div><!-- end row -->
                                	<br />
                            <br />
								<div class="row">
									<label for="">Hospital Name:</label>
									<?= $incident->hospital_name; ?>
								
								</div><!-- end row -->
                                	<br />
                            <br />
							</div>
						</div><!-- end row -->
					</div>
				</div><!-- end row -->
			
			
				<h3>Guardian \ Emergency Contact</h3>
							<div class="row">
								<div class="span6">	
									<label for="">Emergency contact notified?:</label>
									<?= $incident->parent_contacted; ?>
								</div>
							</div><!-- end row -->
                            	<br />
                            <br />
									
							<div class="row">
								<div class="span6">		
									<label for="">Who was called?:</label>
									<?= $incident->parent_contacted_whom; ?>
								</div>
							</div><!-- end row -->
                            	<br />
                            <br />
												
							<div class="row">
								<div class="span6">
									<label for="">When?:</label>
									<?= $incident->parent_contacted_time; ?>
								</div>
							</div><!-- end row -->
							<br />
                            <br />
							<div class="row">
							  <div class="span6">
									<label for="">What was the outcome of the call?:</label>
									<?= $incident->parent_contacted_outcome; ?>
								</div>
                                <br />
                              <br />
							</div><!-- end row -->
									
							<div class="row">
							  <div class="span6">
									<label for="">What time did the injured party leave the site?:</label>
									<?= $incident->left_site_time; ?>
							  </div>
                                	<br />
                            <br />
							</div><!-- end row -->
									
							<div class="row">
							  <div class="span6">		
									<label for="">With whom did the injured party leave?:</label>
									<?= $incident->left_site_with; ?>
							  </div>
                                	<br />
                            <br />
							</div><!-- end row -->
									
			
			
				<h3>Witnesses \ Responders</h3>
				<!-- witness 1 info -->
				
				@foreach ($witnesses as $witness)
					<h3 class="sub-legend">Witness \ Responder</h3>
                    <br />
					<div class="row">
						<div class="span12">
							<div class="row">
							  <div class="span2">
									<label for="">Type:</label>
									<?= $witness->type; ?>
							  </div>
                                	<br />
                            <br />
							  <div class="span2 offset1">
									<label for="">Involvement:</label>
									<?= $witness->involvement; ?>
							  </div>
                                	<br />
                            <br />
							</div><!-- end row -->
							
							<div class="row">
							  <div class="span2">
									<label for="">First Name:</label>
									<?= $witness->first_name; ?>
							  </div>
                                	<br />
                            <br />
							  <div class="span2 offset1">
									<label for="">Last Name:</label>
									<?= $witness->last_name; ?>
							  </div>
                                	<br />
                            <br />
							  <div class="span2 offset1">
									<label for="">Age:</label>
									<?= $witness->age; ?>
							  </div>
                                	<br />
                            <br />
							</div> <!-- end row -->
							
							<div class="row">
							  <div class="span2">
									<label for="">Address:</label>
									<?= $witness->address; ?>
							  </div>
                                	<br />
                            <br />
							  <div class="span2 offset1">
									<label for="">City:</label>
									<?= $witness->city; ?>
							  </div>
                                	<br />
                            <br />
							  <div class="span1 offset1">
									<label for="">State:</label>
									<?= $witness->state; ?>
							  </div>
                                	<br />
                            <br />
							  <div class="span1 offset1">
									<label for="">Zip:</label>
									<?= $witness->zip; ?>
							  </div>
                                	<br />
                            <br />
							</div><!-- end row -->
									
							<div class="row">
							  <div class="span2">
									<label for="">Phone:</label>
									<?= $witness->phone; ?>
							  </div>
                                	<br />
                            <br />
							  <div class="span2 offset1">
									<label for="">Email:</label>
									<?= $witness->email; ?>
							  </div>
                                	<br />
                            <br />	
							</div><!-- end row -->
						</div>
					</div> <!-- end row -->
					@endforeach
				
				<!-- end witness 1 info -->
			
			
				<h3>Additional Information</h3>
				<div class="row">
					<div class="span10">
						<label for="">Previous Injury:</label>
						<?= $incident->previous_injury; ?>
                        	<br />
                            <br />
					  <div class="clear-fix"></div>
                        <label for="">Additional Info:</label>
						<?= $incident->additional_info; ?>
                        	<br />
                            <br />
					</div>
				</div> <!--end row -->
				
			
			
				<h3>Follow-Up</h3>
                	
				@foreach ($followups as $followup)
					<div class="row">
					  <div class="span2">
							<label for="">Date:</label>
							<?= $followup->date; ?>
					  </div>
                        	<br />
                            <br />
					  <div class="span2 offset1">
							<label for="">Staff:</label>
							<?= $followup->staff; ?>
					  </div>
                        	<br />
                            <br />
					  <div class="span2 offset1">
							<label for="">Whom:</label>
							<?= $followup->whom; ?>
					  </div>
                        	<br />
                            <br />
					</div><!--end row -->
					
					<div class="row">
					  <div class="span12">
						<label for="">Notes:</label>
							<?= $followup->notes; ?>
					  </div>
                        <br />
                        <br />
					</div><!--end row -->
                    
				@endforeach	
             @if($incident->docpath!='')	
			 <h3>Detailed Information</h3>
			 <br />
					<div class="row">
						<div class="span2">
							{{ Form::label('DetailedInformation', 'DetailedInformation') }}
						
						<!-- <a target="_blank" href='/post_doc/<?= $incident->docpath;?>'>View Document</a>-->
                        {{Html::link('post_doc/'.$incident->docpath, '', array('title' => 'View', 'target' => '_blank'), '')}}
						</div>
             </div>
             @endif       
			
	</div>
