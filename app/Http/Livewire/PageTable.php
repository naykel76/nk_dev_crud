<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithDataTable;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Page;

class PageTable extends Component
{
    use WithPagination, WithDataTable;

    public string $sortField = 'title';
    public string $searchField = 'title';
    public array $searchOptions = ['title' => 'Title'];

    private static $model = Page::class;
    public string $routePrefix = 'admin.pages';
    public string $title = 'Site Pages Table';

    public function render()
    {
        sleep(1);

        $query = self::$model::search($this->searchField, $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.page-table')->with(['items' => $query])
            ->layout('layouts.app', ['title' => $this->title]);
    }
}
