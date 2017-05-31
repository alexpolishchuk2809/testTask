<?php

namespace App\Services;

use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Visitors
{
    protected $_request;

    /**
     * Visitors constructor. Get information about visitor request
     */

    public function __construct()
    {
        $this->_request = app('request');
    }

    /**
     * Updating the information about existing visitors or adding new data to DB if it is the new visitor
     */

    public function setVisitorInfo()
    {
        $visitorModel = new Visitor();
        $geoIP = new GeoIP();
        //$ip = $this->_request->ip();
        $ip = (new Visitors())->generateRandomIP();

        if($visitorModel->checkExistsIP($ip)) {
            $visitor = $visitorModel->where('ip', $ip)->first();
            $visitor->updated_at = Carbon::now();
            $visitor->save();
        } else {
            $geoResponse = $geoIP->sendGeoRequest($ip);
            $visitorModel->ip     = $ip;
            $visitorModel->country= $geoResponse->country_name;
            $visitorModel->city   = $geoResponse->city;
            $visitorModel->lat    = $geoResponse->latitude;
            $visitorModel->lng    = $geoResponse->longitude;
            $visitorModel->save();
        }
    }

    /**
     * @return random IP
     */

    public function generateRandomIP()
    {
        return rand(0,255) . '.' . rand(0,255) . '.' . rand(0,255) . '.' . rand(0,255);
    }
}