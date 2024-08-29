@extends('layout.index')
@section('main')
    <div class="flex justify-center ml-[100px] mt-[300px]">

        <a href="/profile/{{ Auth::user()->username }}" class="absolute right-20 top-20">
            <svg class="w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                    d="M6 18 18 6m0 12L6 6" />
            </svg>
        </a>
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="flex text-white bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-[100px] py-[100px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            <div class="flex flex-col justify-center">
                <svg class="w-[47px] h-[47px] ml-[15px] mb-2 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4c0 .6.4 1 1 1h14c.6 0 1-.4 1-1v-4c0-.6-.4-1-1-1h-2M8 9l4-5 4 5m1 8h0" />
                </svg>
                <span class="text-center text-gray-900">
                    Upload Image
                </span>
            </div>
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Upload
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent align-items-center hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="post" action="/uploadpost" enctype="multipart/form-data">
                        @csrf
                        <div class="col-span-2 sm:col-span-1">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}" id="">
                            <div class="flex justify-center mb-10 mt-10">
                                <div
                                    class="flex mb-5 items-center cursor-pointer justify-center relative w-[100px] h-[100px] rounded-xl">
                                    <img src="" id="imgPreview" class="absolute" alt="">
                                    <label for="file">
                                        <div>
                                            <span class="text-bold">Select Image</span>
                                        </div>
                                    </label>

                                    <input id="file" name="lokasi_file" class="absolute w-full h-full" ref="file"
                                        type="file" accept="image/*" style=" visibility: hidden;"
                                        onchange="showPreview(event)" />
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="judul_foto" id="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                            </div>
                            <div class="col-span-2 mt-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" rows="4" name="deskripsi"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end mt-5">
                            <button type="submit"
                                class="text-white  bg-gray-800 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
