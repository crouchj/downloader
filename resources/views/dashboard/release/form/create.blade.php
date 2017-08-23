<?php
$artists_list = array();
foreach (Artist::orderBy('name')->get()->toArray() as $artist) {
	$artists_list[$artist['id']] = $artist['name'];
}
?>

<section class="module-create module">
	<div class="module-header">
        <h2>
    		New <span class="type">Release</span>
    		<a class="list" href="{{ URL::route('release.index') }}">
    			<span class="icon icon-list-circle" aria-hidden="true"></span>
    			<span class="text">List Releases</span>
    		</a>
    	</h2>
    </div>
	<div class="module-content group">
		<div class="crud-container">
		        {{ Form::open(array('route' => 'release.store', 'id' => 'release-store', 'class' => 'release-create create crud')) }}
					@include('dashboard.release.form.dl_form')
		        {{ Form::close() }}
		</div>
	</div>
</section>
