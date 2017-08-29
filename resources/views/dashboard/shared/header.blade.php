<header class="hd">
    <nav class="main-nav group">
        <ul>
            <li class="top" data-title="Home">
                <i class="icon-home icon" aria-hidden="true"></i>
                <ul class="sub">
                    <li><i class="icon icon-wrench"></i><a class="sub-title home-admin" href="{{ route('dashboard') }}">Admin Home</a></li>
                    <li><i class="icon icon-download"></i><a class="sub-title home-downloader" href="{{ route('downloaderForm') }}">Downloader Home</a></li>
                </ul>
            </li>
            <li class="top" data-title="Music">
                <a href="{{ route('release.index') }}"><i class="icon-music-note icon" aria-hidden="true"></i></a>
                <ul class="sub">
                    <li>
                        <i class="icon icon-lp"></i>
                        <a class="sub-title releases" href="{{ route('release.index') }}">Releases</a>
                        <ul class="side">
                            <li><a href="{{ route('release.create') }}" title="New Release"><i class="icon icon-plus-circle" aria-hidden="true"></i></a></li>
                            <li><a href="{{ route('release.index') }}" title="List Releases"><i class="icon icon-list-circle" aria-hidden="true"></i></a></li>
                        </ul>
                    </li>
                    <li>
                        <i class="icon icon-artists"></i>
                        <a class="sub-title artists" href="{{ route('artist.index') }}">Artists</a>
                        <ul class="side">
                            <li><a href="{{ route('artist.create') }}" title="New Artist"><i class="icon icon-plus-circle" aria-hidden="true"></i></a></li>
                            <li><a href="{{ route('artist.index') }}" title="List Artists"><i class="icon icon-list-circle" aria-hidden="true"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="top" data-title="Cards">
                <i class="icon-note-file icon" aria-hidden="true"></i>
                <ul class="sub">
                    <li><i class="icon icon-newspaper"></i><a class="sub-title cards" href="{{ route('card.index') }}">Download Cards</a></li>
                    <li><i class="icon icon-docs"></i><a class="sub-title templates" href="{{ route('cardLayout.index') }}">Templates</a></li>
                </ul>
            </li>
            <li class="top" data-title="Statistics">
                <a href="/"><i class="icon icon-line-chart" aria-hidden="true"></i></a>
            </li>
            <li class="top" data-title="Config">
                <a href="{{ route('config.index') }}"><i class="icon icon-gear-settings" aria-hidden="true"></i></a>
            </li>
        </ul>
    </nav>
    <nav class="user-nav">
        <ul>
            <li data-title="Profile"><a href="{{ route('user.show', ['id' => Auth::user()->id]) }}"><i class="icon-person icon" aria-hidden="true"></i></a></li>
            <li data-title="Logout">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon icon-power-off" aria-hidden="true"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
        </ul>
    </nav>
</header>
