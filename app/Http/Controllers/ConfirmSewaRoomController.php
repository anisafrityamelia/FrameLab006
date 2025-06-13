<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukRoom;
use Illuminate\Support\Str;

class ConfirmSewaRoomController extends Controller
{
    public function index(Request $request)
    {
        $room = ProdukRoom::findOrFail($request->room_id);

        $order_date = $request->order_date;
        $order_times = $request->order_time; // array
        $total_order = count($order_times) * $room->price;
        $code_order = 'ORD-' . strtoupper(Str::random(8)); // contoh kode order acak

        return view('pages.confirm_sewa_room', [
            'room' => $room,
            'order_date' => $order_date,
            'order_times' => $order_times,
            'total_order' => $total_order,
            'code_order' => $code_order,
        ]);
    }
}
