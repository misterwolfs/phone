<h4>Repairder</h4>

<div id="phone-view">
	<div class="wrapper-phone">
		<div class="category">Information</div>
		<img src="{{ $photo }}" alt="{{{ $firstname	}}}" style="max-width: 150px;height:auto;">
		<p>{{ $firstname}} </p>
	</div>

	@if($email)
	<div class="wrapper-button">
		<button id="{{ $email }}" class="btn round green no-icon shadow new-window">Send Message</button>
	</div>
	@endif

</div>