<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersTotalController;
Route::get('/orders_total_admin', [OrdersTotalController::class, 'index'])->name('orders_total_admin');

use App\Http\Controllers\UsersDataController;
Route::get('/users_data_admin', [UsersDataController::class, 'index'])->name('users_data_admin');

use App\Http\Controllers\PendingDataController;
Route::get('/pending_data_admin', [PendingDataController::class, 'index'])->name('pending_data_admin');

use App\Http\Controllers\SettingsController;
Route::get('/settings_admin', [SettingsController::class, 'index'])->name('settings_admin');

use App\Http\Controllers\FeedbackController;
Route::get('/feedback_admin', [FeedbackController::class, 'index'])->name('feedback_admin');

use App\Http\Controllers\RoomDataController;
Route::get('/room_data_admin', [RoomDataController::class, 'index'])->name('room_data_admin');

use App\Http\Controllers\RoomPartnerController;
Route::get('/room_partner_admin', [RoomPartnerController::class, 'index'])->name('room_partner_admin');

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

use App\Http\Controllers\EditProfileController;
Route::get('/edit_profile', [EditProfileController::class, 'index'])->name('edit_profile');

use App\Http\Controllers\ChatAdminController;
Route::get('/chat_admin', [ChatAdminController::class, 'index'])->name('chat_admin');

use App\Http\Controllers\LandingPage1Controller;
Route::get('/landing_page1', [LandingPage1Controller::class, 'index'])->name('landing_page1');

use App\Http\Controllers\LoginController;
Route::get('/login', [LoginController::class, 'index'])->name('login');

use App\Http\Controllers\RegisterController;
Route::match(['get', 'post'], '/register', [RegisterController::class, 'index'])->name('register');

use App\Http\Controllers\DetailStudioPhotoController;
Route::get('/detail_studio_photo', [DetailStudioPhotoController::class, 'index'])->name('detail_studio_photo');

use App\Http\Controllers\DetailStudioVideoController;
Route::get('/detail_studio_video', [DetailStudioVideoController::class, 'index'])->name('detail_studio_video');

use App\Http\Controllers\DetailStudioSpaceController;
Route::get('/detail_studio_space', [DetailStudioSpaceController::class, 'index'])->name('detail_studio_space');

use App\Http\Controllers\ReviewController;
Route::get('/review', [ReviewController::class, 'index'])->name('review');

use App\Http\Controllers\ConfirmSewaPhotoController;
Route::post('/confirm_sewa_photo', [ConfirmSewaPhotoController::class, 'index'])->name('confirm_sewa_photo');

use App\Http\Controllers\ConfirmSewaVideoController;
Route::post('/confirm_sewa_video', [ConfirmSewaVideoController::class, 'index'])->name('confirm_sewa_video');

use App\Http\Controllers\ConfirmSewaSpaceController;
Route::post('/confirm_sewa_space', [ConfirmSewaSpaceController::class, 'index'])->name('confirm_sewa_space');

use App\Http\Controllers\StudioGabunganController;
Route::get('/tampilan_studiogabungan', [StudioGabunganController::class, 'index'])->name('tampilan_studiogabungan');