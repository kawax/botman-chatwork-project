<?php

namespace App\Providers\BotMan;

use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Studio\Providers\DriverServiceProvider as ServiceProvider;
use Revolution\BotMan\Drivers\ChatWork\ChatWorkAccountDriver;
use Revolution\BotMan\Drivers\ChatWork\ChatWorkRoomDriver;

class DriverServiceProvider extends ServiceProvider
{
    /**
     * The drivers that should be loaded to
     * use with BotMan.
     *
     * @var array
     */
    protected $drivers = [
        //        ChatWorkRoomDriver::class,
        ChatWorkAccountDriver::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        foreach ($this->drivers as $driver) {
            DriverManager::loadDriver($driver);
        }
    }
}
