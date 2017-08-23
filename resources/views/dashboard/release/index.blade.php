@extends('admin')

@section('content')

<main class="dashboard-releases">

    @if (Session::has('message'))
        <div class="messages">
            <span>{{ session('message') }}</span>
        </div>
    @endif

	<section class="module-index module">
		<div class="module-header">
			<h2>
				Releases
				<a class="add-new modal">
					<span class="icon-add-circle icon" aria-hidden="true"></span>
					<span class="text">Add New</span>
				</a>
			</h2>
		</div>

		<div class="module-content group">
		@if ($releases->isEmpty())
			<h2 class="no-results">No Releases. <a href="{{ URL::route('release.create') }}">Add one!</a></h2>
		@else
			<article class="releases accordion">

			@foreach ($releases as $index => $release)

					<header data-header-id="{{ $index }}" data-release-id="{{ $release->id }}">
						<span class="artist">{{ $release->artist->name }}</span>
						<span class="title">{{ $release->title }}</span>
						{{ Form::open(array('route' => 'release.destroy', 'method' => 'delete', 'class' => 'release-delete delete crud', 'data-ajax' => URL::route('release.destroy'))) }}
							{{ Form::hidden('id', $release->id) }}
			                {{ Form::button('<span class="icon icon-trash" aria-hidden="true"></span><span class="txt">Delete</span>', array('class' => 'delete-button button')) }}
						{{ Form::close() }}
					</header>
					<section class="accordion-content" data-release-id="{{ $release->id }}">
						<div class="crud-container col" data-id="{{ $index }}">
				        {{ Form::open(array('route' => 'release.update', 'method' => 'put', 'id' => 'release-update', 'class' => 'release-update update crud', 'data-ajax' => URL::route('release.update'))) }}
						<div class="fields">
							{{ Form::hidden('id', $release->id) }}
				            @if(Session::has('message'))
				                <div class="messages">
				                    <span>{{ session('message') }}</span>
				                </div>
				            @endif
				            <div class="form-group">
				                {{ Form::file('album_cover') }}
				            </div>
				            <div class="form-group">
	                            <?php
	                                $artists_list = array();
	                                foreach (Artist::orderBy('name')->get()->toArray() as $artist) {
	                                	$artists_list[$artist['id']] = $artist['name'];
	                                }
	                            ?>
				                {{ Form::select('artist', $artists_list, $release->artist->id) }}
				            </div>
				            <div class="form-group">
				                {{ Form::text('title', $release->title, array('class' => 'release-title', 'placeholder' => 'Title')) }}
				            </div>
				            <div class="form-group">
				                {{ Form::text('release-number', $release->release_number, array('class' => 'release-number', 'placeholder' => 'Release Number')) }}
				            </div>
				            <div class="form-group">
				                {{ Form::text('release-date', date_create($release->release_date)->format('m/d/Y'), array('class' => 'release-date date', 'placeholder' => 'Release Date')) }}
				            </div>
						</div>
			            <div class="save-cancel form-group">
			                {{ Form::button('<span class="icon icon-check" aria-hidden="true"></span>', array('class' => 'save-button submit-button button')) }}
							{{ Form::button('<span class="icon icon-x" aria-hidden="true"></span>', array('class' => 'cancel-button button')) }}
			            </div>
				        {{ Form::close() }}
						</div>
						<div class="statistics col">
							Statistics
						</div>
					</section>
			@endforeach
		@endif
			</article>
		</div>
	</section>

</main>

<div class="overlay"></div>
<div id="tmpl-create-new">
	@include('dashboard.release.form.create')
</div>
@stop
