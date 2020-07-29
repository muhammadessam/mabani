<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom" style="z-index: 1000">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            @if(auth()->check())
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item dropdown-footer">تسجيل الخروج</button>
                </form>
            @endif
        </li>
    </ul>
</nav>
