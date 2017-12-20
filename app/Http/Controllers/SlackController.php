<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Exceptions\Base\BotManException;
use Illuminate\Http\Request;

use Revolution\BotMan\Drivers\ChatWork\ChatWorkAccountDriver;

use App\Model\Integration;

/**
 * SlackのOutgoing WebHooksを使ってSlackからChatWorkにそのまま流す。
 *
 * Class SlackController
 * @package App\Http\Controllers
 */
class SlackController extends Controller
{
    /**
     * @param Request $request
     * @param string  $uuid
     */
    public function __invoke(Request $request, string $uuid)
    {
        $integration = Integration::whereUuid($uuid)->firstOrFail();

        abort_if($integration->service !== 'slack', 404);

        $room_id = $integration->recipient;
        $api_token = $integration->api_token;

        //そのまま流してるだけなので見にくいような時はここで変更
        $text = $request->input('text');

        $botman = app('botman');

        try {
            $botman->say(
                $text,
                $room_id,
                ChatWorkAccountDriver::class,
                ['api_token' => $api_token]
            );
        } catch (BotManException $e) {
            logger()->error($e->getMessage());
        }

        $botman->listen();
    }
}
