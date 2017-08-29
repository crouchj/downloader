@extends('layouts.dashboard')

@section('content')
<main class="dashboard-downloads">

	<nav><a href="{{ route('download.create') }}" class="add-new"><i class="icon-downloads icon" aria-hidden="true" data-icon="&#8862;"></i>Add New</a></nav>

	<section class="downloads module">
		<h2>Downloads</h2>
		<div class="module-content">
		@foreach ($downloads as $download)
			<article class="download">
				<h3 class="title">{{ $download->title }}</h3>
			</article>
		@endforeach
		</div>
	</section>

</main>
@endsection
