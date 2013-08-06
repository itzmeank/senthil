<?php $i = 0; ?>

<div id="followup{{ $i }}">
	<input type="text" class="hideID" name="followups[{{ $i }}][id]" id="followups[{{ $i }}][id]">
	<div class="row">
		<div class="span2">
			<label for="followups[{{ $i }}][date]">Date</label>
             @if (empty($newfollowup[0]->id))
             <input type="text" name="followups[{{ $i }}][date]" id="sample" />
             @else
			<input type="text" name="followups[{{ $i }}][date]" id="sample" value="{{$newfollowup[0]->date}}">
            @endif
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][staff]">Staff</label>
              @if (empty($newfollowup[0]->id))
              <input type="text" name="followups[{{ $i }}][staff]" id="followups[{{ $i }}][staff]" />
              @else
			<input type="text" name="followups[{{ $i }}][staff]" id="followups[{{ $i }}][staff]" value="{{$newfollowup[0]->staff}}" >
            @endif
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][whom]">Whom</label>
            @if (empty($newfollowup[0]->id))
            <input type="text" name="followups[{{ $i }}][whom]" id="followups[{{ $i }}][whom]"  />
             @else
			<input type="text" name="followups[{{ $i }}][whom]" id="followups[{{ $i }}][whom]" value="{{$newfollowup[0]->whom}}">
            @endif
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<label for="followups[{{ $i }}][notes]">Notes</label>
			 @if(isset($newfollowup[0]->notes))
			<textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ><?= $newfollowup[0]->notes; ?></textarea>
            @else
            <textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ></textarea>
            @endif
		</div>
	</div>
</div>
  @if(isset($newfollowup[1]->id))
<div id="followup{{ $i }}">
	<input type="text" class="hideID" name="followups[{{ $i }}][id]" id="followups[{{ $i }}][id]">
	<div class="row">
		<div class="span2">
			<label for="followups[1][date]">Date</label>
             
			<input type="text" name="followups[1][date]" id="sample1" value="{{$newfollowup[1]->date}}">
           
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][staff]">Staff</label>
              
			<input type="text" name="followups[1][staff]" id="followups[{{ $i }}][staff]" value="{{$newfollowup[1]->staff}}" >
            
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][whom]">Whom</label>
           
			<input type="text" name="followups[1][whom]" id="followups[{{ $i }}][whom]" value="{{$newfollowup[1]->whom}}">
           
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<label for="followups[{{ $i }}][notes]">Notes</label>
			@if(isset($newfollowup[1]->notes))
			<textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ><?= $newfollowup[1]->notes; ?></textarea>
            @else
            <textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ></textarea>
            @endif
		</div>
	</div>
</div>
@endif

  @if(isset($newfollowup[2]->id))
<div id="followup{{ $i }}">
	<input type="text" class="hideID" name="followups[{{ $i }}][id]" id="followups[{{ $i }}][id]">
	<div class="row">
		<div class="span2">
			<label for="followups[1][date]">Date</label>
             
			<input type="text" name="followups[2][date]" id="sample2" value="{{$newfollowup[2]->date}}">
           
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][staff]">Staff</label>
              
			<input type="text" name="followups[2][staff]" id="followups[{{ $i }}][staff]" value="{{$newfollowup[2]->staff}}" >
            
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][whom]">Whom</label>
           
			<input type="text" name="followups[2][whom]" id="followups[{{ $i }}][whom]" value="{{$newfollowup[2]->whom}}">
           
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<label for="followups[{{ $i }}][notes]">Notes</label>
			@if(isset($newfollowup[2]->notes))
			<textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ><?= $newfollowup[2]->notes; ?></textarea>
            @else
            <textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ></textarea>
            @endif
		</div>
	</div>
</div>
@endif
  @if(isset($newfollowup[3]->id))
<div id="followup{{ $i }}">
	<input type="text" class="hideID" name="followups[{{ $i }}][id]" id="followups[{{ $i }}][id]">
	<div class="row">
		<div class="span2">
			<label for="followups[1][date]">Date</label>
             
			<input type="text" name="followups[3][date]" id="sample3" value="{{$newfollowup[3]->date}}">
           
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][staff]">Staff</label>
              
			<input type="text" name="followups[3][staff]" id="followups[{{ $i }}][staff]" value="{{$newfollowup[3]->staff}}" >
            
		</div>
		<div class="span2 offset1">
			<label for="followups[{{ $i }}][whom]">Whom</label>
           
			<input type="text" name="followups[3][whom]" id="followups[{{ $i }}][whom]" value="{{$newfollowup[3]->whom}}">
           
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<label for="followups[{{ $i }}][notes]">Notes</label>
			@if(isset($newfollowup[3]->notes))
			<textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ><?= $newfollowup[3]->notes; ?></textarea>
            @else
            <textarea class="input-block-level" name="followups[{{ $i }}][notes]" id="followups[{{ $i }}][notes]" cols="30" rows="10" ></textarea>
            @endif
		</div>
	</div>
</div>
@endif