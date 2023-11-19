<x-layout>
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
        <div class="mb-3 w-100 position-relative overflow-x-hidden">
            <label for="name" class="register_label">name</label>
            <input value="{{old('name')}}" name="name" type="text" class="register_input" id="name">
            <div class="input_border"></div>
          </div>
          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <div class="mb-3 w-100  position-relative overflow-x-hidden">
          <label for="email" class="register_label">Email</label>
          <input value="{{old('email')}}" name="email" type="email" class="register_input" id="email">
          <div class="input_border"></div>
        </div>
        @error('surname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3 w-100  position-relative overflow-x-hidden">
          <label for="password" class="register_label">Password</label>
          <div class="d-flex">
          <input name="password" type="password" class="register_input password" id="password">
          <div class="eye"><i class="bi bi-eye-slash"></i></div>
          <div class="input_border"></div>
        </div>
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3 w-100  position-relative overflow-x-hidden">
            <label for="password_confirmation" class="register_label">repeat Password</label>
            <div class="d-flex">
            <input name="password_confirmation" type="password" class="register_input password" id="password_confirmation">
            <div class="eye"><i class="bi bi-eye-slash"></i></div>
            <div class="input_border"></div>
            </div>
          </div>
          @error('password_confirmation')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <button type="submit" class="register_submit">invia</button>
      </form>
      <form class="mt-5 login d-flex align-items-center flex-column" method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-3 w-100  position-relative overflow-x-hidden">
          <label for="email" class="register_label">Email</label>
          <input value="{{old('email')}}" name="email" type="email" class="register_input" id="email1" aria-describedby="emailHelp">
          <div class="input_border"></div>
        </div>
        <div class="mb-3 w-100  position-relative overflow-x-hidden">
          <label for="password" class="register_label">Password</label>
          <div class="d-flex">
          <input name="password" type="password" class="register_input password" id="password1">
          <div class="eye"><i class="bi bi-eye-slash"></i></div>
        </div>
          <div class="input_border"></div>
        </div>
        <a class="mt-2" href="">password dimenticata?</a>
        <button type="submit" class="register_submit mt-5">Submit</button>
      </form>
      </div>
    </div>
  </div>
  <script>
    if ({{$form}} == 1) {
    let login = document.querySelector('.login');
    let register = document.querySelector('.register');
    let swich = document.querySelector('.btn_swich');
    swich.style.transform = "translateX(100px)";
    login.style.transform= 'translateX(0)';
    register.style.transform= 'translateX(-100%)';
    }
  </script>
</x-layout>