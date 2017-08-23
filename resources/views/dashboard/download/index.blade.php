@extends('admin')

@section('content')
<main class="dashboard-downloads">

	<nav><a href="{{ URL::route('download.create') }}" class="add-new"><span class="icon-downloads icon" aria-hidden="true" data-icon="&#8862;"></span>Add New</a></nav>

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
@stop
