<div class="fields">
    <div class="form-group">
        {{ Form::text('artist-name', '', ['class' => 'artist-name', 'placeholder' => 'Artist Name']) }}
    </div>
    <div class="form-group">
		<div class="multiselect-container">
			{{ Form::select('release', $allReleases, '', ['class' => 'releases-list chosen-select', 'multiple', 'data-placeholder' => 'Releases']) }}
		</div>
    </div>
</div>
<div class="save-cancel form-group">
    {{ Form::button('<span class="icon icon-check" aria-hidden="true"></span>', ['class' => 'save-button submit-button button']) }}
	{{ Form::button('<span class="icon icon-x" aria-hidden="true"></span>', ['class' => 'cancel-button button']) }}
</div>
