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

	<div class="wrapper-button">
		<button onclick="window.location.href='{{ $website }}'" class="btn round green no-icon shadow">Visit website</button>
	</div>

</div>