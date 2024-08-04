<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>
<body class="mb-48">
<nav class="flex justify-between items-center mb-4">
    <a href="index.html"
    ><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo"
        /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth()
            <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
{{--            <li>--}}
{{--                <a href="{{ route('listings.manager') }}" class="hover:text-laravel"--}}
{{--                ><i class="fa-solid fa-gear"></i>--}}
{{--                    Manage Listings</a--}}
{{--                >--}}
{{--            </li>--}}
        @else
            <li>
                <a href="{{ route('register') }}" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Register</a
                >
            </li>
            <li>
                <a href="login.html" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
        @endauth
    </ul>
</nav>

<!-- Hero -->
<section
        class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
    <div
            class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
            style="background-image: url('images/laravel-logo.png')"
    ></div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            Lara<span class="text-black">Gigs</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            Find or post Laravel jobs & projects
        </p>
        <div>
            <a
                    href="{{ route('register') }}"
                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
            >Sign Up to List a Gig</a
            >
        </div>
    </div>
</section>

<main>
    <!-- Search -->
    <form action="">
        <div class="relative border-2 border-gray-100 m-4 rounded-lg">
            <div class="absolute top-4 left-3">
                <i
                        class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                ></i>
            </div>
            <input
                    type="text"
                    name="search"
                    class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                    placeholder="Search Laravel Gigs..."
            />
            <div class="absolute top-2 right-2">
                <button
                        type="submit"
                        class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                >
                    Search
                </button>
            </div>
        </div>
    </form>

    {{ $slot }}
</main>

<footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a
            href="{{ route('listings.create') }}"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
    >Post Job</a
    >
</footer>
<x-flash-message />
</body>
</html>