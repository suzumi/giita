
<div class="user-info">
    <div class="user-info-left">
        <img class="img-rounded" src="{{ Auth::user()->thumbnail }}">
    </div>
    <div class="user-info-right">
        <div class="user-info-name">
            <a href="/users/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
        </div>
    </div>
</div>
<div class="category-navigation">
    <ul class="nav nav-pills nav-stacked">
        @if($sidebar == 'feed')
            <li role="presentation" class="active"><a href="/">フィード</a></li>
            <li role="presentation"><a href="/events">勉強会アーカイブ</a></li>
        @elseif($sidebar == 'events')
            <li role="presentation"><a href="/">フィード</a></li>
            <li role="presentation" class="active"><a href="/events">勉強会アーカイブ</a></li>
        @endif
    </ul>
</div>