<div>

    <div class="my">
        <x-gt-button wire:click.prevent="create('textarea')" text="Textarea" withIcon="align-left" />
        <x-gt-button wire:click.prevent="$emitTo('accordion-group-modal', 'create', {{ $pageId }})" text="Accordion" withIcon="expand-o" />
        <x-gt-button wire:click.prevent="$emitTo('simple-editor-modal', 'create', {{ $pageId }})" text="Simple Text Editor" withIcon="editor-o" />
    </div>

    <div class="space-y-05">

        @forelse($sections as $index => $item)

            <div class="bx pxy-05">

                <div class="flex space-between">

                    <div>
                        <h4>{{ $item->title }}</h4>
                        <small class="txt-muted">Section Type: {{ $item->type }}</small>
                    </div>

                    <div>

                        @if($item->type === 'accordion')
                            <x-gt-button-edit wire:click.prevent="$emitTo('accordion-group-modal', 'edit', {{ $item->id }})" iconOnly class="btn sm pxy-025" />
                        @elseif($item->type === 'simple-editor')
                            <x-gt-button-edit wire:click.prevent="$emitTo('simple-editor-modal', 'edit', {{ $item->id }})" iconOnly class="btn sm pxy-025" />
                        @else
                            <x-gt-button-edit wire:click.prevent="edit({{ $item->id }})" iconOnly class="btn sm pxy-025" />
                        @endif

                        <x-gt-button-delete wire:click.prevent="setActionItemId({{ $item->id }})" class="btn sm pxy-025 " iconOnly />
                    </div>

                </div>

                <div class="mt-1">{{ $item->body }}</div>

            </div>

        @empty

            <strong>There are no page sections! Please add one by selecting one of the buttons at the top.</strong>

        @endforelse

    </div>

    <h2>Preview</h2>

    @foreach($sections as $index => $item)

        <div class="bx hover:bg">

            @if($item->type === 'accordion')
                <x-gt-accordion :data="$item->body" />
            @elseif($item->type === 'simple-editor')
                {!! $item->body !!}
            @else
                something else?
            @endif


        </div>
    @endforeach


    {{-- these components are listenting for create and edit events --}}
    <livewire:accordion-group-modal />
    <livewire:simple-editor-modal />

    <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" />

    <x-gt-modal.save wire:model="showModal" maxWidth="lg">

        <x-slot name="title"> {{ isset($this->editing->id) ? 'Edit' : 'Create' }} Page Section</x-slot>

        <x-slot name="form">
            <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title" />
            <x-gt-textarea wire:model.defer="editing.body" for="editing.body" label="Body" />
        </x-slot>

    </x-gt-modal.save>

</div>


@push('styles')

    <style>
        .hover\:bg:hover {
            background-color: rgb(250, 250, 250);
        }

    </style>
@endpush
