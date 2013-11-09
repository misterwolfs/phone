
<div class="close-sidebar"></div>

<h4>Add a phone</h4>

{{ 	Form::open(array('url' => 'addphone', 'id' => 'addPhone')) }}
<div id="step1" class="step">
	<div class="category">Step 1: The phone</div>
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
	<button class="btn round green no-icon shadow check-step">Next</button>
</div>

<div id="step2" class="step hidden">
	<div class="category spacer">Step 2: Condition</div>
	<p>
		{{ Form::label('usage', 'Usage') }} <br />
		{{ Form::text('usage') }} 
	</p>

	<p>
		{{ Form::label('state', 'State') }} <br />
		{{ Form::text('state') }} 
	</p>
	<button class="btn round green no-icon shadow check-step">Next</button>
</div>

<div id="step3" class="step hidden">
	<div class="category spacer">Step 3: Price and details</div>
	<p>
		{{ Form::label('price', 'Price') }} <br />
		<input name="price" type="number" step="any" />
	</p>

	<p>
		{{ Form::label('description', 'Description') }} <br />
		{{ Form::textarea('description') }} 
	</p>
		
		{{ Form::hidden('lat', ' ', array('id' => 'lat')) }}
		{{ Form::hidden('long', ' ', array('id' => 'long')) }}

	{{Form::submit('Submit', ['class' => 'btn no-icon round green margin check-step'])}}

{{ Form::close() }}
</div>
<br><br>
<p id="notification"></p>
<br><br>