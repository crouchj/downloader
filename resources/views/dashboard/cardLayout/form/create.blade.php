<section class="module-create module">
	<h2>New <span class="type">Card Layout</span></h2>
	<div class="module-content group">
		<div class="crud-container">
		        {{ Form::open(array('route' => 'cardLayout.store', 'id' => 'cardLayout-store', 'class' => 'cardLayout-create create crud', 'data-ajax' => URL::route('ajax.cardLayouts.store'))) }}
					@include('dashboard.cardLayout.form.cardLayout_form')
		        {{ Form::close() }}
		</div>
	</div>
</section>
