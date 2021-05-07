<div>
    <div wire:loading>
        <div style="position: fixed; top: 0; width: 100%; height: 100%; background-color: black; left: 0; right: 0; bottom: 0; opacity: 0.5;"></div>
    </div>
    <textarea wire:model.lazy="item.name" cols="20" rows="5"></textarea>
    <div class="comp-div">
        <label for="completed">Completed : </label>
        <input type="checkbox" id="completed" wire:model="itemCompleted">
    </div>
</div>
