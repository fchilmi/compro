<x-layout>
    <x-slot:titles>Profil Perusahaan</x-slot:titles>

    <div class="min-h-full">
        <div class="py-12 antialiased dark:bg-gray-900 md:py-12 sm:px-8">
            <div class="mx-auto max-w-screen-xl 2xl:px-0 bg-gray-700 shadow-2xl rounded-xl">
                <img class="w-full rounded-t-xl" src="/img/{{ $profil->GambarPerusahaan1 }}" alt="" />
                <div class="mb-6 max-w-full space-y-6 md:mb-12 px-12 lg:mx-auto text-lg">
                    <p class="font-normal text-gray-200 dark:text-gray-400 text-justify pt-10">
                        <b>{{ $profil->namaPerusahaan }}</b><br>
                        Alamat Toko bisa dikunjungi di {{ $profil->alamatToko }} <br>
                        Alamat Gudang bisa dikunjungi di {{ $profil->alamatGudang }} <br><br>
                    </p>

                    <p class="font-normal text-gray-200 dark:text-gray-400 text-justify pb-10">
                        {!! nl2br(e($profil->deskripsiPerusahaan)) !!}
                    </p>
                </div>
            </div>
            <div class="mx-auto max-w-screen-xl 2xl:px-0 bg-gray-100 shadow-2xl rounded-xl -mt-12">
                <div class="mb-6 max-w-full space-y-2 py-8 md:mb-12 px-12 lg:mx-auto text-lg">
                    <p class="font-normal text-gray-800 dark:text-gray-400 text-justify">
                        <b>Visi</b><br>
                        Menjadi perusahaan produksi filler
                        cooling tower nasional berkelas dunia
                        terpercaya dan terkemuka.
                    </p>
                    <p class="font-normal text-gray-800 dark:text-gray-400 text-justify">
                        <b>Misi</b>
                    <ul class="list-disc pl-5">
                        <li><b>Memberikan</b> produk berkualitas dengan harga kompetitif dan bermanfaat demi
                            memastikan kepuasan pelanggan dan membina hubungan baik dengan mitra berkelanjutan.
                        </li>
                        <li><b>Merancang</b> ekosistem terintegrasi yang dapat menyangga bisnis utama dalam
                            perdagangan.</li>
                        <li><b>Meningkatkan</b> produktivitas, ketangkasan, dan kualitas kerja SDM lewat
                            pelatihan dan pengembangan kompetensi.</li>
                    </ul>
                    </p>
                    <p class="font-normal text-gray-800 dark:text-gray-400 text-justify">
                        <b>Nilai Perusahaan</b><br>
                        Kami memiliki seperangkat nilai yang diyakini dengan teguh sebagai inti setiap
                        keputusan bisnis setiap hari.
                    <ul class="list-disc pl-5">
                        <li><b>Integritas</b> Bertindak sesuai ucapan atau janji sehingga dapat menumbuhkan
                            kepercayaan pihak lain.</li>
                        <li><b>Komitmen</b> Melaksanakan pekerjaan dengan sepenuh hati untuk mencapai hasil
                            terbaik. Perbaikan berkelanjutan Meningkatkan kemampuan atau kapasitas diri, unit
                            kerja, dan organisasi secara terus-menerus untuk mencapai hasil terbaik.</li>
                        <li><b>Inovasi</b> Mengembangkan gagasan atau menciptakan produk/alat kerja/sistem kerja
                            baru yang dapat meningkatkan produktivitas dan pertumbuhan Perusahaan.</li>
                        <li><b>Loyalitas</b> Menanamkan semangat untuk mengerti, memahami, dan melaksanakan
                            nilai-nilai inti Perusahaan</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
        @if (session('success'))
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
                    title: "Signed in successfully"
                });
            </script>
        @endif
    </div>
</x-layout>
