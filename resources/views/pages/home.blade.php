<x-gotime-app-layout layout="{{ config('naykel.template') }}" hasContainer class="py-5-3-2">


    <section class="my-3">

        <div class="bx bdr-blue">

            <h2>Page sections with individual section management</h2>

            <p class="lead">This component loads <span class="txt-underline">all</span> page-sections from the database. Each section is managed individually with it's own edit, delete, save and cancel buttons.</p>

            <ul>
                <li>When the edit button is clicked, the <code>$editing</code> item is set to the selected item and the form controls will appear with save and cancel buttons.</li>
                <li>On save, the database will be updated and component is reset to the default state.</li>
                <li>CRUD actions are performed via ajax requests so they are immediate and final</li>
            </ul>

            <livewire:page-sections-individual-management />

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
