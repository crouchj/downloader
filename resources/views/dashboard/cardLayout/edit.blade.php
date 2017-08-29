@extends('layouts.dashboard')

@section('content')

<main class="dashboard-cardLayouts">

    @if(Session::has('message'))
        <div class="messages">
            <span>{{ session('message') }}</span>
        </div>
    @endif

	<section class="module-update module">
		<div class="module-header">
			<h2>
				DL Card Templates
				<a class="add-new">
					<i class="icon-add-new icon" aria-hidden="true" data-icon="&#8862;"></i>
					<span class="text">Add New</span>
				</a>
			</h2>
		</div>

		<div class="module-content crud-container group">
	        {{ Form::open(array('route' => 'cardLayout.update', 'method' => 'put', 'id' => 'layout-update', 'class' => 'layout-update update crud', 'data-ajax' => link_to_route('ajax.cardLayouts.update'))) }}
			<div class="fields">
				{{ Form::hidden('id', $layout->id) }}
	            @if(Session::has('message'))
	                <div class="messages">
	                    <span>{{ session('message') }}</span>
	                </div>
	            @endif
	            <div class="form-group">
                    <?php
                        $artists_list = array();
                        foreach (Artist::orderBy('name')->get()->toArray() as $artist) {
                        	$artists_list[$artist['id']] = $artist['name'];
                        }
                    ?>
	                {{ Form::select('artist', $artists_list, $layout->artist->id) }}
	            </div>
	            <div class="form-group">
	                {{ Form::text('title', $layout->title, array('class' => 'layout-title', 'placeholder' => 'Title')) }}
	            </div>
	            <div class="form-group">
	                {{ Form::text('layout-number', $layout->layout_number, array('class' => 'layout-number', 'placeholder' => 'layout Number')) }}
	            </div>
	            <div class="form-group">
	                {{ Form::text('layout-date', date_create($layout->layout_date)->format('m/d/Y'), array('class' => 'layout-date date', 'placeholder' => 'layout Date')) }}
	            </div>
			</div>
            <div class="save-cancel form-group">
                {{ Form::button('<i class="icon icon-check" aria-hidden="true"></i>', array('class' => 'save-button submit-button button')) }}
				{{ Form::button('<i class="icon icon-x" aria-hidden="true"></i>', array('class' => 'cancel-button button')) }}
            </div>
	        {{ Form::close() }}
		</div>
	</section>

</main>

@endsection
