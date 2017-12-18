<?php

namespace App\Botman;

use BotMan\BotMan\BotMan;
use GrahamCampbell\GitHub\Facades\GitHub;

class LaravelCommand
{
    public function version(BotMan $bot)
    {
        $release = Github::repo()->releases()->latest('laravel', 'framework');

        info($release);

        $bot->reply($release['name']);
    }
}
