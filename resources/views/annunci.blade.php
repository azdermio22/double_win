<x-layout>
    <div class="filter_pannel">
        <div class="filter_button">filter</div>
        <form method="POST" action="{{route('filtra')}}">
        @csrf
        <input name="serch" type="serch">
        <select name="categori">
            <option value="1">abbigliamento</option>
            <option value="2">veicoli</option>
            <option value="3">gioglielli</option>
        </select>
        <input name="range" type="range" min="{{$min}}" max="{{$max}}">
        <button type="submit">prova</button>
    </form>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-evenly">
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
                      <a href="{{route('detail',compact('article'))}}" class="btn_a"><div class="bg_bt"></div><div class="btn_card"><span class="text_gradient">dettagli</span></div></a>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>