<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('date', 'desc')->get();
        return view('pages.feedback_admin', compact('feedbacks'));
    }

    public function search(Request $request)
    {
        $query = Feedback::orderBy('date', 'desc');
        
        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $query->where('username', 'like', $keyword . '%');
        }
        
        $feedbacks = $query->get();
        return view('pages.feedback_admin', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        if (!session()->has('logged_in_user')) {
            return redirect('/login')->with('error', 'Kamu harus login untuk mengirim feedback!');
        }

        Feedback::create([
            'username' => session('logged_in_user')->username,
            'note' => $request->input('note'),
            'date' => now(),
        ]);

        return redirect('/landing_page1#about')->with('success', 'Feedback berhasil dikirim!');
    }

    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Feedback berhasil dihapus.');
    }
}