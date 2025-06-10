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
            'photo1' => 'required|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
            'photo2' => 'required|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
            'photo3' => 'required|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        } else {
            $filename = null;
        }

        if ($request->hasFile('photo1')) {
            $file1 = $request->file('photo1');
            $filename1 = time().'_1_'.$file1->getClientOriginalName();
            $file1->move(public_path('images'), $filename1);
        } else {
            $filename1 = null;
        }

        if ($request->hasFile('photo2')) {
            $file2 = $request->file('photo2');
            $filename2 = time().'_2_'.$file2->getClientOriginalName();
            $file2->move(public_path('images'), $filename2);
        } else {
            $filename2 = null;
        }

        if ($request->hasFile('photo3')) {
            $file3 = $request->file('photo3');
            $filename3 = time().'_3_'.$file3->getClientOriginalName();
            $file3->move(public_path('images'), $filename3);
        } else {
            $filename3 = null;
        }

         ProdukPartner::create([
            'photo' => $filename,
            'photo1' => $filename1,
            'photo2' => $filename2,
            'photo3' => $filename3,
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
            'photo1' => 'nullable|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
            'photo2' => 'nullable|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
            'photo3' => 'nullable|image|mimes:jpeg,jfif,png,jpg,gif|max:2048',
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

        if ($request->hasFile('photo1')) {
            if ($data->photo1 && File::exists(public_path('images/' . $data->photo1))) {
                File::delete(public_path('images/' . $data->photo1));
            }

            $file1 = $request->file('photo1');
            $filename1 = time().'_1_'.$file1->getClientOriginalName();
            $file1->move(public_path('images'), $filename1);
            $data->photo1 = $filename1;
        }

        if ($request->hasFile('photo2')) {
            if ($data->photo2 && File::exists(public_path('images/' . $data->photo2))) {
                File::delete(public_path('images/' . $data->photo2));
            }

            $file2 = $request->file('photo2');
            $filename2 = time().'_2_'.$file2->getClientOriginalName();
            $file2->move(public_path('images'), $filename2);
            $data->photo2 = $filename2;
        }

        if ($request->hasFile('photo3')) {
            if ($data->photo3 && File::exists(public_path('images/' . $data->photo3))) {
                File::delete(public_path('images/' . $data->photo3));
            }

            $file3 = $request->file('photo3');
            $filename3 = time().'_3_'.$file3->getClientOriginalName();
            $file3->move(public_path('images'), $filename3);
            $data->photo3 = $filename3;
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
        $fotoPath1 = public_path('images/' . $data->photo1);
        $fotoPath2 = public_path('images/' . $data->photo2);
        $fotoPath3 = public_path('images/' . $data->photo3);

        if (File::exists($fotoPath)) {
            File::delete($fotoPath);
        }

        if (File::exists($fotoPath1)) {
            File::delete($fotoPath1);
        }

        if (File::exists($fotoPath2)) {
            File::delete($fotoPath2);
        }

        if (File::exists($fotoPath3)) {
            File::delete($fotoPath3);
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
