<div>

    <x-gt-modal.save wire:model="showModal" maxWidth="lg">

        <x-slot name="title"> {{ isset($this->editing->id) ? 'Edit' : 'Create' }} Simple Text Editor Section</x-slot>

        <x-slot name="form">
            <x-gt-trix wire:model.lazy="editing.body" for="editing.body" />
        </x-slot>

    </x-gt-modal.save>

</div>
