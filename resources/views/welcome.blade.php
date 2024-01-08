<x-layout :profile=$profile>
    <header class="d-flex flex-column justify-content-center align-items-center text-center">
        <div class="lens"><div class="background"></div><div class="lens_body"></div></div>
        <h2>cerca e trova prodotti in tutto il mondo</h2>
        <div class="title_container">
            <div class="d-flex justify-content-evenly">
            <div class="header_div">prodotti:<div class="number">10.000+</div></div>
            <div class="header_div">utenti:<div class="number">5.000+</div></div>
            <div class="header_div">partner:<div class="number">500+</div></div>
        </div>
        <form method="POST" action="">
            @csrf
            <input class="header_search" type="search" name="search" id="">
            <button class="header_search_button" type="submit"><i class="bi bi-search"></i></button>
        </form>
        </div>
    </header>
    <main>
        <div class="container-fluid p-0">
            <div class="categori_title">veicoli</div>
            <div class="card_row row justify-content-evenly">
                @foreach ($articles as $article)
                @if ($article->categori_id == 2)
                <div class="card col-3 p-0 my-3 text-center overflow-hidden" style="width: 18rem;">
                    <form method="POST" action="{{route('add_to_cart')}}">
                    @csrf
                    <input type="number" value="{{$article->id}}" name="article" hidden>
                    <button class="cart_button" type="submit"><div class="cart_icon"><i class="bi bi-cart-plus"></i></div></button>
                </form>
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
                      <h5 class="card_title">{{$article->name}}</h5>
                      <p class="card_text">{{$article->description}}</p>
                      <h5 class="card_price">{{$article->price}}</h5>
                      <div class="d-flex justify-content-center"> 
                          <a href="{{route('detail',compact('article'))}}" class="btn_a"><div class="bg_bt"></div><div class="btn_card"><span class="text_gradient">dettagli</span></div></a>
                      </div>
                    </div>
                </div>
                @endif
                @endforeach
              </div>
              <div class="categori_title">gioglielli</div>
              <div class="card_row row justify-content-evenly">
                  @foreach ($articles as $article)
                  @if ($article->categori_id == 3)
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
                        <h5 class="card_title">{{$article->name}}</h5>
                        <p class="card_text">{{$article->description}}</p>
                        <h5 class="card_price">{{$article->price}}</h5>
                        <div class="d-flex justify-content-center"> 
                            <a href="{{route('detail',compact('article'))}}" class="btn_a"><div class="bg_bt"></div><div class="btn_card"><span class="text_gradient">dettagli</span></div></a>
                        </div>
                      </div>
                  </div>
                  @endif
                  @endforeach
                </div>
        </div>
    </main>
    <footer></footer>
</x-layout>