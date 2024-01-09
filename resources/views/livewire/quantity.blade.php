<div>
    <form wire:submit.prevent = "update">
        <input type="text" wire:model="quantity" class="quantity_input" hidden>
        <button type="submit" class="submit" hidden></button>
    </form>
    <form wire:submit.prevent = "remove">
        <button type="submit" class="remove_submit" hidden></button>
    </form>
</div>
