<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index(string $album_id)
    {
        $add = Album::find($album_id);
        $album = Album::where('user_id', auth()->id())->get();
        $foto = Foto::where('user_id', auth()->id())->get();
        $user = User::where('user_id', auth()->id())->get();
        return view('profile.index', compact('foto', 'user', 'album', 'add'));
    }

    public function editprofileview(request $request, $user_id)
    {
        $edit = User::findOrFail($user_id);
        $user = User::where('user_id', auth()->id());
        return view('profile.editprofile', compact('edit', 'user'));
    }
    public function editfotoview(request $request, $foto_id)
    {
        $edit = Foto::findOrFail($foto_id);
        $user = User::where('user_id', auth()->id());
        return view('profile.editfoto', compact('edit', 'user'));
    }

    public function editfoto(string $foto_id)
    {
        $data = Foto::where('foto_id', $foto_id)->update([
            'judul_foto'=>request('judul_foto'),
            'deskripsi'=>request('deskripsi'),
        ]);

        return redirect('/profile/{username}');
    }

    public function update(Request $request, string $user_id)
    {
        // $profile = request()->file('profile');
        $data = User::findOrFail($user_id);

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile->store(auth()->id());

            Storage::delete(auth()->id());

            $data->update([
                'profile' => $profile->store(auth()->id()),
                'username' => request('username'),
                'nama_lengkap' => request('nama_lengkap'),
            ]);
        } else {
            $data->update([
                'username' => request('username'),
                'nama_lengkap' => request('nama_lengkap'),
            ]);
        }
        $user = User::where('user_id', auth()->id());
        return view('profile.index', compact('user'))->with('success', 'Berhasil Di Update');
    }

    public function detail(string $foto_id)
    {
        $user = User::where('user_id', auth()->id());
        $foto = Foto::find($foto_id);
        return view('profile.detailprofile', compact('foto', 'user'));
    }

    public function destroy(String $foto_id)
    {
        Foto::destroy($foto_id);
        return back();
    }

    public function addalbum(Request $request, string $foto_id){
        Foto::where('foto_id', $foto_id)->update([
            'album_id' => request('album_id')   
        ]);

        return redirect('/profile/{username}');
    }
}
