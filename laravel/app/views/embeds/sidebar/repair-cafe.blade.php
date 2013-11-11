<h4>Repaircafé</h4>

<div id="phone-view">
	<div class="wrapper-phone">
		<div class="category">Information</div>
		<table class="one-column">
			<tr>
				<td>Name:</td>
				<td>{{ $name }}</td>
			</tr>
			<tr>
				<td>Address:</td>
				<td>{{ $adress }}</td>
			</tr>
			<tr>
				<td>Postal:</td>
				<td>{{ $postalcode }}</td>
			</tr>
			<tr>
				<td>Village:</td>
				<td>{{ $village }}</td>
			</tr>
		</table>
	</div>

	@if($website)
	<div class="wrapper-button">
		
		<button id="{{ $website }}" class="btn round green no-icon shadow new-window">Visit website</button>
	</div>
	@endif

</div>