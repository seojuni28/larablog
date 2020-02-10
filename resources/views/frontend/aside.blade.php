<div id="nav-aside">
    <ul class="nav-aside-menu">
        @guest
        <li><a href="{{route('login')}}">Login</a></li>
        @endguest
        <li><a href="/">Home</a></li>
        <li><a href="{{route('home-list')}}">List Articles</a></li>
        @auth
        <li><a href="{{route('post.create')}}">Create Article</a></li>
        @if (Auth::user()->level == 'admin')
        <li><a href="{{route('home')}}">Dashboard</a></li>
        @endif
        @endauth
        <li class="has-dropdown"><a>Categories</a>
            <ul class="dropdown">
                @foreach ($categories as $category)
                    <li><a href="{{route('categoried-article',$category->slug)}}">{{$category->name }}</a></li>
                @endforeach
            </ul>
        </li>
        @auth
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> 
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @endauth
        
    </ul>
    <button class="nav-close nav-aside-close"><span></span></button>
</div>