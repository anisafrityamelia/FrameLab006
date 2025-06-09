<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukPartner;
use Illuminate\Support\Facades\File;

class RoomPartnerController extends Controller
{
    public function show()
    {
        $data = ProdukPartner::all();
        return view('pages.room_partner_admin', compact('data'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'description1' => 'required|string',
            'description2' => 'required|string',
            'description3' => 'required|string',
            'noTelepon' => 'required|numeric',
            'studio_type' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        } else {
            $filename = null;
        }

         ProdukPartner::create([
            'photo' => $filename,
            'room_name' => $request->room_name,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'description3' => $request->description3,
            'noTelepon' => $request->noTelepon,
            'studio_type' => $request->studio_type,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'description1' => 'required|string',
            'description2' => 'required|string',
            'description3' => 'required|string',
            'noTelepon' => 'required|numeric',
            'studio_type' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
        ]);

        $data = ProdukPartner::findOrFail($id);

        if ($request->hasFile('photo')) {
            if ($data->photo && File::exists(public_path('images/' . $data->photo))) {
                File::delete(public_path('images/' . $data->photo));
            }

            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data->photo = $filename;
        }

        $data->room_name = $request->room_name;
        $data->description1 = $request->description1;
        $data->description2 = $request->description2;
        $data->description3 = $request->description3;
        $data->noTelepon = $request->noTelepon;
        $data->studio_type = $request->studio_type;
        $data->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $data = ProdukPartner::findOrFail($id);
        $fotoPath = public_path('images/'. $data->photo);
        if (File::exists($fotoPath)) {
            File::delete($fotoPath);
        }
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
