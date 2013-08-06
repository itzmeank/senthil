<?php $i = 0; ?>

<div id="document{{ $i }}">
	<input type="text" class="hideID" name="documents[{{ $i }}][id]" id="documents[{{ $i }}][id]">
	<div class="row">
		<div class="span2">
			<label for="documents[{{ $i }}][title]">Title</label>
			<input type="text" name="documents[{{ $i }}][title]" id="documents[{{ $i }}][title]">
		</div>
		<div class="span2 offset1">
			<label for="documents[{{ $i }}][description]">Description</label>
			<input type="text" name="documents[{{ $i }}][description]" id="documents[{{ $i }}][description]">
		</div>
		<div class="span2 offset1">
			<label for="documents[{{ $i }}][path]">Attach Document</label>
			<input type="file" name="documents[{{ $i }}][path]" id="documents[{{ $i }}][path]">
		</div>
	</div>
</div>