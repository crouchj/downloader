<?php
// $artists_list = array();
// foreach (Artist::orderBy('name')->get()->toArray() as $artist) {
// 	$artists_list[$artist['id']] = $artist['name'];
// }
?>

<section class="module-create module">
    <div class="module-header">
    	<h2>
    		New <span class="type">Artist</span>
    		<a class="list" href="{{ URL::route('artist.index') }}">
    			<span class="icon-list-circle icon" aria-hidden="true"></span>
    			<span class="text">List Artists</span>
    		</a>
    	</h2>
    </div>
    <div class="module-content group">
        <div class="crud-container">
                {{ Form::open(array('route' => 'artist.store', 'id' => 'artist-store', 'class' => 'artist-create create crud', 'data-ajax' => URL::route('ajax.artists.store'))) }}
                    @include('dashboard.artist.form.artist_form')
                {{ Form::close() }}
        </div>
    </div>
</section>
