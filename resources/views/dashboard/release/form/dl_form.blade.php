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
            {{ Form::select('artist', $artists_list, null, array('class' => 'combobox')) }}
        </div>
        <div class="form-group">
            {{ Form::text('title', '', array('class' => 'release-title', 'placeholder' => 'Title')) }}
        </div>
        <div class="form-group">
            {{ Form::text('release-number', '', array('class' => 'release-number', 'placeholder' => 'Release Number')) }}
        </div>
        <div class="form-group">
            {{ Form::text('release-date', '', array('class' => 'release-date date', 'placeholder' => 'Release Date')) }}
        </div>
        <div class="download-code-fields">
            <div class="toggle-container">
        		{{ Form::checkbox('generate-dl-codes', 'yeah', true, array('id' => 'g-dl-codes-toggle')) }}
                <div class="checkbox"><span class="icon icon-check"></span></div>
                {{ Form::label('g-dl-codes-toggle', 'Generate Download Codes') }}
            </div>
            {{ Form::text('download-group-title', '', array('class' => 'download-group-title', 'placeholder' => 'Title of code set')) }}
            {{ Form::text('num-codes', '', array('class' => 'num-codes', 'placeholder' => 'Number of codes')) }}
            {{ Form::text('num-chars', '', array('class' => 'num-chars', 'placeholder' => 'Number of characters per code')) }}
        </div>
    </div>
</div>
<div class="save-cancel form-group">
    {{ Form::button('<span class="icon icon-check" aria-hidden="true"></span>', array('class' => 'save-button submit-button button')) }}
	{{ Form::button('<span class="icon icon-x" aria-hidden="true"></span>', array('class' => 'cancel-button button')) }}
</div>