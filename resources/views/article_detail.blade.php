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
                    <div class="row miniature_slider_container">
                        <div class="w-100 h-100 p-0 position_relative">
                            <div class="miniature_detail_slider">
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
                <a href="{{route('checkout',compact('article'))}}" class="btn_a"><div class="bg_bt"></div><div class="btn_card"><span class="text_gradient">aquista ora</span></div></a>
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
                @if ($article->categori_id == 1)
                <div class="my-3">
                    @foreach ($more_info as $info)
                        <p>taglia:{{$info->size}}</p>
                        <p>marca:{{$info->brend}}</p>
                    @endforeach
               </div>
                @elseif ($article->categori_id == 2)
                <div class="my-3">
                    @foreach ($more_info as $info)
                        <p>cilindrata:{{$info->volume}}</p>
                        <p>marca:{{$info->brand}}</p>
                        <p>disposizzione:{{$info->displacement}}</p>
                        <p>alimentazzione:{{$info->powering}}</p>
                        <p>km:{{$info->km}}</p>
                        <p>modello:{{$info->model}}</p>
                    @endforeach
               </div>
                @elseif ($article->categori_id == 3)
                <div class="my-3">
                    @foreach ($more_info as $info)
                        <p>materiale:{{$info->material}}</p>
                        <p>certificato:{{$info->certificate}}</p>
                    @endforeach
               </div>
                @endif
                @if (Auth::user()->id == $article->user_id)
                <div class="d-flex w-100 justify-content-evenly">    
                    <a href="{{route('article_update',compact('article'))}}"><button class="update" type="submit">update</button></a>
                    <form method="POST" action="{{route('destroy',compact('article'))}}">
                        @method('DELETE')
                    @csrf
                    <button class="delete" type="submit">delete</button>
                </form>
            </div>
                    @endif
            </div>
        </div>
    </div>
</x-layout>