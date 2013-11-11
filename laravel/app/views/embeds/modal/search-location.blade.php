<h3>Search by location</h3>

{{ 	Form::open(array('url' => 'search/location/current', 'id' => 'searchLocation')) }}
	
<p>
	{{	Form::label('location-search', 'Location') }} <br>
	{{	Form::text('location-search', null, array('class' => 'extend'))	}}
</p>


 
{{ Form::close() }}
