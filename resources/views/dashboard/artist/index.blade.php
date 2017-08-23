@extends('layouts.dashboard') @section('content')

<main class="dashboard-artists">

  @if(Session::has('message'))
  <div class="messages">
    <span>{{ session('message') }}</span>
  </div>
  @endif

  <section class="module-index module">
    <div class="module-header">
      <h2>
        <span>Artists</span>
        <a class="add-new modal">
          <span class="icon-add-circle icon" aria-hidden="true"></span>
          <span class="text">Add New</span>
        </a>
      </h2>
    </div>

    <div class="module-content group">
      @if ($artists->isEmpty())
      <h2 class="no-results">No Artists. <a href="{{ route('artist.create') }}">Add one!</a></h2> @else
      <article class="artists accordion ">
        @foreach ($artists as $index => $artist)

        <header data-header-id="{{ $index }}" data-artist-id="{{ $artist->id }}">
          <span class="artist">{{ $artist->name }}</span> {{ Form::open(array('route' => 'artist.destroy', 'method' => 'delete', 'class' => 'artist-delete delete crud', 'data-ajax' => link_to_route('ajax.artists.destroy'))) }} {{ Form::hidden('id', $artist->id)
          }} {{ Form::button('<span class="icon icon-trash" aria-hidden="true"></span><span class="txt">Delete</span>', array('class' => 'delete-button button')) }} {{ Form::close() }}
        </header>
        <section class="accordion-content" data-artist-id="{{ $artist->id }}">
          <div class="crud-container col" data-id="{{ $index }}">
            {{ Form::open(array('route' => 'artist.update', 'method' => 'put', 'id' => 'artist-update', 'class' => 'artist-update update crud', 'data-ajax' => link_to_route('ajax.artists.update'))) }} {{ Form::hidden('id', $artist->id) }}
            <div class="fields">
              @if(Session::has('message'))
              <div class="messages">
                <span>{{ session('message') }}</span>
              </div>
              @endif
              <div class="form-group">
                {{ Form::text('artist-name', $artist->name, array('class' => 'artist-name', 'placeholder' => 'Artist Name')) }}
              </div>
              <div class="form-group">
                <?php
                  // All releases
                  $releases_list = array();
                  foreach (Release::orderBy('title')->get()->toArray() as $release) {
                      $releases_list[$release['id']] = $release['title'];
                  }

                  // Releases linked to artist
                  $selected_releases = array();
                  $r_artist = $artist->releases->toArray();
                  foreach ($r_artist as $i => $r) {
                      array_push($selected_releases, $r['id']);
                  }
                ?>
                  <div class="multiselect-container">
                    {{ Form::select('release', $releases_list, $selected_releases, array('class' => 'releases-list chosen-select', 'multiple', 'data-placeholder' => 'Releases')) }}
                  </div>
              </div>
            </div>
            <div class="save-cancel form-group">
              {{ Form::button('<span class="icon icon-check" aria-hidden="true"></span>', array('class' => 'save-button submit-button button')) }} {{ Form::button('<span class="icon icon-x" aria-hidden="true"></span>', array('class' => 'cancel-button
              button')) }}
            </div>
            {{ Form::close() }}
          </div>
          <div class="statistics col">
            Statistics
          </div>
        </section>
        @endforeach @endif
      </article>
    </div>
  </section>

</main>

<div class="overlay"></div>
<div id="tmpl-create-new">
  @include('dashboard.artist.form.create')
</div>
@endsection
