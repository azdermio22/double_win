<x-layout>
  <div class="container-fluid h-100 register_container">
    <div class="row flex-column justify-content-center align-items-center h-100">

      <div class="register_btn">
        <div class="btn_swich"></div>
        <div class="btnr">login<i class="bi bi-lock-fill"></i></div>
        <div class="btnr">register<i class="ms-1 bi bi-person-circle"></i></div>
      </div>

      <div class="register_form_container col-4">

        <form class="mt-5" method="POST" action="{{route('login')}}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      <form class="w-100 d-flex align-items-center flex-column register" method="POST" action="{{route('register')}}">
        @csrf
        <div class="mb-3 w-100 position-relative overflow-x-hidden">
            <label for="name" class="register_label">name</label>
            <input value="{{old('name')}}" name="name" type="text" class="register_input" id="name" aria-describedby="emailHelp">
            <div class="input_border"></div>
          </div>
          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <div class="mb-3 w-100  position-relative overflow-x-hidden">
          <label for="email" class="register_label">Email</label>
          <input value="{{old('email')}}" name="email" type="email" class="register_input" id="email" aria-describedby="emailHelp">
          <div class="input_border"></div>
        </div>
        @error('surname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3 w-100  position-relative overflow-x-hidden">
          <label for="password" class="register_label">Password</label>
          <div class="d-flex">
          <input value="{{old('password')}}" name="password" type="password" class="register_input password" id="password">
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
            <input value="{{old('password_confirmation')}}" name="password_confirmation" type="password" class="register_input password" id="password_confirmation">
            <div class="eye"><i class="bi bi-eye-slash"></i></div>
            <div class="input_border"></div>
            </div>
          </div>
          @error('password_confirmation')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <button type="submit" class="register_submit">invia</button>
      </form>
      </div>
    </div>
  </div>
</x-layout>