<header>
        <div class="container">
            <div class="header-item">
                @guest
                <p>guest</p>
                @else
                {{ Auth::user()->name }}
                @endguest
                {{$slot}}
                <a href="javascript:void(0);">sign in</a>
                <a href="javascript:void(0);">sign up</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

        </div>
    </header>