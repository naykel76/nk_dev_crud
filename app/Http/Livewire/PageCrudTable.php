<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithDataTable;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Page;
use Naykel\Gotime\Traits\WithCrud;

class PageCrudTable extends Component
{
    use WithPagination, WithDataTable, WithCrud;

    public string $sortField = 'title';
    public string $searchField = 'title';
    public array $searchOptions = ['title' => 'Title'];

    private static $model = Page::class;
    public string $routePrefix = 'pages';
    public string $title = 'Site Pages Table';

    public array $initialData = [];
    public object $editing;

    public string $ckeditor1 = 'this is the value';

    public function rules()
    {
        return [
            'editing.title' => 'required|min:3',
            'editing.body' => 'required'
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankModel($this->initialData);
        // $this->title = ($this->editing->id ? 'Edit ' : 'Create ') . 'Page';
    }

    public function render()
    {
        sleep(1);

        $query = self::$model::search($this->searchField, $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.page-crud-table')->with(['items' => $query])
            ->layout('layouts.app', ['title' => $this->title]);
    }
}
