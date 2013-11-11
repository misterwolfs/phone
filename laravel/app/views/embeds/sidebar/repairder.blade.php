<h4>Repairder</h4>

<div id="phone-view">
	<div class="wrapper-phone">
		<div class="category">Information</div>
		<table class="one-column">
			<tr>
				<td>Name:</td>
				<td>{{ $firstname}} {{ $lastname }}</td>
			</tr>
			<tr>
				<img src="{{ $photo }}" alt="{{{ $firstname	}}}">
			</tr>
		</table>
	</div>

	@if($email)
	<div class="wrapper-button">
		<button onclick="window.location.href='{{ $email }}'" class="btn round green no-icon shadow">Send Message</button>
	</div>
	@endif

</div>