<header class="hd">
	<nav class="main-nav group">
		<ul>
			<li class="top" data-title="Home">
				<span class="icon-home icon" aria-hidden="true"></span>
				<ul class="sub">
					<li><span class="icon icon-tools"></span><a class="sub-title home-admin" href="{{ URL::route('dashboard') }}">Admin Home</a></li>
					<li><span class="icon icon-download"></span><a class="sub-title home-downloader" href="{{ URL::route('downloaderForm') }}">Downloader Home</a></li>
				</ul>
			</li>
			<li class="top" data-title="Music">
				<a href="{{ URL::route('release.index') }}"><span class="icon-music icon" aria-hidden="true"></span></a>
				<ul class="sub">
					<li>
						<a class="sub-title releases" href="{{ URL::route('release.index') }}">Releases</a>
						<ul class="side">
							<li><a href="{{ URL::route('release.create') }}" title="New Release"><span class="icon icon-add-circle" aria-hidden="true"></span></a></li>
							<li><a href="{{ URL::route('release.index') }}" title="List Releases"><span class="icon icon-list-circle" aria-hidden="true"></span></a></li>
						</ul>
					</li>
					<li>
						<a class="sub-title artists" href="{{ URL::route('artist.index') }}">Artists</a>
						<ul class="side">
							<li><a href="{{ URL::route('artist.create') }}" title="New Artist"><span class="icon icon-add-circle" aria-hidden="true"></span></a></li>
							<li><a href="{{ URL::route('artist.index') }}" title="List Artists"><span class="icon icon-list-circle" aria-hidden="true"></span></a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="top" data-title="Cards">
				<span class="icon-cards icon" aria-hidden="true"></span>
				<ul class="sub">
					<li><span class="icon icon-dl-card"></span><a class="sub-title cards" href="{{ URL::route('card.index') }}">Download Cards</a></li>
					<li><span class="icon icon-templates"></span><a class="sub-title templates" href="{{ URL::route('cardLayout.index') }}">Templates</a></li>
				</ul>
			</li>
			<li class="top" data-title="Statistics">
				<a href="/"><span class="icon icon-chart-line" aria-hidden="true"></span></a>
			</li>
			<li class="top" data-title="Config">
				<a href="{{ URL::route('config.index') }}"><span class="icon icon-config" aria-hidden="true"></span></a>
			</li>
		</ul>
	</nav>
	<nav class="user-nav">
		<ul>
			<li data-title="Profile"><a href="/"><span class="icon-person icon" aria-hidden="true"></span></a></li>
			<li data-title="Logout"><a href="/logout"><span class="icon icon-power" aria-hidden="true"></span></a></li>
		</ul>
	</nav>
</header>
