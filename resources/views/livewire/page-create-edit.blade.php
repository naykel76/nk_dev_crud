<div>

    <h1>{{ $title }}</h1>

    <x-gt-actions-toolbar :$routePrefix :$editing />

    <form wire:submit.prevent="save">

        <div class="bx">
            <x-gt-input wire:model.defer="editing.title" for="editing.title" label="Title" req inline />
            <hr>
            <x-gt-ckeditor wire:model.lazy="editing.body" for="editing.body" label="Main Body" inline />
        </div>

    </form>

    <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" withRedirect/>

</div>
