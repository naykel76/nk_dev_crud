<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithCrud;
use App\Models\PageSection;
use Livewire\Component;

class AccordionGroupCreateEdit extends Component
{
    use WithCrud;

    public array $initialData = ['sort_order' => '0', 'type' => 'accordion'];
    private static $model = PageSection::class;
    public object $editing;

    protected $rules = [
        'editing.title' => 'sometimes',
        // 'editing.body' => 'required',
        'nestedItems' => 'required',
        'nestedItems.*.title' => 'required',
        'nestedItems.*.body' => 'required',
        // must have at leat 1
    ];

    protected $messages = [
        'nestedItems' => 'The accordion group must have at least one item.',
        'nestedItems.*.title' => 'The accordion title is required.',
        'nestedItems.*.body' => 'The accordion body is required.',
    ];

    public function mount()
    {
        $this->editing = self::$model::find(900);
        $this->nestedItems = json_decode($this->editing->body);
    }

    protected function beforePersistHook()
    {
        // on successful validation, update the editing object to set the
        // accordion body equal to the nested items array
        $this->editing->body = json_encode($this->nestedItems);
    }


    public function render()
    {
        return view('livewire.accordion-group-create-edit');
    }
}
