<?php

namespace App\Http\Livewire;

use App\Models\PageSection;
use Livewire\Component;
use Naykel\Gotime\Traits\WithCrud;

class PageSectionsIndividualManagement extends Component
{
    use WithCrud;

    private static $model = PageSection::class;
    public array $initialData = ['sort_order' => '0'];

    /**
     * Primary page model to create/edit on save
     */
    public object $editing;

    /**
     * Page sections to display (state)
     */
    public $sections = [];

    public $items = [
        ['title' => 'Accordion Title 1', 'body' => 'This is the accordion body'],
        ['title' => 'Accordion Title 2', 'body' => 'This is the accordion body']
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function rules()
    {
        return [
            'editing.content' => 'required',
        ];
    }

    public function mount()
    {
        $this->sections = PageSection::all();
        $this->editing = $this->makeBlankModel();
    }

    public function create(string $type): void
    {
        $this->editing = PageSection::make(['type' => $type]);
        $this->showModal = true;
    }

    public function afterPersistHook()
    {
        $this->editing = $this->makeBlankModel();
    }

    public function render()
    {
        return view('livewire.page-sections-individual-management');
    }
}
