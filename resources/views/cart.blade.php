<x-layout :profile="$profile">
    <div class="container-fluid margin">
        @foreach ($articles as $i => $article)
            <div class="row justify-content-center">
                <div class="cart_article">
                    <div class="container-fluid h-100 p-0">
                        <div class="row h-100">
                            <div class="col-3 d-flex justify-content-left align-items-center">
                                <div class="cart_img">
                                    @foreach ($images[$i] as $image)
                                    <img class="h-100 w-100" src="{{Storage::url($image->images)}}" alt="">
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center fs-5"><p>{{$article->name}}</p></div>
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center position-relative">
                                    <div class="d-flex flex-column">
                                        <button class="add">+</button><button class="remove">-</button>
                                    </div>
                                    <input class="quantity" type="text" value="1" disabled>
                                    <p class="max d-none">max: 13</p>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center fs-4 price"><p>{{$article->price}}$</p></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>