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

        $reply = $release['name'] . PHP_EOL . $release['html_url'] . PHP_EOL . '[info]' . $release['body'] . '[/info]';

        $bot->reply($reply);
    }
}
