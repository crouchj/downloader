<div class="messages"><span></span></div>
<div class="fields group">
    <div class="col-left">
        <div class="form-group album-cover">
            {{ Form::file('album_cover') }}
    		<div class="image-preview">
    		    <div class="overlay"></div>
    		</div>
            <span class="icon icon-image" aria-hidden="true"></span>
        </div>
        <div class="form-group zipfile">
            {{ Form::file('zipfile') }}
            <span class="icon-archive"></span>
            <span class="filename"></span>
        </div>
    </div>
    <div class="col-right">
        <div class="form-group combobox-container group">
            {{ Form::select('artist', $allArtists, null, ['class' => 'combobox']) }}
        </div>
        <div class="form-group">
            {{ Form::text('title', '', ['class' => 'release-title', 'placeholder' => 'Title']) }}
        </div>
        <div class="form-group">
            {{ Form::text('release-number', '', ['class' => 'release-number', 'placeholder' => 'Release Number']) }}
        </div>
        <div class="form-group">
            {{ Form::text('release-date', '', ['class' => 'release-date date', 'placeholder' => 'Release Date']) }}
        </div>
        <div class="download-code-fields">
            <div class="toggle-container">
        		{{ Form::checkbox('generate-dl-codes', 'yeah', true, ['id' => 'g-dl-codes-toggle']) }}
                <div class="checkbox"><span class="icon icon-check"></span></div>
                {{ Form::label('g-dl-codes-toggle', 'Generate Download Codes') }}
            </div>
            {{ Form::text('download-group-title', '', ['class' => 'download-group-title', 'placeholder' => 'Title of code set']) }}
            {{ Form::text('num-codes', '', ['class' => 'num-codes', 'placeholder' => 'Number of codes']) }}
            {{ Form::text('num-chars', '', ['class' => 'num-chars', 'placeholder' => 'Number of characters per code']) }}
        </div>
    </div>
</div>
<div class="save-cancel form-group">
    {{ Form::button('<span class="icon icon-check" aria-hidden="true"></span>', ['class' => 'save-button submit-button button', 'type' => 'submit']) }}
	{{ Form::button('<span class="icon icon-x" aria-hidden="true"></span>', ['class' => 'cancel-button button']) }}
</div>
