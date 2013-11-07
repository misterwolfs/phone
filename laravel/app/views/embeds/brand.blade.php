<h4>Filter by brand</h4>

@foreach ($firstLetters as $letter)
   		<div class="category">{{ $letter }}</div>
   		<ul class="brands">
			@foreach ($brands as $brand)
		   		@if($letter == $brand[0])
		   			<li id="{{ $brand }}">{{ $brand }}</li>
		   		@endif
			@endforeach
		</ul>
@endforeach