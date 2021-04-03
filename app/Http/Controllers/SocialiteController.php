<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect($services)
    {
        return Socialite::driver($services)->redirect();
    }

    public function callback($services)
    {
        $user = Socialite::driver($services)->user();

        if (!$user->email) {
            $check = User::where('email', $user->id)->first();
        }else{
            $check = User::where('email', $user->email)->first();
        }

        if ($check) {
            Auth::login($check);
            return redirect(route('home'));
        } else {
            $data = new User;
            $data->name = $user->name;
            $data->email = $user->id;
            $data->password = '123456';
            $data->save();

            Auth::login($data);
            return redirect(route('home'));
        }
    }
}
