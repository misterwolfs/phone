
<div class="close-sidebar"></div>

<h4>Add a phone</h4>

{{ 	Form::open(array('url' => 'addphone', 'id' => 'addPhone')) }}
<div class="category">The phone</div>
<p>
	{{ Form::label('model', 'Model') }} <br />
	{{ Form::text('model') }} 
</p>

<p>
	{{ Form::label('brand', 'Brand') }} <br />
	
	
	{{ Form::select('brand', $brands) }}
</p>

<p>
	{{ Form::label('color', 'Color') }} <br />
	{{ Form::text('color') }} 
</p>

<p>
	{{ Form::label('year', 'Year') }} <br />
	{{ Form::text('year') }} 
</p>
<div class="category">Condition</div>
<p>
	{{ Form::label('usage', 'Usage') }} <br />
	{{ Form::text('usage') }} 
</p>

<p>
	{{ Form::label('state', 'State') }} <br />
	{{ Form::text('state') }} 
</p>
<div class="category">Price and details</div>
<p>
	{{ Form::label('price', 'Price') }} <br />
	{{ Form::text('price') }} 
</p>

<p>
	{{ Form::label('description', 'Description') }} <br />
	{{ Form::textarea('description') }} 
</p>
	
	{{ Form::hidden('lat', ' ', array('id' => 'lat')) }}
	{{ Form::hidden('long', ' ', array('id' => 'long')) }}

	<!--  <input type="hidden" id="lat" name="lat" />
	<input type="hidden" id="long" name="long"  /> -->

<p>
	{{Form::submit('Submit', array('class' => 'btn no-icon round green margin'))}}
</p>

{{ Form::close() }}
<br><br>