<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class GeoIP
{
    private $_responseObject;

    /**
     * @param $ip - visitors IP
     * @param string $format
     *
     * @return Object with visitors geoIP data
     */

    public function sendGeoRequest($ip, $format = 'json')
    {
        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER  => 1,
                CURLOPT_URL             => "http://freegeoip.net/{$format}/{$ip}"
            ));

            if(($response = curl_exec($curl)) === false) {
                throw new \Exception('Can not received response from GeoIp. Error code: ' . curl_error($curl));
            } else {
                $this->_responseObject = json_decode($response);
            }

            curl_close($curl);

            return $this->_responseObject;
        } catch(\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}