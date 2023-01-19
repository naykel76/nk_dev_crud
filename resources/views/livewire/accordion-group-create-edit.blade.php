<div>

    {{-- <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" /> --}}

    <div class="bx-header blue3 flex space-between va-c">
        <div class="bx-title mr-2">Accordion Group</div>
        <div>
            <x-gt-button-save wire:click.prevent="save" withIcon />
            <x-gt-button-create wire:click.prevent="addEmptyRow" withIcon text="Accordion Item" />
        </div>
    </div>

    @error('nestedItems')
        <div class="bx danger">{{ $message }}</div>
    @enderror

    <form wire:submit.prevent>

        <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title (optional)" />

        @forelse($nestedItems as $index => $item)

            <div class="bx light">
                <x-gt-input wire:model.defer="nestedItems.{{ $index }}.title" for="nestedItems.{{ $index }}.title" label="Item Title" inline />
                <x-gt-textarea wire:model.defer="nestedItems.{{ $index }}.body" for="nestedItems.{{ $index }}.body" label="Item Body" inline />
                <div class="tar"><button wire:click.prevent="removeItem({{ $index }})" class="btn sm danger">Remove</button></div>
            </div>
        @empty

            There are no accordion items!

        @endforelse

    </form>


</div>
