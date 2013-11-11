<h4>Filter by brand</h4>

@if(count($firstLetters) > 0)
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
@else
<p>Er werden jammer genoeg nog geen smartphones verkocht via onze applicatie.</p>
@endif
<br><br>