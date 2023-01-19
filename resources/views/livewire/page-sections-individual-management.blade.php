<div>

    {{--
    add buttons with icons and .. --}}
    {{-- <div class="bx bdr-orange">
        <x-accordion wire:model.defer="items" />
    </div> --}}

    <div class="my">
        <x-gt-button wire:click.prevent="create('textarea')" text="Add Textarea" withIcon="document-o" />
        <x-gt-button wire:click.prevent="create('editor')" text="Add Editor" withIcon="editor-o" />
        <x-gt-button wire:click.prevent="create('accordion')" text="Add Accordion" withIcon="expand-o" />
    </div>

    @foreach($sections as $index => $item)

        <div class="bx">

            @if($editing->id === $item->id)

                <div class="txt-sm my">
                    <code>Editing Type: {{ $editing->type }}</code>
                </div>

                @switch($editing->type)

                    @case('editor')
                        <x-trix wire:model.defer="editing.content" for="editing.content" />
                        @break
                    @case('textarea')
                        <x-gt-textarea wire:model.defer="editing.content" for="editing.content" />
                        @break
                @endswitch

                <x-gt-button-save wire:click.prevent="save" />

            @else

                {!! $item->content !!}

                <div class="tar mt">
                    <button wire:click="edit({{ $item->id }})" class="btn success">Edit</button>
                    <x-gt-button-delete wire:click.prevent="setActionItemId({{ $item->id }})" />
                </div>

            @endif

        </div>

    @endforeach

    <x-gt-modal wire:model="showModal" maxWidth="xl">

        <div class="bx-header flex space-between va-c">

            <div class="bx-title">
                {{ isset($this->editing->id) ? 'Edit' : 'Create' }} Page Section
                {{-- {{ Str::singular(Str::title(dotLastSegment($routePrefix))) }} --}}
            </div>

            <x-gt-icon-cross wire:click="$toggle('showModal')" class="close sm" />

        </div>

        <form wire:submit.prevent="save">

            {{ $this->editing }}

            @switch($editing->type)
                @case('accordion')
                    {{-- <x-trix wire:model.defer="editing.content" for="editing.content" /> --}}

                    <x-gt-button-create wire:click.prevent="create" text="Create" withIcon/>
                    <form>
                        <x-gt-input wire:model.defer="for" for="for" label="Title" />
                        <x-gt-textarea wire:model.defer="for" for="for" label="Body" />
                    </form>


                    @break
                @case('editor')
                    <x-trix wire:model.defer="editing.content" for="editing.content" />
                    @break
                @case('textarea')
                    <x-gt-textarea wire:model.defer="editing.content" for="editing.content" />
                    @break
            @endswitch

            {{-- <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title" req inline /> --}}
            {{-- <x-gt-trix wire:model.lazy="editing.body" for="editing.body" label="Main Body" inline /> --}}

        </form>

        <div class="tar">
            <button wire:click="save()" class="btn primary">Save</button>
            <button wire:click="cancel()" class="btn">Cancel</button>
        </div>

    </x-gt-modal>


    <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" />

</div>
