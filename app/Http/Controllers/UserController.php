<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function login_callback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        // ddd($callback);
        $data = [
            'email' => $callback->getEmail(),
            'name' => $callback->getName(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s')
        ];

        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);

        return redirect(route('home'));
    }

    public function profile()
    {
        $user = User::where('email', Auth::user()->email)->with('address')->first();
        // ddd($user);
        $url = 'https://api.rajaongkir.com/starter/province';
        // $proxyUrl = 'https://cors-anywhere.herokuapp.com/';
        // $fullUrl = $proxyUrl . $url;

        $ch = curl_init();
        $api_key = env('RAJAONGKIR_API_KEY');

        try {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'X-Requested-With: XMLHttpRequest',
                "key: $api_key"
            ));
            $response = curl_exec($ch);
            $response = json_decode($response);
            curl_close($ch);
        } catch (\Throwable $th) {
            // ddd($th);
        }
        // ddd($response);

        $province = $response->rajaongkir->results;
        return view('profile', compact('user', 'province'));
    }

    public function update_profile(Request $request)
    {
        $user = User::where('email', Auth::user()->email)->with('address')->first();
        $request->validate([
            'phone' => ['required', 'numeric', 'starts_with:8', Rule::unique('users')->ignore($user->id)],
            'whatsapp' => ['required', 'numeric', 'starts_with:8', Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        // ddd($user);

        if ($user->address) {
            $address = UserAddress::find($user->address_id);
            // $address->update([
            //     'province' => $request->province,
            //     'city' => $request->city,
            //     'address' => $request->address,
            //     // 'zip_code' => $request->zip_code,
            // ]);

            $address->province = $request->province;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->save();

            $address_id = $user->address_id;
            // ddd($address);
        } else {
            $address = UserAddress::create([
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
            ]);

            // ddd('$address');

            $address_id = $address->id;
        }

        // $user->update([
        //     'phone' => $request->phone,
        //     'whatsapp' => $request->whatsapp,
        //     'name' => $request->name,
        //     'address_id' => $address_id,
        //     'registered_at' => $user->registered_at ?? now(),
        // ]);
        $user->phone = $request->phone;
        $user->whatsapp = $request->whatsapp;
        $user->name = $request->name;
        $user->address_id = $address_id;
        $user->registered_at = $user->registered_at ?? now();
        $user->save();

        return back()->with('success', 'Berhasil Simpan Profile');
    }
}
