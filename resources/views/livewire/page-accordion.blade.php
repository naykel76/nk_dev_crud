<div class="bx">

  {{-- <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}" /> --}}

    <div class="bx-header blue3 flex va-c">
        <div class="bx-title mr-2">Accordion Section</div>
        <x-gt-button-create wire:click.prevent="create" withIcon text="Accordion Item" />
    </div>

    {{-- display a list of items --}}
    {{ dd($items) }}
    @forelse($items as $item)

        <div class="flex space-between py-025 my-05 bdr-b">

            <div class="flex">
                <div>{{ $item->item }}</div>
            </div>

            <div class="mxy-0 fs0 pr-1">
                <button wire:click.prevent="edit({{ $item->id }})" class="btn sm success">edit</button>
                <x-gt-button-delete wire:click.prevent="setActionItemId({{ $item->id }})" class="sm"/>
            </div>

        </div>

    @empty

        <p class=" bx warning-light fw-7">There are no items available for this quiz.</p>

    @endforelse

    {{-- create question and answer options --}}
    {{-- <x-gt-modal wire:model="showModal">

        <div class="bx-header">

            <div class="flex space-between">

                <div class="bx-title"> {{ isset($editing->id) ? 'Edit' : 'Create' }}</div>

                <x-gt-icon-cross wire:click.prevent="$toggle('showModal')" icon="close" class="close sm" />

            </div>

        </div>

        <div class="bx-content">

            <form wire:submit.prevent>

                <div class="bx-title">Question</div>

                <x-gt-textarea wire:model.lazy="editing.question" for="editing.question" />

                <hr>

                <div class="my">

                    <div class="bx-title">Answer Options</div>

                    <p>Select a single checkbox to signify the correct answer.</p>

                    @error('answers.*.is_correct')
                        <div class="bx danger">{{ $message }}</div>
                    @enderror

                    @forelse($answers as $index => $answer)

                        <div class="flex gg">

                            <x-gt-checkbox wire:model="answers.{{ $index }}.is_correct" for="answers.{{ $index }}.is_correct" ignoreErrors />

                            <x-gt-input wire:model.lazy="answers.{{ $index }}.answer_text"
                                for="answers.{{ $index }}.answer_text" rowClass="fg1" />
                            <button wire:click.prevent="removeOption({{ $index }})" class="btn sm danger">Remove</button>
                        </div>

                    @empty

                        There are no answer options!

                    @endforelse

                </div>

            </form>
        </div>

        @error('answers')
            <div class="bx danger">
                {{ $message }}
            </div>
        @enderror

        <div class="bx-footer flex space-between">

            <x-gt-button-create wire:click.prevent="addEmptyRow" text="Add Option" />

            <div>
                <button wire:click.prevent="cancel" class="btn">Cancel</button>
                <x-gt-button-save wire:click.prevent="save" text="Save All" />
            </div>

        </div>

    </x-gt-modal> --}}

</div>
