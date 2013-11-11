@if($phone != 'no-phone')
@foreach($phones as $phone)
	<div class="phone{{$phone['phoneID'] }}">
	<h4>{{ $phone['model'] }}</h4>
	
	<div id="phone-view">
	<div class="wrapper-phone">
		<div class="category">The phone</div>
		<table class="two-column-float">
			<tr>
				<td>Brand:</td>
				<td>{{ $phone['brand'] }}</td>
			</tr>
			<tr>
				<td>Price:</td>
				<td>{{ $phone['price'] }}</td>
			</tr>
			<tr>
				<td>Year:</td>
				<td>{{ $phone['year'] }}</td>
			</tr>

		</table>
		<table class="two-column-float right">
			<tr>
				<td>Usage:</td>
				<td>{{ $phone['usage'] }}</td>
			</tr>
			<tr>
				<td>State:</td>
				<td>{{ $phone['state'] }}</td>
			</tr>
			<tr>
				<td>Color:</td>
				<td>{{ $phone['color'] }}</td>
			</tr>
		</table>
	</div>

	<div class="wrapper-phone">
		<div class="category spacer">Description</div>
		<p>{{ $phone['description'] }}</p>
	</div>

	<div class="wrapper-button">
		<button id="sold{{$phone['phoneID'] }}" class="btn round red sold no-icon shadow">Sold</button>
	</div>

	<input type="hidden" name="lat" value="{{ $phone['lat'] }}">
	<input type="hidden" name="long" value="{{ $phone['long'] }}">

</div>

</div>
<br /> <br />
@endforeach
@else
<p>You haven't added any smartphone.</p>
@endif
