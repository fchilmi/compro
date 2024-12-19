<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <title>Halaman Login</title>
</head>

<body class="text-gray-800 antialiased">
    <main class="">
        <section class="absolute w-full h-full">
            <div class="absolute w-full h-full bg-gray-900"
                style="background-image: url(/img/register.png); background-size: cover; background-repeat: no-repeat;">
            </div>
            {{-- <img src="/img/register.png" alt="" class="absolute h-auto max-w-full"> --}}
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    <div class="w-full lg:w-4/12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-600 border-0">
                            <div class="rounded-t mb-0 px-6 py-6">
                                <div class="text-center mb-3">
                                    <h3 class="text-white text-sm font-bold">
                                        Nama Perusahaan
                                    </h3>
                                </div>
                                <hr class="mt-6 border-b-1 border-gray-400" />
                            </div>
                            @if ($errors->any())
                                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <ul class="mt-1.5 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                <form action="{{ route('users.login') }}" method="POST">
                                    @csrf
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            for="grid-password">Username</label><input type="text" name="name"
                                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                            placeholder="Username" style="transition: all 0.15s ease 0s;"
                                            value="{{ old('name') }}" />
                                    </div>
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            for="grid-password">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-800 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                            placeholder="Password" style="transition: all 0.15s ease 0s;" /><button
                                            type="button" id="togglePassword" class="focus:outline-none -ml-9">
                                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20240227164304/visible.png"
                                                alt="" class="w-6 -mb-1 opacity-40 hover:opacity-100">
                                        </button>
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center cursor-pointer"><input
                                                id="customCheckLogin" type="checkbox"
                                                class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5"
                                                style="transition: all 0.15s ease 0s;" /><span
                                                class="ml-2 text-sm font-semibold text-white">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="text-center mt-6">
                                        <button type="submit"
                                            class="bg-blue-400 text-white active:bg-blue-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full hover:bg-blue-800"
                                            type="button" style="transition: all 0.15s ease 0s;">
                                            Sign In
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passIn = document.getElementById('password');
        const btn = document.getElementById('togglePassword');
        btn.addEventListener('click', function() {
            const type =
                passIn.getAttribute('type') ===
                'password' ? 'text' : 'password';
            passIn.setAttribute('type', type);
        });
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            loginForm.reset(); // Reset the form
            alert('Form submitted');
        });
    });
</script>

</html>
