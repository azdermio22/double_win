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
            <div class="d-block my-4 position-relative">
        <select wire:model.live="categori" id="categori">
            <option value="" hidden>select the categori</option>   
            <option value="1">abbigliamento</option>
            <option value="2">veicoli</option>
            <option value="3">gioglielli</option>
        </select>
    </div>
    <div class="d-block my-4 position-relative">
        <select wire:model.live="orderby" id="orderby">
            @if ($selected_filter[4] != null)
            <option value="{{$selected_filter[7]}}"  hidden>{{$selected_filter[4]}}</option> 
            @endif
            <option value="0">prezzo</option>
            <option value="1">data</option>
        </select>
    </div>
    <div class="d-block my-4 position-relative">
        <select wire:model.live="order" id="order">
            @if ($selected_filter[2] != null)
            <option value="{{$selected_filter[5]}}"  hidden>{{$selected_filter[2]}}</option>
            @endif
            <option value="0">decrescente</option>
            <option value="1">crescente</option>
        </select>
    </div>
        <div class="my-5 position-relative">
            <div class="value_display"></div>
            <input wire:change="$refresh" class="range w-100" wire:model="range" type="range" step="12" min="{{$min}}" max="{{$max}}" @if ($selected_filter[1]) value="{{$selected_filter[1]}}" @else value="{{$max}}" @endif id="range">
            <div class="d-flex">
                <div>{{$min}}</div>
                <div class="position-absolute end-0">{{$max}}</div>
            </div>
        </div>
        <input hidden id="remove" wire:model.live="remove" type="number">
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
    <div class="container-fluid mt-3">
        <div class="row justify-content-evenly card_container">
            @foreach ($articles as $article)
            <x-card :article="$article" :images="$images"></x-card>
            @endforeach
        </div>
    </div>
</div>
