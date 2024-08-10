<?php

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisteredUserController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('posts', PostController::class);

Route::get('/invoices/{invoice}/pay', [PaymentController::class, 'showPaymentForm'])->name('payments.form');
Route::post('/invoices/{invoice}/pay', [PaymentController::class, 'handlePayment'])->name('payments.handle');

Route::get('/send-test-email', function () {
    Mail::to('test@example.com')->send(new TestEmail());
    return 'Test email sent!';
});

Route::get('/send-test-email', [EmailController::class, 'sendTestEmail']);

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('proposals', ProposalController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('transactions', TransactionController::class);
});

Route::get('payment/{invoice}', [PaymentController::class, 'payment'])->name('payment');
Route::post('payment/{invoice}', [PaymentController::class, 'processPayment'])->name('processPayment');



require __DIR__.'/auth.php';
