<nav class="container-fluid">
<div class="row">
    <div class="col-4">
        <h1>double win</h1>
    </div>
    <div class="col-4 d-flex justify-content-evenly align-items-center">
        <div class="position-relative d-flex justify-content-center">
            <a class="nav_link" href="{{route('annunci')}}">annunci</a>
            <div class="link_hover"></div>
        </div>
        <div class="position-relative d-flex justify-content-center">
            <a class="nav_link" href="{{route('vendi')}}">vendi</a>
            <div class="link_hover"></div>
        </div>
    </div>
    <div class="col-4 d-flex justify-content-evenly align-items-center">
        @guest          
        <a class="nav_link" href="{{route('login')}}"><i class="bi bi-box-arrow-in-right"></i></a>
        <a class="nav_link" href="{{route('register')}}">register</a>
        @endguest
        @auth
        <form method="POST" action="{{route('logout')}}">
        @csrf
        <button type="submit">logout</button>
    </form>
    <a class="nav_link" href="{{route('profile',['user' => Auth::user()])}}">{{Auth::user()->name}}</a>
        @endauth
    </div>
</div>
</nav>