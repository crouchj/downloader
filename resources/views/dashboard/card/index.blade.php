@extends('layouts.dashboard')

@section('content')
<main class="dashboard-cards">

	<nav><a href="{{ route('card.create') }}" class="add-new"><i class="icon-downloads icon" aria-hidden="true" data-icon="&#8862;"></i>Add New</a></nav>

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
@endsection
