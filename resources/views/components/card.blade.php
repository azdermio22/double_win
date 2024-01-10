<div class="card col-3 p-0 my-3 text-center overflow-hidden" style="width: 18rem;">
    <livewire:add-to-cart :id="$article->id"></livewire:add-to-cart>
    <div class="d-flex card_carousel">
    @php
        $counter = 0;
    @endphp
    @foreach ($images as $image)
    @if ($image->article_id == $article->id && $counter <= 3)
    @php
        $counter++ 
    @endphp  
    <img src="{{Storage::url($image->images)}}" class="card-img-top image" alt="...">
    @endif  
    @endforeach
    </div>
    <div class="d-flex">
        @php
            $counter = 0;
        @endphp
        @foreach ($images as $image)
        @if ($image->article_id == $article->id && $counter <= 3)
        @php
          $counter++ 
        @endphp
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