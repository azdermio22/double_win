<div>
    <x-layout>
        <div class="container-fluid h-100 register_container">
            <div class="row flex-column justify-content-center align-items-center h-100">
        
              <div class="register_form_container col-4">
        
                <div class="register_btn">
                  <div class="btn_swich"></div>
                  <div class="btnr">register<i class="ms-1 bi bi-person-circle"></i></div>
                  <div class="btnr">login<i class="bi bi-lock-fill"></i></div>
                </div>
              <form class="d-flex align-items-center flex-column register" wire:submit="register">
                @csrf
                <div class="primary_container position-relative w-100">
                <div class="secondary_container mb-3 w-100 position-relative overflow-x-hidden">
                    <label for="name" class="register_label">name</label>
                    <input value="{{old('name')}}" wire:model="name" type="text" class="register_input" id="name">
                    <div class="input_border"></div>
                  </div>
                  @error('name')
                  <div class="error" id="name">{{ $message }}</div>
                  @enderror
                </div>
                <div class="primary_container position-relative w-100">
                <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
                  <label for="email" class="register_label">Email</label>
                  <input value="{{old('email')}}" wire:model="email" type="email" class="register_input" id="email">
                  <div class="input_border"></div>
                </div>
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
                </div>
                <div class="primary_container position-relative w-100">
                <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
                  <label for="password" class="register_label">Password</label>
                  <div class="d-flex">
                  <input wire:model="password" type="password" class="register_input password" id="password">
                  <div class="eye"><i class="bi bi-eye-slash"></i></div>
                  <div class="input_border"></div>
                </div>
                </div>
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
                </div>
                <div class="primary_container position-relative w-100">
                <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
                    <label for="password_confirmation" class="register_label">repeat Password</label>
                    <div class="d-flex">
                    <input wire:model="password_confirmation" type="password" class="register_input password" id="password_confirmation">
                    <div class="eye"><i class="bi bi-eye-slash"></i></div>
                    <div class="input_border"></div>
                    </div>
                  </div>
                  @error('password_confirmation')
                  <div class="error">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="register_submit">invia</button>
              </form>
              <form class="mt-5 login d-flex align-items-center flex-column" method="POST" action="{{route('login')}}">
                @csrf
                <div class="primary_container position-relative w-100">
                <div class="secondary_container mb-3 w-100  position-relative overflow-x-hidden">
                  <label for="email" class="register_label">Email</label>
                  <input value="{{old('email')}}" name="email" type="email" class="register_input" id="email1" aria-describedby="emailHelp">
                  <div class="input_border"></div>
                </div>
                @error('email')
                  <div class="error">{{ $message }}</div>
                  @enderror
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
                @error('password')
                  <div class="error">{{ $message }}</div>
                  @enderror
                </div>
                <a class="mt-2" href="">password dimenticata?</a>
                <button type="submit" class="register_submit mt-5">Submit</button>
              </form>
              </div>
            </div>
          </div>
          <input id="form" class="d-none" value="{{$form}}" type="number">
    </x-layout>
</div>
