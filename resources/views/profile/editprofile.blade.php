@extends('layout.index')
@section('main')
    <div class="flex justify-center">
        <form class="max-w-xl w-full ml-[200px] border px-5 py-5 rounded-xl mt-5" method="post" enctype="multipart/form-data" action="/editprofile/{{ $edit->user_id }}">
            <a href="/profile/{{ Auth::user()->username }}" id="dropdownButton" data-dropdown-toggle="dropdown"
            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700  rounded-lg text-sm p-1.5"
            type="button">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
              </svg>
        </a>
            @csrf
            @method('put')
            <div class="mb-5 flex justify-center">
                <label for="file">
                    <div class="flex mb-5 items-center cursor-pointer justify-center relative w-[70px] h-[70px] rounded-full border-2 border-brand-100">
                    <label for="file">
                        <div>
                            <img src="" value="{{ asset('storage/' . $edit->profile) }}" id="imgPreview" class="rounded-full object-cover"  alt="">
                        </div>
                    </label>
                    <input id="file" name="profile" class="absolute w-full h-full" ref="file" type="file"
                    accept="image/*" style=" visibility: hidden;" onchange="showPreview(event)" />
                </div> 
                <span class="text-bold">Edit Profile</span>
                </label>
            </div>
            <div class="mb-5">
                    <input type="text" id="password" value="{{ $edit->username }}" name="username"
                    class="bg-transparent border-b-4 text-gray-900 text-sm rounded-lg w-full"
                    required />
            </div>
            <div class="mb-5">
                   <input type="text" id="repeat-password" value="{{ $edit->nama_lengkap }}" name="nama_lengkap"
                    class="shadow-sm bg-transparent border border-b-4 text-gray-900 text-sm rounded-lg  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>
            <div class="flex justify-end">
                <button type="submit" name="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </div>
        </form>
    </div>
@endsection
