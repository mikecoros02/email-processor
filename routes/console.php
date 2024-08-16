<?php

// use Illuminate\Foundation\Inspiring;
use app\Http\Controllers\Api\SuccessfulEmailsController;
use Illuminate\Support\Facades\Artisan;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();

Artisan::command('emailContentParser', function () {
    $emailContentParser = new SuccessfulEmailsController();
    $emailContentParser->emailContentParser();
})->purpose('Update Raw Text from Email Content with Plain Text Body')->hourly();
