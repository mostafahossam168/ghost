<?php

use App\Models\User;
use Illuminate\Support\Facades\Http;

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 5)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('sendOtp')) {
    function sendOtp($phone, $code)
    {
        $user = User::where('phone', $phone)->first();
        $phone = $user->country_code . $phone;

        $apiUrl = env('OURSMS_API_URL');
        $token = env('OURSMS_TOKEN');
        $src = env('OURSMS_SRC');
        $dests =  $phone;
        $body = 'الكود الخاص بتسجيل الدخول '  . $code;

        $response = \Illuminate\Support\Facades\Http::asForm()->post($apiUrl, [
            'token' => $token,
            'src' => $src,
            'dests' => $dests,
            'body' => $body,
        ]);


        echo $response->body();
        exit;

        if ($response->successful()) {
            $user->update([
                'otp' => $code
            ]);

            return  true;
        }

        return false;
    }
}


