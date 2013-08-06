@extends('layouts.master')

@section('main')
<div class="container first-item">
	<h1>Incidents</h1>
    @if(count($incidents) >= 1)

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Incident ID</th>
				<th>Incident Branch</th>
				<th>Incident Date</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
        
			@foreach( $incidents as $incident )
				<tr>
					<td>{{ $incident->id }}</td>
					<td>{{ $incident->incident_branch }}</td>
					<td>{{ date('m/d/Y', strtotime($incident->incident_date)) }}</td>
					<td>{{ $incident->first_name }}</td>
					<td>{{ $incident->last_name }}</td>
					<td><span class="label incident-status">{{ $incident->incident_status }}</span></td>
					<td>
                    <a class="btn btn-primary btn-mini" href="../public/incidents/{{ $incident->id }}"><i class="icon-file icon-white"></i> View</a>                    
					<a class="btn btn-primary btn-mini" href="../public/incidents/{{ $incident->id }}/edit"><i class="icon-pencil icon-white"></i> Edit</a>
                   <!-- <a class="btn btn-primary btn-mini" href="../public/incidents/getpdf/{{ $incident->id }}"><i class="icon-file icon-white"></i> Make pdf</a>-->
                   <!-- <a class="btn btn-primary btn-mini" href="../public/incidents/email/{{ $incident->id }}"><i class="icon-pencil icon-white"></i> Send Email</a>-->
                    </td>
				</tr>
			@endforeach
			 {{$incidents->links()}}
		</tbody>
	</table>
    @else
<tr>
					<td>
                     <div class="alert alert-error"><h3>No Records found</h3></div>
                     </td>
		</tr>
	@endif
</div>
@stop