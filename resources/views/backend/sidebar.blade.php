<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
      <a href="/">larablog</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">LB</a>
      </div>
      <ul class="sidebar-menu">
        @if (Auth::user()->level == 'admin')
          <li class="menu-header">Dashboard</li>
          <li class="{{Request::is('home') ? 'active' : ''}}">
          <a href="{{Route('home')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
        @endif
        <li class="menu-header">Profile</li>
        <li class="{{Request::is('profile') ? 'active' : ''}}">
        <a href="{{route('user-profile')}}" class="nav-link"><i class="fas fa-user"></i><span>Profile setting</span></a>
        </li>
        <li class="menu-header">Articles Management</li>
            <li class="{{Request::is('post.list') ? 'active' : ''}}"><a class="nav-link" href="{{Route('list')}}"><i class="fas fa-list"></i><span>List Article</span></a></li>
            <li class="{{Request::is('post/create') ? 'active' : ''}}"><a class="nav-link" href="{{Route('post.create')}}"><i class="fas fa-file-alt"></i><span>Create Article</a></li>
            <li class="{{Request::is('post/trashcan') ? 'active' : ''}}"><a class="nav-link" href="{{Route('post.trashlist')}}"><i class="fas fa-eraser"></i><span>Deleted Article</a></li>
        @if (Auth::user()->level == 'admin')
        <li class="menu-header">Components Management</li>
        <li class="{{Request::is('category') ? 'active' : ''}}">
          <a href="{{Route('category.index')}}" class="nav-link"><i class="fas fa-list-alt"></i><span>Category</span></a>
        </li>
        <li class="{{Request::is('tag') ? 'active' : ''}}">
          <a href="{{Route('tag.index')}}" class="nav-link"><i class="fas fa-tags"></i><span>Tag</span></a>
        </li>
        <li class="menu-header">Users Management</li>
            <li class="{{Request::is('user') ? 'active' : ''}}"><a class="nav-link" href="{{Route('user.index')}}"><i class="fas fa-users"></i><span>Users List </span></a></li>
            <li class="{{Request::is('user/traslist') ? 'active' : ''}}"><a class="nav-link" href="{{Route('user.trashlist')}}"><i class="fas fa-user-slash"></i><span>Banned Users</a></li>
        </li>
        @endif
        <li class="menu-header">Sign Out</li>
        <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
     </ul>
    </aside>
  </div>
