<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>User Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="flex flex-col h-screen bg-gray-100">
        <header class="bg-gradient-to-r from-blue-500 to-indigo-700 px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <h2 class="text-xl font-semibold text-white">Title of the programme</h2>
                    <div>
                        <img src="user-profile-picture.jpg" alt="Logo" class="w-12 h-12 rounded-full">
                    </div>
                </div>

                <div class="relative inline-block text-gray-200">
                    <!-- <button id="profileButton" class="text-white hover:underline">Profile</button> -->
                    <div class="flex items-center space-x-4" id="profileButton">
                        <img src="{{asset(Auth::user()->image)}}" alt="User Profile"
                            class="w-12 h-12 rounded-full cursor-pointer">
                        <div>
                            <h2 class=" text-xl font-semibold text-white cursor-pointer">Welcome,
                                {{Auth::user()->name}}!</h2>
                            <p class="text-gray-200 text-sm cursor-pointer">{{Auth::user()->role}}</p>
                        </div>
                    </div>
                    <ul id="profileDropdown"
                        class=" mt-2 py-2 w-32 bg-white border rounded-lg shadow-lg absolute right-0" x-cloak>
                        <li><a href="{{route('user.profile')}}"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">My Profile </a></li>
                        <li><a href="{{route('user.password.update')}}"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Change Password</a></li>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <li><a href="{{route('logout')}}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a></li>

                        </form>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="flex-1">
            <div class="flex h-full">
                <!-- Side BAr -->
                <div class="bg-gray-800 text-white w-64 px-6 py-8">
                    <h1 class="text-2xl font semibold">User Dashboard </h1>
                    <ul class="mt-8">
                        <li class="my-3">
                            <a href="{{route('user.dashboard')}}" class="flex items-center text-gray-300 hover:">
                                Dashboard
                            </a>
                        </li>
                       
                        <li class="my-3">
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center text-gray-300 hover:text-white">
                                    Loan Management
                                    <svg x-show="!open" class="ml auto h-5 w-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stoke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                    <svg x-show="open" class="ml auto h-5 w-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stoke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7  7 7"></path>
                                    </svg>
                                </button>
                                <ul class="ml-4 mt-2 space-y-2">
                                    <li><a href="{{route('user.apply.loan')}}" class="text-gray-300 hover:text-white">Apply For Loan</a></li>
                                    <li><a href="" class="text-gray-300 hover:text-white">Add Products</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Add More Items Here -->
                    </ul>

                </div>
                <div class="flex-1 p-10">