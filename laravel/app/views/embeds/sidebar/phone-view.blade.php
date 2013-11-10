<h4>{{ $model }}</h4>

<div id="phone-view">
	<div class="image-holder">
		<img src="http://placehold.it/110x110">
		<img src="http://placehold.it/110x110">
		<img src="http://placehold.it/110x110">
	</div>

	<div class="wrapper-phone">
		<div class="category spacer">The seller</div>
		<table class="two-column-float">
			<tr>
				<td>Name:</td>
				<td>{{ $firstname . ' ' . $lastname }}</td>
			</tr>
		</table>
		<table class="two-column-float">
			<tr>
				<td>Place:</td>
				<td><a href="#" id="zoom-phone" class="underline">zoom in</a></td>
			</tr>
		</table>
	</div>

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
		<button onclick="window.location.href='{{ $facebook }}'" class="btn round blue icon facebook shadow">Send message</button>
		<button onclick="window.location.href='{{ $email }}'" class="btn round green icon mail right shadow">Send mail</button>
	</div>

	<input type="hidden" name="lat" value="{{ $lat }}">
	<input type="hidden" name="long" value="{{ $long }}">

</div>
<br><br>


