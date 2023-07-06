<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Expr\Cast\Object_;

class UserController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function login_callback(Request $request)
    {
        $callback = Socialite::driver('google')->stateless()->user();
        // ddd($callback);
        $data = [
            'email' => $callback->getEmail(),
            'name' => $callback->getName(),
            'avatar' => $callback->getAvatar(),
            'role' => 'member',
            'email_verified_at' => date('Y-m-d H:i:s')
        ];

        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);

        if ($user->phone && $user->whatsapp && $user->address_id) {
            return redirect()->intended();
        } else {
            return redirect(route('profile'))->with('warning');
        }
    }

    public function profile()
    {
        $user = User::where('email', Auth::user()->email)->with('address')->first();
        $none = ['address' => '', 'province' => '', 'province_id' => '', 'city' => '', 'city_id' => ''];
        if (!$user->address) $user->address = json_decode(json_encode($none), false);
        // ddd($user->address);

        $province = RajaOngkirApiController::getListProvince();


        if ($user->address->city && $user->address->city != '') {

            $request = Request::create(route('profile'), 'GET', [
                'provinceId' => $user->address->province_id,
            ]);

            // ddd($request);

            // $provinceId = $request->input('provinceId');
            // $rajaOngkirApiController = new RajaOngkirApiController();
            // $city = $rajaOngkirApiController->getListCity($request);
            $city = RajaOngkirApiController::getListCity($request);
        } else {
            $city = [];
        }


        return view('profile', compact('user', 'province', 'city'));
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
            'province_id' => ['required', 'numeric'],
            'city' => ['required', 'string'],
            'city_id' => ['required', 'numeric'],
            'address' => ['required', 'string'],
        ]);

        // ddd($request);
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
            $address->province_id = $request->province_id;
            $address->city = $request->city;
            $address->city_id = $request->city_id;
            $address->address = $request->address;
            $address->save();

            $address_id = $user->address_id;
            // ddd($address);
        } else {
            $address = UserAddress::create([
                'province' => $request->province,
                'province_id' => $request->province_id,
                'city' => $request->city,
                'city_id' => $request->city_id,
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
