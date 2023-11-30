<x-layout>
    <div class="container-fluid mt-5 profile_page">
        <div class="row user">
            <form class="d-flex" method="POST" action="{{route('update',compact('user'))}}" enctype="multipart/form-data">
                @csrf
            <div class="col-4 mt-5 d-flex flex-column align-items-center">
                <div class="img_profile_container">
                    <div class="img_button d-none"><i class="bi bi-camera-fill"></i></div>
                    @foreach ($user_images as $user_image)
                    @if ($user_image->user_id == $user->id)
                        <img class="img_profile" src="{{Storage::url($user_image->image)}}" alt="">
                    @endif
                    @endforeach
                </div>
                <button class="invia d-none" type="submit">invia</button>
                    <div class="modifi">modifica profilo<i class="bi bi-pencil-fill"></i></div>
            </div>
            <div class="col-8">
                <h3 class="text-center mt-3">dati personali:</h3>
                <div class="info_container">
                    <div class="d-flex data">
                        <p>name</p>:
                        <p>{{$user->name}}</p>
                    </div>
                    <div class="d-flex data">
                        <p>email</p>:
                        <p>{{$user->email}}</p>
                    </div>
                    <div class="d-flex data">
                        <p>phone number</p>:
                        <p></p>
                    </div>
                    <input class="d-none" name="img" id="input" type="file">
                </div>
            </div>
        </form>
        </div>
    </div>
</x-layout>