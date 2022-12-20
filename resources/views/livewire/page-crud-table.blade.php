<div>

    <h1>Single component with data table, and crud modal</h1>

    <div class="bx danger-light">
        The ckeditor component does not currently work with the single component. I believe this is because the input is not being updated when the modal is called.
    </div>

    <div class="flex space-between va-c">

        <x-gt-search-sort-toolbar :searchField="$searchField" :searchOptions="$searchOptions" :paginateOptions="$paginateOptions" />

        <button wire:click="create" class="btn primary">
            <x-gt-icon-plus-round-o class="mr-05" /> New</button>

    </div>

    <table class="w-full">

        <thead>
            <x-gt-table.th sortable wire:click="sortField('title')" :direction="$sortField === 'title' ? $sortDirection : null" class="w-full">Title</x-gt-table.th>
            <th></th>
        </thead>

        <tbody wire:loading.class="txt-muted">

            @forelse($items as $item)

                <tr>
                    <td class="w-full">{{ $item->title }}</td>
                    <td>
                        <div class="flex">
                            <x-gt-button-delete wire:click.prevent="setConfirmAction({{ $item->id }})" class="btn sm pxy-025" iconOnly />
                            <x-gt-button-edit wire:click.prevent="edit({{ $item->id }})" class="ml-05 btn sm pxy-025" iconOnly />
                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td class="tac pxy txt-lg" colspan="6">No records found...</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    {{ $items->links('gotime::pagination.livewire') }}

    <x-gt-modal wire:model="showModal" maxWidth="xl">

        <div class="bx-header flex space-between va-c">
            <div class="bx-title">
                {{ isset($this->editing->id) ? 'Edit' : 'Create' }}
                {{ Str::singular(Str::title(dotLastSegment($routePrefix))) }}
            </div>
            <x-gotime-icon wire:click="$toggle('showModal')" icon="close" class="close sm" />
        </div>

        <form wire:submit.prevent="save">

            <div class="bx">
                <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title" req inline />
                <hr>
                <x-gt-trix wire:model.lazy="editing.body" for="editing.body" label="Main Body" inline />
                {{-- <x-gt-ckeditor wire:model.lazy="editing.body" for="editing.body" label="Main Body" inline /> --}}
            </div>

        </form>

        <div class="m tar">
            <button wire:click="save()" class="btn primary">Save</button>
            <button wire:click="cancel()" class="btn">Cancel</button>
        </div>

    </x-gt-modal>

    <x-gt-modal.confirmation wire:model="confirmingActionId">

        <x-slot name="title">
            Delete Item
        </x-slot>

        <p> Are you sure you want to delete this item? </p>

        <x-slot name="footer">
            <button wire:click.prevent="$set('confirmingActionId', false)"
                wire:loading.attr="disabled" class="btn">Nevermind </button>
            <button wire:click.prevent="delete({{ $confirmingActionId }})"
                class="btn danger">Delete</button>
        </x-slot>

    </x-gt-modal.confirmation>

</div>
