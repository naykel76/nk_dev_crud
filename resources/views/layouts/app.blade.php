@props(['hasContainer' => true, 'title' => null])

<x-gotime-layouts.base :$title>

    @if(class_exists(\Naykel\Authit\Http\Controllers\UserController::class))
        <x-gotime::top-toolbar />
    @endif

    @includeFirst(['layouts.partials.navbar', 'gotime::layouts.partials.navbar'])

    @isset($top)
    {{ $top }}
    @endisset

    <main id="nk-main" class="py-5-3-2">

        @if($hasContainer) <div class="container"> @endif

            {{ $slot }}

        @if($hasContainer) </div> @endif

    </main>

    @isset($bottom)
        {{ $bottom }}
    @endisset

    @includeFirst(['layouts.partials.footer', 'gotime::layouts.partials.footer'])

</x-gotime-layouts.base>


