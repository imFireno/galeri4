<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">

    <div class="">
        <div class="p-8 lg:w-1/2 mx-auto">
            <div class="bg-white rounded-t-lg p-8">
                <p class="text-center text-xl text-gray-900 font-Bold">Login</p>
            </div>
            @error('gagal')
                {{ $message }}
            @enderror
            <div class="bg-gray-100 rounded-b-lg py-12 px-4 lg:px-24">
                <form class="mt-6" action="/loginpost" method="POST">
                    @csrf
                    <div class="relative"> <input name="email"
                            class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600  transition  rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                            id="username" type="email" placeholder="Email" />
                        <div class="absolute left-0 inset-y-0 flex items-center"> <svg
                                xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-400 p-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg> </div>
                    </div>
                    <div class="relative mt-3"> <input name="password"
                            class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600  transition  rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                            id="username" type="text" placeholder="Password" />
                        <div class="absolute left-0 inset-y-0 flex items-center"> <svg
                                xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-400 p-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                            </svg> </div>
                    </div>
                    <div class="mt-4 flex items-center text-gray-500"> 
                        <span>Don't Have An Accout? <a class="text-blue-800" href="/register">Register Here!</a></span> 
                    </div>
                    <div class="flex items-center justify-center mt-8"> <button
                            class="text-white py-2 px-4 uppercase rounded bg-indigo-500 hover:bg-indigo-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Sign in </button> </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
