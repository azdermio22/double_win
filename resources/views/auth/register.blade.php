<x-layout :profile=$profile>
    <div class="container-fluid h-100 register_container">
        <div class="row flex-column justify-content-center align-items-center h-100">
    
          <div class="register_form_container col-4">
    
            <div class="register_btn">
              <div class="btn_swich"></div>
              <div class="btnr">register<i class="ms-1 bi bi-person-circle"></i></div>
              <div class="btnr">login<i class="bi bi-lock-fill"></i></div>
            </div>
          <form class="d-flex align-items-center flex-column register" method="POST" action="{{route('register')}}">
            @csrf
            <div class="primary_container position-relative w-100">
            <div class="secondary_container mb-3 w-100 position-relative overflow-x-hidden">
                <label for="name" class="register_label">name</label>
                <input value="{{old('name')}}" name="name" type="text" class="register_input" id="name">
                <div class="input_border"></div>
              </div>
              <div class="error"></div>
            </div>
            <div class="primary_container position-relative w-100">
              <div class="secondary_container mb-3 w-100 position-relative overflow-x-hidden">
                  <label for="surname" class="register_label">surname</label>
                  <input value="{{old('surname')}}" name="surname" type="text" class="register_input" id="surname">
                  <div class="input_border"></div>
                </div>
                <div class="error"></div>
              </div>
            <div class="primary_container position-relative w-100">
            <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
              <label for="email" class="register_label">Email</label>
              <input value="{{old('email')}}" name="email" type="email" class="register_input" id="email">
              <div class="input_border"></div>
            </div>
            <div class="error_display">
            @error('email')
            @if ($message != "These credentials do not match our records.")
            <div class="d-none">{{$form = 0}}</div>
            <div class="error">{{ $message }}</div>
            @endif
            @enderror
          </div>
            <div class="error"></div>
            </div>
            <div class="primary_container position-relative w-100">
            <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
              <label for="password" class="register_label">Password</label>
              <div class="d-flex">
              <input name="password" type="password" class="register_input password" id="password">
              <div class="eye"><i class="bi bi-eye-slash"></i></div>
              <div class="input_border"></div>
            </div>
            </div>
            <div class="error"></div>
            </div>
            <div class="primary_container position-relative w-100">
            <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
                <label for="password_confirmation" class="register_label">repeat Password</label>
                <div class="d-flex">
                <input name="password_confirmation" type="password" class="register_input password" id="password_confirmation">
                <div class="eye"><i class="bi bi-eye-slash"></i></div>
                <div class="input_border"></div>
                </div>
              </div>
              <div class="error"></div>
            </div>
            <button type="button" class="register_submit mt-3">invia</button>
          </form>
          <form class="mt-5 login d-flex align-items-center flex-column" method="POST" action="{{route('login')}}">
            @csrf
            <div class="primary_container position-relative w-100">
            <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
              <label for="email" class="register_label">Email</label>
              <input value="{{old('email')}}" name="email" type="email" class="register_input" id="email1" aria-describedby="emailHelp">
              <div class="input_border"></div>
            </div>
            <div class="error_display1">
            @error('email')
            @if ($message == "These credentials do not match our records.")
            <div class="d-none">{{$form = 1}}</div>
            <div class="error">{{ $message }}</div>
            @endif
              @enderror
            </div>
              <div class="error"></div>
            </div>
            <div class="primary_container position-relative w-100">
            <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
              <label for="password" class="register_label">Password</label>
              <div class="d-flex">
              <input name="password" type="password" class="register_input password" id="password1">
              <div class="eye"><i class="bi bi-eye-slash"></i></div>
            </div>
              <div class="input_border"></div>
            </div>
            <div class="error"></div>
            </div>
            <a class="mt-2 password_reset">password dimenticata?</a>
            <button type="button" class="register_submit mt-5">invia</button>
          </form>
        </div>
      </div>
    </div>
    <div class="password_reset_form_container d-none">
      <form class="password_reset_form" method="POST" action="/forgot-password">
        @csrf
        <div class="reset_title_container">
          <p class="m-0">insert your email to change the password</p>
          <div class="esc"><i class="bi bi-x"></i></div>
        </div>
        <div class="h-75 d-flex flex-column justify-content-evenly align-items-center">
          <input placeholder="youremail@example.com" class="w-75" type="email" name="email">
          <button class="password_reset_button" type="submit">invia email</button>
        </div>
    </form>
    </div>
    @if (session('message'))
    <div class="password_reset_form_container">
      <div class="password_reset_form">
        <div class="reset_title_container bg-success text-center">
          <p class="m-0 p-1">the email has been sended correctly<br>pleas check your email</p>
          <div class="esc"><i class="bi bi-x"></i></div>
        </div>
        <div class="password_check"><i class="bi bi-check2-circle"></i></div>
    </div>
    </div>
    @endif
      <input id="form" class="d-none" value="{{$form}}" type="number">
</x-layout>