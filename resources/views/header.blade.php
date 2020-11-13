<div>
    @component('formReg')
    @endcomponent
    @component('formAuth')
    @endcomponent
</div>
<header>
    
    <div class="container">
        <div class="header-item">
            @guest
            <p>guest</p>
            {{$slot}}
            <a href="javascript:void(0);" id="signin">sign in</a>
            <a href="javascript:void(0);" id="signup">sign up</a>
            @else
            <p>{{ Auth::user()->name }}</p>
            {{$slot}}
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </div>

    </div>
</header>
