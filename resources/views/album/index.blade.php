@extends('layout.index')
@section('main')
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 ml-[100px]">
        @foreach ($album as $item)
            <div class="py-5 px-5">
                <a href="/albumdetail/{{ $item->album_id }}" class="flex items-center justify-center h-[200px] rounded hover:bg-gray-300 bg-gray-100 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <p>{{ $item->nama_album }}</p>
                    </p>
                </a>
            </div>
        @endforeach
    </div>
@endsection
