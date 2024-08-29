<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Register</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">

    <div class="">
        <div class="p-8 lg:w-1/2 mx-auto">
            <div class="bg-white rounded-t-lg p-8">
                <p class="text-center text-xl text-gray-900 font-Bold">Register</p>
            </div>
            <div class="bg-gray-100 rounded-b-lg py-12 px-4 lg:px-24">
                <form class="mt-6" action="/registerpost" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center">
                        <div
                            class="flex mb-5 items-center cursor-pointer justify-center relative w-[70px] h-[70px] rounded-full border-2 border-brand-100">
                            <label for="file">
                                <div>
                                    <img src="" id="imgPreview" class="" alt="">
                                    <span class="text-bold">Profile</span>
                                </div>
                            </label>

                            <input id="file" name="profile" class="absolute w-full h-full" ref="file"
                                type="file" accept="image/*" style=" visibility: hidden;"
                                onchange="showPreview(event)" />
                        </div>
                    </div>
                    <div class="relative mb-3"> <input name="username"
                            class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600  transition  rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                            id="username" type="text" placeholder="Username" />
                        <div class="absolute left-0 inset-y-0 flex items-center">
                            <svg class="h-7 w-7 ml-3 text-gray-400 p-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="relative mb-3"> <input name="nama_lengkap"
                            class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600  transition  rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                            id="username" type="text" placeholder="Name" />
                        <div class="absolute left-0 inset-y-0 flex items-center">
                            <svg class="h-7 w-7 ml-3 text-gray-400 p-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
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
                            id="username" type="password" placeholder="Password" />
                        <div class="absolute left-0 inset-y-0 flex items-center"> <svg
                                xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-400 p-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                            </svg> </div>
                    </div>
                    <div class="mt-4 flex items-center text-gray-500">
                        <span>Yout Have An Accout? <a class="text-blue-800" href="/login">login!</a></span>
                    </div>
                    <div class="flex items-center justify-center mt-8"> <button type="submit" name="submit"
                            class="text-white py-2 px-4 uppercase rounded bg-indigo-500 hover:bg-indigo-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Sign in </button> </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("imgPreview");
            preview.src = src;
        }
    }
</script>

</html>
