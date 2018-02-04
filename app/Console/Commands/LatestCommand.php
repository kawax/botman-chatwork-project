<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use GrahamCampbell\GitHub\Facades\GitHub;
use Revolution\BotMan\Drivers\ChatWork\ChatWorkAccountDriver;

class LatestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bot:latest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Latest';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $release = Github::repo()->releases()->latest('laravel', 'framework');

        $ver = $release['name'];

        if ($ver === cache('latest_ver')) {
            return;
        }

        cache()->forever('latest_ver', $ver);

        $reply = $release['name'] . PHP_EOL . $release['html_url'] . PHP_EOL . '[info]' . $release['body'] . '[/info]';

        $botman = app('botman');

        try {
            $botman->say($reply, config('cw.room_id'), ChatWorkAccountDriver::class);
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }
    }
}
