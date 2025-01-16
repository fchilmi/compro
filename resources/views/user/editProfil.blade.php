<x-layout>
    <x-slot:title>Edit Profil</x-slot:title>
    <x-slot:titles>Edit Profil</x-slot:titles>
    <section class="min-h-full">
        <div class="grid grid-cols-2 gap-8 md:grid-cols-2 lg:grid-cols-2 px-8 py-6">
            <div class="py-8 px-4 h-auto max-w-full lg:py-1 rounded-lg" style="background-color: #2b2b36">
                <form action="{{ route('updateProfil', $profil->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="nama_perusahaan"
                                class="block mb-2 text-sm font-medium text-gray-100 dark:text-white">Nama
                                Perusahaan</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                value="{{ $profil->namaPerusahaan }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="alamatToko"
                                class="block mb-2 text-sm font-medium text-gray-100 dark:text-white">Alamat
                                Toko</label>
                            <input type="text" name="alamatToko" id="alamatToko" value="{{ $profil->alamatToko }}"
                                required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ex. Apple">
                        </div>
                        <div>
                            <label for="alamatGudang"
                                class="block mb-2 text-sm font-medium text-gray-100 dark:text-white">Alamat
                                Gudang</label>
                            <input type="text" value="{{ $profil->alamatGudang }}" name="alamatGudang"
                                id="alamatGudang" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-100 dark:text-white">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="8" required
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $profil->deskripsiPerusahaan }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="submit"class="text-white bg-blue-800 hover:text-gray-700 border border-blue-700 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update Profil
                        </button>
                    </div>
                </form>
            </div>
            <div class="py-8 px-4 h-auto max-w-full lg:py-1 rounded-lg" style="background-color: #2b2b36">
                <form action="{{ route('updateGambar', $profil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="">
                            <label for="gambarPT1"
                                class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Gambar 1</label>
                            @if ($profil->GambarPerusahaan1 == null)
                                <svg class="ml-8 w-[70px] h-[70px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1"
                                        d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            @else
                                <img src="/img/{{ $profil->GambarPerusahaan1 }}" alt="gambar2" width="50%">
                            @endif
                        </div>
                        <div>
                            <input
                                class="block -ml-20 mt-12 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="files1" type="file" name="files1">
                        </div>
                        <div class="">
                            <label for="gambarPT2"
                                class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Gambar 2</label>
                            @if ($profil->GambarPerusahaan2 == null)
                                <svg class="ml-8 w-[70px] h-[70px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1"
                                        d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            @else
                                <img src="/img/{{ $profil->GambarPerusahaan2 }}" alt="gambar2" width="50%">
                            @endif
                        </div>
                        <div>
                            <input
                                class="block -ml-20 mt-12 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="files2" type="file" name="files2">
                        </div>
                        <div class="">
                            <label for="gambarPT3"
                                class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Gambar 3</label>
                            @if ($profil->GambarPerusahaan3 == null)
                                <svg class="ml-8 w-[70px] h-[70px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1"
                                        d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            @else
                                <img src="/img/{{ $profil->GambarPerusahaan3 }}" alt="gambar2" width="50%">
                            @endif
                        </div>
                        <div>
                            <input
                                class="block -ml-20 mt-12 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="files3" type="file" name="files3">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="submit"class="text-white bg-blue-800 hover:text-gray-700 border border-blue-700 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update Gambar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @if (session('sukses'))
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
                title: "{{ session('sukses') }}"
            });
        </script>
    @elseif (session('gagal'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "warning",
                title: "{{ session('gagal') }}"
            });
        </script>
    @endif
</x-layout>
