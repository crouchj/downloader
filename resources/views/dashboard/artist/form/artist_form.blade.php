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
    {{ Form::button('<i class="icon icon-check" aria-hidden="true"></i>', ['class' => 'save-button submit-button button']) }}
	{{ Form::button('<i class="icon icon-x" aria-hidden="true"></i>', ['class' => 'cancel-button button']) }}
</div>
