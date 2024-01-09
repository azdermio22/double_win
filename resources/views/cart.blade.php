<x-layout :profile="$profile">
    <div class="container-fluid margin">
        @foreach ($articles as $i => $article)
            <div class="row justify-content-center">
                <div class="cart_article">
                    <div class="container-fluid h-100 p-0">
                        <div class="row h-100">
                            <div class="col-3 d-flex justify-content-left align-items-center">
                                <div class="cart_img_container">
                                    <div class="cart_img_slider">
                                        @foreach ($images[$i] as $image)
                                        <div class="cart_img">
                                            <img class="h-100 w-100" src="{{Storage::url($image->images)}}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center fs-5"><p>{{$article->name}}</p></div>
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center position-relative">
                                    <div class="d-flex flex-column">
                                        <button class="add"><i class="bi bi-plus"></i></button><button class="remove"><i class="bi bi-dash"></i></button>
                                    </div>
                                    <livewire:quantity :id="$article->id"></livewire:quantity>
                                    <div class="quantity_container">
                                        <div class="quantity_container_effect"></div>
                                        <div class="quantity_carousel">
                                            <div class="quantity">{{$user_articles[$i]}}</div>
                                            <div class="quantity">{{$user_articles[$i]}}</div>
                                        </div>
                                    </div>
                                    <p class="max d-none">max: 13</p>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center fs-4 price_container position-relative"><p class="price">{{$article->price * $user_articles[$i]}}</p><p>$</p></div>
                        </div>
                    </div>
                    <div class="cart_delete"><i class="bi bi-x"></i></div>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="row justify-content-center mb-3">
            <div class="cart_article">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 d-flex justify-content-center align-items-center flex-column fs-4">
                            <div>article:</div>
                            <div class="total_article"></div>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center flex-column fs-4">
                            <p>price:</p>
                            <div class="total_price"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>