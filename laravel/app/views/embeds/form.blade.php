
<div class="close-sidebar"></div>

<h4>Add a phone</h4>

{{ 	Form::open(array('url' => 'addphone', 'id' => 'addPhone')) }}
<p>
	{{ Form::label('model', 'Model') }} <br />
	{{ Form::text('model') }} 
</p>

<p>
	{{ Form::label('brand', 'Brand') }} <br />
	{{ Form::text('brand') }} 
</p>

<p>
	{{ Form::label('year', 'Year') }} <br />
	{{ Form::text('year') }} 
</p>

<p>
	{{ Form::label('usage', 'Usage') }} <br />
	{{ Form::text('usage') }} 
</p>

<p>
	{{ Form::label('stage', 'Stage') }} <br />
	{{ Form::text('stage') }} 
</p>

<p>
	{{ Form::label('price', 'Price') }} <br />
	{{ Form::text('price') }} 
</p>

<p>
	{{ Form::label('description', 'Description') }} <br />
	{{ Form::textarea('description') }} 
</p>

<p>
	{{ Form::label('color', 'Color') }} <br />
	{{ Form::text('color') }} 
</p>

<p>
	{{ Form::submit('Add new phone') }}
</p>

{{ Form::close() }}
<br><br>