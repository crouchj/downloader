@extends('layouts.dashboard')

@section('content')

<main class="dashboard-cardLayouts">

    @if(Session::has('message'))
        <div class="messages">
            <span>{{ session('message') }}</span>
        </div>
    @endif

	<section class="module-index module">
		<div class="module-header">
			<h2>
				DL Card Templates
				<a href="{{ route('cardLayout.create') }}" class="add-new">
					<span class="icon-add-new icon" aria-hidden="true" data-icon="&#8862;"></span>
					<span class="text">Add New</span>
				</a>
			</h2>
		</div>

		<div class="module-content group">
			<article class="cardLayouts accordion">
		@foreach ($cardLayouts as $index => $layout)

				<header data-header-id="{{ $index }}" data-layout-id="{{ $layout->id }}">
					<span class="title">{{ $layout->title }}</span>
					<a href="{{ URL::route('cardLayout.edit', array($layout->id)) }}" class="edit-link">
						<span class="icon" aria-hidden="true" data-icon="&#9998;"></span>
					</a>
					{{ Form::open(array('route' => 'cardLayout.destroy', 'method' => 'delete', 'class' => 'layout-delete delete crud', 'data-ajax' => link_to_route('ajax.cardLayouts.destroy'))) }}
						{{ Form::hidden('id', $layout->id) }}
		                {{ Form::button('<span class="icon" aria-hidden="true" data-icon="&#59177;"></span><span class="txt">Delete</span>', array('class' => 'delete-button button')) }}
					{{ Form::close() }}
				</header>
				<section class="accordion-content" data-layout-id="{{ $layout->id }}">
					<div class="layout-info col">
						Layout info
					</div>
					<div class="statistics col">
						Statistics
					</div>
				</section>
		@endforeach
			</article>
		</div>
	</section>

</main>

<div class="overlay"></div>
<div id="tmpl-create-new">
	@include('dashboard.cardLayout.form.create')
</div>
@endsection
