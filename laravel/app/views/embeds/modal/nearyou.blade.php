<h3>Search by location</h3>

{{ 	Form::open(array('url' => 'search/location/current', 'id' => 'searchLocationCafe')) }}
	
<p>
	{{	Form::label('location-cafe-search', 'Location') }} <br>
	{{	Form::text('location-cafe-search')	}}
</p>

<!-- <p>
	{{Form::submit('Search', ['class' => 'btn no-icon round green margin'])}}
</p>
 -->
 
{{ Form::close() }}
