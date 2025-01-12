<x-layout>
    <x-slot:title>Edit Produk</x-slot:title>
    <x-slot:titles>Edit Produk</x-slot:titles>
    <section class="min-h-full">
        <div class="grid grif-cols-1 gap-8 md:grid-cols-1 lg:grid-cols-1 px-8 py-6">
            <div class="py-8 px-4  h-auto max-w-full lg:py-1 rounded-lg" style="background-color: #2b2b36">
                <h1 class="text-2xl font-semibold -tracking-tighter text-gray-200">Deskripsi Produk</h1>
                <hr class="border-gray-400 mt-2 mb-6" />
                <form action="{{ route('produkUpdate', $hasilProduk->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 lg:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Nama
                                Produk</label>
                            <input type="text" name="produkName" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Type product name" required="" value="{{ $hasilProduk->namaProduk }}">
                        </div>

                        <div>
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Harga</label>
                            <input type="number" name="produkPrice" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="" value="{{ $hasilProduk->hargaProduk }}">
                        </div>
                        <div>
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Kategori</label>
                            <select id="category" name="produkKategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{ $hasilProduk->category->id }}">
                                    {{ $hasilProduk->category->name }}
                                </option>
                                <option value="1">Filter Kolam</option>
                                <option value="2">Filter Tanki</option>
                                <option value="3">Filter Cooling</option>
                                <option value="4">Spare Part</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Deskripsi</label>
                            <textarea id="description" name="produkDeskripsi" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="tulis produk deskripsi disini">{{ $hasilProduk->deskripsiProduk }}</textarea>
                        </div>

                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update Deskripsi Produk
                        </button>
                    </div>
                </form>
            </div>

            {{-- UPDATE GAMBAR --}}
            <div class="py-8 px-4 h-auto max-w-full lg:py-1 rounded-lg" style="background-color: #2b2b36">
                <h1 class="text-2xl font-semibold -tracking-tighter text-gray-200">Gambar Produk</h1>
                <hr class="border-gray-400 mt-2 mb-6" />
                <form action="{{ route('produkUpdateGambar', $hasilProduk->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-3">
                        @if ($file == 1)
                            @foreach ($hasilGambar as $hg)
                                <div class="w-full h-56">
                                    <img src="/uploads/{{ $hg->namaGambar }}" alt=""
                                        class="mx-auto h-full bg-transparent">
                                </div>
                            @endforeach
                            <div class="flex justify-center items-center">
                                <img width="100" height="100"
                                    src="https://img.icons8.com/ios-filled/100/no-image.png" alt="no-image" />
                            </div>
                            <div class="flex justify-center items-center">
                                <img width="100" height="100"
                                    src="https://img.icons8.com/ios-filled/100/no-image.png" alt="no-image" />
                            </div>
                        @elseif ($file == 2)
                            @foreach ($hasilGambar as $hg)
                                <div class="w-full h-56 bg-gray-50">
                                    <img src="/uploads/{{ $hg->namaGambar }}" alt=""
                                        class="mx-auto h-full bg-transparent">
                                </div>
                            @endforeach
                            <div class="flex  justify-center items-center">
                                <img width="100" height="100"
                                    src="https://img.icons8.com/ios-filled/100/no-image.png" alt="no-image" />
                            </div>
                        @else
                            @foreach ($hasilGambar as $hg)
                                <div class="w-full h-56 bg-gray-50">
                                    <img src="/uploads/{{ $hg->namaGambar }}" alt=""
                                        class="mx-auto h-full bg-transparent">
                                </div>
                            @endforeach
                        @endif
                        <div class="flex justify-center items-center">
                            <input
                                class="block mt-12 w-70 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="files1" type="file" name="produkImg1">
                        </div>
                        <div class="flex justify-center items-center">
                            <input
                                class="block mt-12 w-70 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="files2" type="file" name="produkImg2">
                        </div>
                        <div class="flex justify-center items-center">
                            <input
                                class="block mt-12 w-70 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="files3" type="file" name="produkImg3">
                        </div>
                    </div>
                    <div class="flex justify-end mt-12 mr-20">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">
                            Update Gambar Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Berhasil",
                    text: "{{ session('success') }}",
                    icon: "success",
                    type: "success",
                    timer: 3000,
                });
            </script>
        @endif
    </section>
</x-layout>
