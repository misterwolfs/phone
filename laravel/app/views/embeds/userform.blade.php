
<div class="close-sidebar"></div>

<h4>UserInfo</h4>

@if ($is_repairder == '0')
   <?php  $is_repairder = false ?>
@else
  <?php $is_repairder = true ?>
@endif


{{ 	Form::open(array('url' => 'user/edit', 'id' => 'editUser')) }}
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

<p>
	{{ Form::label('repairder', 'Are you a repairder?') }} <br />
	{{ Form::checkbox('repairder', 'repairder', $is_repairder) }}
</p>

<p>
	{{ Form::submit('Save!') }}
</p>

{{ Form::close() }}
<br><br>
