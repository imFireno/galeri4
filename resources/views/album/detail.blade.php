@extends('layout.index')
@section('main')
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 ml-[100px]">
        @foreach ($album->foto as $item)
            <div class="py-5 px-5">
               <img src="{{ asset('storage/' . $item->lokasi_file) }}" alt="">
            </div>
        @endforeach
    </div>
@endsection
