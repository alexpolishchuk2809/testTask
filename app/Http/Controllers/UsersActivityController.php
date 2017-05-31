<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Visitor;
use Illuminate\Http\Request;

class UsersActivityController extends Controller {


    /**
     * * Show the application activity screen to the user.
     *
     * @return activity view
     */
    public function index()
    {
        $visitorModel = new Visitor();
        $visitorCollection = $visitorModel->get();
        $currentVisitor = $visitorModel->getCurrentVisitor();
        $uniqueVisitorsCount = $visitorModel->count();
        $uniqueVisitorsCountPerDay = $visitorModel->getUniqueVisitorsToday();

        return view('activity',[
            'visitorsCount'  => $uniqueVisitorsCount,
            'visitorsPerDay' => $uniqueVisitorsCountPerDay,
            'visitorCollection' => $visitorCollection,
            'currentVisitor' => $currentVisitor
        ]);
    }

}
