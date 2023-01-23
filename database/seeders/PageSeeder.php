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
                'title' => 'Simple Editor (Trix)',
                'type' => 'simple-editor',
                'body' => '<p class="lead">This is the lead paragraph. The text is slightly larger and bolder than the rest of your body text. The lead paragraph should clearly and concisely describe what the user will expect from the page contents.</p><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa id ab atque officiis illum eius! Ab illo aut tempore eos quo placeat, obcaecati odit in autem modi officiis quidem.</p> <p class="fw-7">Without a clear visual hierarchy, all the content on the page seems equally important, making it overwhelming.</p> <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi accusantium consequuntur minima quas, sit accusamus, dolorum esse impedit incidunt est voluptatem quis sed, aliquam placeat dicta! Incidunt assumenda accusantium dolor laborum eligendi reprehenderit eum nobis nemo quis sint voluptates delectus explicabo dicta, enim id neque. Assumenda omnis odio doloribus obcaecati!</p> <h2>Heading 2 - Subtitle</h2> <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et iusto ipsa amet eius provident dolorem natus rerum excepturi at numquam tempora aliquid accusamus, quibusdam porro sapiente esse enim. Labore cumque fuga, aspernatur, nesciunt id distinctio tenetur harum, hic aliquam sit corrupti mollitia officia? Incidunt distinctio molestiae unde cupiditate mollitia sequi dignissimos, aut sed? Consequuntur iste sunt maiores eum quam esse similique consectetur ipsa dolorum ipsum enim voluptas perspiciatis, voluptates a iure quas asperiores animi impedit alias deleniti repellat praesentium. Non!</p>',
            ],
            [
                'id' => 900,
                'title' => 'My First Accordion Section',
                'type' => 'accordion',
                'body' => json_encode(
                    [
                        [
                            'title' => 'What do I do if I haven\'t received an email to confirm my email address?',
                            'body' => 'Check your spam or junk folder, if the confirmation email is not there, you can <a href=\'/contact-us\'>contact us</a> via the online form.'
                        ],
                        ['title' => 'How do I register for an account?', 'body' => 'Accordion 2 body']
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
        // $page = Page::create([
        //     'id' => '427',
        //     'title' => 'Sample Page Builder With Sections',
        //     'type' => 'builder',
        //     'body' => 'This is the main body!'
        // ]);

        // $page->sections()->createMany([
        //     [
        //         'id' => 800,
        //         'title' => 'Simple Editor (Trix)',
        //         'type' => 'simple-editor',
        //         'body' => 'This is a rich-text editor page-section.',
        //     ],
        //     [
        //         'id' => 900,
        //         'title' => 'My First Accordion Section',
        //         'type' => 'accordion',
        //         'body' => json_encode(
        //             [
        //                 ['title' => 'Accordion Title 1', 'body' => 'Accordion 1 body'],
        //                 ['title' => 'Accordion Title 2', 'body' => 'Accordion 2 body']
        //             ],
        //         ),
        //     ],
        //     [
        //         'title' => 'My Second Accordion Section',
        //         'type' => 'accordion',
        //         'body' => json_encode(
        //             [
        //                 ['title' => 'Accordion Title 3', 'body' => 'Accordion 3 body'],
        //                 ['title' => 'Accordion Title 4', 'body' => 'Accordion 4 body'],
        //             ],
        //         ),
        //     ],
        //     [
        //         'title' => 'Editor Section',
        //         'type' => 'textarea',
        //         'body' => 'This is a rich text editor page-section.',
        //     ]
        // ]);

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
