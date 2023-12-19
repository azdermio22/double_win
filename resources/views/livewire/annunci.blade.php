<div>
    <div class="filter_pannel px-4" wire:ignore.self>
        <div class="filter_button">filter<span class="arrow_container"><div class="arrow"></div><div class="arrow"></div><div class="arrow"></div></span></div>
        <div class="d-flex align-items-center">
            <input class="my-3" placeholder="search"  type="text" id="serch">
            <div class="search_icon">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <form class="d-flex flex-column justify-content-center" wire:submit.prevent="annunci">
            <input hidden class="my-3" wire:model="serch"  type="text" id="serch_submit">
        <select class="d-block my-4" wire:model="categori" id="categori">
            <option value=""  hidden>select the categori</option>   
            <option value="1">abbigliamento</option>
            <option value="2">veicoli</option>
            <option value="3">gioglielli</option>
        </select>
        <select class="d-block my-4" wire:model="orderby" id="orderby">
            @if ($selected_filter[4] != null)
            <option value="{{$selected_filter[7]}}"  hidden>{{$selected_filter[4]}}</option> 
            @endif
            <option value="0">prezzo</option>
            <option value="1">data</option>
        </select>
        <select class="d-block my-4" wire:model="order" id="order">
            @if ($selected_filter[2] != null)
            <option value="{{$selected_filter[5]}}"  hidden>{{$selected_filter[2]}}</option>
            @endif
            <option value="0">decrescente</option>
            <option value="1">crescente</option>
        </select>
        <div class="my-5 position-relative">
            <div class="value_display"></div>
            <input wire:change="$refresh" class="range w-100" wire:model="range" type="range" step="12" min="{{$min}}" max="{{$max}}" @if ($selected_filter[1]) value="{{$selected_filter[1]}}" @else value="{{$max}}" @endif id="range">
            <div class="d-flex">
                <div>{{$min}}</div>
                <div class="position-absolute end-0">{{$max}}</div>
            </div>
        </div>
        <input hidden id="remove" wire:model="remove" type="number">
            <button class="d-none" type="submit" id="submit"></button>
    </form>
    <p>selected filter:</p>
    <div class="d-flex flex-wrap">
        @if ($selected_filter[3] != null)
            <div class="selected_filter">{{$selected_filter[3]}}<div class="remove_filter" id="1"><i class="bi bi-x-circle-fill"></i></div></div>
        @endif
        @if ($selected_filter[4] != "prezzo")
        <div class="selected_filter">{{$selected_filter[4]}}<div class="remove_filter" id="2"><i class="bi bi-x-circle-fill"></i></div></div>
    @endif
    @if ($selected_filter[2] != "decrescente")
        <div class="selected_filter">{{$selected_filter[2]}}<div class="remove_filter" id="3"><i class="bi bi-x-circle-fill"></i></div></div>
    @endif
    @if ($selected_filter[1] != null)
        <div class="selected_filter">{{$selected_filter[1]}}<div class="remove_filter" id="4"><i class="bi bi-x-circle-fill"></i></div></div>
    @endif
    @if ($selected_filter[0] != null)
        <div class="selected_filter">{{$selected_filter[0]}}<div class="remove_filter" id="5"><i class="bi bi-x-circle-fill"></i></div></div>
    @endif
</div>
    </div>
    <div class="container-fluid card_container">
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
</div>
