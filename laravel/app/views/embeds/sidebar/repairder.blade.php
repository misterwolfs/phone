<h4>Repairder</h4>

<div id="phone-view">
	<div class="wrapper-phone">
		<div class="category">Information</div>
		<img src="{{ $photo }}" alt="{{{ $firstname	}}}" style="max-width: 150px;height:auto;">
		<p>{{ $firstname}} </p>
	</div>

	@if($email)
	<div class="wrapper-button">
		<button id="mailto:{{ $email }}" class="btn round green icon mail shadow new-window">Send Message</button>
	</div>
	@endif
	
	<div class="wrapper-button">
		<button id="{{ $facebook }}" class="btn round blue icon  facebook shadow new-window new-window">Send message</button>
	</div>


</div>