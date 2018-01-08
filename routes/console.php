<?php

use Illuminate\Foundation\Inspiring;
use App\Mail\scheduleNotify;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('testCom', function () {
	//return 'You Did It!!!';
	$m = new scheduleNotify;
	
    $this->comment(Mail::to('alejandro.riosyb@gmail.com')->send($m));
})->describe('Display an inspiring quote');
