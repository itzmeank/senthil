<?php $i = 0; ?>
<div id="witness{{ $i }}">
	<fieldset>
		<legend class="sub-legend">1st Witness \ Responder</legend>
		<div class="row">
			<div class="span12">
				<div class="row">
					<input type="text" class="hideID" name="witnesses[{{ $i }}][id]" id="witnesses[{{ $i }}][id]">
					
					<div class="span2">
						<label for="witnesses[{{ $i }}][type]">Type</label>
                      
						<!--<select name="witnesses[0][type]" >
						//	@foreach( $witnessType as $key => $value )
								
                                <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                                
							//@endforeach
						</select>-->
                        
                    <!-- <script type="text/javascript">
                    $("#witness").change(function () {
                    $("#witnesses[0][type]").val($(this).val());
                      alert($(this).val()) 
			        })
              </script>-->
               @if (isset($newwitnesses[0]->type))
              {{ Form::select('witnesses[0][type]',$witnessType,$newwitnesses[0]->type) }}
              @else
              {{ Form::select('witnesses[0][type]',$witnessType)}}
              @endif      
                       <!-- <input type="text" name="witnesses[][type]" id="witnesses1[0][type]"  />-->
                        
                        
                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][involvement]">Involvement</label>
                         
						<!--<select  name="witnesses[0][involvement]" >
							@foreach( $involvement as $key => $value )
								<option value="{{ $key }}" selected="selected" >{{ $value }}</option>
							@endforeach
						</select>-->
                      <!-- <input type="hidden" name="witnesses[0][involvement]" id="witnesses[0][involvement]" value="{{$value}}" />
                        <input type="hidden" name="witnesses[1][involvement]" id="witnesses[1][involvement]" value="{{$value}}" />-->
                          @if (isset($newwitnesses[0]->involvement))
                            {{ Form::select('witnesses[0][involvement]',$involvement,$newwitnesses[0]->involvement) }}
                         @else
                        {{ Form::select('witnesses[0][involvement]',$involvement)}}
                        @endif  
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][first_name]">First Name</label>
                       @if (empty($newwitnesses[0]->id))
						 <input type="text" name="witnesses[{{ $i }}][first_name]" id="witnesses[{{ $i }}][first_name]"  />
                       @else
					 <input type="text" name="witnesses[{{ $i }}][first_name]" id="witnesses[{{ $i }}][first_name]" value="{{$newwitnesses[0]->first_name}}">
                       @endif

                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][last_name]">Last Name</label>
                          @if (empty($newwitnesses[0]->id))
						<input type="text" name="witnesses[{{ $i }}][last_name]" id="witnesses[{{ $i }}][last_name]"  />
                          @else
                         <input type="text" name="witnesses[{{ $i }}][last_name]" id="witnesses[{{ $i }}][last_name]" value="{{$newwitnesses[0]->last_name}}">
                          @endif
					</div>
					<div class="span1 offset1">
						<label for="witnesses[{{ $i }}][age]">Age</label>
                       @if (empty($newwitnesses[0]->id))
						 <input type="text" name="witnesses[{{ $i }}][age]" id="witnesses[{{ $i }}][age]" class="input-small"  />
                         @else
                         <input type="text" name="witnesses[{{ $i }}][age]" id="witnesses[{{ $i }}][age]" class="input-small" value="{{$newwitnesses[0]->age}}">
                        
                         @endif
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][address]">Address</label>
                          @if (empty($newwitnesses[0]->id))
                          <input type="text" name="witnesses[{{ $i }}][address]" id="witnesses[{{ $i }}][address]" />
                          @else
						<input type="text" name="witnesses[{{ $i }}][address]" id="witnesses[{{ $i }}][address]" value="{{$newwitnesses[0]->address}}">
                          @endif
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][city]">City</label>
                        @if (empty($newwitnesses[0]->id))
                        <input type="text" name="witnesses[{{ $i }}][city]" id="witnesses[{{ $i }}][city]" /> 
                        @else
						<input type="text" name="witnesses[{{ $i }}][city]" id="witnesses[{{ $i }}][city]"  value="{{$newwitnesses[0]->city}}">
                        @endif
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][state]">State</label>
                         @if (empty($newwitnesses[0]->id))
                         <input type="text" name="witnesses[{{ $i }}][state]" id="witnesses[{{ $i }}][state]" />
                        @else
						<input type="text" name="witnesses[{{ $i }}][state]" id="witnesses[{{ $i }}][state]" value="{{$newwitnesses[0]->state}}">
                        @endif
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][zip]">Zip</label>
                        @if (empty($newwitnesses[0]->id))
                         	<input type="text" name="witnesses[{{ $i }}][zip]" id="witnesses[{{ $i }}][zip]"  />
                        @else
						<input type="text" name="witnesses[{{ $i }}][zip]" id="witnesses[{{ $i }}][zip]" value="{{$newwitnesses[0]->zip}}">
                         @endif
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][phone]">Phone</label>
                         @if (empty($newwitnesses[0]->id))
                         <input type="text" name="witnesses[{{ $i }}][phone]" id="witnesses[{{ $i }}][phone]"  />
                        @else
						<input type="text" name="witnesses[{{ $i }}][phone]" id="witnesses[{{ $i }}][phone]" value="{{$newwitnesses[0]->phone}}">
                         @endif
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][email]">Email</label>
                        @if (empty($newwitnesses[0]->id))
                         <input type="text" name="witnesses[{{ $i }}][email]" id="witnesses[{{ $i }}][email]"  />
                        @else
						<input type="text" name="witnesses[{{ $i }}][email]" id="witnesses[{{ $i }}][email]" value="{{$newwitnesses[0]->email}}">
                        @endif
					</div>
				</div> <!-- end row -->
			</div>
		</div> <!-- end row -->
	</fieldset>
    
	<!-- end witness 1 info -->
    @if(isset($newwitnesses[1]->id))
    	<fieldset>
		<legend class="sub-legend">1st Witness \ Responder</legend>
		<div class="row">
			<div class="span12">
				<div class="row">
					<input type="text" class="hideID" name="witnesses[1][id]" id="witnesses[{{ $i }}][id]">
					
					<div class="span2">
						<label for="witnesses[{{ $i }}][type]">Type</label>
                       <!--
							<select name="witnesses[1][type]" id="witnesses[{{ $i }}][type]">
							
                           // @foreach( $witnessType as $key => $value )//
								<option value="{{ $key }}">{{ $value }}</option>
							
                           // @endforeach
						   </select>-->
                       
                         @if (isset($newwitnesses[1]->type))
              {{ Form::select('witnesses[1][type]',$witnessType,$newwitnesses[1]->type) }}
              @else
              {{ Form::select('witnesses[1][type]',$witnessType)}}
              @endif 
                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[1][involvement]">Involvement</label>
                         
					<!--<select name="witnesses[1][involvement]" id="witnesses[{{ $i }}][involvement]">
							
                          //  @foreach( $involvement as $key => $value )//
								<option value="{{ $key }}">{{ $value }}</option>
							
                           // @endforeach
						</select>-->
                          @if (isset($newwitnesses[1]->involvement))
                            {{ Form::select('witnesses[1][involvement]',$involvement,$newwitnesses[1]->involvement) }}
                         @else
                        {{ Form::select('witnesses[1][involvement]',$involvement)}}
                        @endif  
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][first_name]">First Name</label>
                     
					 <input type="text" name="witnesses[1][first_name]" id="witnesses[{{ $i }}][first_name]" value="{{$newwitnesses[1]->first_name}}">
                      

                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][last_name]">Last Name</label>
                        
                         <input type="text" name="witnesses[1][last_name]" id="witnesses[{{ $i }}][last_name]" value="{{$newwitnesses[1]->last_name}}">
                         
					</div>
					<div class="span1 offset1">
						<label for="witnesses[{{ $i }}][age]">Age</label>
                       
                         <input type="text" name="witnesses[1][age]" id="witnesses[{{ $i }}][age]" class="input-small" value="{{$newwitnesses[1]->age}}">
                        
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][address]">Address</label>
                         
						<input type="text" name="witnesses[1][address]" id="witnesses[{{ $i }}][address]" value="{{$newwitnesses[1]->address}}">
                        
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][city]">City</label>
                   
						<input type="text" name="witnesses[1][city]" id="witnesses[{{ $i }}][city]"  value="{{$newwitnesses[1]->city}}">
                       
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][state]">State</label>
                         
						<input type="text" name="witnesses[1][state]" id="witnesses[{{ $i }}][state]" value="{{$newwitnesses[1]->state}}">
                       
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][zip]">Zip</label>
                       
						<input type="text" name="witnesses[1][zip]" id="witnesses[{{ $i }}][zip]" value="{{$newwitnesses[1]->zip}}">
                         
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][phone]">Phone</label>
                       
						<input type="text" name="witnesses[1][phone]" id="witnesses[{{ $i }}][phone]" value="{{$newwitnesses[1]->phone}}">
                        
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][email]">Email</label>
                      
						<input type="text" name="witnesses[1][email]" id="witnesses[{{ $i }}][email]" value="{{$newwitnesses[1]->email}}">
                       
					</div>
				</div> <!-- end row -->
			</div>
		</div> <!-- end row -->
	</fieldset>
	<!-- end witness 1 info -->
    
    @endif
     @if(isset($newwitnesses[2]->id))
    	<fieldset>
		<legend class="sub-legend">1st Witness \ Responder</legend>
		<div class="row">
			<div class="span12">
				<div class="row">
					<input type="text" class="hideID" name="witnesses[{{ $i }}][id]" id="witnesses[{{ $i }}][id]">
					
					<div class="span2">
						<label for="witnesses[{{ $i }}][type]">Type</label>
                       
						<!--<select name="witnesses[2][type]" id="witnesses[{{ $i }}][type]">
							
                            //@foreach( $witnessType as $key => $value )//
								<option value="{{ $key }}">{{ $value }}</option>
							
                            //@endforeach
						</select>-->
                                  @if (isset($newwitnesses[2]->type))
              {{ Form::select('witnesses[2][type]',$witnessType,$newwitnesses[2]->type) }}
              @else
              {{ Form::select('witnesses[2][type]',$witnessType)}}
              @endif 
                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][involvement]">Involvement</label>
                         
					<!--<select name="witnesses[2][involvement]" id="witnesses[{{ $i }}][involvement]">
							
                           // @foreach( $involvement as $key => $value )//
								<option value="{{ $key }}">{{ $value }}</option>
							
                           // @endforeach
						</select>
                        
                        </select>-->
                          @if (isset($newwitnesses[2]->involvement))
                            {{ Form::select('witnesses[2][involvement]',$involvement,$newwitnesses[2]->involvement) }}
                         @else
                        {{ Form::select('witnesses[2][involvement]',$involvement)}}
                        @endif
                        
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][first_name]">First Name</label>
                     
					 <input type="text" name="witnesses[2][first_name]" id="witnesses[{{ $i }}][first_name]" value="{{$newwitnesses[2]->first_name}}">
                      

                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][last_name]">Last Name</label>
                        
                         <input type="text" name="witnesses[2][last_name]" id="witnesses[{{ $i }}][last_name]" value="{{$newwitnesses[2]->last_name}}">
                         
					</div>
					<div class="span1 offset1">
						<label for="witnesses[{{ $i }}][age]">Age</label>
                       
                         <input type="text" name="witnesses[2][age]" id="witnesses[{{ $i }}][age]" class="input-small" value="{{$newwitnesses[2]->age}}">
                        
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][address]">Address</label>
                         
						<input type="text" name="witnesses[2][address]" id="witnesses[{{ $i }}][address]" value="{{$newwitnesses[2]->address}}">
                        
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][city]">City</label>
                   
						<input type="text" name="witnesses[2][city]" id="witnesses[{{ $i }}][city]"  value="{{$newwitnesses[2]->city}}">
                       
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][state]">State</label>
                         
						<input type="text" name="witnesses[2][state]" id="witnesses[{{ $i }}][state]" value="{{$newwitnesses[2]->state}}">
                       
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][zip]">Zip</label>
                       
						<input type="text" name="witnesses[2][zip]" id="witnesses[{{ $i }}][zip]" value="{{$newwitnesses[2]->zip}}">
                         
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][phone]">Phone</label>
                       
						<input type="text" name="witnesses[2][phone]" id="witnesses[{{ $i }}][phone]" value="{{$newwitnesses[2]->phone}}">
                        
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][email]">Email</label>
                      
						<input type="text" name="witnesses[2][email]" id="witnesses[{{ $i }}][email]" value="{{$newwitnesses[2]->email}}">
                       
					</div>
				</div> <!-- end row -->
			</div>
		</div> <!-- end row -->
	</fieldset>
	<!-- end witness 1 info -->
    
    @endif
    @if(isset($newwitnesses[3]->id))
    	<fieldset>
		<legend class="sub-legend">1st Witness \ Responder</legend>
		<div class="row">
			<div class="span12">
				<div class="row">
					<input type="text" class="hideID" name="witnesses[{{ $i }}][id]" id="witnesses[{{ $i }}][id]">
					
					<div class="span2">
						<label for="witnesses[{{ $i }}][type]">Type</label>
                       
						 <!--<select name="witnesses[3][type]" id="witnesses[{{ $i }}][type]">
							
                           // @foreach( $witnessType as $key => $value )//
								<option value="{{ $key }}">{{ $value }}</option>
							
                           // @endforeach
						</select>-->
                                         @if (isset($newwitnesses[3]->type))
             						 {{ Form::select('witnesses[3][type]',$witnessType,$newwitnesses[3]->type) }}
             						 @else
             						 {{ Form::select('witnesses[3][type]',$witnessType)}}
            							  @endif 
                       
                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[3][involvement]">Involvement</label>
                         
						<!--<select name="witnesses[{{ $i }}][involvement]" id="witnesses[{{ $i }}][involvement]">
							
                            //@foreach( $involvement as $key => $value )//
								<option value="{{ $key }}">{{ $value }}</option>
							
                            //@endforeach
						</select>
                        
                        </select>-->
                          @if (isset($newwitnesses[3]->involvement))
                            {{ Form::select('witnesses[3][involvement]',$involvement,$newwitnesses[3]->involvement) }}
                         @else
                        {{ Form::select('witnesses[3][involvement]',$involvement)}}
                        @endif
                        
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][first_name]">First Name</label>
                     
					 <input type="text" name="witnesses[3][first_name]" id="witnesses[{{ $i }}][first_name]" value="{{$newwitnesses[3]->first_name}}">
                      

                         
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][last_name]">Last Name</label>
                        
                         <input type="text" name="witnesses[3][last_name]" id="witnesses[{{ $i }}][last_name]" value="{{$newwitnesses[3]->last_name}}">
                         
					</div>
					<div class="span1 offset1">
						<label for="witnesses[{{ $i }}][age]">Age</label>
                       
                         <input type="text" name="witnesses[3][age]" id="witnesses[{{ $i }}][age]" class="input-small" value="{{$newwitnesses[3]->age}}">
                        
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][address]">Address</label>
                         
						<input type="text" name="witnesses[3][address]" id="witnesses[{{ $i }}][address]" value="{{$newwitnesses[3]->address}}">
                        
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][city]">City</label>
                   
						<input type="text" name="witnesses[3][city]" id="witnesses[{{ $i }}][city]"  value="{{$newwitnesses[3]->city}}">
                       
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][state]">State</label>
                         
						<input type="text" name="witnesses[3][state]" id="witnesses[{{ $i }}][state]" value="{{$newwitnesses[3]->state}}">
                       
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][zip]">Zip</label>
                       
						<input type="text" name="witnesses[3][zip]" id="witnesses[{{ $i }}][zip]" value="{{$newwitnesses[3]->zip}}">
                         
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][phone]">Phone</label>
                       
						<input type="text" name="witnesses[3][phone]" id="witnesses[{{ $i }}][phone]" value="{{$newwitnesses[3]->phone}}">
                        
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][email]">Email</label>
                      
						<input type="text" name="witnesses[3][email]" id="witnesses[{{ $i }}][email]" value="{{$newwitnesses[3]->email}}">
                       
					</div>
				</div> <!-- end row -->
			</div>
		</div> <!-- end row -->
	</fieldset>
	<!-- end witness 1 info -->
    
    @endif

</div>
<script type="text/javascript">

//$("#witness1").hide();
</script>