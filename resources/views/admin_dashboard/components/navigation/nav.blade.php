<nav id="sidebar" class="shadow">
        <div class="sidebar-header">
            <a class="navbar-brand" href="/admin_dashboard">
                <img style="width:170px;" src="{{ asset('images/smylen-logo.png') }}" alt="logo">
            </a>
        </div>

        <ul class="list-unstyled components">
            <li class="{{ Request::getRequestUri() == '/admin_dashboard' ? 'active' : '' }}">
                <a href="/admin_dashboard"><i class="fas fa-store"></i> Products</a>
            </li>
            <li>
                <a href="#" data-toggle="" aria-expanded="false" class=""><i class="fab fa-blogger-b"></i> Blog</a>
                <ul class="list-unstyled" id="homeSubmenu">
                    <li class="{{ Request::getRequestUri() == '/admin_dashboard/blog' ? 'active' : '' }}">
                        <a href="/admin_dashboard/blog"><i class="far fa-file-alt"></i> Posts</a>
                    </li>
                    <li class="{{ Request::getRequestUri() == '/admin_dashboard/blog/comments' ? 'active' : '' }}">
                        <a href="/admin_dashboard/blog/comments"><i class="far fa-comments"></i> Comments</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user"></i> {{ Auth::user()->username }}
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>