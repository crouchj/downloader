<section class="module-create module">
    <div class="module-header">
    	<h2>
    		New <span class="type">Artist</span>
    		<a class="list" href="{{ route('artist.index') }}">
    			<i class="icon-list-circle icon" aria-hidden="true"></i>
    			<span class="text">List Artists</span>
    		</a>
    	</h2>
    </div>
    <div class="module-content group">
        <div class="crud-container">
                {{ Form::open(['route' => 'artist.store', 'id' => 'artist-store', 'class' => 'artist-create create crud']) }}
                    @include('dashboard.artist.form.artist_form')
                {{ Form::close() }}
        </div>
    </div>
</section>
