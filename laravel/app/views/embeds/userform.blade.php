


<div class="close-sidebar"></div>

<h4>UserInfo</h4>

{{ 	Form::open(array('id' => 'editUser')) }}
<p>
	{{ Form::label('firstname', 'Firstname') }} <br />
	{{ Form::text('firstname') }} 
</p>

<p>
	{{ Form::label('lastname', 'Lastname') }} <br />
	{{ Form::text('lastname') }} 
</p>

<p>
	{{ Form::label('email', 'Email') }} <br />
	{{ Form::text('email') }} 
</p>

<p>
	{{ Form::submit('Edit!') }}
</p>

{{ Form::close() }}