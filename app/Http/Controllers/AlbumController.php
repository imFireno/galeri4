<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album= Album::where('user_id', auth()->id())->get();
        $foto = Foto::where('user_id', auth()->id())->get();
        $user = User::where('user_id', auth()->id())->get();
        return view('album.index', compact('album','user', 'foto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createalbumview()
    {
        $user = User::where('user_id', auth()->id());
        return view('create.album.index'    , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('user_id', auth()->id());

        $data = [
            'nama_album' => request('nama_album'),
            'user_id' => auth()->id(),
        ];

        Album::create($data);
        return redirect('/album');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $album_id)
    {
        $user = User::where('user_id', auth()->id())->get();
        $album = Album::with(['user', 'foto'])->find($album_id);
        $foto = Foto::with('user')->get();
        return view('album.detail', compact('album', 'foto', 'user'));
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
