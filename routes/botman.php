<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('laravel version', 'App\Botman\LaravelCommand@version');
$botman->hears('laravel latest', 'App\Botman\LaravelCommand@latest');

$botman->hears('Start conversation', BotManController::class.'@startConversation');
