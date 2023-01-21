<div>

    <div class="my">
        <button wire:click="create" class="btn flex-col ha-c tac pxy-1">
            <x-gt-icon-align-left class="mb-05" />Textarea</button>
    </div>

    <x-gotime-errors />

    <div class="space-y-05">

        @forelse($sections as $index => $item)

            <div class="bx pxy-05">
                <div class="flex space-between">
                    <h4>{{ $item->title }}</h4>
                    <div>
                        <x-gt-button-edit wire:click.prevent="edit({{ $item->id }})" iconOnly class="btn sm pxy-025" />

                        <x-gt-button-delete wire:click.prevent="setActionItemId({{ $item->id }})" class="btn sm pxy-025 " iconOnly />
                    </div>
                </div>
                <div class="mt-1">{{ $item->body }}</div>
            </div>

        @empty

            <strong>There are no page sections! Please add one by selecting one of the buttons at the top.</strong>

        @endforelse

    </div>

    <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" />

    <x-gt-modal wire:model="showModal" maxWidth="xl">

        <div class="bx-header flex space-between va-c">

            <div class="bx-title">
                {{ isset($this->editing->id) ? 'Edit' : 'Create' }} Page Section
            </div>

            <x-gt-icon-cross wire:click="$toggle('showModal')" class="close sm" />

        </div>

        <form wire:submit.prevent="save">

            <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title" />
            <x-gt-textarea wire:model.defer="editing.body" for="editing.body" label="Body" />

        </form>

        <div class="tar">
            <button wire:click.prevent="save()" class="btn primary">Save</button>
            <button wire:click.prevent="cancel()" class="btn">Cancel</button>
        </div>

    </x-gt-modal>

</div>

@once
    @push('head')
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    @endpush
    @push('scripts')
        <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    @endpush
@endonce
