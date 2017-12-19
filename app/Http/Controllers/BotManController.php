<?php

namespace App\Http\Controllers;

use App\Conversations\ExampleConversation;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use Revolution\BotMan\Drivers\ChatWork\ChatWorkAccountDriver;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle(Request $request)
    {
        $botman = app('botman');

        /**
         * say()は受信者とドライバーを指定するのでどんなリクエストにも反応できる。
         * ChatWork内に限らず別のサービスからのwebhookでChatWorkに投稿することもできる。
         * 単純にChatWorkへの通知に対応してないサービスのブリッジにするとか…。
         *
         * ChatWorkの場合は受信者にルームIDを指定。
         */
        if ($request->has('room')) {
            $botman->say('say() test', $request->input('room'), ChatWorkAccountDriver::class);
        }

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php.
     *
     * @param BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
