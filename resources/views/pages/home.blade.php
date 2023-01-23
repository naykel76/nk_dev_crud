<x-gotime-app-layout layout="{{ config('naykel.template') }}" hasContainer class="py-5-3-2">

    <section class="my-3">

        <div class="bx bdr-blue">

            <livewire:accordion-group />

        </div>

    </section>

    <section class="my-3">

        <div class="bx bdr-blue">

            <h2>Data table component with ajax crud operations</h2>

            <p class="lead">Full-Page data table component where all CRUD actions are performed by ajax request in the modal without leaving the page or using routes.</p>

            <div class="bx danger-light">
                The ckeditor component does not currently work with the single component. I believe this is because the input is not being updated when the modal is called.
            </div>

            <livewire:page-crud-table></livewire:page-crud-table>

        </div>

    </section>

</x-gotime-app-layout>
