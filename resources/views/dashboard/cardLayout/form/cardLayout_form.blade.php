<div class="fields">
    @if(Session::has('message'))
        <div class="messages">
            <span>{{ session('message') }}</span>
        </div>
    @endif
	<div class="form-group">

	</div>
    <!-- <div class="form-group">
		<div id="wysihtml5-toolbar" style="display: none;">
			<a data-wysihtml5-command="bold">bold</a>
			<a data-wysihtml5-command="italic">italic</a>
			<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">red</a>
			<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">green</a>
			<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">blue</a>
			<a data-wysihtml5-command="createLink">insert link</a>
			<div data-wysihtml5-dialog="createLink" style="display: none;">
				<label>
					Link:
					<input data-wysihtml5-dialog-field="href" value="http://" class="text">
				</label>
				<a data-wysihtml5-dialog-action="save">OK</a> <a data-wysihtml5-dialog-action="cancel">Cancel</a>
			</div>
		</div>
        <?php /** {{ Form::textarea('cardLayout-markup', '', array('id' => 'cardLayout-markup')) }} **/ ?>
    </div> -->
</div>
<div class="save-cancel form-group">
    {{ Form::button('<span class="icon icon-check" aria-hidden="true"></span>', array('class' => 'save-button submit-button button')) }}
	{{ Form::button('<span class="icon icon-x" aria-hidden="true"></span>', array('class' => 'cancel-button button')) }}
</div>

