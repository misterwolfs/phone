
<div class="close-sidebar"></div>

<h4>Make an advanced search</h4>

{{ 	Form::open(array('url' => 'search/advanced/get', 'id' => 'searchPhone')) }}
<div class="category">The phone</div>
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
	{{ Form::select('year', $allyears) }}
</p>
<div class="category">Condition</div>
<p>
	{{ Form::label('usage', 'Usage') }} <br />
	{{ Form::select('usage', $usage) }}
</p>

<p>
	{{ Form::label('state', 'State') }} <br />
	{{ Form::select('state', $state) }}
</p>
<div class="category">Price between : </div>
<p>
	{{ Form::label('min', 'Min') }} <br />
	<input name="min" type="number" step="any" min="0" value="0" />
</p>
<p>
	{{ Form::label('max', 'Max') }} <br />
	<input name="max" type="number" step="any" min="0" value="900" />

</p>

<br />

<p>
	{{ Form::label('flexible', 'Do you want a flexible search') }} <br />
	{{ Form::checkbox('flexible', 'flexible') }}
</p>

<p>
	{{Form::submit('Submit', ['class' => 'btn no-icon round green margin'])}}
</p>

{{ Form::close() }}
<br><br>