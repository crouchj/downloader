@extends('admin')

@section('content')
<main class="dashboard-cards">

	<nav><a href="{{ URL::route('card.create') }}" class="add-new"><span class="icon-downloads icon" aria-hidden="true" data-icon="&#8862;"></span>Add New</a></nav>

	<section class="cards module">
		<h2>Cards</h2>
		<div class="module-content">
		@foreach ($cards as $card)
			<article class="card">
				<h3 class="title">{{ $card->title }}</h3>
			</article>
		@endforeach
		</div>
	</section>

</main>
@stop
