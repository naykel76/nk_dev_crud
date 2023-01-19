<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Naykel\Gotime\Traits\WithCrud;

class PageAccordion extends Component
{
    use WithCrud;

    private static $model = PageSection::class;
    public array $initialData = ['sort_order' => '0', 'type' => 'accordion'];

    /**
     * Primary page model to create/edit on save
     */
    public object $editing;

    /**
     *
     */
    public array $items = []; // answers options

    public $x = [
        ['title' => 'Accordion Title 1', 'body' => 'This is the accordion body'],
        ['title' => 'Accordion Title 2', 'body' => 'This is the accordion body']
    ];

    protected $rules = [
        'items' => 'required',
        'items.*.title' => 'required',
        'items.*.body' => 'required',
    ];


    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.page-accordion')->with([
            'accordionItems' => collect($this->items),
        ]);
    }
}
