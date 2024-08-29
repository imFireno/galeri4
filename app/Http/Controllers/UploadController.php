<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('user_id', auth()->id());
        return view('create.upload.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('user_id', auth()->id());
        $foto = request()->file('lokasi_file');

        $data = [
            'judul_foto' => request('judul_foto'),
            'deskripsi' => request('deskripsi'),
            'tgl_diunggah' => now(),
            'lokasi_file' => $foto->Store(auth()->id()),
            'user_id' => auth()->id(),
         ];

         Foto::create($data);
         session()->flash('success', 'Berhasil Upload');
         return redirect('/profile/{username}');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
