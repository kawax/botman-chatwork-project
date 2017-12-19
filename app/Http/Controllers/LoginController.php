<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use App\Model\User;

class LoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('chatwork')
                        ->setScopes(['users.profile.me:read'])
                        ->redirect();
    }

    public function callback(Request $request)
    {
        if (!$request->has('code')) {
            return redirect('/');
        }

        /**
         * @var \Laravel\Socialite\Two\User $user
         */
        $user = Socialite::driver('chatwork')->user();

        /**
         * @var \App\Model\User $loginUser
         */
        $loginUser = User::updateOrCreate([
            'chatwork_id' => $user->id,
        ], [
            'name'  => $user->name,
            'email' => $user->email,
        ]);

        auth()->login($loginUser, true);

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
