<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Incident Tracking</title>
		
         {{ Html::style('css/bootstrap.min.css') }}
        {{ Html::style('css/style.css') }}
		<script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="{{{ URL::to('incidents') }}}"><img src="{{URL::asset('/img/logo.png')}}" alt="logo" width="30px" height="25px"> Incident Tracking</a>
					<ul class="nav">
						<li><a href="{{{ URL::to('incidents/') }}}" class="">View Incidents</a></li>
						<li><a href="{{{ URL::to('incidents/create') }}}" class="">New Incident</a></li>
					</ul>
					<ul class="nav pull-right">
                      @if ( Auth::guest() )
                        <li>{{ Html::linkAction( 'UserController@login', 'Login' ) }}</li>
                       <li>{{ Html::linkAction( 'UserController@create', 'Signup' ) }}</li>
                          @else
                    <li><a href="#">Logged User: {{{  Auth::user()->username }}}</a></li>
                   
					<li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                     @endif
					</ul>
					<form class="navbar-search pull-right">
					  <input type="text" class="search-query" placeholder="Search">
					</form>
				</div>
			</div>
		</div>
	        
			@yield('main')
		{{Html::script('js/functions.js')}}
		<script>
			// add label classes
			$('.incident-status').each( function(){
				var status = $(this).text();
				if ( status === 'Open' ) {
					$(this).addClass('label-info');
				}
				else if ( status === 'Closed' ) {
					$(this).addClass('label-inverse');
				}
				else if ( status === 'Reviewed' ) {
					$(this).addClass('label-important');
				}
				else if ( status === 'Signoff' ) {
					$(this).addClass('label-warning');
				}
			});

			// redirect when search form is submitted
			$('.navbar-search').on('submit', function(e) {
				e.preventDefault();
				window.location = '{{{ URL::to('search/') }}}/' + $('.search-query').val();
			});
			
		</script>
		<script>
			$('#incident_form_new').removeAttr('novalidate');
			$('#incident_form_edit').removeAttr('novalidate');
		</script>
		@yield('footer')
	</body>
</html>