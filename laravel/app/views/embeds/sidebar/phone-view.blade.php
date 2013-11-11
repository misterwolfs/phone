<h4>{{ $model }}</h4>

<div id="phone-view">
<!-- 	<div class="image-holder">
		<img src="http://placehold.it/110x110">
		<img src="http://placehold.it/110x110">
		<img src="http://placehold.it/110x110">
	</div> -->

	<div class="wrapper-phone">
		<div class="category">The seller</div>
		<table class="two-column">
			<tr>
				<td>Name:</td>
				<td>{{ $firstname . ' ' . $lastname }}</td>
			</tr>
			<tr>
				<td>Place:</td>
				<td><a href="#" id="zoom-phone" class="underline">zoom in</a></td>
			</tr>
		</table>
	</div>

	<div class="wrapper-phone">
		<div class="category spacer">The phone</div>
		<table class="two-column">
			<tr>
				<td>Brand:</td>
				<td>{{ $brand }}</td>
			</tr>
			<tr>
				<td>Price:</td>
				<td>€{{ $price }}</td>
			</tr>
			<tr>
				<td>Year:</td>
				<td>{{ $year }}</td>
			</tr>
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
		@if($description == '')
		<p>No description given.</p>
		@else
		<p>{{ $description }}</p>
		@endif
	</div>

	<div class="wrapper-button">
		<button id="{{ $facebook }}" class="btn round blue icon facebook shadow new-window new-window">Send message</button>
		@if($email)
		<button id="mailto:{{ $email }}" class="btn round green icon mail right shadow new-window">Send mail</button>
		@endif
	</div>

	<input type="hidden" name="lat" value="{{ $lat }}">
	<input type="hidden" name="long" value="{{ $long }}">

</div>
<br><br>


