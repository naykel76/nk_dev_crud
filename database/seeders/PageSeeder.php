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
                'id' => 900,
                'title' => 'Text Editor',
                'type' => 'editor',
                'content' => 'This is a content section one.',
            ],
            [
                'title' => 'Accordion Section',
                'type' => 'accordion',
                'content' => 'This is a content section two.',
            ],
            [
                'title' => 'Editor Section',
                'type' => 'textarea',
                'content' => 'This is a content section three.',
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


        // Page::create([
        //     'title' => 'FAQ Page Layout',
        //     'type' => 'faq',
        // ])->faqs()->createMany([
        //     [
        //         'question' => 'How do I navigate the course?',
        //         'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, ea.'
        //     ],
        //     [
        //         'question' => 'Who much time do I have to complete the course?',
        //         'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, ea.'
        //     ]
        // ]);

        // Page::create([
        //     'title' => 'Sample Page 2',
        // ])->faqs()->createMany([
        //     [
        //         'question' => 'How do I navigate the course?',
        //         'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, ea.'
        //     ],
        //     [
        //         'question' => 'Who much time do I have to complete the course?',
        //         'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, ea.'
        //     ]
        // ]);
    }
}
