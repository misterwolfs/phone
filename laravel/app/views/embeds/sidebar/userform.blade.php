
<div class="close-sidebar"></div>

<h4>UserInfo</h4>

@if ($user['is_repairder'] == '0')
   <?php  $user['is_repairder'] = false ?>
@else
  <?php $user['is_repairder'] = true ?>
@endif


{{ 	Form::open(array('url' => 'user/edit', 'id' => 'editUser')) }}
<div class="category">Personal information</div>
<p>
	{{ Form::label('firstname', 'Firstname') }} <br />
	{{ Form::text('firstname', $user['firstname'] ); }} 
</p>

<p>
	{{ Form::label('lastname', 'Lastname') }} <br />
	{{ Form::text('lastname', $user['lastname']) }} 
</p>

<p>
	{{ Form::label('email', 'Email') }} <br />
	{{ Form::email('email', $user['email']) }} 
</p>

<div class="category spacer">Repair information</div>
<p>
	{{ Form::label('repairder', 'Can you repair broken stuff?') }} <br />
	{{ Form::checkbox('repairder', 'repairder', $user['is_repairder']) }}
</p>
@if ($user['is_repairder'] == '1')
	@if(count($repairder) > 0)
		<p>You have already set your repair location.</p>
	@else
		<p id='message'><a id="repair-location" class="underline" href="#set-repair-location">Set repair location</a></p>
	@endif
@else
<p id='message'><a id="repair-location" class="underline hidden" href="#set-repair-location">Set repair location</a></p>
@endif

	{{ Form::hidden('lat', ' ', array('id' => 'lat')) }}
	{{ Form::hidden('long', ' ', array('id' => 'long')) }}

<p>
	{{ Form::submit('Save', array('class' => 'btn no-icon round green')) }}
	<button onclick="window.location.href='logout'" class="btn round red no-icon right shadow">Log out</button>
</p>

{{ Form::close() }}
<br><br>
