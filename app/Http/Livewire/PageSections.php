<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Naykel\Gotime\Traits\WithCrud;
use App\Models\PageSection;
use Livewire\Component;

class PageSections extends Component
{
    use WithCrud;

    private static $model = PageSection::class;
    public object $editing;
    public int $pageId;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function rules()
    {
        return [
            'editing.page_id' => 'required',    // for binding
            'editing.type' => 'required',       // for binding
            'editing.title' => 'sometimes|min:3',
            'editing.body' => 'required',
        ];
    }


    public function create($type): void
    {
        $this->editing = self::$model::make([
            'page_id' => $this->pageId,
            'type' => $type
        ]);

        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.page-sections')->with([
            'sections'  => self::$model::wherePageId($this->pageId)->get()
        ]);
    }
}
