<h3>Search by location</h3>

{{ 	Form::open(array('url' => 'search/location/current', 'id' => 'searchLocation')) }}
	
<p>
	{{	Form::label('location-searchs', 'Location') }} <br>
	{{	Form::text('location-searchs')	}}
</p>

<!-- <p>
	{{Form::submit('Search', ['class' => 'btn no-icon round green margin'])}}
</p>
 -->
 
{{ Form::close() }}
