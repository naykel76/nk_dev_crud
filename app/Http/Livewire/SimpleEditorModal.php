<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithCrud;
use App\Models\PageSection;
use Livewire\Component;

class SimpleEditorModal extends Component
{
    use WithCrud;

    public array $initialData = ['sort_order' => '0', 'type' => 'simple-editor'];
    private static $model = PageSection::class;
    public object $editing;

    protected $listeners = ['edit', 'create'];

    protected $rules = [
        'editing.page_id' => 'required',    // for binding
        'editing.type' => 'required',       // for binding
        'editing.body' => 'required',
    ];

    public function mount()
    {
        $this->editing = $this->makeBlankModel();
    }

    public function create($pageId): void
    {
        $this->initialData['page_id'] = $pageId;
        $this->editing = $this->makeBlankModel();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->editing = self::$model::findOrFail($id);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.simple-editor-modal');
    }
}
