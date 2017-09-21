<div class="messages"><span></span></div>
<div class="fields group">
    <div class="col-left">
        <div class="form-group album-cover">
            {{ Form::file('album_cover', ['class' => 'image-upload']) }}
    		<div class="image-preview">
    		    <div class="overlay"></div>
    		</div>
            <i class="icon icon-image" aria-hidden="true"></i>
        </div>
        <div class="form-group zipfile">
            {{ Form::file('zipfile') }}
            <i class="icon-archive icon"></i>
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
                <div class="checkbox"><i class="icon icon-check"></i></div>
                {{ Form::label('g-dl-codes-toggle', 'Generate Download Codes') }}
            </div>
            {{ Form::text('download-group-title', '', ['class' => 'download-group-title', 'placeholder' => 'Title of code set']) }}
            {{ Form::text('num-codes', '', ['class' => 'num-codes', 'placeholder' => 'Number of codes']) }}
            {{ Form::text('num-chars', '', ['class' => 'num-chars', 'placeholder' => 'Number of characters per code']) }}
        </div>
    </div>
</div>
<div class="save-cancel form-group">
    {{ Form::button('<i class="icon icon-check" aria-hidden="true"></i>', ['class' => 'save-button submit-button button', 'type' => 'submit']) }}
	{{ Form::button('<i class="icon icon-x" aria-hidden="true"></i>', ['class' => 'cancel-button button']) }}
</div>
