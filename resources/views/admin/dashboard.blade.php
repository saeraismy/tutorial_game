<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <a href="videos" class="card block text-center">
                            <h3 class="font-semibold text-xl text-gray-800">Video Tutorials</h3>
                        </a>
                        <a href="news" class="card block text-center">
                            <h3 class="font-semibold text-xl text-gray-800">Game News</h3>
                        </a>
                        <a href="tricks" class="card block text-center">
                            <h3 class="font-semibold text-xl text-gray-800">Trick Games</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            background-color: rgb(219, 232, 218);
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
            /* Menggunakan font Poppins */
            border: none;
            /* Menghapus border */
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: rgb(198, 211, 197);
        }

        .card h3 {
            margin: 0;
            font-weight: 600;
            /* Menyesuaikan ketebalan huruf */
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</x-app-layout>
