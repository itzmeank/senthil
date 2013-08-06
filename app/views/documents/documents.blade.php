
@for ( $i = 0; $i < count($documents); $i++ )

	<div id="document{{ $i }}">
		<input type="text" class="hideID" name="documents[{{ $i }}][id]" id="documents[{{ $i }}][id]" value="{{ $documents[$i]['id'] }}">
		<div class="row">
			<div class="span2">
				<label for="documents[{{ $i }}][title]">Title</label>
				<input type="text" name="documents[{{ $i }}][title]" id="documents[{{ $i }}][title]" value="{{ $documents[$i]['title'] }}">
			</div>
			<div class="span2 offset1">
				<label for="documents[{{ $i }}][description]">Description</label>
				<input type="text" name="documents[{{ $i }}][description]" id="documents[{{ $i }}][description]" value="{{ $documents[$i]['description'] }}">
			</div>
			<div class="span2 offset1">
				<label for="documents[{{ $i }}][path]">Path</label>
				<input type="text" disabled="true" name="documents[{{ $i }}][path]" id="documents[{{ $i }}][path]" value="{{ $documents[$i]['path'] }}">
			</div>
		</div>
	</div>

@endfor