<div>

    <h1>{{ $title }}</h1>

    <x-gt-actions-toolbar :$routePrefix :$editing />

    <form wire:submit.prevent="save">
        <div class="bx">
            <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title" req inline />
        </div>
    </form>

    <hr>

    @if(isset($editing->id))
        <livewire:page-sections :pageId="$editing->id" />
    @else
        <div class="my tac fw-7">
            You need to save the main page before you can create page sections
        </div>
    @endif

    <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" withRedirect />

</div>
