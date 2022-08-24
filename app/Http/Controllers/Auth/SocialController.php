<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('cabinet.settings');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('password')
                ]);

                Auth::login($createUser);
                return redirect()->route('cabinet.settings');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }




    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->route('cabinet.settings');

            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'google_id'=> $user->id,
                    'password' => encrypt('password')
                ]);

                Auth::login($newUser);

                return redirect()->route('cabinet.settings');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }


    public function handleTwitterCallback()
    {
        try {

            $user = Socialite::driver('twitter')->user();

            $finduser = User::where('twitter_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->route('cabinet.settings');

            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'twitter_id'=> $user->id,
                    'password' => encrypt('password')
                ]);

                Auth::login($newUser);

                return redirect()->route('cabinet.settings');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
