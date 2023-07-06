<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RajaOngkirApiController extends Controller
{
    public static function getListProvince()
    {
        $url_province = 'https://api.rajaongkir.com/starter/province';

        // $proxyUrl = 'https://cors-anywhere.herokuapp.com/';
        // $fullUrl = $proxyUrl . $url;

        $ch = curl_init();
        $api_key = env('RAJAONGKIR_API_KEY');

        curl_setopt($ch, CURLOPT_URL, $url_province);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Requested-With: XMLHttpRequest',
            "key: $api_key"
        ));
        $province = curl_exec($ch);
        $province = json_decode($province);
        curl_close($ch);

        // ddd($province);
        $province = $province->rajaongkir->results;

        return $province;
    }

    public static function getListCity(Request $request)
    {
        // ddd($request);
        $provinceId = $request->input('provinceId');
        $url_city = "https://api.rajaongkir.com/starter/city?province=$provinceId";

        $ch = curl_init();
        $api_key = env('RAJAONGKIR_API_KEY');
        curl_setopt($ch, CURLOPT_URL, $url_city);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Requested-With: XMLHttpRequest',
            "key: $api_key"
        ));
        $city = curl_exec($ch);
        $city = json_decode($city);
        curl_close($ch);

        $city = $city->rajaongkir->results;

        return $city;
    }
}
