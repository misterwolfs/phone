<h4>{{ $model }}</h4>

<div id="phone-view">
	<div class="wrapper-phone">
		<div class="category spacer">The phone</div>
		<table class="two-column-float">
			<tr>
				<td>Brand:</td>
				<td>{{ $brand }}</td>
			</tr>
			<tr>
				<td>Price:</td>
				<td>{{ $price }}</td>
			</tr>
			<tr>
				<td>Year:</td>
				<td>{{ $year }}</td>
			</tr>

		</table>
		<table class="two-column-float right">
			<tr>
				<td>Usage:</td>
				<td>{{ $usage }}</td>
			</tr>
			<tr>
				<td>State:</td>
				<td>{{ $state }}</td>
			</tr>
			<tr>
				<td>Color:</td>
				<td>{{ $color }}</td>
			</tr>
		</table>
	</div>

	<div class="wrapper-phone">
		<div class="category spacer">Description</div>
		<p>{{ $description }}</p>
	</div>

	<div class="wrapper-button">
		<button class="btn round green sold no-icon shadow">Sold</button>
	</div>

	<input type="hidden" name="lat" value="{{ $lat }}">
	<input type="hidden" name="long" value="{{ $long }}">

</div>
<br><br>
