<?php

use App\Company;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

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
//closure based Command
Artisan::command('contact:company-delete', function () {
    $this->info('Cleaning!');
    Company::whereDoesntHave('customers')
        ->get()
        ->each(function ($company) {
            $company->delete();
            $this->warn('Deleted: ' . $company->name);});
        })->describe("Delete Unused company");
