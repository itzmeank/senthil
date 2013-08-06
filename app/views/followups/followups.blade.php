	
@for ( $i = 0; $i < count($followups); $i++ )

	<div id="followup{{ $i }}">
		<input type="text" class="hideID" name="followups[{{ $i }}][id]" id="followups[{{ $i }}][id]" value="{{ $followups[$i]['id'] }}">
		<div class="row">
			<div class="span2">
				<label for="followups[{{ $i }}][date]">Date</label>
				<input type="text" name="followups[{{ $i }}][date]" id="sample5" value="{{ $followups[$i]['date'] }}">
			</div>
			<div class="span2 offset1">
				<label for="followups[{{ $i }}][staff]">Staff</label>
				<input type="text" name="followups[{{ $i }}][staff]" id="followups[{{ $i }}][staff]" value="{{ $followups[$i]['staff'] }}">
			</div>
			<div class="span2 offset1">
				<label for="followups[{{ $i }}][whom]">Whom</label>
				<input type="text" name="followups[{{ $i }}][whom]" id="followups[{{ $i }}][whom]" value="{{ $followups[$i]['whom'] }}">
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<label for="followups[{{ $i }}][notes]">Notes</label>
				<textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10"></textarea>
			</div>
		</div>
	</div>

@endfor