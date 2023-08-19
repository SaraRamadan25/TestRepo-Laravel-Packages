<?php

use App\Events\SomeEvent;
use App\Mail\OrderShipped;
use App\Models\User;
use App\Jobs\SomeJob;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/jobs/{jobs}', function ($jobs) {
    $user = User::find(1);

    for ($i = 0; $i < $jobs; $i++) {
        SomeJob::dispatch($user);
    }

    return 'Jobs processing!';
});

Route::get('/delete', function(){
   User::find(1)->delete();
    return 'User deleted';
});


Route::get('/cache', function () {
    if (Cache::get('user')) {
        return Cache::get('user');
    }

    Cache::put('user', User::find(1), 8);

    return 'User cached for 8 seconds';
});

Route::get('/dumps', function () {
    $user1 = User::find(1)->toArray();

    dump($user1);

    return 'Dump completed !';
});

Route::get('/events', function () {
    event(new SomeEvent(User::find(2)));

    return 'Event fired';
});

Route::get('/exceptions', function () {
    throw new Exception('is it the end of the world?');
});




Route::get('/logs', function () {
    Log::emergency('Emergency');
    Log::alert('Alert');
    Log::critical('Critical');
    Log::error('Error');
    Log::warning('Warning');
    Log::notice('Notice');
    Log::info('Info');
    Log::debug('Debug');

    return 'Stuff was logged.';
});

Route::get('/mail', function () {
    Mail::to('someone@someone.com')->send(new OrderShipped);

    return 'Mail sent.';
});

Route::get('/notifications', function () {
    $user = User::find(2);

    $user->notify(new InvoicePaid);

    return 'Notification sent';
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
