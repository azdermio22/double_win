<div>
    <form wire:submit.prevent="add_to_cart">
        <input type="number" value="{{$id}}" wire:model="article" hidden>
        <button class="cart_button" type="submit"><div class="cart_icon"><i class="bi bi-cart-plus"></i></div></button>
    </form>
</div>
