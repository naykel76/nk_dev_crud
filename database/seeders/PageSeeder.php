<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::create([
            'id' => '427',
            'title' => 'Sample Page Builder With Sections',
            'type' => 'builder',
            'body' => 'This is the main body!'
        ]);

        $page->sections()->createMany([
            [
                'id' => 800,
                'title' => 'Text Editor',
                'type' => 'editor',
                'body' => 'This is a rich-text editor page-section.',
            ],
            [
                'id' => 900,
                'title' => 'My First Accordion Section',
                'type' => 'accordion',
                'body' => json_encode(
                    [
                        ['title' => 'Accordion Title 1', 'body' => 'Accordion 1 body'],
                        ['title' => 'Accordion Title 2', 'body' => 'Accordion 2 body']
                    ],
                ),
            ],
            [
                'title' => 'My Second Accordion Section',
                'type' => 'accordion',
                'body' => json_encode(
                    [
                        ['title' => 'Accordion Title 3', 'body' => 'Accordion 3 body'],
                        ['title' => 'Accordion Title 4', 'body' => 'Accordion 4 body'],
                    ],
                ),
            ],
            [
                'title' => 'Editor Section',
                'type' => 'textarea',
                'body' => 'This is a rich text editor page-section.',
            ]
        ]);

        /**
         *
         */
        $page = Page::create([
            'title' => 'Another Sample Page Builder With Sections',
            'type' => 'builder',
            'body' => 'This is the main body!'
        ]);

        $page->sections()->createMany([
            [
                'type' => 'editor',
                'body' => 'This is the body for section one.',
            ],
            [
                'type' => 'accordion',
                'body' => 'This is the body for section two.',
            ]
        ]);

        $page = Page::create([
            'title' => 'Sample Page Builder Without Sections',
            'body' => 'This is the body!',
            'type' => 'builder',
        ]);

        $page = Page::create([
            'title' => 'Normal Page',
            'body' => '<div>This is the body for section.</div>',
            'type' => 'simple',
        ]);
    }
}
