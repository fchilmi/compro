<x-layout>
    <x-slot:title>Data Produk </x-slot:title>
    <x-slot:titles>Data Produk</x-slot:titles>
    <section class="text-white">
        <div class="mx-auto max-w-7xl px-8 py-6 sm:px-6 lg:px-8">

            <!--Card-->
            <div id='recipients' class="p-8 mt-1 lg:mt-0 rounded-3xl bg-black bg-opacity-40">
                <div class="mb-4">
                    <button id="defaultModalButton" data-modal-target="ModalAddProduk" data-modal-toggle="ModalAddProduk"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Tambah produk
                    </button>
                </div>
                <div id="ModalAddProduk" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <!-- Modal header -->
                            <div
                                class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Produk
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="ModalAddProduk">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('produkAdd') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                    <div class="sm:col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Produk</label>
                                        <input type="text" name="produkName" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Type product name" required="">
                                    </div>

                                    <div>
                                        <label for="price"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                        <input type="number" name="produkPrice" id="price"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="120000" required="">
                                    </div>
                                    <div>
                                        <label for="category"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kategori</label>
                                        <select id="category" name="produkKategori"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected="">Select kategori</option>
                                            <option value="1">Filter Kolam</option>
                                            <option value="2">Filter Tanki</option>
                                            <option value="3">Filter Cooling</option>
                                            <option value="4">Spare Part</option>
                                        </select>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="multiple_files">Upload Gambar</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="multiple_files" type="file" multiple name="produkImg[]">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                        <textarea id="description" name="produkDeskripsi" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="tulis produk deskripsi disini"></textarea>
                                    </div>

                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Add new product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead class="text-md text-gray-200 uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th data-priority="1">Nama Produk</th>
                            <th data-priority="2">Harga Produk</th>
                            <th data-priority="3">Kategori</th>
                            <th data-priority="4">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $p)
                            <tr>
                                <td>{{ $p->namaProduk }}</td>
                                <td>{{ $p->hargaProduk }}</td>
                                <td>{{ Str::of($p->deskripsiProduk)->limit(50) }}</td>
                                <td>
                                    <form action="{{ route('produkDestroy', $p->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('produksEdit', $p->id) }}" type="button"
                                            class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Edit
                                        </a>
                                        <button type="submit"
                                            class=" ml-2 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->


                    </tbody>

                </table>


            </div>
            <!--/Card-->


        </div>
    </section>
    @if (session('produk'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('produk') }}"
            });
        </script>
    @endif
</x-layout>
