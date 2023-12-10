<div>
    <div class="filter_pannel">
        <div class="filter_button">filter</div>
        <form wire:submit.prevent="annunci">
        <input wire:model="serch" type="serch" id="serch" value="{{$selected_filter[0]}}">
        <select class="d-block mt-3" wire:model="categori" id="categori">
            @if ($selected_filter[3] != null)
            <option value="{{$selected_filter[6]}}"  hidden>{{$selected_filter[3]}}</option> 
            @else
            <option value=""  hidden>select the categori</option>   
            @endif
            <option value="1">abbigliamento</option>
            <option value="2">veicoli</option>
            <option value="3">gioglielli</option>
        </select>
        <select class="d-block mt-3" wire:model="orderby" id="orderby">
            @if ($selected_filter[4] != null)
            <option value="{{$selected_filter[7]}}"  hidden>{{$selected_filter[4]}}</option> 
            @endif
            <option value="0">prezzo</option>
            <option value="1">data</option>
        </select>
        <select class="d-block mt-3" wire:model="order" id="order">
            @if ($selected_filter[2] != null)
            <option value="{{$selected_filter[5]}}"  hidden>{{$selected_filter[2]}}</option>
            @endif
            <option value="0">decrescente</option>
            <option value="1">crescente</option>
        </select>
        <input class="mt-3 mb-5" wire:model="range" type="range" min="{{$min}}" max="{{$max}}" @if ($selected_filter[1]) value="{{$selected_filter[1]}}" @else value="{{$max}}" @endif id="range">
        <p>selected filter:</p>
            <div class="d-flex flex-wrap justify-content-evenly filter_container">
                @if ($selected_filter[0])
                <div class="selected_filter">{{$selected_filter[0]}}<div class="remove_filter"><i class="bi bi-x-circle-fill"></i></div></div>
                <input class="d-none selected_filter_input" wire:model="remove" value="5" type="text">
            @endif
                @if ($selected_filter[1] != $max && $selected_filter[1] != null)
                <div class="selected_filter">{{$selected_filter[1]}}<div class="remove_filter"><i class="bi bi-x-circle-fill"></i></div></div>
                <input class="d-none selected_filter_input" wire:model="remove" value="4" type="text" disabled>
            @endif
                @if ($selected_filter[2] == "crescente")
                    <div class="selected_filter">{{$selected_filter[2]}}<div class="remove_filter"><i class="bi bi-x-circle-fill"></i></div></div>
                    <input class="d-none selected_filter_input" wire:model="remove" value="1" type="text" disabled>
                @endif
                @if ($selected_filter[3])
                <div class="selected_filter">{{$selected_filter[3]}}<div class="remove_filter"><i class="bi bi-x-circle-fill"></i></div></div>
                <input class="d-none selected_filter_input" wire:model="remove" value="2" type="text" disabled>
            @endif
            @if ($selected_filter[4] == "data")
                <div class="selected_filter">{{$selected_filter[4]}}<div class="remove_filter"><i class="bi bi-x-circle-fill"></i></div></div>
                <input class="d-none selected_filter_input" wire:model="remove" value="3" type="text" disabled>
            @endif
            </div>
            <button class="d-none" type="submit" id="submit"></button>
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
</div>
