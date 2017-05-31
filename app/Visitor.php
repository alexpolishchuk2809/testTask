<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{

    protected $fillable = [
        'ip',
        'country',
        'city',
        'lat',
        'lng'
    ];

    /**
     * @param $ip - visitors IP
     *
     * @return true/false - Is the visitor exists
     */

    public function checkExistsIP($ip)
    {
        return Visitor::where('ip', $ip)->exists();
    }

    /**
     * @return count of existing unique visitors
     */

    public function getUniqueVisitorsToday()
    {
        return Visitor::where('updated_at', '>=', Carbon::now()
                        ->subDay())
                        ->count();
    }

    /**
     * @return current visitor data
     */

    public function getCurrentVisitor()
    {
        return Visitor::orderBy('updated_at', 'desc')->first();
    }

}
