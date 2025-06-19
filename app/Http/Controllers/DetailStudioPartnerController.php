<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukPartner;

class DetailStudioPartnerController extends Controller
{
    public function show($id)
    {
        $partner = ProdukPartner::findOrFail($id);
        return view('pages.detail_studio_partner', compact('partner'));
    }
}
