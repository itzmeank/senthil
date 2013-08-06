@extends('layouts.master')

@section('main')
 
              
  
<div class="container first-item">


 <form method="POST" action="edit4" accept-charset="UTF-8" id="editIncident">

			<fieldset>
			<legend>Follow-Up<button type="button" id="addFollowup" class="btn pull-right">Add Followup</button></legend>

				@if (empty($followups) )
					@include('followups.newfollowup')
				@else
					@include('followups.followups')
				@endif

			</fieldset>
            <div class="form-actions">
			  <button type="submit" class="btn btn-primary">Save</button>
			  <button type="button" id="cancel" class="btn">Cancel</button>
			</div>
            	{{ Form::close() }}
                	<script>
			$("#incident_status").prop('disabled', true);
			$(".hideID").hide();
			$("#cancel").on('click', function() {
				window.location = '{{{ URL::to('incidents/') }}}'
			});

			var c = 0;

			$("#addWitness").on('click', function() {
				 $("div#witness" + c)
			        .clone()
			        .insertAfter($("div#witness" + c))
			        .attr("id", "witness" + (++c) )
			        .find("input, textarea").attr("name",function(i,oldVal) {
			            return oldVal.replace(/\[(\d+)\]/,function(_,m){
			                return "[" + (+m + 1) + "]";
			            })
			        })
			        .val("");

			    return false;
			});

			$("#addFollowup").on('click', function() {
		        $("div#followup" + c)
			        .clone()
			        .insertAfter($("div#followup" + c))
			        .attr("id", "followup" + (++c) )
			        .find("input, textarea").attr("name",function(i,oldVal) {
			            return oldVal.replace(/\[(\d+)\]/,function(_,m){
			                return "[" + (+m + 1) + "]";
			            })
			        })
			        .val("");

			    return false;
			});

			$("#addDocument").on('click', function() {
		        $("div#document" + c)
			        .clone()
			        .insertAfter($("div#document" + c))
			        .attr("id", "document" + (++c) )
			        .find("input, textarea").attr("name",function(i,oldVal) {
			            return oldVal.replace(/\[(\d+)\]/,function(_,m){
			                return "[" + (+m + 1) + "]";
			            })
			        })
			        .val("");

			    return false;
			});
		</script>

		<!-- form validation -->
          {{ Html::script('js/jquery.validate.js') }}
          {{ Html::script('js/validation.js') }}
           {{ Html::style('css/jquery-ui.css') }}
    

      {{ Html::style('css/jquery.ptTimeSelect.css') }}
       
	
          
          {{ Html::script('js/jquery.min.js') }}
		
          {{ Html::script('js/jquery-ui.min.js') }}
          {{ Html::script('js/jquery.ptTimeSelect.js') }}
       <script>
  $(document).ready(function() {
   
	  $('#sample').datepicker({ dateFormat: "yy-mm-dd" });
	  $('#sample1').datepicker({ dateFormat: "yy-mm-dd" });
	  $('#sample2').datepicker({ dateFormat: "yy-mm-dd" });
	  $('#sample3').datepicker({ dateFormat: "yy-mm-dd" });
	  $('#sample4').datepicker({ dateFormat: "yy-mm-dd" });
	  $('#sample5').datepicker({ dateFormat: "yy-mm-dd" });
	 
	
  });
  </script>
		
	</div>
    @stop