<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Naykel\Gotime\Traits\WithCrud;
use App\Models\PageSection;
use Livewire\Component;

class PageSections extends Component
{
    use WithCrud;

    public array $initialData = ['type' => 'builder', 'page_id' => null];
    private static $model = PageSection::class;
    public object $editing;
    public int $pageId;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function rules()
    {
        return [
            'editing.page_id' => 'required', // for binding
            'editing.title' => 'required|min:3',
            'editing.body' => 'required',
            'editing.type' => 'required', // set in initial data
        ];
    }

    public function mount()
    {
        $this->initialData['page_id'] = $this->pageId;
        $this->initialData['type'] = 'textarea';
    }

    public function render()
    {
        return view('livewire.page-sections')->with([
            'sections'  => self::$model::wherePageId($this->pageId)->get()
        ]);
    }
}
