<x-layout :profile=$profile>
    <div class="container-fluid mt-5">
        <div class="row mt-5">
            <div class="col-4 p-0 overflow-hidden fixed">
                <div class="container-fluid mt-2">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="d-flex carousel_detail h-100 w-100 p-0">
                                @foreach ($article->images as $image)
                                    <img class="img_detail" src="{{Storage::url($image->images)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="d-flex h-100 w-100 p-0">
                                @foreach ($article->images as $image)
                                <div class="miniature_detail">
                                <img class="h-100 w-100" src="{{Storage::url($image->images)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center flex-column description">
                <h1 class="my-4">{{$article->name}}</h1>
                <div class="position-relative">
                    <p class="p_detail">{{$article->description}} {{$article->description}}</p>
                    <span class="espandi">espandi</span>
                </div>
                <h2 class="my-4">{{$article->price}}$</h2>
                <a href=""><button class="mb-4">aquista ora</button></a>
            </div>
            <div class="col-2 info">
                <p class="text-center my-3">informazzioni articolo:</p>
                <div class="my-3">
                    venditore: {{$article->user->name}}
                </div>
                <div class="my-3">
                    pubblicato il: {{$article->created_at->day}}/{{$article->created_at->month}}/{{$article->created_at->year}}
                </div>
                <div class="my-3">
                    categoria: {{$article->categori->categori}}
                </div>
                <a href="{{route('article_update',compact('article'))}}"><button type="submit">update</button></a>
                <form method="POST" action="{{route('destroy',compact('article'))}}">
                    @method('DELETE')
                @csrf
                <button type="submit">delete</button>
            </form>
            </div>
        </div>
    </div>
</x-layout>