@extends('layouts.dashboard')

@section('content')
<main class="dashboard-releases">
    <section class="module-index module">
		<div class="module-header">
			<h2>
				<span>Releases</span>
				<a class="add-new modal">
					<i class="icon-plus-circle icon" aria-hidden="true"></i>
					<span class="text">Add New</span>
				</a>
			</h2>
		</div>

		<div class="module-content group">
    		@if ($releases->isEmpty())
    			<h2 class="no-results">No Releases. <a href="{{ route('release.create') }}">Add one!</a></h2>
    		@else
    			<article class="releases accordion">
        			@foreach ($releases as $index => $release)
    					<header data-header-id="{{ $index }}" data-release-id="{{ $release->id }}">
    						<span class="artist">{{ $release->artist->name }}</span>
    						<span class="title">{{ $release->title }}</span>
    						{{ Form::open(['route' => ['release.destroy', $release->id], 'method' => 'delete', 'class' => 'release-delete delete crud']) }}
    							{{ Form::hidden('id', $release->id) }}
    			                {{ Form::button('<i class="icon icon-trash" aria-hidden="true"></i><span class="txt">Delete</span>', ['class' => 'delete-button button']) }}
    						{{ Form::close() }}
    					</header>
    					<section class="accordion-content" data-release-id="{{ $release->id }}">
    						<div class="crud-container col" data-id="{{ $index }}">
        				        {{ Form::open(['route' => ['release.update', $release->id], 'method' => 'put', 'id' => 'release-update', 'class' => 'release-update update crud']) }}
            						<div class="fields">
            							{{ Form::hidden('id', $release->id) }}
            				            <div class="form-group">
            				                {{ Form::file('album_cover') }}
            				            </div>
            				            <div class="form-group">
            				                {{ Form::select('artist', $allArtists, $release->artist->id) }}
            				            </div>
            				            <div class="form-group">
            				                {{ Form::text('title', $release->title, ['class' => 'release-title', 'placeholder' => 'Title']) }}
            				            </div>
            				            <div class="form-group">
            				                {{ Form::text('release-number', $release->release_number, ['class' => 'release-number', 'placeholder' => 'Release Number']) }}
            				            </div>
            				            <div class="form-group">
            				                {{ Form::text('release-date', date_create($release->release_date)->format('m/d/Y'), ['class' => 'release-date date', 'placeholder' => 'Release Date']) }}
            				            </div>
            						</div>
            			            <div class="save-cancel form-group">
            			                {{ Form::button('<i class="icon icon-check" aria-hidden="true"></i>', ['class' => 'save-button submit-button button']) }}
            							{{ Form::button('<i class="icon icon-x" aria-hidden="true"></i>', ['class' => 'cancel-button button']) }}
            			            </div>
        				        {{ Form::close() }}
    						</div>
    						<div class="statistics col">Statistics</div>
    					</section>
        			@endforeach
                </article>
    		@endif
		</div>
	</section>

</main>

<div class="overlay"></div>
<div id="tmpl-create-new">
	@include('dashboard.release.form.create')
</div>
@endsection
