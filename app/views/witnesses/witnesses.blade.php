@for ( $i = 0; $i < count($witnesses); $i++ )
	
<div id="witness{{ $i }}">

	<fieldset>
		<legend class="sub-legend">Witness / Responder</legend>
		<div class="row">
			<div class="span12">
				<input type="text" class="hideID" name="witnesses[{{ $i }}][id]" id="witnesses[{{ $i }}][id]" value="{{ $witnesses[$i]['id'] }}">
				<div class="row">					
					<div class="span2">
						<label for="witnesses[{{ $i }}][type]">Type</label>
						  {{ Form::select(witnesses[{{ $i }}][type], $witnessType) }}
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][involvement]">Involvement</label>
						   {{ Form::select(witnesses[{{ $i }}][type], $involvement) }}
                        	
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][first_name]">First Name</label>
						<input type="text" name="witnesses[{{ $i }}][first_name]" id="witnesses[{{ $i }}][first_name]", value="{{ $witnesses[$i]['first_name'] }}">
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][last_name]">Last Name</label>
						<input type="text" name="witnesses[{{ $i }}][last_name]" id="witnesses[{{ $i }}][last_name]", value="{{ $witnesses[$i]['last_name'] }}">
					</div>
					<div class="span1 offset1">
						<label for="witnesses[{{ $i }}][age]">Age</label>
						<input type="text" name="witnesses[{{ $i }}][age]" id="witnesses[{{ $i }}][age]" class="input-small", value="{{ $witnesses[$i]['age'] }}">
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][address]">Address</label>
						<input type="text" name="witnesses[{{ $i }}][address]" id="witnesses[{{ $i }}][address]", value="{{ $witnesses[$i]['address'] }}">
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][city]">City</label>
						<input type="text" name="witnesses[{{ $i }}][city]" id="witnesses[{{ $i }}][city]", value="{{ $witnesses[$i]['city'] }}">
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][state]">State</label>
						<input type="text" name="witnesses[{{ $i }}][state]" id="witnesses[{{ $i }}][state]", value="{{ $witnesses[$i]['state'] }}">
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][zip]">Zip</label>
						<input type="text" name="witnesses[{{ $i }}][zip]" id="witnesses[{{ $i }}][zip]", value="{{ $witnesses[$i]['zip'] }}">
					</div>
				</div> <!-- end row -->
				<div class="row">
					<div class="span2">
						<label for="witnesses[{{ $i }}][phone]">Phone</label>
						<input type="text" name="witnesses[{{ $i }}][phone]" id="witnesses[{{ $i }}][phone]", value="{{ $witnesses[$i]['phone'] }}">
					</div>
					<div class="span2 offset1">
						<label for="witnesses[{{ $i }}][email]">Email</label>
						<input type="text" name="witnesses[{{ $i }}][email]" id="witnesses[{{ $i }}][email]", value="{{ $witnesses[$i]['email'] }}">
					</div>
				</div> <!-- end row -->
			</div>
		</div> <!-- end row -->
	</fieldset>
	<!-- end witness 1 info -->

</div>

@endfor