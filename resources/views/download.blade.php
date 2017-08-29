@extends('layouts.download')

@section('content')
<div class="bd-downloader">
    <div class="wr">
        <div class="downloader module">
            <div class="txt-container group">
                <div class="download-info">
                    <h1 class="artist">Solar Halos</h1>
                    <h3 class="title">In Which We Sample Africa</h3>
                </div>
                <div class="instructions">
                    <p>Enter the code in the form below to redeem your download.</p>
                    <p class="contact">Trouble?<br/> <span class="email"><a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></span></p>
                </div>
            </div>
            <div class="form-container">
                {{ Form::open(array('route' => 'processDownloadCode', 'id' => 'dlcode')) }}
                    @if(Session::has('message'))
                        <div class="messages">
                            <span>{{ session('message') }}</span>
                        </div>
                    @endif
                    <div class="code form-group">
                        {{ Form::text('downloadId', '', array('class' => 'download-code', 'placeholder' => 'Download Code')) }}
                    </div>
                    <div class="download-btn submit-btn form-group">
                        {{ Form::button('<i class="icon icon-download" aria-hidden="true"></i>', array('class' => 'button')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
