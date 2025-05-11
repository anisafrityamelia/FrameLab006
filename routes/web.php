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