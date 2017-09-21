@extends('layouts.dashboard')

@section('content')
<main class="dashboard-artists">
    <section class="module-index module">
        <div class="module-header">
            <h2>
                <span>Artists</span>
                <a href="{{ route('artist.create') }}" class="add-new modal">
                    <i class="icon-plus-circle-inverse icon" aria-hidden="true"></i>
                    <span class="text">Add New</span>
                </a>
            </h2>
        </div>

        <div class="module-content group">
            @if ($artists->isEmpty())
                <h2 class="no-results">No Artists. <a href="{{ route('artist.create') }}">Add one!</a></h2>
            @else
                <article class="artists accordion ">
                    @foreach ($artists as $index => $artist)
                        <header data-header-id="{{ $index }}" data-artist-id="{{ $artist->id }}">
                            <span class="artist">{{ $artist->name }}</span>
                            {{ Form::open(['route' => ['artist.destroy', $artist->id], 'method' => 'delete', 'class' => 'artist-delete delete crud']) }}
                                {{ Form::hidden('id', $artist->id) }}
                                {{ Form::button('<i class="icon icon-trash" aria-hidden="true"></i>', ['class' => 'delete-button button']) }}
                            {{ Form::close() }}
                        </header>
                        <section class="accordion-content" data-artist-id="{{ $artist->id }}">
                            <div class="crud-container col" data-id="{{ $index }}">
                                {{ Form::open(['route' => ['artist.update', $artist->id], 'method' => 'put', 'id' => 'artist-update', 'class' => 'artist-update update crud']) }}
                                    {{ Form::hidden('id', $artist->id) }}
                                    <div class="fields">
                                        <div class="form-group">
                                            {{ Form::text('artist-name', $artist->name, ['class' => 'artist-name', 'placeholder' => 'Artist Name']) }}
                                        </div>
                                        <div class="form-group">
                                            <div class="multiselect-container">
                                                {{ Form::select('release', $allReleases, $artist->releases->keys()->all(), ['class' => 'releases-list chosen-select', 'multiple', 'data-placeholder' => 'Releases']) }}
                                            </div>
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
@endsection
