<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use Naykel\Gotime\Traits\WithCrud;

class PageCreateEdit extends Component
{
    use WithCrud;

    private static $model = Page::class;
    public string $routePrefix = 'admin.pages';
    public string $title;
    public array $initialData = ['type' => 'simple'];

    public object $editing;

    // protected $listeners = ['refreshComponent' => '$refresh'];

    public function rules()
    {
        return [
            'editing.title' => 'required|min:3',
            'editing.body' => 'required',
            'editing.type' => 'required', // set in initial data
        ];
    }

    public function mount(Page $page)
    {
        // if there is a page id, then set editing to the existing record
        $this->editing = $page->id ? $page : $this->makeBlankModel();
        $this->title = $this->setTitle();
    }

    public function render()
    {
        return view('livewire.page-create-edit')
            ->layout('layouts.app', ['title' => $this->title]);
    }
}
