<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithCrud;
use App\Models\PageSection;
use Livewire\Component;

class AccordionGroupModal extends Component
{
    use WithCrud;

    public array $initialData = ['sort_order' => '0', 'type' => 'accordion'];
    private static $model = PageSection::class;
    public object $editing;

    protected $listeners = ['edit', 'create'];

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
        // on successful validation, set the editing->body equal to the nested
        // items array (accordion 'items')
        $this->editing->body = json_encode($this->nestedItems);
    }

    public function create($pageId): void
    {
        $this->initialData['page_id'] = $pageId;
        $this->addEmptyRow();
        $this->editing = $this->makeBlankModel();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->editing = self::$model::findOrFail($id);
        $this->nestedItems = json_decode($this->editing->body);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.accordion-group-modal');
    }
}
