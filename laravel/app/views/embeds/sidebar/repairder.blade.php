<h4>Repairder</h4>

<div id="phone-view">
	<div class="wrapper-phone">
		<img src="{{ $photo }}" alt="{{{ $firstname	}}}" style="max-width: 100px;height:auto;">
		<p>{{ $firstname}} </p>
	</div>

	
	<div class="wrapper-button">
		<button id="{{ $facebook }}" class="btn round blue icon facebook shadow new-window">Send message</button>
		@if($email)
		<button id="mailto:{{ $email }}" class="btn round green icon mail shadow new-window right">Send mail</button>
		@endif
	</div>

</div>