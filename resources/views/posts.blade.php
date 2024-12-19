<x-layout>
    <x-slot:title>ayo</x-slot:title>
    <x-slot:titles>ayo</x-slot:titles>

    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">

        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">

            <table class="my-4 w-full text-sm text-left text-gray-500 dark:text-gray-400" id="serverside">
                <thead class="text-md text-gray-200 uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th data-priority="1" scope="col" class="px-4 py-3">Nama</th>
                        <th data-priority="2" scope="col" class="px-4 py-3">Harga</th>
                        <th data-priority="3" scope="col" class="px-4 py-3">Deskripsi</th>
                        <th data-priority="4" scope="col" class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>


</x-layout>
<script>
    $(document).ready(function() {
        loadData();
    });

    function loadData() {
        $('#serverside').DataTable({
            processing: true,
            pagination: true,
            responsive: true,
            serverSide: true,
            ajax: "{{ route('postss') }}",
            columns: [{
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });
    }
</script>
