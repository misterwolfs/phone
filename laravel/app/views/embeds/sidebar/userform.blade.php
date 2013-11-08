
<div class="close-sidebar"></div>

<h4>UserInfo</h4>

@if ($is_repairder == '0')
   <?php  $is_repairder = false ?>
@else
  <?php $is_repairder = true ?>
@endif


{{ 	Form::open(array('url' => 'user/edit', 'id' => 'editUser')) }}
<div class="category">Personal information</div>
<p>
	{{ Form::label('firstname', 'Firstname') }} <br />
	{{ Form::text('firstname', $firstname ); }} 
</p>

<p>
	{{ Form::label('lastname', 'Lastname') }} <br />
	{{ Form::text('lastname', $lastname) }} 
</p>

<p>
	{{ Form::label('email', 'Email') }} <br />
	{{ Form::email('email', $email) }} 
</p>

<div class="category spacer">Repair information</div>
<p>
	{{ Form::label('repairder', 'Can you repair broken stuff?') }} <br />
	{{ Form::checkbox('repairder', 'repairder', $is_repairder) }}
</p>
@if ($is_repairder == '1')
<p><a id="repair-location" class="underline" href="#set-repair-location">Set repair location</a></p>
@else
<p><a id="repair-location" class="underline hidden" href="#set-repair-location">Set repair location</a></p>
@endif

<p>
	{{ Form::submit('Edit', ['class' => 'btn no-icon round green margin']) }}
</p>

{{ Form::close() }}
<br><br>
