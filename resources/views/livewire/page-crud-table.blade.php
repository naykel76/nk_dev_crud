<div>


    <div class="flex space-between va-c">

        <x-gt-search-sort-toolbar :searchField="$searchField" :searchOptions="$searchOptions" :paginateOptions="$paginateOptions" />

        <x-gt-button-create wire:click.prevent="create" withIcon />

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
                            <x-gt-button-edit wire:click.prevent="edit({{ $item->id }})" class="btn sm pxy-025" iconOnly />
                            <x-gt-button-delete wire:click.prevent="setActionItemId({{ $item->id }})" class="btn sm pxy-025 ml-05" iconOnly />
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

            <x-gt-icon-cross wire:click="$toggle('showModal')" class="close sm" />

        </div>

        <form wire:submit.prevent="save">

            <div class="bx">
                <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title" req inline />
                <hr>
                <x-gt-trix wire:model.lazy="editing.body" for="editing.body" label="Main Body" inline />
            </div>

        </form>

        <div class="tar">
            <button wire:click="save()" class="btn primary">Save</button>
            <button wire:click="cancel()" class="btn">Cancel</button>
        </div>

    </x-gt-modal>

    <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" />

</div>
