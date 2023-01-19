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
                'content' => 'This is a rich-text editor page-section.',
            ],
            [
                'id' => 900,
                'title' => 'Accordion Section',
                'type' => 'accordion',
                'content' => json_encode(
                    [
                        ['title' => 'Accordion Title 1', 'body' => 'This is the accordion body'],
                        ['title' => 'Accordion Title 2', 'body' => 'This is the accordion body']
                    ],
                ),
            ],
            [
                'title' => 'Editor Section',
                'type' => 'textarea',
                'content' => 'This is a rich text editor page-section.',
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
                'content' => 'This is a content section one.',
            ],
            [
                'type' => 'accordion',
                'content' => 'This is a content section two.',
            ]
        ]);

        $page = Page::create([
            'title' => 'Sample Page Builder Without Sections',
            'body' => 'This is the body!',
            'type' => 'builder',
        ]);

        $page = Page::create([
            'title' => 'Normal Page',
            'body' => '<div>This is a content section.</div>',
            'type' => 'simple',
        ]);
    }
}
