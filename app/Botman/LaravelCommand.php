<?php

namespace App\Botman;

use BotMan\BotMan\BotMan;
use GrahamCampbell\GitHub\Facades\GitHub;

class LaravelCommand
{
    public function latest(BotMan $bot)
    {
        $release = Github::repo()->releases()->latest('laravel', 'framework');

        info($release);

        $reply = $release['tag_name'] . PHP_EOL . $release['html_url'] . PHP_EOL . '[info]' . $release['body'] . '[/info]';

        $bot->reply($reply);
    }

    public function version(BotMan $bot)
    {
        $tags = Github::repo()->tags('laravel', 'framework');

        //        info($tags);

        $version = $tags[0]['tag_name'];

        $bot->reply($version);
    }
}
