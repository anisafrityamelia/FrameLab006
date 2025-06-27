<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersTotalController;
Route::get('/orders_total_admin', [OrdersTotalController::class, 'index'])->name('orders_total_admin');

use App\Http\Controllers\UsersDataController;
Route::get('/users_data_admin', [UsersDataController::class, 'index'])->name('users_data_admin');
Route::delete('/users_data_admin/{id}', [UsersDataController::class, 'destroy'])->name('users.destroy');
Route::get('/users/search', [UsersDataController::class, 'search'])->name('users.search');

use App\Http\Controllers\PendingDataController;
Route::get('/pending_data_admin', [PendingDataController::class, 'index'])->name('pending_data_admin');

use App\Http\Controllers\SettingsController;
Route::get('/settings_admin', [SettingsController::class, 'index'])->name('settings_admin');
Route::post('/settings_admin', [SettingsControllerController::class, 'update'])->name('settings_admin.update');

use App\Http\Controllers\FeedbackController;
Route::get('/feedback_admin', [FeedbackController::class, 'index'])->name('feedback_admin');
Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
Route::get('/feedback/search', [FeedbackController::class, 'search'])->name('feedback.search');

use App\Http\Controllers\RoomDataController;
Route::get('/room_data_admin', [RoomDataController::class, 'show'])->name('room_data_admin');
Route::post('/room_data_admin/simpan', [RoomDataController::class, 'simpan'])->name('room_data_admin.simpan');
Route::delete('/room_data_admin/hapus/{id}', [RoomDataController::class, 'hapus'])->name('room_data_admin.hapus');
Route::put('/room_data_admin/update/{id}', [RoomDataController::class, 'update'])->name('room_data_admin.update');
Route::get('/api/room_data/{id}', function ($id) {
    return \App\Models\ProdukRoom::findOrFail($id);
});

use App\Http\Controllers\RoomPartnerController;
Route::get('/room_partner_admin', [RoomPartnerController::class, 'show'])->name('room_partner_admin');
Route::post('/room_partner_admin', [RoomPartnerController::class, 'simpan'])->name('produk.simpan');
Route::post('/room_partner_admin/update/{id}', [RoomPartnerController::class, 'update'])->name('produk.update');
Route::post('/room_partner_admin/delete/{id}', [RoomPartnerController::class, 'delete'])->name('produk.delete');

use App\Http\Controllers\DataVerificationController;
Route::get('/data_verification', [DataVerificationController::class, 'index'])->name('data_verification');

use App\Http\Controllers\DashboardController;
Route::get('/dashboard_admin', [DashboardController::class, 'index'])->name('dashboard_admin');

use App\Http\Controllers\DetailOrdersController;
Route::get('/detail_my_orders', [DetailOrdersController::class, 'index'])->name('detail_my_orders');

use App\Http\Controllers\MyOrdersController;
Route::get('/my_orders', [MyOrdersController::class, 'index'])->name('my_orders');

use App\Http\Controllers\EditPasswordController;
Route::get('/edit_password', [EditPasswordController::class, 'index'])->name('edit_password');
Route::post('/edit_password', [EditPasswordController::class, 'update'])->name('edit_password.update');

use App\Http\Controllers\EditProfileController;
Route::get('/edit_profile', [EditProfileController::class, 'index'])->name('edit_profile');
Route::post('/edit_profile', [EditProfileController::class, 'update'])->name('edit_profile.update');

use App\Http\Controllers\ChatAdminController;
Route::get('/chat_admin', [ChatAdminController::class, 'index'])->name('chat_admin');

use App\Http\Controllers\LandingPage1Controller;
Route::get('/landing_page1', [LandingPage1Controller::class, 'index'])->name('landing_page1');

use App\Http\Controllers\LoginController;
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'index'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\RegisterController;
Route::match(['get', 'post'], '/register', [RegisterController::class, 'index'])->name('register');

use App\Http\Controllers\DetailStudioPhotoController;
Route::get('/detail_studio_photo', [DetailStudioPhotoController::class, 'index'])->name('detail_studio_photo');

use App\Http\Controllers\DetailStudioVideoController;
Route::get('/detail_studio_video', [DetailStudioVideoController::class, 'index'])->name('detail_studio_video');

use App\Http\Controllers\DetailStudioSpaceController;
Route::get('/detail_studio_space', [DetailStudioSpaceController::class, 'index'])->name('detail_studio_space');

use App\Http\Controllers\DetailStudioPartnerController;
Route::get('/detail_studio_partner/{id}', [DetailStudioPartnerController::class, 'show'])->name('detail_studio_partner');

use App\Http\Controllers\ReviewController;
Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
Route::post('/submit-rating', [ReviewController::class, 'submitRating'])->name('review.submitRating');
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
// Payment Success Route
Route::get('/payment-success', function() {
    return redirect('/review')->with('message', 'Pembayaran berhasil!');
})->name('payment.success');

use App\Http\Controllers\ConfirmSewaPhotoController;
Route::post('/confirm_sewa_photo', [ConfirmSewaPhotoController::class, 'index'])->name('confirm_sewa_photo');

use App\Http\Controllers\ConfirmSewaVideoController;
Route::post('/confirm_sewa_video', [ConfirmSewaVideoController::class, 'index'])->name('confirm_sewa_video');

use App\Http\Controllers\ConfirmSewaSpaceController;
Route::post('/confirm_sewa_space', [ConfirmSewaSpaceController::class, 'index'])->name('confirm_sewa_space');

use App\Http\Controllers\StudioGabunganController;
Route::get('/tampilan_studiogabungan', [StudioGabunganController::class, 'index'])->name('tampilan_studiogabungan');
Route::get('/search-studio', [StudioGabunganController::class, 'search']);

use App\Http\Controllers\DetailStudioRoomController;
Route::get('/detail_studio_room/{id}', [DetailStudioRoomController::class, 'show'])->name('detail_studio_room');

use App\Http\Controllers\ConfirmSewaRoomController;
Route::post('/confirm_sewa_room', [ConfirmSewaRoomController::class, 'index'])->name('confirm_sewa_room');
Route::post('/generate-qris', [ConfirmSewaRoomController::class, 'generateQris'])->name('generate.qris');
Route::post('/midtrans/callback', [ConfirmSewaRoomController::class, 'handleCallback'])->name('midtrans.callback');

// TAMBAHKAN INI DI routes/web.php

// Webhook Midtrans (harus di luar middleware auth)
Route::post('/webhook/midtrans', [App\Http\Controllers\MidtransWebhookController::class, 'handle'])
    ->name('midtrans.webhook');

    // TAMBAHKAN ROUTES INI UNTUK ADMIN ACTIONS
Route::middleware(['auth'])->group(function () {
    Route::post('/admin/orders/{order}/mark-paid', [App\Http\Controllers\OrdersTotalController::class, 'markAsPaid']);
    Route::delete('/admin/orders/{order}', [App\Http\Controllers\OrdersTotalController::class, 'deleteOrder']);
});