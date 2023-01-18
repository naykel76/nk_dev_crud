<div>

    <h1>Data table component with seperate CRUD components</h1>

    <p class="lead">Full-page data table component where CRUD edit and create actions are performed in a seperate components using routes.</p>

    <ul>
        <li>Pages are deleted from within the edit page via the actions toolbar</li>
        <li>Redircts back to resource table after delete</li>
    </ul>

    <hr>

    <div class="flex space-between va-c">

        <x-gt-search-sort-toolbar :searchField="$searchField" :searchOptions="$searchOptions" :paginateOptions="$paginateOptions" />

        <div>
            <a class="btn primary" href="{{ route("$routePrefix.create") }}">
                <x-gt-icon-plus-round class="icon" /> <span>{{ $buttonText ?? 'Add ' . ucfirst(Str::singular(dotLastSegment($routePrefix))) }}</span>
            </a>
        </div>

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

                            <a href="{{ route("$routePrefix.edit", $item->slug) }}" class="ml-05 btn sm blue pxy-025">
                                <x-gt-icon-edit-o class="icon" /></a>

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


</div>
