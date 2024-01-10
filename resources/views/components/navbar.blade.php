<nav class="container-fluid">
<div class="row">
    <div class="col-4">
        @if (Route::currentRouteName() != "home")
        <h1 class="title">{{Route::currentRouteName()}}</h1> 
        @else      
        <h1 class="title">double <span class="w">v</span>vin</h1>
        @endif
    </div>
    <div class="col-4 d-flex justify-content-evenly align-items-center">
        @if (Route::currentRouteName() != "annunci")
        <div class="position-relative d-flex justify-content-center">
            <a class="nav_link" href="{{route('annunci')}}">annunci</a>
            <div class="link_hover"></div>
        </div>
        @endif
        @if (Route::currentRouteName() != "vendi")           
        <div class="position-relative d-flex justify-content-center">
            <a class="nav_link" href="{{route('vendi')}}">vendi</a>
            <div class="link_hover"></div>
        </div>
        @endif
        @if (Route::currentRouteName() != "home")           
        <div class="position-relative d-flex justify-content-center">
            <a class="nav_link" href="{{route('home')}}">home</a>
            <div class="link_hover"></div>
        </div>
        @endif
    </div>
    <div class="col-4 d-flex justify-content-evenly align-items-center">
        @guest  
        <div class="position-relative d-flex justify-content-center">
            <a class="login_link nav_link fs-3 d-flex align-items-center" href="{{route('login')}}"><i class="bi bi-box-arrow-in-right"></i><div class="login_container position-relative d-flex align-items-center overflow-hidden"><div class="login_link2 fs-5">login</div></div></a>
            <div class="link_hover"></div>
        </div>
        <div class="position-relative d-flex justify-content-center">
            <a class="register_link nav_link fs-3 d-flex align-items-center" href="{{route('register')}}"><i class="bi bi-person-fill-add"></i><div class="register-container position-relative d-flex align-items-center overflow-hidden"><div class="register_link2 fs-5">register</div></div></a>
            <div class="link_hover"></div>
        </div>        
        @endguest
        @auth
        <div class="position-relative d-flex justify-content-center">
            <a class="register_link nav_link fs-3 d-flex align-items-center" href="{{route('cart')}}"><i class="bi bi-cart-fill"></i><div class="register-container position-relative d-flex align-items-center overflow-hidden"><div class="register_link2 fs-5">cart</div></div></a>
            <div class="link_hover"></div>
        </div>  
        <form method="POST" action="{{route('logout')}}">
        @csrf
        <div class="position-relative d-flex justify-content-center">
            <button class="nav_link logout fs-3 register_link d-flex align-items-center" type="submit"><i class="bi bi-box-arrow-left"></i><div class="register-container position-relative d-flex align-items-center overflow-hidden"><div class="register_link2 fs-5">logout</div></div></button>
            <div class="link_hover"></div>
        </div>
    </form>
    @if (Route::currentRouteName() != "profile")       
    <div class="position-relative d-flex justify-content-center">
        @if ($profile != 0)    
        <a class="nav_link profile_link d-flex" href="{{route('profile',['user' => Auth::user()])}}"><div class="profile_name">{{Auth::user()->name}}</div><div class="nav_profile_icon"><img class="w-100 h-100 rounded-5" src="{{Storage::url($profile->image)}}" alt=""><div class="profile_swich"><div class="profile_swich_content">profile</div></div></div></a>
        @else
        <a class="nav_link profile_link d-flex" href="{{route('profile',['user' => Auth::user()])}}"><div class="profile_name">{{Auth::user()->name}}</div><div class="nav_profile_icon"><div class="profile_swich"><div class="profile_swich_content">profile</div></div></div></a>
        @endif
        <div class="profile_link_hover"></div>
    </div> 
    @endif
        @endauth
    </div>
</div>
</nav>