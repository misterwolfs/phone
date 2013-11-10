
<div class="close-sidebar"></div>

<h4>Search by location</h4>

{{ 	Form::open(array('url' => 'search/location/current', 'id' => 'searchLocation')) }}
	
<p>
	{{	Form::label('location', 'Location') }}
	{{	Form::text('location')	}}
</p>

<p>
	{{Form::submit('Search', ['class' => 'btn no-icon round green margin'])}}
</p>

{{ Form::close() }}
<br><br>