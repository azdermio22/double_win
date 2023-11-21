<x-layout>
    <header class="d-flex justify-content-center align-items-center text-center">
        <div class="title_container">
        <h2 class="header_title">trova prezzi incredibili<br>su un ampia gamma di prodotti<br>provenienti da tutto il mondo</h2>
        <form method="POST" action="">
            @csrf
            <input class="w-50" type="search" name="search" id="">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
        </div>
    </header>
    <main>
        <div class="container-fluid">
            <div class="card_row row justify-content-evenly">
                <div class="triger"></div>
                @foreach ($articles as $article)
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
                          <a href="#" class="btn_a"><div class="bg_bt"></div><div class="btn_card"><span class="text_gradient">dettagli</span></div></a>
                      </div>

                    </div>
                </div>
                @endforeach
              </div>
        </div>
    </main>
    <footer></footer>
</x-layout>