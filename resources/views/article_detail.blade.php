<x-layout>
    <div class="container-fluid mt-5">
        <div class="row mt-5">
            <div class="col-4 p-0 overflow-hidden">
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
            <div class="col-8 d-flex align-items-center flex-column">
                <h1 class="my-4">{{$article->name}}</h1>
                <p class="h-50 d-flex justify-content-center align-items-center">{{$article->description}}</p>
                <h2 class="my-4">{{$article->price}}$</h2>
                <a href=""><button>aquista ora</button></a>
            </div>
        </div>
    </div>
</x-layout>