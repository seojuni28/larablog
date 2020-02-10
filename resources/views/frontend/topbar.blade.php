<div id="nav-top">
    <div class="container">
    <div class="nav-logo">
        <a href="/" style="margin-right:10px;left:0;"><img src="{{asset('frontend/img/logo.png')}}" alt="" width="300" height="70"></a>
    </div>
    <div class="nav-btns">
        @auth
        <label>Hello, {{Auth::user()->name}}</label>    
        @endauth
        <button class="aside-btn"><i class="fa fa-bars"></i></button>
        <button class="search-btn"><i class="fa fa-search"></i></button>
        <div id="nav-search">
            <form action="{{route('search')}}" method="get">
                <input class="input" name="search" placeholder="Enter your search...">
            </form>
            <button class="nav-close search-close">
                <span></span>
            </button>
        </div>
    </div>
    </div>
</div>