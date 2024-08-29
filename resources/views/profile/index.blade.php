@extends('layout.index')
@section('main')
    <div class="flex flex-col justify-center ml-[600px] mt-5">
        <div class="w-full max-w-xl bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" data-dropdown-trigger="hover"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700  rounded-lg text-sm p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                @foreach ($user as $item)
                    <div id="dropdown"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2">
                            <li>
                                <a href="/editprofile/{{ $item->user_id }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit
                                    Profile</a>
                            </li>
                        </ul>
                    </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover"
                    src="{{ asset('storage/' . $item->profile) }}" alt="Bonnie image" />
                <a href="/editprofile/{{ $item->user_id }}">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $item->username }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $item->nama_lengkap }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- fotonya ini mahh --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 ml-[300px]">
        @foreach ($foto as $item)
            <div class="group/item relative">
                <button data-modal-target="{{ 'modal1' . $item->foto_id }}"
                    data-modal-toggle="{{ 'modal1' . $item->foto_id }}">
                    <img class="md:h-[250px] object-cover md:w-[300px] md:rounded-lg group-hover/item:brightness-[.6] group-hover/item:blur-[1px] rounded-lg"
                        id="menu-button" aria-expanded="true" aria-haspopup="true"
                        src="{{ asset('storage/' . $item->lokasi_file) }}">
                </button>
                <div class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] bg-black/[.1] max-w-full"
                    id="{{ 'modal1' . $item->foto_id }}" tabindex="-1">
                    <div
                        class="flex items-center bg-white rounded-lg shadow md:flex-row md:max-w-auto dark:border-gray-700 dark:bg-gray-800 ">
                        <img class="object-cover rounded-l-lg w-auto h-96 md:h-[800px] "
                            src="{{ asset('storage/' . $item->lokasi_file) }}" alt="">
                        <div
                            class="relative md:h-[800px] w-[500px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <div class="flex p-3 justify-between">
                                <div class="flex">
                                    <img class="h-[35px] w-[35px] object-cover rounded-full"
                                        src="{{ asset('storage/' . $item->user->profile) }}" alt="">
                                    <h2 class="px-3 my-1 ">{{ $item->user->username }}</h2>
                                </div>
                                <div class="flex  ">
                                    <button id="dropdownDefaultButton"
                                        data-dropdown-toggle="{{ 'drop2' . $item->foto_id }}"
                                        class="text-gray-900 font-medium rounded-lg text-sm px-5" type="button">
                                        <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="3"
                                                d="M12 6h0m0 6h0m0 6h0" />
                                        </svg>
                                    </button>
                                    <div id="{{ 'drop2' . $item->foto_id }}"
                                        class="z-10 hidden max-w-[100px] bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <form action="/delete/{{ $item->foto_id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="block px-4 py-2 text-sm w-full text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                                </form>
                                            </li>
                                            <li>
                                                <a href="/editfoto/{{ $item->foto_id }}"
                                                    class="block px-4 py-2 text-center hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="max-h-[700px]  overflow-auto">
                                <div class="p-3 bg-white border-t-4 ">
                                    <h5 class=" text-2xl font-bold text-gray-900 dark:text-white">
                                        {{ $item->judul_foto }}</h5>
                                    <p class="text-[13px] text-gray-400 mb-4">Posted on
                                        {{ \Carbon\Carbon::parse($item->tgl_diunggah)->format('F d, Y') }}</p>
                                    <div class="max-w-[500px] text-[15px]  text-gray-700 ">
                                        <p class="font-normal md:text-justify text-base break-words dark:text-gray-400">
                                            {{ $item->deskripsi }}</p>
                                    </div>
                                </div>
                                <div class="bg-gray-100 min-h-[590px] p-6 ">
                                    <h2 class="text-lg font-bold mb-4">Comments</h2>
                                    <div class="flex flex-col space-y-4">
                                        <div class="bg-white p-4 rounded-lg shadow-md">
                                            <h3 class="text-lg font-bold">John Doe</h3>
                                            <p class="text-gray-700 text-sm mb-2">Posted on April 17, 2023</p>
                                            <p class="text-gray-700">This is a sample comment. Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                        <form class="bg-white p-4 rounded-lg shadow-md">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 font-bold mb-2" for="comment">
                                                    Comment
                                                </label>
                                                <textarea
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="comment" rows="3" placeholder="Enter your comment"></textarea>
                                            </div>
                                            <button
                                                class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                                type="submit">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="group/edit invisible group-hover/item:visible ">
                    <span href="#"
                        class="absolute top-4 left-3 text-white decoration-solid text-bold">{{ $item->user->username }}</span>
                    <span href="#"
                        class="absolute bottom-4 left-3 text-white decoration-solid text-bold">{{ $item->album_id }}</span>
                    <button id="dropdownButton4" data-dropdown-toggle="{{ 'drop1' . $item->foto_id }}"
                        data-dropdown-trigger="hover"
                        class="transition transform translate-y-8 ease-in-out absolute top-3 group-hover/drop:visible right-3 rounded-lg text-white group-hover/item:translate-y-0">
                        <svg class="w-[30px] h-[30px] text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown Add Album -->
                    <div id="{{ 'drop1' . $item->foto_id }}"
                        class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                        <ul class="h-28 py-2 text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUsersButton">
                            <li>
                                <form action="/addalbum/{{ $item->foto_id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <p class="block w-full text-center px-3">Add to album</p>
                                    <select name="album_id" id=""
                                        class="bg-gray-100 border-none w-full cursor-pointer">
                                        <option value="">Select Album</option>
                                        @foreach ($album as $item)
                                            <option value="{{ $item->album_id }}" class="">
                                                {{ $item->nama_album }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="block bg-slate-300 px-4 py-2 text-sm w-full text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Add</button>
                                </form>
                            </li>
                        </ul>
                        <a href="#"
                            class="flex items-center p-3 text-sm font-medium text-blue-600 border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-blue-500 hover:underline">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                            </svg>
                            Add new user
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
