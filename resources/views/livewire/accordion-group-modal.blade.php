<div>

    <x-gt-modal.save wire:model="showModal" maxWidth="lg">

        <x-slot name="title"> {{ isset($this->editing->id) ? 'Edit' : 'Create' }} Accordion Group</x-slot>

        @error('nestedItems')
            <div class="bx danger">{{ $message }}</div>
        @enderror

        <x-slot name="form">

            <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title (optional)" help-text="Optional H2 title to be display above accordion group" inline />

            <hr>

            @forelse($nestedItems as $index => $item)

                <div class="bx light pxy-1 flex space-between gg">
                    <div class="fg1">
                        <x-gt-input wire:model.defer="nestedItems.{{ $index }}.title" for="nestedItems.{{ $index }}.title" label="Item Title" inline />
                        <x-gt-textarea wire:model.defer="nestedItems.{{ $index }}.body" for="nestedItems.{{ $index }}.body" label="Item Body" inline />
                    </div>
                    <div class="tar"><button wire:click.prevent="removeItem({{ $index }})" class="btn sm danger">Remove</button></div>
                </div>

            @empty

                <div class="tac fw-7 py">There are no accordion items!</div>

            @endforelse

        </x-slot>

        <x-slot name="footer">

            <div class="flex space-between">
                <x-gt-button-create wire:click.prevent="addEmptyRow" withIcon text="Accordion Item" />
                <div>
                    <button wire:click.prevent="save()" class="btn primary">Save</button>
                    <button wire:click.prevent="cancel()" class="btn">Cancel</button>
                </div>
            </div>

        </x-slot>

    </x-gt-modal.save>

</div>
