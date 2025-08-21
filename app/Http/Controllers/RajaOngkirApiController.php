<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RajaOngkirApiController extends Controller
{
    public static function getListProvince()
    {
        $url_province = env('RAJAONGKIR_API_HOST') . '/api/v1/destination/province';

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
        // $url_city = "https://api.rajaongkir.com/starter/city?province=$provinceId";
        $url_city =  env('RAJAONGKIR_API_HOST') . '/api/v1/destination/city/' . $provinceId;

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

    public static function getCost(Request $request)
    {
        $destination = $request->input('destination');
        $weight = $request->input('weight');

        $curl = curl_init();
        $api_key = env('RAJAONGKIR_API_KEY');
        $origin = env('RAJAONGKIR_ORIGIN');

        $url = env('RAJAONGKIR_API_HOST') . '/api/v1/calculate/district/domestic-cost';

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $api_key"
            ),
        ));

        $cost = curl_exec($curl);
        $cost = json_decode($cost);
        $err = curl_error($curl);

        curl_close($curl);

        $cost = $cost->rajaongkir->results[0];
        // ddd($cost);

        return $cost;
    }
}
