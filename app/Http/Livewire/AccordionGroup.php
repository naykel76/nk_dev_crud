<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithCrud;
use App\Models\PageSection;
use Livewire\Component;

class AccordionGroup extends Component
{
    use WithCrud;

    public array $initialData = ['sort_order' => '0', 'type' => 'accordion', 'page_id' => '427'];
    private static $model = PageSection::class;
    public object $editing;

    protected $rules = [
        'editing.page_id' => 'required',    // for binding
        'editing.type' => 'required',       // for binding
        'editing.title' => 'sometimes',
        'nestedItems' => 'required',
        'nestedItems.*.title' => 'required',
        'nestedItems.*.body' => 'required',
    ];

    protected $messages = [
        'nestedItems' => 'The accordion group must have at least one item.',
        'nestedItems.*.title' => 'The accordion title is required.',
        'nestedItems.*.body' => 'The accordion body is required.',
    ];

    public function mount()
    {
        $this->editing = $this->makeBlankModel();
    }

    protected function beforePersistHook()
    {
        // on successful validation, update the editing object to set the
        // accordion body equal to the nested items array
        $this->editing->body = json_encode($this->nestedItems);
    }

    public function render()
    {
        return view('livewire.accordion-group');
    }
}
