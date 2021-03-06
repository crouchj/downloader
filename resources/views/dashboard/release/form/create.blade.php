<section class="module-create module">
	<div class="module-header">
        <h2>
    		New <span class="type">Release</span>
    		<a class="list" href="{{ route('release.index') }}">
    			<i class="icon icon-list-circle" aria-hidden="true"></i>
    			<span class="text">List Releases</span>
    		</a>
    	</h2>
    </div>
	<div class="module-content group">
		<div class="crud-container">
		        {{ Form::open(array('route' => 'release.store', 'id' => 'release-store', 'class' => 'release-create create crud')) }}
					@include('dashboard.release.form.form')
		        {{ Form::close() }}
		</div>
	</div>
</section>
