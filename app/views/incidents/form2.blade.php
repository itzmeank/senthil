@extends('layouts.master')

@section('main')
<div class="container first-item">
 <form method="POST" action="add1" accept-charset="UTF-8" id="newIncident">
	<fieldset>
				<legend>Witnesses / Reponders<button type="button" id="addWitness" class="btn pull-right">Add Witness</button></legend>

				
				@if (empty($witnesses) )
					@include('witnesses.newwitness')
				@else
					@include('witnesses.witnesses')
				@endif
				

			</fieldset>
			

			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Next</button>
			
			</div>

		{{ Form::close() }}
        
         <!--<script type="text/javascript">
                    $("#addWitness").click(function () {
                    $("#witnesses[0][type]").val($(this).val());
                      //alert($(this).val()) 
					  //$("#witnesses").hide();
				    $("#witnesses1").hide();
			        })
              </script>-->

		<script>
			$("#incident_status").prop('disabled', true);
			$(".hideID").hide();
			$("#witness1").hide();
			
			$("#addWitness").on('click', function() {
				 //$("#witness1").show();
				// $("#witness0").hide();
				// $("#witnesses3").show();
				 //$("#seltype").hide();
				 //$("#witnesses2").hide();
			});

			var c = 0;

			$("#addWitness").on('click', function() {
			
				 $("div#witness" + c)
			        .clone()
			        .insertAfter($("div#witness" + c))
			        .attr("id", "witness" + (++c) )
			        .find("input, textarea,select").attr("name",function(i,oldVal) {
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
		<!--<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>-->
	<!--	<script type="text/javascript" src="http://localhost/incident1/public/js/validation.js"></script>-->
           {{ Html::script('js/jquery.validate.js') }}
            {{ Html::script('js/validation.js') }}
        	
	</div>
@stop