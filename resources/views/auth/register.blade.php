<x-layout>
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <h2 class="text-center mt-5">entra a far parte della nostra comuniti!</h2>
      <form class="col-5" method="POST" action="{{route('register')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
          </div>
          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input value="{{old('email')}}" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        @error('surname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="d-flex">
          <input value="{{old('password')}}" name="password" type="password" class="form-control password" id="password">
          <div class="eye"><i class="bi bi-eye-slash"></i></div>
        </div>
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">repeat Password</label>
            <div class="d-flex">
            <input value="{{old('password_confirmation')}}" name="password_confirmation" type="password" class="password form-control" id="password_confirmation">
            <div class="eye"><i class="bi bi-eye-slash"></i></div>
            </div>
          </div>
          @error('password_confirmation')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</x-layout>