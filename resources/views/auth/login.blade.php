<x-layout>
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
</x-layout>