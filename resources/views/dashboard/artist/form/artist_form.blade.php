<div class="fields">
    @if(Session::has('message'))
        <div class="messages">
            <span>{{ session('message') }}</span>
        </div>
    @endif
    <div class="form-group">
        {{ Form::text('artist-name', '', array('class' => 'artist-name', 'placeholder' => 'Artist Name')) }}
    </div>
    <div class="form-group">
        <?php
            $releases_list = array();
            foreach (Release::orderBy('title')->get()->toArray() as $release) {
            	$releases_list[$release['id']] = $release['title'];
            }
        ?>
		<div class="multiselect-container">
			{{ Form::select('release', $releases_list, '', array('class' => 'releases-list chosen-select', 'multiple', 'data-placeholder' => 'Releases')) }}
		</div>
    </div>
</div>
<div class="save-cancel form-group">
    {{ Form::button('<span class="icon icon-check" aria-hidden="true"></span>', array('class' => 'save-button submit-button button')) }}
	{{ Form::button('<span class="icon icon-x" aria-hidden="true"></span>', array('class' => 'cancel-button button')) }}
</div>