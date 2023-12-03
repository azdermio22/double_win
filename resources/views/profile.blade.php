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
                <button class="invia d-none" type="submit">annulla</button>
                    <div class="modifi">modifica profilo<i class="bi bi-pencil-fill"></i></div>
            </div>
            <div class="col-8 d-flex justify-content-center flex-column position-relative">
                <h3 class="table_title">dati personali:</h3>
                <div class="w-50 row_container container-fluid">
                    <div class="row">
                        <div class="col-6 table_row">name</div>
                        <div class="col-6 table_row">{{$user->name}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 table_row">email</div>
                        <div class="col-6 table_row">{{$user->email}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 table_row">country</div>
                        <div class="col-6 table_row">
                            @if ($user->country)
                            {{$user->country}}
                            @else
                                0
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 table_row">phone number</div>
                        <div class="col-6 table_row">
                            @if ($user->phone)
                            {{$user->phone}}
                            @else
                                0
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 table_row border-0">surname</div>
                        <div class="col-6 table_row border-0">{{$user->surname}}</div>
                    </div>
                </div>
            </div>
            <input class="d-none" name="img" id="input" type="file">
        </form>
        </div>
        <div class="separeitor"></div>
        <div class="row justify-content-evenly">
            <div class="triger"></div>
            <h2 class="text-center">articoli caricati:</h2>
            @foreach ($articles as $article)
            @if ($article->user_id == $user->id)
            <div class="card col-3 p-0 my-3 text-center overflow-hidden" style="width: 18rem;">
                <div class="d-flex card_carousel">
                @foreach ($images as $image)
                @if ($image->article_id == $article->id)   
                <img src="{{Storage::url($image->images)}}" class="card-img-top image" alt="...">
                @endif  
                @endforeach
                </div>
                <div class="d-flex">
                    @foreach ($images as $image)
                    @if ($image->article_id == $article->id)
                    <div class="img_miniature_container">  
                    <img src="{{Storage::url($image->images)}}" class="card-img-top img_miniature" alt="...">
                    </div>
                    @endif  
                    @endforeach
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$article->name}}</h5>
                  <p class="card_text">{{$article->description}}</p>
                  <h5>{{$article->price}}</h5>
                  <div class="d-flex justify-content-center"> 
                      <a href="{{route('detail',compact('article'))}}" class="btn_a"><div class="bg_bt"></div><div class="btn_card"><span class="text_gradient">dettagli</span></div></a>
                  </div>
                </div>
            </div>
            @endif
            @endforeach
            <div class="separeitor"></div>
        </div>
    </div>
</x-layout>