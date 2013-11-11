<h3>Search by location</h3>

{{ 	Form::open(array('url' => 'search/location/current', 'id' => 'searchLocationCafe')) }}
	
<p>
	{{	Form::label('location-cafe-search', 'Location') }} <br>
	{{	Form::text('location-cafe-search', null, array('class' => 'extend'))	}}
</p>

 
{{ Form::close() }}
