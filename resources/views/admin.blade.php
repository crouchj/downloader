<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Downloader | Admin</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
	<meta name="_token" content="{{ csrf_token() }}"/>
</head>
<body class="admin">
	@include('dashboard.shared.header')

	<div class="bd-admin">
		@yield('content')
	</div>

	<?php if(!Auth::check()) : ?>
		<div class="unauthenticated"></div>
	<?php endif; ?>

	<script type="text/javascript">
		DL_CNFG = {
			cur_loc: document.URL
		};
	</script>
	<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
