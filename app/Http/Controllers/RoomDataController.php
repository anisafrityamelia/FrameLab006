<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\ProdukRoom;

class RoomDataController extends Controller
{
    public function show()
    {
        $data = ProdukRoom::all();
        return view('pages.room_data_admin', compact('data'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|array',
            'studio_type' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,jfif,jpg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        } else {
            $filename = null;
        }

        ProdukRoom::create([
            'photo' => 'images/' . $filename,
            'room_name' => $request->room_name,
            'description' => $request->description,
            'duration' => implode(', ', $request->duration),
            'studio_type' => $request->studio_type,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function hapus($id)
    {
        $room = ProdukRoom::findOrFail($id);

        if ($room->photo && file_exists(public_path($room->photo))) {
            unlink(public_path($room->photo));
        }

        $room->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $room = ProdukRoom::findOrFail($id);

        $request->validate([
            'room_name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|array',
            'studio_type' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,jfif,jpg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($room->photo && file_exists(public_path($room->photo))) {
                unlink(public_path($room->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $room->photo = 'images/' . $filename;
        }

        $room->update([
            'room_name' => $request->room_name,
            'description' => $request->description,
            'duration' => implode(', ', $request->duration),
            'studio_type' => $request->studio_type,
            'price' => $request->price,
            'photo' => $room->photo
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

}

